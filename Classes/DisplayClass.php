<?php

class DisplayClass  {

    public  $method=-1; // specifies mode
    public  $data;   // data that database has provided
    public  $head;    // heading english, hindi, punjabi
    public  $user;
    public  $userid;
    public  $like;
    public  $follow;

    private function IfLiked($song_id)
    {
       if (mysqli_num_rows($this->like) >0)
        {
                while($row =mysqli_fetch_assoc($this->like))
               {
                    $ssid=$row["SONG_ID"];
                  if($song_id==$ssid)
                  {
                      return 1;
                  }
               }
         }
        return 0;
    }

    private function IfFollowed($artist)
    {
       if (mysqli_num_rows($this->follow) >0)
        {
                while($row=mysqli_fetch_assoc($this->follow))
               {
                  if($artist==$row["ARTIST_NAME"])
                  {
                      return 1;
                  }
               }
         }
        return 0;
    }

    private function displayCard()
    {
        $res1=""; $res2=""; $res3=""; $res="";$itr=1;
        $width=180;
        $heigth=180;
        $flag=0;
         $useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
$flag=1;
}
        if($this->head=="English")
        {
        $num=mysqli_num_rows($this->data);
        if ($num>0)
        {
                  $res1="<h2 class=\"lsubhead\" >".$this->head."</h2>
                <div class=\"container-fluid center-block\" id=\"latest\">
                    <hr><div class=\"row\">
                <div class=\"cardContainer \">
                <div class=\"carousel slide \" id=\"theCarousel1\">
        <div class=\"carousel-inner\"> ";
                   while($row=mysqli_fetch_assoc($this->data))
               {
                  $enc = base64_encode($row["LOCATION"]);
                   $id= base64_encode($row["SONG_ID"]);
                        if($itr==1)
                        {
                           if($flag==0)
                           {
                            $res2=$res2."<div class=\"item active \" >
                            <div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\"></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                      </div> ";
                        }
                        else
                        {
                            $res2=$res2."<div class=\"item active \" >
                           <div class=\"col-sm-1 col-xs-1\"></div><div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\"></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                      </div> ";
                        }
                        }
                   else
                   {
                       $res2=$res2."
                       <div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\" ></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                        </div>";
                   }

                if($flag==1)
		{

                       if($itr%4==0&&$itr==4&&$itr!=$num)
                       {
                           $res2=$res2."</div>
                           <div class=\"item\">
                           <div class=\"item active\">
                           <div class=\"col-sm-1 col-xs-1\"></div>";
                       }
                       else if($itr%4==0&&$itr!=4&&$num!=$itr)
                       {
                           $res2=$res2."</div>
                           </div>
                           <div class=\"item\">
                           <div class=\"item active\">
                           <div class=\"col-sm-1 col-xs-1\"></div>";
                       }
                  }
                  else
                  {

                       if($itr%5==0&&$itr==5&&$itr!=$num)
                       {
                           $res2=$res2."</div>
                           <div class=\"item\">
                           <div class=\"item active\">";
                       }
                       else if($itr%5==0&&$itr!=5&&$num!=$itr)
                       {
                           $res2=$res2."</div>
                           </div>
                           <div class=\"item\">
                           <div class=\"item active\">";
                       }
                  }

                   $itr++;
                }
                if($flag==0)
                {
            if($itr<=6)
            {
                  $res3="</div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"prev\" style=\" height: 60px; width:60px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"next\" style=\" height: 60px; width:60px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\" ></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            else
            {
                      $res3="</div>
                  </div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"prev\" style=\" height: 60px; width:60px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"next\" style=\" height: 60px; width:60px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            }
            else
                     {
            if($itr<=5)
            {
                  $res3="</div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"prev\" style=\" height: 150px; width:150px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"next\" style=\" height: 150px; width:150px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\" ></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            else
            {
                      $res3="</div>
                  </div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"prev\" style=\" height: 150px; width:150px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel1\" data-slide=\"next\" style=\" height: 150px; width:150px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            }
            $res=$res1.$res2.$res3;
               }


        else { $res=$num;}
        }

        else if($this->head=="Punjabi")
        {
        $num=mysqli_num_rows($this->data);
        if ($num>0)
        {
                  $res1="<h2 class=\"lsubhead\" >".$this->head."</h2>
                <div class=\"container-fluid center-block\" id=\"latest\">
                    <hr><div class=\"row\">
                <div class=\"cardContainer \">
                <div class=\"carousel slide \" id=\"theCarousel2\">
        <div class=\"carousel-inner\"> ";
                   while($row=mysqli_fetch_assoc($this->data))
               {
                  $enc = base64_encode($row["LOCATION"]);
                   $id= base64_encode($row["SONG_ID"]);
                        if($itr==1)
                        {
                           if($flag==0)
                           {
                            $res2=$res2."<div class=\"item active \" >
                            <div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\"></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                      </div> ";
                        }
                        else
                        {
                            $res2=$res2."<div class=\"item active \" >
                           <div class=\"col-sm-1 col-xs-1\"></div><div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\"></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                      </div> ";
                        }
                        }
                   else
                   {
                       $res2=$res2."
                       <div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\" ></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                        </div>";
                   }

                if($flag==1)
		{

                       if($itr%4==0&&$itr==4&&$itr!=$num)
                       {
                           $res2=$res2."</div>
                           <div class=\"item\">
                           <div class=\"item active\">
                           <div class=\"col-sm-1 col-xs-1\"></div>";
                       }
                       else if($itr%4==0&&$itr!=4&&$num!=$itr)
                       {
                           $res2=$res2."</div>
                           </div>
                           <div class=\"item\">
                           <div class=\"item active\">
                           <div class=\"col-sm-1 col-xs-1\"></div>";
                       }
                  }
                  else
                  {

                       if($itr%5==0&&$itr==5&&$itr!=$num)
                       {
                           $res2=$res2."</div>
                           <div class=\"item\">
                           <div class=\"item active\">";
                       }
                       else if($itr%5==0&&$itr!=5&&$num!=$itr)
                       {
                           $res2=$res2."</div>
                           </div>
                           <div class=\"item\">
                           <div class=\"item active\">";
                       }
                  }

                   $itr++;
                }
                if($flag==0)
                {
            if($itr<=6)
            {
                  $res3="</div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"prev\" style=\" height: 60px; width:60px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"next\" style=\" height: 60px; width:60px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\" ></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            else
            {
                      $res3="</div>
                  </div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"prev\" style=\" height: 60px; width:60px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"next\" style=\" height: 60px; width:60px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            }
            else
                     {
            if($itr<=5)
            {
                  $res3="</div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"prev\" style=\" height: 150px; width:150px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"next\" style=\" height: 150px; width:150px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\" ></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            else
            {
                      $res3="</div>
                  </div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"prev\" style=\" height: 150px; width:150px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel2\" data-slide=\"next\" style=\" height: 150px; width:150px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            }
            $res=$res1.$res2.$res3;
               }
        else { $res=$num;}
        }

       else if($this->head=="Hindi")
        {
        $num=mysqli_num_rows($this->data);
        if ($num>0)
        {
                  $res1="<h2 class=\"lsubhead\" >".$this->head."</h2>
                <div class=\"container-fluid center-block\" id=\"latest\">
                    <hr><div class=\"row\">
                <div class=\"cardContainer \">
                <div class=\"carousel slide \" id=\"theCarousel3\">
        <div class=\"carousel-inner\"> ";
                   while($row=mysqli_fetch_assoc($this->data))
               {
                  $enc = base64_encode($row["LOCATION"]);
                   $id= base64_encode($row["SONG_ID"]);
                        if($itr==1)
                        {
                           if($flag==0)
                           {
                            $res2=$res2."<div class=\"item active \" >
                            <div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\"></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                      </div> ";
                        }
                        else
                        {
                            $res2=$res2."<div class=\"item active \" >
                           <div class=\"col-sm-1 col-xs-1\"></div><div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\"></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                      </div> ";
                        }
                        }
                   else
                   {
                       $res2=$res2."
                       <div class=\"card col-md-2 col-sm-2 col-xs-2\">
                        <div class=\"front\">
                        <a href='track.php?id=$id'><img src=\"".$row["IMG_LOCATION"]."\" height=\"$heigth\" width=\"$width\" ></a>
                        </div>
                        <div class=\"back\" id=\"cardtags\">
                             <h3>".$row["NAME"]."</h3>
                             <h8><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\" href=\"get.php?id=".$enc."\" >Download</a></h8>
                             <h8><a href='track.php?id=$id'>Track</a></h8>
                        </div>
                        </div>";
                   }

                if($flag==1)
		{

                       if($itr%4==0&&$itr==4&&$itr!=$num)
                       {
                           $res2=$res2."</div>
                           <div class=\"item\">
                           <div class=\"item active\">
                           <div class=\"col-sm-1 col-xs-1\"></div>";
                       }
                       else if($itr%4==0&&$itr!=4&&$num!=$itr)
                       {
                           $res2=$res2."</div>
                           </div>
                           <div class=\"item\">
                           <div class=\"item active\">
                           <div class=\"col-sm-1 col-xs-1\"></div>";
                       }
                  }
                  else
                  {

                       if($itr%5==0&&$itr==5&&$itr!=$num)
                       {
                           $res2=$res2."</div>
                           <div class=\"item\">
                           <div class=\"item active\">";
                       }
                       else if($itr%5==0&&$itr!=5&&$num!=$itr)
                       {
                           $res2=$res2."</div>
                           </div>
                           <div class=\"item\">
                           <div class=\"item active\">";
                       }
                  }

                   $itr++;
                }
                if($flag==0)
                {
            if($itr<=6)
            {
                  $res3="</div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"prev\" style=\" height: 60px; width:60px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"next\" style=\" height: 60px; width:60px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\" ></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            else
            {
                      $res3="</div>
                  </div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"prev\" style=\" height: 60px; width:60px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"next\" style=\" height: 60px; width:60px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            }
            else
                     {
            if($itr<=5)
            {
                  $res3="</div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"prev\" style=\" height: 150px; width:150px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"next\" style=\" height: 150px; width:150px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\" ></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            else
            {
                      $res3="</div>
                  </div>
                  </div>
                  <a class=\"left carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"prev\" style=\" height: 150px; width:150px;\" ><i class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></i></a>
        <a class=\"right carousel-control\" role=\"button\" href=\"#theCarousel3\" data-slide=\"next\" style=\" height: 150px; width:150px;\"><i class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></i></a>
                  </div>
                  </div>
                 </div><hr>
            </div>";
            }
            }
            $res=$res1.$res2.$res3;
               }


        else { $res=$num;}
            }


        return $res;

    }


    private function displayInfo()
    {
       $res="";
        $height=200;
        $width=180;

       // $res=mysqli_num_rows($this->data);
          if (mysqli_num_rows($this->data) > 0)
        {

                while($row = mysqli_fetch_assoc($this->data))
               {


                $enc = base64_encode($row["LOCATION"]);
                    $res=$res."<div class=\"container-fixed\"><div class=\"row\"><div class=\"col-md-3 col-sm-4 col-xs-4 \">
                     <img src=\"".$row["IMG_LOCATION"]."\" height=\"$height\" width=\"$width\" style=\"padding-top:20px; pointer-events:none;\">
                </div>
                <div class=\"col-md-8 col-xs-8 col-sm-8\">
                    <h3>".$row["NAME"]."</h3>
                    <ul class=\"dis\">
                     <li><a><h4>".$row["ARTIST1"]." ".$row["ARTIST2"]." ".$row["ARTIST3"]."</h1></a></li>
                     <li><a>".$row["RELEASE_DATE"]."</a></li>
                     <li><a>".$row["GENRE"]."</a></li>
                    </ul>
                    <audio src= \"".$row["LOCATION"]."\" preload=\"none\"></audio>
                    <br>
                      <ul class=\"diss\">
                     <li class=\"btn btn-primary\" ><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\"  href=\"get.php?id=".$enc."\" >Download ".$row["SIZE"]."</a></li><li>   <label style=\"padding-left:5px !important; color:black !important;\" id=\"downloads".$row["SONG_ID"]."\">".$row["DOWNLOADS"]."</label></li>";

            if($this->user==1) {
             $res=$res."<li style=\"padding-left:10px !important;\"><label class=\"btn btn-primary\"  onclick=\"LikeSong('".$row["SONG_ID"]."','".$this->userid."')\" id=\"like".$row["SONG_ID"]."\" >";
                     if($this->IfLiked($row["SONG_ID"])==1) {$res=$res."Unlike</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"likes".$row["SONG_ID"]."\" >".$row["LIKES"]."</label> </li>";} else{$res=$res."Like </label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"likes".$row["SONG_ID"]."\" >".$row["LIKES"]."</label> </li>";}

                     $res=$res."<li style=\"padding-left:10px !important;\"><label  class=\"btn btn-primary\"  onclick=\"FollowSong('".$row["SONG_ID"]."','".$this->userid."','".$row["ARTIST1"]."')\" id=\"follow".$row["SONG_ID"]."\">";
                     if($this->IfFollowed($row["ARTIST1"])==1){ $res=$res."Unfollow</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"follows".$row["SONG_ID"]."\">".$row["FOLLOWERS"]."</label></li>";}else{ $res=$res."Follow</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"follows".$row["SONG_ID"]."\">".$row["FOLLOWERS"]."</label></li>";}
                     $res=$res." <li class=\"dropdown\"><button class=\"btn btn-primary\" onclick=\"CreatePlay('".$row["SONG_ID"]."')\"  id=\"".$row["SONG_ID"]."\" >Add To Playlist</button><div id=\"myDropdown1\" class=\"  dropdown-content\" style=\" color: #fff !important;   width: 100%; !important; left-padding:30px;   background: rgba(20,20,20,0.7); !important;\"></div></li>" ;
                        }
                   else{
                       $res=$res."<li style=\"padding-left:10px !important; \"><label class=\"btn btn-primary\"  id=\"like".$row["SONG_ID"]."\"
                       data-toggle=\"modal\" data-target=\"#login-modal1\">Like</li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"likes".$row["SONG_ID"]."\" >".$row["LIKES"]."</label> </li>";
                      $res=$res."<li style=\"padding-left:10px !important;\"><label  class=\"btn btn-primary\"  id=\"follow".$row["SONG_ID"]."\"  data-toggle=\"modal\" data-target=\"#login-modal1\" >Follow</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"follows".$row["SONG_ID"]."\">".$row["FOLLOWERS"]."</label></li>";
                                            $res=$res."<li style=\"padding-left:10px !important;\"><label  class=\"btn btn-primary\"  id=\"".$row["SONG_ID"]."\"  data-toggle=\"modal\" data-target=\"#login-modal1\"  >Add To Playlist</label></li>";
                   }

                   $res=$res."
                    <hr>
                    </div>
                </div>
            </div>";

               }
         }

        else {  $res="0"; }

        return $res;

    }


    public function gun()
    {   //method for displaying the content; the array of info.
        $res="";
        if($this->method==1)
        {
         $res=$this->displayCard();
            return $res;
        }
        else if($this->method==2)
        {
          $res=$this->displayInfo();
            return $res;
        }
        else if($this->method==3) //flag =3 for showing playlist songs
        {
          $res=$this->DisplayPlay();
            return $res;
        }

    }
    public function showplaylist() //method to show list of playlists
    {
    require("DBConnection.php");
    $result="";
    $i=0;
    		session_start();
    		$mail = $_SESSION['email'];
    	 $sql="SELECT * FROM playlist WHERE EMAIL='$mail' OR SHARE = 1 "; //Select those playlists that are shared or user created
          $res=mysqli_query($con,$sql);
           if(mysqli_num_rows($res)>0)
        {
             while($row=mysqli_fetch_assoc($res))
               {
               		$arr = explode("@", $row['EMAIL'], 2); //get username from email id
			$first = $arr[0];
      //Creating HTML Code to be returned for lists of playlists (shared) for shared playlists
			if($i==0&&$row["SHARE"]==0)
               		{
               		$result = $result."<h3 style=\"color:Steelblue;\">All Playlists</h3>";
               		$result = $result."<hr><a href='ShowPlaylist.php?id=".$row['P_NAME']."'>".$row['P_NAME']."(".$row['TAG'].") - by ".$first." </a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"RemovePlaylist('".$row["P_NAME"]."')\"  >Remove</a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"SharePlaylist('".$row["P_NAME"]."')\"  >Share</a><hr>" ;
               		}
               		else if($i==0&&$row["SHARE"]==1)
               		{
               		$result = $result."<h3 style=\"color:Steelblue;\">All Playlists</h3>";
               		$result = $result."<hr><a href='ShowPlaylist.php?id=".$row['P_NAME']."'>Shared Playlist-".$row['P_NAME']."(".$row['TAG'].") - by ".$first." </a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"RemovePlaylist('".$row["P_NAME"]."')\"  >Remove</a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"SharePlaylist('".$row["P_NAME"]."')\"  >Share</a><hr>" ;
               		}
               		if($row["SHARE"]==0&&$i!=0)
               		{
               		$result = $result."<hr><a href='ShowPlaylist.php?id=".$row['P_NAME']."'>".$row['P_NAME']."(".$row['TAG'].") - by ".$first." </a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"RemovePlaylist('".$row["P_NAME"]."')\"  >Remove</a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"SharePlaylist('".$row["P_NAME"]."')\"  >Share</a><hr>" ;
               		}
               		else if($row["SHARE"]==1&&$i!=0)
               		{
               		$result = $result."<hr><a href='ShowPlaylist.php?id=".$row['P_NAME']."'>Shared Playlist-".$row['P_NAME']."(".$row['TAG'].") - by ".$first." </a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"RemovePlaylist('".$row["P_NAME"]."')\"  >Remove</a>&nbsp;&nbsp;<a class=\"btn btn-primary\" onclick=\"SharePlaylist('".$row["P_NAME"]."')\"  >Share</a><hr>" ;
               		}

               		$i++;
               }
        }
        else
        {
        		$result="No Playlists to Show";
        }
        return $result;
    }
     private function DisplayPlay()//Method to display song of playlist
    {
           $res="";
        $height=200;
        $width=180;

       // $res=mysqli_num_rows($this->data);
          if (mysqli_num_rows($this->data) > 0)
        {
//Below Whole code is to display the song ---the Components that are displayed(Buttons,Picture,etc)
                while($row = mysqli_fetch_assoc($this->data))
               {


                $enc = base64_encode($row["LOCATION"]);
                    $res=$res."<div class=\"container-fixed\"><div class=\"row\"><div class=\"col-md-3 col-sm-4 col-xs-4 \">
                     <img src=\"".$row["IMG_LOCATION"]."\" height=\"$height\" width=\"$width\" style=\"padding-top:20px; pointer-events:none;\">
                </div>
                <div class=\"col-md-8 col-xs-8 col-sm-8\">
                    <h3>".$row["NAME"]."</h3>
                    <ul class=\"dis\">
                     <li><a><h4>".$row["ARTIST1"]." ".$row["ARTIST2"]." ".$row["ARTIST3"]."</h1></a></li>
                     <li><a>".$row["RELEASE_DATE"]."</a></li>
                     <li><a>".$row["GENRE"]."</a></li>
                    </ul>
                    <audio src= \"".$row["LOCATION"]."\" preload=\"none\"></audio>
                    <br>
                      <ul class=\"diss\">
                     <li class=\"btn btn-primary\" ><a onclick=\"DownloadSong('".$row["SONG_ID"]."')\"  href=\"get.php?id=".$enc."\" >Download ".$row["SIZE"]."</a></li><li>   <label style=\"padding-left:5px !important; color:black !important;\" id=\"downloads".$row["SONG_ID"]."\">".$row["DOWNLOADS"]."</label></li>";

            if($this->user==1) {
             $res=$res."<li style=\"padding-left:10px !important;\"><label class=\"btn btn-primary\"  onclick=\"LikeSong('".$row["SONG_ID"]."','".$this->userid."')\" id=\"like".$row["SONG_ID"]."\" >";
                     if($this->IfLiked($row["SONG_ID"])==1) {$res=$res."Unlike</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"likes".$row["SONG_ID"]."\" >".$row["LIKES"]."</label> </li>";} else{$res=$res."Like </label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"likes".$row["SONG_ID"]."\" >".$row["LIKES"]."</label> </li>";}

                     $res=$res."<li style=\"padding-left:10px !important;\"><label  class=\"btn btn-primary\"  onclick=\"FollowSong('".$row["SONG_ID"]."','".$this->userid."','".$row["ARTIST1"]."')\" id=\"follow".$row["SONG_ID"]."\">";
                     if($this->IfFollowed($row["ARTIST1"])==1){ $res=$res."Unfollow</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"follows".$row["SONG_ID"]."\">".$row["FOLLOWERS"]."</label></li>";}else{ $res=$res."Follow</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"follows".$row["SONG_ID"]."\">".$row["FOLLOWERS"]."</label></li>";}



$res=$res."<li style=\"padding-left:10px; \"><button  class=\"btn btn-primary\"  onclick=\"RemoveSong('".$row["SONG_ID"]."')\">Remove</button></li>";
                        }
                   else{
                       $res=$res."<li style=\"padding-left:10px !important; \"><label class=\"btn btn-primary\"  id=\"like".$row["SONG_ID"]."\"
                       data-toggle=\"modal\" data-target=\"#login-modal1\">Like</li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"likes".$row["SONG_ID"]."\" >".$row["LIKES"]."</label> </li>";
                      $res=$res."<li style=\"padding-left:10px !important;\"><label  class=\"btn btn-primary\"  id=\"follow".$row["SONG_ID"]."\"  data-toggle=\"modal\" data-target=\"#login-modal1\" >Follow</label></li><li><label style=\"padding-left:5px !important; color:black !important;\" id=\"follows".$row["SONG_ID"]."\">".$row["FOLLOWERS"]."</label></li>";
                                            $res=$res."<li style=\"padding-left:10px !important;\"><label  class=\"btn btn-primary\"  id=\"".$row["SONG_ID"]."\"  data-toggle=\"modal\" data-target=\"#login-modal1\"  >Add To Playlist</label></li>";
                   }

                   $res=$res."
                    <hr>
                    </div>
                </div>
            </div>";

               }
         }

        else {  $res="0"; }//if there is no match

        return $res;
    }


}
?>
