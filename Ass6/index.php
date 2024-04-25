<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employees";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die("Connection Failed" .mysqli_connect_error());
    }
    else{
        echo "Connection Successfull.<br>";
    }

 
    $name = "Mandar";
    $email = "mandar@gmail.com";

    $sql = "INSERT INTO new VALUES ('$name', '$email')" ;
    $result = $conn->query($sql);

    if($result){
        echo "Data inserted successfully";
    }
    else{
        echo "Data is not inserted".mysql_error($conn);
    }

?>