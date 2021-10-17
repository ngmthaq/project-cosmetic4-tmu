<?php

// Liên kết csdl
require_once('./config.php');

// Huỷ đang nhập
unset($_SESSION['user']);

// Chuyển hướng về trang chủ
header('location: index.php');

?>