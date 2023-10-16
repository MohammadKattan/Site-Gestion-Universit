<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function showForm(){
        return view('auth.register');
    }
    public function store(Request $request){
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mdp' => 'required|string|confirmed'//|min:8',
        ]);
        $user = new User();
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mdp = Hash::make($request->mdp);
        $user->type = NULL;
        
        $user->save();
        
        $request->session()->flash('etat','User added');
    
        return redirect(RouteServiceProvider::HOME);
    }
    public function ajouteForm(){
        return view('admin.ajout_user');
    }
    // ajouter un usrer par l'admin
    public function ajouteUser(Request $request){
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mdp' => 'required|string|confirmed',//|min:8'
            'type'=> 'required',
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mdp = Hash::make($request->mdp);
        $user->type = $request->type;
        
        $user->save();
        
        session()->flash('etat','User added');

        return redirect(route('liste_users'));
    }

}
