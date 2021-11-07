<?php

// Câu lệnh sql lấy dữ liệu từ bảng categories
$sql = "SELECT * FROM categories";

// Thực hiện câu lệnh sql và gán giá trị vào biến $categories
$categories = $conn->query($sql);
if ($categories) {
    // Chuyển dữ liệu sang mảng vì php đọc dạng mảng
    $categories = $categories->fetch_all(MYSQLI_ASSOC);
}

?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="nav-box">
                    <div class="logo">
                        <a href="index.php">
                            <h3>cosmetic4</h3>
                        </a>
                    </div>
                    <nav class="navigation">
                        <ul>
                            <li><a href="index.php" class="<?php echo ($site == 'index') ? 'active' : '' ?>">Trang chủ</a></li>
                            <li class="category-posts">
                                <a href="posts.php" class="<?php echo ($site == 0 ? 'active' : '') ?>">Bài viết</a>
                            </li>
                            <!-- Foreach: Lấy dữ liệu trong mảng categories để in ra trang web -->
                            <?php foreach ($categories as $category) : ?>
                                <li class="category-posts">
                                    <a href="posts.php?id=<?php echo $category['id'] ?>" class="<?php echo ($site == $category['id'] ? 'active' : '') ?>">
                                        <?php echo $category['name'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <li><a href="about.php" class="<?php echo ($site == 'about') ? 'active' : '' ?>">Thông tin</a></li>
                            <li><a href="contact.php" class="<?php echo ($site == 'contact') ? 'active' : '' ?>">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-2">
                <div class="search-box">
                    <form action="posts.php" method="post" id="search-form">
                        <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Tìm kiếm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
