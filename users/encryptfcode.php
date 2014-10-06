<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

if ($_POST["encodedkey"] = "Yes"){
// Get private key
$Request = $_POST["keypasser"];
$SecretKey = "UIoiugf8gto843ty0w7o54f8tq43f8t6506q8752345w4inyhf4y765djfy382qhi6t5049jydiur48h7eao6yt59875w6g3i45ju4w3fh459fohi63triuw7";
$privatekey = base64_encode(hash_hmac('sha256', $Request, $SecretKey, true));
$textToEncrypt1 = $_SESSION["ffcode"];
    # --- SESSION_id ENCRYPTION ---
    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key3 = pack('H*', "$privatekey");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key3_size =  strlen($key3);
    //echo "Key size: " . $key3_size . "\n" . "<br>";
    
    $plaintext3 = $_SESSION["ffcode"];

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
}
	
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
									
	echo $plaintext_dec13;
	$_SESSION["decryptedfcode"] = $plaintext_dec13;

	if (isset($_POST["keypass"])){
	$safefcode = $ciphertext_base643;
$UUser = $_SESSION['username'];
	//Turnicate the UID in DB
$conv=mysqli_connect("localhost","phpmate","PASSWORD","USERDB");
// Check connection
}
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysqli_query($conv,"UPDATE members SET friendcode='$safefcode'
WHERE username='$UUser'");
echo "Profile Saved";
}
mysqli_close($conv);
header('Location: ../index.php');
?>
