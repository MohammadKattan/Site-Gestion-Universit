<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function showForm(){
        return view('auth.login');
    }

    // login action
    public function login(Request $request){
        
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
            ]);

        
        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp') ];

        if (Auth::attempt($credentials)&& $type=Auth::user()->type=='admin') {
            $request->session()->regenerate();
            $request->session()->flash('etat','Login successful');
            return redirect()->route('admin.home');
        }else if (Auth::attempt($credentials)&& $type=Auth::user()->type=='gestionnaire') {
            $request->session()->regenerate();

            $request->session()->flash('etat','Login successful');

            return redirect()->route('gestionnaire.home');
        }else if (Auth::attempt($credentials)&& $type=Auth::user()->type=='enseignant') {
            $request->session()->regenerate();

            $request->session()->flash('etat','Login successful');

            return redirect()->route('enseignant.home');
        }
        else if(Auth::attempt($credentials)&& $type=Auth::user()->type == NULL){
            Auth::logout();
            return back()->withErrors([
            'login' => 'you do not yet have access authorization',
            ]);}
        
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    // logout action
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
//fonction form. change mdp
    public function showChangePasswordGet() {
        return view('auth.modif_mdp');
    }
//fonction permettant la modification avec validation du mdp
    public function changePasswordPost(Request $request) {

        if($request->has('Modifier')) {
            $v = $request->validate([
                'mdp' => 'required|string|confirmed',
            ]);
            $user = Auth::user();
            $user->mdp = Hash::make($request->mdp);
            $user->save();

            session()->flash('etat','mdp modifié ');
        }else{
            session()->flash('etat', 'Modification anullée');
        }
        return redirect()->route('home');
    }
    //fonction permettant d'avoir le formulaire pour modifier Nom/prenom
    public function modify_form($id){
        $user=User::findOrFail($id);
        return view('auth.modify', ['user'=>$user]);
        }
    
        //fonction permettant de modifier les Nom/prenom
    public function modify(Request $request, $id){
        $user=User::findOrFail($id);
        if($request->has('Modifier')) {
    
                $v = $request->validate(
                    [
                        'nom' => 'required',
                        'prenom' => 'required',
                    ]
                );
                $user->nom = $v['nom'];
                $user->prenom = $v['prenom'];
    
                $user->save();
    
                $request->session()->flash('etat', 'user modifie');
    
            } else {
                $request->session()->flash('etat', 'Modification annullee' );
            }
            return redirect()->route('home');
        }
}