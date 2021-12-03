@extends('canvas')
@section('title', 'Ajouter un étudiant (admin)')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/addStudent.css') }}">
</head>

<h1>Ajouter un étudiant</h1>

<div>
<form method="POST" action="/addStudent">

    {{ csrf_field() }}

    <input type="number" name="id" placeholder="Matricule" dusk="student_id" >
    <input type="text" name="last_name" placeholder="Nom" dusk="student_last_name">
    <input type="text" name="first_name" placeholder="Prénom" dusk="student_first_name">

    <button type="submit" dusk="add">Ajouter</button>

</form>

@if (session('success'))
    <h3 class='success'>{{session('success')}}</h3>
@endif

@if (session('errors'))
    <h3 class='error'>{{session('errors')->first()}}</h3>
@endif

</div>
@endsection
