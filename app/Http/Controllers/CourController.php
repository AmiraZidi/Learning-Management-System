<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cour;
use App\Models\Affectationclassenseignant;
use App\Models\Affectationclassetudiant;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;



class CourController extends Controller
{
    //PARTIE ENSEIGNANT

    public function nvcours()
    { 
        $enseignant = Auth::user();

        $affectations = Affectationclassenseignant::where('enseignant_id', $enseignant->id)->get();

        
        return view('enseignants.nvcours', compact('affectations'));
    }

    public function nvcourspost(Request $request)
    { 
        $cour = new Cour();

        $cour->user_id = \Auth::user()->id;
        $cour->affectationclassenseignant_id = $request->affectationclassenseignant_id;
        $cour->titre = $request->titre;
        $cour->date = \Carbon\Carbon::now(); 

        if ($request->hasFile('courfile')) { 
            $file = $request->file('courfile');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('cours/', $filename);
            $cour->courfile = $filename;
        }  

        $cour->save();

        return redirect()->back();
    }

    public function hiscours()
    { 
        $enseignant = Auth::user();

        $cours = Cour::join('affectationclassenseignants', 'cours.affectationclassenseignant_id', '=', 'affectationclassenseignants.id')
                ->join('class', 'affectationclassenseignants.classe_id', '=', 'class.id')
                ->join('matiere', 'affectationclassenseignants.matiere_id', '=', 'matiere.id')
                ->where('affectationclassenseignants.enseignant_id', $enseignant->id)
                ->select('cours.*', 'class.nom as classe_nom', 'matiere.nom as matiere_nom')
                ->get();
    
        return view('enseignants.hiscours', compact('cours'));
    }


    //Partie admin 

    public function admincours($affectation_id)
    {
        $cours = Cour::where('affectationclassenseignant_id', $affectation_id)->get();

        return view('admin.consultation.admincours', compact('cours'));
    
    }


    //Partie etudiant 

    public function coursetudiant($id)
    { 
    
        $cours = Cour::where('affectationclassenseignant_id', $id)->get();
        
        return view('etudiants.coursetudiant', compact('cours'));
    }
}

