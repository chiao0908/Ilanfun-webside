<?php
    $view_id=$_GET["site"];
    $user_account=$_GET["account"];
    header("Location: showview.php?site=$view_id&account=$user_account");
?>