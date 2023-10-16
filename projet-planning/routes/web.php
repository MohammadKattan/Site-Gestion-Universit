<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::view('/home','home')->middleware('auth')->name('home');;
//Login
Route::get('/login', [AuthenticatedSessionController::class,'showForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'login']);
//Register
Route::get('/register', [RegisterUserController::class,'showForm'])->name('register');
Route::post('/register', [RegisterUserController::class,'store']);

Route::middleware(['auth'])->group(function(){
//Logout
Route::get('/logout', [AuthenticatedSessionController::class,'logout'])->name('logout');
//form changement pwd
Route::get('/changePassword', [AuthenticatedSessionController::class, 'showChangePasswordGet'])->name('auth.modif_mdp');
//route changement pwd
Route::post('/changePassword', [AuthenticatedSessionController::class, 'changePasswordPost'])->name('auth.modif_mdp');
//form modify nom/prenom
Route::get('/admin/user/{id}/modify',[AuthenticatedSessionController::class, 'modify_form'])->name('modify_form');
//route modify nom/prenom
Route::post('/admin/user/{id}/modify',[AuthenticatedSessionController::class, 'modify'])->name('modify_form');
});
///////////// {{PARTI Admin}} //////////
Route::middleware(['auth','is_admin'])->group(function(){
Route::view('/admin','admin.home')->name('admin.home');
// route affiche liste des users
Route::get('/admin/user/list',[UserController::class, 'affiche'])->name('liste_users')->middleware('auth');
// route affiche liste des enseignants
Route::get('/admin/enseignant/list',[UserController::class, 'affiche_enseignant'])->name('liste_enseignant');
// route affiche liste des gestionnaires
Route::get('/admin/gestionnaire/list',[UserController::class, 'affiche_gestionnaire'])->name('liste_gestionnaire');
// route affiche liste des users de type NULL
Route::get('/admin/type_NULL/list',[UserController::class, 'affiche_user_null'])->name('liste_user_null');
//route modify the type of user
Route::get('/admin/user/{id}/modify_type',[UserController::class, 'modify_form_type'])->name('modify_type');
//route modify nom/prenom
Route::post('/admin/user/{id}/modify_type',[UserController::class, 'modify_type'])->name('modify_type');
//route supp_form user
Route::get('/admin/user/{id}/supp_form',[UserController::class,'suppForm'])->name('supp_user');
//route supp uers
Route::post('/admin/user/{id}/supp_form',[UserController::class,'suppUser'])->name('supp_user');
//route ajout_form uers
Route::get('/ajouteUser', [RegisterUserController::class,'ajouteForm'])->name('ajoute_user');
//route ajoute user
Route::post('/ajouteUser', [RegisterUserController::class,'ajouteUser'])->name('ajoute_user');
//route recherche par nom/prenom/login
Route::get('/search_user', [UserController::class, 'search']);

///////{{parti Cours}}///////////
// route affiche liste des cours
Route::get('/admin/cours/list',[CoursController::class, 'affiche'])->name('liste_cours');
// ajouter un cours 
Route::get('/ajouteCours', [CoursController::class,'showForm'])->name('ajoute_cours');
Route::post('/ajouteCours', [CoursController::class,'ajouteCours'])->name('ajoute_cours');
//route modify un cours
Route::get('/admin/cours/{id}/modify',[CoursController::class, 'modify_form_cours'])->name('modify_cours');
Route::post('/admin/cours/{id}/modify',[CoursController::class, 'modify_cours'])->name('modify_cours');
//route supp_cours
Route::get('/admin/cours/{id}/supp_cours',[CoursController::class,'suppFormCours'])->name('supp_cours');
Route::post('/admin/cours/{id}/supp_cours',[CoursController::class,'suppcours'])->name('supp_cours');
Route::get('/search_cours', [CoursController::class, 'search']);
});

///////////{{PARTI Gestionnaire}}///////////////
Route::middleware(['auth','is_gestionnaire'])->group(function(){
Route::view('/gestionnaire','gestionnaire.accueil')->name('gestionnaire.home');
//route ajoute_seance
Route::get('/gest/cours/list',[CoursController::class, 'affiche_c'])->name('liste_cours_gest');
Route::get('/gestionnaire/seances/ajoute_seance{id}',[CoursController::class,'ajoute_form'])->name('ajoute_seance');
Route::post('/gestionnaire/seances/ajoute_seance{id}',[CoursController::class,'ajouteSeance'])->name('ajoute_seance');
//affiche_liste_seances
Route::get('/gestionnaire/seances/list',[CoursController::class, 'affiche_seance'])->name('liste_seance');
//Modify_seance
Route::get('/gestionnaire/seance/{id}/modify',[CoursController::class, 'modify_form_seance'])->name('modify_seance');
Route::post('/gestionnaire/seance/{id}/modify',[CoursController::class, 'modify_seance'])->name('modify_seance');
//route supp_cours
Route::get('/gestionnaire/seances/{id}/supp_seance',[CoursController::class,'supp_form_seance'])->name('supp_seance');
Route::post('/gestionnaire/seances/{id}/supp_seance',[CoursController::class,'suppSeance'])->name('supp_seance');
//route list des seances par cours
route::get('/gestionnaire/seances_cours/list/{id}',[CoursController::class, 'listSeance'])->name('affiche_seances');

///////parti Etudiant///////////
// route affiche liste des etudiant
Route::get('/admin/etudiant/list',[EtudiantController::class, 'affiche'])->name('liste_etudiant');
// ajouter un etudiant
Route::get('/ajouteEtudiant', [EtudiantController::class,'ajoutForm'])->name('ajoute_etudiant');
Route::post('/ajouteEtudiant', [EtudiantController::class,'ajoute_etudiant'])->name('ajoute_etudaint');
//route modify un etudiant
Route::get('/admin/etudiant/{id}/modify',[EtudiantController::class, 'modify_form_etudiant'])->name('modify_etudiant');
Route::post('/admin/etudiant/{id}/modify',[EtudiantController::class, 'modify_etudiant'])->name('modify_etudiant');
//route supp_etudiant
Route::get('/admin/etudiant/{id}/supp_etudiant',[EtudiantController::class,'suppForm'])->name('supp_etudiant');
Route::post('/admin/etudiant/{id}/supp_etudiant',[EtudiantController::class,'suppEtudiant'])->name('supp_etudiant');
//recherche par le NO° de l'etudiant
Route::get('/search', [EtudiantController::class, 'search']);

//Assosier un etudiant dans un cours
Route::get('/gestionnaire/etudiant/associerEtudiant/{id}',[EtudiantController::class,'associerForm'])->name('associerEtudiant');
Route::post('/gestionnaire/etudiant/associeretudiants/{id}',[EtudiantController::class,'associerEtudiant'])->name('associerEtudiants');

//Assosier un enseignant dans un cours
Route::get('/gestionnaire/enseignant/associerEnseignant/{id}',[CoursController::class,'associerForm'])->name('associerEnseignant');
Route::post('/gestionnaire/enseignant//associerEnseignants/{id}',[CoursController::class,'associerEnseignant'])->name('associerEnseignants');

////route list des enseignants par cours
route::get('/gestionnaire/enseignant_cours/list/{id}',[CoursController::class, 'list_enseignant_cours'])->name('list_enseignant_cours');
////route list des etudiants par cours
route::get('/gestionnaire/etudiants_cours/list/{id}',[EtudiantController::class, 'list_etudiant_cours'])->name('list_etudiant_cours');

//route anuller l'association d'un enseignant
Route::get('/gestionnaire/enseignant_cours/supp_assoc/{id}',[CoursController::class,'supp_Form_assoc_ens'])->name('supp_assoc_ens');
Route::post('/gestionnaire/enseignant_cours/supp_assoc/{id}',[CoursController::class,'supp_assoc_ens'])->name('supp_assoc_ens');

//route anuller l'association d'un enseignant
Route::get('/gestionnaire/etudiant_cours/supp_assoc/{id}',[EtudiantController::class,'supp_Form_assoc_etudiant'])->name('supp_assoc_etudiant');
Route::post('/gestionnaire/etudiant_cours/supp_assoc/{id}',[EtudiantController::class,'supp_assoc_etudiant'])->name('supp_assoc_etudiant');
//liste des presance par étudiant
route::get('/gestionnaire/presence_etudiant/list/{id}',[EtudiantController::class, 'liste_presence_etudiant'])->name('list_presence_etudiant');
route::get('/gestionnaire/presence_par_seance/list/{id}',[CoursController::class, 'liste_presence_par_seance'])->name('etudiants_presence');
});

///////{{PARTI Anseignant}}/////////
Route::middleware(['auth','is_enseignant'])->group(function(){
Route::view('/enseignant','enseignant.accueil')->name('enseignant.home');
//list des cours associé
Route::get('/ens/cours/list/{id}',[CoursController::class, 'affiche_e'])->name('liste_cours_ens');
//Route::post('/gest/list/cours_associé/{id}',[CoursController::class, 'affiche_e'])->name('liste_cours_ens')->middleware('auth')->middleware('is_enseignant');
//pointage un etudiant dans un seance
Route::get('/enseignant/etudiant/pointageEtudiant/{id}',[CoursController::class,'pointageForm'])->name('pointageEtudiant');
Route::post('/enseignant/etudiant/pointageEtudiants/{id}',[CoursController::class,'pointageEtudiant'])->name('pointageEtudiants');
////liste de seance_enseignant
Route::get('/enseignant/seances/list/{id}',[CoursController::class, 'seance_ens'])->name('liste_seance_ens');
route::get('/enseignant/etudiants_cours/list/{id}',[EtudiantController::class, 'list_etudiant_cours'])->name('list_etudiant_cours');
});