<?php
  $code= $_GET['ok'];
    if(isset($_POST['oui'])){
      $code= $_POST['oui'];
     $file=fopen("employe.txt","r");
     $tmp=fopen("tmp.txt","w+"); 
  
    while(!feof($file))
    {
      $lignefile = fgets($file);
       
      $infos = explode(';',$lignefile);
      if($code!=$infos[0]){
        fwrite($tmp,$lignefile);
      }
     
    }
  
    fclose($tmp);
    fclose($file);
    $file=fopen("employe.txt","w+");
    $tmp=fopen("tmp.txt","r"); 
    
    $chaine="";
    $chaine=file_get_contents("tmp.txt");
    fwrite($file,$chaine);

    fclose($tmp);
    fclose($file);
    //unlink("tmp.txt");
      header("Location:aficheEmp.php");
    
}
   
  
   ?>
   
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="supprimer.css">
</head>
<body>

  <form action="Supprimer.php" method="post">
      <button type="submit" name="valider" value="<?php if(isset($code)) echo $code?>">Valider</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button class=""> <a href="aficheEmp.php">Annuler</a></button><br><br>
        Voulez-vous supprimer?
  </form>

</body>
</html>


