@extends('canvas')
@section('title', 'Ajouter un étudiant (admin)')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')

<h1>Ajout</h1>

<form method="POST" action="/addStudent">

    {{ csrf_field() }}

    <input type="number" name="id" placeholder="Matricule" >
    <input type="text" name="last_name" placeholder="Nom" >
    <input type="text" name="first_name" placeholder="Prénom" >

    <button type="submit" >Ajouter</button>

</form>

@endsection
