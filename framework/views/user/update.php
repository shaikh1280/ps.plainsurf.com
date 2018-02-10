 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "plainsurf";
$email1 = $_POST['e1'];
$p1 = $_POST['pass1'];
$p2 = $_POST['pass2'];
$hash =$_GET['q'];


    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($hash), $encrypt_method, $key, 0, $iv);
    
if ($output == $email1){
if($p1==$p2){
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql ="UPDATE Reset SET Password = '$p1' WHERE Email = '$email1'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location:Login");
} else {
    echo "Error updating record: " . $conn->error;
    header("Location:Resetpassword");    
}

$conn->close();
} else {
     header("Location:Resetpassword");
}

} else {
  header("Location:Resetpassword");  
}
?> 