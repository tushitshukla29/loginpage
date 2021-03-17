<?php
$user = $_POST['username'];
$password = $_POST['password'];
$con = new mysqli ('localhost','root','','test');
if($con->connect_error){
    die('failed connection error : '.$con->connect_error);
} else{
    $stmt = $con->prepare('select * from login where user = ? ');
    $stmt->bindParam("?", $user);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if( $stmt_result->num_rows > 0){
      $data = $stmt_result->fetch_assoc();
      if($data['password']=== $password){
          echo "<h1> Success login</h2>";
        }
          else
        {
            echo"invalid login";
        
        }
    }   
        else
        {
            echo"invalid login";
        
        }
    }



?>