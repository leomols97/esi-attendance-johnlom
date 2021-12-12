<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/canvas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
    <title>@yield('title')</title>
</head>

<header>
    <img id="logo" src="/he2b-esi.jpg" alt="HE2B-ESI" />
    <h1 id="title_header">ESI Attendance - JOHNLOM</h1>
</header>

<body>
    <div class="topnav">
        <ul>
            <a href="/import_groups_for_students">Importer groupes</a>
            <a href="/export_stats_presences">Télécharger présences</a>
            <a href="/take_presences/1">Prendre les présences</a>
            <a href="/import_schedule">Importer horaires</a>
            <a href="/students_management">Gestion des étudiants</a>
            <a href="/add_delete_student_course">Ajouter/supprimer un étudiant à un cours</a>
            <a href="/calendar">Vue calendrier</a>
        </ul>
    </div>
    @yield('content')

  @yield('js')
</body>

<footer>JOHNLOM</footer>

</html>
