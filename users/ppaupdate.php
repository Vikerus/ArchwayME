<pre class="showcase">
<?php
 ini_set("auto_detect_line_endings", true);
?><center><script type="text/javascript"><!--
google_ad_client = "ca-pub-5438246597621570";
/* archheady */
google_ad_slot = "4166381246";
google_ad_width = 320;
google_ad_height = 50;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script><link rel="stylesheet" href="style/maincase.css" type="text/css" /></center>
</pre>
<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
$appaddition = $_SESSION['views'];
$currentapp = $_SESSION['rowapppurse'];
$APPtotal = $appaddition + $currentapp;
$UUser = $_SESSION['username'];
	//Update the APPPurse in DB
$connn=mysqli_connect("localhost","phpmate","freeagent7","_aio");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($connn,"UPDATE members SET apppurse='$APPtotal'
WHERE username='$UUser'");
echo "Connected";
unset ($_SESSION['views']);
unset ($_SESSION['apppurse']);
}
mysqli_close($connn);
header('Location: ../logout.php');
//
//
?>
