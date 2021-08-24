<?php
$conn = new PDO('mysql:host=localhost; dbname=pms','root', ''); 

$get_id=$_GET['id'];
$sql = "Delete from upload where id = '$get_id'";
$result = $conn->prepare("SELECT * FROM upload WHERE id = '$get_id'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++)
{
$ent=$row['ent'];
echo "<script> window.location='upload.php?ent=$ent' </script>";}
$conn->exec($sql);

?>