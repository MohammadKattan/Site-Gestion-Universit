@extends('modele')
@section('title', 'liste_users')
@section('container')
    <form type ="get" action="{{url('/search_user') }}" >
        <input type="search" name="query" placeholder="nom/prenom/login" required/>
        <button type="submit">Search</button>
    </form>
    <div id="liste_back">
    <h1> <u>Table des users</u></h1>
    <table >
        <thead >
            <button>
                <a href="{{route('liste_users')}}" id="button_link"> Liste des users</a>
            </button>
            <button>
                <a href="{{route('liste_enseignant')}}" id="button_link"> Liste des enseignants</a>
            </button>
            <button>
                <a href="{{route('liste_gestionnaire')}}" id="button_link"> Liste des gestionnaires</a>
            </button>
            <button>
                <a href="{{route('liste_user_null')}}" id="button_link">users en attente d'acceptation </a>
            </button>
            <tr>
                <th>id</th>
                <th>login</th>
                <th>nom</th>
                <th>prenom</th>
                <th>type</th>
                <th>Modification</th>
                <th>suppression</th>
            </tr>
        </thead>

        @foreach($users as $user)
        <tr><td>{{$user->id }}</td>
            <td>{{$user->login }}</td>
            <td>{{$user->nom }}</td>
            <td>{{$user->prenom }}</td>
            <td>{{$user->type }}</td>
            <td>
            <button>
                <a href= "{{route('modify_type',['id'=>$user->id])}}">modifier</a>
            </button>
            </td>
            <td>
                <button>
                    <a href="{{route('supp_user',['id'=>$user->id])}}">Supprimer</a>
                </button>
            </td>
        @endforeach
</table>
<button><a href= "{{route('ajoute_user')}}">ajouter un user</a></button>
<br>
    <br>{{$users->links()}}
</div>
<br>
<a href="{{route('admin.home')}}"><button>retour</button></a>
@endsection