<?php

require_once('./config.php');

// Lấy id bài viết
$id = $_GET['id'] ?? null;

// SQL
// Xoá bài viết có id tương ứng
$sql = "DELETE FROM posts WHERE id = $id";
$isDeleted = $conn->query($sql);

// Chuyển hướng trang
header('location: dashboard.php');
