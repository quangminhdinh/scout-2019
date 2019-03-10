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
		if (isset($_POST['hid3']) && $_SESSION["username"]) {
			if ($userDB->connect_error) {
				echo("Connection failed: " . $userDB->connect_error);
			}
			
			$userDB->set_charset("utf8");

			// prepare and bind
			$stmt = $userDB->prepare("INSERT INTO matchs (scouter, match_number, alliance, reginal, match_type, scouted_team, team_slot, start_pos, preloaded, autonomous, teleop, occured, sandstorm, sandstorm_notes, teleop_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssssssssss", $scouter, $match_number, $alliance, $reginal, $match_type, $scouted_team, $team_slot, $start_pos, $preloaded, $autonomous, $teleop, $occured, $sandstorm, $sandstorm_notes, $teleop_notes);

			// set parameters and execute
			$scouter = $_SESSION["username"];
			
			$match_number = $_POST['tch3_22'];
			$alliance = $_POST['flat-radio'];
			$reginal = $_POST['gart-regn'];
			$match_type = $_POST['gart-mtchyp'];
			
			$scouted_team = $_POST['wlocation'];
			$team_slot = $_POST['gart-tmslt'];
			$start_pos = $_POST['hid'];
			$preloaded = $_POST['game-piece'];
			
			$autonomous = $_POST['hid1'];
			$teleop = $_POST['hid2'];
			$occured = $_POST['gart-occrd'];
			$sandstorm = $_POST['sandstr'];
			
			$sandstorm_notes = $_POST['st-notes'];
			$teleop_notes = $_POST['tlp-notes'];
			
			$stmt->execute();

			echo "true";

			$stmt->close();
			$userDB->close();
		} else {
			echo("Lost connection...");
		}
	}
?>