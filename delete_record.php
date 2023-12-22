<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM subscribers WHERE id = $id";
    $db->query($query);

    
    header("Location: view_records.php");
    exit();
} else {
    include 'includes/errormessage.php';
}
?>