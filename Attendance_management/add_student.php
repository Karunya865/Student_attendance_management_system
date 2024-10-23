<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'teacher') {
    header("Location: login.php");
    exit;
}

include 'db.php';

// Add student
if (isset($_POST['add_student'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'student')";
    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success'>Student added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/add_student.css" rel="stylesheet">
</head>
<body>
<!-- Navbar Header -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto " href="#" style="color: white; text-align: center; font-size:40px;">Add Student</a>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="container">
        <div class="form-container">
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="add_student" class="btn btn-success">Add Student</button>
            </form>
        </div>
    </div>
    <div class="container mt-5">

<!-- Add Logout Button -->
<a href="teacher_dashboard.php" class="btn btn-dark float-end">Back</a>

<!-- Rest of your dashboard code -->
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
