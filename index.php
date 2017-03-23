
<?php
session_start();
//$_SESSION['boolean'] = 1;https://www.youtube.com/watch?v=f_Wge_meqzMS
if(!isset($_SESSION['bool']))
{
$_SESSION['bool']="";
$_SESSION['user']="";
$_SESSION['user_name']="";
$_SESSION['image_path']="null";
$_SESSION['song_path']="null";
$_SESSION['song_check']="null";
$_SESSION['admin']="";
$_SESSION['email']="";
}
$_SESSION['song_check']="null";

?>


<!DOCTYPE html>
    <html>
         <head>
         <meta charset="utf-8">
          <meta http-uquiv="X-UA-Compatible" content="IE=edge,chrome=1">
             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
             <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
             <script src="bootstrap/js/bootstrap.js"></script>
			 <script src="Javascript/slider.js"></script>
             <script src="Javascript/TrackActivity.js"></script>
             <script src="Javascript/DownloadActivity.js"></script>
             <script src="Javascript/LikeActivity.js"></script>
             <script src="Javascript/FollowActivity.js"></script>
             <script src="Javascript/util.js"></script>
        ////////////////////////////
 <script>
 function fblogin()///Facebook Login Integration Plugin
 {

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1301211466626917',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8',
      scope      :'email',
      status     : true
    });
     $(document).trigger('fbload');
    FB.AppEvents.logPageView();
  };


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   	 $(document).on(
    'fbload',  //  <---- HERE'S OUR CUSTOM EVENT BEING LISTENED FOR
    function(){
        //some code that requires the FB object
        //such as...

        FB.getLoginStatus(function(res){			
            if( res.status == "connected" ){

                FB.api('/me',{fields: 'name,email'}, function(fbUser) {
                var email = fbUser.email ;
                var user = fbUser.name;

               //Session variables to be set in my server by posting to php
               $.post("PHP/setvar.php", {req:email,name:user},function(data) ///this is to set session variables in setvar.php for fb user
                          {

                          location.reload(true); //refresh the page
                          });



                });
            }
        },true);

    }
);
}
</script>
/////////////////////////////////////////////////////////// FB LOGIN INTEGRATION ENDS HERE

             <title>RollSide Music-Hear the World</title>
             <link rel="shortcut icon" href="Images/rollside.ico" >
             <link rel="stylesheet" href="CSS/main.css">
             <link rel="stylesheet" href="CSS/popup.css">
             <link rel="stylesheet" href="CSS/later.css">
             <link rel="stylesheet" href="CSS/downStyle.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        </head>

        <body class="body">



            <div id="heading"  >
                <header>

                    <nav>
                        <a href="index.php"><img src="Images/lg2.gif" ></a>
                      <ul class="main_menu register">
                          <li><a href="index.php">Home</a></li>
                          <li><a href="about.php">About</a></li>
                          <li><a href="upload.php">Upload</a></li>
                          <li><a href="popular.php">Popular</a></li>

                         <?php if(isset($_SESSION["bool"])){ if($_SESSION["bool"]==1){ echo "<li><a><input type=\"submit\" name=\"logout\" id=\"logging\" class=\"btn btn-primary\" value=\"Log Out\"></a></li>";}

                        else{ echo  "<li><a href=\"#\" class=\"btn btn-primary \"  data-toggle=\"modal\" data-target=\"#login-modal1\">Sign In</a></li>";} }?>

                 <script type="text/javascript">
                    $("#logging").click(function(){
                    $.post("PHP/Script/LogOut.php", {opt:"logout"},function(data)
                          {  data=data.trim();
                          if(data=="Logged Out")
                              { location.reload(true);  }
                      });
                     })
                    </script>



<div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"            style="display: none;">
    	  <div class="modal-dialog wert">
				<div class="loginmodal-container">
					<h1>Sign In to Your Account</h1><br>
				  <form method="post" id="signform" onsubmit="return validate()">
					<input type="text" name="loginMail" placeholder="Email" required="required" style="color:black;">
					<input type="password" name="pass" placeholder="Password" required="required" style="color:black;">
					<input type="submit"  id="SignIn"   class="login loginmodal-submit" value="Login">
				  </form>

                    <script type="text/javascript">
                    $("#SignIn").click(function(){
                    $.post("PHP/Script/SignIn.php",$("#signform").serialize()).done(function(resp,status){
                   var label= document.getElementById('signMsg');
                    label.innerHTML=resp;
                        resp=resp.trim();
                          if(resp=="Login Successful")
                              {
                                label.style.color="green";
                                location.reload(true);
                              }
                          else{

                              label.style.color="red";
                          }

                      });
                     })
                    </script>
                   <label id="signMsg"></label>
				  <div class="login-help">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>

					  <a href="resetpass.php" class="down">Forgot Password</a>
			     		 	                      		<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false"   onclick="fblogin();" >login</div>
				  </div>
				</div>
			</div>
 </div></li>

                         <li><a href="#" class="btn btn-primary "  data-toggle="modal" data-target="<?php if(isset($_SESSION["bool"])){if($_SESSION["bool"]==1){echo "#msg-modal";}else{echo "#login-modal2";}}?>">Create Account</a> </li>
<div class="modal fade" id="login-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Create New Account</h1><br>
				  <form method="post" id="Accountform" onsubmit="return validate()">
                    <input type="text" name="name"  placeholder="Name" value="" style="color:black;">
                    <input type="text" name="email" placeholder="Email" value="" style="color:black;">
					<input type="password" name="pass1" placeholder="Password" value="" style="color:black;">
                    <input type="password" name="pass2" placeholder="Repeat Password" value="" style="color:black;">
					<input type="submit" id="CreateAccount" class="login loginmodal-submit" value="Create Account">
                 </form>

                    <script type="text/javascript">
                    $("#CreateAccount").click(function(){
                    $.post("PHP/Script/CreateAccount.php",$("#Accountform").serialize()).done(function(resp,status){
                       resp=resp.trim();
                        var label= document.getElementById('accMsg');
                   label.innerHTML=resp;
                        if(resp=="Successfully registered, you may login now"){
                           label.style.color="green";
                           }
                           else{
                           label.style.color="red";
                           }
                       });
                     })
                    </script>
                    <label id="accMsg"></label>
                    <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
				</div>
			</div>
 </div>
          <div class="modal fade" id="msg-modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title" style="text-align:left  !important">Message</h2>
        </div>
        <div class="modal-body">
          <h4 style="color:red; text-align:left !important;">You Need to Log Out first to create a new account.</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
            </ul>

                    <div class="container-fluid ">
	                      <div class="row">
                              <div class="col-md-9 ">  </div>
                              <div class="col-md-3 " style="text-align:right !important;">

                        <?php if(isset($_SESSION["user_name"])){if($_SESSION["user_name"]!="")
                        { echo "<div class=\"dropdown usrll\">
                        <label class=\" dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" style=\"padding-top: 15px;\" ><a style=\"color: aliceblue;  font-family: sans-serif;    font-size: 15px;\" href=\"#\">".$_SESSION['user_name']."  "."<span class=\"glyphicon glyphicon-user\"></span></a></label>

                        <ul class=\"dropdown-menu usrlist\" >
                        <li><a href=\"register.php\">Upload New</a></li>
                        <li><a href=\"Myplaylist.php\">Playlist</a></li>
                        <li><a href=\"myuploads.php\">My Uploads</a></li>
                        <li><a href=\"user.php\">Change Password</a></li>
                        </ul>

                        </div>"; }}  ?>


                              </div>
                        </div>
                    </div>







                    <div>
                         <div id="textslider">
                             <div>
                                 <p>Whatever it is, its free.<br>Join the new Club, Download and upload music</p>
                             </div>
                             <div>
                                 <p>Feel free to look.. Go ahead.<br>Its all about love for music. Just listen this stuff.</p>
                             </div>
                             <div>
                                 <p>Go to our Latest section.<br>Download and listen the music you love.</p>
                             </div>
                             <div>
                                 <p>Feel free roam around.<br>Its a world full of sounds, music.. so enjoy them</p>
                             </div>
                             <div>
                                 <p>Listen your favorite Artists..<br>Check out the updates in the music world and lates happenings ..</p>
                             </div>
                          </div>

                        <script>
                            $("#textslider div:gt(0)").hide();
                            setInterval(function(){
                                $("#textslider div:first").fadeOut(0).next().fadeIn(1000).end().appendTo('#textslider');
                            },6000);
                        </script>

                        </div>
                   </nav>

        <div><a href="latest.php" class="btn btn-primary center-block btn-xl" data-target="#latest"  >Go to Latest</a></div>


<div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container">
               <div class="input-group stylish-input-group">
                   <input type="text" name="search" id="search" class="form-control"  placeholder="Search for Tracks, Albums, Bands, Artists ..." >
                    <span class="input-group-addon">
                         <a id="searching" href="">
                            <span class="glyphicon glyphicon-search"></span>
                         </a>
                     </span>
                </div>
            </div>
        </div>
     </div>
</div>


<div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div id="searchresult">

          </div>
      </div>
   </div>
</div>
                 <script type="text/javascript">

                    $('#search').on('input',function(e){
                        var ind,len=0,code;
                        var nreq="";
                        var req=document.getElementById('search').value;
                        req.trim();
                        len=req.length;
                        req=req.toLowerCase();
                        for(ind=0;ind<len;ind++)
                            {
                                code=req.charCodeAt(ind);
                             if((code>=65 && code<=90)||(code>=97 && code<=122)||(code>=48 && code<=57)||code==32)
                                 {
                                     nreq=nreq+req.charAt(ind);
                                 }
                            }

                        if(nreq=="")
                        {
                        document.getElementById("searching").href="";
                        $('#searchresult').hide();
                        }

                        else
                        {
                         document.getElementById("searching").href="CORE/search.php?searchq="+req;

                        if(CheckWordLimit(nreq,40)==1){
                         $.post("CORE/SearchRefer.php", {request:nreq},function(data)
                          {
                             var obj = JSON.parse(data);
                             var len=obj.result.length;
                             // to make data here and set html
                             var wr="<div class=\"dropdown\"><div id=\"myDropdown\" class=\" dropdown-menu dropdown-content\" style=\" color: #fff !important;   width: 100%; !important;    background: rgba(20,20,20,0.7); !important;\">";
                             // 8 are the top results to be shown at max
                             for(var i=0;i<len && i<8 ;i++)
                                 {
                            wr=wr+"<a href='track.php?id="+obj.result[i].SONG_ID+"'>  "+obj.result[i].NAME+ " ("+obj.result[i].GENRE+"), "+obj.result[i].ALBUM_NAME+"   by "+obj.result[i].ARTIST1+"  "+obj.result[i].ARTIST2+"  "+obj.result[i].ARTIST3+"</a>";
                                 }
                             if(len==0){
                                 var wr="<div class=\"dropdown\"><div id=\"myDropdown\" class=\" dropdown-menu dropdown-content\" style=\" color: #fff !important;   width: 100%; !important;    background: rgba(20,20,20,0.7); !important;\"><h3 style=\"text-align: center;\">No results... </h3></div></div>";
                             }

                             wr=wr+"</div></div>";
                             $('#searchresult').show();
                             $('#searchresult').html(wr);
                             document.getElementById("myDropdown").classList.toggle("show");
                          });  }
                         else{
                             var wr="<div class=\"dropdown\"><div id=\"myDropdown\" class=\" dropdown-menu dropdown-content\" style=\" color: #fff !important;   width: 100%; !important;    background: rgba(20,20,20,0.7); !important;\"><h3 style=\"text-align: center;\">No results found... </h3></div></div>";
                             $('#searchresult').show();
                             $('#searchresult').html(wr);
                             document.getElementById("myDropdown").classList.toggle("show");
                         }

                        }

                        });
                </script>




                <script type="text/javascript">

                window.onclick = function(event) {
               var dropdowns = document.getElementsByClassName("dropdown-content");
               var i;
               for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                 openDropdown.classList.remove('show');
                                       }
                            }
                         }
                </script>

                </header>


            </div>
                <div >

                  <h1 class="latesthead">Here's the Top</h1>

                    <?php
                    require("PHP/Script/DisplayClass.php");
                    require("PHP/Script/InterfaceClass.php");
                    require("PHP/Script/DBConnection.php");
                    $obj= new InterfaceClass();
                    $res=$obj->showTop();
                    echo $res;
                     ?>



        </div>

        <!-- <div>  <hr>
                   <h1 class="latesthead playpad">Get the App</h1>

                <div class="playpad"></div>
               <div class="row indent">
                  <div class="col-sm-4 indent"><img src="Images/gp.jpg"></div>

                      <div class="col-sm-8  indent"><p class="appformat"> Listen to your favorite music anywhere, store music on our space and share your stuff.</p> <br>

                          <ul class="app_btn" >

                               <li>
                                   <a href="index.php"><img src="Images/plst.png"></a>
                              </li>
                              <li>
                                  <p style="font-size:25px;"> or <a href="index.php" class="appcenter">learn more</a></p>
                              </li>
                          </ul>
                      </div>
                 </div>

            </div> -->


            <br>


                 <div id="midsection">
                        <div class="container-fluid">
                                <p class="midsecp"> Wanna Make Music? Get heared?</p>
                                <br><br>
                                <p class="fan">Get <CL style="color:#FF3030;" >ON ROLLSIDE</CL>, reach your fans and<br> Grow your Audience<br>Go Professional</p>

                        </div>
                </div>


            <br>
            <br>

            <div class="container-fluid">

            <h1 class="signline" style="font-size: 40px;"> Enjoyed listening! Join the club. </h1>
            <h2  class="signline" style="font-size: 30px;">  Save your playlist and songs on our space and listen anywhere.</h2>
            <br>

                <a class="btn btn-primary center-block btn-dlm"  data-toggle="modal" data-target="<?php if(isset($_SESSION["bool"])){if($_SESSION["bool"]==1){echo "#msg-modal";}else{echo "#login-modal2";}}?>">Create Account</a>
            <br>
            <ul class="signl" >


                      <?php if(isset($_SESSION["bool"])){ if($_SESSION["bool"]==1){ }
                        else{ echo  "<li ><h2  class=\"signline\" style=\"font-size: 26px;\">Already has an account?</h2></li><li><label href=\"#\" class=\"btn btn-primary center-block btn-dll\"  data-toggle=\"modal\" data-target=\"#login-modal1\">Sign In</label>   </li>";} }?>

                     <script type="text/javascript">
                    $("#logging1").click(function(){
                    $.post("PHP/Script/LogOut.php", {opt:"logout"},function(data)
                          {  data=data.trim();
                          if(data=="Logged Out")
                              {
                                location.reload(true);
                              }
                      });
                     })
                    </script>


            </ul>
            </div>




            <hr>

        <div class="container-fluid">
             <ul class="signl" >
                 <li ><h2  class="signline" style="font-size: 26px;">Contribute to community by uploading new tracks or Albums</h2></li>
                 <li>
                     <a  <?php  if(isset($_SESSION["bool"])){if($_SESSION["bool"]==1) {echo" href=\"register.php\"";}
                        else {echo "href=\"upload.php\"";}}?> class="btn btn-primary center-block btn-dl" >Upload</a>
                </li>
            </ul>
        </div>

        <br>
             <h4>*The RollSide does not undertake any copyright issues and is currently under testing. The songs uploaded yet are strictly for testing purposes and we don't make any claim over the content*</h4>
        <div id=foot>

            <ul class="footer">
                <li><a href="about.php" class="anch">About</a></li>
                <li><a href="contactus.php" class="anch">Contact us</a></li>

                                   <br>

                <li><a href="location.php" class="anch">Location</a></li>
                <li><a href="popularsearch.php" class="anch">Popular Searches</a></li>
                <li><a href="help.php" class="anch">Help</a></li>
                <li><a href="privacy.php" class="anch">Privacy</a></li>
                <hr style=" text-color:#fff !important;">
         </ul>


            </div>





        </body>

    </html>
