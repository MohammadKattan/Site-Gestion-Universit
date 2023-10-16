@extends('modele')

@section('container')
    <p>Page d' accueil admin.</p>
    <button>
    <a href="{{route('auth.modif_mdp')}}">changer votre mdp</a>
    </button>
    <button>
        <a href= "{{route('modify_form',['id'=>Auth::user()->id])}}">modifier Nom/Prenom</a>
    </button>
    <button>
        <a href= "{{route('liste_users')}}">Liste des users & Not users</a>
    </button>
    <button>
        <a href= "{{route('liste_cours')}}">Liste des cours</a>
    </button>
@endsection
{{-- /////////// --}}
