<?php 
  $link=mysqli_connect("localhost","root","") 
    or die("連接伺服器錯誤<br>");
  mysqli_select_db($link, "ilanfun") 
    or die("連接資料庫錯誤<br>");
  mysqli_query($link, "SET NAMES UTF8");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>宜蘭景點</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://friconix.com/cdn/friconix.js"></script>
    <link rel="stylesheet" href="css/showview.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
        width: 25%;
        margin-top: 30px;
      }
      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <?php
        $view_id=$_GET["site"];
        /*echo "景點：".$view_id."<br>";*/
        if($view_id == 1){
            $piclink1 = "photo/1_1.jpg";
            $piclink2 = "photo/1_2.jpg";
            $piclink3 = "photo/1_3.jpg";
        }
        if($view_id == 2){
            $piclink1 = "photo/2_1.jpg";
            $piclink2 = "photo/2_2.jpg";
            $piclink3 = "photo/2_3.jpg";
        }
        if($view_id == 3){
            $piclink1 = "photo/3_1.jpg";
            $piclink2 = "photo/3_2.jpg";
            $piclink3 = "photo/3_3.jpg";
        }
        if($view_id == 4){
            $piclink1 = "photo/4_1.jpg";
            $piclink2 = "photo/4_2.jpg";
            $piclink3 = "photo/4_3.jpg";
        }
        if($view_id == 5){
            $piclink1 = "photo/5_1.jpg";
            $piclink2 = "photo/5_2.jpg";
            $piclink3 = "photo/5_3.jpg";
        }
        if($view_id == 6){
            $piclink1 = "photo/6_1.jpg";
            $piclink2 = "photo/6_2.jpg";
            $piclink3 = "photo/6_3.jpg";
        }
        if($view_id == 7){
            $piclink1 = "photo/7_1.jpg";
            $piclink2 = "photo/7_2.jpg";
            $piclink3 = "photo/7_3.jpg";
        }
    ?>
    <!--使用者權限-->
    <?php
      $user_account=$_GET["account"];
       /*echo "使用者：".$user_account."<br>";*/
      $sql_user="SELECT * FROM user WHERE account like '%$user_account%'";
      $data_user=mysqli_query($link,$sql_user);
      $row_u = mysqli_fetch_array($data_user);
      $user_id = $row_u['id'];
      $user_authority = $row_u['authority'];
      /*echo "使用者權限：".$user_authority."<br>";*/
    ?>
    <!--編輯留言-->
    <?php 
      if(isset($_POST["btn_edit"])){
        header("Location: editDetail.php?site=$view_id&account=$user_account");
      }
    ?>
    <!--刪除留言-->  
    <?php
      if(isset($_POST['btn_delmsg'])){
        $sql_delmsg="DELETE FROM message WHERE account like '%$user_account%'";      
        mysqli_query($link,$sql_delmsg)or die("刪除失敗");
        header("Location: delete_success.php?site=$view_id&account=$user_account");
      }
    ?>
    <!--新增留言-->
    <?php     
      //$message_id = $num_msg+1;
      if(isset($_POST["btn_addmsg"]) && isset($_POST["rating"])){ 
        $term=trim($_POST["txt_msg"]);
        $rating = $_POST['rating'];
        if($term == null){?>
              <script>alert("尚未填寫留言！");</script>
            <?php
        }
        else{
          $sql_addmsg="INSERT INTO message (account,view_id,data,score) VALUES ('$user_account','$view_id','$term','$rating')";
          mysqli_query($link,$sql_addmsg)or die("無法新增");
          header("Location: delete_success.php?site=$view_id&account=$user_account");
        }        
      }
    ?>   
    <script>
      let map;
      function initMap() {
        var viewid = <?php echo $view_id ?>;
        if(viewid == 1){
            //天送埤
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.77674610249759,  lng: 121.69935468941875 },
            zoom: 16,});     
        }
        else if(viewid == 2){
            //北關海潮
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.91272110303404,  lng: 121.87780768757035 },
            zoom: 16,});     
        }
        else if(viewid == 3){
            //太平山
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.49793877008328,  lng: 121.53546095078714 },
            zoom: 16,});     
        }
        else if(viewid == 4){
            //幾米公園
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.752899190973174,  lng: 121.75733639126945 },
            zoom: 16,});     
        }
        else if(viewid == 5){
            //羅東夜市
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.677529213153846,  lng: 121.76864925079077 },
            zoom: 16,});     
        }
        else if(viewid == 6){
            //猴洞坑瀑布
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.84370599123908,  lng: 121.78247965079446 },
            zoom: 16,});     
        }
        else if(viewid == 7){
            //安農溪分洪堰公園
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 24.686649549878158,  lng: 121.72813538941682 },
            zoom: 16,});     
        }
      }
    </script>
  </head>
  <header class='flex-container'>
  <a href="index.php"><img src='ilan.png' ></a><br>
  <nav>
  <span><a href='index.php'>首頁</a><span>
    </nav>
  </header>

  <div id="carouselIndicators" class="carousel slide"  height="50%" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselIndicators" data-slide-to="1"></li>
          <li data-target="#carouselIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo $piclink1 ?>" alt="First slide">
            <div class="carousel-caption">
              
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $piclink2 ?>" alt="Second slide">
            <div class="carousel-caption">
              
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $piclink3 ?>" alt="Third slide">
            <div class="carousel-caption">
            </div>
          </div>
      </div>
    </div>    
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>         
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
                crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
                crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
                crossorigin="anonymous">
        </script>
        <script>
          $(".carousel").carousel({
            interval: 2000
          });
        </script>
  <body> 
    <!--文章內容-->
    <?php
        $sql = "SELECT * FROM view WHERE view_id like '%$view_id%'";
        $data=mysqli_query($link, $sql);
        $r = mysqli_fetch_array($data);
        echo "<div class='board_layer'>";
        echo "<div class='board_left'>";
        echo "<span><h1>".$r["title"]."</h1></span><br><hr><br>";
        echo "<span><h3>".$r["post"]."</h3></span><br>";
        echo "<span><h3>價錢：".$r["price"]."</h3></span><br>";
        echo "<span><h3>時間：".$r["time"]."</h3></span><br>";
        echo "</div>";
    ?>
    </div>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <!--google map-->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3vmhAmNIMrlSq1FC2js_3bh4Cp4BGSRI&callback=initMap&libraries=&v=weekly" async>
    </script>

    

    <!--留言-->
    <main class="board">　
    <div class ="board__header">
      <div class="border__word-block">
        <h1 class="board__tittle">留言板</h1>
      </div>
    </div>
    <!--留言板-->
    <?php
      $sql_msg="SELECT * FROM message WHERE view_id like '%$view_id%'";
      $data_msg=mysqli_query($link,$sql_msg);
      $num_msg=mysqli_num_rows($data_msg);  

      for($num=0;$num<$num_msg;$num++) {
        $row = mysqli_fetch_array($data_msg);
      ?>
      <!--留言板-->
      <div class="board__hr"></div>
      <div class="card">
        <div class="card__body">
            <div class="card__info">
              <span class="card__author">
              <?php 
                $msguser_account=$row['account'];
                $sql_name="SELECT * FROM user WHERE account like '%$msguser_account%'";
                $data_name=mysqli_query($link,$sql_name);
                $row_name = mysqli_fetch_array($data_name);

                echo $row_name['name'];
              ?></span>
              <span class="card__time">2020-10-01 23:07:04    </span>
              <span class="card__score"><?php echo "評分：".$row['score']."星" ?></span>        
            </div>
            <p class="card__content"><?php echo $row['data'];?></p>
            <?php 
              if($user_authority>0 && $row_u["account"] == $row["account"]){
            ?>
            <form method="post" action="">
                <input type="submit" name="btn_delmsg" value="刪除留言"> 
                <input type="submit" name="btn_edit"  value="編輯留言">   
            </form>
            <?php } ?>
        </div>
      </div>      
      <div class="board__hr"></div>
      <?php } ?> 
        
    <!--評分星星-->
    <?php 
      if($user_authority>0){
    ?>
    <font size="28">給這個景點評分吧！</font>
    <form method="post" action="">      
        <div class="star">
            <input type="radio" name="rating" id="star-1" value="5"> <label for="star-1" data-dataid="1"></label>
            <input type="radio" name="rating" id="star-2" value="4"> <label for="star-2" data-dataid="2"></label>
            <input type="radio" name="rating" id="star-3" value="3"> <label for="star-3" data-dataid="3"></label>
            <input type="radio" name="rating" id="star-4" value="2"> <label for="star-4" data-dataid="4"></label>
            <input type="radio" name="rating" id="star-5" value="1"> <label for="star-5" data-dataid="5"></label>
        </div><br><br>    
        <input type="text" size="75" name="txt_msg"><br>
        <input type="submit" name="btn_addmsg" value="新增留言"> 
    </form>                        
    <?php } ?>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"> </script>
  </body>
</html>
