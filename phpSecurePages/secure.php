<script>
var logOutActivated = "false";
logOutActivated = <?php if (!empty($_POST['logout']) && $_POST['logout'] == 'true') {echo 1;} else {echo 'false';} ?>;
var authCompleted = "false";
authCompleted = <?php if (!empty($_COOKIE['authenticationCorrect']) && $_COOKIE['authenticationCorrect']=='true') {echo 1;} else {echo 'false';} ?>;
</script>
<?php if (!empty($_POST['logout']) && $_POST['logout'] == 'true') {
	include('objects/logout.php');
} ?>
<script>
if (logOutActivated == 1) {
	window.location.assign(document.referrer);
}
else if (authCompleted == 1) {
	var siteEditingContent = " <form id='uploadFilesLink' name='uploadFilesLink' action='uploadFiles.php' METHOD='post' onSubmit='return checkData()'><input type='hidden' name='login' id='login_data2' value='<?php echo $_COOKIE['login'] ?>'><input type='hidden' name='password' id='password_data2' value='<?php echo $_COOKIE['password'] ?>'><input type='hidden' name='authenticationCorrect' id='authenticationCorrect_data2' value='<?php echo $_COOKIE['authenticationCorrect'] ?>'></form><button type='submit' id='editingButtonE' onclick='javascript:accessFileUploader()'>Upload Files<div class='print'> "+
	"<a href='http://diego.asu.edu/publications?tmpl=component&print=1&page=' title='Print' onclick='window.open(this.href,&#39;win2&#39;,&#39;status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no&#39;); return false;' rel='nofollow'><img src='./Images/printButton.png' alt='Print'></a>"+
	"</div>"+
	"<div class='email'>"+
	"<a href='http://diego.asu.edu/component/mailto/?tmpl=component&template=endos-fjt&link=01e1086d4774e074a93ff70767d2af5c08868774' title='Email' onclick='window.open(this.href,&#39;win2&#39;,&#39;width=400,height=350,menubar=yes,resizable=yes&#39;); return false;'><img src='./Images/emailButton.png' alt='Email'></a>"+
	"</div></div></button>"+
        "<form id='addProfileLink' name='addProfileLink' action='phpSecurePages/addUserProfilePageSecure.php' METHOD='post' onSubmit='return checkData()'><input type='hidden' name='login' id='login_data' value='<?php echo $_COOKIE['login'] ?>'><input type='hidden' name='password' id='password_data' value='<?php echo $_COOKIE['password'] ?>'><input type='hidden' name='authenticationCorrect' id='authenticationCorrect_data' value='<?php echo $_COOKIE['authenticationCorrect'] ?>'></form><button type='submit' id='editingButtonA' onclick='javascript:accessProfileAdder()'>Add User or Profile Page</button>"+
	"<form id='developerGuideLink' name='developerGuideLink' action='developerGuide.php' METHOD='post' onSubmit='return checkData()'><input type='hidden' name='login' id='login_data2' value='<?php echo $_COOKIE['login'] ?>'><input type='hidden' name='password' id='password_data2' value='<?php echo $_COOKIE['password'] ?>'><input type='hidden' name='authenticationCorrect' id='authenticationCorrect_data2' value='<?php echo $_COOKIE['authenticationCorrect'] ?>'></form><button type='submit' id='editingButtonB' onclick='javascript:accessDeveloperGuide()'>Developer Guide</button>"+
	"<br><button type='submit' id='editingButtonC' onclick='javascript:makeEditable()'>Edit Page Content</button>"+
	"<div id='submitLink'><button type='submit' id='editingButtonD' onclick='javascript:submitEdits()'>Submit Edited Content</button></div>";
	$('#buttonheading').html(siteEditingContent);
}
</script>
<?php 
if (isset($_COOKIE['authenticationCorrect']) && $_COOKIE['authenticationCorrect']=='true') {
exit;	
} ?>

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

// Create a constant that can be checked inside the files to be included.
// This gives an indication if secure.php has been loaded correctly.
$cfgProgDir='';

define('LOADED_PROPERLY', true);

// Check if secure.php has been loaded correctly
if (isset($_GET['cfgProgDir']) || isset($_POST['cfgProgDir']) || isset($_GET['languageFile']) || isset($_POST['languageFile'])) {
        echo "Parsing of phpSecurePages has been halted!";
        exit();
        }

// include configuration
require($cfgProgDir . 'config.php');

// https support
if (getenv('HTTPS') == 'on') {
        $cfgUrl = 'https://';
        }
else {
        $cfgUrl = 'http://';
        }

// getting other variables

$phpSP_message = false;

// include functions and variables
if ( !defined("FUNCTIONS_LOADED") ) {
        // check if functions were already loaded
        include($cfgProgDir . 'objects/functions.php');
        }
include($cfgProgDir . 'lng/' . $languageFile);


// choose between login or logout
if ((isset($logout) && !(isset($_GET['logout']))) | isset($_POST['logout'])) {
        // logout
        include($cfgProgDir . 'objects/logout.php');
        }
else {
        // starting login check
        if ($noDetailedMessages == true) {
                $strUserNotExist = $strUserNotAllowed = $strPwNotFound = $strPwFalse = $strNoPassword = $strNoAccess;
                }

        // make post variables global
        if (isset($_POST['entered_login'])) $entered_login = $_POST['entered_login'];
        if (isset($_POST['entered_password'])) $entered_password = $_POST['entered_password'];
        
        // check if login is necessary
        include($cfgProgDir . "objects/checklogin.php");

        // check if IP is allowed (if using IP-restriced access)
        if ($use_IP_restricted_access==true) {
                include($cfgProgDir . "objects/checklogin_ip.php");
                }

        // check login with Database
        if ($useDatabase == true) {
                include($cfgProgDir . 'objects/checklogin_db.php');
                }
        
        // check login with Data
        elseif ($useData == true) {
        	    
    		   
                include($cfgProgDir . '../checklogin_data2.php');
               
               }
        
        // neither of the two data checks was chosen
        else {
                $phpSP_message = $strNoDataMethod;
                include($cfgProgDir . "interface.php");
                exit;
                }
        }

?>