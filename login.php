<?php
session_start();
require_once ('core/init.php');

if(isset($_POST['login'])){
  $user=$_POST['user'];
  $pass=substr(strrev(md5($_POST['pass'])), 2,-5);

  $tampil = $db->query("SELECT * FROM kar WHERE username='$user' AND password='$pass'");
  $cek=$tampil->fetch();

  if($tampil->rowCount()>=1){
    if($cek['level']== "admin"){
      $_SESSION['admin']= $cek['id'];
      header("Location:index.php");
    }elseif ($cek['level']== "kar") {
      $_SESSION['kar']= $cek['id'];
    }
  }else {
    echo "login gagal";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="" method="post">
      <table>
        <tr>
          <td>
            Username
          </td>
          <td>
            <input type="text" name="user" value="">
          </td>
        </tr>
        <tr>
          <td>
            Password
          </td>
          <td>
            <input type="text" name="pass" value="">
          </td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="login" value="Login"></td>
        </tr>
      </table>
    </form>
  </body>
</html>
