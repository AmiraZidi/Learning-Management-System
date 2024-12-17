<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Affectationclassenseignant;
use App\Models\Affectationclassetudiant;
use App\Models\matieremodel;
use App\Models\classmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class affectationetudcontroller extends Controller
{

    //Affectation Etudiant
    public function affectationetudiant()
    {
         $classes = classmodel::get();

        return view('admin.etudiant.affectationetudiant', compact('classes'));
    }

    public function affectationetudiantadd($classe_id) 
    {
        // Récupérer la classe à partir de l'identifiant
        $classe = Classmodel::find($classe_id);

        if (!$classe) {
            return redirect()->back()->withErrors(['error' => 'Classe non trouvée.']);
        }

        // Récupérer le semestre et la spécialité de la classe
        $semestre = $classe->semestre;
        $specialite_id = $classe->specialite_id;

        // Récupérer les affectations existantes pour cette classe
        $affectationsetudiants = Affectationclassetudiant::where('classe_id', $classe_id)->get();

        // Récupérer les identifiants des étudiants déjà affectés
        $affectes_ids = $affectationsetudiants->pluck('etudiant_id')->toArray();

        // Récupérer les étudiants non affectés, ayant le même semestre et spécialité
        $etudiants_non_affectes = User::where('usertype', 'etudiant')
                                    ->where('semestre', $semestre)
                                    ->where('specialite_id', $specialite_id)
                                    ->whereNotIn('id', $affectes_ids) // Exclure les étudiants déjà affectés
                                    ->get();

        return view('admin.etudiant.affectationetudiantadd', compact('classe', 'etudiants_non_affectes','classe_id','affectationsetudiants'));
    }
 
    public function affectationetudiantpost(Request $request)
    {
        $classe_id = $request->classe_id;
        $etudiants_ids = $request->etudiant_id;
    
        foreach ($etudiants_ids as $etudiant_id) {
            $affectationetudiant = new Affectationclassetudiant();
            $affectationetudiant->classe_id = $classe_id;
            $affectationetudiant->etudiant_id = $etudiant_id;
            $affectationetudiant->save();
        }
        
        return redirect()->back()->with('success', 'Les étudiants ont été affectés avec succès.');
    }



    public function delete($id)
    {
        // Rechercher l'affectation par identifiant
        $affectation = AffectationClassEtudiant::findOrFail($id);

        // Supprimer l'affectation
        $affectation->delete();

        // Rediriger avec un message de succès
        return redirect()->route('affectationetudiant')->with('success', 'Affectation supprimée avec succès.');
    }

    
}

