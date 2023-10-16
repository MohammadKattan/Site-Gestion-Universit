<?php

namespace App\Http\Controllers;
use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Cour_Etudiant;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EtudiantController extends Controller
{
   //fonction permettant d'afficher la liste des etudianst
    public function affiche(){
        $etudiant= DB::table('etudiants')->simplePaginate(3);
        return view('gestionnaire.liste_etudiant',['etudiants' => $etudiant]);
    }
    //fonction permettant d'avoir le formulaire pour modifier etudiant
    public function modify_form_etudiant($id){
        $etudiant=Etudiant::findOrFail($id);
        return view('gestionnaire.modifyEtudiant', ['etudiants'=>$etudiant]);
        }
    
        //fonction permettant de modifier les Nom/prenom
    public function modify_etudiant(Request $request, $id){
        $etudiant=Etudiant::findOrFail($id);
        if($request->has('Modifier')) {
                $v = $request->validate(
                    [
                        'nom' => 'required|string|max:255',
                        'prenom' => 'required|string|max:255',
                        'noet' => 'required|string|max:255|unique:etudiants',
                    ]
                );
                $etudiant->nom = $v['nom'];
                $etudiant->prenom = $v['prenom'];
                $etudiant->noet = $v['noet'];
                $etudiant->updated_at = now();
                $etudiant->save();
    
                $request->session()->flash('etat', 'etudiant modifie');
    
            } else {
                $request->session()->flash('etat', 'Modification annullee' );
            }
            return redirect()->route('liste_etudiant');
        }
        //fonction permettant d'afficher le form pour supprimer un etudiant
        public function suppForm( $id){
            $etudiant = Etudiant::find($id);
            return view('gestionnaire.supp_etudiant',['etudiants'=>$etudiant]);
        }
        //fonction permettant de supprimer qqn
        public function suppEtudiant(Request $request, $id){
            $etudiant =Etudiant::findOrFail($id);
            if($request->has('Supprimer')) {
            $etudiant->delete($id);
            $request->session()->flash('etat', 'Etudiant supprimer');
            }else{
                $request->session()->flash('etat', 'Supprimation anullée');
            }
            return redirect()->route('liste_etudiant');
        }
        /////fonction ajout un etudiant
        public function ajoutForm(){
        return view('gestionnaire.ajoute_etudiant');
    }
    public function ajoute_etudiant(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'noet' => 'required|string|max:255|unique:etudiants',
        ]);
        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->noet = $request->noet;
        $etudiant->created_at = now();
        $etudiant->save();
        $request->session()->flash('etat','Etudaint added');
    
        return redirect()->route('liste_etudiant');
    }
    // recherche par le NO° de l'etudiant
    public function search(){
        $search_text = $_GET['query'];
        $etudiant = Etudiant:: where('noet','LIKE','%'.$search_text.'%')->get();
        return view('gestionnaire.search_etudiant',compact('etudiant'));
    }
    //Asoosier etudiant dans un cours
    public function associerForm($id){
        $cour=Cours::findOrFail($id);
        $etudiant=Etudiant::all();
        return view('gestionnaire.associer_etudiant', ['cours'=>$cour, 'etudiants'=>$etudiant]);
    }
    public function associerEtudiant(Request $request,$id)
    {
        $cour = Cours::findOrFail($id);
        if($request->has('Associer')){
        $etudiant_id=$request->etudiant_id;
        $etudiant=Etudiant::where('id',$etudiant_id)->get();
        $cour->etudiants()->attach($etudiant);
        $cour->save();
        $request->session()->flash('etat','Etudaint associé');
        }else{
            $request->session()->flash('etat','association anullée');
        }
        return redirect()->route('liste_cours_gest');
    }
    //liste des etudiants par un cours
    public function list_etudiant_cours($id){
        $cour = Cours::findOrFail($id);
        $c =Cour_Etudiant::where('cours_id','=',$id)->simplePaginate(3);
        return view('gestionnaire.liste_etudiant_cours',['etudiants'=>$c,'cours'=>$cour]);
    }
    //fonction permettant d'afficher le form pour anuller l'association d'un  etudiant
        public function supp_Form_assoc_etudiant($id){
            $c = Cour_Etudiant::where('etudiant_id','=',$id)->get();
            return view('gestionnaire.supp_etudiant_cours',['etudiants'=>$id]);
        }
        //fonction permettant de anuller l'association d'un  etudiant
        public function supp_assoc_etudiant(Request $request, $id){
            $c = Cour_Etudiant::where('etudiant_id','=',$id)->get();;
            if($request->has('Supprimer')){
            foreach($c as $cours_etudiant){
                    $cour = Cours::findOrFail($cours_etudiant->cours_id);
                    $etudiant= Etudiant::findOrFail($id);
                    $cour->etudiants()->detach($etudiant);
            }
            $request->session()->flash('etat', 'Association anullée');
            
        }else {
                $request->session()->flash('etat', 'Supprimation annullee' );
            }return redirect()->route('liste_cours_gest');
    }
    

    //// liste des seance pointer par un étudiant
    public function liste_presence_etudiant($id){
        $etudiant = Etudiant::findOrFail($id);
        $c =Presence::where('etudiant_id','=',$id)->get();
        return view('gestionnaire.liste_presence_etudiant',['presences'=>$c,'etudiants'=>$etudiant]);
    }
}

