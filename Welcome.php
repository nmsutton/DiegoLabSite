<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<link rel="stylesheet" href="./Css/styles.css" type="text/css">

<?php
include ("SiteTop.html");
echo "		$('#urlPath').attr('value', 'WelcomeBody.html');	";
include ("SiteUpperMiddle.html");
echo ' 
<ul class="menu">
<li class="item-101 current active">
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
<li class="item-111">
<a href="Contact.php">Contact the D.I.E.G.O. Lab</a>
</li>
</ul>
';
include ("SiteSecondUpperMiddle.html");	
echo '
									<h1 class="componentheading"> Welcome to the D.I.E.G.O. Lab </h1>
									<p class="MsoNormal" style="margin-top: 3.75pt; margin-right: 0in; margin-bottom: 3.75pt; margin-left: 0in;">
										<span style="font-family: arial, sans-serif; font-size: 13px; line-height: 17px;"> </span>
									</p>
									<div class="moduletable">
										<style type="text/css">
											.featureCarousel {
												width:700px;
												height:270px;
											}
										</style>
										<div id="featureCarousel88" class="featureCarousel">
											<div class="feature" style="left: 30px; width: 330px; height: 220px; top: 70px; opacity: 0.4; z-index: 1;"><img alt="Image Caption" src="./Images/diegolablogo22.png" style="width: 330px; display: inline-block; height: 220px;">
												<div style="display: none; opacity: 0.85;">
													<p>
														Welcome to the D.I.E.G.O. Lab, where we focus on knowledge extraction, integration, and analysis methods that empower biomedical discoveries.
													</p>
												</div>
											</div>
											<div class="feature" style="left: 17px; width: 660px; height: 440px; top: 20px; opacity: 1; z-index: 4;">
												<a href="http://diego.asu.edu/NewSite/Lab-members.php"><img alt="Image Caption" src="./Images/diegologopersonnel2.png" style="width: 660px; display: inline-block; height: 440px;"></a>
												<div style="display: block; opacity: 0.85;">
													<p>
														Please take a second to get to know all of our lab members.
													</p>
												</div>
											</div>
											<div class="feature" style="left: 334px; width: 330px; height: 220px; top: 70px; opacity: 0.4; z-index: 1;">
												<a href="http://diego.asu.edu/NewSite/Projects.php"><img alt="Image Caption" src="./Images/diegologoprojects2.png" style="width: 330px; display: inline-block; height: 220px;"></a>
												<div style="display: none; opacity: 0.85;">
													<p>
														Wondering what the lab is working on, you can simply find out.
													</p>
												</div>
											</div>
											<div class="feature" style="left: 182px; width: 330px; height: 220px; top: 70px; opacity: 0; z-index: 1;">
												<a href="http://diego.asu.edu/NewSite/Publications2.php"><img alt="Image Caption" src="./Images/diegologopublications2.png" style="width: 330px; display: inline-block; height: 220px;"></a>
												<div style="display: none; opacity: 0.85;">
													<p>
														Look through our robust list of publications.
													</p>
												</div>
											</div>
											<div class="feature" style="left: 182px; width: 330px; height: 220px; top: 70px; opacity: 0; z-index: 1;">
												<a href="http://diego.asu.edu/NewSite/Contact.php"><img alt="Image Caption" src="./Images/diegologocollaborations2.png" style="width: 330px; display: inline-block; height: 220px;"></a>
												<div style="display: none; opacity: 0.85;">
													<p>
														Are you interested in collaborating with our lab?
													</p>
												</div>
											</div>
											<ul class="blipsContainer" style="display: block;">
												<li style="float: left; list-style-type: none;">
													<div class="blip" id="blip_1" style="cursor: pointer;">
														1
													</div>
												</li>
												<li style="float: left; list-style-type: none;">
													<div class="blip blipSelected" id="blip_2" style="cursor: pointer;">
														2
													</div>
												</li>
												<li style="float: left; list-style-type: none;">
													<div class="blip" id="blip_3" style="cursor: pointer;">
														3
													</div>
												</li>
												<li style="float: left; list-style-type: none;">
													<div class="blip" id="blip_4" style="cursor: pointer;">
														4
													</div>
												</li>
												<li style="float: left; list-style-type: none;">
													<div class="blip" id="blip_5" style="cursor: pointer;">
														5
													</div>
												</li>
											</ul>
										</div>
										<script type="text/javascript">
											fcjQuery(window).load(function() {
												fcjQuery("#featureCarousel88").featureCarousel({
													autoPlay : 5000,
													largeFeatureWidth : 0,
													largeFeatureHeight : 0,
													smallFeatureWidth : 0,
													smallFeatureHeight : 0,
													smallFeatureOffset : 50,
													topPadding : 20
												});
											});
										</script>
									</div>
';
		
echo '<form method="post" action="writePageUpdate.php" name="frm">';
echo '<input type="hidden" id="urlPath" name="urlPath" value="WelcomeBody.html"></input>';
echo '<div id="contentArea" name="contentArea" class="noteditable" contenteditable="false">';
include ("WelcomeBody.html");
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