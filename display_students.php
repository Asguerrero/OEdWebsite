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
   <th>Grade</th>
   <th>First Name </th>
   <th>Last Name</th>
   <th>Email </th>
   <th>N of OEd Activities </th>

</tr>


<?php

 $option = $_POST["option"];

if ($option == "All") {

      $sql = "SELECT * FROM students";
       $records = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($records)) {
        echo "<tr>";
        echo "<td>".$row["grade"]."</td>";
        echo "<td>".$row["firstName"]."</td>";
        echo "<td>".$row["lastName"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["N_hikes"]."</td>";

       }

}

if ($option == "Students who have met all the requirements") {

     $sql = "SELECT * FROM students WHERE N_hikes > 1";
             $records = mysqli_query($conn, $sql);

             while ($row = mysqli_fetch_array($records)) {
             echo "<tr>";
             echo "<td>".$row["grade"]."</td>";
             echo "<td>".$row["firstName"]."</td>";
             echo "<td>".$row["lastName"]."</td>";
             echo "<td>".$row["email"]."</td>";
             echo "<td>".$row["N_hikes"]."</td>";

            }

}


if($option == "Students who have not met any requirements") {

$sql = "SELECT * FROM students WHERE N_hikes < 2";
        $records = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($records)) {
        echo "<tr>";
        echo "<td>".$row["grade"]."</td>";
        echo "<td>".$row["firstName"]."</td>";
        echo "<td>".$row["lastName"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["N_hikes"]."</td>";

       }
}
?>

</table>

</body>


</html>