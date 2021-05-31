<!DOCTYPE html>
<html>
<head>
<?php
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == '' ){
    if($_SESSION['userLogin'] != "logggafuahfuaeifhc37r8qt87qnc7cq9ny74y9n97qncm97qmx9c7q4n97m")
    {
        header("Location: login.php");
        die();
    }
}
//session_unset();
?>
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
<h2 style="text-align:center " >WEBSITES</h2>
<table style="text-align:center ;word-wrap:break-word;border: 5px solid #ddd;">
  <tr>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >name</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >link</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >created_at</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >last_scraped_at</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >Articles</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >Update</th>
  </tr>
<?php


//--------------------------list of websites--------------------------------------
$sql = "SELECT id,namez, link, created_at FROM websites";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              //  $row = mysqli_fetch_assoc($result); 
                
                $idz = $row['id']; 
                $namez = $row['namez'];
                $link = $row['link'];
                $created = $row['created_at'];

                $sqlin = "SELECT created_ata FROM articles where website_id = $idz";
                $resultin = mysqli_query($conn, $sqlin);
                if (mysqli_num_rows($resultin) > 0) {
                    $rowz = mysqli_fetch_assoc($resultin);
                    $scraped = $rowz['created_ata'];
                }
?>
 <tr>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $namez;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><a href="<?php echo $link;?>"><?php echo $link;?></a></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $created;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $scraped;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><a href="articles<?php echo $idz;?>.php">Articles</a></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><a href="insertarticles<?php echo $idz;?>.php">Update</a></td>
              </tr>
<?php
            }
        }
     else {
        echo "eroooooooooooorrr";
    }
?>
</body>
</html>