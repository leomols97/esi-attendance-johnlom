@extends('canvas')

@section('title', 'StudentList')

@section ('content')

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/importGroups.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('css')
</head>
<body>
    <main>
    <?php
        echo Form::open(array('url' => '/importGroupsForStudents/', 'files' => 'true'));
        echo '<p>Sélectionner le fichier CSV à importer : </p>';
        echo Form::file('studentsGroupsCSV');
        echo Form::submit("Importer le fichier");
        echo Form::close();
    ?>
    @if($error)
        <p class="error">Une erreur s'est produite lors de l'importation du fichier. Veuillez vérifier si le fichier donné
        est bien au format CSV et que tous les étudiants & groupes auxquels il fait référence existent.</p>
    @endif
    @if($success)
        <p class="success">Importation réalisée avec succès.</p>
    @endif
</main>
</body>
</html>

@endsection
