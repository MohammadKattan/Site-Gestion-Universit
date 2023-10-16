@extends('modele')
@section('title', 'liste_cours')
@section('container')

<form type ="get" action="{{url('/search_cours') }}" >
    <input type="search" name="query" placeholder="recherche un cours" required/>
    <button type="submit">Search</button>
</form>
<div id="liste_back">
<h1> <u>Table des cours</u></h1>
<table>
    <thead>
<tr><th>Id</th><th>Intitule</th><th>Created_at</th><th>Updated_at</th><th>Modifier</th><th>Supprimer</th></tr>
</thead>
<tbody>
@foreach($cours as $cour)
<tr><td>{{$cour->id }}</td>
    <td>{{$cour->intitule }}</td>
    <td>{{$cour->created_at }}</td>
    <td>{{$cour->updated_at }}</td>
    <td>
    <button>
        <a href= "{{route('modify_cours',['id'=>$cour->id])}}">modifier</a>
    </button>
    </td>
    <td>
        <button>
            <a href="{{route('supp_cours',['id'=>$cour->id])}}">Supprimer</a>
        </button>
    </td>
</tr>
@endforeach
</tbody>
</table>
        <button><a href= "{{route('ajoute_cours')}}">ajouter un cours</a></button>
    <br>
    <br>{{$cours->links()}}
    </div>
    <br>
<a href="{{route('admin.home')}}"><button>retour</button></a>
@endsection