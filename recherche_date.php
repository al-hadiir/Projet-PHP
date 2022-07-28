<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page de verification de date </title>
</head>
<body>
    <form action="index.php" methode="get" >
        <center>
            <label for="jour"> Jour : </label>
            <input type="number" name="jour" id="jour" required="requiered" min="1" max="31"><br><br>
            <label for="mois"> Mois : </label>
            <input type="number" name="mois" id="mois" required="requiered" min="1" max="12"><br><br>
            <label for="annee"> Année : </label>
            <input type="number" name="annee" id="annee"  required="requiered" min="1870" max="2097"><br><br>
            <button type="submit" value="Envoyer" >Envoyer</button><br><br>
            <p class="resultattest">
            
            
                <?php 
                    function calculDate($jj,$mm,$aaaa){
                        $aa = $aaaa/4;
                        

                        $DateValide = "La date ".$jj."/".$mm."/".$aaaa." est valide.";
                        $DateNonValide = "La date entrée n'existe pas.";

                        if ( $bb = $aa ){
                            if ($mm= 1 || $mm=3 || $mm=5 || $mm=7 || $mm=8 || $mm=10 || $mm=12 ) {
                                if ( 1<= $jj || $jj <=31 ) {
                                    echo $DateValide;
                                }else{
                                    echo $DateNonValide;
                                }
                            }elseif ($mm = 2) {
                                if ( 1<= $jj || $jj <=29 ) {
                                    echo $DateValide;
                                }else{
                                    echo $DateNonValide;
                                }
                            }else {
                                if ( 1<= $jj || $jj <=30 ) {
                                    echo $DateValide;
                                }else{
                                    echo $DateNonValide;
                                }
                            }
                        }else{
                            if ( $mm= 1 || $mm=3 || $mm=5 || $mm=7 || $mm=8 || $mm=10 || $mm=12 ) {
                                if ( 1<= $jj || $jj <=31 ) {
                                    echo $DateValide;
                                }else{
                                    echo $DateNonValide;
                                }
                            }elseif ( $mm = 2 ) {
                                if ( 1<= $jj || $jj <=28 ) {
                                    echo $DateValide;
                                }else{
                                    echo $DateNonValide;
                                }
                            }else {
                                if ( 1<= $jj || $jj <=30 ) {
                                    echo $DateValide;
                                }else{
                                    echo $DateNonValide;
                                }
                            }
                        }

                    }
                    $jour = (int) htmlentities($_GET['jour']);
                    $mois = (int) htmlentities($_GET['mois']);
                    $annee = (int) htmlentities($_GET['annee']);
                        
                    calculDate($jour,$mois,$annee);
                    

                ?>
            </p>
        </center>
    </form>
</body>
</html>






