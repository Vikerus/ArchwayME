
<html>
<head>
<link rel="stylesheet" href="style/maincase.css" type="text/css" />
<title>Arch Key Decrypter</title>
<?php
$tim = date("Y-m-d, l");
$keys = "$CRYhandle $tim";
setrawcookie("key",$keys);

if (isset($_COOKIE["key"])){
echo "Wb $CRYhandle";
}
else{
die("Sorry but you can only view the Public doc if you contribute");
}


$file = 'includes/crypt.txt';
// The new person to add to the file

$person = "$ciphertext2_base64 $tim";
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
if (isset($_COOKIE["key"])){
file_put_contents($file, $person,FILE_APPEND | LOCK_EX);
}
echo "Today is " . date("Y-m-d, l") . "<br>";
echo "<h3>Collected Input:</h3>";
$file = fopen("includes/crypt.txt", "r") or die("Unable to open file!");

// Output one line until end-of-file
while(!feof($file)) {
  echo fgets($file) . "<br>";
}
fclose($file);
?>
</head>
<body> 
<?php
    # --- ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key2 = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size2 =  strlen($key2);
    $refer = $_SERVER['HTTP_REFERER'];
	$CRYcomment = $_POST["message"];
	$CRYhandle = $_POST["key"];
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
    $ciphertext_decE = base64_decode($_POST["message"]);
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
 
 echo "Referred Link: $refer <br> Encrypted Link: $refer?$ciphertext2_base64 <br>Decrypted: $plaintext_decE <br>";

?>
<h3>JustSearch: Cookie Key Encrypter/Decrypter</h3>
<p>Totally unencrypted/unverified connection! Development use only.</p>
Enter a Username here to Contribute to a Public Doc:<input type="text" name="key">
<br>
<p>Enter a Message to Encrypt or Decrypt.</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Message io:<textarea name="message" rows="5" cols="40"></textarea><br><br>
<input type="submit" name="submit" value="Submit"></form><br>

</body>
</html> 