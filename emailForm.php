<center>
<form action="emailFormSubmission.php"  METHOD='post'>
<div style='font-size:14pt;'>
<h2>User request: </h2>
<b><u>Please fill in the &#060;text box&#062; sections in the below description<br>or we will not know who you are and are not able to help.</u></b>
<br><br>
<?php
echo "<br>Firstname:<br><input type='text' name='emailFirstName' value=''>";
echo "<br><br>Lastname:<br><input type='text' name='emailLastName' value=''>";
echo "<br><br>My email:<br><input type='text' name='emailFrom' value=''>";
echo "<br><br>(If you have one) My username:<br><input type='text' name='emailUserName' value=''>";
echo "<br><br>I know about the Diego Lab through:<br><textarea name='emailKnowAbout' cols=50 rows=10 wrap='soft'></textarea>";
echo "<br><br>(Optional but preferred) I am affiliated with the diego lab through:<br><textarea name='emailAffiliation' cols=50 rows=10 wrap='soft'></textarea>";
echo '<br><br>My request<br><textarea name="emailBodyContent" id="emailBodyContent" cols=50 rows=25 wrap="soft">'.$_POST['emailBodyContent'].'</textarea>';
echo "<input type='hidden' name='emailTo' value='".$_POST['emailTo']."'>";
echo "<input type='hidden' name='emailSubject' value='".$_POST['emailSubject']."'>";
echo "<input type='hidden' name='emailHeader' value='".$_POST['emailHeader']."'>";
?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js">
$(document).ready(function(){
   $("emailBodyContent").resizable();
});
</script>
<br><br>
<input type="submit" value="Submit User Request">
</div>
</form>
</center>