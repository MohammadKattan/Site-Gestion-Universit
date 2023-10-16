@extends('modele')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Choisir un etudiant pour ce cours {{$cours->intitule}}</p>
        <form action="{{route('associerEtudiants',['id'=>$cours->id])}}" method="post">
            <select name="etudiant_id" >
                <option value="">--choisir l'etudiant--</option>
                    @foreach($etudiants as $etudiant)
                        <option value="{{$etudiant->id}}">{{$etudiant->prenom}}</option>
                    @endforeach
            </select>
            <p><input type="submit" name="Associer" value="Associer"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
