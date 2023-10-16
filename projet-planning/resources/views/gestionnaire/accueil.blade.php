@extends('modele')
@section('container')
<p>page d'eccueil grestionaire</p>
<button>
    <a href="{{route('auth.modif_mdp')}}">changer votre mdp</a>
</button>
<button>
        <a href= "{{route('modify_form',['id'=>Auth::user()->id])}}">modification</a>
    </button>
    <button>
        <a href= "{{route('liste_etudiant')}}">Liste des etudiants</a>
    </button>
    <button>
        <a href= "{{route('liste_cours_gest')}}">Liste des cours</a>
    </button>
    <button>
        <a href= "{{route('liste_seance')}}">Liste des seances</a>
    </button>
@endsection