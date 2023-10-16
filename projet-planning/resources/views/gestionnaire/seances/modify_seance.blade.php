@extends('modele')
@section('title', 'Modifier un seance')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Modification un seance</p>
        <form action="{{route('modify_seance',['id'=>$seances->id])}}" method="post">
            {{-- <select name="cours_id" id="">
                <option value="">--choisir le cours--</option>
                    @foreach($cours as $cour)
                        <option value="{{$cour->$id}}">{{$cour->intitule}}</option>
                    @endforeach
            </select> --}}
            <p><input type="datetime-local" name="date_debut"></p>
            <p><input type="datetime-local" name="date_fin"></p>
            <p><input type="submit" name="Modifier" value="Modifier"></p>
            <p><input type="submit" name="Annuler" value="Annuler"></p>
            @csrf
        </form>
    </div>
</div>
@endsection
