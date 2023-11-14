<?php
  if (isset($_POST["login"])) #<--------
  {
    $login_user = $_POST["account"]; 	 #<--------
    $login_password = $_POST["password"]; #<--------

    $link = mysqli_connect("localhost", "root", "")
      or die("無法建立資料連接: " . mysqli_connect_error());	  
    mysqli_query($link, "SET NAMES utf8");
    
    $sql = "SELECT * FROM user Where account = '$login_user'
            AND password = '$login_password'";       #<--------
    mysqli_select_db($link, "ilanfun")                       #<--------
      or die("開啟資料庫失敗: " . mysqli_error($link));						 
    $result = mysqli_query($link, $sql);       
      
    if(mysqli_num_rows($result) == 0){      
      echo "<script>alert('帳號密碼錯誤，請查明後再登入')</script>";
    }
    else{
      session_start();
      $row = mysqli_fetch_array($result);
      $_SESSION["login_user"] = $row["account"];
      $_SESSION["login_name"] = $row["name"];        
      header("location:index.php");
    }
    mysqli_free_result($result);	
    mysqli_close($link);
  }
  if (isset($_POST["guest"])) #<--------
  {
    $login_user = "000";	 #<--------
    $login_password = "000"; #<--------

    $link = mysqli_connect("localhost", "root", "")
      or die("無法建立資料連接: " . mysqli_connect_error());	  
    mysqli_query($link, "SET NAMES utf8");
    
    $sql = "SELECT * FROM user Where account = '$login_user'
            AND password = '$login_password'";       #<--------
    mysqli_select_db($link, "ilanfun")                       #<--------
      or die("開啟資料庫失敗: " . mysqli_error($link));						 
    $result = mysqli_query($link, $sql);       
      
    if(mysqli_num_rows($result) == 0){      
      echo "<script>alert('出現問題請重試')</script>";
    }
    else{
      session_start();
      $row = mysqli_fetch_array($result);
      $_SESSION["login_user"] = $row["account"];
      $_SESSION["login_name"] = $row["name"];        
      header("location:index.php");
    }
    mysqli_free_result($result);	
    mysqli_close($link);
  }
  if(isset($_POST["register"])){
    header("Location: register.html");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="login.css">
    <title>ilanfun</title>
  </head>
  <body>
    
    <form action="" class ="login" method="post">
    <img src="ilan-removebg.png"></p>
      <i class="fa fa-user-circle-o"></i>
      <h3>帳號</h3>
      <input type="text" name="account" placeholder="請輸入帳號"><br>
      <h3>密碼</h3>
      <input type="password"name="password" placeholder="請輸入密碼"><br>
      <p align="center">
        <input type="submit" id="btn" name="guest" value="訪客登入">
        <input type="submit" id="btn" name="login" value="登入">
        <input type="reset"  id="btn" value="重填"> 
        <input type="submit" id="btn" name="register" value="註冊">
    </p>    
    </form>
  </body>
</html>