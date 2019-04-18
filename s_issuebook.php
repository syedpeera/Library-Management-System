<?php
	session_start();
	error_reporting(0);
	include("connection.php");
	if(isset($_SESSION['s_name_of_user']))
	{
		echo "<center><b style='font-size:30px;background-color:  #DAF7A6;border-radius: 25px;padding: 20px;opacity: 0.9;'>Welcome, ".$_SESSION['s_name_of_user']."</b></center><br><br>";
	}
	else
	{
		header("location:s_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<style type="text/css">
		body 
		{
			background: url(library_pic.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		.box
		{
			position: absolute;
			text-align: center;
			width: 100%;
			padding: 25px;
			background-color:  #DAF7A6;
			border-radius: 25px;
			opacity: 0.9;
		}
		a 
		{
			background-color: red;
			color: white;
			padding: 1em 1.5em;
			text-decoration: none;
			text-transform: uppercase;
		}
		.button 
		{
		 	background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="box">	
	<?php
			$temp = $_GET['bookid'];

			$sql1 = "SELECT * FROM books WHERE bookid='".$temp."';";

			$result1 = $con->query($sql1);

			if($result1->num_rows > 0)
			{
				$row = $result1->fetch_assoc();
				if($row['lid'] == -1)
				{
					if($row['number_of_copies'] > 1)
					{
						$temp_arr = array($_SESSION['s_rollnumber_of_user']);
						$temp_taken = implode(",",$temp_arr);
						$row['number_of_copies'] -= 1;
						$sql2 = "update books set lid='".$temp_taken."', number_of_copies='".$row['number_of_copies']."' WHERE bookid='".$temp."';";
		      			$result2 = $con->query($sql2);
					}
					else if($row['number_of_copies'] == 1)
					{
						$temp_arr = array($_SESSION['s_rollnumber_of_user']);
						$temp_taken = implode(",",$temp_arr);
						$row['number_of_copies'] = 0;
						$sql2 = "update books set lid='".$temp_taken."', number_of_copies='".$row['number_of_copies']."' WHERE bookid='".$temp."';";
		      			$result2 = $con->query($sql2);
					}	
				}
				else
				{
					if($row['number_of_copies'] > 1)
					{
						$temp_arr = explode(",",$row['lid']);
						$len = sizeof($temp_arr);
						$temp_arr[$len] = $_SESSION['s_rollnumber_of_user'];
						$temp_taken = implode(",", $temp_arr);
						$row['number_of_copies'] -= 1;
						$sql2 = "update books set lid='".$temp_taken."', number_of_copies='".$row['number_of_copies']."' WHERE bookid='".$temp."';";
		      			$result2 = $con->query($sql2);
					}
					else if($row['number_of_copies'] == 1)
					{
						$temp_arr = explode(",",$row['lid']);
						$len = sizeof($temp_arr);
						$temp_arr[$len] = $_SESSION['s_rollnumber_of_user'];
						$temp_taken = implode(",", $temp_arr);
						$row['number_of_copies'] = 0;
						$sql2 = "update books set lid='".$temp_taken."', number_of_copies='".$row['number_of_copies']."' WHERE bookid='".$temp."';";
		      			$result2 = $con->query($sql2);
					}
				}
			}

			header("location:s_borrow_a_book.php");
	?>
	<a href="s_logout.php">Logout</a>
	</div>
</body>
</html>