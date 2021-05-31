<!DOCTYPE html>
<html>
<head>
<?php
include_once('simple_html_dom.php');
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
//-----------------------------DELETE ALL INFO-------------------------------------------------
$sql = "DELETE FROM articles where website_id = 2";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

//-----------------------------GET ALL THE INFOS------------------------------------------------------
    $i=$u=$k=0;
for($j =1;$j<=4;$j++)
{
    $html = file_get_html('https://www.arabmediasociety.com/category/features/page/'.$j);
    //for($i =0;$i<=6;$i++)
    foreach($html->find('article[class="item-list"]') as $div) {
        $ret1[$i] = $div->find('h2[class="post-box-title"]',0)->find('a',0)->innertext;
        $i++;  
    }
    foreach($html->find('article[class="item-list"]') as $div) {
        $ret2[$u] = $div->find('div[class="entry"]',0)->find('p',0) ->innertext;
        $u++;  
    }
    foreach($html->find('article[class="item-list"]') as $div) {
        $ret3[$k] = $div->find('h2[class="post-box-title"]',0)->find('a',0)->href;
        $k++;  
    }
}
$html->clear();
unset($html);
for( $q=0; $q<sizeof($ret1) ; $q++ )
{
    //echo '<strong>'.$k.' </strong>'.$v.'<br>';
    $sql = "INSERT INTO `articles`(`website_id`, `title`, `descriptionz`,`dom`,`link`, `website_name`) 
        VALUES ('2','$ret1[$q]','$ret2[$q]' ,'article[class=\"item-list\"]','$ret3[$q]','arabmediasociety')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          }
}
    session_start();
          $_SESSION['userLogin'] = "logggafuahfuaeifhc37r8qt87qnc7cq9ny74y9n97qncm97qmx9c7q4n97m";
          header('location: index.php');
    
?>
</body>
</html>