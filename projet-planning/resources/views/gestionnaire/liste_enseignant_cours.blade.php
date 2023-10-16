@extends('modele')
@section('container')

<div id="liste_back">
    <table>
        <thead>
            <h1> <u>Table des enseignant pour le cours {{$cours->intitule}}</u></h1>
            <tr>
                <th>intitule</th>
                <th>user_id</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$cours->intitule}}</td>
                <td>{{$user->user_id }}</td>
                <td>
                    <button>
                        <a href="{{route('supp_assoc_ens',$user->user_id)}}">Supprimer</a>
                    </button>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<a href="{{route('liste_cours_gest')}}"><button>retour</button></a>
@endsection