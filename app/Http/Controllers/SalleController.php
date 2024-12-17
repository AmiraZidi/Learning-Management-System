<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;

class SalleController extends Controller
{
   
    public function adminsalle()
    { 
        $salles = Salle::all();
        return view("admin.environnement.salle",compact('salles'));
    } 

    public function adminaddsalle()
    {
        return view("admin.environnement.addsalle");
    }
    public function adminaddsallepost(Request $request)
    {        
        $salle = new Salle;
        
        $salle->nom= $request->nom;
        $salle->position= $request->position;

        $salle->save();

        return redirect()->route('adminsalle');

    }
   
    public function admideletesalle($id)
    {
        $salle = Salle::find($id);

        $salle->delete();
        return redirect()->back()->with('success', 'Salle supprimée avec succès.');
    }


    public function adminmodifsalle($id)
    {
        $salle = Salle::find($id);
        return view('admin.environnement.modifsalle', compact('salle'));
    }

    public function adminmodifsallepost(Request $request)
    {
        $salle= Salle::where('id', $request->id)->first();

        $salle->nom= $request->nom;
        $salle->position= $request->position;

        $salle->update();

        return redirect()->route('adminsalle')->with('success', 'Salle mis à jour avec succès.');
    }
}
