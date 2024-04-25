<?php
    $HOSTNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "registration";

    $conn = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DBNAME);

    if(!$conn){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        echo "Connection Successfull";
    }

?>