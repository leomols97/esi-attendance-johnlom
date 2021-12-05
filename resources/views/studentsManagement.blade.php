@extends('canevas')

@section('title', 'StudentManagement')

@section ('content')
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #myInput {
                background-image: url('/css/searchicon.png'); /* Add a search icon to input */
                background-position: 10px 12px; /* Position the search icon */
                background-repeat: no-repeat; /* Do not repeat the icon image */
                width: 30%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }

            #myTable {
                border-collapse: collapse; /* Collapse borders */
                width: 100%; /* Full-width */
                border: 1px solid #ddd; /* Add a grey border */
                font-size: 18px; /* Increase font-size */
            }   

            #myTable th, #myTable td {
                text-align: left; /* Left-align text */
                padding: 10px; /* Add padding */
            }

            #myTable tr {
                /* Add a bottom border to all table rows */
                border-bottom: 1px solid #ddd;
            }

            .btnDelete{
                background-color: red;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                margin-bottom:10px;
                opacity: 0.8;
            }

            {box-sizing: border-box;}

            /* The popup form - hidden by default */
            .form-popup {
                display: none;
                position: fixed;
                top: 15px;
                right: 30px;
                border: 3px solid #f1f1f1;
                z-index: 9;
            }

            .form-popup h3{
                text-align: center
            }

            /* Add styles to the form container */
            .form-container {
                max-width: 300px;
                padding: 10px;
                background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=number]{
                width: 90%;
                padding: 15px;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=number]:focus{
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit button */
            .form-container .btn {
                background-color: #04AA6D;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                opacity: 0.8;
            }

            .btnAdd{
                background-color: #04AA6D;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                margin-bottom:10px;
                opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .delete {
                background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
                opacity: 1;
            }
        </style>
    </head>
    <h2>Student management</h2>
    @if (session('success'))
        <h3 class='success'>{{session('success')}}</h3>
    @endif

    @if (session('errors'))
        <h3 class='error'>{{session('errors')->first()}}</h3>
    @endif

    <div><button type="button" class="btnAdd" onclick="openFormAdd()">Ajouter un étudiant</button></div>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher étudiants..">

    <table id="myTable">
        <tr>
            <th style="width:80%">Etudiants</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td dusk="id_student">{{$student->id}} {{$student->last_name}} {{$student->first_name}}</td>
                <td>
                    <form action="{{route('deleteStudent', $student->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        <button type="submit" class="btnDelete" dusk="delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="form-popup" id="addForm">
        <form action="/studentsManagement/add" class="form-container" method="POST">
            @csrf
            <h3>Ajouter étudiant</h3>
            <input type="number" name="id" placeholder="Matricule" min="1" dusk="student_id">
            <input type="text" name="last_name" placeholder="Nom" dusk="student_last_name">
            <input type="text" name="first_name" placeholder="Prénom" dusk="student_first_name">

            <button type="submit" class="btn" dusk="add">Ajouter</button>
            <button type="button" class="btn delete" onclick="closeFormAdd()">Close</button>
        </form>
    </div>

    <script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function openFormAdd() {
        document.getElementById("addForm").style.display = "block";
    }
    
    function closeFormAdd() {
        document.getElementById("addForm").style.display = "none";
    }

</script>
@endsection