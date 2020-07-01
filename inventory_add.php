<?php
include_once "db.php";

$NewItemType = mysqli_real_escape_string($conn, $_POST["NewItemType"]);
$NewItemNumber = mysqli_real_escape_string($conn, $_POST["NewItemNumber"]);

$id = 1;
$sql = "INSERT INTO inventory (type, number, item_status, student_id) VALUES ('$NewItemType','$NewItemNumber','0','$id')";
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
