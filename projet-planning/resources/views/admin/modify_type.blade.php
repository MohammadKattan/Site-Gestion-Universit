@extends('modele')

@section('title', 'Modifier le type')
@section('container')

<div id="wrapper">
    <div id="ajouter_form_div">
            <p id="ajouter_label">Modification de le type</p>
        <form action="{{route('modify_type',['id'=>$user->id])}}" method="post">
            <p><input type="text" name="nom" placeholder="Nom" value="{{$user->nom}}"></p>
            <p><input type="text" name="prenom" placeholder="Prenom" value="{{$user->prenom}}"></p>
            <p><select name="type">
                <option value="">--Please choose the type--</option>
                <option value="admin">Admin</option>
                <option value="gestionnaire">Gestionnaire</option>
                <option value="enseignant">Enseignant</option>
            </select></p>
            <p><input type="submit" name="Modifier" value="Modifier"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
@endsection
