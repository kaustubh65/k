<?php
session_start();
// Check if the user is not logged in, redirect to login page
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Retrieve username and full name from session
$fullname = $_SESSION['fullname'];

// Retrieve user ID from session or cookie
$user_id = $_SESSION['user_id'];
if (!isset($user_id) && isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
}

// Logout functionality
if(isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Remove the cookie
    setcookie('user_id', '', time() - 3600, '/');

    // Redirect to login page
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Welcome, <?php echo $fullname; ?></h2>
            </div>
            <div class="card-body">
                <p>Login Successful 😄</p>
                <a href="dashboard.php?logout=true" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
