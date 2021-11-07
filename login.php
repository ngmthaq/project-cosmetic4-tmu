<!-- Liên kết file cài đặt để kết nối đến database -->
<?php require_once('./config.php') ?>

<?php

// Nếu đã đăng nhập thì chuyển qua trang dashboard
if (isset($_SESSION['user'])) {
    header('location: dashboard.php');
}

// Lấy dữ liệu ngườI dùng
$sql = "SELECT * FROM users";

// Truy vấn sql
$users = $conn->query($sql);

// Chuyển kết quả về dạng mảng
$users = $users->fetch_all(MYSQLI_ASSOC);

// Nếu nhấn nút đăng nhập
if (isset($_POST['login'])) {
    // Lấy username và password người dùng vừa gửi từ form lên
    $userName = $_POST['user_name'];
    $password = $_POST['password'];

    // Chạy qua từ tài khoản trên csdl
    foreach ($users as $user) {
        // Kiểm tra username
        if ($userName == $user['user_name']) {
            // Kiểm tra password
            if ($password == $user['password']) {
                // Lưu dữ liệu đăng nhậP của người dùng
                $_SESSION['user'] = $user['id'];
                // Chuyển hướng
                header('location: dashboard.php');
            }
        }
    }

    // Nếu ko thấy tài khoản trùng khớp thì báo lỗi
    $err = 'Sai tài khoản hoặc mật khẩu';
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
    <div class="content">
        <div class="row no-gutters bg-light">
            <div class="col-6">
                <div class="login-title">
                    <h1>ĐĂNG NHẬP</h1>
                    <p>Đăng nhập để xác thực quyền truy cập trang web</p>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <form action="" method="post" style="width: 400px;" id="login-form">
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
                        <small class="text-danger" id="login-form-err">
                            <!-- Hiển thị lỗi -->
                            <?php echo (isset($err)) ? $err : "" ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-sm btn-primary">Đăng nhập</button>
                        <a href="index.php" class="btn btn-sm btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Liên kết JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./public/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>
