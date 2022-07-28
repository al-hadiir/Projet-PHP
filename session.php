<?php

    session_start();
    if ($_SESSION["connecte­r"] != "yes") {
        header("location:log­in.php");
    exit();

    }
    if (date("H") < 18){
        $bienvenue = "Bonjour et bienvenue " .
        $_SESSION["prenom_no­m"];
    }else {
        $bienvenue = "Bonsoir et bienvenue " .
        $_SESSION["prenom_no­m"];
    }
   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style>
            * {
            font-family: arial;
            }
            body {
            margin: 20px;
            }
            h2 {
            text-align: center;
            color: pink;
            }
            a {
            color: blue;
            text-decoration: none;
            float: right;
            }
            a:hover {
            text-decoration: underline;
            }
        </style>
    </head>
    <body onLoad="document.fo.­login.focus()">
        <h2>
            <?php echo $bienvenue ?>
        </h2>
        <a href="deconnexion.ph­p">Se déconnecter</a>
    </body>
</html>