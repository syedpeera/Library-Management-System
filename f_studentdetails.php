<?php
	session_start();
	error_reporting(0);
	include("connection.php");
	if(isset($_SESSION['f_name_of_user']))
	{
		echo "<center><b style='font-size:30px;background-color:  #DAF7A6;border-radius: 25px;padding: 20px;opacity: 0.9;'>Welcome, ".$_SESSION['f_name_of_user']."</b></center><br><br>";
	}
	else
	{
		header("location:f_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>
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
			padding: 20px;
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
			echo "List of books borrowed by students : <br/><br/>";

			$sql = "select * from books inner join login on books.lid = login.lid;";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{
		 		echo "<center><table border='1'><tr><th>Username</th><th>Book Id</th><th>Book Name</th><th>Branch</th><th>No. of copies available in library</th></tr>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		echo "<tr><td>".$row['username']."</td><td>".$row['bookid']."</td><td>".$row['book_name']."</td><td>".$row['branch']."</td><td><center>".$row['number_of_copies']."</center></td></tr>";
		    	}
		    	echo "</table></center>";
			} 
			else 
			{
		    	echo "<br/><br/>No student is available who has issued a book from the library<br/><br/>";
			}
	?><br/><br/>
	<a href="f_logout.php">Logout</a>
	</div>
</body>
</html>