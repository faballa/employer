<?php
$fichier=file('employe.txt');
$nombreligne=count($fichier);
$dernierligne=$fichier[$nombreligne-1];
$mat=explode(';',$dernierligne);
$matricule=$mat[0];
if($matricule==''){
    $matricule="EM-".sprintf("%05d",1);
}else{ 
    $matricule++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire de l'employe</title>
</head>
<form action="employeindex.php" method="post">
    <label for="matricule">Matricule :</label>
    <input id="matricule" type="text" name="matricule" value="<?php echo $matricule;?>" readonly > <br><br>
    <label for="prenom">Prenom :</label>
    <input type="text" name="prenom"> <br> <br>
    <label for="nom">Nom :</label>
    <input type="text" name="nom"> <br> <br>
    <label for="date de naissance">Date de naissance :</label>
    <input type="text" name="date"> <br><br>
    <?php
     if(isset($_POST['date'])){    
    $date=$_POST['date'];
    $tabledate=explode("/",$date);
    if(!checkdate($tabledate[1],$tabledate[0],$tabledate[2])){

    }
}
?>
    <label for="salaire">Salaire :</label>
    <input type="text" name="salaire"> <br> <br>
    <?php
    if(isset($_POST['salaire'])){
        $salaire=$_POST['salaire'];
        if($salaire>=250000 && $salaire<=2000000){ 
        }else{
            echo "le salaire doit etre compris entre 250000 et 2000000";
            echo '<br>';
        }
    }
    ?>
    
    <label for="telephone">Telephone :</label>
    <input type="text" name="telephone"> <br> <br>
    <?php
    if(isset($_POST['telephone'])){
        $telephone=$_POST['telephone'];
        if(preg_match('/^(77|78|70|76)[0-9]{7}$/',$telephone)){
        }else{
            echo"ce numero n'est pas valide";
        }
    }
    ?>
    <label for="email">Email :</label>
    <input type="email" name="email"> <br> <br>
    <?php
    if(isset($_POST['email'])){
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "L'adresse email '$email' n'est pas valide.";
        }
    }
    ?>
    <button   type="submit" name="Enregistrer">Enregistrer</button>
</form>
<?php
if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['date']) && isset($_POST['salaire']) && isset($_POST['telephone']) && isset($_POST['email']) && isset($_POST['Enregistrer'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['date']) && !empty($_POST['salaire']) && !empty($_POST['telephone']) && !empty($_POST['email'])){
      $matricule=$_POST['matricule'];
       $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $date=$_POST['date'];
        $salaire=$_POST['salaire'];
        $telephone=$_POST['telephone'];
        $email=$_POST['email'];

       if($salaire>=250000 && $salaire<=2000000){ 
            $tabledate=explode("/",$date);
            if(!checkdate($tabledate[1],$tabledate[0],$tabledate[2])){
               
            }else {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(preg_match('/^(77|78|70|76)[0-9]{7}$/',$telephone)){
                        file_put_contents('employe.txt',$matricule.';'.$prenom.';'.$nom.';'.$date.';'.$salaire.';'.$telephone.';'.$email."\r\n",FILE_APPEND);
                        header('Location:affich.php');
                    }
                }
            }
        }
    }
   
}  

var_dump($matricule.';'.$prenom.';'.$nom.';'.$date.';'.$salaire.';'.$telephone.';'.$email);

?>  
    </body>
    </html>