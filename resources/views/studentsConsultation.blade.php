@extends('canvas')
@section('title', 'Présence des étudiants au cours')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')

<h1>Les étudiants</h1>

<form method="POST" action="/students/{{$seance_id}}/validation">
{{ csrf_field() }}
<table id="table_presences" border="1">
    <tr>
        <th>Matricule<br><br></th>
        <th>Nom<br><br></th>
        <th>Prénom<br><br></th>
        <th>Présent(e)<br><input type="checkbox" id="select-all" dusk="select-all">Tout sélectionner</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td dusk='id_student'>{{$student->id}}</td>
        <td>{{$student->last_name}}</td>
        <td>{{$student->first_name}}</td>
        <td><input type="checkbox" name="checklist[]" id="{{$student->id}}" dusk="{{$student->id}}"></td>
    </tr>
    @endforeach
</table>
<input type="submit" value="Valider les présences">
</form>

@endsection

@section('js')
<script src="{{ asset('js/presence_taking.js') }}"></script>
@endsection
