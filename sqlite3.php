<doctype html>
<head>
<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="mini-default.min.css"> 
<link rel="stylesheet" href="mon.css"> 

<table>
<thead>


<form method="post">
    <strong><p>Filtrer</p></strong>
    <input type ="checkbox" name="filtre_sisr" value="SISR" checked> SISR
    <<input type ="checkbox" name="filtre_slam" value="SLAM" checked> SLAM

    <strong><p>Trier</p></strong>
    <input type ="radio" name="filtre_prenom" checked> Prénom
    <input type ="radio" name="filtre_naissance" checked > Naissance
    <button>Appliquer</button>
</form>


<tr>
    <th> Prenom </th>
    <th>Option</th>
    <th>Genre</th>
    <th>Cp</th>
    <th>Ville</th>
    <th>Naissance</th>
    <th>Entreprise</th>
</tr>

</thead>
<tbody> 
  
<?php


$db = new SQLite3('BTS-SIO-2022-12.sqlite');


$result = $db->query('SELECT * FROM apprentis ORDER BY prenom');

    while($row = $result->fetchArray(SQLITE3_ASSOC)){
        $htmlRow='<tr>';

        foreach ($row as $cell) {
            $htmlRow.= "<td>$cell</td>";
        }
        echo $htmlRow.'</tr>';

        $prenom=$row['prenom'];
        $option=$row['option'];
        $genre=$row['genre'];
        $cp=$row['cp'];
        $ville=$row['ville'];
        $naissance=$row['naissance'];
        $entreprise=$row['entreprise'];


        $tableau=<<<END

    END; 

    echo $tableau;

}

?>
</tbody> 
</table>  


