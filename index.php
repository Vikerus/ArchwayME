<pre class="showcase">
<?php
 ini_set("auto_detect_line_endings", true);
 //int_set("allow_url_fopen", false);
 //int_set("allow_url_include", false);
 //int_set("default_socket_timeout", 240);
 if($_GET["a"] === "") echo "a is an empty string\n";
 if($_GET["a"] === false) echo "a is false\n";
 if($_GET["a"] === null) echo "a is null\n";
 if(isset($_GET["a"])) echo "a is set\n";
 if(!empty($_GET["a"])) echo "a is not empty";
 Echo "Warning connection is in httpOnly, ssl will/should be implemented in production scenarios.". "<br>";
  Echo "Try the new Arch Key Decrypter if you don't wish to register! http:archway.io/space/key.php". "<br>";

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
//$textToEncrypt = $_COOKIE["PHPSESSID"];
//$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
//$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";

//$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
//$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

//$encryptedMessage = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash, 0, $iv);
//$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash, 0, $iv);

//$data = $iv.$encryptedMessage;

//$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
//$iv = substr($data, 0, $iv_size);
//$decryptedMessage = openssl_decrypt(substr($data, $iv_size), $encryptionMethod, $secretHash, 0, $iv);
//Result
//echo "Encrypted With SSL: $encryptedMessage <br>Decrypted With SSL: $decryptedMessage <br>";

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
// Include database connection and functions here.  See 3.1. 
sec_session_start(); 
if(login_check($mysqli) == true) {
	$con=mysqli_connect("localhost","phpmate","PASSWORD","LOGINDB");
//	session_start();   // Add your protected page content here!
} else { 
		header('Location: ./login.php');
        echo "You are not authorized to access this page, please login or register. " ."<url>http://archway.io/e/login.php</url>" . "<br>";
}

//echo "RAWCOOKIE:  ".$_COOKIE["PHPSESSID"]."<br>SID: ".SID."session_id(): ".session_id()." <br>";

//$textToEncryptT = session_id();
//$encryptionMethodT = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
//$secretHashT = "25c6c7ff35b9979b151f2136cd13b0ff";

//$iv_sizeT = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
//$ivT = mcrypt_create_iv($iv_sizeT, MCRYPT_RAND);

//$encryptedMessageT = openssl_encrypt($textToEncryptT, $encryptionMethodT, $secretHashT, 0, $ivT);
//$decryptedMessageT = openssl_decrypt($encryptedMessageT, $encryptionMethodT, $secretHashT, 0, $ivT);

//$dataT = $ivT.$encryptedMessageT;

//$iv_sizeT = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
//$ivT = substr($dataT, 0, $iv_sizeT);
//$decryptedMessageT = openssl_decrypt(substr($dataT, $iv_sizeT), $encryptionMethodT, $secretHashT, 0, $ivT);
//Result
//echo "Encrypted With AES: $encryptedMessageT <br>Decrypted With AES: $decryptedMessageT <br>";
//$ip = $_SERVER['REMOTE_ADDR'];
//$str = $_POST["UserHandle"];
//$stremail = $_POST["Email"];
//$value = "$ip $str $stremail $time $textToEncryptT";
//$expire = time()+30000;
//$time = date("Y-m-d, l");
//$CookieToEncrypt = $value;
//$encryptionMethodE = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
//$secretHashE = "25c6c7ff35b9979b151f2136cd13b0ee";

//$iv_sizeE = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
//$ivE = mcrypt_create_iv($iv_sizeE, MCRYPT_RAND);

//$encryptedMessageE = openssl_encrypt($CookieToEncrypt, $encryptionMethodE, $secretHashE, 0, $ivE);
// sent a simple cookie
//setcookie("time",$encryptedMessageE,$expire);
if (isset($_COOKIE['poke']) )
{
    # --- SESSION_id ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
  //  echo "Key size: " . $key_size . "\n" . "<br>";
    
    $plaintext = $_COOKIE['poke'];

    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);
//
	//Missingno rarity
	$bulba = hash('ripemd160', "bulbasaur");
	$pika = hash('ripemd160', "pikachu");
	$mewtwo = hash('ripemd160', "mewtwo");
	$char = hash('ripemd160', "charizard");
	if ($plaintext == $bulba)
	$missingno = "MissingNo.!";
	if ($plaintext == $pika)
	$missingno = "Yellow MissingNo.!";
	if ($plaintext == $mewtwo)
	$missingno = "Fossil MissingNo.!";
	if ($plaintext == $char)
	$missingno = "Ghost MissingNo.!";
	if (empty($plaintext));
	$missingno = "???";
//
//
//
	setrawcookie("$missingno",$ciphertext_base64);
    //echo  $ciphertext_base64 . "\n" . "<br>";
    //echo  $_COOKIE["$missingno"] . "\n" . "<br>";

    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    $ciphertext_dec1 = base64_decode($_COOKIE["$missingno"]);
    $ciphertext_dec = base64_decode($ciphertext_base64);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec1 = substr($ciphertext_dec1, 0, $iv_size);
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
	
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec1 = substr($ciphertext_dec1, $iv_size);
	$ciphertext_dec = substr($ciphertext_dec, $iv_size);
    # may remove 00h valued characters from end of plain text
    $plaintext_dec1 = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
									$ciphertext_dec1, MCRYPT_MODE_CBC, $iv_dec1);
	$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

    //echo  $plaintext_dec . "\n" . "<br>";
	//echo  $plaintext_dec1 . "\n" . "<br>";
}
?>
<?php
//
$dbhost = 'localhost';
$dbuser = 'phpmate';
$dbpass = 'USERDB';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('_aio');

// This could be supplied by a user, for example
$firstname = $_SESSION['username'];


// Formulate Query
// This is the best way to perform an SQL query
// For more examples, see mysql_real_escape_string()
$query = sprintf("SELECT PID, friendcode, username, UID, apppurse, slate FROM members 
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
while ($row = mysql_fetch_array($result)) {
	$UIDverify = $row['UID'];
	$slate = $row['slate'];
	$loggeduser = $row['username'];
	$apppursetot = $row['apppurse'];
	$_SESSION['rowapppurse'] = $row['apppurse'];
    //echo $row['PID'] . "<br>";
}

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysql_free_result($result);

//
//$dbhost = 'localhost';
//$dbuser = 'phpmate';
//$dbpass = 'PASSWORD';
//$conn = mysql_connect($dbhost, $dbuser, $dbpass);
//if(! $conn )
//{
 // die('Could not connect: ' . mysql_error());
//}
//$sql = 'SELECT PID, username, 
//               uid
//        FROM members WHERE email=$email';

//mysql_select_db('_aio');
//$retval = mysql_query( $sql, $conn );
//if(! $retval )
//{
//  die('Could not get data: ' . mysql_error());
//}
//while($row = mysql_fetch_array($retval, MYSQL_NUM))
//{		
//	$UIDverify = $row[2];
 //   echo "PID :{$row[0]}  <br> ".
 //        "Username: {$row[1]} <br> ".
//         "UID: {$row[2]} <br> ".
 //        "--------------------------------<br>";
//
//

		 $UIDcookie = $_COOKIE["UID"];

	if(empty($_COOKIE['UID'])){
	echo "Login Session is not Bonded, Please Login" . "<br>";
	$sec = 2;
	$UIDcookie = "%20NULLIFIED%20";
	}
	if ($UIDcookie == $UIDverify){// false output when should be true.
	echo "Session is Verified" . "<br>";
	$sec = 1;
	mysql_free_result($retval);
	echo "Fetched data successfully"."<br>";
	mysql_close($conn);
}	else{
	echo  "Session is Unverified." . "<br>";
	echo $_COOKIE["sec_session_id"] . "<br>";
	mysql_free_result($retval);
	echo "Data fetch Halted"."<br>";
	mysql_close($conn);
	die('Error: ' . '80');
}
	if($sec == 2){
	die('Session Killed' . '<br>' . 'Security of End User cound not be Confirmed.');
	}
	if(login_check($mysqli) == true) {
    $sec2 = 1;
	echo "Authentication Accepted." . "<br>";
} else {
	$sec2 = 2;
	echo "Authentication Rejected." . "<br>";
	die('Error: ' . '80');
}
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$User = mysqli_real_escape_string($con, $_POST['UserHandle']);
$Email = mysqli_real_escape_string($con, $_POST['Email']);
$EmailId = mysqli_real_escape_string($con, $_POST['UserNum']);

$sql="INSERT INTO Persons (UserHandle, Email, UserNum)
VALUES ('$User', '$Email', '$EmailId')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Welcome to the Archway.";

mysqli_close($con);
?>
<html>
<head>
<link rel="stylesheet" href="style/showcase.css" type="text/css" />
<link rel="stylesheet" href="style/maincase.css" type="text/css" />
<title>The Archway</title>

<br>
<?php
// store session data
if(isset($_SESSION['views']))
$_SESSION['views']=$_SESSION['views']+1;

else
$_SESSION['views']=1;

echo "Views=". $_SESSION['views'];

?>
<h3>JustSearch: UserData</h3>
<?php
    echo "UserHandle: " . $loggeduser . "<br>";
    echo "ArchPowerPoints: ". $apppursetot . "<br>";
	echo $_SESSION["urfriendcode"];
    echo "Profile Blog: ". $slate . "<br><br>";
//Cookie Login
echo $_SERVER['HTTP_USER_AGENT']. "<br>";
echo $_SERVER['SERVER_NAME']. "<br>";
echo $_SERVER['SERVER_PROTOCOL']. "<br>";
echo $_SERVER['REQUEST_TIME_FLOAT']. "<br>";
echo $_SERVER['HTTP_CONNECTION']. "<br>";
echo $_SERVER['HTTP_ACCEPT_LANGUAGE']. "<br>";
echo $_SERVER['HTTP_REFERER']. "<br>";
echo $_SERVER['REMOTE_ADDR']. "<br>";
echo $_SERVER['REMOTE_HOST']. "<br>";
echo $_SERVER['REMOTE_PORT']. "<br>";
echo $_SERVER['REDIRECT_REMOTE_USER']. "<br>";
?>
<br>
</head>
<body>
<div class="maincase">
	<div class="showcase" >
<h3>JustSearch: Image Uploader</h3>
<h4>Supported File Types: ".gif" ".jpeg", ".jpg", ".png"</h4>
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit3" value="Submit"></form>
<br>
<h3>JustSearch: Profile Blog</h3>
<p>Post something to be added to your public profile.</p>
<form method="post" action="<?php if (isset($_POST["slate"])){ $_SESSION["slate"] = $_POST["slate"];
								  header('Location: users/savemsg.php');}
								  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Profile Post: <textarea name="slate" rows="5" cols="40">Limit: 1400 Characters.</textarea><br><br>
<input type="submit" name="submit5" value="Submit"></form><br>
<br>
<h3>JustSearch: Global Bulletin Board</h3>
<p>Post something for people to read. @ http://archway.io/e/messagepire.html</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Bulletin Post: <textarea name="bulletmsg" rows="5" cols="40"></textarea><br><br>
<input type="submit" name="submit4" value="Submit"></form><br>
<br>
<h3>JustSearch: ArchEmail Message Encryption Service (Free)</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>This module will send an encrypted version of your message to any valid email.<br>
With a Handle at the end. Submit again after first process to clear info.</p><br>
Handle: <input type="text" name="UserHandle">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
Passcode:
<input type="text" name="password">
<span class="error">* <?php echo $passErr;?></span>
<br><br>
E-mail:
<input type="text" name="Email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
<label>Comment: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>
<h3>JustSearch: Email Decrypter</h3>
<p>Paste the Values after archway.io/space/index.php?<br>
from your Encrypted Link and Submit for Decryption.</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Encrypted Email:<textarea name="decrypt" rows="5" cols="40"></textarea><br><br>
<input type="submit" name="submit2" value="Submit"></form><br>
<h3>JustSearch: Asymetric Key Encrypter/Decrypter</h3>
<p>Totally unencrypted/unverified connection! Development use only.</p>

<p>Enter a Message to Encrypt or Decrypt.</p>
<form method="post" action="<?php if ($_POST['apupdate'] == "Yes")
        // Login success 
        header('Location: ./users/ppaupdate.php'); 
		echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Enter a Passphrase here:<input type="text" name="key">
<br>
<label>Message io:<textarea name="message" rows="5" cols="40"></textarea><br><br>
	Update ArchwayPowerPoints on Submit?
<input type="radio" name="apupdate" value="No">No
<input type="radio" name="apupdate" value="Yes">Yes
<span class="error">*Logs you out! <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit6" value="Submit"></form><br>
<h3>JustSearch: Friendme</h3>
<p>Search For a Friendcode to message.</p>
<form method="post" action="<?php if(isset($_POST['fcode'])){
        $_SESSION["fcode"] = $_POST["fcode"];
        // Login success 
        header('Location: ./users/getuser.php');}
		echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Find a Friend:
<input type="text" name="fcode">
<span class="error">* <?php echo $passErr;?></span>
<br>Would you like to make your friencode private?
<input type="radio" name="encodekey" value="No">No
<input type="radio" name="encodekey" value="Yes">Yes
<span class="error">*Encrypts your friendcode with a passphrase.<?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit7" value="Submit"></form><br><br>
<h3>JustSearch: Friendme Messenger</h3>
<p>Send a message to a Friends Archway.io Inbox! :O</p>
<form method="post" action="./users/saveconvo.php">
Enter a Friendme code:<input type="text" name="friendid">
<br>Is the Key Private?
<input type="radio" name="privkey" value="No">No
<input type="radio" name="privkey" value="Yes">Yes
<span class="error">*Decrypts your friends Private Friendcode<?php echo $genderErr;?></span>
<br>Friendme Password:<input type="text" name="frdkeypass">
<span class="error">*Only needed for Private Fc's<?php echo $genderErr;?></span>
<br><label>Send Message:<textarea name="inboxmsg" rows="5" cols="40">6000 Character Limit</textarea><br><br>
<br>What kind of message are we sending?
<input type="radio" name="readauth" value="Public">Public
<input type="radio" name="readauth" value="Group">Group
<input type="radio" name="readauth" value="Private">Private
<span class="error">*assigns the read authority<?php echo $genderErr;?></span>
<br><input type="submit" name="submit9" value="Submit"></form><br>
	</div>
	</div>
<?php

// Get private key
$Request = $_POST["key"];
$SecretKey = "UIDgghdgfjhygjhmydtidnhgfbdtrydyunfujfnikmmvhgncgfbxd";
$privatekey = base64_encode(hash_hmac('sha256', $Request, $SecretKey, true));
$textToEncrypt1 = $_POST["message"];
    # --- SESSION_id ENCRYPTION ---
    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key3 = pack('H*', "$privatekey");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key3_size =  strlen($key3);
    //echo "Key size: " . $key3_size . "\n" . "<br>";
    
    $plaintext3 = $_POST['message'];

    # create a random IV to use with CBC encoding
    $iv_size3 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv3 = mcrypt_create_iv($iv_size3, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext3 = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key3,
                                 $plaintext3, MCRYPT_MODE_CBC, $iv3);

    # prepend the IV for it to be available for decryption
    $ciphertext3 = $iv3 . $ciphertext3;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base643 = base64_encode($ciphertext3);
//
//
    //echo  $_COOKIE["$missingno"] . "\n" . "<br>";

    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    $ciphertext_dec13 = base64_decode($textToEncrypt1);
    $ciphertext_dec3 = base64_decode($ciphertext_base643);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec13 = substr($ciphertext_dec13, 0, $iv_size3);
    $iv_dec3 = substr($ciphertext_dec3, 0, $iv_size3);
	
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec13 = substr($ciphertext_dec13, $iv_size3);
	$ciphertext_dec3 = substr($ciphertext_dec3, $iv_size3);
    # may remove 00h valued characters from end of plain text
    $plaintext_dec13 = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key3,
									$ciphertext_dec13, MCRYPT_MODE_CBC, $iv_dec13);
	$plaintext_dec3 = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key3,
                                    $ciphertext_dec3, MCRYPT_MODE_CBC, $iv_dec3);



    # ---SEND Email ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key2 = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size2 =  strlen($key2);
    
	$CRYcomment = $_POST["comment"];
	$CRYhandle = $_POST["UserHandle"];
	$CRYsalt = $_POST["password"];
    $plaintext2 = "$CRYcomment $CRYhandle";

    # create a random IV to use with CBC encoding
    $iv_size2 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv2 = mcrypt_create_iv($iv_size2, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext2 = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key2,
                                 $plaintext2, MCRYPT_MODE_CBC, $iv2);

    # prepend the IV for it to be available for decryption
    $ciphertext2 = $iv2 . $ciphertext2;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext2_base64 = base64_encode($ciphertext2);


    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    $ciphertext_decE = base64_decode($_POST["decrypt"]);
    $ciphertext_dec2 = base64_decode($ciphertext2_base64);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_decE = substr($ciphertext_decE, 0, $iv_size2);
    $iv_dec2 = substr($ciphertext_dec2, 0, $iv_size2);
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_decE = substr($ciphertext_decE, $iv_size2);
	$ciphertext_dec2 = substr($ciphertext_dec2, $iv_size2);
    # may remove 00h valued characters from end of plain text
    $plaintext_decE = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key2,
                                    $ciphertext_decE, MCRYPT_MODE_CBC, $iv_decE);
    $plaintext_dec2 = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key2,
                                    $ciphertext_dec2, MCRYPT_MODE_CBC, $iv_dec2);

?>
<div class="showcase" >
<p>Check your inbox.</p>
<form method="post" action="inbox.php">
<input type="submit" name="submit10" value="Open"></form><br>
<?php
echo "Today is " . date("Y-m-d, l") ."<br>";
echo "<h2>Friends</h2>";
echo "<table border='1'>
<tr>
<th>User Handle</th>
<th>Friend Code</th>
<th>Arch Power Points</th>
</tr>";
  echo "<tr>";
  echo "<td>" . $_SESSION['friend'] . "</td>";
  echo "<td>" . $_SESSION['friendcodes'] . "</td>";
  echo "<td>" . $_SESSION['apppursetotes'] . "</td>";
  echo "</tr>";
echo "</table>";
echo "<br>";
echo "<h2>Your Input:</h2>";
echo "From: ". $_POST["UserHandle"];
echo "<br>";
echo "To: ". $_POST["Email"];
echo "<br>";
echo "Sent Email: ". $plaintext_dec2 . "<br>";
echo "Decrypted Email:". $plaintext_decE . "<br>";
echo "Encrypted Message:". $ciphertext_base643 . "\n" . "<br>";
echo "Decrypted Message:". $plaintext_dec13 . "\n" . "<br>";

if(empty($_POST["bulletmsg"])){
	echo "No Bulletin Posted." . "<br>";
}	else{
 header('Location: ./messagepire.html');
 echo "bulletin post written" . "<br>";
 $file = 'devpire.txt';
 //The new person to add to the file
 $person = $_POST["bulletmsg"];
 $personstruc = "<br>" . "Archway.io Bulletin" . ": " . date("Y-m-d, l") . " : " . "$person" . "<br>";
 //Write the contents to the file, 
 // the FILE_APPEND flag to append the content to the end of the file
 //and the LOCK_EX flag to prevent anyone else writing to the file at the same time
 file_put_contents($file, $personstruc,FILE_APPEND | LOCK_EX);
 //
 fclose($myfile);
}

//if sql connection secured email is possible
	if(login_check($mysqli) == true){
	$to = $_POST["Email"];
	$subject = "This is an encrypted communication in Link";
	$body = "Method A. Decrypt by visiting the link while logged into The Archway, then hit submit with the decrypter empty. Copy the new plain text URL on page and paste into the decrypter. Submit to Decrypt. Method B. Follow method A. but take the encrypted message right from the URL bar and decrypt on the first Submit. Method C. Use the new Arch Key Decrypter to unmask your Encrypted Message! Encrypted Link Follows, have a nice day; http:archway.io/space/index.php"."?"."$ciphertext2_base64";
	}
	if (mail($to, $subject, $body)) {
    echo("Email successfully sent!");
  } else {
   echo("No Email Sent.");
  }

// define variables and set to empty values
$name = $email = $comment = $pass = $decrypt = "";
$nameErr = $emailErr = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["comment"])) {
     $comment = "Text shows here.";
   } else {
     $comment = test_input($_POST["comment"]);
}
   if (empty($_POST["decrypt"])) {
     $decrypt = "Text shows here.";
   } else {
     $decrypt = test_input($_POST["decrypt"]);
}
   if (empty($_POST["UserHandle"])) {
     $nameErr = die("Name is required.");
   } else {
     $name = test_input($_POST["UserHandle"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     $nameErr = die("Only letters and white space allowed in User name.");
}
   }
   if (empty($_POST["password"])) {
     $passErr = die("Pass is required.");
   } else {
     $pass = test_input($_POST["password"]);
}
   if (empty($_POST["Email"])) {
     $emailErr = die("Email is required.");
   } else {
     $email = test_input($_POST["Email"]);
	 
   if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
     $emailErr = die("Invalid email format.");
}
}
    



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data; 

}

}
?>
</div>
</body>
</html> 
