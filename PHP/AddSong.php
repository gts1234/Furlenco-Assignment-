<?php


if($_POST)
{
session_start();
include('Script/DBConnection.php');//include connectivity to Database

    $sid = $_POST['sid']; //post by javascript post method
    $play = $_POST['playlist'];

    $sql=" INSERT INTO playlist_song(P_NAME,SONG_ID) VALUES('$play','$sid')";//inserting playlist in Database playlist_song table
       $result1 = mysqli_query($con,$sql);
 }
  mysqli_close($con);
   echo $result1;
?>
