@extends('modele')

@section('container')
    <div id="wrapper">
            <div id="ajouter_form_div">
                <p id="ajouter_label">Ajout un cours</p>
                <form method="post">
                    <p><input type="text" name="intitule" placeholder="Intitule" value="{{old('intitule')}}" required ></p>
                    <p><input type="submit" value="Envoyer"></p>
                    @csrf
                </form>
                <button id="Anuller">
                    <a href= "{{route('liste_cours')}}" id="button_anuller">Anuller</a>
                </button>
            </div>
    </div>
@endsection