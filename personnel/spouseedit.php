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
$query="SELECT * from spouse WHERE id = '" . $id . "'";
$result = mysqli_query($dbCon,$query);
$cust = mysqli_fetch_array($result);
if($cust) 
{
echo json_encode($cust);
} else
 {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
?>
