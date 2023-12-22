<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Hospital Registration Management System</title>
</head>
<body>
    <header>
        <h1>Hospital Registration Management System</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/HRMS/pages/home.php">HRMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/index.php">Home</a>
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
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/registration_process.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="/HRMS/admin/login.php">Login</a>
                </li>
                <?php if (isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="admin_panel.php">Admin Panel</a>
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

    <section>
