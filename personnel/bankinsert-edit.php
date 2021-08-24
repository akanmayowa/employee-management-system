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
$bank= $_POST['bank'];
$account= $_POST['account'];
$type = $_POST['type'];
$createdby = $_POST['createdby'];


if(empty($_POST['id']))
{
$query = "INSERT INTO bankacc(ent,bank,account,type,createdby) VALUES ('$ent','$bank','$account','$type','$createdby')";
}
else
{
$query = "UPDATE bankacc set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',bank='" . $_POST['bank'] . "',account='" . $_POST['account'] . "' ,type='" . $_POST['type'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'"; 

}
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>