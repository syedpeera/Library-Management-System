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
	<title>Remove Book</title>
</head>
<body>	
	<?php
			$temp = $_GET['bookid'];

			$sql = "delete from books where bookid='".$temp."';";
			
			$result = $con->query($sql);

			header("location:f_listofbooks.php");
	?>
	<a href="f_logout.php">Logout</a>
</body>
</html>