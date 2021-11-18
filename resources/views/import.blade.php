<h1>Importer</h1>

<p>Sélectionnez un fichier .ics pour importer.<br></p>

<form method="POST" action="/import" enctype="multipart/form-data" >

    {{ csrf_field() }}

    <input type="file" name="fichier" >

    <button type="submit" >Importer</button>

</form>
