@extends('canvas')
@section('title', 'Ajouter un étudiant (admin)')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addStudent.css') }}">
</head>

<h1>Ajouter un étudiant</h1>

<div>
<form method="POST" action="/addStudent">

    {{ csrf_field() }}

    <input type="number" name="id" placeholder="Matricule" >
    <input type="text" name="last_name" placeholder="Nom" >
    <input type="text" name="first_name" placeholder="Prénom" >

    <button type="submit" >Ajouter</button>

</form>

@if (session('success'))
    <h3 class='success'>{{session('success')}}</h3>
@endif

@if (session('errors'))
    <h3 class='error'>{{session('errors')->first()}}</h3>
@endif

</div>
@endsection
