<?php
if (isset($_POST['login']) & isset($_POST['password'])) {
// Establish current number of users
$userNumber = file_get_contents('currentNumberOfUsers.php');
$userNumber += 1;
file_put_contents('currentNumberOfUsers.php', $userNumber);

// Add new user
$addAccountContents = "\r\n<?php \r\n";
$addAccountContents .= "\$cfgLogin[".$userNumber."] = '".$_POST['login']."';\r\n";
$addAccountContents .= "\$cfgPassword[".$userNumber."] = '".$_POST['password']."';\r\n";
$addAccountContents .= "\$cfgUserLevel[".$userNumber."] = '';\r\n";
$addAccountContents .= "\$cfgUserID[".$userNumber."] = '';\r\n";
$addAccountContents .= "?> \r\n";

file_put_contents('phpSecurePages/config.php', $addAccountContents, FILE_APPEND);
echo "account added";
}
else {
	echo "html form post data for the login name and password must be included and it was not found.  Please include that content.";
}
?>