<?php

namespace App\Http\Controllers;
use App\Models\specialitemodel;
use App\Models\Affectationclassetudiant;
use App\Models\classmodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Absence;
use App\Models\Affectationclassenseignant;
use App\Models\Annonce;
use App\Models\Cour;
use App\Models\Demande;
use App\Models\Emploi;
use App\Models\Jour;
use App\Models\matieremodel;
use App\Models\Note;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class profilecontroller extends Controller
{
    public function profilens()
    {
        // Obtenir l'enseignant authentifié
        $enseignant = Auth::user();

        // Récupérer toutes les affectations liées à l'enseignant
        $affectations = Affectationclassenseignant::where('enseignant_id', $enseignant->id)->get();

        // Obtenir toutes les classes associées à ces affectations
        $classes = $affectations->map(function ($affectation) {
            return $affectation->classe;
        });

        // Obtenir toutes les matières associées à ces affectations
        $matieres = $affectations->map(function ($affectation) {
            return $affectation->matiere;
        });

        return view('enseignants.profile', compact('enseignant','classes','matieres'));
    }
    


    //Edit Profile Enseignant
    public function editens(Request $request)
    {

        // Récupérer l'enseignant associé à l'email de l'utilisateur connecté
        $enseignant = User::where('email', \Auth::user()->email)->first();
    
        if (!$enseignant) {
            return redirect()->back()->with('error', 'Aucun enseignant trouvé pour cet utilisateur.');
        }
    
        // Passer les données de l'enseignant à la vue
        return view("enseignants.edit", compact('enseignant'));
    }
    
    //Post Edit
    public function modifier(Request $request)
    {
        $user = Auth::user();
        $user->name=$request->name;
        $user->numcin=$request->numcin;
        $user->email=$request->email;  
        $user->sexe=$request->sexe;  
        $user->specialite_enseignant=$request->specialite_enseignant; 
        
        if ($request->hasfile('image')) {
            if (File::exists('img/'.$user->image))
            {
                File::delete('img/'.$user->image);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img/', $filename);
            $user->image = $filename;
        }

        $user->update();
        
        // Rediriger vers le profil de l'enseignant après la mise à jour
        return redirect('/enseignants/profile')->with('success', 'Profil mis à jour avec succès.');
    }



    //Partie Etudiant
    public function profiletud() 
    {
        $etudiant = Auth::user();

        // Récupérer l'affectation de classe pour cet étudiant (unique)
        $affectation = Affectationclassetudiant::where('etudiant_id', $etudiant->id)->first();

        if (!$affectation) {
            // Si aucun affectation n'est trouvée, renvoyer un message d'erreur
            return redirect()->back()->withErrors(['message' => 'Aucune classe trouvée pour cet étudiant.']);
        }

        // Récupérer la classe de cet étudiant
        $classe = $affectation->classe;

        // Récupérer les matières associées à cette classe via Affectationclassenseignant
        $affectations_enseignants = Affectationclassenseignant::where('classe_id', $classe->id)->get();

        $matieres = [];

        foreach ($affectations_enseignants as $affectation_enseignant) {
            $matiere = $affectation_enseignant->matiere;

            // Ajouter la matière au tableau si elle n'est pas déjà présente
            if (!in_array($matiere, $matieres, true)) {
                $matieres[] = $matiere;
            }
        }

       // Transmettre les données à la vue
       return view('etudiants.profile', compact('etudiant', 'classe', 'matieres'));
    }
    

    public function editetud()
    {
        $userEmail = auth()->user()->email;
    
        // Récupérer l'etudiant associé à l'email de l'utilisateur connecté
        $etudiant = User::where('email', \Auth::user()->email)->first();
    
        if (!$etudiant) {
            return redirect()->back()->with('error', 'Aucun etudiant trouvé pour cet utilisateur.');
        }

        $specialites = specialitemodel::get();
        
        // Passer les données de l'enseignant à la vue
        return view("etudiants.edit", compact('etudiant', 'specialites'));
    }

    public function editetudiant(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->numcin = $request->numcin;
        $user->email = $request->email;
        $user->sexe = $request->sexe;
        $user->specialite_id = $request->specialite_id;
        
        if ($request->hasFile('image')) {
            if (File::exists(public_path('img/'.$user->image))) {
                File::delete(public_path('img/'.$user->image));
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('img'), $filename);
            $user->image = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
    public function picturepost(Request $request)
    {
        $user = Auth::user();

        if ($request->hasfile('image')) {
            if (File::exists('img/'.$user->image))
            {
                File::delete('img/'.$user->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img/', $filename);
            $user->image = $filename;
        }
        $user->update();
        return redirect()->back();
    }
    
   
}

