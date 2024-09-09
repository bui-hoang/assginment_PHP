<?php
$host = 'localhost';  // Thay đổi nếu cần
$db = 'assginment_php';
$user = 'root';       // Thay đổi nếu cần
$pass = 'root';           // Thay đổi nếu cần

// Tạo kết nối
$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
