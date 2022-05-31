<!DOCTYPE html>
<html lang="pl">
 <head>
<link rel="stylesheet" href="dark_mode.css"> 
<link rel="stylesheet" href="https://yrzer.github.io/pracownia_witr_i_apl/dark_mode.css">
 <meta charset="UTF-8">
 <title>logowanie</title>
 </head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div name="login">
  <label for="nick">nick:</label>
  <input type="text" id="nick" name="nick">
  
  <label for="password">hasło:</label>
  <input type="password" id="password" name="password"> <a href="signup.php">lub rejestracja</a> 
</div>
<?php
    session_start();
    if(isset($_POST['submit'])) {
      require_once "connect.php";
      $polaczenie = @new mysqli($host,$db_user,$db_pass,$db_name);
      if($polaczenie->connect_errno!=0){echo "error polaczenie z baza";}
      else {
        $nick = $_POST['nick'];
        $password = $_POST['password'];
        $nick = htmlentities($nick, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
        $sql_1 = "select * from osoby where nick = '$nick' AND haslo='$password'";
    
        if($rezultat = @$polaczenie->query($sql_1)){
            $ile_userow = $rezultat->num_rows;
            if($ile_userow>0){
                $wiersz = $rezultat->fetch_assoc();
                $user = $wiersz['nick'];
                $id_user = $wiersz['id'];
                unset($_SESSION['error']);
                $a1 = "user_name";$a2 = "user_password";$a3 = "user_id";
                setcookie($a1, $nick, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($a2, $password, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($a3, $id_user, time() + (86400 * 30), "/"); // 86400 = 1 day
            $polaczenie->close();$rezultat->close();header('refresh:1;url=index.php');
        }
        else{
            $_SESSION['error'] = '<h3 style="color:red">ERROR błąd logowania</h3>';
            header('location: logowanie.php');
        };
    }
    else{
        echo "error rezultat";
    }
    
  }}

  if(isset($_SESSION['error'])) echo '<h3 style="color:red">ERROR błąd logowania</h3>';
?>
    <br><input type="submit" name="submit" value="Submit">
</form>
</body></html>