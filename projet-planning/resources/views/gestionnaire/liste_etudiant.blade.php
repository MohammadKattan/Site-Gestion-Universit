@extends('modele')
@section('container')

<form type ="get" action="{{url('/search') }}" >
    <input type="search" name="query" placeholder="NO° de l'etudiant" required/>
    <button type="submit">Search</button>
</form>
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
                <th>liste des presences en seances</th>
                <th>Modifier</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{$etudiant->id }}</td>
                <td>{{$etudiant->nom }}</td>
                <td>{{$etudiant->prenom }}</td>
                <td>{{$etudiant->noet }}</td>
                <td>{{$etudiant->created_at }}</td>
                <td>{{$etudiant->updated_at }}</td>
                <td>
                    <button>
                        <a href="{{route('list_presence_etudiant',['id'=>$etudiant->id])}}">liste des presences</a>
                    </button>
                </td>
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
    <button><a href= "{{route('ajoute_etudiant')}}">ajouter un etudiant</a></button>
    <br>
    <br>{{$etudiants->links()}}
</div>
<br>
<a href="{{route('gestionnaire.home')}}"><button>retour</button></a>
@endsection