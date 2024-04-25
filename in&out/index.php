<?php
session_start();
// Create connection
$conn = new mysqli("localhost","root","","data");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is already logged in, redirect to dashboard if true
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to fetch user from database
    $sql = "SELECT id, fullname FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Authentication successful, set session variables
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];

        // Set a cookie to remember the user
        setcookie('user_id', $_SESSION['user_id'], time() + (86400 * 30), "/"); // 30 days expiration

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Login</h2>
            </div>
            <div class="card-body">
                <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
