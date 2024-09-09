<?php
include 'functions/db.php';

$id = $_GET['id'];

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
