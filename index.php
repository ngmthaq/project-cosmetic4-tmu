<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

$site = 'index';

$sql = "SELECT posts.*, categories.name FROM posts INNER JOIN categories
    ON posts.category_id = categories.id
    ORDER BY created_at DESC LIMIT 4";
$posts = $conn->query($sql);
$posts = $posts->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Liên kết CSS -->
    <link rel="stylesheet" href="./public/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./public/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/main.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="main">
        <!-- Liên kết file header -->
        <?php require_once('./layouts/_header.php') ?>

        <!-- Nội dung chính -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-light">
                        <div class="quote">
                            <p><small>LET'S BEAUTY YOURSELF WITH</small></p>
                            <h2 style="color: var(--main-color);">COSMETIC4</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-light">
                        <div class="post post-xl" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./public/images/body.jpg);">
                            <div class="post-content">
                                <p class="category-name">
                                    BÀI VIẾT
                                </p>
                                <h5 class="text">HƯỚNG DẪN CHĂM SÓC SỨC KHOẺ LÀN DA CỦA BẠN</h5>
                                <a href="posts.php">Tất cả bài viết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-3 bg-light" style="border-bottom: solid 2px var(--main-color);">
                    <div class="col-12">
                        <h5 class="text-center py-3">BÀI VIẾT MỚI</h5>
                    </div>
                    <?php if (count($posts) > 0) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <div class="col-6 mb-3">
                                <div class="post post-md" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo $post['image'] ?>);">
                                    <div class="post-content">
                                        <p class="category-name">
                                            <?php echo $post['name'] ?>
                                        </p>
                                        <h5 class="text">
                                            <a href="post.php?id=<?php echo $post['id'] ?>" class="border-0">
                                                <?php echo $post['title'] ?>
                                            </a>
                                        </h5>
                                        <a href="post.php?id=<?php echo $post['id'] ?>">Xem bài viết</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col-12">
                            <p>Không có bài viết</p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php require_once('./layouts/_about.php') ?>
                <?php require_once('./layouts/_contact.php') ?>
            </div>
        </div>

        <!-- Liên kết file footer -->
        <?php require_once('./layouts/_footer.php') ?>
    </div>
    <!-- Liên kết JS -->
    <script src="./public/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./public/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="./public/vendors/fontawesome/js/all.min.js"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>