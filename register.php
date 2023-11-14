<?php
  $link=mysqli_connect("localhost","root","") 
            or die("連接伺服器錯誤<br>");
  mysqli_select_db($link, "ilanfun") 
            or die("連接資料庫錯誤<br>");
  mysqli_query($link, "SET NAMES UTF8");
  
  $name = $_POST["name"];
  $account = $_POST["account"];
  $password = $_POST["password"];
  $authority=$_POST["authority"];

  $sql = "SELECT * FROM user WHERE account='$account'";
  $data=mysqli_query($link, $sql);
   
  if (mysqli_num_rows($data) == 0)
  {
    mysqli_free_result($data);
    $sql = "INSERT INTO user (name, account, password, authority,id) VALUES('$name','$account','$password','$authority',3)";
    $data=mysqli_query($link, $sql);
    echo "<p align='center'>註冊成功!</p>";
    header("Refresh:2 ; url=login.php");
  }
  else
  {
    //重複
    echo "<p align='center'>此帳號已有人使用。</p>";
    header("Refresh:2 ; url=register.html");
  }
  mysqli_close($link);
?>