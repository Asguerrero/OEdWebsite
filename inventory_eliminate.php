<?php
include_once "db.php";

$ItemType = mysqli_real_escape_string($conn, $_POST["ItemType"]);
$ItemNumber = mysqli_real_escape_string($conn, $_POST["ItemNumber"]);


$sql_1 = "SELECT * FROM inventory WHERE type LIKE '%$ItemType%' AND number = '$ItemNumber'";
    $records = mysqli_query($conn, $sql_1);
    if(mysqli_num_rows($records) > 0){
        $sql = "DELETE FROM inventory WHERE type = '$ItemType' AND number = '$ItemNumber' ";
        if(mysqli_query($conn, $sql)){
            echo "Records eliminated successfully";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
    else{
        echo "ERROR: The item is not part of the database";
    }
    
    

