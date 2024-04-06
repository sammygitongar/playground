<!-- Connecting to a database using mysqli -->
<?php

    // Declaration of variables to be used

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create the connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        echo die("Connection failed" . $conn->connect_error); 
    } // else{
       // echo "Connection Sucessful";
   // }


