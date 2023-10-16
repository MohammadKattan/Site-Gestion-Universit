@extends('modele')

@section('title', 'Modifier un user')
@section('container')

<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Modification de le nom et prenom</p>
        <form action="{{route('modify_form',['id'=>$user->id])}}" method="post">
            <p><input type="text" name="nom" value="{{$user->nom}}"></p>
            <p><input type="text" name="prenom" value="{{$user->prenom}}"></p>
            <p><input type="submit" name="Modifier" value="Modifier"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
@endsection
