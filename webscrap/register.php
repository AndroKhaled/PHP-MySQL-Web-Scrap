<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="stylesRegister.css">

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
$nameErr = $emailErr = $passErr = "";
$name = $email = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["password"])) {
    $passErr = "pass is required";
  } else {
    $pass = test_input($_POST["password"]);
  }
}

function test_input($data) {
  return $data;
}
if($nameErr == "" && $emailErr == "" && $passErr == ""){
  if($email != "" && $pass !="" && $name !=""){
    $sql = "INSERT INTO `users`(`email`, `pass`, `name`) VALUES ('$email','$pass','$name')";

    if ($conn->query($sql) === TRUE) {
      
      echo "New record created successfully";
      session_start();
            $_SESSION['userLogin'] = "logggafuahfuaeifhc37r8qt87qnc7cq9ny74y9n97qncm97qmx9c7q4n97m";
            header('location: index.php');
            
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
?>

<h2>REGISTER</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $pass;?>">
  <span class="error"><?php echo $passErr;?></span>
  <br><br>

  <!-- <input class="float-left submit-button" id="myButton" type="submit" name="submit" value="Submit">  -->
  <button id="myButton" class="float-left submit-button" type="submit" name="submit" value="Submit" >SUBMIT</button> 
</form>
<button onclick="location.href = 'login.php';" id="myButton" class="float-left submit-button" >LOGIN</button>
</body>
</html>