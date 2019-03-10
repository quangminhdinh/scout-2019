<?php
   session_start();
   
   if(session_destroy()) {
?>
<script>
	localStorage.removeItem("username");
	localStorage.removeItem("name");
</script>
<?php
      header("Location: login.html");
   }
?>