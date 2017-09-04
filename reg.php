<?php
include("config.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($db,$_POST['name1']); 
  $email = mysqli_real_escape_string($db,$_POST['email1']);
  $phone = mysqli_real_escape_string($db,$_POST['phone1']);
  $college = mysqli_real_escape_string($db,$_POST['college1']);
  $event1 = mysqli_real_escape_string($db,$_POST['papp']);
  $event2 = mysqli_real_escape_string($db,$_POST['forensics']);
  $event3= mysqli_real_escape_string($db,$_POST['quiz']);
  $event4 = mysqli_real_escape_string($db,$_POST['bat']);
  $event5 = mysqli_real_escape_string($db,$_POST['sc']);

    //$email = mysqli_real_escape_string($db,$_POST['sign_mail']); 
   	//$phno = mysqli_real_escape_string($db,$_POST['sign_phone']); 
  /**/
    $sql = "SELECT email FROM list WHERE email = '$email'"; 
$result = $db->query($sql);


  if($result->num_rows ==0)
  {
    $sql = "INSERT INTO list".
  "(name,email,phone,college,papp,forensics,quiz,bat,sc) ".
  "VALUES ".
  "('$name','$email','$phone','$college','$event1','$event2','$event3','$event4','$event5')";
  $ret=mysqli_query($db,$sql);
  $error="Registeration for events successful ";
  echo "<script type='text/javascript'>alert('$error');</script>";
  
    echo "<script type=\"text/javascript\">location.href = 'index.html';</script>";
 }
 else{
  /*$sql = "SELECT id FROM login WHERE id = '$username' and pass = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);*/
      if(isset($_POST['papp']))
      {
          $sql1 = "UPDATE list SET papp = '$event1' where email = '$email' ";
          $ret1=mysqli_query($db,$sql1);
        }
       if(isset($_POST['forensics']))
      {
          $sql1 = "UPDATE list SET forensics = '$event2' where email = '$email' ";
          $ret1=mysqli_query($db,$sql1);
        }

       if(isset($_POST['quiz']))
      {
          $sql1 = "UPDATE list SET quiz = '$event3' where email = '$email' ";
          $ret1=mysqli_query($db,$sql1);
        }

         if(isset($_POST['bat']))
      {
          $sql1 = "UPDATE list SET bat = '$event4' where email = '$email' ";
          $ret1=mysqli_query($db,$sql1);
        }
         if(isset($_POST['sc']))
      {
          $sql1 = "UPDATE list SET sc = '$event5' where email = '$email' ";
          $ret1=mysqli_query($db,$sql1);
        }

             $ret3 = "Updated Registration information"; 
              echo "<script type='text/javascript'>alert('$ret3');</script>";
                  echo "<script type=\"text/javascript\">location.href = 'index.html';</script>";
            /*
          $sql1 = "UPDATE list SET papp = '$event1' , forensics = '$event2' , quiz = '$event3' , bat = '$event4' , sc = '$event5' where email = '$email' ";
            $ret1=mysqli_query($db,$sql1);*/

 }
}


?>