<?php
if (isset($_COOKIE['authenticationCorrect']) && $_COOKIE['authenticationCorrect']=='true') {
$usernameNoSpaces = str_replace(' ', '', $_POST['UserName']);
$newUserFilename = $usernameNoSpaces.".html";
$memberFolder = $_POST['typeOfUserField'];
// Add new user
$addAccountContents = "<table class='category'>\r\n";
$addAccountContents .= "	<tbody>\r\n";
$addAccountContents .= "		<tr class='cat-list-row0'>\r\n";
$addAccountContents .= "			<td class='item-title'><a href='javascript:labMemberPageLink(\"LabMembers/".$memberFolder."/".$newUserFilename."\")'>".$_POST['UserName']."</a></td>\r\n";
$addAccountContents .= "			<td class='item-position'>".$_POST['Position']."</td>\r\n";
$addAccountContents .= "			<td class='item-email'><a href='".$_POST['Email']."'>".$_POST['Email']."</a></td>\r\n";
$addAccountContents .= "			<td class='item-phone'>".$_POST['Phone']."</td>\r\n";
$addAccountContents .= "		</tr>\r\n";
$addAccountContents .= "	</tbody>\r\n";
$addAccountContents .= "</table>\r\n";
// Create profile
$profileContent = "<div class='contact'>";
$profileContent .= "	<h2><span class='contact-name'>".$_POST['UserName']."</span></h2>";
$profileContent .= "	<div class='pane-sliders'>";
$profileContent .= "		<div style='display:visible;'>";
$profileContent .= "			<div></div>";
$profileContent .= "		</div>";
$profileContent .= "		<div class='panel'>";
$profileContent .= "			<h3 class='title pane-toggler-down' id='basic-details'><span>Profile</span></h3>";
$profileContent .= "			<div class='pane-slider content pane-down' style='padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;'>";
$profileContent .= "				<div class='contact-image'>";
$profileContent .= "					<img src='/NewSite/downloads/".$usernameNoSpaces.".jpg' alt='Contact-image' align='middle'>";
$profileContent .= "				</div>";
$profileContent .= "				<p class='contact-position'>";
$profileContent .= "					".$_POST['Position'];
$profileContent .= "				</p>";
$profileContent .= "				<div class='contact-contactinfo'>";
$profileContent .= "					<p>";
$profileContent .= "						<span class='jicons-icons'> <img src='/NewSite/Images/emailButton.png' alt='Email: '> </span>";
$profileContent .= "						<span class='contact-emailto'> <a href='mailto:".$_POST['Email']."'></a> </span> </span>";
$profileContent .= "					</p>";
$profileContent .= "					<p>";
$profileContent .= "						<span class='jicons-icons'> </span>";
$profileContent .= "					</p>";
$profileContent .= "				</div>";
$profileContent .= "				<p></p>";
$profileContent .= "			</div>";
$profileContent .= "                    <br><br><font size='+1'><p>".$_POST['TextDescription']."</p></font>";
$profileContent .= "		</div>";
$profileContent .= "	</div>";
$profileContent .= "</div>";


if ($_POST['typeOfUserField']=='Faculty') {
file_put_contents('LabMembers/FacultyBody.html', $addAccountContents, FILE_APPEND);
file_put_contents('LabMembers/Faculty/'.$newUserFilename, $profileContent);
chmod('LabMembers/Faculty/'.$newUserFilename, 0777);
echo "user added";
}
else if ($_POST['typeOfUserField']=='PostDoc') {
file_put_contents('LabMembers/PostDocBody.html', $addAccountContents, FILE_APPEND);
file_put_contents('LabMembers/PostDoc/'.$newUserFilename, $profileContent);
chmod('LabMembers/PostDoc/'.$newUserFilename, 0777);
echo "user added";
}
else if ($_POST['typeOfUserField']=='Phd') {
file_put_contents('LabMembers/PhdBody.html', $addAccountContents, FILE_APPEND);
file_put_contents('LabMembers/Phd/'.$newUserFilename, $profileContent);
chmod('LabMembers/Phd/'.$newUserFilename, 0777);
echo "user added";
}
else if ($_POST['typeOfUserField']=='Masters') {
file_put_contents('LabMembers/MastersBody.html', $addAccountContents, FILE_APPEND);
file_put_contents('LabMembers/Masters/'.$newUserFilename, $profileContent);
chmod('LabMembers/Masters/'.$newUserFilename, 0777);
echo "user added";
}
else if ($_POST['typeOfUserField']=='Graduates') {
file_put_contents('LabMembers/GraduatesBody.html', $addAccountContents, FILE_APPEND);
file_put_contents('LabMembers/Graduates/'.$newUserFilename, $profileContent);
chmod('LabMembers/Graduates/'.$newUserFilename, 0777);
echo "user added";
}

}
else {
	echo "html form post data for the login name and password must be included and it was not found.  Please include that content.";
}
?>