<?php
include 'config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query = "SELECT * FROM subscribers WHERE id = $id";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        include 'includes/errormessage.php';
    }
} else {
    include 'includes/errormessage.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Edit Record</h2>

 
        <form action="update_record.php" method="post">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $record['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $record['email']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Record</button>
        </form>
    </div>

</body>
</html>

