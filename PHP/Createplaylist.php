<?php
session_start();
include('Script/DBConnection.php');

if($_POST)
{

    $name = $_POST['pname'];
    $tag = $_POST['tagval'];
    if(isset($_SESSION['email'])){ //from session mail is get
   $mail =  $_SESSION['email'] ; }

    $sql=" INSERT INTO playlist(EMAIL,P_NAME,SHARE,TAG) VALUES('$mail','$name',0,'$tag')"; //creating playlist
       $result1 = mysqli_query($con,$sql);
 }
  mysqli_close($con);
   echo $result1;
?>
