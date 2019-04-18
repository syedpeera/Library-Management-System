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
	<title>List of books in the library</title>
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
			background-color:  #DAF7A6 ;
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
	<a class='logout' style='position: absolute;top: 8px;right: 16px;font-size: 18px;' href="f_logout.php">Logout</a>
	<div class="box">
	<?php
			$sql = "select * from books;";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{
				echo "<center><b style='font-size:20px;'>List of all the Books available in the library : </b></center><br/>";
				echo "<center><table style = ' width: 1000px;' border='1' ><thead><tr><th><center>Book Name</center></th><th><center>Status</center></th><th><center>Remove this book from library</center></th><th><center>Copies Available in Library</center></th></tr></thead>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		if($row['lid'] == '-1')
		    		{
		    		  echo "<tr><td><center>".$row['book_name']."</center></td><td>"."<center>Not Issued by any student"."</center></td><td><center><a href = 'f_removebook.php?bookid=".$row['bookid']."'>remove book from library</a></center></td><td><center>".$row['number_of_copies']."</center></td></tr>";
		    		}
		    		else
		    		{
		    			echo "<tr><td><center>".$row['book_name']."</center></td><td>This book is currently taken by some student</td><td><center>cannot remove</center></td><td><center>".$row['number_of_copies']."</center></td></tr>";
		    		}
		    	}
		    	echo "</table></center>";
			} 
			else 
			{
		    	echo "No student is available who has issued a book from the library";
			}
	?>
	</div>
</body>
</html>