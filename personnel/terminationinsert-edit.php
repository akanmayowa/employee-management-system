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
$mode = $_POST['mode'];
$reason= $_POST['reason'];
$custody = $_POST['custody'];
$dateofterm = $_POST['dateofterm'];
$createdby = $_POST['createdby'];


if(empty($_POST['id']))
{
$query = "INSERT INTO termination (ent,mode,reason,custody,dateofterm,createdby) VALUES ('$ent','$mode','$reason','$custody','$dateofterm','$createdby')";
}
else
{
$query = "UPDATE termination set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',mode='" . $_POST['mode'] . "',reason='" . $_POST['reason'] . "',custody='" . $_POST['custody'] . "',dateofterm='" . $_POST['dateofterm'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'"; 
}

$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>