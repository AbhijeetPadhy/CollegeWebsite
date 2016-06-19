<?php
	function redirect_to($url)
	{
		header('Location: '.$url);
	}
	ini_set('display_errors', 1 );
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();


	$servername = "localhost";
		$username = "abhijeet";
		$password = "abhijeet";
		$dbname = "project";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		for($i=0;$i<$_POST["no"];$i++){
			if(isset($_POST["toRegister"][$i])){
				$sql = "update mytable set registered = 1 where email = '".$_POST["toRegister"][$i]."';";
				$result=$conn->query($sql);
			}
		}
	redirect_to("index.php");
?>