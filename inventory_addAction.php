<?php
include_once "db.php";

$ItemType = mysqli_real_escape_string($conn, $_POST["TypeOfItem"]);
$NumberOfItem = mysqli_real_escape_string($conn, $_POST["NumberOfItem"]);
$Email = mysqli_real_escape_string($conn, $_POST["EmailStudent"]);
$Action =  $_POST["action"];

$flag = "true";
$sql = "SELECT * FROM students WHERE email LIKE '%$Email%'";
$result = mysqli_query($conn, $sql);

//Check if student belongs to the database
 if(mysqli_num_rows($result) > 0) {
while ( $row = mysqli_fetch_assoc($result)) {
	$id = $row["student_id"];
}
 }
else{
    echo "ERROR: The student inserted has not been found in the database. ";
    $flag="false";
}

//Check if the item belongs to the database

$sql_1 = "SELECT * FROM inventory WHERE type LIKE '%$ItemType%' AND number = '$NumberOfItem' ";

    $records = mysqli_query($conn, $sql_1);
    if(mysqli_num_rows($records) > 0){
        while($row = mysqli_fetch_array($records)){
            $temp = $row["item_status"];
        }
    }
    
    else{
        echo "ERROR: The item is not part of the database. ";
        $flag = "false";
    }

if ($Action = "Take") {
$status = 0;
}

if ($Action = "Return") {
$status = 1;
}

if ($status == $temp){
    $flag = "false";
     echo "ERROR: Someone has already borrowed or returned the item. ";
}

if($flag =="true"){
    $sql2= "UPDATE inventory SET student_id = '$id' WHERE number LIKE '%$NumberOfItem%' AND type LIKE '%$ItemType%'";
$sql3= "UPDATE inventory SET item_status = '$status' WHERE number LIKE '%$NumberOfItem%' AND type LIKE '%$ItemType%'";



if(mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) ){
   echo "Records updated successfully.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if($flag == "false"){
    echo "The action cannot be performed";
}


