<?php

$conn = new PDO('mysql:host=localhost; dbname=pms','root', ''); 
$get_id=$_REQUEST['id'];

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
$location1=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ent=$_POST['ent'];
$documentname=$_POST['documentname'];
$createdby=$_POST['createdby'];
$sql = "UPDATE upload SET ent ='$ent', documentname ='$documentname', createdby ='$createdby',image ='$location1' WHERE id = '$get_id' ";
$conn->exec($sql);


$result = $conn->prepare("SELECT * FROM upload WHERE ent = '$ent'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++)
{
$ent=$row['ent'];
echo "<script>alert('Successfully Updated!!!'); window.location='upload.php?ent=$ent'
</script>";
}

?>