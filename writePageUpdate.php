<?php
if (isset($_POST["urlPath"]) & isset($_POST["contentArea"])) {
$correctedContentArea = stripslashes($_POST["contentArea"]);
$correctedContentArea2 = str_replace("\'", '"', $_POST["contentArea"]);
file_put_contents($_POST["urlPath"],$correctedContentArea);
}
?>
<script>
window.location.assign(document.referrer)
</script>