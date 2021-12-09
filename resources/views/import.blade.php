@extends('canvas')
@section('title', 'StudentList')
@section ('content')

<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/importSchedule.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <main>
        <h1>Importer</h1>
        <p>Sélectionnez un fichier .ics pour importer : </p>
        <form method="POST" action="/import" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="fichier">
            <button type="submit">Importer</button>
        </form>
    </main>
</body>

@endsection
