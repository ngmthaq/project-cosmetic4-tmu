<?php

// Đăng nhập
session_start();

// Tên máy chủ
define('HOST_NAME', 'localhost');

// Username của Xampp
define('USER_NAME', 'root');

// Mật khẩu xủa Xampp
define('PASSWORD', '');

// Tên database
define('DB_NAME', 'project_beauty');

// Kết nối đến csdl
$conn = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

// Kiểm tra nếu lỗi thì thông báo ...
if ($conn->connect_error) {
    die('KẾT NỐI THẤT BẠI: ' . $conn->connect_error);
}

// Die and Dump
function dd($param) {
    echo "<pre>";
    print_r($param);
    echo "</pre>";
    die();
}