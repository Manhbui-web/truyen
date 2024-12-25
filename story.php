<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "truyen hay moi ngay";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy ID truyện từ URL
$id = $_GET['id'];

// Truy vấn chi tiết truyện
$sql = "SELECT * FROM stories WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>" . $row['title'] . "</h1>";
    echo "<img src='" . $row['image'] . "' alt='" . $row['title'] . "'>";
    echo "<p>" . $row['content'] . "</p>";
} else {
    echo "Truyện không tồn tại!";
}

$conn->close();
?>