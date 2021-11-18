<h3>Exporter</h3>
<p>Exporter la table "Présences" en Excel</p>

<form method="POST" action="/downloadStats">

    {{ csrf_field() }}

    <input type="text" name="name" placeholder="Nom de fichier" >

    <select name="extension" >
        <option value="xlsx" >.xlsx</option>
        <option value="csv" >.csv</option>
    </select>

    <button type="submit" >Exporter</button>

</form>