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
$school= $_POST['school'];
$course = $_POST['course'];
$cert = $_POST['cert'];
$grade  = $_POST['grade'];
$year = $_POST['year'];
$createdby = $_POST['createdby'];

if(empty($_POST['id']))
{
$query = "INSERT INTO education(ent,school,course,cert,grade,year,createdby)VALUES('$ent','$school','$course','$cert','$grade','$year','$createdby')";
}
else
{
$query = "UPDATE education set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',school='" . $_POST['school'] . "',course='" . $_POST['course'] . "',cert='" . $_POST['cert'] . "',grade ='" . $_POST['grade'] . "',year='" . $_POST['year'] . "',createdby='" . $_POST['createdby'] . "' WHERE id='" . $_POST['id'] . "'";
}
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>