<?php
if(isset($_GET['ok'])){
    $matricule=$_GET['ok'];
    $file=fopen('employe.txt',"r");
    while(!feof($file))
    {
     
      $lignefile = fgets($file);
       
      $infos = explode(';',$lignefile);
      if($matricule==$infos[0]){
          $nom=$infos[1];
          $prenom=$infos[2];
          $date=$infos[3];
          $salaire=$infos[4];
          $tel=$infos[5];
          $email=$infos[6];
      }
     
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=e, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="affich.css">
    <title>Employer</title>
</head>
<body>
<form action="TmodifEmp.php?code=<?php echo $nom?>" method="post">
    <fieldset>
        <legend>Formulaire d'ajout d'employer</legend>
<label for=" Matricule"> Matricule :</label>
  <input type="text" name="matricule" value="<?php  echo $matricule?>" readonly><br>
  <label for="Nom"> Nom :</label>
  <input type="text" name="nom"  value="<?php echo $nom ?>" ><br>
  <label for="Nom">prenom :</label>
   <input type="text" name="prenom"  value="<?php echo $prenom ?>" ><br>
   <label for="date de Naissance">date de Naissance :</label>
    <input type="text" name="date" id="date"  value="<?php echo $date?>"><br>
    <?php if(isset($_POST['date'])){
        $date=$_POST['date'];
        $tabledate=explode("/",$date);
        if(!checkdate($tabledate[1],$tabledate[0],$tabledate[2])){
            echo "la date $date n'est pas valide";
        }
        }?>
    <label for="Salaire:">Salaire</label>
    <input type="text" name="salaire" value="<?php  echo $salaire?>"><br>
    <?php
    if(isset($_POST['salaire'])){
        $salaire=$_POST['salaire'];
            if($salaire>=25000 && $salaire<=2000000){
            }else{
                echo " le salire dois etre compris entre 25000-2000000 ";
            } echo '<br>';
        }
    
    ?>
    <label for="tel">Tel</label>
    <input type="text" name="tel" value="<?php echo $tel ?>"><br>
    <?php
    if(isset($_POST['tel'])){
        $tel=$_POST['tel'];
        if( preg_match('/^77|78|70|76[0-9]{7}$/',$tel))  {
            
        }else{
            echo" ce numero n'est pas valide";
        }
    
    }
    ?>
    <label for=" Email"> Email:</label>
   <input type="text" name="email"    value="<?php echo $email ?>"> <br>
   <?php
   if(isset($_POST['email'])){
   $email=$_POST['email'];
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse email '$email_a' n'est pas valide.";
}
   }
?>
   <input  type="submit" name="modifier" value="Modifier" class="btn btn-succes"></button>
   </fieldset>
   </form>
 
 
</body>
</html>