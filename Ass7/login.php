<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `credential` WHERE username = '$username' AND password = '$password'" ;
        $result = mysqli_query($conn,$sql);

        if($result){

            $num=mysqli_num_rows($result);

            if($num>0){
                
                if(isset($_POST["remember"])){

                    setcookie ("member_login",$username,time()+(24 * 60 * 60));
                    setcookie ("member_password",$password,time()+(24 * 60 * 60));
                }
                else{

                    if(isset($_COOKIE["member_login"])){
                        setcookie ("member_login","");
                    }
                    if(isset($_COOKIE["member_password"])){
                        setcookie ("member_password","");
                    }
                }

                session_start();
                $_SESSION['username']=$username;
                echo "Login Successfull";

                header('location:home.php');

            }
            else{
                echo "Invalid Credential";
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
    <h1>Login</h1>

    <form action="login.php" method="post">
    Username : <input type="text" name="username" id="username"
    value="<?php
        if(isset($_COOKIE["member_login"])){
            echo $_COOKIE["member_login"];
        }
    ?>">
    <br><br>
    Password : <input type="password" name="password" id="password"
    value="<?php
        if(isset($_COOKIE["member_password"])){
            echo $_COOKIE["member_password"];
        }
    ?>">
    <br><br>
    Remember me : <input type="checkbox" name="remember" id="remember"
    <?php
        if(isset($_COOKIES["member_login"]))
        {
            ?> checked <?php
        }
    ?>>
    <button type="submit">Submit</button>
    </form>
</body>
</html>