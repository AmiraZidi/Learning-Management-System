<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matieremodel;
use App\Models\specialitemodel;
use App\Models\Affectationclassenseignant;



class matierecontroller extends Controller
{
    public function list()
    { 
        $matieres = matieremodel::get();
        return view("admin.matiere.list",compact('matieres'));
    } 

    public function new()
    {
        $specialites = specialitemodel::all();
        return view("admin.matiere.new", compact('specialites'));
    }
    public function add(Request $request)
    {        
        $matiere = new matieremodel;
        $matiere->nom= trim($request->nom);
        $matiere->codeue= $request->codeue;
        $matiere->specialite_id = $request->specialite_id;
        $matiere->nbrheure = $request->nbrheure;
        $matiere->coeff= $request->coeff;
        $matiere->semestre = $request->semestre;
        $matiere->ue= $request->ue;
        $matiere->nature= $request->nature;
        $matiere->type= $request->type;

        $matiere->save();

        return redirect('/matiere/list');

    } 
   
    public function delete($id)
    {
        $matiere = matieremodel::find($id);

        $matiere->delete();
        return redirect()->back()->with('success', 'Matière supprimée avec succès.');
    }

    public function fiche($id)
    {
        $matiere = matieremodel::where('id', $id)->first();
        
        $enseignants = Affectationclassenseignant::with('enseignant')
                                                ->where('matiere_id', $id)
                                                ->get();

    return view("admin.matiere.fiche", compact('matiere', 'enseignants'));
    }
    public function edit($id)
    {
        $matiere= matieremodel::where('id', $id)->first();
        $specialites = specialitemodel::all();
        return view('admin.matiere.modifier', compact('matiere','specialites'));
    }

    public function update(Request $request, $id)
    {
        $matiere= matieremodel::where('id', $id)->first();

        $matiere->update([
            'nom' => $request->input('nom'),
            'specialite_id' => $request->input('specialite_id'),
            'ue' => $request->input('ue'),
            'codeue' => $request->input('codeue'),
            'coeff' => $request->input('coeff'),
            'nbrheure' => $request->input('nbrheure'),
            'semestre' => $request->input('semestre'),
            'nature' => $request->input('nature'),
            'type' => $request->input('type'),
        ]);

        return redirect('/matiere/list')->with('success', 'matiere mis à jour avec succès.');
    }
}

