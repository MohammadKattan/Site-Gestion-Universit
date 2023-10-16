@extends('modele')

@section('container')
<form type ="get" action="{{url('/search_user') }}" >
    <input type="search" name="query" placeholder="recherche nom/prenom/login" required/>
    <button type="submit">Search</button>
</form>
<div id="liste_back">

<table>
    <thead>
        <h1><u>Table des users</u></h1>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>nom</th>
        <th>prenom</th>
        <th>type</th>
        <th>Modification</th>
        <th>suppression</th></tr>
    </thead>
    <tbody>
        @foreach($user as $user)
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
    </tbody>
</table>
</div>
<div class=" fixed-bottom">
    <div class ="row">
        <div class="col-8"></div>
        <a href= "{{route('ajoute_user')}}">ajouter un user</a>
    </div>
</div>
    <a href="{{route('liste_users')}}"><button>liste_users</button></a>
@endsection