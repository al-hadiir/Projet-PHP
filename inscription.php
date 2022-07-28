<?php
    session_start();

    @$admail1 = $_POST["mail1"];
    @$admail2 = $_POST["mail2"];
    @$nom = $_POST["nom"];
    @$prenom = $_POST["prenom"];
    @$numero = $_POST["numero"];
    @$date = $_POST["datenais"];
    @$sexe = $_POST["sexe"];
    @$pass1 = $_POST["password1"];
    @$pass2 = $_POST["password2"];
    $erreur = "";

    @$inscrire = $_POST["valider"];
    if(isset($inscrire)){
        if($admail1 !== $admail2){
            $erreur = "Veuillez saisir la même adresse mail ans les deux cases.";
        }elseif($pass1 = $pass2){
            $erreur = "Veuillez saisir le même mot de passe dans les deux cases.";
        }
        else{
            @$pass_crypt = md5($pass1);
            
            require_once "model/amis.php";
            $amis = new Amis();

            $request = $amis->verify($admail1);

            if(count($request)>0)
                $erreur="Un compte avec cette adresse mail existe déjà!";
            else{
                $amis->insert($numero,$nom,$prenom,$admail1,$date,$sexe,$pass_crypt);
                echo '<script language="javascript"> alert("Inscription réussie.");</script>';
                // $ins=$pdo->prepare("insert into utilisateurs(nom,prenom,login,pass) values(?,?,?,?)");
                // if($ins->execute(array($nom,$prenom,$login,md5($pass))))
                header("location:index.php");
            }
            }
        }
    

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     require_once "model/Amis.php";
    //     $amis = new Amis();
    //     $amis->insert($_POST['numero'],$_POST['nom'],$_POST['prenom'],$_POST['mail1'],$_POST['datenais'],$_POST['sexe'],$pass_crypt);
    //     header('location:inscription.php');
    //     echo "Inscription réussie.";
    //     echo '<script language="javascript"> alert("Inscription réussie.");</script>';
    // }
?>




<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.98.0">

        <title> Inscription · Amis </title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/signin.css">

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        </style>
    </head>
    <body class="text-center">
        <main class="form-signin w-100 m-auto">
            
            <div class="erreur">
                <?php echo $erreur; ?>
            </div>
            
            <form action="inscription.php" method="post">

                <img class="mb-4" src="images/logo-2.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Entrez vos informatios</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="mail1" required>
                    <label for="floatingInput">Adresse mail</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="mail2" required>
                    <label for="floatingInput">Confirmer adresse mail</label>
                </div>

                <br>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="nom" required>
                    <label for="floatingInput">Nom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="prenom">
                    <label for="floatingInput">Prénom</label>
                </div>

                <br>

                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" name="numero" required>
                    <label for="floatingInput">Numéro de telephone</label>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingInput" name="datenais" required>
                    <label for="floatingInput">Date de naissance</label>
                </div>

                <br>

                <div class="checkbox mb-3">
                    <label for="floatingInput">Sexe : &nbsp &nbsp &nbsp</label>
                    <input type="radio" value="Masculin" name="sexe" id="floatingInput"> Masculin &nbsp &nbsp &nbsp <input type="radio" value="Feminin" name="sexe" id="floatingInput"> Féminin
                </div>

                <br>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword1" name="password1" min=6 max=32 required>
                    <label for="floatingPassword1">Mot de passe</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword2" name="password2" required>
                    <label for="floatingPassword2">Confirmer mot de passe</label>
                </div>


                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me" required> Veuillez accepté nos <a href="">conditions d'utilisation</a>
                    </label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="valider">S'inscrire</button>
                
                <br><br>

                <label>
                    Vous avez un compte <a href="index.php" class="lien-form">Connectez-vous</a>.
                </label>

                <p class="mt-5 mb-3 text-muted">Al-hadiir &copy; 2019–2022 Tout droits réservés</p>
            </form>
        </main>
  </body>
</html>

