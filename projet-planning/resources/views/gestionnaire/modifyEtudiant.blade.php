@extends('modele')
@section('title', 'Modifier un Etudiant')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Modification un etudiant</p>
        <form action="{{route('modify_etudiant',['id'=>$etudiants->id])}}" method="post">
            <p><input type="text" name="nom" placeholder="Nom" value="{{$etudiants->nom}}"></p>
            <p><input type="text" name="prenom" placeholder="Prenom" value="{{$etudiants->prenom}}"></p>
            <p><input type="text" name="noet" placeholder="Noet" value="{{$etudiants->noet}}"></p>
            <p><input type="submit" name="Modifier" value="Modifier"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
@endsection
