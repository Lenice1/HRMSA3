<?php
    include('./config.php');
    if(isset($_POST['Register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        $query = "INSERT INTO subscribers(name, email, address, gender) VALUES('$name', '$email', '$address', '$gender')";

        if(mysqli_query($conn, $query)) {
            header('location: thank_you.php');
        }   
    }
    
?>

<?php include 'includes/header.php'; ?>

<h2>Register</h2>


<form action="" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="gender">Gender:</label>
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>

    <label for="address">Address:</label>
    <input type="text" name="address">

    <label for="profile_picture">Profile Picture:</label>
    <input type="file" name="profile_picture">

    <button type="submit" name="Register">Register</button>
</form>

<?php include 'includes/footer.php'; ?>

