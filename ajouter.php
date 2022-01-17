<?php

$bdd = new PDO('mysql:host=Localhost;dbname=micromonia', 'root', '');

if(isset($_POST['send']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['dsc']) AND !empty($_POST['quantite']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $dsc = nl2br(htmlspecialchars($_POST['dsc']));
        $quantite = htmlspecialchars($_POST['quantite']);


        $inserArticle = $bdd->prepare('INSERT INTO jeux(nom, prix, dsc, quantite)VALUES(?, ?, ?, ?)');
        $inserArticle->execute(array($nom, $prix, $dsc, $quantite));
        echo  "Votre articles a bien etais ajouter !";

    }else{
        echo  "entrer tout les champs demander !";
     }
}

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ajout</title>
     <link rel="stylesheet" href="style.css">
 </head>
 <body>
 <nav>
        <ul>
            <li><a href="ajouter.php">ajouter</a></li>
            <li><a href="index.php">Produit</a></li>
        </ul>
    </nav>

    <div align="center">
        <h2>Ajouter un produit</h2>
        <br>
        <form method="POST" action="">
            <table>
                <tr>
                    <td align="right">
                        <label for="nom du produit">Nom du produit :</label>
                    </td>

                    <td>
                        <input type="text" name="nom" id="nomProduit" placeholder="Entrer le nom de votre produit" value="<?php if(isset($nom)) { echo$nom;} ?>">
                    </td>
                </tr>

                <br>

                <tr>
                    <td align="right">
                        <label for="prix du produit">Prix du produit :</label>
                    </td>

                    <td>
                        <input type="number" name="prix" id="prixProduit" placeholder="Entrer le prix de votre produit" value="<?php if(isset($prix)) { echo$prix;} ?>">
                    </td>
                </tr>

                <br>

                <tr>
                    <td align="top">
                        <label for="description du produit">description du produit :</label>
                    </td>

                    <td>
                        <textarea name="dsc" id="description_produit" cols="30" rows="10" placeholder="Entrer la description de votre produit" value="<?php if(isset($dsc)) { echo$dsc;} ?>"></textarea>
                    </td>
                </tr>

                <br>

                <tr>
                    <td align="right">
                        <label for="quantite de produit">quantité de produit :</label>
                    </td>

                    <td>
                        <input type="number" name="quantite" id="quantiteProduit" placeholder="Entrer la quantite de produit" value="<?php if(isset($quantite)) { echo$quantite;} ?>">
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="send">
        </form>
    </div>
 </body>
 </html>