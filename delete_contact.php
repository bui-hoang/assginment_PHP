<?php
include 'functions/db.php';

$id = $_GET['id'];

// Chuẩn bị và thực thi câu lệnh đã chuẩn bị
$stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: index.php');
    exit;
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
?>
