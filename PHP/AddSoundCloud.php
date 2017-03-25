<?php
    if($_POST)
    {

    include('DBConnection.php');
    $pname=$_POST['pname'];
    $songid=$_POST['songid'];
    $flag=$_POST['fl'];

        //flag=0 is for soundcloud music addition and 1 for youtube music embedding       
    if($flag == 0)
    {
    $sql1="INSERT into soundcloud(P_NAME,SONG_ID) values('$pname','$songid')";
    }
    else
    {
    $sql1="INSERT into youtube(P_NAME,SONG_ID) values('$pname','$songid')";
    }
    $r1=mysqli_query($con,$sql1);
    mysqli_close($con);
   if($r1==true)
    { echo 1;}
     else{echo 0;}

        exit;
    }

?>
