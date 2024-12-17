<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\matieremodel;
use App\Models\classmodel;
use App\Models\specialitemodel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Emploi;
use App\Models\Jour;
use App\Models\Seance;
use App\Models\Salle;
use App\Models\Affectationclassetudiant;
use App\Models\Absence;


class etudiantcontroller extends Controller
{
     
    public function list()
    { 
        $etudiants= User::where('usertype', 'etudiant')->get();
        return view("admin.etudiant.list",compact('etudiants'));
    }

    public function new()
    {
        $specialites = specialitemodel::all();
        return view("admin.etudiant.new", compact('specialites'));
    }
 
    public function add(Request $request)
    {        
        $request->validate([
            'numcin' => 'required|unique:users,numcin',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'email_institutionnel' => 'required|email|unique:users,email_institutionnel',
        ], [
            'numcin.unique' => 'Le numéro CIN est déjà pris.',
            'email.unique' => 'L\'email est déjà pris.',
            'email_institutionnel.unique' => 'L\'email institutionnel est déjà pris.',
        ]);

        $etudiant = new User;
        $etudiant->numcin = $request->numcin;
        $etudiant->name = $request->name; 

        $plainPassword = Str::random(8);
        $etudiant->password = bcrypt($plainPassword);

        $etudiant->email = $request->email;
        $etudiant->email_institutionnel = $request->email_institutionnel;
        $etudiant->specialite_id = $request->specialite_id;
        $etudiant->semestre = $request->semestre;
        $etudiant->sexe = $request->sexe;
        $etudiant->etat = "true";

        $etudiant->usertype = 'etudiant';

        $etudiant->save();
 
        $details = [
            'name' => $etudiant->name,
            'email' => $etudiant->email,
            'password' => $plainPassword, // Utiliser le mot de passe non crypté
        ];
        \Mail::to($etudiant->email)->send(new \App\Mail\MyTestMail($details));

        return redirect('/etudiant/list')->withErrors(['success' => 'Etudiant ajouté avec succès!']);
    }

    public function fiche($id)
    {
        $etudiant = User::where('id', $id)->where('usertype', 'etudiant')->first();

        $absences = Absence::with('affectationclassenseignant')
                        ->where('etudiant_id', $id)
                        ->get();

        $absencesParAffectation = [];
        foreach ($absences as $absence) {

            if ($absence->presence === 'Absent') {
                $affectation = $absence->affectationclassenseignant->id;
                $matiere = $absence->affectationclassenseignant->matiere->nom; // Accéder au nom de la matière
                if (!isset($absencesParAffectation[$affectation])) {
                    $absencesParAffectation[$affectation] = [
                        'affectation' => $absence->affectationclassenseignant,
                        'matiere' => $matiere,
                        'total' => 0,
                    ];
                }
                $absencesParAffectation[$affectation]['total']++;
            }
        }

        return view("admin.etudiant.fiche", compact('etudiant', 'absencesParAffectation'));
    }


    public function matiere()
    {
        $data['getrecord']=matieremodel::getrecord();
        return view("admin.etudiant.fiche",$data);
    }


    public function delete($id)
    {
        $etudiant= User::where('id', $id)->first();

        if (!$etudiant) {
            return redirect()->back()->with('error', 'etudiant non trouvé.');
        }

        $etudiant->delete();

        return redirect()->back()->with('success', 'etudiant supprimé avec succès.');
    }


    public function edit($id)
    {
        $etudiant = User::where('id', $id)->where('usertype', 'etudiant')->first();
        $specialites = specialitemodel::all();
        return view('admin.etudiant.modifier', compact('etudiant','specialites'));
    }


    public function update(Request $request , $id)
    {
        $etudiant = User::where('id', $id)->first();

        if (!$etudiant) {
            return Redirect()->back()->withwith('error', 'Étudiant non trouvé.');
        }

        $etudiant->numcin = $request->numcin;
        $etudiant->name = $request->name;
        $etudiant->email = $request->email;
        $etudiant->email_institutionnel = $request->email_institutionnel;
        $etudiant->specialite_id = $request->specialite_id;
        $etudiant->semestre = $request->semestre;
        $etudiant->sexe = $request->sexe;

        $etudiant->update();

        return redirect('/etudiant/list')->with('success', 'Étudiant mis à jour avec succès.');
    }









    //Affectation 
    public function affetud(Request $request)
    {
        // Récupérer le semestre et la spécialité depuis la requête
        $semestre = $request->input('semestre');
        $specialite = $request->input('specialite');

        // Récupérer toutes les classes
        $classes = ClassModel::orderBy('nom')->get();

        // Passer les classes à la vue
        return view('admin.etudiant.classe', [
            'classes' => $classes,
        ]);
    }
    public function affetudpost($specialite, $semestre)
    {
        // Récupérer les étudiants en fonction de la spécialité et du semestre
        $etudiants = Etudiantmodel::where('specialite', $specialite)
                            ->where('semestre', $semestre)
                            ->get();

        // Passer les étudiants à la vue
        return view('affetud', ['etudiants' => $etudiants]);
    }



    //Partie Emploi
    public function emploietudiant()
    {
        
        $etudiant_id = Auth::user()->id;

        $classe = Affectationclassetudiant::where('etudiant_id', $etudiant_id)->first();

        // Récupérer l'emploi du temps de cette classe
        $emplois = Emploi::with([
                                'salle',
                                'seance',
                                'jour',
                                'affectationclassenseignant.matiere',
                                'affectationclassenseignant.enseignant'
                            ])->whereHas('affectationclassenseignant', function ($query) use ($classe) {
                                $query->where('classe_id', $classe->classe_id);
                            })->get();

        // Récupérer les jours et les séances
        $jours = Jour::all();
        $seances = Seance::all();
            
        return view("etudiants.emploietudiant", compact('emplois', 'jours', 'seances'));
    }
 
}