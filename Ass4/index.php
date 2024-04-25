<?php
    $arr = array("ram","shri","hari");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST["name"];
        if(in_array($name,$arr)){
            echo "$name is Present!";
        }
        else{
            echo "$name is not Present!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Enter the Name : </label>
        <input type="text" name="name" id="name">
        <button type="submit">Search</button>
    </form>
</body>
</html>