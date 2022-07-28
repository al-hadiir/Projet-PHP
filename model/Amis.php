    
    <?php
    Class Amis{
        private $db;

        // Constructeur de la classe Amis.
        public function __construct(){
            // Creation de la connexion à la base de données.
            $this->db = new PDO('mysql:host=localhost;dbname=base1','root','');
        }

        // Méthode permettant la liste d'amis.
        public function FindAll(){
            $request = $this->db->prepare("SELECT * FROM amis");
            $request->execute();
            $content = $request->fetchAll(PDO::FETCH_ASSOC);
            return $content;
        }

        //Meyhode pour verifier si le mail n'existe pas déjà dans la base de données
       public function verify(string $ml){
            $sql= ("SELECT id from amis where email=? limit 1");
            $req = $this->db->prepare($sql);
            $req->execute(array($ml));
            return $request = $req->fetchAll(PDO::FETCH_ASSOC);
       }


        //Methode permettant de rechercher un élément par clé
        public function findBy(string $value){
            $sql = "SELECT * FROM amis WHERE email ='" . $value . "' ";
            $request = $this->db->prepare($sql);
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }

        // Methode pour la page de connexion
        public function Authentification(string $log, string $mdp){  
            $sql = "SELECT * from amis where email = ?  and passwoord=? limit 1";
            $request = $this->db->prepare($sql);
            $request->execute(array($log, $mdp));
            $user = $request->fetchAll();

            if ( count($user) > 0) {
                $_SESSION['prenom no­m'] = ucfirst(strtolower($­user[0][prenom])) . ' ' . strtoupper($user[0][­nom]);
                $_SESSION["connecter­"] = "yes";
                header("location:dashboard.php");
            }else{
                $erreur = "Mauvais login ou mot de passe!";
                echo $erreur;
            }

            // $sql = "SELECT * from amis where email ='".$log."' limit 1";
            // $request = $this->db->prepare($sql);
            // $request->execute();
            // $user = $request->fetchAll();

            // if ( count($user) > 0) {
            //         $_SESSION['prenom_no­m'] = ucfirst(strtolower($­user[0][prenom])) . ' ' . strtoupper($user[0][­nom]);
            //         $_SESSION["connecter­"] = "yes";
            //         header("location:dashboard.php");
            //     }else{
            //         $erreur = "Mauvais login ou mot de passe!";
            //         echo "<script> alert( "; echo "$erreur"; echo" ) </script>";
            //     }
        }

        // Méthode permettant d'ajouter des amis.
        public function insert(string $numero,string $nom,string $prenom,string $email,string $datenaissance,string $sexe,string $passwoord){
            $sql = "INSERT INTO amis(numero,nom,prenom,email,datenaissance,sexe,passwoord) value ('".$numero."','".$nom."','".$prenom."','".$email."','".$datenaissance."','".$sexe."','".$passwoord."')";
            $request = $this->db->prepare($sql);
            return $request->execute();
        }

        // Méthode permettant de mettre à jour la listes d'amis.
        //email ="."' $new_email'"." || string $new_email
        public function update(string $new_num,string $new_nom,string $new_prenom,string $new_datenaissance,string $new_sexe,string $new_passwoord){
            $sql = "UPDATE amis SET numero ="."' $new_num '"." nom ="."' $new_nom '"." prenom ="."' $new_prenom '"." datenaissance ="."' $new_datenaissance '"." sexe ="."' $new_sexe '"." passwoord ="."' $new_passwoord '"." WHERE email='" .$data."' "  ;
            $request = $this->_db->prepare($sql);
            return $request-> execute();
        }


        //Methodes permettant de supprimer de la base de données.
        public function delete($data){ 
            $sql = "DELETE * from amis WHERE email=".$data ;
            $request = $this->_db->prepare($sql);
            return $request-> execute();
        }

    }
?>