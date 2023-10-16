@extends('modele')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Choisir un enseignant pour ce cours {{$cours->intitule}}</p>
        <form action="{{route('associerEnseignants',['id'=>$cours->id])}}" method="post">
            <select name="user_id" >
                <option value="">--choisir un enseignant--</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->prenom}}</option>
                        
                    @endforeach
            </select>
            <p><input type="submit" name="Associer" value="Associer"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
@endsection 