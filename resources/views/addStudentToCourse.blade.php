@extends('StudentsConsultation')

@section('title', 'StudentList')

@section ('addStudentToCourse')
    <div>
        <form id="add" @submit="checkForm" action="/addStudentToCourse/{{$seance_id}}}" method="POST">
            @csrf
            <h5>Ajouter un étudiant à un cours</h5>
            <p>
                <label for="id">Liste des étudiants :</label>
                <select id="student_id" name="student_id">
                    <option value="" disabled selected>Sélectionnez un étudiant</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}"> {{ $student->id }}
                            - {{$student->first_name}} {{$student->last_name}}</option>
                    @endforeach
                </select>
            </p>
            <p><input type="submit" value="Ajouter"></p>
            <div id="error"></div>
        </form>
    </div>

@endsection
