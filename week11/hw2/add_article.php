<?php
    session_start();
    require_once('check_permission.php');
    $username = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header></header>
        <?php include_once('header.php'); ?>
        <main>
            <section class="banner">
                <div class="banner__wrapper">
                    <h1>Practice makes perfect!</h1>
                    <div>basic blog demo</div>
                </div>
            </section>

            <div class='container__wrapper'>
                <div class='add_article__container'>
                    <form class='add_article__form' method='POST' action='handle_add_article.php'>
                        <h1>新增文章</h1>
                        <?php
                            if(!empty($_GET['errorCode'])){
                                $err = $_GET['errorCode'];
                                $msg = '';
                                if($err == '1'){
                                    $msg = '資料有缺失';
                                }
                                if($err == '2'){
                                    $msg = '新增文章失敗';
                                }
                                echo "<h2 class='error_code'>".$msg."</h2>";
                            }
                        ?>
                        <div class='add_article__form-input'>
                            <span>標題 : </span><input name='title' type='text' />
                        </div>
                        <span>內容 : </span>
                        <textarea name='content'></textarea>
                        <input class='login__sub-btn' type='submit' value='送出' />
                    </form>
                </div>
            </div>
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>