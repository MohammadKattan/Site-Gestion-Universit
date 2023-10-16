@extends('modele')

@section('title', 'Modifier mdp')

@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <p id="ajouter_label">Modification mdp </p>
        <form method="post">
            <p><input type="password" name="mdp" placeholder="Password"></p>
            <p><input type="password" name="mdp_confirmation" placeholder="Confirmation password"></p>
            <p><input type="submit" name="Modifier" value="Modifier"></p>
            <p><input type="submit" name="Anuller" value="Anuller"></p>
            @csrf
        </form>
    </div>
</div>


@endsection


