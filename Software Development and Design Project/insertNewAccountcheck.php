<?php

include("dbconnect.php");

try{
  $uname=$_POST['username'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $re=$_POST['retype_password'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $voters_id_number=$_POST['voters_id_number'];
  // $voters_id=$_POST['voters_id'];
  $status="pending";



  if (strlen($uname) < 4 || strlen($uname) > 8) {
    die("Username must be between 4 and 8 characters.");
  }


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
  }

 
  if (!preg_match('/^[0-9]{10}$/', $phone)) {
    die("Phone number must be exactly 10 digits.");
  }

  
  if ($pass !== $re) {
    die("Passwords do not match.");
  }



  $stmt_check = $con->prepare("SELECT voters_id_number FROM newaccountregistration WHERE voters_id_number = ?");
  $stmt_check->bind_param("i", $voters_id_number);
  $stmt_check->execute();
  $stmt_check->store_result();

  if ($stmt_check->num_rows > 0) {
    die("Voter ID number already exists. Please use a different ID.");
  }

  $stmt_check->close();

  


  $query="INSERT INTO `newaccountregistration`( `username`,`email`, `password`, `retype_password`,`date_of_birth`,`gender`,`address`,`phone`,`voters_id_number`, `status`) VALUES ('$uname','$email','$pass','$re','$dob','$gender','$address','$phone','$voters_id_number','$status')";

  $result=mysqli_query($con,$query);

  if($result==true)
  {
    header("location:home1.php");

  }
  else
  {
    echo"Sorry data couldnot be inserted";
  }


}



catch(Exception $ex)
{
  die($ex->getMessage());
}






?>