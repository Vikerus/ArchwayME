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
$dbhost = 'localhost';
$dbuser = 'phpmate';
$dbpass = 'freeagent7';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('_aio');

// This could be supplied by a user, for example
$firstname = $_SESSION['fcode'];
// Formulate Query
// This is the best way to perform an SQL query
// For more examples, see mysql_real_escape_string()
$query = sprintf("SELECT username, friendcode, apppurse FROM members 
    WHERE username='%s'",
    mysql_real_escape_string($firstname));

// Perform Query
$result = mysql_query($query, $conn);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

// Use result
// Attempting to print $result won't allow access to information in the resource
// One of the mysql result functions must be used
// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
while ($row = mysql_fetch_assoc($result)) {
    //echo $row['PID'] . "<br>";
	$_SESSION['friend'] = $row['username'];
    $_SESSION['friendcodes'] = $row['friendcode'];
    $_SESSION['apppursetotes'] = $row['apppurse'];

}	
unset($_SESSION['fcode']);
unset($_POST['fcode']);
mysql_free_result($result);
mysql_close($conn);
header('Location: ../index.php');

// Free the resources associated with the result set
// This is done automatically at the end of the script

?> 
