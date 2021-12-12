@extends('canvas')
@section('title', 'Présence des étudiants au cours')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')
    <head>
        <link rel="stylesheet" type="text/css" href="{{secure_asset('css/studentConsultation.css') }}">
        <script type="text/javascript" src="{{secure_asset('js/presence_taking.js')}}"></script>
    </head>

    <h1>Les étudiants</h1>

    <input type="text" id="myInput" onkeyup="searchingInDB()" placeholder="Chercher un id étudiant">
    <form method="POST" action="/seance-details/{{$seance_id}}/validation">
        {{ csrf_field() }}
        <table id="myTable" border="1">
            <tr class="header">
                <th>Etudiants</th>
                <th>Présent(e) <br> <input type="checkbox" id="select-all" dusk="select-all"> Tout sélectionner</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td dusk='id_student'>{{$student->id}} {{$student->last_name}} {{$student->first_name}}</td>
                    <td><input type="checkbox" name="checklist[]" id="{{$student->id}}" dusk="{{$student->id}}"></td>
                    <td>
                        <button type="button"
                                onclick="window.location='{{ route('seanceDeleteStudent', [$seance_id, $student->id]) }}'">
                            Supprimer
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
        <input type="submit" value="Valider les présences">
    </form>

    @yield('addStudentToCourse')
@endsection
