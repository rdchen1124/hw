<?php
require_once("conn.php");
// $username = NULL;
if(!empty($conn->error) ){
    echo "連線失敗!!<br>";
}
// 登入成功後，設定 Session 並跳轉回 index.php
// if(!empty($_SESSION['username'])){

// }

$username = 'Ryan';
$sql = "SELECT A.id AS id, U.username AS username, U.nickname AS nickname, ".
    "A.title AS title, A.content AS content, A.created_at AS created_at FROM `articles` AS A ".
    "LEFT JOIN `users` AS U ON A.username = U.username WHERE U.username = ? ORDER BY A.id DESC";
// $sql = "SELECT * FROM `articles` ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$result = $stmt->execute();

if(!$result){
    die('Error:'.$conn->error);
}
$result = $stmt->get_result();
// $row = $result->fetch_assoc();
// print_r($row);


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
                <div class='articles'>
                    <?php while($row = $result->fetch_assoc()){ ?>
                        <article class='article'>
                            <div class='article__title'>
                                <div><?php echo $row['title'] ?></div>
                                <div class='article__edit'>
                                    <a class='article__edit-btn' href='edit_article.php'>編輯</a>
                                </div>
                            </div>
                            <div class='article__info'>
                                <div><?php echo $row['created_at'] ?></div>
                            </div>
                            <div class='article__content'>
                                <?php echo $row['content'] ?>
                            </div>
                            <b><a class='article__read_more' herf='article.php?id=1'>READ MORE</a></b>
                        </article>
                    <?php } ?>
                    <article class='article'>
                        <div class='article__title'>
                            <div>一些不太好記卻很好用的 CSS 屬性</div>
                            <div class='article__edit'>
                                <a class='article__edit-btn' href='edit_article.php'>編輯</a>
                            </div>
                        </div>
                        <div class='article__info'>
                            2021/05/11 17:40 pm
                            <!-- article__created_time -->
                        </div>
                        <div class='article__content'>
                            CSS 寫一陣子之後，大家對於常見的屬性應該都很熟了，例如說最基本的 display、position、padding、margin、border、background 等等，在寫 CSS 的時候不需要特別查什麼東西，很順的就可以寫出來。<br>
                            這些屬性之所以常見，是因為許多地方都用得到所以常見，而有些 CSS 屬性只能使用在某些特定地方，或者是只有某個特定的情境之下才會出現。<br>我很常會忘記這些沒那麼常用到的屬性，但在某些時候這些屬性其實特別重要。
                            因此這篇想來介紹一些我覺得不太好記但是卻很好用的 CSS 屬性，也是順便幫自己留個筆記。<br>
                        </div>
                        <a class='article__read_more' herf='article.php?id=1'>READ MORE</a>
                    </article>

                    <article class='article'>
                        <div class='article__title'>
                            <div>一些不太好記卻很好用的 CSS 屬性</div>
                            <div class='article__edit'>
                                <a class='article__edit-btn' href='edit_article.php'>編輯</a>
                            </div>
                        </div>
                        <div class='article__info'>
                            2021/05/11 17:40 pm
                            <!-- article__created_time -->
                        </div>
                        <div class='article__content'>
                            CSS 寫一陣子之後，大家對於常見的屬性應該都很熟了，例如說最基本的 display、position、padding、margin、border、background 等等，在寫 CSS 的時候不需要特別查什麼東西，很順的就可以寫出來。<br>
                            這些屬性之所以常見，是因為許多地方都用得到所以常見，而有些 CSS 屬性只能使用在某些特定地方，或者是只有某個特定的情境之下才會出現。<br>我很常會忘記這些沒那麼常用到的屬性，但在某些時候這些屬性其實特別重要。
                            因此這篇想來介紹一些我覺得不太好記但是卻很好用的 CSS 屬性，也是順便幫自己留個筆記。<br>
                        </div>
                        <a class='article__read_more' herf='article.php?id=1'>READ MORE</a>
                    </article>
                    <!-- <article class='article'>
                        <div class='article__title'>
                            <div>一些不太好記卻很好用的 CSS 屬性</div>
                            <div class='article__edit'>
                                <a class='article__edit-btn' href='edit_article.php'>編輯</a>
                            </div>
                        </div>
                        <div class='article__info'>
                            2021/05/11 17:40 pm
                        </div>
                        <div class='article__content'>
                            CSS 寫一陣子之後，大家對於常見的屬性應該都很熟了，例如說最基本的 display、position、padding、margin、border、background 等等，在寫 CSS 的時候不需要特別查什麼東西，很順的就可以寫出來。<br>
                            這些屬性之所以常見，是因為許多地方都用得到所以常見，而有些 CSS 屬性只能使用在某些特定地方，或者是只有某個特定的情境之下才會出現。<br>我很常會忘記這些沒那麼常用到的屬性，但在某些時候這些屬性其實特別重要。
                            因此這篇想來介紹一些我覺得不太好記但是卻很好用的 CSS 屬性，也是順便幫自己留個筆記。<br>
                        </div>
                        <a class='article__read_more' herf='article.php?id=1'>READ MORE</a>
                    </article>
                    <article class='article'>
                        <div class='article__title'>
                            <div>一些不太好記卻很好用的 CSS 屬性</div>
                            <div class='article__edit'>
                                <a class='article__edit-btn' href='edit_article.php'>編輯</a>
                            </div>
                        </div>
                        <div class='article__info'>
                            2021/05/11 17:40 pm
                        </div>
                        <div class='article__content'>
                            CSS 寫一陣子之後，大家對於常見的屬性應該都很熟了，例如說最基本的 display、position、padding、margin、border、background 等等，在寫 CSS 的時候不需要特別查什麼東西，很順的就可以寫出來。<br>
                            這些屬性之所以常見，是因為許多地方都用得到所以常見，而有些 CSS 屬性只能使用在某些特定地方，或者是只有某個特定的情境之下才會出現。<br>我很常會忘記這些沒那麼常用到的屬性，但在某些時候這些屬性其實特別重要。
                            因此這篇想來介紹一些我覺得不太好記但是卻很好用的 CSS 屬性，也是順便幫自己留個筆記。<br>
                        </div>
                        <a class='article__read_more' herf='article.php?id=1'>READ MORE</a>
                    </article> -->
                </div>
            </div>
        
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>