@extends('modele')
@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Ajout un etudiant</p>
        <form method="post">
            <p><input type="text" name="nom" placeholder="Nom" value="{{old('nom')}}" required ></p>
            <p><input type="text" name="prenom" placeholder="Prenom" value="{{old('prenom')}}" required></p>
            <p><input type="text" name="noet" placeholder="Noet" value="{{old('noet')}}" required></p>
            <p><input type="submit" name="Envoyer" value="Ajouter"></p>
            
            @csrf
        </form>
        <button id="Anuller">
                    <a href= "{{route('liste_etudiant')}}" id="button_anuller">Anuller</a>
                </button>
    </div>
</div>
@endsection