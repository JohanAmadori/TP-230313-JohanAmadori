<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="mini-default.min.css">
    <title>Les tableaux en PHP</title>
</head>
<body>
    <h1>Les tableaux en PHP</h1>
    <h2> Les tableau indicés</h2>
    <pre>
    
        <?php
        $t = [];
        $t =[]; var_dump ($t);
        $t[] = 100 ; var_dump($t);
        var_dump($t[0]);
        ?>
        <?php
        $t =[]; 
        var_dump($t);
        ?>
        <?php
        $t[500] = 3.14; var_dump($t);
        var_dump($t);
        var_dump(array_reverse($t));
        ?>

        </pre>

        <pre>
            <?php
            array_splice($t, 500);
            $t[] = 3.14;
            var_dump($t);
        
            for($i = 0; $i < count($t); $i++){
                echo "$i : $t[$i]";
            }
            ?>
        </pre>
        
        <p> Attention en PHP tout les tableaux sont utilisés en copie par défault.</p>
        <pre>
        <?php
        $t1 = [];
        $tetris [] = "oue";
        $tetris = &$t1;
        $tetris[0] = "non";
        var_dump($t1);
        var_dump($tetris);

        ?>
        </pre>
        <h4>Parcours avec un foreach</h4>
        <pre>
            <?php
                foreach ($t as $e){
                    echo"$e";
                }
            ?>
        </pre>

        <h2>Les tableau associatifs</h2>
        <p> On utilise des cléfs pour reperer les elements </p>
        <pre>
        <?php
        $t = [];
        $t['clef1'] = "valeur1";
        $t['clef2'] = "valeur2";
        var_dump($t1);
        var_dump($t["clef1"]);
        ?>
        </pre>
        <pre>
            <?php

            foreach ($t as $clef => $valeur){
                echo"$clef : $valeur";
            }
            var_dump(array_keys($t));

            ?>
        </pre>

        <h2>Initialiser tableau en "dur"</h2>
        <pre>
            <?php
            $te1 = [
                'nom' => 'Adlen',
                'age' => '23'
            ];
            $te2 = [
                'nom' => 'Didier',
                'age' => '28'
            ];

            $tclasse = [$te1, $te2];
            var_dump($tclasse);
            
            ?>
            
        </pre>

</body>
</html>