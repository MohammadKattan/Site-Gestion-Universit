@extends('modele')

@section('container')

<div id="liste_back">
<h1> <u>Table des cours</u></h1>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
<tr><th>Id</th><th>Intitule</th><th>Created_at</th><th>Updated_at</th><th>Modifier</th><th>Supprimer</th></tr>
</thead>
<tbody>
@foreach($cour as $cour)
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
</table> 
</div>
</tbody>
<a href="{{route('liste_cours')}}"><button>liste_cours</button></a>
@endsection