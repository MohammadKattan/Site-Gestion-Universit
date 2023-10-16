@extends('modele')
@section('container')
<p>page d'eccueil enseignant</p>
<button>
    <a href="{{route('auth.modif_mdp')}}">changer votre mdp</a>
    </button>
<button>
        <a href= "{{route('modify_form',['id'=>Auth::user()->id])}}">modification</a>
    </button>
    <button>
        <a href= "{{route('liste_cours_ens',['id'=>Auth::user()->id])}}">list_cours_associés</a>
    </button>
@endsection