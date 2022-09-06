<?php
	$mailInfo = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/../mainInfo.ini", true);
	$username = $mailInfo['gartDB']['username'];
	$pass = $mailInfo['gartDB']['pass'];
	$dbname = $mailInfo['gartDB']['dbname'];
	
	$servername = $mailInfo['gartDB']['severname'];

	// Create connection
	$userDB = new mysqli($servername, $username, $pass, $dbname);
	
	session_start();
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = test_input($_POST['username']);
			$pass = test_input($_POST['password']);
			if ($userDB->connect_error) {
				echo("Connection failed: " . $userDB->connect_error);
			}
			
			$userDB->set_charset("utf8");
			
			$sql = "SELECT name, type FROM users WHERE username='" . $username . "' AND pass='" . $pass . "'";
			$result = $userDB->query($sql);
			if ($result->num_rows == 1) {
				$_SESSION["username"] = $username;
				$row = $result->fetch_assoc();
				$_SESSION["name"] = $row["name"];
				$_SESSION["type"] = $row["type"];
				echo "true-" . $_SESSION["name"] . "-" . $_SESSION["type"];
			} else {
				echo("Wrong");
			}
			$userDB->close();
		}
		else {
			echo("Lost connection...");
		}
	}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>