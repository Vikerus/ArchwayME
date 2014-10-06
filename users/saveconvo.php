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
	//Turnicate the UID in DB
$con=mysqli_connect("localhost","phpmate","PASSWORD","USERDB");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$friendcode = mysqli_real_escape_string($con,$_POST["friendid"]);
$messaget = mysqli_real_escape_string($con,$_POST["inboxmsg"]);
$auth = mysqli_real_escape_string($con,$_POST["readauth"]);

$sql="INSERT INTO messages (friendcode,message,auth)
VALUES ('$friendcode','$messaget','$auth')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
unset($_SESSION["inboxmsg"]);
unset($_SESSION["readauth"]);
unset($_SESSION["friendid"]);
unset($_POST["inboxmsg"]);
header('Location: ../index.php');
?> 
