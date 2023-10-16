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
            <th>list des seances</th>
            <th>étuidants_inscrits</th>
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
                    <a href= "{{route('liste_seance_ens',['id'=>$cour->id])}}">liste_des_seances</a>
                </button>
            </td>
            <td>
                <button>
                    <a href= "{{route('list_etudiant_cours',['id'=>$cour->id])}}">étuidants_inscrits</a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<br>
<a href="{{route('enseignant.home')}}"><button>retour</button></a>
@endsection