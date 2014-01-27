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
/*    This is the login page that is shown when your users    */
/*      try to access protected pages. Change logo to your    */
/*                  logo on line 77 below.                    */
/**************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="<?php echo $strLoginInterface.' '.$strPoweredBy.' phpSecurePages'; ?>">
<meta name="keywords" content="phpSecurePages">
<title><?php echo $strLoginInterface; ?></title>
<SCRIPT LANGUAGE="JavaScript">
	<!--
//  ------ check form ------
function checkData() {
        var f1 = document.forms[0];
        var wm = "<?php echo $strJSHello; ?>";
			var noerror = 1;

			// --- entered_login ---
			var t1 = f1.entered_login;
			if (t1.value == "" || t1.value == " ") {
			wm += "<?php echo $strLogin; ?>";
			noerror = 0;
			}

			// --- entered_password ---
			var t1 = f1.entered_password;
			if (t1.value == "" || t1.value == " ") {
			wm += "<?php echo $strPassword; ?>";
			noerror = 0;
			}

			// --- check if errors occurred ---
			if (noerror == 0) {
			alert(wm);
			return false;
			}
			else return true;
			}
			//-->
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $strLoginInterface; ?></title>
<style>
	body {
		font-family: arial;
		background: #FFFFFF;
		text-align: center;
	}
	#error {
		margin: 1em auto;
		background: #FA4956;
		color: #FFFFFF;
		border: 2px solid #FA4956;
		font-weight: bold;
		width: 500px;
		text-align: center;
		position: relative;
	}
	#entry a, #entry a:visited {
		color: #0283b2;
	}
	#entry a:hover {
		color: #111;
	}
	#entry h1 {
		text-align: center;
		background: #3B8CCA;
		color: #fff;
		font-size: 16px;
		padding: 3px 3px;
		margin: 0 0 0 0;
	}
	#entry p {
		text-align: center;
	}
	#entry div {
		margin: .5em 2px;
		min-height: 220px;
		background: #eee;
		padding: 4px;
		text-align: right;
		position: relative;
	}
	#entry label {
		float: left;
		line-height: 30px;
		padding-left: 10px;
	}
	#entry .field {
		border: 1px solid #ccc;
		font-size: 12px;
		line-height: 1em;
		padding: 1px;
		float: left
	}
	#entry div.submit {
		background: none;
		margin: 1em 2px;
		text-align: left;
		float: left;
	}
	#entry div.submit label {
		float: none;
		display: inline;
		font-size: 11px;
	}
	#entry button {
		border: 0;
		padding: 0 3px;
		height: 20px;
		line-height: 20px;
		text-align: center;
		font-size: 16px;
		font-weight: bold;
		color: #fff;
		background: #3B8CCA;
		cursor: pointer;
	}
	#poweredBy {
		top: -300px;
		position: relative;
	}
</style>
</head>
<body>

<!-- Place your logo here -->
<!-- Place your logo here -->

<?php // check for error messages
if($phpSP_message) {
echo '<div id="error">'.$phpSP_message.'</div>';
}
?>

<!-- ------ Have you set up phpSP with no users?  ------ -->
        <?php
	if($useDatabase==false AND $useData==true AND $cfgLogin[1]=="")
		echo '<p style="font-family:arial;font-size:22px;color:red;font-weight:bold;">WEBMASTER: It looks like you have no users or passwords set up! <br>
        <br><span style="font-size:18px;">If you are not using a database, make sure you have configured<br>at least one user in config.php (around line 85).</span></p>';
 ?>
<!-- ------ Initial Setup (No Users) check ends here ------ -->

<?php $cfgProgDir='phpSecurePages/' ?>


<?php 
?>
    <?php
				if(isset($_COOKIE["authenticationCorrect"]) && $_COOKIE["authenticationCorrect"]=='true') {
				echo '<form id="entry" action="phpSecurePages/secure.php" METHOD="post" onSubmit="return checkData()">';
				echo '<input type="hidden" name="logout" value="true" class="field required" />';
				echo '<div class="accoutOptions" style="text-align:center;"><br>Logged in as: '.$_COOKIE["login"];
				echo '<div class="submit">
            <button type="submit">Log out</button>
            </form><br><br><br>';
				} 
				else {
				echo '<form id="entry" action="phpSecurePages/secure.php" METHOD="post" onSubmit="return checkData()">';
				//if there are $_POST variables -- add them to the form...
				$pname="";
				$pvalue="";
				foreach($_POST as $pname=>$pval) {
				echo '<input type=hidden name="'.$pname.'" value="'.$pval.'">'."\n";
				}
				echo '<div>
            <label for="login_username">Username</label> 
            <input type="text" name="entered_login" class="field required" />

            <label for="login_password">Password</label>
            <input type="password" name="entered_password" class="field required" />                        
            <div class="submit">
            <button type="submit">Log in</button>
            </form>';
				}
			?>
<!-- ------ Copyright line starts here ------
(if this software is used for free (not allowed for commercial use)
this line may NOT be removed or altered in such a way that it becomes
less (or un-) readable). -->
</div>
</div>
<p class="accountOptions">
<br>
<br><a href="mailto:Awjnonq421005@gmail.com?subject=[Lab Website Account] Request for new account&body=Hi,\r\nMy name is <firstname> <lastname>.  I know about the diego lab through: <description>.  (Optional but preferred: I am affiliated with the diego lab through <description>).\r\n\r\nPlease send me details about creating a new account.\r\n\r\nI will check my spam folder in case the response to this message is sent there accidentally.">New Account</a>
<br><a href="mailto:Awjnonq421005@gmail.com?subject=[Lab Website Password] Request for password reset&body=Hi, Please let me know how to reset my site password.  * Note from webmaster: if you are able to create a new account to gain editing access to the site.  This can fix the issue in case I do not respond quickly. *">Reset Password</a>
<br><?php echo $strPoweredBy; ?>
<A HREF="http://www.phpSecurePages.com" TITLE="phpSecurePages <?php echo $strInfo; ?>" TARGET="_blank" CLASS="link">phpSecurePages</A>
<!-- ------ Copyright line ends here ------ -->
<br>
<br>
<br>
</p>
</div>


<SCRIPT LANGUAGE="JavaScript">
	<!--document.forms[0].entered_login.select();document.forms[0].entered_login.focus();//-->
</SCRIPT>
</body>
</html>