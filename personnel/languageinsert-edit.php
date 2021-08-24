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
$name= $_POST['name'];
$spoken = $_POST['spoken'];
$written = $_POST['written'];
$exams  = $_POST['exams'];
$createdby  = $_POST['createdby'];

if(empty($_POST['id']))
{
$query = "INSERT INTO language (ent,name,spoken,written,exams,createdby) VALUES ('$ent','$name','$spoken','$written','$exams','$createdby')";
}
else
{
$query = "UPDATE language set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',name='" . $_POST['name'] . "',spoken='" . $_POST['spoken'] . "',written='" . $_POST['written'] . "', exams='" . $_POST['exams'] . "',createdby ='" . $_POST['createdby'] . "'WHERE id='" . $_POST['id'] . "'"; 

}

$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>