<?php
$db = new SQLite3('BTS-SIO-2022-12.sqlite');
$where = '';
$sqltri = '';
$checkedSLAM = '';
$checkedSISR = '';
$checkedNaissance = '';
$checkedPrenom = '';
$checkedOption = '';
$option = '';
$filtre_prenom_recherche_commencepar = 'commencepar';
$filtre_prenom_recherche_finitpar = 'finitpar';
$filtre_prenom_recherche_contient = 'contient';
$filtre_prenom_recherche = '';
$filtre_prenom_texte = 'radio';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filtre_prenom_recherche = $_POST['filtre_prenom_recherche'];
    $filtre_prenom_texte = $_POST['filtre_prenom_texte'];
    if (((empty($_POST['filtre_slam'])) == True && (empty($_POST['filtre_sisr'])) == False) || ((empty($_POST['filtre_slam'])) == False && (empty($_POST['filtre_sisr'])) == True)) {


        if ((empty($_POST['filtre_slam'])) == false) {
            $where = 'WHERE option = \'SLAM\'';
            $checkedSLAM = 'checked';
        }

        if ((empty($_POST['filtre_sisr'])) == false) {
            $checkedSISR = 'checked';
            if (empty($where) == true) {
                $where = 'WHERE option = \'SISR\'';
            } else {
                $where = ' and option = \'SISR\'';
            }
        }


        if (!empty($filtre_prenom_texte) && !empty($filtre_prenom_recherche)) {
            switch ($filtre_prenom_texte) {
                case "commencepar":
                    $filtre_prenom_recherche_commencepar = 'commencepar';
                    $filtre_prenom_recherche_contient = '';
                    $filtre_prenom_recherche_finitpar = '';
                    $where .= " AND prenom LIKE '{$filtre_prenom_recherche}%'";

                    break;
                case "finitpar":
                    $filtre_prenom_recherche_finitpar = 'finitpar';
                    $filtre_prenom_recherche_commencepar = '';
                    $filtre_prenom_recherche_contient = '';
                    $where .= " AND prenom LIKE '%{$filtre_prenom_recherche}'";

                    break;
                case "contient":
                    $filtre_prenom_recherche_contient = 'contient';
                    $filtre_prenom_recherche_commencepar = '';
                    $filtre_prenom_recherche_finitpar = '';
                    $where .= " AND prenom LIKE '%{$filtre_prenom_recherche}%'";

                    break;
            }
        } else {
            $filtre_prenom_recherche = '';
            $filtre_prenom_texte = '';
            $filtre_prenom_recherche_commencepar = 'commencepar';
            $filtre_prenom_recherche_finitpar = 'finitpar';
            $filtre_prenom_recherche_contient = 'contient';
        }

        if ((empty($filtre_prenom_recherche)) == true) {
            var_dump($filtre_prenom_recherche);
        }
        var_dump($filtre_prenom_recherche);
    }

    $sqltri = $_POST['tri'];

    switch ($sqltri) {
        case "Prenom":
            $checkedPrenom = 'checked';
            break;
        case "Naissance":
            $checkedNaissance = 'checked';
            $sqltri = $sqltri . ', Prenom';
            break;
        case "Option":
            $checkedOption = 'checked';
            $sqltri = $sqltri . ', Prenom';
            break;
        default:
            die("<h1> unexpected !</h1>");
            break;
    }
} else {
    $checkedPrenom = 'checked';
    $checkedNaissance = '';
    $checkedOption = '';
    $checkedSLAM = 'checked';
    $checkedSISR = 'checked';
    $sqltri = 'Prenom';
}

$result = $db->query('SELECT * FROM apprentis ' . $where . ' Order BY ' . $sqltri);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mini-default.min.css">
    <link rel="stylesheet" href="application.css">

    <title>Document</title>
</head>

<body>
    <h1>Liste des apprentis</h1>
    <form method="POST">

        <legend>Choose your classe</legend>


        <input id="filtre_slam" type="checkbox" value="SLAM" name="filtre_slam" <?= $checkedSLAM ?>>SLAM
        <input id="filtre_sisr" type="checkbox" value="SISR" name="filtre_sisr" <?= $checkedSISR ?>>SISR
        <strong>Trier </strong>


    <input id='tri_prenom' type="radio" value="Prenom" name="tri" <?= $checkedPrenom ?>>Prénom

        <select name="filtre_prenom_texte" value="<?= $filtre_prenom_texte ?>">
            <option value="commencepar" id="filtre_prenom_recherche_commencepar" value="<?= $filtre_prenom_recherche_commencepar ?>">commence</option>
            <option value="finitpar" id="filtre_prenom_recherche_finitpar" value="<?= $filtre_prenom_recherche_finitpar ?>">finit</option>
            <option value="contient" id="filtre_prenom_recherche_contient" value="<?= $filtre_prenom_recherche_contient ?>">contient</option>
        </select>
        <input type="text" name="filtre_prenom_recherche" value="<?= $filtre_prenom_recherche ?>">

        <input id='tri_naissance' type="radio" value="Naissance" name="tri" <?= $checkedNaissance ?>>Naissance
        <input id="tri_option" type="radio" value="Option" name="tri" <?= $checkedOption ?>>Option
        <input type="submit" value="Appliquer" class="tertiary" name="bouton_appliquer">

    </form>


    <table id="liste-apprentis" class="striped hoverable">
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
            <?php foreach ($html_Ligne as $ligne) : ?>
                <tr>
                    <?php foreach ($ligne as $cellule) : ?>
                        <td><?= $cellule ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>