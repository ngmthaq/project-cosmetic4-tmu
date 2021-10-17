<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

// Nếu người dùng chưa đăng nhập thì không đƯợc truy cập trang này và chuyển hướng về trang login
if (!$_SESSION['user']) {
    header('location: login.php');
}

// Lấy thông tin danh mục
$categorySql = "SELECT * FROM categories";
$categories = $conn->query($categorySql);
$categories = $categories->fetch_all(MYSQLI_ASSOC);

// Nếu người dùng nhấn nút thêm bài viết
if (isset($_POST['post'])) {
    // Lấy thông tin người dùng nhập trong form
    $categoryId = $_POST['category_id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $mainParagraph = $_POST['main_paragraph'];
    $image = $_POST['image'];
    $userId = $_SESSION['user'];

    // THay đổi ký tự đặc biệt
    $title = str_replace("'", "\'",  $title);
    $subtitle = str_replace("'", "\'",  $subtitle);
    $mainParagraph = str_replace("'", "\'",  $mainParagraph);

    // SQL
    $sql = "INSERT INTO `posts` (`title`, `subtitle`, `image`, `main_paragraph`, `user_id`, `category_id`) 
    VALUES ('$title', '$subtitle', '$image', '$mainParagraph', '$userId', '$categoryId')";

    // Thêm dữ liệu vào csdl
    if ($conn->query($sql)) {
        header('location: dashboard.php#posts');
    }

    // Nếu không thêm đƯợc thì hiện lỗi
    $err = 'Đăng bài không thành công, xin vui lòng thử lại';
}

$sqlPosts = 'SELECT * FROM posts';
$posts = $conn->query($sqlPosts);
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
    <!-- Nội dung chính -->
    <div class="main">
        <div class="container">
            <div class="row bg-light">
                <div class="col-12">
                    <div class="my-3 d-flex justify-content-between">
                        <span>
                            <a href="index.php" class="btn btn-sm btn-outline-dark">Trang chủ</a>
                            <a href="logout.php" class="btn btn-sm btn-outline-danger">Đăng xuất</a>
                        </span>
                    </div>
                    <hr>
                    <form action="" method="POST" id="post">
                        <div class="form-group">
                            <h5 class="my-3">Thêm bài viết</h5>
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select name="category_id" id="category" class="form-control">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Tiêu đề phụ</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh bìa</label>
                            <input type="text" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="main-paragraph">Nội dung</label>
                            <textarea name="main_paragraph" id="main-paragraph" class="form-control" cols="30" rows="10"></textarea>
                            <small class="text-danger" id="err">
                                <?php echo $err ?? '' ?>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="post">Đăng bài</button>
                    </form>
                </div>
                <div class="col-12 my-3">
                    <hr>
                    <h5 class="my-3">Danh sách bài viết</h5>
                    <table class="table" id="posts">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="id-col">ID</th>
                                <th scope="col" class="title-col">Tiêu đề</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($posts) > 0) : ?>
                                <?php foreach ($posts as $post) : ?>
                                    <tr>
                                        <td scope="row">
                                            <?php echo $post['id'] ?>
                                        </td>
                                        <td class="title-content">
                                            <?php echo $post['title'] ?>
                                        </td>
                                        <td><?php echo $post['created_at'] ?></td>
                                        <td>
                                            <a href="./post.php?id=<?php echo $post['id'] ?>" class="btn btn-sm btn-outline-info">Xem</a>
                                            <a href="./edit.php?id=<?php echo $post['id'] ?>" class="btn btn-sm btn-outline-warning">Sửa</a>
                                            <a href="./delete.php?id=<?php echo $post['id'] ?>" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-outline-danger">Xoá</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- Liên kết JS -->
    <script src="./public/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./public/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="./public/vendors/fontawesome/js/all.min.js"></script>
    <script src="./public/vendors/ckedior/ckeditor/ckeditor.js"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
    <script>
        CKEDITOR.replace('main_paragraph');
    </script>
</body>

</html>