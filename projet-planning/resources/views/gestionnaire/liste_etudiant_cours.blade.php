@extends('modele')
@section('container')

<div id="liste_back">
    <table>
        <thead>
            <h1> <u>Table des etudiants pour le cours {{$cours->intitule}}</u></h1>
            <tr>
                <th>Intitule</th>
                <th>etudiant_id</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{$cours->intitule}}</td>
                <td>{{$etudiant->etudiant_id }}</td>
                <td>
                    <button>
                        <a href="{{route('supp_assoc_etudiant',$etudiant->etudiant_id)}}">Supprimer</a>
                    </button>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
{{-- <a href="{{route('liste_cours_gest')}}"><button>retour</button></a> --}}
@endsection