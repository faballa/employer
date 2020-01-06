<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="affich.css">
     <title>FORMULAIRE DE L'EMPLOYER</title>
</head>
<body>
  
<?php
$lignes = file("employe.txt");
     echo "<table>";
     echo "<tr>
     <th colspan='2'>Action</th>
     <th>Matricule</th>
     <th>Prenom</th>
     <th>Nom</th>
     <th>Date</th>
     <th>Salaire</th>
     <th>Telephone</th>
     <th>Email</th>
     <th  colspan='2'>Action</th>
</tr>";
for($i=0; $i<count($lignes); $i++){
     echo "<td><a href='Supprimer.php?ok=$personne[0]'><button>Supprimer</button></a>";
     echo "<td><a href='ModifEmp.php?ok=$personne[0]'><button>Modifier</button></a></td>";
     $personne=explode(";",$lignes[$i]);
     for($j=0;$j<count($personne); $j++){
          echo "<td>" .$personne[$j]."</td>";
     }

{
     echo "<td><a href='Supprimer.php?ok=$personne[0]'><button>Supprimer</button></a>";
     echo "<td><a href='ModifEmp.php?ok=$personne[0]'><button>Modifier</button></a></td>";
}
echo "</tr>";
}
echo  "</table>";
?>

</body>
</html>