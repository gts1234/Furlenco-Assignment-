<?php

  class LoginClass
    {
        public function SignIn($email,$pass)
        {
            session_start();
          include('DBConnection.php');

           // logOut first if user
            if(isset($_SESSION['bool'])){
           if ( $_SESSION['bool']==1 )
            {
            header("Location: index.php");
            exit;
            }}

            $error = false;
            $errmsg="Login Successful";

  // prevent sql injections
  $email = trim($email);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($pass);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // if there's no error, continue to login
  if (!$error) {

   $password = hash('sha256', $pass); // password hashing using SHA256
   $res=mysqli_query($con,"SELECT * FROM user WHERE Email='$email';");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   $passgot=$row['PASS'];

   if($count==1 && $passgot==$password )
   {
       if(isset($_SESSION['user'])){

    $_SESSION['user'] = $row['USER_ID'];
       // CHECK FOR ADMIN
           $usr=$row['USER_ID'];
           $res=mysqli_query($con,"SELECT * FROM admin WHERE ADMIN_ID='$usr';");
           $count = mysqli_num_rows($res);
           if(count==1)
           {
               //assign user session variable
               if(isset($_SESSION['admin'])){ $_SESSION['admin']=1;}
           }
           else{
               if(isset($_SESSION['admin'])){ $_SESSION['admin']=0;}
           }
       }
       if(isset($_SESSION['bool'])){
    $_SESSION['bool']=1;}

       if(isset($_SESSION['user_name'])){
    $_SESSION['user_name']=$row['NAME'];
       }
          if(isset($_SESSION['email'])){
    $_SESSION['email']=$email;
       }
    //header("Location: index.php");
   }
    else
   {
    $errmsg = "Incorrect Credentials, Try again...";
   }

  }
  mysqli_close($con);
    //echo $errMSG;
 return $errmsg;
}




  public function LogOut()
  {
      if(isset($_SESSION["bool"]))
      {
        if($_SESSION["bool"]==1)
         {
        $_SESSION["bool"]=0;
        $_SESSION["user"]="";
        $_SESSION["user_name"]="";
        $_SESSION['admin']="";
        session_unset();
        session_destroy();
             //header("location: index.php");
         return "Logged Out";
         }
      }

  }


   public function Register($name,$email,$pass,$repass)
   {
 //ob_start();
  session_start();
       if(isset($_SESSSION['bool'])){
           if($_SESSION['bool']==1 ){
           header("Location: index.php");
           }
       }

 include('DBConnection.php');

 $error = false;
 $nameError="";


  // clean user inputs to prevent sql injections
  $name = trim($name);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($email);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($pass);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
   if (strlen($name) < 3)
   {
   $error = true;
   $nameError = $nameError."<br>*Name must have atleast 3 characters";
  }
  else if (!preg_match("/^[a-zA-Z ]+$/",$name))
  {
   $error = true;
   $nameError = $nameError."<br>*Name must contain alphabets and space";
  }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) )
  {
   $error = true;
   $nameError = $nameError."<br>*Please enter valid email address";
  }
    else {
   // check email exist or not
   $query = "SELECT EMAIL FROM user WHERE EMAIL='$email'";
   $result = mysqli_query($con,$query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $nameError = $nameError."<br>*Provided Email is already in use.";
   }
  }
  // password validation
   if(strlen($pass) < 5) {
   $error = true;
  $nameError =$nameError."<br>*Password must have atleast 5 characters.";
       echo $nameError;  }

  if($pass!=$repass) {
   $error = true;
  $nameError =$nameError."<br>*Password and Repeat Passwords are not different.";
  }
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {
      $id=uniqid('usr');
   $query = "INSERT INTO user(user_id,Email,Pass,Name) VALUES('$id','$email','$password','$name')";
   $res = mysqli_query($con,$query);    mkdir("/home/gts123cpan/public_html/PHP/Script/uploads/$id",0777); mkdir("/home/gts123cpan/public_html/PHP/Script/uploads/$id/track",0777);      mkdir("/home/gts123cpan/public_html/PHP/Script/uploads/$id/image",0777);
   if ($res) {

    $nameError = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   }
      else {
    $nameError = "Something went wrong, try again later...";
   }

  }
  mysqli_close($con);
  return $nameError;

    }


public function ChangePassword($oldpass,$newpass,$rnewpass)
    {
    $oldpass = trim($oldpass);
  $oldpass = strip_tags($oldpass);
  $oldpass = htmlspecialchars($oldpass);

    $newpass = trim($newpass);
  $newpass = strip_tags($newpass);
  $newpass = htmlspecialchars($newpass);

    $rnewpass = trim($rnewpass);
  $rnewpass = strip_tags($rnewpass);
  $rnewpass = htmlspecialchars($rnewpass);


      $userid=""; $error=false;$nameError="";
       // session_start();
       if(isset($_SESSSION['user']))
           {
           $userid=$_SESSION['user'];
           }

 include('DBConnection.php');

      if(strlen($newpass) < 5) {
   $error = true;
  $nameError =$nameError."*Password must have atleast 5 characters.";
         }

  if($newpass!=$rnewpass) {
   $error = true;
  $nameError =$nameError."*Password and Repeat Passwords are not different.";
  }
    if($error==false)
    { echo $userid;
        $pass= hash('sha256', $oldpass);
        $sql="SELECT * from user where USER_ID='$userid';";
        $res = mysqli_query($con,$sql);
        $row=mysqli_fetch_array($res);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
        $passgot=$row['PASS'];
        //echo $pass."-------";
        echo $newpass;
        if($pass==$passgot)
        {
          $npass= hash('sha256', $newpass);
          $sql="UPDATE user set PASS='$npass' where USER_ID='$userid';";
          $res=mysqli_fetch_array($res);
           if($res==1)
           {
             $nameError="Password successfully updated.";
           }
        }
        else
        {
            $nameError="Incorrect password. Please Try Again.";
        }

    }

      echo $nameError;

    }

      public function FacebookLogin($email,$name) //For Facebook Integration Session Variables are set
      {
      $a=array();
      $a = explode('@',$email,2);
          if(isset($_SESSION['bool'])){
    $_SESSION['bool']=1;}

       if(isset($_SESSION['user_name'])){
    $_SESSION['user_name']=$name;
       }
          if(isset($_SESSION['email'])){
    $_SESSION['email']=$email;
    }
             if(isset($_SESSION['user'])){
    $_SESSION['user']=$a[0];
    }

      }


    }
?>
