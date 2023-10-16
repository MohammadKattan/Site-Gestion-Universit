@extends('modele')
@section('container')

<div id="liste_back">
    <table>
        <thead>
            <h1> <u>Table des presences pour l'étudiant {{$etudiants->nom }}{{$etudiants->prenom }}</u></h1>
            <tr>
                <th>nom/prenom étudiant</th>
                <th>seance_id</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
            <tr>
                <td> {{$etudiants->nom }} {{$etudiants->prenom }} </td> 
                <td>{{$presence->seance_id }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<a href="{{route('liste_etudiant')}}"><button>retour</button></a>
@endsection