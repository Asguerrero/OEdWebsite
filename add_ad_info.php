<?php
include_once "db.php";

$Date = $_POST["Date"];
$NameOfHike = $_POST["NameOfHike"];
$Email = $_POST["email"];
$Action = $_POST["addHike"];

if (empty ($Date) || empty ($NameOfHike)  || empty($Email) ) {
header ("Location: /student.php?=empty_additional");
exit();
}


 if (isset($_POST("add_ad_info")) {
$sql = "SELECT * FROM students WHERE email LIKE '%$Email%'";
$result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) > 0) {
while ( $row = mysqli_fetch_assoc($result)) {
	$id = $row["student_id"];
}
 }


echo $id;


$sql = "SELECT * FROM students WHERE email LIKE '%$Email%'";
$result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) > 0) {
while ( $row = mysqli_fetch_assoc($result)) {
	$id = $row["student_id"];
}
 }

$sql = "INSERT INTO hikes (name_hike, date_hike, student_id) VALUES ('$NameOfHike','$DateOfHike','$id')";
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}