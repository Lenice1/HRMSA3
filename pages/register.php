<?php
require_once '../config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Check if the email address is already in use
        $check_email_query = "SELECT * FROM subscribers WHERE email = '$email'";
        $result = $conn->query($check_email_query);

        if ($result->num_rows > 0) {
            echo "Email address is already in use";
        } else {
            // Upload profile picture
            $profile_picture = "default_profile_picture.jpg"; // Default picture
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $target_dir = "profile_pictures/";
                $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

                if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                    $profile_picture = basename($_FILES["profile_picture"]["name"]);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            // Insert data into the database
            $insert_query = "INSERT INTO subscribers (name, email, gender, address, profile_picture) VALUES ('$name', '$email', '$gender', '$address', '$profile_picture')";

            if ($conn->query($insert_query) === TRUE) {
                // Redirect to a thank you page or home page
                header('Location: send_email.php');
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
    header('Location: ../thank_you.php');
    exit();
}
?>



<?php include 'home.php'; ?>

<!-- Content Section -->
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Register for HRMS</h2>

                <!-- Registration Form -->
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                        <small class="form-text text-muted">Upload a profile picture (optional).</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include '../includes/footer.php'; ?>
