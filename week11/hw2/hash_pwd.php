<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header></header>
        <nav class='navbar'>
            <div class='navbar__wrapper wrapper'>
                <div class="navbar__site-name">
                    <a href='index.php'>Ryan's Blog</a>
                </div>
                <ul class='navbar__list'>
                    <div>
                        <li><a href="#">分類專區</a></li>
                        <li><a href="#">文章列表</a></li>
                        <li><a href="#">關於我</a></li>
                    </div>
                    <div>
                        <li><a href="add_article.php">發布文章</a></li>
                        <li><a href="admin.php">管理後台</a></li>
                        <li><a href="login.php">登入</a></li>
                        <li><a href="logout.php">登出</a></li>
                    </div>    
                </ul>
            </div>
        </nav>
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
                    <form class='login__form' method='POST' action='handle_hash_pwd.php'>
                        <div class='login__form-input'><span>帳號 : </span><input name='username' type='text' /></div>
                        <div class='login__form-input'><span>密碼 : </span><input name='password' type='password' /></div>
                        <input class='login__sub-btn' type='submit' value='Go Hash' />
                    </form>
                </div>
            </div>
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>