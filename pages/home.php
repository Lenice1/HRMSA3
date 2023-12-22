<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS - Home</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<?php include '../includes/header.php'; ?>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero {
            background-color: #007bff;
            color: #ffffff;
            padding: 100px 0;
            text-align: center;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            background-color: #ffffff;
            color: #007bff;
            border-radius: 5px;
        }

        .cta-button:hover {
            background-color: #e3e6ec;
        }

        .features {
            padding: 50px 0;
        }

        .feature {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4">Welcome to HRMS</h1>
            <p class="lead">Experience efficient and secure hospital registration services with HRMS.</p>
            <a href="register.php" class="cta-button btn btn-primary btn-lg">Register Now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature text-center">
                        <h3 class="h4">Efficient Registration Process</h3>
                        <p>Streamlined patient registration for a quick and hassle-free experience.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature text-center">
                        <h3 class="h4">Appointment Scheduling</h3>
                        <p>Advanced appointment scheduling system for reduced wait times.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature text-center">
                        <h3 class="h4">Medical History Management</h3>
                        <p>Comprehensive medical history management accessible to patients and providers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS (optional, for features like Navbar toggling) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

