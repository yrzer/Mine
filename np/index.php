<?php
session_start();
require_once "connect.php";
$polaczenie = @new mysqli($host,$db_user,$db_pass,$db_name);
if($polaczenie->connect_errno!=0){header('location: logowanie.php');}
else {
  $nick = $_COOKIE['user_name'];
  $password = $_COOKIE['user_password'];
  $nick = htmlentities($nick, ENT_QUOTES, "UTF-8");
  $password = htmlentities($password, ENT_QUOTES, "UTF-8");
  $sql_1 = "select * from osoby where nick = '$nick' AND haslo='$password'";
  if($rezultat = @$polaczenie->query($sql_1)){
      $ile_userow = $rezultat->num_rows;
      if($ile_userow>0){
          $wiersz = $rezultat->fetch_array();
          $user = $wiersz['1'];
          unset($_SESSION['error']);
      $rezultat->close();
  }
  else{
      $_SESSION['error'] = '<h3 style="color:red">ERROR błąd logowania</h3>';
      header('location: logowanie.php');
  };
}
else{
  header('location: logowanie.php');
}
$polaczenie->close();
}

if(isset($_POST['submit'], $_POST['token']) && ($_POST['token'] === $_SESSION['token']) ) { 
  $text = $_POST['text'];
  require_once "connect.php";
$polaczenie = @new mysqli($host,$db_user,$db_pass,$db_name);
  $id = $_COOKIE['user_id'];
  $polaczenie->query("INSERT INTO `chat` VALUES (NULL,$id,'$text')") ;
  
}$_SESSION['token'] = uniqid();
?>

<!DOCTYPE html>
<html lang="pl">
 <head>
<link rel="stylesheet" href="dark_mode.css"> 
<link rel="stylesheet" href="https://yrzer.github.io/pracownia_witr_i_apl/dark_mode.css">
 <meta charset="UTF-8">
 <title>chat</title>
 <style>
.chat{
  margin-left: -10%;
}
.send{
  margin-left: -7%;
}
.hed span{
  margin-left: 10%;
  color:black;
}
</style>
 </head>
<body><span class="wuloguj" onclick="usun()">wyloguj</span><center>
<div class="chat">
    <!-- 
<table>
  <tr>
    <th>nick:</th>
    <td><br><br>text</td>
  </tr>
</table>
    -->
<table class="table">
<?php
  require_once "connect.php";
  $polaczenie = @new mysqli($host,$db_user,$db_pass,$db_name);
  if($polaczenie->connect_errno!=0){echo "error polaczenie z baza";}
    $a=0;
    $n_id = "select id,nick from osoby;"; //  
    $w_id=mysqli_query($polaczenie,$n_id);
    while($row=mysqli_fetch_array($w_id)){
      //                   id      nick
      $tab_id[$a] = array($row['0'],$row['1']);
      $a++;
    }//tab[id+1][nick]
    $a=0;
    $sql = "SELECT * FROM (SELECT * FROM chat ORDER BY czas DESC limit 10) q ORDER BY czas ASC;";
    if($w=mysqli_query($polaczenie,$sql)){
        
      while($row=mysqli_fetch_array($w)){

        $id_nick = $tab_id[intval($row['1'])-1][1];
        //                   czas      osoba_id     txt      
        $tab[$a] = array($row['0'],$id_nick,$row['2'],);
        $a++;
      }
    };
	for ($i = 0; $i < $a; $i++) {
        echo "<tr><th class=\"hed\">".$tab[$i][1].":<span>".$tab[$i][0]."</span></th>";
        echo "<td class=\"text\"><br><br>".$tab[$i][2]."</td></tr>";
    }
    $polaczenie->close();
  ?>
</table>
<div class="send">
<?php echo "<span>".$nick.":</span>"; ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" name="text">
   <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
   <input type="submit" name="submit" value="wyślij">
</form>
</div>
</div>
</center></body>
<script type="text/javascript">
  const usun = ()=>{
    document.cookie = "user_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "user_password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.href="logowanie.php";
  }
</script></html>