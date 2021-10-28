@extends('canvas')
@section('title', 'Présence des étudiants au cours')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')

<h1>Les étudiants</h1>

<table>
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Présent(e)</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->last_name}}</td>
        <td>{{$student->first_name}}</td>
        <td><input type="checkbox"/></td>
    </tr>
    @endforeach
</table>

@endsection
