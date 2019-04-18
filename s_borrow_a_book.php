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
	<title>Borrow a book from library</title>
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
	
			$sql = "select * from books;";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{
				echo "<h3><b>List of all the Books available in the library : </b></h3>";
				echo "<table border='1'><tr><th>Book Name</th><th>Status</th><th>Issue book</th><th>Number of copies available</th></tr>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		if($row['lid'] == '-1')
		    		{
		    		  echo "<tr><td>".$row['book_name']."</td><td width='300'><center>"."Not Issued by any student"."</center></td><td width='200'><center><a
		    		  style = 'color:green;' href = 's_issuebook.php?bookid=".$row['bookid']."'>issue this book</a></center></td><td><center>".$row['number_of_copies']."</center></td></tr>";
		    		}
		    		else
		    		{
		    			$temp_arr = explode(",",$row['lid']);
						$flag = 0;
						foreach ($temp_arr as &$value) 
						{
    						if((int)$value == $_SESSION['s_rollnumber_of_user'])
    						{
    							$flag++;
    							echo "<tr><td>".$row['book_name']."</td><td><center>You have a copy of this book</center></td><td style='color:red;'><center>Cannot Issue</center></td><td ><center>".$row['number_of_copies']."</center></td></tr>";
    						}
						}
						if($flag == 0)
						{
							if($row['number_of_copies'] >=1)
							{
								echo "<tr><td>".$row['book_name']."</td><td width='300'><center>"."Available"."</center></td><td width='200'><center><a
				    		  style = 'color:green;' href = 's_issuebook.php?bookid=".$row['bookid']."'>issue this book</a></center></td><td><center>".$row['number_of_copies']."</center></td></tr>";
							}
							else
							{
								echo "<tr><td>".$row['book_name']."</td><td><center>Not Available</center></td><td style='color:red;'><center>Cannot Issue</center></td><td><center>".$row['number_of_copies']."</center></td></tr>";
							}
						}
		    		}
		    	}
		    	echo "</table>";
			} 
			else 
			{
		    	echo "No books are there in the library.<br/><br/>";
			}
	?><br/><br/>
	<a class='logout' href="s_logout.php">Logout</a>
	</div>
</body>
</html>