<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classmodel;
use App\Models\Affectationclassenseignant;
use App\Models\Affectationclassetudiant;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class NoteController extends Controller
{
    //Partie enseignant
    public function classe()
    {
        $userId = Auth::id();
        $affectations = Affectationclassenseignant::where('enseignant_id', $userId)->get();

        return view('/enseignants/classe', compact('affectations'));
    
    }


    //NV NOTE
    
    public function noteenseignant($affectation_id)
    { 
        $userId = Auth::id(); 

        $affectation = Affectationclassenseignant::where('enseignant_id', $userId)->where('id', $affectation_id)->first();

        $classe_id = $affectation->classe_id;

        $classeetudiants = Affectationclassetudiant::where('classe_id', $classe_id)->get();

        $notes = Note::where('affectationclassenseignant_id', $affectation_id)->get();

        return view('enseignants.noteenseignant' , compact('classeetudiants','affectation_id','notes'));
    }


    public function noteenseignantpost(Request $request)
    { 
        // Récupérer l'affectationclassenseignant_id et le type de note
        $affectationclassenseignant_id = $request->input('affectationclassenseignant_id');
        $type = $request->input('type');
        
        // Parcourir les données pour traiter chaque étudiant
        foreach($request->input('etudiants') as $etudiantData) {
            // Récupérer l'etudiant_id et la note
            $etudiant_id = $etudiantData['etudiant_id'];
            $note_value = $etudiantData['note'];
    
            // Rechercher la note existante pour cet étudiant et cette affectation
            $note = Note::where('affectationclassenseignant_id', $affectationclassenseignant_id)
                        ->where('etudiant_id', $etudiant_id)
                        ->first();
    
            // Si une note existe déjà, mettez à jour la note correspondante
            if ($note) {
                if ($type == 'DS') {
                    $note->note_ds = $note_value;
                } elseif ($type == 'DC') {
                    $note->note_examen = $note_value;
                }
                $note->save();
            } else {
                // Sinon, créez une nouvelle note pour cet étudiant et cette affectation
                $note = new Note();
                $note->affectationclassenseignant_id = $affectationclassenseignant_id;
                $note->etudiant_id = $etudiant_id;
                $note->date_note = now();

                if ($type == 'DS') {
                    $note->note_ds = $note_value;
                } elseif ($type == 'DC') {
                    $note->note_examen = $note_value;
                }
                $note->save();
            }
        }
    
        // Rediriger l'utilisateur vers la page précédente
        return redirect()->back();    
    }
    
    

 

    public function addnote($affectation_id)
    {
        $userId = Auth::id();

        $affectation = Affectationclassenseignant::where('enseignant_id', $userId)->where('id', $affectation_id)->first();

        $classe_id = $affectation->classe_id;

        $classeetudiants = Affectationclassetudiant::where('classe_id', $classe_id)->get();
        $notes = Note::where('affectationclassenseignant_id', $affectation_id)->get();

        return view('/enseignants/addnote', compact('affectation','classeetudiants','affectation_id','notes',));
    
    }

    public function addnotepost(Request $request)
    {
        $note = new Note();

        $note->affectationclassenseignant_id =  $request->affectationclassenseignant_id;
        $note->etudiant_id =  $request->etudiant_id;
        $note->note_ds =  $request->note_ds;
        $note->note_examen =  $request->note_examen;
        $note->date_note = \Carbon\Carbon::now();
        
        $note->save();
        
        return redirect()->back()->with('success', 'Affectation d\'un enseignant enregistrée avec succès.');    
    }



    //Partie Etudiant
    public function matiereetudiant()
    {
        $userId = Auth::id();

        // Récupérer les classes associées à cet étudiant
        $classes = Affectationclassetudiant::where('etudiant_id', $userId)->get();

        // Obtenir les affectations d'enseignants basées sur les classes de l'étudiant
        $affectations = Affectationclassenseignant::whereIn('classe_id', $classes->pluck('classe_id')->unique())->get();
        
        // Retourner la vue avec les affectations
        return view('etudiants.matiereetudiant', compact('affectations','classes'));
    }  

    //public function noteetudiant($affectation_id)
    //{
    //    $userId = Auth::id();

    //    $notes = Note::where('affectationclassenseignant_id', $affectation_id)
    //                    ->where('etudiant_id', $userId)
    //                    ->get();

    //    return view('etudiants.noteetudiant', compact('notes'));
    //}


    //Partie admin 
    
    public function adminnotes($affectation_id)
    {
        $notes = Note::where('affectationclassenseignant_id', $affectation_id)->get();
        $affectation = Affectationclassenseignant::where('id', $affectation_id)->first();

        return view('admin.consultation.adminnotes', compact('notes','affectation'));
    
    }

    //Partie etudiant 

    public function noteetudiant()
    {
        $notes = Note::where('etudiant_id', \Auth::user()->id)->get();

        return view('etudiants.noteetudiant', compact('notes'));
    
    }
    
}
