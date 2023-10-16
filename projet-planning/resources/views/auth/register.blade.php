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
            <p><input type="submit" name="Envoyer" value="Envoyer"></p>
            @csrf
        </form>
        <button id="Anuller">
                    <a href= "{{route('home')}}" id="button_anuller">Anuller</a>
                </button>
        </div>
    </div>
@endsection
