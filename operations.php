<doctype html>
<head>
    <meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mini-default.min.css">
    <link rel="stylesheet" href="application.css">
    <title>operation</title>

   
</head>

<body>




<?php // du php
    var_dump($_SERVER['REQUEST_METHOD']);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo '<h1>PHP code enter value A and B </h1>';  
    $a = $_POST['a'];
    $b = $_POST['b'];

    }
    else{
        $a='';
        $b='';
    }
    //echo '<h1>PHP</h1>'; //echo = afficher
    $tform=<<<END
<div class = "row">
    
    <div class="col-sm-12 col-md-4 " >
    <div class =" card fluid">
    <form method='post'> <!-- la méthode poste nous permet de lier avec le PHP var_dump-->
    <p>A : <input type="number" min="100" max="100" max=required name='a' value='$a'></p>
    <p>B : <input type="number"min="100" max="100" required name='b'  value='$b'></p>
    <p><input class = " primary large " type="submit"></p>
    </form>
    </div>
    </div>
END;
echo $tform;
    
    

    

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        

        
        $a = $_POST['a'];
        $b = $_POST['b'];
        $Multiplication = $a * $b;
        $operation = $a + $b;
        $division= $a / $b;
        $soustraction= $a - $b;
        echo $Multiplication;
        echo $operation;
        echo $division;
        echo $soustraction;
        // nouvelle méthode    

$tableau1=<<<END
<fieldset>
<legend>Résultat</legend>
<table class = " striped hoverable">
<thead>
  <tr><th>operation</th><th>resultat</th></tr>
</thead>
<tbody> 
        
        
        
        <tr><td data-label="operation">cloning</td><td data-label="resultat">$Multiplication</td></tr>
        <tr><td data-label="operation">division</td><td data-label="resultat">$division</td></tr>
        <tr><td data-label="operation">soustraction</td><td data-label="resultat">$soustraction</td></tr>
        <tr><td data-label="operation">operation</td><td data-label="resultat">$operation</td></tr>
        
  </tbody> 
  </table>  
</fieldset>
    <br>
END;
echo $tableau1;


    }

    
// nouvelle méthode    


?>
