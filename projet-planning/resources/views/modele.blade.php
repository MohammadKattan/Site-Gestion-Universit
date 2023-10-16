<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta charset="utf-8"> <title>@yield('title','unknwon name')</title> 
        <style>
            #etat {background-color: lightblue;}
            body
            {
            margin:0 auto;
            padding:0px;
            text-align:center;
            width:100%;
            font-family: "Myriad Pro","Helvetica Neue",Helvetica,Arial,Sans-Serif;
            background-color:#AED6F1;
            }
            table {
                width: 100%;
                font-family:Arial, Helvetica, sans-serif;
                border-collapse : collapse; 
                margin:auto;
            }
            #liste_back{
                margin: auto;
                width: 75%;
                background-color: white;
            }       
            /* table,th,td {
                border: 1px solid black ;
            } */
            th, td {
            padding: 8px;
            text-align :left;
            border-top: 1px solid #dee2e6
            }
            tbody tr:nth-child(odd){
                background-color: #f2f2f2
            }
            /* th{
                font-size: 20px
                margin: 3px;
            }
            #list{
            margin:5% auto;
            padding:0px;
            text-align:center;
            width:995px;
            
            }
            #liste_table{
            width:330px;
            margin-left:320px;
            padding:10px;
            }
            #liste #liste_table{
            font-size:18px;
            } */
            #wrapper
            {
            margin:10% auto;
            padding:0px;
            text-align:center;
            width:995px;	
            }
            #ajouter_form_div
            { 
            width:330px;
            margin-left:320px;
            padding:10px;
            background-color:#1B4F72;
            }
            #ajouter_form_div #ajouter_label
            {
            margin:15px;
            margin-bottom:30px;
            font-size:25px;
            font-weight:bold;
            color:white;
            text-decoration:underline;type="datetime-local"
            }
            #ajouter_form_div input[type="text"],[type="password"],[type="datetime-local"]
            {
            width:230px;
            height:40px;
            border-radius:2px;
            font-size:17px;
            padding-left:5px;
            border:none;
            }
            #ajouter_form_div textarea
            {
            width:230px;
            height:70px;
            border-radius:2px;
            font-size:17px;
            padding 5px;
            }
            #ajouter_form_div input[type="submit"],#Anuller
            {
            width:230px;
            height:40px;
            border:none;
            border-radius:2px;
            font-size:17px;
            background-color:#85C1E9;
            border-bottom:3px solid #3498DB;
            color:#1B4F72;
            font-weight:bold;
            }
            .space{
            padding-top: 15;
            }
            a {
            outline: none;
            text-decoration: none;
            padding: 2px 1px 0;
            }
            #button_link{
                color: black;
            }
            #button_anuller{
                color:#1B4F72;
            }

        </style>
</head>
<body>
    @section (' menu')

        @guest  
            <a href="{{route ('login')}}">Login</a>
            <a href="{{route('register')}}">Enregistrement</a>
        @endguest
        @auth
            <a href="{{route('logout')}}">Deconnexion</a>
            <p>Bonjour {{ Auth::user()->prenom}} {{ Auth::user()->nom}} </p>
        @endauth
        
    @show
<ul>
        <li><a href="{{route ('admin.home')}}">Partie admin</a></li>
        <li><a href="{{route ('gestionnaire.home')}}">Partie gestionnaire</a></li>
        <li><a href="{{route ('enseignant.home')}}">Partie enseignant</a></li>
    </ul>
    @section('etat')
        @if(session()->has('etat'))
        <p class="etat">{{session()->get('etat')}}</p>
        @endif
    @show
    @section('errors')
        @if ($errors->any())
            <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error}} </li>
                @endforeach
            </ul>
        </div>
        @endif
    @show
        @yield('container')

</body>
</html>