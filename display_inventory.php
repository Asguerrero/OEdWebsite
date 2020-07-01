<?php
include_once "db.php";
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="database.css" type="text/css"/>
</head>

<body>

<div class="titles">
<h1>Table</h1>
</div>

<table style="width:100%">

<tr>
   <th>Type</th>
   <th>Number </th>
   <th>Status</th>
   <th>Student </th>

</tr>




<?php

$option = $_GET["option"];
if ($option == "All") {

      $sql = "SELECT * FROM inventory";

        $records = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($records)) {

        echo "<tr>";
        echo "<td>".$row["type"]."</td>";
        echo "<td>".$row["number"]."</td>";
        echo "<td>".$row["item_status"]."</td>";
        	$id = $row["student_id"];
         $sql1 = "SELECT * FROM students WHERE student_id = '$id'";
         $result = mysqli_query($conn, $sql1);
         while ( $row = mysqli_fetch_assoc($result)) {
      $email = $row['email'];
      }
      echo "<td>".$email."</td>";
       }


       }



if ($option == "Borrowed items") {

      $sql = "SELECT * FROM `inventory` WHERE item_status = 0";

         $records = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($records)) {

                echo "<tr>";
                echo "<td>".$row["type"]."</td>";
                echo "<td>".$row["number"]."</td>";
                echo "<td>".$row["item_status"]."</td>";

                	$id = $row["student_id"];
                 $sql1 = "SELECT * FROM students WHERE student_id = '$id'";
                 $result = mysqli_query($conn, $sql1);
                 while ( $row = mysqli_fetch_assoc($result)) {
              $email = $row['email'];
              }
              echo "<td>".$email."</td>";
               }

}


if ($option == "Items in inventory") {

      $sql = "SELECT * FROM `inventory` WHERE item_status = 1";

       $records = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($records)) {

              echo "<tr>";
              echo "<td>".$row["type"]."</td>";
              echo "<td>".$row["number"]."</td>";
              echo "<td>".$row["item_status"]."</td>";
            
              	$id = $row["student_id"];
               $sql1 = "SELECT * FROM students WHERE student_id = '$id'";
               $result = mysqli_query($conn, $sql1);
               while ( $row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            }
            echo "<td>".$email."</td>";
             }

}
?>

</table>

</body>


</html>