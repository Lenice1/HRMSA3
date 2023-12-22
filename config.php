<?php
$host = "127.0.0.1"; 
$user = "root";
$password = '';
$database = "hrms_db";
$charset = 'utf8mb4';
$post =3306;

$conn = new mysqli($host, $user, $password, $database, $post);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM subscribers WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}
?>


