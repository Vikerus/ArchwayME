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
$manifesto = $_SESSION["slate"];
$UUser = $_SESSION['username'];
	//Turnicate the UID in DB
$conv=mysqli_connect("localhost","phpmate","PASSWORD","USERDB");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($conv,"UPDATE members SET slate='$manifesto'
WHERE username='$UUser'");
echo "Profile Saved";
}
unset($_SESSION["slate"]);
unset($_POST["slate"]);
mysqli_close($conv);
header('Location: ../index.php');
?>
