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
                        {{--<form action={{route('seanceDeleteStudent', $student->id)}} method="POST">
                            @csrf
                            <button type="submit">Supprimer</button>
                        </form>--}}
                        <button onclick="window.location='/';"
                    </td>
                </tr>
            @endforeach
        </table>
        <input type="submit" value="Valider les présences">
    </form>

    <script>
        function deleteStudent(){
            window.location=''
        }
    </script>

    @yield('addStudentToCourse')
@endsection
