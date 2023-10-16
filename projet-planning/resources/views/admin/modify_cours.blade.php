@extends('modele')

@section('title', 'Modifier le cours')

@section('container')

<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Modification du cours</p>

        <form action="{{route('modify_cours',['id'=>$cours->id])}}" method="POST">
            <p><input type="text" name="intitule" value="{{$cours->intitule}}"></p>
            <p><input type="submit" name="Modifier"  value="Modifier"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
@endsection