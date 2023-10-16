@extends('modele')

@section('container')
<div id="wrapper">
    <div id="ajouter_form_div">
        <form method="post">
            <p><input type="text" name="login" placeholder="login" value="{{old('login')}}" required></p>
            <p><input type="password" name="mdp" placeholder="Password" required></p>
            <p><input type="submit" name="Envoyer" value="Envoyer"></p>
            @csrf
        </form>
        <button id="Anuller">
                    <a href= "{{route('home')}}" id="button_anuller">Anuller</a>
                </button>
    </div>
</div>
@endsection
