@extends('canevas')

@section('title', 'StudentManagement')

@section ('content')
    <div>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Chercher étudiant" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div id="searchlist" class="list-group">
            @foreach($students as $student)
                <div><span>{{$student->id}} </span><span>{{$student->first_name}} </span><span>{{$student->last_name}}</span></div>
            @endforeach
        </div>
    </div>

        <!--<div>
            <form id="add" @submit="checkForm" action="/students" method="POST" onsubmit="return confirm('Are you sure?');">
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
    </div>-->
@endsection