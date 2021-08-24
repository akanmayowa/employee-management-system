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
$title= $_POST['title'];
$location= $_POST['location'];
$startdate = $_POST['startdate'];
$enddate= $_POST['enddate'];
$remarks = $_POST['remarks'];
$modifier = $_POST['modifier'];


if(empty($_POST['id']))
{
$query = "INSERT INTO seminar(ent,title,location,startdate,enddate,remarks,modifier) VALUES ('$ent','$title','$location','$startdate','$enddate','$remarks','$modifier')";
}
else
{
$query = "UPDATE seminar set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',title='" . $_POST['title'] . "',location='" . $_POST['location'] . "' ,startdate='" . $_POST['startdate'] . "', enddate='" . $_POST['enddate'] . "',remarks='" . $_POST['remarks'] . "',modifier='" . $_POST['modifier'] . "' WHERE id='" . $_POST['id'] . "'"; 

}
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>