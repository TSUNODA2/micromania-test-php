<?php 
$bdd = new PDO('mysql:host=Localhost;dbname=micromonia', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $recupJeux = $bdd->prepare('SELECT * FROM jeux WHERE id = ?');
    $recupJeux->execute(array($getId));
    if($recupJeux->rowCount() > 0){
        
        $suppJeux = $bdd->prepare('DELETE FROM jeux WHERE id= ?');
        $suppJeux->execute(array($getId));

        header('location: index.php');
    }else{
        echo "Aucun Jeux n'a ete trouvé !";
    }
}else{
    echo "verifier L'identifiant sélectionner !";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>banMenue</title>
</head>
<body>
    
</body>
</html>