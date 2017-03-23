<?php
session_start();
include('Script/DBConnection.php');

if($_POST)
{

    $id = $_POST['sid'];
    $tag = $_POST['tagval'];
    if(isset($_SESSION['email'])){
   $mail =  $_SESSION['email'] ; }
     $response = array();//to get list of playlists when user want to add song to playlist
    $sql=" SELECT * FROM playlist where EMAIL='$mail'";
       $result1 = mysqli_query($con,$sql);
      while( $row = mysqli_fetch_assoc($result1))
      {
     $response[] = $row['P_NAME'];//saving playlist names in response array
      }
 }
  mysqli_close($con);
   echo json_encode($response);
?>
