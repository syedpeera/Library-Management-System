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
	<title>Return Book</title>
</head>
<body>	
	<?php
			$temp = $_GET['bookid'];

			$sql1 = "select * from books where bookid = '".$temp."';";
			$result1 = $con->query($sql1);
			if($result1->num_rows > 0)
			{
				$row = $result1->fetch_assoc();
				$temp_arr = explode(",",$row['lid']);
				$temp_new_arr = array();
				foreach($temp_arr as &$value) 
				{
    				if((int)$value != $_SESSION['s_rollnumber_of_user'])
    				{
    					array_push($temp_new_arr,$value);
    				}
				}	
				$temp_taken = implode(",", $temp_new_arr);

				if(empty($temp_taken))
				{
					$temp_taken = '-1';
				}

				$row['number_of_copies'] += 1;

				$sql2 = "UPDATE books SET lid = '".$temp_taken."', number_of_copies = '".$row['number_of_copies']."' WHERE bookid='".$temp."';";

				$result2 = $con->query($sql2);

			}

			header("location:s_borrowed_books.php");
	?>
	<a href="s_logout.php">Logout</a>
</body>
</html>