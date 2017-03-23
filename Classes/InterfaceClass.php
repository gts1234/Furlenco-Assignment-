<?php
class InterfaceClass{

   public function showLatest()
   {
       include('DBConnection.php');
       //include('DisplayClass.php');

       // creating objects of display class
       $obj1 = new DisplayClass();
       $obj2 = new DisplayClass();
       $obj3 = new DisplayClass();
       // initializing method to 1
       $obj1->method=1; $obj2->method=1; $obj3->method=1;
       //give headings
       $obj1->head='English'; $obj2->head='Hindi'; $obj3->head='Punjabi';
       //making queries
       $sql1=" SELECT * from latest WHERE TYPE='ENGLISH' order by RELEASE_DATE desc;";
       $sql2=" SELECT * from latest WHERE TYPE='HINDI' order by RELEASE_DATE desc;";
       $sql3=" SELECT * from latest WHERE TYPE='PUNJABI' order by RELEASE_DATE desc;";
       $result1 = mysqli_query($con,$sql1);
       $result2 = mysqli_query($con,$sql2);
       $result3 = mysqli_query($con,$sql3);
       $obj1->data=$result1; $obj2->data=$result2; $obj3->data=$result3;
       $num1=mysqli_num_rows($result1);
       $num2=mysqli_num_rows($result2);
       $num3=mysqli_num_rows($result3);

       // executing threads
       if($num1>0)
       { $res1=$obj1->gun();   }
       else{$res1="<br><hr><h1>No results for English Songs</h1>";}
       if($num2>0)
       { $res2=$obj2->gun();   }
       else{$res2="<br><hr><h1>No results for Hindi Songs</h1>";}
       if($num3>0)
       { $res3=$obj3->gun();   }
       else{$res3="<br><hr><h1>No results for Punjabi Songs</h1>";}

       $res=$res1.$res2.$res3;
       mysqli_close($con);
       return $res;
   }
    public function showPopularSearches()
   {
       include('DBConnection.php');
       //include('DisplayClass.php');

       // creating objects of display class
       $obj1 = new DisplayClass();
       $obj2 = new DisplayClass();
       $obj3 = new DisplayClass();
       // initializing method to 1
       $obj1->method=1; $obj2->method=1; $obj3->method=1;
       //give headings
       $obj1->head='English'; $obj2->head='Hindi'; $obj3->head='Punjabi';
       //making queries
       $sql1=" SELECT * from popularsearches WHERE TYPE='ENGLISH';";
       $sql2=" SELECT * from popularsearches WHERE TYPE='HINDI'";
       $sql3=" SELECT * from popularsearches WHERE TYPE='PUNJABI'";
       $result1 = mysqli_query($con,$sql1);
       $result2 = mysqli_query($con,$sql2);
       $result3 = mysqli_query($con,$sql3);
       $obj1->data=$result1; $obj2->data=$result2; $obj3->data=$result3;
       // executing threads
       $num1=mysqli_num_rows($result1);
       $num2=mysqli_num_rows($result2);
       $num3=mysqli_num_rows($result3);

       // executing threads
       if($num1>0)
       { $res1=$obj1->gun();   }
       else{$res1="<br><hr><h1>No results for English Songs</h1>";}
       if($num2>0)
       { $res2=$obj2->gun();   }
       else{$res2="<br><hr><h1>No results for Hindi Songs</h1>";}
       if($num3>0)
       { $res3=$obj3->gun();   }
       else{$res3="<br><hr><h1>No results for Punjabi Songs</h1>";}

       $res=$res1.$res2.$res3;
       mysqli_close($con);
       return $res;
   }

     public function showPopular()
   {
       include('DBConnection.php');
       //include('DisplayClass.php');
       $userid="";

       if(isset($_SESSION["bool"]))
       {
           if($_SESSION["bool"]==1){
             $userid=$_SESSION["user"];
           }
       }


       // creating objects of display class
       $obj1 = new DisplayClass();
       if($userid!="")
       {  $obj1->user=1;
          $obj1->userid=$userid;
          $likesql="select SONG_ID from user_likes where USER_ID='$userid';";
          $followsql="select ARTIST_NAME from user_follow where FOLLOWER_ID='$userid';";
          $likes=mysqli_query($con,$likesql);
          $follows=mysqli_query($con,$followsql);
          $obj1->like=$likes;
          $obj1->follow=$follows;
       }

       // initializing method to 2
       $obj1->method=2;
       //give headings no head
       $obj1->head='';
       //making queries
       $sql1="SELECT * from popular;";

       $result1 = mysqli_query($con,$sql1);
       $obj1->data=$result1;
       // executing thread
       $res=$obj1->gun();
       //$res=mysqli_num_rows($result1);
       mysqli_close($con);
       return $res;
   }

     public function showTop()
   {
        include('DBConnection.php');
        //include('DisplayClass.php');

       // creating objects of display class
       $obj1 = new DisplayClass();
       $obj2 = new DisplayClass();
       $obj3 = new DisplayClass();
       // initializing method to 1
       $obj1->method=1; $obj2->method=1; $obj3->method=1;
       //give headings
       $obj1->head='English'; $obj2->head='Hindi'; $obj3->head='Punjabi';
       //making queries
       $sql1="SELECT * from song WHERE TYPE='ENGLISH';";
       $sql2="SELECT * from song WHERE TYPE='HINDI';";
       $sql3="SELECT * from song WHERE TYPE='PUNJABI';";
       $result1 = mysqli_query($con,$sql1);
       $result2 = mysqli_query($con,$sql2);
       $result3 = mysqli_query($con,$sql3);
       $obj1->data=$result1; $obj2->data=$result2; $obj3->data=$result3;

      $num1=mysqli_num_rows($result1);
      $num2=mysqli_num_rows($result2);
      $num3=mysqli_num_rows($result3);


       if($num1>0)
       { $res1=$obj1->gun();   }
       else{$res1="<br><hr><h1>No results for English Songs</h1>";}
       if($num2>0)
       { $res2=$obj2->gun();   }
       else{$res2="<br><hr><h1>No results for Hindi Songs</h1>";}
       if($num3>0)
       { $res3=$obj3->gun();   }
       else{$res3="<br><hr><h1>No results for Punjabi Songs</h1>";}

       $res=$res1.$res2.$res3;
       mysqli_close($con);
       return $res;
   }

     public function showEverything()
   {
       include('DBConnection.php');
       //include('DisplayClass.php');

       // creating objects of display class
       $obj1 = new DisplayClass();
       $obj2 = new DisplayClass();
       $obj3 = new DisplayClass();
       // initializing method to 1
       $obj1->method=1; $obj2->method=1; $obj3->method=1;
       //give headings
       $obj1->head='English'; $obj2->head='Hindi'; $obj3->head='Punjabi';
       //making queries
       $sql1=" SELECT * from song WHERE TYPE='ENGLISH';";
       $sql2=" SELECT * from song WHERE TYPE='HINDI';" ;
       $sql3=" SELECT * from song WHERE TYPE='PUNJABI';";
       $result1 = mysqli_query($con,$sql1);  $result2 = mysqli_query($con,$sql2);  $result3 = mysqli_query($con,$sql3); ;
       $obj1->data=$result1; $obj2->data=$result2; $obj3->data=$result3;
       // executing threads
       $num1=mysqli_num_rows($result1);
       $num2=mysqli_num_rows($result2);
       $num3=mysqli_num_rows($result3);

       // executing threads
       if($num1>0)
       { $res1=$obj1->gun();   }
       else{$res1="<br><hr><h1>No results for English Songs</h1>";}
       if($num2>0)
       { $res2=$obj2->gun();   }
       else{$res2="<br><hr><h1>No results for Hindi Songs</h1>";}
       if($num3>0)
       { $res3=$obj3->gun();   }
       else{$res3="<br><hr><h1>No results for Punjabi Songs</h1>";}

       $res=$res1.$res2.$res3;
       mysqli_close($con); return $res;

   }

     public function showTrack($song_id)
   {
       include('DBConnection.php');
       $obj1 = new DisplayClass();
       $userid="";

        if(isset($_SESSION["bool"]))
       {
           if($_SESSION["bool"]==1)
           {
             $userid=$_SESSION["user"];
           }
       }

       // creating objects of display class
       $obj1 = new DisplayClass();
       if($userid!="")
       {
          $obj1->user=1;
          $obj1->userid=$userid;
          $likesql="select SONG_ID from user_likes where USER_ID='$userid';";
          $followsql="select ARTIST_NAME from user_follow where FOLLOWER_ID='$userid';";
          $likes=mysqli_query($con,$likesql);
          $follows=mysqli_query($con,$followsql);
          $obj1->like=$likes;
          $obj1->follow=$follows;
       }
        // initializing method to 2
       $obj1->method=2;
       //making queries
       $sql1=" SELECT * from song WHERE SONG_ID='$song_id';";
       $result1 = $con->query($sql1);
       $obj1->data=$result1;
       $res=$obj1->gun();
       mysqli_close($con);
       return $res;
   }
     public function showPlaylistTrack($song_id)//From interface class to Display Class while displaying playlist track
   {
       include('DBConnection.php');
       $obj1 = new DisplayClass();
       $userid="";

        if(isset($_SESSION["bool"]))//if session is set
       {
           if($_SESSION["bool"]==1)
           {
             $userid=$_SESSION["user"];
           }
       }

       // creating objects of display class
       $obj1 = new DisplayClass();
       if($userid!="")
       {
          $obj1->user=1;
          $obj1->userid=$userid;
          $likesql="select SONG_ID from user_likes where USER_ID='$userid';";
          $followsql="select ARTIST_NAME from user_follow where FOLLOWER_ID='$userid';";
          $likes=mysqli_query($con,$likesql);
          $follows=mysqli_query($con,$followsql);
          $obj1->like=$likes;
          $obj1->follow=$follows;
       }

       $obj1->method=3;     //for song display method flag =3
       //making queries
       $sql1=" SELECT * from song WHERE SONG_ID='$song_id';";   //then selecting songs from song table using song ids
       $result1 = $con->query($sql1);
       $obj1->data=$result1;
       $res=$obj1->gun();
       mysqli_close($con);
       return $res; //returning result to main page
   }

    public function showPlaylist()
   {
       include('DBConnection.php');
       //include('DisplayClass.php');
       $userid="";

        if(isset($_SESSION["bool"]))
       {
           if($_SESSION["bool"]==1){
             $userid=$_SESSION["user"];
           }

       }


       // creating objects of display class
       $obj1 = new DisplayClass();

          $obj1->user=1;
          $obj1->userid=$userid;
          $likesql="select SONG_ID from user_likes where USER_ID='$userid';";
          $followsql="select ARTIST_NAME from user_follow where FOLLOWER_ID='$userid';";
          $likes=mysqli_query($con,$likesql);
          $follows=mysqli_query($con,$followsql);
          $obj1->like=$likes;
          $obj1->follow=$follows;


       // initializing method to 2
       $obj1->method=2;
       //give headings no head
       $obj1->head='';
       //making queries
       $sql1="SELECT  sg.SONG_ID ,sg.NAME,sg.ARTIST1, sg.ARTIST2 ,sg.ARTIST3 ,sg.LOCATION ,sg.GENRE , sg.RELEASE_DATE ,sg.LIKES, sg.FOLLOWERS ,sg.DOWNLOADS ,sg.ALBUM_NAME, sg.IMG_LOCATION, sg.SIZE, sg.TYPE from song as sg, user_likes as ul  where ul.USER_ID='$userid' and ul.SONG_ID=sg.SONG_ID;";

       $result1 = mysqli_query($con,$sql1);
       $obj1->data=$result1;

        if(mysqli_num_rows($result1)>0){
             $res=$obj1->gun();
        }
        else{
            $res="0";
        }
       // executing thread

       mysqli_close($con);
       return $res;
   }

     public function showUploads()
   {
       include('DBConnection.php');
       //include('DisplayClass.php');
       $userid="";

        if(isset($_SESSION["bool"]))
       {
           if($_SESSION["bool"]==1){$userid=$_SESSION["user"];}
       }
       // creating objects of display class
       $obj1 = new DisplayClass();
         $res="";

          $obj1->user=1;
          $obj1->userid=$userid;
          $likesql="select SONG_ID from user_likes where USER_ID='$userid';";
          $followsql="select ARTIST_NAME from user_follow where FOLLOWER_ID='$userid';";
          $likes=mysqli_query($con,$likesql);
          $follows=mysqli_query($con,$followsql);
          $obj1->like=$likes;
          $obj1->follow=$follows;


       // initializing method to 2
       $obj1->method=2;
       //give headings no head
       $obj1->head='';
       //making queries
      $sql1="SELECT  sg.SONG_ID ,sg.NAME,sg.ARTIST1, sg.ARTIST2 ,sg.ARTIST3 ,sg.LOCATION ,sg.GENRE , sg.RELEASE_DATE ,sg.LIKES, sg.FOLLOWERS ,sg.DOWNLOADS ,sg.ALBUM_NAME, sg.IMG_LOCATION, sg.SIZE, sg.TYPE from song as sg, uploads as ul  where ul.USER_ID='$userid' and ul.SONG_ID=sg.SONG_ID;";

       $result1 = mysqli_query($con,$sql1);
       $obj1->data=$result1;
        if(mysqli_num_rows($result1)>0)
        {
             $res=$obj1->gun();
        }
         else{
             $res="0";
         }
       mysqli_close($con);
       return $res;
   }

    public function UploadForm($song_id,$name,$artist1,$artist2,$artist3,$album,$genre,$composer,$publisher,$rlabel,$iswc,$isrc,$date,$pline,$song_path,$image_path,$radio,$band,$update,$size)
	{
        if($size>(1024*1024))
        {
            $size = $size/(1024*1024) ;
            $size= round($size, 2);
            $size = (string)($size);
            $size = $size." Mb";
        }
        else if($size>1024)
        {
            $size = $size/(1024) ;
            $size= round($size, 2);
            $size = (string)($size);
            $size = $size." Kb";
        }
        else
        {
            $size= round($size, 2);
            $size = (string)($size);
            $size = $size." B";
        }
		include("DBConnection.php");

        $res3=0;
		$res1 = mysqli_query($con,"INSERT INTO song(NAME,LOCATION,ARTIST1,ARTIST2,ARTIST3,GENRE,RELEASE_DATE,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,UPDATED) VALUES('$name','$song_path','$artist1','$artist2','$artist3','$genre','$date','$album','$image_path','$size','$song_id','$radio',$update)" );
       $res2 = mysqli_query($con,"INSERT INTO song_info(SONG_ID,COMPOSER,PUBLISHER,LABEL,ISWC,ISRC,PLINE,BAND) VALUES('$song_id','$composer','$publisher','$rlabel','$iswc','$isrc','$pline','$band')");

            $userid = $_SESSION["user"];
            $res3 = mysqli_query($con,"INSERT INTO uploads(USER_ID,SONG_ID) VALUES('$userid','$song_id')");

		if($res1==1 && $res2==1 && $res3==1)
        {
            return 1;

        }
        else
        {
            return 0;
        }
	}

    function MakeTrie($str,$flag){


    }
}

?>
