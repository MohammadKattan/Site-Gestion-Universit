@extends('modele')

@section('title', 'Ajouter un seance')
@section('container')

<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Ajouter un seance</p>
    <form action="{{route('ajoute_seance',['id'=>$cours->id])}}" method="post">
        <p><input type="text" name="cours" value="{{old('intitule',$cours->intitule)}}" readonly="readonly" ></p>
        <p><input type="datetime-local" name="date_debut"></p>
        <p><input type="datetime-local" name="date_fin"></p>
        <p><input type="submit" name="Ajouter" value="Ajouter"></p>
        <p><input type="submit" name="Annuler" value="Annuler"></p>
        @csrf
    </form>
    </div>
</div>
@endsection
