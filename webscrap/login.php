<!DOCTYPE html>
<html>
<head>

<title>Page Title</title>
<link rel="stylesheet" href="stylesLogin.css">

<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "webscrap";

$conn = new mysqli($servername, $username, $password, $dbname);

?>

</head>
<body>
<?php
// define variables and set to empty values
$emailErr = $passErr = "";
$email = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $sql = "SELECT email , pass FROM users WHERE email = '$email' AND pass = '$pass' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['userLogin'] = "logggafuahfuaeifhc37r8qt87qnc7cq9ny74y9n97qncm97qmx9c7q4n97m";
        header('location: index.php');
    $row = mysqli_fetch_assoc($result); 
     echo  $row['email']."<br>";
     echo  $row['pass']."<br>";
    }else{
        
        echo  "Wrong Email or Password";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required value="<?php echo $email;?>">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required value="<?php echo $pass;?>">

    <button type="submit">Login</button>
  </div>
</form>
<button onclick="location.href = 'register.php';" id="myButton" class="float-left submit-button" >Register</button>
</body>
</html>