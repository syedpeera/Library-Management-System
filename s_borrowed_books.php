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
	<title>Student Profile Page</title>
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
		.logout 
		{
			background-color: red;
			color: white;
			padding: 1em 1.5em;
			text-decoration: none;
			text-transform: uppercase;
		}
	</style>
</head>
<body>	
	<div class="box">
	<?php
		session_start();
		error_reporting(0);
		include("connection.php");
		
		echo "Welcome, ".$_SESSION['s_name_of_user']."<br/><br/>";

		echo "List of books borrowed : <br/><br/>";

		$books_borrowed_arr = array();

		$sql1 = "select * from books;";

		$result1 = $con->query($sql1);

		$flag = 0;

		if($result1->num_rows>0)
		{
			while($row = $result1->fetch_assoc()) 
			{
				$temp_arr = explode(",",$row['lid']);
				foreach($temp_arr as &$value) 
				{
				    if((int)$value == $_SESSION['s_rollnumber_of_user'])
				    {
				    	$flag++;
				    	array_push($books_borrowed_arr,$row['bookid']);
				    	break;
				    }	
				}
			}

			if($flag != 0)
			{
				echo "<center><table border='1'><tr><th>Book Id</th><th>Book Name</th><th>Return to Library</th></tr>";
				foreach($books_borrowed_arr as &$value) 
				{
					$sql2 = "select * from books where bookid = '".(int)$value."';";
					$result2 = $con->query($sql2);
					$row = $result2->fetch_assoc();
					echo "<tr><td>".$row['bookid']."</td><td>".$row['book_name']."</td><td><center><a style='color:red;' href = 's_returnbook.php?bookid=".$row['bookid']."'>return this book</a></center></td></tr>";
				}
				echo "</table></center>";	
			}
			else
			{
				echo "No you have not issued any book yet.<br/><br/>";
			}
		}
		else
		{
			echo "<br/><br/>There are no Books in the Library.<br/><br/>"; 
		}
	?><br/>
	<a class='logout' href="s_logout.php">Logout</a>
	</div>
</body>
</html>