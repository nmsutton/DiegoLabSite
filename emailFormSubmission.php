<center>
<?php
$to = $_POST['emailTo'];
$subject = $_POST['emailSubject'];
$message = $_POST['emailBodyContent']."\r\n\r\nMy name is: ".$_POST['emailFirstName']." ".$_POST['emailLastName']."\r\nMy username is: ".$_POST['emailUserName']."\r\nI know about the Diego Lab through: ".$_POST['emailKnowAbout']."\r\nI am affiliated with the Diego Lab through: ".$_POST['emailAffiliation']."\r\n\r\nThank you.";
$header = $_POST['emailHeader']."\r\nFrom: ".strip_tags($_POST['emailFrom']);

mail($to,$subject,$message,$header);
echo "Request submitted";
?>
<br><br>
<a href='http://diego.asu.edu'>Return to site</a>
</center>