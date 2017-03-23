<?php
    if($_POST)
    {
    include('Script/DBConnection.php');
    $pname=$_POST['pname'];
        //To set flag for playlist in table to share it       

    $sql1=" UPDATE playlist  set SHARE=1 where P_NAME='$pname'";
    $r1=mysqli_query($con,$sql1);

    mysqli_close($con);
   if($r1==true )
    { echo 1;}
     else{echo 0;}

        exit;
    }

?>
