<?php

//if (isset($_POST["sure"]))
//{
//$plan=$_POST["schedule"];
//header("location:index.php?plan=$plan");
//}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/schedule.css">
    <title>ilanfun</title>
  </head>
  <body>

  <header class='flex-container'>
  <a href="index.php"><img src='ilan.png' ></a><br>
  <nav>
  <span><a href='index.php'>首頁</a><span>
    </nav>
  </header>
    
    <form action="schedule" class="menu" method="post">
      <p align="center">
        <input type="radio" name="schedule" value="A" checked>行程A 猴硐坑瀑布9:00~11:00 五花馬水餃館11:30~12:30 幾米公園13:00~17:00 羅東夜市17:30~18:30<p align="center"><img src="photo/waterfall.jpg"><img src="photo/five.png"><img src="photo/jimy.jpg"><img src="photo/east.jpg"></p>
        <p align="center">
        <input type="radio" name="schedule" value="B" > 行程B 安農溪9:00~11:00 馬桂爺爺11:30~12:30 北關海潮公園13:00~17:00 東門夜市17:30~18:30<p align="center"><img src="photo/seperatewater.jpg"><img src="photo/horse.jpg"><img src="photo/sea.jpg"><img src="photo/eastnight.jpg"></p>
        <p align="center">
        <input type="radio" name="schedule" value="C" >行程C 天送埤火車站9:00~11:00 麥當勞11:30~12:30 太平山13:00~17:00 清溝夜市17:30~18:30 <p align="center"><img src="photo/sky.jpg"><img src="photo/m.png"><img src="photo/mountain.jpg"><img src="photo/gap.jpg"></p>
    </p>  
    <!--<p align="center">
    <input type="submit" value="確定" name="sure"> -->
    </form>
    
  </body>
</html>