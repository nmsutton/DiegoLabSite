<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<link rel="stylesheet" href="./Css/styles.css" type="text/css">

<?php
include ("SiteTop.html");
echo "		$('#urlPath').attr('value', 'ContactBody.html');	";
include ("SiteUpperMiddle.html");
echo ' 
<ul class="menu">
<li class="item-101">
<a href="./Welcome.php">Welcome to the D.I.E.G.O. Lab</a>
</li>
<li class="item-102">
<a href="Lab-members.php">Lab Members</a>
</li>
<li class="item-107">
<a href="Publications2.php">Publications</a>
</li>
<li class="item-108">
<a href="Projects.php">Projects</a>
</li>
<li class="item-111 current active">
<a href="Contact.php">Contact the D.I.E.G.O. Lab</a>
</li>
</ul>
';
include ("SiteSecondUpperMiddle.html");		
echo '<form method="post" action="writePageUpdate.php" name="frm">';
echo '<input type="hidden" id="urlPath" name="urlPath" value="ContactBody.html"></input>';
echo '<div id="contentArea" name="contentArea" class="noteditable" contenteditable="false">';
include ("ContactBody.html");
echo '</div>';
echo '<input type="hidden" id="pageContent" name="pageContent"></input>';
echo '</form>';
include ("SiteFooter.html");
?>

<!-- security is below that only allow content once a user is logged in -->
<?PHP
	$cfgProgDir =  'phpSecurePages/';
	include($cfgProgDir . "secure.php");
?>