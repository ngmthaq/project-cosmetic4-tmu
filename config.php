<?php

define('HOST_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'project_beauty');

$conn = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die('KẾT NỐI THẤT BẠI: ' . $conn->connect_error);
}