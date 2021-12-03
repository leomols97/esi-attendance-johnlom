@extends('canevas')

@section('title', 'StudentList')

@section ('content')

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>ESI Attendance (équipe Johnlom)</header>
        <main>
            <table border="1">
                <thead>
                    <tr>
                        <th>Routes fonctionnelles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><a href="/importGroupsForStudents">Importation des affectations de groupe pour les étudiants (CSV)</a></td>
                    </tr>
                    <tr>
                    <td><a href="/exportStats">Téléchargement des statistiques de présences (CSV ou XLSX)</a></td>
                    </tr>
                    <tr>
                        <td><a href="/students/1">Consultation des étudiants (pour une séance précise) & prise de présences</a></td>
                    </tr>
                    <tr>
                        <td><a href="/import">Importation horaires des profs</a></td>
                    </tr>
                    <tr>
                        <td><a href="/addStudent">Ajouter un étudiant en tant qu'admin</a></td>
                    </tr>
                    <tr>
                        <td><a href="/addOrDeleteStudentFromCourse">Ajout d'un étudiant à un cours</a></td>
                    </tr>
                    <tr>
                        <td><a href="/students">Supprimer un étudiant</a></td>
                    </tr>
                    <tr>
                        <td><a href="/students">Supprimer un étudiant</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </body>
</html>

@endsection
