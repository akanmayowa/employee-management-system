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
$gender = $_POST['gender'];
$bdate = $_POST['bdate'];
$createdby = $_POST['createdby'];

if(empty($_POST['id']))
{
$query = "INSERT INTO children (ent,name,gender,bdate,createdby) VALUES ('$ent','$name','$gender','$bdate','$createdby')";
}
else
{
$query = "UPDATE children set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',name='" . $_POST['name'] . "',gender='" . $_POST['gender'] . "' ,bdate='" . $_POST['bdate'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'"; 

}
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>