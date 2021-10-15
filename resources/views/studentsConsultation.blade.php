@extends('canvas')
@section('title', 'Présence des étudiants au cours')
@section('content')

<p>Structure: <div>Matricule</div><div>Nom</div><div>Prénom</div><div>Groupes</div></p>
<ol id="attendance"> 
    @foreach ($students as $student)
    <li>{{$student->getId() . " " .  $student->getLastName() . " " . $student->getFirstName() . " " . $student->getGroups()[0]}}</li>
    @endforeach
</ol>

@endsection