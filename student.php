<?php

include_once "db.php";
$sql = "SELECT DISTINCT name_hike FROM hikes";
$records = mysqli_query($conn, $sql);
$fulUrl = "http://$_SERVER[HTTP_HOST] $_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Student Requirements and Outdoor Activities</h1>
	<div class="general-container">
		<div class="container double">
			<div style="border-right-style: solid;">
				<h2>Search</h2>
					    <form action="search_students.php" method="GET">
					        <input type="text" name="search1" placeholder="By Name, Grade or Email"/>
					        <input type="submit" name="submit_search" value="Search" />
					    </form>
					    <?php
					    if (strpos($fulUrl,"empty_search") == true) {
					    echo "<p> You have not filled out all the fields </p>";
					    }
					    ?>
				
			</div>
			<div >
				<h2>Display General Table</h2>
				    <form action="display_students.php" method="POST">
				        <select style="width: 50%;" name="option">
				        <option>All</option>
				        <option>Students who have met all the requirements</option>
				        <option>Students who have not met any requirements</option>
				        </select>
				        <input type="submit" name="submit" value="Display"/>
				    </form>
			</div>
		</div>
		<div class="container ">
			<div>
				<h2>Add New Hike</h2>
				    <form action="addHike.php" method="POST"/>
				    <input type="text" name="NameOfHike" placeholder="Name of Hike"/>
				    <input type="date" name="DateOfHike" placeholder="Date of Hike"/>
				    <input type="text" name="Participant" placeholder="Email or First Name of Participant"/> <br>
				    <input type="submit" name="add_hike" value="Add"/>
				    </form> 

				   <form action="displayhikes.php" method="POST"/>
						<input type="submit" name="display_hikes" value="Display All Hikes"/>
						<?php
						if (strpos($fulUrl,"empty_newHike") == true) {
						header ("Location: /student.php");
						echo "<p> You have not filled out all the fields </p>";

						}

						?>
						</form>

			</div>
			
		</div>

	</div>
</body>
</html>