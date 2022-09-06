<?php
	session_start();
	if (isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['type'])) {
		header('location: match_scout.php');
	} else {
?>
<script>
		if (typeof(Storage) !== "undefined") {
			if (localStorage.getItem("username") === null || localStorage.getItem("name") === null || localStorage.getItem("type") === null || 
				localStorage.getItem("username") === '' || localStorage.getItem("name") === '' || localStorage.getItem("type") === '') {
					window.location.replace("./login.html");
				}
			else {

				window.location.replace("./match_scout.php");
			}
		} else {
			window.location.replace("./login.html");
		}
</script>
<?php
	}
?>