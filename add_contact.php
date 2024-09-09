<?php
include 'functions/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Chuẩn bị và thực thi câu lệnh đã chuẩn bị
    $stmt = $conn->prepare("INSERT INTO contacts (name, phone) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone);
    
    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Bạ</title>
</head>
<body>
    <h1>Thêm Danh Bạ</h1>
    <form method="post" action="">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        <button type="submit">Thêm</button>
    </form>
    <a href="index.php">Trở về</a>
</body>
</html>
