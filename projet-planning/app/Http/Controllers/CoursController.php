<?php

namespace App\Http\Controllers ; 

use App\Models\Cours;
use App\Models\Seance;
use App\Models\CourUser;
use App\Models\Etudiant;
use App\Models\Presence;
use App\Models\Cour_Etudiant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CoursController extends Controller
{
    //fonction permettant d'afficher la liste des cours
    public function affiche(){
        $cour= Cours::simplePaginate(3);
        return view('admin.liste_cours',['cours' => $cour]);
    }
    //fonction permettant d'avoir le formulaire pour modifier Nom/prenom
    public function modify_form_cours($id){
        $cour=Cours::findOrFail($id);
        return view('admin.modify_cours', ['cours'=>$cour]);
        }
    
        //fonction permettant de modifier un cours
    public function modify_cours(Request $request, $id){
        $cour=Cours::findOrFail($id);
        if($request->has('Modifier')) {
    
                $v = $request->validate(
                    [
                        'intitule' => 'required|string|max:255|unique:users',
                    ]
                );
                $cour->intitule = $v['intitule'];
                $cour->updated_at = now();
                $cour->save();
    
                $request->session()->flash('etat', 'cours modifie');
    
            } else {
                $request->session()->flash('etat', 'Modification annullee' );
            }
            return redirect()->route('liste_cours');
        }
        //fonction permettant d'afficher le form pour delete un cours
        public function suppFormCours( $id){
            $cour = Cours::find($id);
            return view('admin.supp_cours',['cours'=>$cour]);
        }
        //fonction permettant de supprimer un cours
        public function suppCours(Request $request, $id){
            $cour = Cours::findOrFail($id);
            if($request->has('Supprimer')){

            $cour->delete($id);
            $request->session()->flash('etat', 'cours supprimer');
            
        }else {
                $request->session()->flash('etat', 'Supprimation annullee' );
            }return redirect(route('liste_cours'));
    }
        //Form  ajoute un cours
        public function showForm(){
        return view('admin.ajoute_cours');
    }

    // ajoute un cours
    public function ajouteCours(Request $request){
        $request->validate([
            'intitule' => 'required|string|max:255|unique:users',
        ]);

        $cour = new Cours();
        $cour->intitule = $request->intitule;
        $cour->created_at = now();
        $cour->save();
        
        session()->flash('etat','Cours added');

        return redirect()->route('liste_cours');
    }
    // recherche par l'intitule
    public function search(){
        $search_text = $_GET['query'];
        $cour = Cours:: where('intitule','LIKE','%'.$search_text.'%')->get();
        return view('admin.search_cours',compact('cour'));
    }

    /////////parti des seances
    public function affiche_c(){
        $cour = Cours::simplePaginate(3);
        return view('gestionnaire.seances.liste_cours',['cours'=>$cour]);
    }
    public function ajoute_form($id){
        $cour = Cours::findOrfail($id);
        return view('gestionnaire.seances.ajoute_seance',['cours'=>$cour]);
    }
    public function ajouteSeance(Request $request,$id){
        if($request->has('Ajouter')){
            $request->validate([
                'cours'=> 'required|string|max:255',
                'date_debut'=> 'required|date',
                'date_fin'=> 'required|date',
            ]);
            $seance = new Seance();
            $seance->cours_id = $request->id;
            $seance->date_debut = $request->date_debut;
            $seance->date_fin = $request->date_fin;
            $seance->save();
            $request->session()->flash('etat','seance ajouté');
        }else{
            $request->session()->flash('etat', 'ajoute_seance annullee' );
        }
        return redirect()->route('liste_cours_gest');
    }
    public function affiche_seance(){
        $seance = Seance::simplePaginate(2);
        return view('gestionnaire.seances.liste_seance',['seances'=>$seance]);
    }
    // Modifier un Seance
    public function modify_form_seance($id){
        $seance=Seance::findOrFail($id);
        return view('gestionnaire.seances.modify_seance', ['seances'=>$seance]);
        }
    
        //fonction permettant de modifier les Nom/prenom
    public function modify_seance(Request $request, $id){
        $seance=Seance::findOrFail($id);
        if($request->has('Modifier')) {
    
                $v = $request->validate(
                    [
                        // 'cours'=> 'required|string|max:255',
                        'date_debut'=> 'required|date',
                        'date_fin'=> 'required|date',
                    ]
                );
                // $seance->cours_id = $v['cours_id'];
                $seance->date_debut= $v['date_debut'];
                $seance->date_fin = $v['date_fin'];
                $seance->save();
    
                $request->session()->flash('etat', 'seance modifie');
    
            } else {
                $request->session()->flash('etat', 'Modification annullee' );
            }
            return redirect()->route('liste_seance');
        }
        //fonction permettant d'afficher le form pour delete un seance
        public function supp_form_seance( $id){
            $seance = Seance::find($id);
            return view('gestionnaire.seances.supp_seance',['seances'=>$seance]);
        }
        //fonction permettant de supprimer un seance
        public function suppSeance(Request $request, $id){
            $seance = Seance::findOrFail($id);
            if($request->has('Supprimer')){

            $seance->delete($id);
            $request->session()->flash('etat', 'seance supprimer');
            
        }else {
                $request->session()->flash('etat', 'Supprimation annullee' );
            }return redirect(route('liste_seance'));
    }
    //liste des seances par un cours
    public function listSeance(Request $request, $id){
        $seance =Seance::where('cours_id','=',$id)->simplePaginate(3);
        return view('gestionnaire.seances.liste_seance',['seances'=>$seance]);
    }

    //liste des enseignant par un cours
    public function list_enseignant_cours(Request $request, $id){
        $cour = Cours::findOrFail($id);
        $c =CourUser::where('cours_id','=',$id)->get();
        return view('gestionnaire.liste_enseignant_cours',['users'=>$c,'cours'=>$cour]);
    }
    ////associer un enseignant dans un cours
    public function associerForm($id){
        $cour=Cours::findOrFail($id);
        $user = User::where('type', 'enseignant')->get();
        
        return view('gestionnaire.associer_enseignant', ['cours'=>$cour, 'users'=>$user]);
    }
    public function associerEnseignant(Request $request,$id)
    {
        $cour = Cours::findOrFail($id);
        $user_id= $request->user_id;
        $user= User::where('id',$user_id)->get();
        $cour->user()->attach($user);
        $cour->save();
        $request->session()->flash('etat','enseignant associé');
        return redirect()->route('liste_cours_gest');
    }
    //fonction permettant d'afficher le form pour anuller l'association d'un  enseighant
        public function supp_Form_assoc_ens($id){
            $c = Couruser::where('user_id','=',$id)->get();
            return view('gestionnaire.supp_enseignant_cours',['users'=>$id]);
        }
        //fonction permettant de anuller l'association d'un  enseighant
        public function supp_assoc_ens(Request $request, $id){
            $c = Couruser::where('user_id','=',$id)->get();
            //dd($c);
            
            
            if($request->has('Supprimer')){
                foreach($c as $cours_user){
                    $cour = Cours::findOrFail($cours_user->cours_id);
                    $user= User::findOrFail($id);
                    $cour->user()->detach($user);
                // $cours_user->delete();
            }
            
            $request->session()->flash('etat', 'Association anullée');
            
        }else {
                $request->session()->flash('etat', 'Supprimation annullee' );
            }return redirect()->route('liste_cours_gest');
    }


    //////parti enseignant 
    public function affiche_e($id){
        $user = User::where('id', $id)->first();
        $cour = $user->Cours;
        return view('enseignant.list_cours_associe',['cours'=>$cour]);
    }
    public function pointageForm($id){
        $seance=Seance::findOrFail($id);
        $etudiant = Etudiant::all();
        return view('enseignant.pointage_etudiant', ['seances'=>$seance, 'etudiants'=>$etudiant]);
    }
    public function pointageEtudiant(Request $request,$id)
    {
        $seance = Seance::findOrFail($id);
        $etudiant_id= $request->etudiant_id;
        $etudiant= Etudiant::where('id',$etudiant_id)->get();
        $seance->etudiants()->attach($etudiant);
        $seance->save();
        $request->session()->flash('etat','etudiant pointé');
        return redirect()->route('enseignant.home');
    }

    public function seance_ens( $id){
        $seance =Seance::where('cours_id','=',$id)->simplePaginate(3);
        return view('enseignant.liste_seance_ens',['seances'=>$seance]);
    }
    //// liste des etudiants presentés par un seance
    public function liste_presence_par_seance($id){
        $seance = Seance::findOrFail($id);
        $c =Presence::where('seance_id','=',$id)->get();
        return view('gestionnaire.seances.liste_etudiants_presence',['presences'=>$c,'seances'=>$seance]);
    }
}