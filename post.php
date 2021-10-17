<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

// Kiểm tra id bài viết
$id = $_GET['id'] ?? null;

// Nếu có id
if ($id) {
    // Lấy thông tin bài viết
    $sql = 'SELECT `posts`.*, `categories`.`name` AS `category_name`, `users`.`name` AS `user_name` FROM `posts` 
    INNER JOIN `categories` ON `posts`.`category_id` = `categories`.`id`
    INNER JOIN `users` ON `posts`.`user_id` = `users`.`id` WHERE posts.id = ' . $id;
    $post = $conn->query($sql);
    $post = $post->fetch_assoc();
} else {
    // Nếu ko thì chuyển hướng về trang tất cả bài viết
    header('location: posts.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
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
                <div class="row bg-light">
                    <div class="col-9">
                        <div class="py-3">
                            <h4 class="pt-3 pb-2">
                                <?php echo $post['title'] ?>
                            </h4>
                            <p class="pb-3">
                                <i>
                                    <strong>
                                        <?php echo $post['subtitle'] ?>
                                    </strong>
                                </i>
                            </p>
                            <div>
                                <?php echo $post['main_paragraph'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="ads my-3 h-50">
                            <p>Quảng cáo MỸ PHẨM</p>
                            <h5>COSMETIC4</h5>
                            <p>Thương hiệu mỹ phẩm nổi bật</p>
                        </div>
                        <div class="ads mb-3 h-25">
                            <p>Quảng cáo MỸ PHẨM</p>
                            <h5>COSMETIC4</h5>
                            <p>Thương hiệu mỹ phẩm nổi bật</p>
                        </div>
                    </div>
                </div>
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