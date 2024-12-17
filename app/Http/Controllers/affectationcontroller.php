<?php

namespace App\Http\Controllers; 

use App\Models\matieremodel;
use App\Models\classmodel;
use App\Models\Affectationclassenseignant;
use App\Models\User;
 
use Illuminate\Http\Request; 

class AffectationController extends Controller
{
 

    //Affectation entre classe et controller 
    //Affectation
    public function attribuerclasseenseignant() 
    {
        $enseignants= User::where('usertype', 'enseignant')->get();
        //$matieres = matieremodel::get(); 
        $classes = classmodel::get(); 
        $affectations = Affectationclassenseignant::get(); 

        return view('admin.enseignant.attribuerclasseenseignant', compact('enseignants', 'classes', 'affectations'));
    }

    public function getMatieresByClasse(Request $request)
    {
        $classeId = $request->input('classe_id');
    
        $classe = classmodel::findOrFail($classeId);
    
        $matieres = matieremodel::where('semestre', $classe->semestre)
                                ->where('specialite_id', $classe->specialite_id)
                                ->get();
    
        return response()->json($matieres);
    }


    public function store(Request $request)
    {

        // Valider les données de la demande
    $validatedData = $request->validate([
        'enseignant_id' => 'required',
        'matiere_id' => 'required',
        'classe_id' => 'required',
    ]);

        // Vérifier si l'affectation existe déjà
        $existingAffectation = Affectationclassenseignant::where([
            'enseignant_id' => $request->enseignant_id,
            'matiere_id' => $request->matiere_id,
            'classe_id' => $request->classe_id,
        ])->first();

        if ($existingAffectation) {
            // Si l'affectation existe, renvoyer un message d'erreur ou effectuer une action appropriée
            return redirect()->back()->with('error', 'Cette affectation existe déjà.');
        }

        $classeId = $request->input('classe_id');
        $classe = classmodel::findOrFail($classeId);

        // Sinon, créer une nouvelle affectation
        $affectation = new Affectationclassenseignant();
        $affectation->enseignant_id = $request->enseignant_id;
        $affectation->matiere_id = $request->matiere_id;
        $affectation->semestre = $classe->semestre;
        $affectation->classe_id = $request->classe_id;

        // Enregistrer l'affectation
        $affectation->save();

        return redirect()->back()->with('success', 'Affectation d\'un enseignant enregistrée avec succès.');
    }

    public function delete($id) 
    {
        $affectation = Affectationclassenseignant::find($id);
    
        $affectation->delete();
        return redirect()->back()->with('success', 'affectation supprimée avec succès.');
    }


}


    
    
   

