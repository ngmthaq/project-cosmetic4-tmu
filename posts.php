<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

$condition = '';
$pageTitle = 'Tất cả bài viết';
$site = 0;

if (isset($_GET['id'])) {
    $condition = ' WHERE category_id = ' . $_GET['id'];
    $sql = "SELECT * FROM `categories` WHERE id = " . $_GET['id'];
    $category = $conn->query($sql);
    $category = $category->fetch_assoc();
    $pageTitle = $category['name'];
    $site = $category['id'];
}

if (isset($_POST['search'])) {
    $condition = ' WHERE posts.title LIKE %' . $_POST['search'] . '%';
    $pageTitle = 'Tất cả bài viết có kết quả tương ứng với từ khoá "' . $_POST['search'] . '"';
}

$sql = 'SELECT `posts`.*, `categories`.`name` AS `category_name`, `users`.`name` AS `user_name` FROM `posts` 
    INNER JOIN `categories` ON `posts`.`category_id` = `categories`.`id`
    INNER JOIN `users` ON `posts`.`user_id` = `users`.`id`' . $condition;

$posts = $conn->query($sql);
if ($posts) {
    $posts = $posts->fetch_all(MYSQLI_ASSOC);
}

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
                <div class="row bg-light">
                    <div class="col-12">
                        <p class="text-center my-3" style="text-transform: uppercase;">
                            <strong><?php echo $pageTitle; ?></strong>
                        </p>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3">
                            <div class="card-img-box">
                                <img src="./public/images/1.jpg" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="post.php" style="color: var(--main-color);">
                                        Card title
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div><div class="col-4">
                        <div class="card mb-3">
                            <div class="card-img-box">
                                <img src="./public/images/1.jpg" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="post.php" style="color: var(--main-color);">
                                        Card title
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div><div class="col-4">
                        <div class="card mb-3">
                            <div class="card-img-box">
                                <img src="./public/images/1.jpg" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="post.php" style="color: var(--main-color);">
                                        Card title
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div><div class="col-4">
                        <div class="card mb-3">
                            <div class="card-img-box">
                                <img src="./public/images/1.jpg" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="post.php" style="color: var(--main-color);">
                                        Card title
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div><div class="col-4">
                        <div class="card mb-3">
                            <div class="card-img-box">
                                <img src="./public/images/1.jpg" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="post.php" style="color: var(--main-color);">
                                        Card title
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div><div class="col-4">
                        <div class="card mb-3">
                            <div class="card-img-box">
                                <img src="./public/images/1.jpg" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="post.php" style="color: var(--main-color);">
                                        Card title
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                            </div>
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