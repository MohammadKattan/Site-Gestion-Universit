@extends('modele')
@section('container')


<div id="liste_back">
<table>
    <thead>
        <h1><u>Table des etudiants</u></h1>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>noet</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Modifier</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etudiant as $etudiant)
        <tr><td>{{$etudiant->id }}</td>
            <td>{{$etudiant->nom }}</td>
            <td>{{$etudiant->prenom }}</td>
            <td>{{$etudiant->noet }}</td>
            <td>{{$etudiant->created_at }}</td>
            <td>{{$etudiant->updated_at }}</td>
            <td>
            <button>
                <a href= "{{route('modify_etudiant',['id'=>$etudiant->id])}}">modifier</a>
            </button>
            </td>
            <td>
                <button>
                    <a href="{{route('supp_etudiant',['id'=>$etudiant->id])}}">Supprimer</a>
                </button>
            </td>
        @endforeach
    </tbody>
</table>
</div>
<a href="{{route('liste_etudiant')}}"><button>liste_etudiant</button></a>
@endsection