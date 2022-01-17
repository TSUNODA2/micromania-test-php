<?php 
$bdd = new PDO('mysql:host=localhost;dbname=micromonia', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id']))
{
    $getid = $_GET['id'];
    $recupJeux = $bdd->prepare('SELECT * FROM jeux WHERE id = ?');
    $recupJeux->execute(array($getid));
    if($recupJeux->rowCount() > 0)
    {
        $recupJeuxInfo = $recupJeux->fetch();
        $nom = $recupJeuxInfo['nom'];
        $prix = $recupJeuxInfo['prix'];
        $dsc = $recupJeuxInfo['dsc'];
        $quantite = $recupJeuxInfo['quantite'];
        
        if(isset($_POST['valide']))
        {
        $jeuxSaisi = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $dsc = nl2br (htmlspecialchars($_POST['dsc']));
        $quantite = htmlspecialchars($_POST['quantite']);

        $updateJeux = $bdd->prepare('UPDATE jeux SET nom = ?, prix = ?, dsc = ?, quantite = ? WHERE id = ?');
        $updateJeux->execute(array($jeuxSaisi, $prix, $dsc, $quantite, $getid));

        header('location: index.php');
    }

    }else{
        echo "Aucun jeux trouvé";
    }
    
}else{
    echo "Aucun jeux trouvé";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <ul>
            <li><a href="ajouter.php">ajouter</a></li>
            <li><a href="index.php">Produit</a></li>
        </ul>
    </nav>
    <form method="POST" action="">

        <input type="text" name="nom" value="<?= $nom; ?>">

        <br>

        <input type="number" name="prix" value="<?= $prix; ?>">

        <br>

        <textarea name="dsc" id="description" cols="30" rows="10"><?= $dsc; ?></textarea>

        <br>

        <input type="number" name="quantite" id="quantite" value="<?= $quantite; ?>">

        <br>

        <input type="submit" name="valide">

        <br>

    </form>
</body>
</html>