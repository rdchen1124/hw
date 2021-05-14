<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');
    require_once('check_permission.php');

    $username = $_SESSION['username'];
    $sql = "SELECT A.id AS id, U.username AS username, U.nickname AS nickname, ".
    "A.title AS title, A.content AS content, A.created_at AS created_at FROM `articles` AS A ".
    "LEFT JOIN `users` AS U ON A.username = U.username WHERE A.is_deleted IS NULL ".
    "ORDER BY A.id DESC";
    
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param('ii', $limit, $offset);
    $result = $stmt->execute();
    if(!$result){
        die('Error:'.$conn->error);
    }
    
    $result = $stmt->get_result();
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
                <div class='admin__container'>
                    <h1>管理文章</h1>
                    <div class='admin__article_lists'>
                        <?php while($row = $result->fetch_assoc()){ ?>
                            <div class='admin__article_wrapper'>
                                <a class='admin__article' href='article.php?id=<?php echo $row['id'] ?>'><?php echo escapeChars($row['title']) ?></a>
                                <a class='admin__edit_article' href='edit_article.php?id=<?php echo $row['id'] ?>'>編輯</a>
                                <a class='admin__delete_article' href='handle_delete_article.php?id=<?php echo $row['id'] ?>'>刪除</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
        <footer><div>Copyright © 2021 Ryan's Blog All Rights Reserved.</div></footer>
    </body>
</html>