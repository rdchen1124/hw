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
                <div class='login__container'>
                    <!-- <div class='login__title'><h1>登入</h1></div> -->
                    <h1>登入</h1>
                    <?php
                        if(!empty($_GET['errorCode'])){
                            $err = $_GET['errorCode'];
                            $msg = '';
                            if($err == '1'){
                                $msg = '資料有缺失';
                            }
                            if($err == '2'){
                                $msg = '資料有誤';
                            }
                            echo "<h2 class='error_code'>".$msg."</h2>";
                        }
                    ?>
                    <form class='login__form' method='POST' action='handle_login.php'>
                        <div class='login__form-input'><span>帳號 : </span><input name='username' type='text' /></div>
                        <div class='login__form-input'><span>密碼 : </span><input name='password' type='password' /></div>
                        <input class='login__sub-btn' type='submit' value='登入' />
                    </form>
                </div>
            </div>
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>