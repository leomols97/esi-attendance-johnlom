@extends('canvas')
@section('title', 'Présence des étudiants au cours')
@section('title_header', 'PRJG5')
@section('content')
@section('css')
@section('content')

    <h1>Les étudiants</h1>

    <form method="POST" action="/seance-details/{{$seance_id}}/validation">
        {{ csrf_field() }}
        <table border="1">
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Présent(e) <br> <input type="checkbox" id="select-all" dusk="select-all"> Tout sélectionner</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td dusk='id_student'>{{$student->id}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->first_name}}</td>
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
