<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

$categorySql = "SELECT * FROM categories";
$categories = $conn->query($categorySql);
$categories = $categories->fetch_all(MYSQLI_ASSOC);

// Lấy dữ liệU của post cần sửa
$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "SELECT posts.*, categories.name FROM posts INNER JOIN categories
    ON posts.category_id = categories.id
    WHERE posts.id = $id";
    $post = $conn->query($sql);
    $post = $post->fetch_assoc();
}

// Nếu người dùng nhấn nút thêm bài viết
if (isset($_POST['edit'])) {
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
    $sql = "UPDATE posts SET title = '$title', subtitle = '$subtitle', image = '$image', 
    category_id = $categoryId, main_paragraph = '$mainParagraph'
    WHERE id = $id";

    // Sửa dữ liệu vào csdl
    if ($conn->query($sql)) {
        header('location: dashboard.php#posts');
    }

    // Nếu không thêm đƯợc thì hiện lỗi
    $err = 'Sửa bài không thành công, xin vui lòng thử lại';
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
    <!-- Nội dung chính -->
    <div class="main">
        <div class="container">
            <div class="row bg-light">
                <div class="col-12">
                    <div class="my-3">
                        <a href="dashboard.php" class="btn btn-sm btn-outline-dark">&lt; Quay lại</a>
                    </div>
                    <hr>
                    <form action="" method="POST" id="post">
                        <div class="form-group">
                            <h5 class="my-3">Thêm bài viết</h5>
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="<?php echo $post['category_id'] ?>"><?php echo $post['name'] ?></option>
                                <?php foreach ($categories as $category) : ?>
                                    <?php

                                    if ($category['id'] == $post['category_id']) {
                                        continue;
                                    }

                                    ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php echo $post['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Tiêu đề phụ</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control" value="<?php echo $post['subtitle'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh bìa</label>
                            <input type="text" name="image" id="image" class="form-control" value="<?php echo $post['image'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="main-paragraph">Nội dung</label>
                            <textarea name="main_paragraph" id="main-paragraph" class="form-control" cols="30" rows="10"><?php echo $post['main_paragraph'] ?></textarea>
                            <small class="text-danger" id="err">
                                <?php echo $err ?? '' ?>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="edit">Sửa bài</button>
                    </form>
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