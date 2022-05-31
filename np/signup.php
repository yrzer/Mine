<?php
session_start();
if(isset($_POST['submit'])) {
$ok=true;
///
$nick= $_POST['nick'];
if((strlen($nick)<3) || (strlen($nick)>20)){
  $ok=false;
  $_SESSION['e_nick']="nick od 3 do 20 znaków";
}
if(ctype_alnum($nick)==false){
  $ok=false;
  $_SESSION['e_nick']="tylko litery i cyfry bez polskich znaków";
}
///
$email= $_POST['email'];
$emailb = filter_var($email, FILTER_SANITIZE_EMAIL);
if((filter_var($emailb, FILTER_VALIDATE_EMAIL))==false || ($email!=$emailb)){
  $ok=false;
  $_SESSION['e_email']="podaj poprawny email";
}
///
$password= $_POST['password'];
$password2= $_POST['password2'];

if((strlen($password)<8) || (strlen($password)>20)){
  $ok=false;
  $_SESSION['e_password']="haslo od 8 do 20 znaków";
}
if(ctype_alnum($password)==false){
  $ok=false;
  $_SESSION['e_password']="tylko litery i cyfry bez polskich znaków";
}
if($password!=$password2){
  $ok=false;
  $_SESSION['e_password']="hasła muszą być takie same";}
///
if(!isset($_POST['regulamin'])){  $ok=false;
  $_SESSION['e_regulamin']="potwierdź regulamin";};
//////
require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try{
  $polaczenie = new mysqli($host,$db_user,$db_pass,$db_name);
  if($polaczenie->connect_errno!=0){throw new Exception(mysqli_connect_errno());}else{
    $rezultat = $polaczenie->query("SELECT id from osoby where nick='$nick'");
    if(!$rezultat) throw new exception($polaczenie->error);
    $ile_meili = $rezultat->num_rows;
    if($ile_meili>0){
      $ok=false;
      $_SESSION['e_nick']="taki nick jest już zarezerwowany";
    }
  }
}
catch(Exception $e){
  echo 'błąd serwera, sprubuj puźniej';
  // echo ' '.$e;
}
//////
if($ok==true){

  if($polaczenie->query("INSERT INTO `osoby` VALUES (NULL,'$nick','$password','$email')"))
  {   
    echo "<link rel=\"stylesheet\" href=\"https://yrzer.github.io/pracownia_witr_i_apl/dark_mode.css\"><center><h1>udana rejestracja";
  header('refresh:2;url=logowanie.php');
  $polaczenie->close();
  exit();
  }else{
    throw new exception($polaczenie->error);
    $polaczenie->close();
  }
}}
?>

<!DOCTYPE html>
<html lang="pl">
 <head>
<link rel="stylesheet" href="dark_mode.css"> 
<link rel="stylesheet" href="https://yrzer.github.io/pracownia_witr_i_apl/dark_mode.css">
 <meta charset="UTF-8">
 <title>rejestracja</title>
 </head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<label for="nick">nick:</label><br>
  <input type="text" id="nick" name="nick"><br>
  <?php if(isset($_SESSION["e_nick"])){echo '<div class="error">'.$_SESSION['e_nick'].'</div>';unset($_SESSION['e_nick']);} ?>

  <label for="email">email:</label><br>
  <input type="text" id="email" name="email"><br>
  <?php if(isset($_SESSION["e_email"])){echo '<div class="error">'.$_SESSION['e_email'].'</div>';unset($_SESSION['e_email']);} ?>
  
  <label for="password">hasło:</label><br>
  <input type="password" id="password" name="password"><br>

  <label for="password2">powtórz hasło:</label><br>
  <input type="password" id="password2" name="password2"><br>
  <?php if(isset($_SESSION["e_password"])){echo '<div class="error">'.$_SESSION['e_password'].'</div>';unset($_SESSION['e_password']);} ?>

  <label for="regulamin">regulamin:
  <input type="checkbox" id="regulamin" name="regulamin"></label><br>
  <?php if(isset($_SESSION["e_regulamin"])){echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';unset($_SESSION['e_regulamin']);} ?>


  <br><input type="submit" name="submit" value="Submit">
</from></body></html>