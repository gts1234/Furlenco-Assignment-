<?php
    if($_POST)
    {
    include('Script/DBConnection.php');
    $songid=$_POST['songid'];

          //delete song from given playlist
    $sql2=" DELETE from playlist_song where SONG_ID ='$songid'";
    $r2=mysqli_query($con,$sql2);
    mysqli_close($con);
   if(r2==true)
    { echo 1;}
     else{echo 0;}

        exit;
    }

?>
