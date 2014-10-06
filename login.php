<pre class="showcase"><div>
<?php
 ini_set("auto_detect_line_endings", true);
?>
<h2>Security Policy, Privacy Practices</h2>
<p>Please read and understand how your data is respected.</p>
- The practices and policies herein are under development. All items marked with an "*" are not yet
made a part of the -SP,PP- but are rather the planned implementations for this site. I the webmaster for this
site take the subject of security and privacy seriously. To the best of my own abilities all data stored or
transferred will be made as confidential as possible. If a data breach is made known this site will be removed
until such time as I can assure that it is secure. While in development I ask that users use extreme prejudice
in trusting this site with any personally identifiable information.

*- Disk, Database, Data-set Encryption. While this is not implemented yet I use a method of encryption to devise
the PID "COOKIE" which verifies a users authenticity while a session is active. Each login changes your PID and
does not update to track your habits. Rather it is used as a token of verification only. Proving that your session
is unique and that the user has not changed browsers or computers.

*- Data Anonymization, Minimization, and Fracturing. A practice of striping data or dumping bits randomly is used to
create safe verification. While this helps ensure that if an attacker gains information what they can decrypt is not useful.
To make sure that as little is truly known of the users identity as possible I only collect what information is needed for
authentication. Once this is done the data is then fractured to make it as secure as possible. The less we store as a
whole the less risk of intersection of cross reference there is. Don't submit your age, gender, location or personal preferences.

- Cookie encryption. All data stored in the PID cookie for this site is encrypted. The session is made secure using
a method of obfuscation so that session highjacking is made more difficult. Though it is entirely possible that this
can still happen. As always use caution with information submitted.

*- Open sourced site code, once the site features have been completed the site's source code shall be free to public
scrutiny so that all bugs, errors, and insecure practices can be fixed and then verified as corrected.

For a visualization of the login system please see this: <a href="http://archway.io/space/upload/opensecuritystandardsorbust.png">LoginSys proof of concept</a>
<br>
<center><script type="text/javascript"><!--
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
<div>
</pre>
<!DOCTYPE html>
<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">                      
            Email: <input type="text" name="email" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <p>If you don't have a login, please <a href="register.php">register</a></p>
        <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p>
    </body>
</html>