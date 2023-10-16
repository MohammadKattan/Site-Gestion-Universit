@extends('modele')
@section('title','Supprimer_lassociation')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Voulez-vous vraiment anuller l'association de cet enseignant? {{$users}}</p>
        <form action="{{route('supp_assoc_ens',$users)}}" method="POST">
            <p><input type="submit" name="Supprimer" value="Supprimer"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>

@endsection