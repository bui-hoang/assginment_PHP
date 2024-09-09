<?php
include 'functions/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $phone, $id);
    
    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
} else {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT name, phone FROM contacts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $phone);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Danh Bạ</title>
</head>
<body>
    <h1>Chỉnh Sửa Danh Bạ</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br><br>
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required><br><br>
        <button type="submit">Lưu</button>
    </form>
    <a href="index.php">Trở về</a>
</body>
</html>
