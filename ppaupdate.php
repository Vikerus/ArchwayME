<?php
require_once('../index.php');

$appaddition = $_SESSION['views'];
$currentapp = $_SESSION['rowapppurse'];
$APPtotal = $appaddition + $currentapp;
$UUser = $_SESSION['username'];
	//Update the APPPurse in DB
$connn=mysqli_connect("localhost","phpmate","PASSWORD","USERDB");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($connn,"UPDATE members SET apppurse='$APPtotal'
WHERE username='$UUser'");
echo "Connected";
mysqli_close($connn);
unset ($_SESSION['views']);
}
if (empty($_SESSION['views'])){
header('Location: ../logout.php');
}
//
//
//
?>
<html><script type="text/javascript"><!--
google_ad_client = "ca-pub-5438246597621570";
/* archheady */
google_ad_slot = "4166381246";
google_ad_width = 320;
google_ad_height = 50;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script></html>
