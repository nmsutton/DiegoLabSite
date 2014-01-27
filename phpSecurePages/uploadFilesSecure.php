<?php
if (isset($_POST['login'])&isset($_POST['password'])) {
$_POST['entered_login'] = $_POST['login'];
$_POST['entered_password'] = $_POST['password'];
}
else {
	exit;
}
$useData = true;
$cfgProgDir='phpSecurePages/';
	$phpSP_message='';
	$useDatabase='false';
	
	$strLoginInterface='Login interface';
	$strJSHello='hello';
	$strLogin='login';
	$strPassword='pass';
	$strPoweredBy='Powered by:';
?>
<?php 
if (isset($_COOKIE['authenticationCorrect']) && $_COOKIE['authenticationCorrect']=='true') {
	require_once "phpfileuploader/phpuploader/include_phpuploader.php";
			echo "<h1>Upload files with the tool below:<br>";
                        echo "Files are uploaded to diego.asu.edu/NewSite/downloads/</h1>";
		
			//Step 2: Create Uploader object.
			$uploader=new PhpUploader();
			//Step 3: The files will be uploaded to the following folder directly.
			$uploader->SaveDirectory="downloads";
			//$uploader->AllowedFileExtensions="jpg,png,*";
			//Step 4: Render Uploader
			$uploader->Render();
		
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
        	    
    		   
                include($cfgProgDir . 'objects/upload_files_checklogin_data.php');
               
               }
        
        // neither of the two data checks was chosen
        else {
                $phpSP_message = $strNoDataMethod;
                include($cfgProgDir . "interface.php");
                exit;
                }
        }

?>
