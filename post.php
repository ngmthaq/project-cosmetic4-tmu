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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>
