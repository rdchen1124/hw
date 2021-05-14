<?php
    $username = NULL;
    // 登入成功後，設定 Session 並跳轉回 index.php
    if(empty($_SESSION['username'])){
        header('Location:index.php?errorCode=1');
        exit;
    }
?>