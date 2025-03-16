<?php





// $itemname=$_POST['itemname'];

try{

$id=$_GET['id'];

include("dbconnect.php");

$query="UPDATE `newaccountregistration` SET `status`='active' WHERE id=$id";

$result=mysqli_query($con, $query);

if(!$result){

die("error");

}else{

header("location:adminpage.php");

}

}

catch(Exception $ex){ die($ex->getMessage());

}

?>

