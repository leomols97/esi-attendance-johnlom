@extends('canevas')

@section('title', 'StudentList')

<?php $students = json_decode($students,true); ?>

@section ('content')
    <h1>Student List</h1>
    @if(count($students)===0)
        <p>No student</p>
    @else
        <table>
            <tr><th>id</th><th>Last name</th><th>First name</th></tr>
            @foreach($students as $student)
                <tr>
                    <td dusk="id_student"><?=$student["id"]?></td>
                    <td><?=$student["last_name"]?></td>
                    <td><?=$student["first_name"]?></td>
                </tr>
            @endforeach
        </table>
    @endif
    <div>
        <form id="add" @submit="checkForm" action="/student/add" method="POST">
            @csrf
            <h5>Add a Student:</h5>
            <p>
                <label for="id">Id :</label>
                <input id="id" name="id" type="number" v-model="id">
            </p>
            <p>
                <label for="LastName">Last Name :</label>
                <input id="LastName" name="last_name" type="text" v-model="LastName">
            </p>
            <p>
                <label for="FirstName">First Name :</label>
                <input id="FirstName" name="first_name" type="text" v-model="FirstName">
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
