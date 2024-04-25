<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `credential` WHERE username = '$username'" ;
        $result = mysqli_query($conn,$sql);

        if($result){

            $num=mysqli_num_rows($result);

            if($num>0){
                echo "User Already Exits";
            }
            else{
                $sql = "INSERT INTO `credential` (username, password) VALUES ('$username','$password')";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "Register Successfull";
                    header('location:login.php');
                }
                else{
                    die(mysqli_error($conn));
                }
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration</h1>

    <form action="register.php" method="post">
    Username : <input type="text" name="username" id="username"><br>
    Password : <input type="password" name="password" id="password"><br>
    <button type="submit">Submit</button>
    </form>
</body>
</html>