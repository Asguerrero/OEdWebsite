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
<h1>Results of the Research</h1>
</div>

<table style="width:100%">

<tr>
   <th>Grade</th>
   <th>Name </th>
   <th>Last Name</th>
   <th>Email</th>
   <th>N of Activities </th>
   <th>N of Reflections </th>

</tr>



<?php

$search =  mysqli_real_escape_string($conn,$_GET["search1"] );

if (empty ($search)) {
header ("Location: /student.php?=empty_search");
exit();
}

$sql = "SELECT * FROM students WHERE grade LIKE '%$search%' OR firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR email LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) > 0) {
while ( $row = mysqli_fetch_assoc($result)) {
	             echo "<tr>";
                 echo "<td>".$row["grade"]."</td>";
                 echo "<td>".$row["firstName"]."</td>";
                 echo "<td>".$row["lastName"]."</td>";
                 echo "<td>".$row["email"]."</td>";
                 echo "<td>".$row["N_hikes"]."</td>";
                 echo "<td>".$row["N_reflections"]."</td>";
}
 }

?>

</table>

</body>


</html>




