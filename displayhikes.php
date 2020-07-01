<?php
include_once "db.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>OEd Website</title>
    <link rel="stylesheet" href="database.css" type="text/css"/>
</head>
<body>

<div class="titles">
<h1>Hikes</h1>
</div>

<table style="width:100%">

<?php
$sql = "SELECT * FROM hikes";
       $records = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($records)) {

$hikes[] = [ $row['name_hike'], $row['date_hike'],  $row['student_id'] ];


}



$count = 0;
for ($y = 0; $y < count($hikes); $y++) {
$boolean = "true";
for ($x = 0; $x < $y; $x++) {
 if  ( $hikes[$y][0] ==  $hikes[$x][0] and $hikes[$y][1] ==  $hikes[$x][1] ) {
 $boolean  = "false";
 }
}
if ($boolean  == "true")  {
$list [$count][0] = $hikes[$y][0];
$list [$count][1] = $hikes[$y][1];
$list [$count][2] = $hikes[$y][2];
$count++;
}
}


for ($z = 0; $z < count($list); $z++) {
$temp = 0;
for ($p = 0; $p < count($hikes); $p++) {
 if ( $list[$z][0] ==  $hikes[$p][0] and $list[$z][1] ==  $hikes[$p][1]  ) {
 $temp++;
 }

}
$list[$z][2] = $temp;
}




echo "<tr>  <th>Name</th>  <th>Date </th> <th>N of participants</th> </tr>";



for($i=0;$i<count($list);$i++) {
     echo "<tr><td>".$list[$i][0]."</td>";
     echo "<td>".$list[$i][1]."</td>";
     echo "<td>".$list[$i][2]."</td></tr>";
}

?>


    </form>
</body>
</html>

