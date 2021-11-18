@extends('canevas')

@section('title', 'StudentList')

<?php //$students = json_decode($students,true); ?>

@section ('content')
    <h1>Student List</h1>
    <div>
        <form id="add" @submit="checkForm" action="{{route('add')}}" method="POST">
            @csrf
            <h5>Add a Student:</h5>
            <p>
                <label for="id">Id Course :</label>
                <select id="course_id" name="course_id" required focus>
                    <option value="" disabled selected>Please select course</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{ $course->name }}</option>
                    @endforeach
                </select>
                <!--<input id="course_id" name="course_id" type="number" v-model="id">-->
            </p>
            <p>
                <label for="id">Id Student :</label>
                <input id="student_id" name="student_id" type="number" v-model="id">
            </p>
            <p><input type="submit" value="Add"></p>
            <div id="error"></div>
        </form>
        <form id="delete" action="/student/delete" method="POST">
            @csrf
            <h5>Delete a Student:</h5>
            <label for="id">Id:</label>
            <input id="id" name="id" type="number">
            <input type="submit" value=delete>
        </form>
    </div>
@endsection
