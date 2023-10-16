@extends('modele')
@section('container')

<div id="liste_back">
    <table>
        <thead>
            <h1> <u>Table des seances</u></h1>
            <tr>
                <th>Id</th>
                <th>Cours</th>
                <th>Date_debut</th>
                <th>Date_fin</th>
                <th>Pointer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seances as $seance)
            <tr>
                <td>{{$seance->id }}</td>
                <td>{{$seance->cours_id }}</td>
                <td>{{$seance->date_debut }}</td>
                <td>{{$seance->date_fin }}</td>
                <td>
                <button>
                    <a href= "{{route('pointageEtudiant',['id'=>$seance->id])}}">pointer un etudiant</a>
                </button>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$seances->links()}}
</div>

<br>
<a href="{{route('enseignant.home')}}"><button>retour</button></a>
@endsection