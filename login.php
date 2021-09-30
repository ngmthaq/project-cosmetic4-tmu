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
    <div class="content">
        <div class="row no-gutters bg-light">
            <div class="col-6">
                <div class="login-title">
                    <h1>ĐĂNG NHẬP</h1>
                    <p>Đăng nhập để xác thực quyền truy cập trang web</p>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <form action="" method="post" style="width: 400px;">
                    <p style="color: var(--main-color)" class="text-center">
                        <strong>ĐĂNG NHẬP</strong>
                    </p>
                    <div class="form-group">
                        <label for="username">Tài khoản:</label>
                        <input type="text" name="user_name" id="username" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" name="password" id="password" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Đăng nhập</button>
                        <a href="index.php" class="btn btn-sm btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Liên kết JS -->
    <script src="./public/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="./public/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="./public/vendors/fontawesome/js/all.min.js"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>