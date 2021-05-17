<nav class='navbar'>
    <div class='navbar__wrapper wrapper'>
        <div class="navbar__site-name">
            <a href='index.php'>Ryan's Blog</a>
        </div>
        <ul class='navbar__list'>
            <div>
                <li><a href="#">分類專區</a></li>
                <li><a href="article_list.php">文章列表</a></li>
                <li><a href="#">關於我</a></li>
            </div>
            <div>
                <?php if(!$username) {?>
                    <li><a href="login.php">登入</a></li>
                <?php }else{ ?>
                    <li><a href="add_article.php">發布文章</a></li>
                    <li><a href="admin.php">管理後台</a></li>
                    <li><a href="logout.php">登出</a></li>
                <?php } ?>
            </div>    
        </ul>
    </div>
</nav>