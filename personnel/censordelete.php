<?php
    $hName='localhost'; 
    $uName='root';   
    $password='';   
    $dbName = "pms"; 
    $dbCon = mysqli_connect($hName,$uName,$password,"$dbName");
      if(!$dbCon){
          die('Could not Connect MySql Server:' .mysqli_error($dbCon));
      }
$id = $_POST['id'];
$query = "DELETE FROM censor WHERE id='" . $id . "'";
$res = mysqli_query($dbCon, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
?>