<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enseignantmodel; 
use App\Models\specialitemodel;
use App\Models\matieremodel;
use App\Models\classmodel;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Emploi;
use App\Models\Jour;
use App\Models\Seance;
use App\Models\Salle;
use App\Models\Affectationclassenseignant;
use App\Models\Affectationclassetudiant;

class enseignantcontroller extends Controller
{
    public function list()
    { 
        $enseignants= User::where('usertype', 'enseignant')->get();
        return view("admin.enseignant.list",compact('enseignants'));
    }

    public function new()
    {
        return view("admin.enseignant.new");
    }
    public function add(Request $request)
    {        
        $request->validate([
            'numcin' => 'required|unique:users,numcin',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ], [
            'numcin.unique' => 'Le numéro CIN est déjà pris.',
            'email.unique' => 'L\'email est déjà pris.',
            'email_institutionnel.unique' => 'L\'email institutionnel est déjà pris.',
        ]);

        $enseignant = new User;
        $enseignant->numcin = $request->numcin;
        $enseignant->name = $request->name;
        $plainPassword = Str::random(8);
        $enseignant->password = bcrypt($plainPassword);
        $enseignant->email = $request->email;
        $enseignant->sexe = $request->sexe;
        $enseignant->specialite_enseignant = $request->specialite_enseignant;
        $enseignant->etat = "true";

        $enseignant->usertype = 'enseignant';

    
        $enseignant->save();
        $details = [
            'name' => $enseignant->name,
            'email' => $enseignant->email,
            'password' => $plainPassword, // Utiliser le mot de passe non crypté
        ];
    
        \Mail::to($enseignant->email)->send(new \App\Mail\MyTestMail($details));


        return redirect('/enseignant/list')->withErrors(['success' => 'Enseignant ajouté avec succès!']);

    }   
    public function delete($id)
    {
        $enseignant= User::where('id', $id)->first();

        if (!$enseignant) {
            return redirect()->back()->with('error', 'enseignant non trouvé.');
        }

        $enseignant->delete();

        return redirect()->back()->with('success', 'enseignant supprimé avec succès.');
    }
    public function edit($id)
    {
        $enseignant = User::where('id', $id)->first();

        return view('admin.enseignant.modifier', compact('enseignant'));
    }

    public function update(Request $request, $id)
    {
        $enseignant = User::where('id', $id)->first();

        if (!$enseignant) {
            return Redirect()->back()->withwith('error', 'Enseignant non trouvé.');
        }

        $enseignant->numcin = $request->numcin;
        $enseignant->name = $request->name;
        $enseignant->email = $request->email;
        $enseignant->sexe = $request->sexe;
        $enseignant->specialite_enseignant = $request->specialite_enseignant;

        $enseignant->update();

        return redirect('/enseignant/list')->with('success', 'Enseignant mis à jour avec succès.');
    }




    public function fiche($id)
    {
        $enseignant= User::where('id', $id)->where('usertype', 'enseignant')->first();

        $affectations = Affectationclassenseignant::with('matiere', 'classe')
                        ->where('enseignant_id', $id)
                        ->get();

        return view("admin.enseignant.fiche", compact('enseignant','affectations'));
    }


    
    public function affiche()

    { $data['getrecord']=enseignantmodel::getrecord();
        return view("admin.enseignant.affred",$data);
    }
    public function note()
    { 
        return view("enseignants.note");
    }
        


    //Partie Emploi
    public function emploienseignant()
    {
        
        $enseignant_id = Auth::user()->id;

        // Récupérer les emplois du temps pour cet enseignant
        $emplois = Emploi::with([
            'salle',
            'seance',
            'jour',
            'affectationclassenseignant.matiere',
            'affectationclassenseignant.classe'
        ])->whereHas('affectationclassenseignant', function ($query) use ($enseignant_id) {
            $query->where('enseignant_id', $enseignant_id);
        })->get();

        // Récupérer les jours et les séances
        $jours = Jour::all();
        $seances = Seance::all();

        return view("enseignants.emploienseignant", compact('emplois', 'jours', 'seances'));
    
    }


    public function classesenseignant()
    { 
        $enseignant = Auth::user();

        // Récupérer les affectations des classes pour cet enseignant
        $affectations = Affectationclassenseignant::where('enseignant_id', $enseignant->id)->get();

        // Récupérer les classes associées aux affectations
        $classes = classmodel::whereIn('id', $affectations->pluck('classe_id'))->get();

        
        return view('enseignants.classesEnseignant', compact('classes'));
    }

    
    public function etudlistenseignant($classe_id)
    { 
        // Récupérer la classe
        $classe = classmodel::find($classe_id);

        // Récupérer les étudiants associés à cette classe
        $affectations = Affectationclassetudiant::where('classe_id', $classe_id)->get();
 
        // Récupérer les étudiants à partir des affectations
        $etudiants = User::whereIn('id', $affectations->pluck('etudiant_id'))->get();
 
        // Retourner la vue avec les étudiants et la classe
        return view('enseignants.etudlistenseignant', compact('etudiants', 'classe'));
    }

    public function matieresenseignant() 
    { 
        $userId = Auth::id();
        $affectations = Affectationclassenseignant::where('enseignant_id', $userId)->get();
        $classes = classmodel::whereIn('id', $affectations->pluck('classe_id'))->get();

         
        return view('enseignants.matieresenseignant', compact('affectations'));
    }


}

