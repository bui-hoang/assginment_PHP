<?php
include 'functions/db.php';

// Lấy tất cả các danh bạ
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Bạ Điện Thoại</title>
</head>
<body>
    <h1>Danh Bạ Điện Thoại</h1>
    <a href="add_contact.php">Thêm danh bạ mới</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Chức năng</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td>
                    <a href="edit_contact.php?id=<?php echo $row['id']; ?>">Chỉnh sửa</a> |
                    <a href="delete_contact.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
