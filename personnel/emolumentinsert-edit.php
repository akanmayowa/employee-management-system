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
$appointment = $_POST['appointment'];
$designation = $_POST['designation'];
$structure = $_POST['structure'];
$level = $_POST['level'];
$step = $_POST['step'];
$salary = $_POST['salary'];
$createdby = $_POST['createdby'];
$date = $_POST['date'];


if(empty($_POST['id']))
{
$query = "INSERT INTO services(ent,mode,appointment,designation,structure,level,step,salary,createdby,date)VALUES('$ent','$mode','$appointment','$designation','$structure','$level','$step','$salary','$createdby','$date',)";
}
else
{
$query = "UPDATE services set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "', mode='" . $_POST['mode'] . "', appointment='" . $_POST['appoinment'] . "',designation='" . $_POST['designation'] . "',structure='" . $_POST['structure'] . "',level='" . $_POST['level'] . "',step ='" . $_POST['step'] . "',salary='" . $_POST['salary'] . "',  createdby='" . $_POST['createdby'] . "' date='" . $_POST['date'] . "' WHERE id='" . $_POST['id'] . "'";
}
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>


