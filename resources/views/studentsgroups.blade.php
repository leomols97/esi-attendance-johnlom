<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        echo Form::open(array('url' => '/importGroupsForStudents/', 'files' => 'true'));
        echo 'Sélectionner le fichier CSV à importer.';
        echo Form::file('studentsGroupsCSV');
        echo Form::submit('Importer le fichier');
        echo Form::close();
    ?>
    @if($error)
        <p class="error">Une erreur s'est produite lors de l'importation du fichier. Veuillez vérifier si le fichier donné 
        est bien au format CSV et que tous les étudiants & groupes auxquels il fait référence existent.</p>
    @endif
    @if($success)
        <p class="success">Importation réalisée avec succès.</p>
    @endif
</body>
</html>

