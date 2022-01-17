<?php 
$bdd = new PDO('mysql:host=Localhost;dbname=micromonia', 'root', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>micromonia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="ajouter.php">ajouter</a></li>
            <li><a href="index.php">Produit</a></li>
        </ul>
    </nav>

    <?php 
    $recupJeux = $bdd->query('SELECT * FROM jeux');
    while($jeux = $recupJeux->fetch()){
        ?>

            <p id="pMain"><?= $jeux['nom']?> <br> <?=$jeux['prix'] ?> <br> <?=$jeux['dsc']?> <br> <?=$jeux['quantite']?> <br> <a href="modifier.php?id=<?= $jeux['id'];?>" style="background:none; color:red; text-decoration: none;" > Modif this piece of sh**</a> 
            <a href="bannir.php?id=<?= $jeux['id'];?>" style="color:red; background:none; text-decoration: none;" > Delete this piece of sh**</a></p>

        <?php
    }
    ?> 
</body>
</html>