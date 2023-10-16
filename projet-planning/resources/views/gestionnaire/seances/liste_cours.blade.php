@extends('modele')

@section('container')
<div id="liste_back">
<h1> <u>Table des cours</u></h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Intitule</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>liste_des_seances</th>
            <th>Ajoute_seance</th>
            <th>Associe un etudiant</th>
            <th>Associe un enseignant</th>
            <th>enseignants associés</th>
            <th>etudiants associés</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cours as $cour)
        <tr>
            <td>{{$cour->id }}</td>
            <td>{{$cour->intitule }}</td>
            <td>{{$cour->created_at }}</td>
            <td>{{$cour->updated_at }}</td>
            <td>
                <button>
                    <a href= "{{route('affiche_seances',['id'=>$cour->id])}}">liste_des_seances</a>
                </button>
            </td>
            <td>
                <button>
                    <a href= "{{route('ajoute_seance',['id'=>$cour->id])}}">ajoute_seance</a>
                </button>
            </td>
            <td>
                <button>
                    <a href= "{{route('associerEtudiant',['id'=>$cour->id])}}">Associe un etudiant</a>
                </button>
            </td>
            <td>
                <button>
                    <a href= "{{route('associerEnseignant',['id'=>$cour->id])}}">Associe un enseignant</a>
                </button>
            </td>
            <td>
                <button>
                    <a href= "{{route('list_enseignant_cours',['id'=>$cour->id])}}">enseignants associés</a>
                </button>
            </td>
            <td>
                <button>
                    <a href= "{{route('list_etudiant_cours',['id'=>$cour->id])}}">etudiants associés</a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>{{$cours->links()}}
</div>
<br>
<a href="{{route('gestionnaire.home')}}"><button>retour</button></a>
@endsection