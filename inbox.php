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

$conv=mysqli_connect("localhost","phpmate","freeagent7","_aio");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
include_once 'users/grabfcode.php';
$friendself = $_SESSION["ufcode"];
echo "Fcode: ". "$friendself";
$result = mysqli_query($conv,"SELECT message FROM messages WHERE friendcode='$friendself'");

echo "<table border='1'>
<tr>
<th>Inbox</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['message'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?> 
