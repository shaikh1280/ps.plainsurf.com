<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "plainsurf";
$email =$_POST['email1'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID,Email,Password FROM Reset where Email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // Create a unique salt. This will never leave PHP unencrypted.
                 
                $encrypt_method = "AES-256-CBC";
                $secret_key = 'This is my secret key';
                $secret_iv = 'This is my secret iv';
    
                $key = hash('sha256', $secret_key);
                 
                $iv = substr(hash('sha256', $secret_iv), 0, 16);
                 
                $output = openssl_encrypt($email, $encrypt_method, $key, 0, $iv);
                $password = base64_encode($output);

	        $pwrurl = "localhost:8080/user/Resetpassword?q=".$password;

	        // Mail them their key
	        $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
	        mail($email, "PlainSurf Password Reset Link", $mailbody);
	        echo $pwrurl;
} else {
       
       header("Location:Forgetpassword");
       $message = "Your Enter mail it not in the Database. Plz Enter Registered Mail Id";
        echo "<script type='text/javascript'>alert('$message');</script>";
}
$conn->close();
?> 