<?php
    $servername = "localhost";
    $username = "root";
    $password = "chorvachenes";
    $dbname = "googlemaps";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * from markers";
    $result = $conn->query($sql);

    echo gettype($result->fetch_assoc());
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["name"] . "-" . $row["lat"] . "-" . $row["lng"]. "_";  
        }
    } 
    else {
        echo "0 results";
    }
    $conn->close();
?> 
