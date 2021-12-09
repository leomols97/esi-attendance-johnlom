@extends('canvas')
@section('title', 'Gestion des étudiants')
@section('content')
@section('css')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addStudent.css') }}">
</head>

<h1>Gestion des étudiants</h1>

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

<div>
        <form id="add" @submit="checkForm" action="/students" method="POST">
            @csrf
            <h5>Supprimer un étudiant</h5>
            <p>
                <label for="id">Id de l'étudiant :</label>
                <select dusk="id_student_to_delete" id="student_id" name="student_id">
                    <option value="" disabled selected>Sélectionnez l'ID d'un étudiant</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->id }}</option>
                    @endforeach
                </select>
            </p>
            <p><input type="submit" value="Supprimer"></p>
            <div id="error"></div>
        </form>
        @if (session('success'))
            <h3 class='success'>{{session('success')}}</h3>
        @endif

        @if (session('errors'))
            <h3 class='error'>{{session('errors')->first()}}</h3>
        @endif
    </div>

@endsection
