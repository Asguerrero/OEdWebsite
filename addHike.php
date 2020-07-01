<?php
include_once "db.php";

$DateOfHike = mysqli_real_escape_string($conn, $_POST["DateOfHike"]);
$NameOfHike = mysqli_real_escape_string($conn, $_POST["NameOfHike"]);
$Participant =  mysqli_real_escape_string($conn, $_POST["Participant"]);

if (empty ($DateOfHike) || empty ($NameOfHike)  || empty($Participant) ) {
header ("Location: /student.php?=empty_newHike");
exit();
}

if (isset($_POST["add_hike"])) {
$sql = "SELECT * FROM students WHERE firstName LIKE '%$Participant%' OR email LIKE '%$Participant%' ";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
while ( $row = mysqli_fetch_assoc($result)) {

  $id = $row['student_id'];
  $name = $row['email'];
  $N_hikes = $row['N_hikes'];

}

echo $id;
echo $name;
$current = $N_hikes + 1;



$sql = "INSERT INTO hikes (name_hike, date_hike, student_id) VALUES ('$NameOfHike','$DateOfHike','$id')";
$sql1 = "UPDATE students SET N_hikes = '$current' WHERE student_id = '$id'";
if(mysqli_query($conn, $sql)){
   echo "Records inserted successfully.";
}
if(mysqli_query($conn, $sql1)){
   echo "Records inserted successfully.";
}

else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}


else {
echo "No file has been found";
}

}

