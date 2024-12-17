<?php

use App\Http\Controllers\matierecontroller;
use App\Models\enseignantmodel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\classcontroller;
use App\Http\Controllers\enseignantcontroller;
use App\Http\Controllers\etudiantcontroller;
use App\Http\Controllers\affectationcontroller;
use App\Http\Controllers\affectationetudcontroller;
use App\Http\Controllers\profilecontroller ;
use App\Http\Controllers\Affectationclassematiere;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
   Route::post('login', [AuthController::class, 'authlogin']);
   Route::get('logout', [AuthController::class, 'logout']);
   Route::middleware(['auth'])->group(function () {
       Route::get('/admin/dashboard', function () {
           return view('admin.dashboard');
       })->name('admin.dashboard');
   });




Route::get('/login', [AuthController::class, 'login'])->name('login'); 

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authlogin']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/enseignants/dashboard', function () {
        return view('enseignants.dashboard');
    })->name('enseignants.dashboard');
    Route::get('/etudiants/dashboard', function () {
        return view('etudiants.dashboard');
    })->name('etudiants.dashboard');
});

    // Partie mdp
    Route::get('motdepasseoublie', [AuthController::class, 'motdepasseoublie'])->name('motdepasseoublie');
    Route::post('motdepasseoubliepost', [AuthController::class, 'motdepasseoubliepost'])->name('motdepasseoubliepost');
    Route::get('changermotdepasse', [AuthController::class, 'changermotdepasse'])->name('changermotdepasse');
    Route::post('changermotdepassepost', [AuthController::class, 'changermotdepassepost'])->name('changermotdepassepost');

    Route::get('changermotdepasse2', [AuthController::class, 'changermotdepasse2'])->name('changermotdepasse2');
    Route::post('changermotdepassepost2', [AuthController::class, 'changermotdepassepost2'])->name('changermotdepassepost2');



    //Classe
    Route::get('/class/new', [classcontroller::class,'create']);
    Route::get('/class/list', [classcontroller::class,'list']);
    Route::get('/class/new', [classcontroller::class,'new']);
    Route::post('class/new', [classcontroller::class, 'add']); 

    Route::get('class/delete/{id}', [classcontroller::class, 'delete'])->name('class.delete');
    Route::get('class/fiche/{id}', [classcontroller::class, 'fiche'])->name('class.fiche');
    Route::get('class/modifier/{id}',[classcontroller::class, 'edit'] )->name('class.edit');
    Route::put('class/update/{id}',[classcontroller::class, 'update'] )->name('class.update');
 


    //Matiere
    Route::get('/matiere/list', [matierecontroller::class,'list']);
    Route::get('/matiere/new', [matierecontroller::class,'new']);
    Route::post('matiere/new', [matierecontroller::class, 'add']);


    Route::get('matiere/delete/{id}', [matierecontroller::class, 'delete'])->name('matiere.delete');
    Route::get('matiere/fiche/{id}', [matierecontroller::class, 'fiche'])->name('matiere.fiche');
    Route::get('matiere/modifier/{id}',[matierecontroller::class, 'edit'] )->name('matiere.edit');
    Route::put('matiere/update/{id}',[matierecontroller::class, 'update'] )->name('matiere.update');






    //Ens
    Route::get('/enseignant/list', [enseignantcontroller::class,'list']);
    Route::get('/enseignant/new', [enseignantcontroller::class,'new']);
    Route::post('enseignant/new', [enseignantcontroller::class, 'add']);
    Route::get('enseignant/modifier/{id}',[enseignantcontroller::class, 'edit'] )->name('enseignant.edit');
    Route::put('enseignant/list/{id}',[enseignantcontroller::class, 'update'] )->name('enseignant.update');
    Route::get('enseignant/list/{id}', [enseignantcontroller::class, 'delete'])->name('enseignant.delete');
    Route::get('enseignant/fiche/{id}', [enseignantcontroller::class, 'fiche'])->name('enseignant.fiche');

    //Affectation Ens
    Route::get('/enseignant/attribuerclasseenseignant', [AffectationController::class,'attribuerclasseenseignant']);
    Route::post('/enseignant/store', [AffectationController::class,'store'])->name('store');
    Route::get('/enseignant/attribuerclasseenseignant/{id}',[AffectationController::class, 'delete'] )->name('delete');


    Route::get('/getMatieresByClasse', [AffectationController::class, 'getMatieresByClasse'])->name('getMatieresByClasse');

    //Emploi admin
    Route::get('/emploi/adminclasse', [AbsenceController::class,'adminclasse']);
    Route::get('/emploi/emploi/{classe_id}', [AbsenceController::class,'emploi'])->name('emploi');
    Route::post('Emploiparclasse', [AbsenceController::class, 'Emploiparclasse'])->name('Emploiparclasse');


    //Emploi etudiant
    Route::get('/etudiants/emploietudiant', [etudiantcontroller::class,'emploietudiant']);
     
    //Emploi enseignant
    Route::get('/enseignants/emploienseignant', [enseignantcontroller::class,'emploienseignant']);
     
    
    //Etud
    Route::get('/etudiant/list', [etudiantcontroller::class,'list']);
    Route::get('/etudiant/new', [etudiantcontroller::class,'new']);
    Route::post('etudiant/new', [etudiantcontroller::class, 'add']); 
    Route::get('etudiant/fiche', [etudiantcontroller::class, 'fiche']);
    Route::get('etudiant/fiche/{id}', [etudiantcontroller::class, 'fiche'])->name('etudiant.fiche');
    Route::get('etudiant/list/{id}',[etudiantcontroller::class, 'delete'] )->name('etudiant.delete');
    Route::get('etudiant/modifier/{id}',[etudiantcontroller::class, 'edit'] )->name('etudiant.edit');
    Route::put('etudiant/modifier/{id}',[etudiantcontroller::class, 'update'] )->name('etudiant.update');

    Route::get('/etudiant/affectationetudiant', [affectationetudcontroller::class, 'affectationetudiant'])->name('affectationetudiant');
    Route::get('/etudiant/affectationetudiantadd/{affectation_id}', [affectationetudcontroller::class, 'affectationetudiantadd']);
    Route::post('/etudiant/affectationetudiantpost', [affectationetudcontroller::class,'affectationetudiantpost']);
    Route::delete('/etudiant/affectationetudiant/delete/{id}', [affectationetudcontroller::class, 'delete'])->name('affectationetudiant.delete');
 




    //Enseignant Note 
    Route::get('/enseignants/classe', [NoteController::class,'classe']);
    Route::get('/enseignants/addnote/{affectation_id}', [NoteController::class,'addnote']);
    Route::post('/enseignants/addnotepost', [NoteController::class,'addnotepost']);


    //Etudiant Note
    Route::get('/etudiants/matiereetudiant', [NoteController::class,'matiereetudiant']);
    Route::get('/etudiants/noteetudiant/{affectation_id}', [NoteController::class, 'noteetudiant'])->name('noteetudiant');
    //Etudiant Absence
    Route::get('/etudiants/absenceetudiant', [AbsenceController::class, 'absenceetudiant'])->name('absenceetudiant');



    //Route Profile Enseigannt
    Route::get('/enseignants/profile', [profilecontroller::class,'profilens']);
    Route::get('/enseignants/edit', [profilecontroller::class,'editens']);
    Route::post('/enseignants/edit', [profilecontroller::class,'modifier']);
    Route::post('/picturepost', [profilecontroller::class,'picturepost'])->name('picturepost');

    
    //Route Profile Etudiant
    Route::get('/etudiants/profile', [profilecontroller::class,'profiletud']);
    Route::get('/etudiants/edit', [profilecontroller::class,'editetud']);
    Route::post('/etudiants/edit', [profilecontroller::class,'editetudiant']);
    Route::post('/picturepost', [profilecontroller::class,'picturepost'])->name('picturepost');



    //Enseignant Absences 
    Route::get('/enseignants/classeabsences', [AbsenceController::class,'classeabsences'])->name('classeabsences');
    Route::get('/enseignants/seancesabsences/{affectation_id}', [AbsenceController::class,'seancesabsences'])->name('classeabsences');
    Route::get('/enseignants/addabsences/{affectation_id}/{seance}', [AbsenceController::class,'addabsences'])->name('addabsences');
    Route::post('/enseignants/addabsencepost', [AbsenceController::class,'addabsencepost'])->name('addabsencepost');
    Route::delete('/enseignants/addabsences/delete/{id}', [AbsenceController::class, 'delete'])->name('addabsences.delete');


    //Administrateur Absences 
    Route::get('/consultation/adminclasseabsences', [AbsenceController::class,'adminclasseabsences'])->name('adminclasseabsences');
    Route::get('/emploi/adminseancesabsences/{affectation_id}', [AbsenceController::class,'adminseancesabsences'])->name('adminseancesabsences');
    Route::get('/emploi/adminabsences/{affectation_id}/{seance}', [AbsenceController::class,'adminabsences'])->name('adminabsences');

    
    
    //Partie enseignant 
    Route::get('/enseignants/classesenseignant', [enseignantcontroller::class,'classesenseignant'])->name('classesenseignant');
    Route::get('/enseignants/etudlistenseignant/{classe_id}', [enseignantcontroller::class,'etudlistenseignant'])->name('etudlistenseignant');
    Route::get('/enseignants/matieresenseignant', [enseignantcontroller::class,'matieresenseignant'])->name('matieresenseignant');
    Route::get('/enseignants/hisabs/{affectation_id}', [AbsenceController::class,'hisabs'])->name('hisabs');
 
    Route::get('/enseignants/absencesenseignant/{id}', [AbsenceController::class,'absencesenseignant'])->name('absencesenseignant');
    Route::post('absencesenseignantpost', [AbsenceController::class,'absencesenseignantpost'])->name('absencesenseignantpost');


    Route::get('/enseignants/noteenseignant/{affectation_id}', [NoteController::class,'noteenseignant'])->name('noteenseignant');
    Route::post('noteenseignantpost', [NoteController::class,'noteenseignantpost'])->name('noteenseignantpost');

    Route::get('/enseignants/nvcours', [Courcontroller::class,'nvcours'])->name('nvcours');
    Route::post('nvcourspost', [Courcontroller::class,'nvcourspost'])->name('nvcourspost');
    Route::get('/enseignants/hiscours', [Courcontroller::class,'hiscours'])->name('hiscours');


    //Enseignant message
    Route::get('/enseignants/hismessage', [MessageController::class,'hismessage'])->name('hismessage');

    //Enseignant annonce
    Route::get('/enseignants/nvannonce', [AnnonceController::class,'nvannonce'])->name('nvannonce');
    Route::post('nvannoncepost', [AnnonceController::class,'nvannoncepost'])->name('nvannoncepost');
    Route::get('/enseignants/hisannonce', [AnnonceController::class,'hisannonce'])->name('hisannonce');

    //Admin annonce
    Route::get('/admin/adminnvannonce', [AnnonceController::class,'adminnvannonce'])->name('adminnvannonce');
    Route::post('adminnvannoncepost', [AnnonceController::class,'adminnvannoncepost'])->name('adminnvannoncepost');
    Route::get('/admin/adminhisannonce', [AnnonceController::class,'adminhisannonce'])->name('adminhisannonce');
    Route::get('/admin/admideleteannonce/{id}', [AnnonceController::class,'admideleteannonce'])->name('admideleteannonce');
    Route::get('/admin/adminannonce/{id}', [AnnonceController::class,'adminannonce'])->name('adminannonce');
    Route::get('/admin/admineditannonce/{id}', [AnnonceController::class,'admineditannonce'])->name('admineditannonce');
    Route::post('admineditannoncepost', [AnnonceController::class,'admineditannoncepost'])->name('admineditannoncepost');


    Route::get('/enseignants/nvdemande', [DemandeController::class,'nvdemande'])->name('nvdemande');
    Route::post('nvdemandepost', [DemandeController::class,'nvdemandepost'])->name('nvdemandepost');
    Route::get('/enseignants/hisdemande', [DemandeController::class,'hisdemande'])->name('hisdemande');
    Route::get('/admin/adminhisdemande', [DemandeController::class,'adminhisdemande'])->name('adminhisdemande');
    Route::get('/admin/adminreponsedemande/{id}', [DemandeController::class,'adminreponsedemande'])->name('adminreponsedemande');
    Route::post('/adminreponsedemandepost', [DemandeController::class,'adminreponsedemandepost'])->name('adminreponsedemandepost');
    
     
    Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

    //Route admin salle
    Route::get('/admin/adminsalle', [SalleController::class,'adminsalle'])->name('adminsalle');
    Route::get('/admin/adminaddsalle', [SalleController::class,'adminaddsalle'])->name('adminaddsalle');
    Route::post('/admin/adminaddsallepost', [SalleController::class,'adminaddsallepost'])->name('adminaddsallepost');
    Route::get('/admin/adminmodifsalle/{id}', [SalleController::class,'adminmodifsalle'])->name('adminmodifsalle');
    Route::post('/admin/adminmodifsallepost', [SalleController::class,'adminmodifsallepost'])->name('adminmodifsallepost');
    Route::get('/admin/admideletesalle/{id}', [SalleController::class,'admideletesalle'])->name('admideletesalle');

    //Route admin specialite
    Route::get('/admin/adminspecialite', [SpecialiteController::class,'adminspecialite'])->name('adminspecialite');
    Route::get('/admin/adminaddspecialite', [SpecialiteController::class,'adminaddspecialite'])->name('adminaddspecialite');
    Route::post('/admin/adminaddspecialitepost', [SpecialiteController::class,'adminaddspecialitepost'])->name('adminaddspecialitepost');
    Route::get('/admin/adminmodifspecialite/{id}', [SpecialiteController::class,'adminmodifspecialite'])->name('adminmodifspecialite');
    Route::post('/admin/adminmodifspecialitepost', [SpecialiteController::class,'adminmodifspecialitepost'])->name('adminmodifspecialitepost');
    Route::get('/admin/adminmdeletespecialite/{id}', [SpecialiteController::class,'adminmdeletespecialite'])->name('adminmdeletespecialite');

    //Route admin note et cours
    Route::get('/admin/adminnotes/{affectation_id}', [NoteController::class,'adminnotes'])->name('adminnotes');
    Route::get('/admin/admincours/{affectation_id}', [CourController::class,'admincours'])->name('admincours');

    //Route etudiant note et cours
    Route::get('/etudiants/coursetudiant/{id}', [Courcontroller::class,'coursetudiant'])->name('coursetudiant');
    Route::get('/etudiants/noteetudiant', [NoteController::class,'noteetudiant'])->name('noteetudiant');
    
    //Route etudiant message
    Route::get('/etudiants/messageetudiant', [MessageController::class,'messageetudiant'])->name('messageetudiant');
    Route::post('/messageetudiantpost', [MessageController::class,'messageetudiantpost'])->name('messageetudiantpost');
    Route::get('/etudiants/etudianthismessage', [MessageController::class,'etudianthismessage'])->name('etudianthismessage');

    
Route::get('/enseignants/note', [enseignantcontroller::class,'note']);
Route::get('/etudiants/note', [etudiantcontroller::class,'note']);
Route::get('/acceuil', [authcontroller::class,'acceuil']);









