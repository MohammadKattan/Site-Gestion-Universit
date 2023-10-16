@extends('modele')

@section('container')
    <div id="wrapper">
        <div id="ajouter_form_div">
            <p id="ajouter_label">Ajout un user</p>
        <form method="post">
            <p><input type="text" name="login" placeholder="Login" value="{{old('login')}}" required ></p>
            <p><input type="text" name="nom" placeholder="Nom" value="{{old('nom')}}" required ></p>
            <p><input type="text" name="prenom" placeholder="Prenom" value="{{old('prenom')}}" required></p>
            <p><input type="password" placeholder="Password" name="mdp" required></p>
            <p><input type="password" placeholder="Confirmarion MDP" name="mdp_confirmation" required></p>
            <p><select name="type">
            <option value="">--Please choose the type--</option>
            <option value="admin">Asdmin</option>
            <option value="gestionnaire">Gestionnaire</option>
            <option value="enseignant">Enseignant</option>
        </select></p>
            <p><input type="submit" value="Envoyer"></p>
            @csrf
        </form>
        <button id="Anuller">
                    <a href= "{{route('liste_users')}}" id="button_anuller">Anuller</a>
        </button>
        </div>
    </div>
@endsection