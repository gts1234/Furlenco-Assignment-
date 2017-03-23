<?php
    if($_POST)
    {
    include('DBConnection.php');
    $pname=$_POST['pname'];//playlist name


    $sql1=" DELETE from playlist where P_NAME='$pname'"; //table where playlists are stored
    $r1=mysqli_query($con,$sql1);
    $sql2=" DELETE from playlist_song where P_NAME='$pname'"; //table where corresponding songs to playlists are added
    $r2=mysqli_query($con,$sql2);
    mysqli_close($con);
   if($r1==true && r2==true)
    { echo 1;}
     else{echo 0;}

        exit;
    }

?>
