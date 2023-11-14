<?php
  $link=mysqli_connect("localhost","root","") 
  or die("連接伺服器錯誤<br>");
mysqli_select_db($link, "ilanfun") 
  or die("連接資料庫錯誤<br>");
mysqli_query($link, "SET NAMES UTF8");

session_start();
if($_SESSION['flag'] == 0){
  $_SESSION['flag'] = 1;
  $user_name1=$_GET["name"];
  /*echo $user_name1;*/
  $_SESSION["username"] = $user_name1;
}  
$user_name = $_SESSION["username"];

$sql_select = "SELECT * FROM reservation WHERE name='$user_name'";
$data_select=mysqli_query($link,$sql_select);
$num_select=mysqli_num_rows($data_select); 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/reservation.css">
        <title>預約活動</title>
    </head>
    <body>
  <header class='flex-container'>
  <a href="index.php"><img src='ilan.png' ></a><br>
  <nav>
  <span><a href='index.php'>首頁</a><span>
    </nav>
  </header>

    <div class="activity_layer">
    <form action="reservation.php?name=<?php $user_name ?>" method="post">
  
  <div class="act_left">
        <p>線上預約</p>
        <p>ONLINE RESERVATION</p>
  </div>
  <div class="act_center">
  <table>
    <tr>
    <td class="td_left">用戶:</td>
    <td class="td_right"><?php echo $user_name;?></td>
    </tr>
    <tr>
    <td class="td_left">選擇活動:</td>
    <td class="td_right">
        <select id="activity" name="activity">
        <option value="SUP">立槳SUP</option>
        <option value="surf">衝浪</option>
        <option value="island">龜山島一日遊</option>
        <option value="fish">海釣</option>
        <option value="A">行程A</option>
        <option value="B">行程B</option>
        <option value="C">行程C</option>
    </select>
    </td>
    </tr>
    <tr>
    <td class="td_left">選擇時段:</td>
    <td class="td_right">
        <select id="time" name="time">
        <option value="1">9:00~11:00</option>
        <option value="2">11:00~13:00</option>
        <option value="3">13:00~15:00</option>
        <option value="4">15:00~17:00</option>
        </select>
    </td>
    <!--<br>
    姓名:<input type="text" name="name">-->
    <tr>
    <td class="td_left">電話:</td><td class="td_right"><input id="phone" type="text" name="phone"></td> 
    </tr>
  </table>        
    <br>
        <div align="center">
        <input id="btn" type="submit" name="enter" value="確定">  
        </div>
    
</div>
<div class="act_left">
        <p>預約清單</p>
        <p>APPOINTMENT LIST</p>
  </div>
<div class="act_center">
<table class="table">
<tr><th class='th'>姓名</th><th class='th'>電話</th><th class='th'>時段</th><th class='th'>活動</th></tr> 
<?php
if($num_select != 0){
for($i=0;$i<$num_select;$i++){
  $r = mysqli_fetch_array($data_select);
  /*$rtime = implode($r["time"]);
  $reservation = implode($r["reservation"]);*/
  echo "<tr>";
  print("<td class='td'>".$user_name."</td>");
  print("<td class='td'>".$r["phone"]."</td>");
  if($r["time"] == "1"){
     $time_form="9:00~11:00";
   }
   else if($r["time"] == "2"){
     $time_form="11:00~13:00";
   }
   else if($r["time"] == "3"){
     $time_form="13:00~15:00";
   }
   else if($r["time"] == "4"){
     $time_form="15:00~17:00";
   }
  print("<td class='td'>".$time_form."</td>");
   if($r["reservation"] == "SUP"){
     $activity = "立槳";
   }
   else if($r["reservation"] == "surf"){
     $activity = "衝浪";
   }
   else if($r["reservation"] == "island"){
     $activity = "龜山島一日遊";
   }
   else if($r["reservation"] == "fish"){
     $activity = "海釣";
   }
   else if($r["reservation"] == "A"){
    $activity = "行程A";
  }
  else if($r["reservation"] == "B"){
    $activity = "行程B";
  }
  else if($r["reservation"] == "C"){
    $activity = "行程C";
  }
  print("<td class='td'>".$activity."</td>"."</tr>");      
 }  
 echo "</div>";
}else{
  
 echo "</div>";
}
?>
</table >


  </div>
  
    </form>
    	
    
</html>

<?php
  

  if(isset($_POST["enter"])){
    $phone=$_POST["phone"];
    $reservation = $_POST["activity"];
    $time = $_POST["time"];

    $sql = "SELECT * FROM reservation WHERE time='$time' and reservation='$reservation'";
    $data=mysqli_query($link, $sql);
    
    if (mysqli_num_rows($data) == 0)
    {
      mysqli_free_result($data);
      $sql_insert = "INSERT INTO reservation (reservation, time, name, phone) VALUES('$reservation','$time','$user_name','$phone')";
      $data_insert=mysqli_query($link, $sql_insert);
      echo "<p align='center'>預約成功!</p>";
      header("Location: reservation_success.php?name=$user_name");
      //header("url=reservation.php");
    }
    else
    {
      //重複
      ?>
      <script>alert("此時段已有人預約！");</script>
      <?php
      //echo "<h1 align='center'>此時段已有人預約。</h1>";
      header("url=reservation.php");
    }
   
   }
   ?>