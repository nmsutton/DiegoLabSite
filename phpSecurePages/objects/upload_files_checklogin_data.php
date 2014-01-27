<?php
/**************************************************************/
/*         phpSecurePages version 0.43 beta (05/01/13)        */
/*              Copyright 2013 Circlex.com, Inc.              */
/*                                                            */
/*          ALWAYS CHECK FOR THE LATEST RELEASE AT            */
/*              http://www.phpSecurePages.com                 */
/*                                                            */
/*              Free for non-commercial use only.             */
/*               If you are using commercially,               */
/*         or using to secure your clients' web sites,        */
/*   please purchase a license at http://phpsecurepages.com   */
/*                                                            */
/**************************************************************/
/*      There are no user-configurable items on this page     */
/**************************************************************/

// check login with Data

// Check if secure.php has been loaded correctly
if ( !defined("LOADED_PROPERLY") || isset($_GET['cfgProgDir']) || isset($_POST['cfgProgDir'])) {
        echo "Parsing of phpSecurePages has been halted!";
        exit();
        }

$numLogin = count($cfgLogin);
$userFound = false;
// check all the data input
for ($i = 1; $i <= $numLogin; $i++) {
        if ($cfgLogin[$i] != '' && $cfgLogin[$i] == $login) {
                // user found --> check password
                if ($cfgPassword[$i] == '' || $cfgPassword[$i] != $password) {
                        // password is wrong
                        $phpSP_message = $strPwFalse;
                        include($cfgProgDir . "objects/logout.php");
                        include($cfgProgDir . "interface.php");
                        exit;
                        }
                $userFound = true;
                $userNr = $i;
                }
        }
if ($userFound == false) {
        // user is wrong
        $phpSP_message = $strUserNotExist;
        include($cfgProgDir . "objects/logout.php");
        include($cfgProgDir . "interface.php");
        exit;
        }
$userLevel = $cfgUserLevel[$userNr];

if ( ( isset($requiredUserLevel) && !empty($requiredUserLevel[0]) ) || isset($minUserLevel) ) {
        // check for required user level and minimum user level
        if ( !is_in_array($userLevel, @$requiredUserLevel) && ( !isset($minUserLevel) || empty($minUserLevel) || $userLevel < $minUserLevel ) ) {
                // this user does not have the required user level
                $phpSP_message = $strUserNotAllowed;
                include($cfgProgDir . "interface.php");
                exit;
}        }        
$ID = $cfgUserID[$userNr];
// All security checks passed so continue to main page
?>

<form action='http://localhost/xampp/DiegoLabSite/DiegoLabSite/uploadFiles.php' method='post' name='loginForm'>
<?php
foreach ($_POST as $a => $b) {
echo "<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>";
}
echo "<input type='hidden' name='login' value=$login>";
echo "<input type='hidden' name='password' value=$password>";
echo "<input type='hidden' name='authenticationCorrect' value='true'>";

	$_COOKIE['login'] = $login;
	$_COOKIE['password'] = $password;
	$_COOKIE['authenticationCorrect'] = 'true';
	setcookie("login", $login, time()+1200, "/","", 0);
	setcookie("password", $password, time()+1200, "/","", 0);
	setcookie("authenticationCorrect", "true", time()+1200, "/","", 0);
?>
</form>
<script language="JavaScript">

//document.loginForm.submit();
window.location.assign('uploadFiles.php');

</script>
