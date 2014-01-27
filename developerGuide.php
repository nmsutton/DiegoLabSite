<html>
	<body>
		<!-- security is below that only allow content once a user is logged in -->
<script>window.location.assign('phpSecurePages/viewDeveloperGuide.php')</script>
		<?PHP
echo 'test2';
			$cfgProgDir='phpSecurePages/';
			include ($cfgProgDir."viewDeveloperGuide.php");
		?>
	</body>
</html>