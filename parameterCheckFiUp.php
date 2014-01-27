<?php
	setcookie("login", $_POST['login'], time()+60, "/","", 0);
	setcookie("password", $_POST['password'], time()+60, "/","", 0);
	setcookie("authenticationCorrect", $_POST['authenticationCorrect'], time()+60, "/","", 0);
?>
<script>
	window.location.assign('uploadFiles.php');
</script>