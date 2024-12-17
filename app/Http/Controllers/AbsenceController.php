<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\classmodel;
use App\Models\Affectationclassenseignant;
use App\Models\Affectationclassetudiant;
use App\Models\Emploi; 
use App\Models\Jour;
use App\Models\Seance;
use App\Models\Salle;

class AbsenceController extends Controller
{

    //PARTIE ENSEIGNANT

    public function absencesenseignant($id)
    {
        $affectationclassenseignant = Affectationclassenseignant::findOrFail($id);
        $affectationclassenseignant_id = $affectationclassenseignant->id;

        

        $etudiants = Affectationclassetudiant::where('classe_id', $affectationclassenseignant->classe_id)
                        ->with('etudiant')
                        ->get();

        return view('enseignants.absencesenseignant', compact('etudiants', 'affectationclassenseignant_id'));
    }

    public function absencesenseignantpost(Request $request)
    {
        $data = $request->input('etudiants');

        // Utiliser la même logique que dans absencesenseignant pour récupérer la dernière séance
        $derniere_absence = Absence::where('affectationclassenseignant_id', $request->input('affectationclassenseignant_id'))
            ->orderBy('date', 'desc')
            ->first();
    
        // Initialiser la séance à 1 si aucune absence n'a été enregistrée pour cette affectation
        $derniere_seance = is_null($derniere_absence) ? 1 : $derniere_absence->seance;
    
        // Si la dernière absence est datée d'il y a plus d'une semaine, incrémenter la séance
        if ($derniere_absence && Carbon::parse($derniere_absence->date)->addWeek()->isPast()) {
            $derniere_seance++;
        }
    
        foreach ($data as $etudiant_id => $etudiantData) {
            // Rechercher une absence existante pour cet étudiant, la dernière séance et la dernière date
            $absence = Absence::where('affectationclassenseignant_id', $request->input('affectationclassenseignant_id'))
                ->where('etudiant_id', $etudiant_id)
                ->orderBy('date', 'desc')
                ->first();
    
            // Si une absence existe pour cet étudiant, utiliser sa date, sinon utiliser la date actuelle
            $date_absence = $absence ? $absence->date : now();
    
            // Mettre à jour ou créer une absence avec la date déterminée et les autres données fournies
            Absence::updateOrCreate(
                [
                    'affectationclassenseignant_id' => $request->input('affectationclassenseignant_id'),
                    'etudiant_id' => $etudiant_id,
                    'seance' => $derniere_seance,
                ],
                [
                    'presence' => $etudiantData['etat'],
                    'date' => now(),
                ]
            );
        }
    
        return redirect()->back(); 
    }

    public function hisabs($affectation_id)
    {
        $userId = Auth::id(); 

        $affectation = Affectationclassenseignant::where('enseignant_id', $userId)->where('id', $affectation_id)->first();

        $absences = Absence::where('affectationclassenseignant_id', $affectation_id)->get();

        // Récupérer le total d'absences pour chaque étudiant pour cette matière
        $total_absences_par_etudiant = $absences->where('presence', 'Absent')
                                                ->groupBy('etudiant_id') // Regrouper par étudiant
                                                ->map(function ($group) {
                                                    return $group->count(); // Compter les absences
                                                });

        // Récupérer les étudiants concernés par cette affectation
        $etudiants = Affectationclassetudiant::where('classe_id', $affectation->classe_id)
                        ->with('etudiant')
                        ->get();

        return view('enseignants.hisabs', compact('etudiants', 'total_absences_par_etudiant'));
    }



    public function classeabsences()
    {
        $userId = Auth::id();
        $affectations = Affectationclassenseignant::where('enseignant_id', $userId)->get();
        $classes = classmodel::whereIn('id', $affectations->pluck('classe_id'))->get();

        return view('/enseignants/classeabsences', compact('affectations','classes'));
    
    }
    
    public function seancesabsences($affectation_id) {

        // Récupérer l'affectation correspondante
        $affectation = Affectationclassenseignant::find($affectation_id);
    
        if (!$affectation) {
            return redirect()->back()->with('error', 'Affectation non trouvée.');
        }
    
        // Récupérer les séances associées à l'affectation
        $seances = Absence::where('affectationclassenseignant_id', $affectation_id)
                      ->select('seance') // Limiter au champs du groupement
                      ->groupBy('seance') // Groupe par date et séance
                      ->get();

        return view('/enseignants/seancesabsences', compact('affectation', 'seances'));
    }

    public function addabsences($affectation_id, $seance = null)
    {
        $userId = Auth::id();

        $affectation = Affectationclassenseignant::where('enseignant_id', $userId)->where('id', $affectation_id)->first();

        if (!$affectation) {
            return redirect()->back()->with('error', 'Affectation non trouvée.');
        }
            // Utiliser le numéro de séance passé dans la route, ou le définir à null
        $seance_number = $seance ?? null;

        // Obtenir la liste des étudiants de la classe associée
        $classeetudiants = Affectationclassetudiant::where('classe_id', $affectation->classe_id)->get();

        // Obtenir les absences pour la séance spécifique
        $absences_pour_seances = Absence::where('affectationclassenseignant_id', $affectation_id)
                                    ->where('seance', $seance_number)
                                    ->get();

        // Filtrer les étudiants sans absence pour cette séance
        $etudiants_non_absents = $classeetudiants->filter(function ($etudiant) use ($absences_pour_seances) {
            return !$absences_pour_seances->contains('etudiant_id', $etudiant->etudiant_id);
        });

        //Déterminer total
        // Obtenir toutes les absences pour l'affectation donnée
        $absences = Absence::where('affectationclassenseignant_id', $affectation_id)->get();

        // Récupérer le total d'absences pour chaque étudiant pour cette matière
        $total_absences_par_etudiant = $absences->where('presence', 'Absent')
                                                ->groupBy('etudiant_id') // Regrouper par étudiant
                                                ->map(function ($group) {
                                                    return $group->count(); // Compter les absences
                                                });



        return view('/enseignants/addabsences', compact( 'affectation', 'affectation_id', 'absences_pour_seances', 'etudiants_non_absents','seance_number','total_absences_par_etudiant'));

    }

    public function addabsencepost(Request $request)
    {
        $absence = new Absence();

        $absence->affectationclassenseignant_id =  $request->affectationclassenseignant_id;
        $absence->etudiant_id =  $request->etudiant_id;
        $absence->presence =  $request->presence;
        $absence->seance =  $request->seance;
        $absence->date = \Carbon\Carbon::now();
        
        $absence->save();
        
        return redirect()->back()->with('success', 'Affectation d\'un enseignant enregistrée avec succès.');    
    }

    public function delete($id)
    {
        $absence = Absence::findOrFail($id);

         // Obtenir la date de l'absence et la date actuelle
        $absenceDate = Carbon::parse($absence->date); // Convertir la date de l'absence en objet Carbon
        $currentDate = Carbon::today(); // Obtenez la date d'aujourd'hui

        // Vérifiez si la date actuelle dépasse de plus de 7 jours la date de l'absence
        $daysSinceAbsence = $currentDate->diffInDays($absenceDate); // Calculez le nombre de jours écoulés

        if ($daysSinceAbsence > 7) {
            // Si plus de 7 jours se sont écoulés, retournez avec un message d'erreur
            return redirect()->back()->with('error', "Vous ne pouvez pas supprimer une absence qui date de plus de 7 jours.");
        }

        $absence->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Affectation supprimée avec succès.');
    }


    //Partie Etudiant

    public function absenceetudiant()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();

        // Obtenir les absences où l'étudiant correspond à l'utilisateur connecté et l'affectation correspond à l'ID fourni
        $absences = Absence::where('etudiant_id', $userId)
                            ->where('presence', 'Absent')
                            ->get();

        // Compter le nombre total d'absences
        $totalAbsences = $absences->count();

        // Retourner la vue avec les données des absences et le total des absences
        return view('etudiants.absenceetudiant', compact('absences', 'totalAbsences'));
    }




    //Partie ADMINISTRATEUR

    public function adminclasseabsences()
    {
        $affectations = Affectationclassenseignant::all();
        $classes = classmodel::whereIn('id', $affectations->pluck('classe_id'))->get();

        return view('admin.consultation.adminclasseabsences', compact('affectations','classes'));
    
    }

    public function adminseancesabsences($affectation_id) {

        // Récupérer l'affectation correspondante
        $affectation = Affectationclassenseignant::find($affectation_id);
    
        if (!$affectation) {
            return redirect()->back()->with('error', 'Affectation non trouvée.');
        }
    
        // Récupérer les séances associées à l'affectation
        $seances = Absence::where('affectationclassenseignant_id', $affectation_id)
                            ->select('seance', \DB::raw('MIN(date) as first_date')) // Sélectionner la première date de chaque séance
                            ->groupBy('seance') // Groupe par date et séance
                            ->get();
                      
        return view('admin.consultation.adminseancesabsences', compact('affectation', 'seances'));
    }

    public function adminabsences($affectation_id, $seance)
    {

        $affectation = Affectationclassenseignant::where('id', $affectation_id)->first();

        if (!$affectation) {
            return redirect()->back()->with('error', 'Affectation non trouvée.');
        }
            // Utiliser le numéro de séance passé dans la route, ou le définir à null
        $seance_number = $seance;

        // Obtenir la liste des étudiants de la classe associée
        $classeetudiants = Affectationclassetudiant::where('classe_id', $affectation->classe_id)->get();

        // Obtenir les absences pour la séance spécifique
        $absences_pour_seances = Absence::where('affectationclassenseignant_id', $affectation_id)
                                    ->where('seance', $seance_number)
                                    ->get();

        //Déterminer total
        // Obtenir toutes les absences pour l'affectation donnée
        $absences = Absence::where('affectationclassenseignant_id', $affectation_id)->get();

        // Récupérer le total d'absences pour chaque étudiant pour cette matière
        $total_absences_par_etudiant = $absences->where('presence', 'Absent')
                                                ->groupBy('etudiant_id') // Regrouper par étudiant
                                                ->map(function ($group) {
                                                    return $group->count(); // Compter les absences
                                                });




        return view('admin.consultation.adminabsences', compact( 'affectation', 'affectation_id', 'absences_pour_seances','total_absences_par_etudiant'));

    }




    
    ////Partie emploi
    public function adminclasse()
    {
        $classes = classmodel::all();
        return view('admin.emploi.adminclasse', compact('classes'));
    }
    
    public function emploi($classe_id)
    {
        $salles = Salle::all();

        // Obtenir toutes les affectations pour la classe donnée
        $affectations = Affectationclassenseignant::where('classe_id', $classe_id)
            ->with(['matiere', 'enseignant'])
            ->get();

        // Obtenir tous les jours et toutes les séances
        $jours = Jour::all();
        $seances = Seance::all();

        // Obtenir tous les emplois liés à la classe donnée
        $emplois = Emploi::whereIn('affectationclassenseignant_id', $affectations->pluck('id'))->get();


        // Passer toutes les données à la vue
        return view('admin.emploi.emploi', compact('salles', 'affectations', 'jours', 'seances', 'emplois'));
     }

    
     public function Emploiparclasse(Request $request)
     {
         // Validation des données
         $validatedData = $request->validate([
             'matiere' => 'required|array',
             'salle' => 'required|array',
         ]);
     
         $messages = [];  // Pour stocker les messages d'erreur
         
         // Boucle sur les jours et les séances pour vérifier les conflits
         foreach ($validatedData['matiere'] as $jour_id => $seances) {
             foreach ($seances as $seance_id => $affectation_id) {
                 // Récupérer la salle correspondante
                 $salle_id = $validatedData['salle'][$jour_id][$seance_id];
     
                 // Vérifier si la salle est déjà occupée pour ce jour et cette séance
                 $conflit_salle = Emploi::where('jour_id', $jour_id)
                     ->where('seance_id', $seance_id)
                     ->where('salle_id', $salle_id)  // Vérification de conflit exact
                     ->exists();
     
                 if ($conflit_salle) {
                     // Si la salle est déjà utilisée, on ne peut pas la réaffecter
                     $salle_name = Salle::find($salle_id)->nom;  // Correction pour obtenir le nom de la salle
                     $messages[] = "La salle " . $salle_name . " est déjà occupée pour cette seance.";
                     continue;  // Si la salle est occupée, on continue sans modifier
                 }
     
                 // Récupérer l'affectation associée pour vérifier les conflits avec les enseignants
                 $affectation = Affectationclassenseignant::find($affectation_id);
                 $enseignant_id = $affectation->enseignant->id;
     
                 // Vérifier si l'enseignant est déjà utilisé à ce jour et cette séance
                 $conflit_enseignant = Emploi::where('jour_id', $jour_id)
                     ->where('seance_id', $seance_id)
                     ->whereHas('affectationclassenseignant', function ($query) use ($enseignant_id) {
                         $query->where('enseignant_id', $enseignant_id);
                     })
                     ->exists();
     
                 if ($conflit_enseignant) {
                     // Si l'enseignant est déjà utilisé, on ne peut pas le réaffecter
                     $enseignant_name = $affectation->enseignant->name;
                     $messages[] = "L'enseignant " . $enseignant_name . " est déjà occupé pour cette seance.";
                     continue;  // Si l'enseignant est occupé, on continue sans modifier
                 }
     
                 // Si pas de conflit, mettre à jour ou créer l'emploi du temps
                 Emploi::updateOrCreate(
                     [
                         'jour_id' => $jour_id,
                         'seance_id' => $seance_id,
                     ],
                     [
                         'salle_id' => $salle_id,
                         'affectationclassenseignant_id' => $affectation_id,
                     ]
                 );
             }
         }
     
         if (!empty($messages)) {
             // Si des conflits existent, renvoyer les erreurs
             return redirect()->back()->withErrors($messages);
         }
     
         return redirect()->back()->with('success', 'Emploi du temps enregistré avec succès');
     }
     
    



}