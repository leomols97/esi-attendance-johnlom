@extends('canvas')
@section('title', 'StudentList')
@section ('content')

<body>
    <main>
        <div>
            <form id="add" @submit="checkForm" action="{{route('add')}}" method="POST">
                @csrf
                <h5>Ajouter un étudiant à un cours</h5>
                <p>
                    <label for="id">Id de l'étudiant :</label>
                    <select id="student_id" name="student_id">
                        <option value="" disabled selected>Sélectionnez l'ID d'un étudiant</option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->id }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label for="id">Nom du cours :</label>
                    <select id="course_id" name="course_id">
                        <option value="" disabled selected>Sélectionnez un cours</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p><input type="submit" value="Ajouter"></p>
                <div id="error"></div>
            </form>
        </div>
    </main>
</body>

@endsection
