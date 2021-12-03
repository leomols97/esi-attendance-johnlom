@extends('canevas')

@section('title', 'StudentList')

@section ('content')
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