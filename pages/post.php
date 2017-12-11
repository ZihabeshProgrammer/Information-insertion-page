<!DOCTYPE html>
<html lang="en">
<head>
<body>
<?php
error_reporting(E_ALL & ~E_NOTICE);
//echo     'adi;'.$_POST['adi'];die;
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "phpmyadmin";
//$results_per_page = 20;

// $conn = mysqli_connect("localhost","root",NULL);
//$db  = mysqli_select_db("phpmyadmin",$conn);

$link = mysqli_connect($servername, $username, $password,$dbname);

if (!$link) {
    die("Connection failed: " . $link->connect_error);
}
//  $sql = "SELECT adi,detay FROM ihaleler";

$name = $_POST['adi'];
$mail = $_POST['email'];
$created_date = date('Y-m-d H:i', strtotime($_POST['date']));
$comment =$_POST['comment'];

?>
<?php 
foreach((array($states_to_add)) as $item) {
    $dupesql = "SELECT
                    adi,muteahhit
                FROM
                    ihaleler
                WHERE
                    (adi='$name' AND muteahhit='$mail'
                    )";
    
    $duperaw = mysqli_query($link,$dupesql);
    if( $duperaw->num_rows) {
        ?> <script>
        window.location.href = "realproject.php";
         alert("already exists in");</script>	<?php 
    }
    else {?>
       <?php if(is_numeric($name)||is_numeric($mail))  {?>
       	  <script>	window.location.href = "info_insertion.php";
             alert("Must input leters not numbers")</script>
       		<? }
         else{
                $sql = "INSERT INTO ihaleler(adi,muteahhit,detay,ihaletrh) values('$name','$mail','$comment','$created_date')";
                $sonuc = mysqli_query($link,$sql);
                //$query = "SELECT * from users where pin ='$pin'";?>
                <?php 
                if($sonuc):?>
                
                     <script>	window.location.href = "info_insertion.php";
                     alert("successful")</script>		
                <?php endif; ?> <?php //Sav ?>
                     
<? }
//header('Location: realproject.php');
//exit;
}
}
?>
</body>
</head>

    
