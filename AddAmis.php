<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "model/Amis.php";
    $amis = new Amis();
    $numero = htmlspecialchars($_POST['numero']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $amis->insert($numero,$nom,$prenom,$email);
    header('location:ListAmis.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body>

    
    <fieldset>
        <legend><h1>Ajout d'un(e) ami(e) : </h1></legend>
        <form action="AddAmis.php" methode="get">
            <label for="numero">Telephone : </label>
            <input type="text" name="numero" placeholder="Téléphone"><br><br>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" placeholder="Nom"><br><br>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" placeholder="Prénom"><br><br>
            <label for="email">Adresse e-mail : </label>
            <input type="mail" name="email" placeholder="chadirou41@gmail.com"><br><br>
            <button type="submit">Ajouter</button>
        </form>
        <a href="ListAmis.php">Retour</a>
    </fieldset>

</body>
</html>