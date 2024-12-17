<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Affectationclassenseignant;
use App\Models\Affectationclassetudiant;
use App\Models\Annonce;
use App\Models\classmodel;
use App\Models\Cour;
use App\Models\Demande;
use App\Models\Emploi;
use App\Models\Jour;
use App\Models\matieremodel;
use App\Models\Note;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\specialitemodel;
use App\Models\User;


class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Rechercher dans les tables pertinentes
        $absences = Absence::where('presence', 'LIKE', "%$query%")
                           ->orWhere('date', 'LIKE', "%$query%")
                           ->orWhere('seance', 'LIKE', "%$query%")
                           ->get();

        $affectationclassenseignants = Affectationclassenseignant::where('id', 'LIKE', "%$query%")
                                                                  ->orWhereHas('classe', function($q) use ($query) {
                                                                      $q->where('nom', 'LIKE', "%$query%");
                                                                  })
                                                                  ->orWhereHas('matiere', function($q) use ($query) {
                                                                      $q->where('nom', 'LIKE', "%$query%");
                                                                  })
                                                                  ->get();

        $affectationclassetudiants = Affectationclassetudiant::where('id', 'LIKE', "%$query%")
                                                             ->orWhereHas('classe', function($q) use ($query) {
                                                                 $q->where('nom', 'LIKE', "%$query%");
                                                             })
                                                             ->orWhereHas('etudiant', function($q) use ($query) {
                                                                 $q->where('name', 'LIKE', "%$query%");
                                                             })
                                                             ->get();

        $annonces = Annonce::where('titre', 'LIKE', "%$query%")
                           ->orWhere('contenu', 'LIKE', "%$query%")
                           ->orWhere('date', 'LIKE', "%$query%")
                           ->get();

        $classes = classmodel::where('nom', 'LIKE', "%$query%")
                             ->orWhere('semestre', 'LIKE', "%$query%")
                             ->get();

        $cours = Cour::where('titre', 'LIKE', "%$query%")
                     ->orWhere('courfile', 'LIKE', "%$query%")
                     ->orWhere('date', 'LIKE', "%$query%")
                     ->get();

        $demandes = Demande::where('sujet', 'LIKE', "%$query%")
                           ->orWhere('message', 'LIKE', "%$query%")
                           ->orWhere('date', 'LIKE', "%$query%")
                           ->get();

        $emplois = Emploi::whereHas('salle', function($q) use ($query) {
                                $q->where('nom', 'LIKE', "%$query%");
                            })
                            ->orWhereHas('seance', function($q) use ($query) {
                                $q->where('heure', 'LIKE', "%$query%");
                            })
                            ->orWhereHas('jour', function($q) use ($query) {
                                $q->where('jour', 'LIKE', "%$query%");
                            })
                            ->get();

        $jours = Jour::where('jour', 'LIKE', "%$query%")->get();

        $matieres = matieremodel::where('nom', 'LIKE', "%$query%")
                                ->orWhere('codeue', 'LIKE', "%$query%")
                                ->orWhere('semestre', 'LIKE', "%$query%")
                                ->get();

        $notes = Note::where('note_ds', 'LIKE', "%$query%")
                     ->orWhere('note_examen', 'LIKE', "%$query%")
                     ->orWhere('date_note', 'LIKE', "%$query%")
                     ->get();

        $salles = Salle::where('nom', 'LIKE', "%$query%")
                       ->orWhere('position', 'LIKE', "%$query%")
                       ->get();

        $seances = Seance::where('heure', 'LIKE', "%$query%")->get();

        $specialites = specialitemodel::where('specialitem', 'LIKE', "%$query%")
                                      ->orWhere('designation', 'LIKE', "%$query%")
                                      ->get();

        $users = User::where('name', 'LIKE', "%$query%")
                     ->orWhere('email', 'LIKE', "%$query%")
                     ->get();

        // Combiner les résultats dans un tableau
        $results = [
            'absences' => $absences,
            'affectationclassenseignants' => $affectationclassenseignants,
            'affectationclassetudiants' => $affectationclassetudiants,
            'annonces' => $annonces,
            'classes' => $classes,
            'cours' => $cours,
            'demandes' => $demandes,
            'emplois' => $emplois,
            'jours' => $jours,
            'matieres' => $matieres,
            'notes' => $notes,
            'salles' => $salles,
            'seances' => $seances,
            'specialites' => $specialites,
            'users' => $users,
        ];

        return view('results', compact('results', 'query'));
    }
}