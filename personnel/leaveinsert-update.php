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
$leavetype= $_POST['leavetype'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$recommendation  = $_POST['recommendation'];
$destination = $_POST['destination'];
$remarks = $_POST['remarks'];
$createdby = $_POST['createdby'];
if(empty($_POST['id']))
{
$query = "INSERT INTO leaves (leavetype,startdate,enddate,recommendation,destination,remarks,createdby) VALUES ('$ent','$leavetype','$startdate','$enddate','$recommendation','$destination','$remarks','$createdby')";
}
else
{
$query = "UPDATE leaves set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',leavetype='" . $_POST['leavetype'] . "',startdate'" . $_POST['startdate'] . "',enddate='" . $_POST['enddate'] . "', recommendation='" . $_POST['recommendation'] . "',destination='" . $_POST['destination'] . "',remarks='" . $_POST['remarks'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'"; 

}

$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>


