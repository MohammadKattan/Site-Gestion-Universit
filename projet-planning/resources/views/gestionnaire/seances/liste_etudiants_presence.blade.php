@extends('modele')
@section('container')

<div id="liste_back">
    <table>
        <thead>
            <h1> <u>Table des étudiants presentés  pour la seance  {{$seances->id }}</u></h1>
            <tr>
                <th>seance_id</th>
                <th>etudiant_id</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
            <tr>
                <td> {{$seances->id }} </td> 
                <td>{{$presence->etudiant_id }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<br>
<a href="{{route('liste_seance')}}"><button>retour</button></a>
@endsection