<doctype html>
<head>
<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="mini-default.min.css"> 
<link rel="stylesheet" href="mon.css"> 

<table>
<thead>
<tr>
    <th> prenom </th>
    <th>option</th>
    <th>genre</th>
    <th>cp</th>
    <th>ville</th>
    <th>naissance</th>
    <th>entreprise</th>
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




