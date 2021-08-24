<?php
if(count($_POST)>0)
{    
    $hName='localhost'; 
    $uName='root';   
    $password='';   
    $dbName = "pms"; 
    $dbCon = mysqli_connect($hName,$uName,$password,"$dbName");
      if(!$dbCon)
      {
          die('Could not Connect MySql Server:' .mysqli_error($dbCon));
      }
$ent = $_POST['ent'];
$fnamw= $_POST['fnamw'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$address  = $_POST['address'];
$city  = $_POST['city'];
$state = $_POST['state'];
$relationship = $_POST['relationship'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$createdby = $_POST['createdby'];


if(empty($_POST['id']))
{
$query = "INSERT INTO kin (ent,fnamw,mname,lname,address,city,state,relationship,gender,phone,createdby) VALUES ('$ent','$fnamw','$mname','$lname','$address','$city','$state','$relationship','$gender','$phone','$createdby')";
}
else
{
$query = "UPDATE kin set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',fnamw='" . $_POST['fnamw'] . "',mname='" . $_POST['mname'] . "',lname='" . $_POST['lname'] . "', address='" . $_POST['address'] . "',city ='" . $_POST['city'] . "',state='" . $_POST['state'] . "',relationship='" . $_POST['relationship'] . "',gender='" . $_POST['gender'] . "' ,phone='" . $_POST['phone'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'"; 

}

$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>