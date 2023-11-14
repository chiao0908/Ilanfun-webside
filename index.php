<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="css/index.css">
    <title>ilanfun</title>    
          
  </head>	
  <body>
    
    <?php
      //$plan=$_GET["plan"];
      //echo"$plan";
      require_once("dbtools.inc.php");
      
      //取得登入者帳號及名稱
      session_start();
      $site=0;
      $_SESSION["flag"] = 0;
	  if (isset($_SESSION["login_user"]))
	  {
        $login_user = $_SESSION["login_user"];   #<--------
        $login_name = $_SESSION["login_name"];   #<--------
      
	  }
					
      $link = create_connection();												
      $sql = "SELECT * FROM ilanfun order by name";
      
      echo "<table border='0' align='center'>";
      
     ///////////////

     ///////////////
      echo "</table>" ;								
      mysqli_close($link);      
      

      echo "<header class='flex-container'> ";
      echo "<img align='left' src='ilan.png'>";
      echo "<nav>";
    if (!isset($login_name))
    {
      
      echo "<span><a href='login.php'>登入</a></span>";
      echo "請先登入後以便查看";
    }
    else{
     
      echo "<span><a href='logout.php'>登出【 $login_name 】</a></span> ";
      $link1=mysqli_connect("localhost","root","") 
        or die("連接伺服器錯誤<br>");
      mysqli_select_db($link1, "ilanfun") 
        or die("連接資料庫錯誤<br>");
      mysqli_query($link1, "SET NAMES UTF8");               
      $sql_reservation="SELECT * FROM user WHERE account like '%$login_user%'";                 
      $data = mysqli_query($link1,$sql_reservation);
      $row = mysqli_fetch_array($data);
      $authority = $row["authority"];
      if($authority > 0){
        echo"<span><a href='reservation.php?name=$login_name'>預約活動</a></span>              ";
      }
      echo"<span><a href='schedule.php'>網站行程</a></span>                 ";
      echo "</nav>";
      echo "</header>";
      //main
    
      echo "<div class='main'>";

      echo "
      <div id='mission' class='flex-container'>
      <div class='content'>
        <h2>想去旅行嗎</h2>
        <h4>還在煩惱如何規劃行程嗎?</h4>
      </div>
      </div>";


      echo "<div id='view'>";
      echo "<h2>歡迎來到宜蘭FUN</h2>";
      echo "<h4>下面充滿了許多愛玩客的旅遊經驗及推薦，歡迎大家踴躍留言及參與</h4>";
      echo "<div class='flex-container items'>";

      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=1&account=$login_user'><img src='photo/sky.jpg'> 天送埤火車站曾是運送➤太平山木<br>材的重要據點
      典型傳統的日式建築<br>，現今保存的相當完善
      來訪能參觀<br>舊時的火車站....</a></span>";
      echo "</div>";

      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=2&account=$login_user'><img src='photo/sea.jpg' >北關海潮公園入園免門票，需額外<br>收停車費
      公園佔地不大，卻擁有遼<br>闊的觀海視野
      綠意盎然的北關海潮<br>公園，大自然景緻幽美
      能輕鬆眺望<br>龜山島....</a></span>";
      echo "</div>";

      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=3&account=$login_user'><img src='photo/mountain.jpg' >太平山國家森林遊樂園是旅行宜蘭<br>，熱門
      的玩樂景點之一，太平山全<br>區佔地1.2萬公頃
      ，海拔2000公尺<br>，位在中央山脈的北邊，來到
      太平<br>山遊樂園....</a></span>";
      echo "</div>";

      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=4&account=$login_user'><img src='photo/jimy.jpg' >宜蘭幾米公園 (幾米主題廣場) 和宜<br>蘭火車站、丟丟噹森林，將《星空<br>》、《向左走·向右走》、《地下鐵<br>》等，
      經典場景在幾米廣場完整重<br>現....</a>
      </span>";
      echo "</div>";

      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=5&account=$login_user'><img src='photo/east.jpg' >羅東夜市位於宜蘭縣羅東鎮中央的<br>中山公園四周，形成一個全年無休<br>的夜市，羅東鎮乃至宜蘭縣最繁華<br>的商圈也依此處向外擴張....
      </a></span>";
      echo "</div>";
      
      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=6&account=$login_user'><img src='photo/waterfall.jpg'>相信嗎?步行不用十分鐘就能賞到<br>瀑布，
      呵～免懷疑猴洞坑瀑布真<br>的是如此，
      不僅能欣賞到瀑布和<br>玩到冰涼透徹的溪水....</a></span>";
      echo "</div>";

      echo "<div class='items'>";
      echo "<span><a href='showview.php?site=7&account=$login_user'><img src='photo/seperatewater.jpg' >安農溪分洪堰公園，又稱湧泉公園<br>，位於宜蘭縣冬山鄉安農九路，佔<br>地約 0.79公頃，主要景緻為攔
      堰分<br>流、情定虹橋、綠溪望龜、落羽小<br>徑等....</a></span>";
      echo "</div>";
      echo "
      <div id='authors'>
      <h2>創辦人</h2>
      <div class='flex-container authors'>
        <div class='author'>
          <h3>林希哲</h3>
          <p>B642089</p>
          <p>電子工程四乙</p>
        </div>
        <div class='author'>
          <h3>焦柏琳</h3>
          <p>B642088</p>
          <p>電子工程四乙</p>
          </div>
        <div class='author'>
          <h3>李聿豪</h3>
          <p>B642086</p>
          <p>電子工程四乙</p>
        </div>
      </div>
    </div>";

      echo "</div>";
      echo "</div>";
      echo "</div>";
    }
    if (!isset($login_name))
    {  
      ?>
      <p align='center'><iframe class="music" width="1100" height="600" src="https://www.youtube.com/embed/jUw-z0RXLDI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </iframe></p>
      ";
      <?php
      } 
      ?>
  </body>
</html>