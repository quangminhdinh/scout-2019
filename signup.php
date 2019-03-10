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
		if (isset($_POST['nickn']) && isset($_POST['nick1']) && isset($_POST['pass'])) {
			if ($userDB->connect_error) {
				echo("Connection failed: " . $userDB->connect_error);
			}
			
			$userDB->set_charset("utf8");
			
			$sql = "SELECT COUNT(*) FROM users WHERE username='" . test_input($_POST['nick1']) . "'";
			$result = $userDB->query($sql);
			
			$row = $result->fetch_row();

			if ($row[0] > 0) {
				echo("Exist");
			}
			
			else {
				// prepare and bind
				$stmt = $userDB->prepare("INSERT INTO users (username, name, pass, type) VALUES (?, ?, ?, ?)");
				$stmt->bind_param("ssss", $username, $name, $pass, $aaa);

				// set parameters and execute
				$username = test_input($_POST['nick1']);
				$name = test_input($_POST['nickn']);
				$aaa = "Scouter";
				$pass = test_input($_POST['pass']);
				$stmt->execute();
				
				$_SESSION["username"] = $username;
				$_SESSION["name"] = $name;
				$_SESSION["type"] = "Scouter";

				echo "true";

				$stmt->close();
				$userDB->close();
			}
		} else {
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