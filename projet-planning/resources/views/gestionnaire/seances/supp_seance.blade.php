@extends('modele')
@section('title','Supprimer_seance')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Voulez-vous vraiment supprimer cette seance? {{$seances->id}}</p>
        <form action="{{route('supp_seance',['id'=>$seances->id])}}" method="POST">
            <p><input type="submit" name="Supprimer" value="Supprimer"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>

@endsection