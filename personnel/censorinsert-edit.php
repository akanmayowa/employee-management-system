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
$offencedate= $_POST['offencedate'];
$summary = $_POST['summary'];
$penalty= $_POST['penalty'];
$censordate = $_POST['censordate'];
$modifier = $_POST['modifier'];


if(empty($_POST['id']))
{
$query = "INSERT INTO censor(ent,offencedate,summary,penalty,censordate,modifier) VALUES ('$ent','$offencedate','$summary','$penalty','$censordate','$modifier')";
}
else{
$query = "UPDATE censor set id='" . $_POST['id'] . "', ent='" . $_POST['ent'] . "',offencedate='" . $_POST['offencedate'] . "' ,summary='" . $_POST['summary'] . "', penalty='" . $_POST['penalty'] . "',censordate='" . $_POST['censordate'] . "',modifier='" . $_POST['modifier'] . "' WHERE id='" . $_POST['id'] . "'"; 
}
$res = mysqli_query($dbCon, $query);
if($res)
 {
echo json_encode($res);
} else
 {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>