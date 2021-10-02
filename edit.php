<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

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
                    <form action="" method="GET">
                        <div class="form-group">
                            <h5 class="my-3">Sửa bài viết</h5>
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
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary mb-3">Sửa bài</button>
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
        CKEDITOR.replace('content');
    </script>
</body>

</html>