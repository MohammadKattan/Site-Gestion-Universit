@extends('modele')

@section('title','Supprimer')

@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Voulez-vous vraiment supprimer le user? {{$user->login}}</p>
        <form action="{{route('supp_user',['id'=>$user->id])}}" method="POST">
            <p><input type="submit" name="Supprimer" value="Supprimer"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>

@endsection