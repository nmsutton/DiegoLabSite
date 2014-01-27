<html>
	<body>
		<h1>Users must be successfully logged in to access this page</h1>
		<br>
		<!-- security is below that only allow content once a user is logged in -->
		<?PHP
			$cfgProgDir='phpSecurePages/';
			include ($cfgProgDir."uploadFilesSecure.php");
		?>
	</body>
</html>