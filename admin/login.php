<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check login credentials 
    if ($_POST['adminUsername'] === 'admin' && $_POST['adminPassword'] === '@dministrat0r') {
        $_SESSION['admin'] = true;

        header('Location: admin_panel.php');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HRMS - Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/HRMS/pages/home.php">HRMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/pages/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/pages/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/pages/services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/pages/contact.php">Contact</a>
                </li>
                <?php if (isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="admin/admin_panel.php">Admin Panel</a>
                    </li>
                    <span class="admin-welcome">Welcome, Admin!</span>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="logout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
      
        <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Admin Login</h2>
                    
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="adminUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="adminUsername" name="adminUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<section class="content">
        <div class="container">
            <div class="container">
        
        <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">User Login</h2>
                    
                    <form action="ser_login_process.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
