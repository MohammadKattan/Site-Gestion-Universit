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
                <th>liste presence des étudiants</th>
                <th>Modifier</th>
                <th>Supprimer</th>
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
                        <a href= "{{route('etudiants_presence',['id'=>$seance->id])}}">étudiants presentés</a>
                    </button>
                </td>
                <td>
                    <button>
                        <a href= "{{route('modify_seance',['id'=>$seance->id])}}">modifier</a>
                    </button>
                </td>
                <td>
                    <button>
                        <a href="{{route('supp_seance',['id'=>$seance->id])}}">Supprimer</a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{$seances->links()}}
</div>
<br>
<a href="{{route('gestionnaire.home')}}"><button>retour</button></a>
@endsection