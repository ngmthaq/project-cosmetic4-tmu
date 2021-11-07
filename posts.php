<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

$condition = '';
$pageTitle = 'Tất cả bài viết';
$site = 0;

// http://localhost/project/beauty/posts.php?id=2
// $_GET['id] = ?id => 2
if (isset($_GET['id'])) {
    $condition = ' WHERE category_id = ' . $_GET['id'];

    // Câu lệnh lấy dữ liệu từ bảng categories
    $sql = "SELECT * FROM `categories` WHERE id = " . $_GET['id'];
    $category = $conn->query($sql);
    $category = $category->fetch_assoc(); // fetch_assoc ~ fetch_all

    // Lấy tên của category có id tương ứng
    $pageTitle = $category['name'];
    $site = $category['id'];
}

// $_POST['search'] = giá trị trong ô tìm kiếm
if (isset($_POST['search'])) {
    $condition = ' WHERE posts.title LIKE "%' . $_POST['search'] . '%"';
    $pageTitle = 'Tất cả bài viết có kết quả tương ứng với từ khoá "' . $_POST['search'] . '"';
}

// Lấy tất cả thông tin của bảng posts, cột name của categories và cột name của bảng users với điều kiện
// category_id = $_GET['id] TH_1
// title gần giống với $_POST['search] TH_2
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
                    <div class="col-12">
                        <p class="text-center my-3" style="text-transform: uppercase;">
                            <strong><?php echo $pageTitle; ?></strong>
                        </p>
                    </div>
                    <?php if (count($posts) > 0) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <div class="col-4">
                                <div class="card mb-3">
                                    <div class="card-img-box">
                                        <img src="<?php echo $post['image'] ?>" class="card-img-top" width="100%" height="100%" style="object-fit: cover;" alt="ảnh">
                                    </div>
                                    <div class="card-body">
                                        <small><?php echo $post['category_name'] ?></small>
                                        <h5 class="card-title">
                                            <a href="post.php?id=<?php echo $post['id'] ?>" style="color: var(--main-color);">
                                                <?php echo $post['title'] ?>
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            <?php echo $post['subtitle'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="pb-5">Không có bài viết</p>
                    <?php endif; ?>
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
