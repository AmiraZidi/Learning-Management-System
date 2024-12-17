<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classmodel;
use App\Models\specialitemodel;
use App\Models\matieremodel;
use App\Models\Affectationclassematiere;
use App\Models\Affectationclassetudiant;

class classcontroller extends Controller
{
    public function list()
    { 
        $classes = classmodel::get();
        return view("admin.class.list",compact('classes'));
    }
 
    public function new()
    {
        $specialites = specialitemodel::all();
        return view("admin.class.new", compact('specialites'));
    }

    public function add(Request $request)
    {        
        $save = new classmodel;
        $save->nom = $request->nom;
        $save->semestre= $request->semestre;
        $save->specialite_id = $request->specialite_id;
        $save->save();
        return redirect('class/list');
    }

   
    public function fiche($id)
    {  
        $classe = classmodel::where('id', $id)->first();
        $nombreEtudiants = Affectationclassetudiant::where('classe_id', $id)->count();

        $etudiants = Affectationclassetudiant::with('etudiant')
                        ->where('classe_id', $id)
                        ->get();

        return view("admin.class.fiche", compact('classe', 'nombreEtudiants', 'etudiants'));
    }
 
    public function delete($id)
    {
        $class = classmodel::find($id);
    
        $class->delete();
        return redirect()->back()->with('success', 'classe supprimée avec succès.');
    }

    public function edit($id) 
    {
        $class= classmodel::where('id', $id)->first();
        $specialites = specialitemodel::all();

        return view('admin.class.modifier', compact('class','specialites'));
    }

    public function update(Request $request, $id)
    {
        $class= classmodel::where('id', $id)->first();
    
        $class->update([
            'nom' => $request->input('nom'),
            'specialite_id' => $request->input('specialite_id'),
            'semestre' => $request->input('semestre'),
        ]);

        return redirect('/class/list')->with('success', 'classe mis à jour avec succès.');
    }

    public function create()
    {
        $specialites = specialitemodel::all();
    
    
        return view('admin.class.new', ['specialites' => $specialites]);
    }

    

}