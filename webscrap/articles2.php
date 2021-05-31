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
<?php
//list of websites

$sql = "SELECT id,title,descriptionz, dom, created_ata,link,website_name FROM articles where website_id = 2";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
?>


<h2 style="text-align:center " >Articles</h2>
<table style="text-align:center ;word-wrap:break-word;border: 5px solid #ddd;">
  <tr>
    <!-- <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >id</th> -->
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >title</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >descriptionz</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >dom</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >created_at</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >link</th>
    <th style="text-align:center; background-color: #B7D8FF;border: 5px solid #ddd;" >website_name</th>
  </tr>

<?php


            while($row = mysqli_fetch_assoc($result)) {
              //  $row = mysqli_fetch_assoc($result); 
                $id = $row['id'];
                $title = $row['title'];
                $descriptionz = $row['descriptionz'];
                $dom = $row['dom'];
                $created_at = $row['created_ata'];
                $link = $row['link'];
                $website_name = $row['website_name'];
?>

                <tr>
                <!-- <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $id;?></td> -->
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $title;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $descriptionz;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $dom;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $created_at;?></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><a href="<?php echo $link;?>"><?php echo $link;?></a></td>
                <td style="text-align:center;max-width: 250px;border: 5px solid #ddd;"><?php echo $website_name;?></td>
              </tr>
<?php
                
                //echo $id." ".$title." ".$descriptionz." ".$dom." ".$created_at." ".$link." ".$website_name."<br>";
            }

?>
</table>
<?php
            echo "</table>";
        }
     else {
        echo "eroooooooooooorrr";
    }
?>
</body>
</html>