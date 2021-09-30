<?php 

    $sql = "SELECT * FROM categories";
    $categories = $conn->query($sql);
    if ($categories) {
        $categories = $categories->fetch_all(MYSQLI_ASSOC);
    }

?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="nav-box">
                    <div class="logo">
                        <a href="index.php"><h3>cosmetic4</h3></a>
                    </div>
                    <nav class="navigation">
                        <ul>
                            <li><a href="index.php" class="<?php echo ($site == 'index') ? 'active' : '' ?>">Trang chủ</a></li>
                            <li class="category-posts">
                                <a href="posts.php" class="<?php echo ($site == 'posts') ? 'active' : '' ?>">Bài viết</a>
                                <ul class="category-box">
                                    <?php foreach ($categories as $category) : ?>
                                        <li><a href="posts.php?id=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li><a href="about.php" class="<?php echo ($site == 'about') ? 'active' : '' ?>">Thông tin</a></li>
                            <li><a href="contact.php" class="<?php echo ($site == 'contact') ? 'active' : '' ?>">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-3">
                <div class="search-box">
                    <form action="posts.php" method="post" id="search-form">
                        <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Tìm kiếm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>