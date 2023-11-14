<?php
   $view_id = $_GET["site"];  
   $user_account = $_GET["account"];
   $link=mysqli_connect("localhost","root","") 
                      or die("連接伺服器錯誤<br>");
   mysqli_select_db($link, "ilanfun") 
                      or die("連接資料庫錯誤<br>");
   mysqli_query($link, "SET NAMES UTF8");
   $sql = "SELECT * FROM message WHERE account='$user_account'";
   $data = mysqli_query($link, $sql);
   $r = mysqli_fetch_array($data);
   mysqli_free_result($data);  
?> 
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <meta charset="utf-8">
    <title> 修改留言 </title>
  </head>
  
  <body>
      <h1>修改留言</h1><hr/> 
      <form action='' method='POST'>
          <textarea name='msg' rows='3' cols='30'><?php echo  $r["data"];?> </textarea><br>
          <input type='submit' name='confirm'  value='確定修改'>
          <input type='submit' name='cancel'  value='取消修改'>
      </form>
  </body>
</html>
<?php
    if(isset($_POST["confirm"])){
        $msg = $_POST["msg"];        
        
        $sql = "UPDATE message SET  data = '$msg' WHERE account like '%$user_account%'";
        if(!mysqli_query($link, $sql)) 
            $result = "更新記錄失敗... <br/>". mysqli_error($link); //顯示sql的錯誤
        else  
            header("Location: showview.php?site=$view_id&account=$user_account");
    }
    if(isset($_POST["cancel"])){
        header("Location: showview.php?site=$view_id&account=$user_account");
    }
        
?>