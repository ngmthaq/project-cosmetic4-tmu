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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./public/vendors/ckedior/ckeditor/ckeditor.js"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
    <script>
        CKEDITOR.replace('main_paragraph');
    </script>
</body>

</html>
