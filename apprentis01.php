<?php
$db = new SQLite3('BTS-SIO-2022-12.sqlite');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sqltri = $_POST['filtre'];

    if (!empty($_POST['SISR'])) {
        $checkedSLAM = 'checkedSLAM';
        $checkedSISR = '';
        $result = $db->query("SELECT * FROM apprentis WHERE option= 'SLAM' ORDER BY $sqltri, prenom");
    }

    if (!empty($_POST['SLAM'])) {
        $checkedSLAM = '';
        $checkedSISR = 'checkedSISR';
        $result = $db->query("SELECT * FROM apprentis WHERE option= 'SISR' ORDER BY $sqltri, prenom");
    }

    if(isset ($_POST['SISR']) && isset($_POST['SLAM'])) {
        $checkedSISR = 'checkedSISR';
        $checkedSLAM = 'checkedSLAM';
        $result = $db->query("SELECT * FROM apprentis ORDER BY $sqltri, prenom");
    }
    switch ($sqltri) {
        case 'prenom';
            $checkedPrenom = 'checkedPrenom';
            $checkedNaissance  = '';
            break;
        case 'naissance';
            $checkedPrenom = '';
            $checkedNaissance  = 'checkedNaissance ';
            break;
        default:
            die("<h1>TRI SUR $sqltri</h1>");
    }

    $sqlWhere = $_POST[''];

} else {
    $sqltri = 'prenom';
    $checkedPrenom = 'checkedPrenom ';
    $checkedNaissance  = '';
    $result = $db->query("SELECT * FROM apprentis $sqlWhere ORDER BY $sqltri, prenom");
    $checkedSLAM = '';
    $checkedSISR ='';
    
}

$html_Ligne = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $html_Ligne[] = $row;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mini-default.min.css">
    <link rel="stylesheet" href="mon.css">
    <title>Table apprentis</title>
</head>

<body>
    <h1>Liste des apprentis</h1>
    <form method="POST">
        <fieldset>
        <legend>
            Choix tri
        </legend>

        <strong>Filtrer</strong>
        
        <label for="SLAM">SLAM</label>
        <input type="checkbox" name="SLAM" id="SLAM" <?= $checkedSLAM ?>>

        <label for="SISR">SISR</label>
        <input type="checkbox" name="SISR" id="SISR" <?= $checkedSISR ?>>
        
        <strong>Tri</strong>

        <input type="radio" name="filtre" value="prenom" <?= $checkedPrenom?>>Prenom
        <input type="radio" name="filtre" value="naissance" <?= $checkedNaissance ?>>Naissance

        </select>

        <select name="select" id="choix">
    <option value="filtre_prenom_recherche_commencepar">Commence par</option>
    <option value="filtre_prenom_recherche_finitpar">Finit par</option>
    <option value="filtre_prenom_recherche_contient">Contient</option>
</select>


        <input type="submit" value="appliquer" class="tertiary">
        </fieldset>
    </form>
<table>
    <thead>
        <tr>
            <th>Prenom</th>
            <th>Option</th>
            <th>Genre</th>
            <th>CP</th>
            <th>Ville</th>
            <th>Naissance</th>
            <th>Entreprise</th>
        </tr>

</thead>
    <tbody>
        <?php foreach ($html_Ligne as $ligne) : ?>
            <tr>
                <?php foreach ($ligne as $cellule) : ?>
                <td><?= $cellule ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
</body>
</html>