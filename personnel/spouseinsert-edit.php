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
$bdate = $_POST['bdate'];
$marriage = $_POST['marriage'];
$createdby = $_POST['createdby'];


if(empty($_POST['id']))
{
$query = "INSERT INTO spouse (ent,name,bdate,marriage,createdby) VALUES ('$ent','$name','$bdate','$marriage','$createdby')";
}
else
{
$query = "UPDATE spouse set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',name='" . $_POST['name'] . "',bdate='" . $_POST['bdate'] . "',marriage='" . $_POST['marriage'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'"; 
}

$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>