<?php
	setcookie("login", $_POST['login'], time()+1200, "/","", 0);
	setcookie("password", $_POST['password'], time()+1200, "/","", 0);
	setcookie("authenticationCorrect", $_POST['authenticationCorrect'], time()+1200, "/","", 0);
?>
<script>
	window.location.assign('Welcome.php');
</script>