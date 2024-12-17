<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\specialitemodel;

class SpecialiteController extends Controller
{
    
    public function adminspecialite()
    { 
        $specialites = specialitemodel::all();
        return view("admin.environnement.specialite",compact('specialites'));
    } 

    public function adminaddspecialite()
    {
        return view("admin.environnement.addspecialite");
    }
    public function adminaddspecialitepost(Request $request)
    {        
        $specialite = new specialitemodel;
        
        $specialite->specialitem= $request->specialitem;
        $specialite->designation= $request->designation;

        $specialite->save();

        return redirect()->route('adminspecialite');

    }
   
    public function adminmdeletespecialite($id)
    {
        $specialite = specialitemodel::find($id);

        $specialite->delete();
        return redirect()->back()->with('success', 'Specialité supprimée avec succès.');
    }


    public function adminmodifspecialite($id)
    {
        $specialite = specialitemodel::find($id);
        return view('admin.environnement.modifspecialite', compact('specialite'));
    }

    public function adminmodifspecialitepost(Request $request)
    {
        $specialite= specialitemodel::where('id', $request->id)->first();

        $specialite->specialitem= $request->specialitem;
        $specialite->designation= $request->designation;

        $specialite->update();

        return redirect()->route('adminspecialite')->with('success', 'Specialité mis à jour avec succès.');
    }
}
