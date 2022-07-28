<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des ami(e)s</title>
</head>
<body>
<div>
    <a href="AddAmis.php">Ajouter</a><br><br>
    <table border style="border-collapse: collapse;">
      <thead>
        <th>Numero</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse Email</th>
        <th></th>
      </thead>
      <tbody>
        <?php
        require_once("model/Amis.php");
        $amis = new Amis();
        $ListAmis = $amis->findAll();
        
        //Affichages des elements de la base de données.
        foreach ($ListAmis as $tuple) {
          echo "<tr>";
          echo "<td>" . $tuple['numero'] . "</td>";
          echo "<td>" . $tuple['nom'] . "</td>";
          echo "<td>" . $tuple['prenom'] . "</td>";
          echo "<td>" . $tuple['email'] . "</td>";
          echo "<td><button><a href = UpdateAmis.php?numero=".$tuple['numero'].">Editer</a></button><button><a href = DeleteAmis.php?numero=".$tuple['numero'].">Supprimer</a></button></td>";
          echo "</tr>";
        }
        
        ?>
        <!--<tr>
          <td>1</td>
          <td>Fruit</td>
          <td><button>Editer</button><button>Supprimer</button></td>
        </tr>-->
      </tbody>
    </table>
  </div>
</body>
</html>