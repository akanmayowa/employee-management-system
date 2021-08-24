
  <?php
$conn = new PDO('mysql:host=localhost; dbname=pms','root', ''); 
if (isset($_POST['Submit']))
{
move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
$location=$_FILES["image"]["name"];
$ent=$_POST['ent'];
$documentname=$_POST['documentname'];
$createdby=$_POST['createdby'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO upload (ent, documentname, createdby, image) VALUES ('$ent', '$documentname', '$createdby', '$location')";
$conn->exec($sql);
$result = $conn->prepare("SELECT * FROM upload WHERE ent = '$ent'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++)
{
$ent=$row['ent'];
echo "<script>alert('Successfully Added!!!'); window.location='upload.php?ent=$ent'
</script>";
}
// }
}
// }
?>     
     
