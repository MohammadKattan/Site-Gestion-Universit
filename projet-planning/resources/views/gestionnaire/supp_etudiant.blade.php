@extends('modele')
@section('title','Supprimer_etudiant')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Voulez-vous vraiment supprimer cet etudiant? {{$etudiants->nom}}</p>
        <form action="{{route('supp_etudiant',['id'=>$etudiants->id])}}" method="POST">
            <p><input type="submit" name="Supprimer" value="Supprimer"></p>
            <p><input type="submit" name="Anuller" value="Anuller"></p>
            @csrf
        </form>
    </div>
</div>
{{-- <a href="{{route('liste_etudiant')}}"> <button>
    Non
    </button>
</a> --}}
        

@endsection