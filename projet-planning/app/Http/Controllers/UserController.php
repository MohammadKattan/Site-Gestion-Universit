<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
   //fonction permettant d'afficher la liste des users
    public function affiche(){
        $user= DB::table('users')->where('type','!=',NULL)->simplePaginate(3);
        return view('admin.liste_users',['users' => $user]);
    }
    // fonction permettant d'afficher la liste des enseignants
    public function affiche_enseignant(){
        $user= DB::table('users')->where('type', '=', 'enseignant')->simplePaginate(3);;
        return view('admin.liste_users',['users' => $user]);
    }

    //fonction permettant d'afficher la liste des gestionnaires
    public function affiche_gestionnaire(){
        $user= DB::table('users')->where('type', '=', 'gestionnaire')->simplePaginate(3);;
        return view('admin.liste_users',['users' => $user]);
    }
    //fonction permettant d'afficher la liste des utilisateus de type NULL
    public function affiche_user_null(){
        $user= DB::table('users')->where('type', '=', NULL)->simplePaginate(3);;
        return view('admin.liste_users',['users' => $user]);
    }
    // fonction permettant de recherche un user par nom/prenom/login
    public function search(){
        $search_text = $_GET['query'];
        $user = User:: where('login','LIKE','%'.$search_text.'%')
        ->orwhere('prenom','LIKE','%'.$search_text.'%')
        ->orwhere('login','LIKE','%'.$search_text.'%')
        ->get();
        return view('admin.search_user',compact('user'));
    }
    
    //fonction permettant d'avoir le formulaire pour modifier Nom/prenom
    public function modify_form_type($id){
        $user=User::findOrFail($id);
        return view('admin.modify_type', ['user'=>$user]);
        }
    
        //fonction permettant de modifier les Nom/prenom
    public function modify_type(Request $request, $id){
        $user=User::findOrFail($id);
        if($request->has('Modifier')) {
    
                $v = $request->validate(
                    [
                        'nom' => 'required|string|max:255',
                        'prenom' => 'required|string|max:255',
                        'type' => 'required',
                    ]
                );
                $user->nom = $v['nom'];
                $user->prenom = $v['prenom'];
                $user->type = $v['type'];
                $user->save();
    
                $request->session()->flash('etat', 'user_type modifie');
    
            } else {
                $request->session()->flash('etat', 'Modification annullee' );
            }
            return redirect(route('liste_users'));
        }
        //fonction permettant d'afficher le form pour delete qqn
        public function suppForm( $id){
            $user = User::find($id);
            return view('admin.supp_form',['user'=>$user]);
        }
        //fonction permettant de supprimer qqn
        public function suppUser(Request $request, $id){
            $user = User::findOrFail($id);
            if($request->has('Supprimer')){
            $user->delete($id);
            $request->session()->flash('etat', 'user supprimer');
            
            }else {
                $request->session()->flash('etat', 'supprimation annullee' );
            }return redirect(route('liste_users'));
    }
}
