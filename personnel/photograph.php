

<?php 
include('includes/config.php');

session_start();
//error_reporting(0);
if(strlen($_SESSION['alogin'])=="0")
    {   
    header("Location: ../index.php"); 
    }
    else
{
  if(isset($_GET['ent']))
	{
		$ent=$_GET['ent'];
	}
?>

<?php
  include 'photographclass.php';
  $customerObj = new Customers();
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']))
   {
      $deleteId = $_GET['deleteId'];
      $customerObj->deleteRecord($deleteId);
  }
     
?> 
  
  <?php   
  $customerObj = new Customers();
  if(isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
  }  
?>

<?php
  $customerObj = new Customers();
  if(isset($_POST['submit'])) 
  {
    $customerObj->insertData($_POST);
  }?>

<?php
$sent=$_GET['ent'];
$sql = "SELECT * from employee where ent=:sent";
$query = $dbh->prepare($sql);
$query->bindParam(':sent',$ent,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>  



<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Photograph</title>


<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>

<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar2.php');?>
		<div class="content-wrapper">

 
		<div class="col-md-8">
			<div class="col-md-8">
			<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>File Number</th>
        <th>Ippis</th>
        <th>Full Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo htmlentities($result->ent);?></td>
        <td><?php echo htmlentities($result->ippis);?></td>
        <td><?php echo htmlentities($result->fname);?> <?php echo htmlentities($result->lname);?></td>
      </tr>
	  <?php }} ?>

	</tbody>

  </table>
</div>
</div>
</br>
</br>

<script type="text/javascript">
$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
$(document).ready(function() {
  $("#success-alert").hide();
  $("#myWish").click(function showAlert() {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
  });
});
    </script>

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert")
     {
      echo "<div id='success-alert' class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";

            
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div id='success-alert' class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
            echo "<script type='text/javascript'>alert(' Sucessfull!');</script>";

    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div id='success-alert' class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>


<div class="container-fluid">
<form action="photograph.php" method="post" enctype="multipart/form-data" class="form-horizontal">
     
 <table class="table table-bordered table-responsive">
 <?php
$sent=$_GET['ent'];
$sql = "SELECT * from employee where ent=:sent";
$query = $dbh->prepare($sql);
$query->bindParam(':sent',$ent,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>  

    <tr>
     <td><label class="control-label">Employee #</label></td>
        <td><input readonly class="form-control" type="text" name="ent" required value="<?php echo htmlentities($result->ent);?>" /></td>
    </tr>
  
    <tr>
     <td><label class="control-label">Createdby</label></td>
        <td><input  class="form-control" type="text" required name="modifier" value="<?php echo htmlentities($result->createdby);?>" /></td>
    </tr>
	  <?php }} ?>

    <tr>
     <td><label class="control-label">Profile Img.</label></td>
        <td><input  id="file" onchange="return fileValidation()" required class="input-group" type="file" name="photo"  /></td>
    </tr>
    


    <tr>
     <td><label class="control-label">Preview</label></td>
     <td height="100"col="3" rowspan="3" width="100"> <div height="100"  width="30" id="imagePreview"></div></td>    </tr>
    <tr>
    
        <td colspan="2"><button type="submit"  name="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save picture
        </button>
        </td>
    </tr>


 
    </table>
    </form>
    </div>


</br></br>


<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading"><h4>PHOTOGRAPH</h4></div>

<div class="row">
  
<?php 
$customers = $customerObj->displayData(); 
foreach ($customers as $customer)
 {
  if($customers > 0) 
    {
 ?>

   <div class="col-xs-3">
        
  <?php  echo '<td>' .
 '<img src = "data:image/jpeg;base64,' . base64_encode($customer['photo']) . '" class="img-rounded" width="250px" height="250px" />'
 . '</td>'; ?>   


    <p class="page-header">
    <span>
    <a class="btn btn-info" data-toggle="modal"  href="#edit<?php echo $customer['id']; ?>"title="click for edit" ><span class="glyphicon glyphicon-edit"></span> Edit</a> 
    <a class="btn btn-danger"href="photograph.php?ent=<?php echo $customer['ent'] ?>&deleteId=<?php echo $customer['id'] ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
    </span>
    </p>
   </div>  

  <?php 
}  
  else 
  {?>

        <div class="col-xs-12">
         <div class="alert alert-warning">
             <span class="glyphicon glyphicon-info-sign"></span> &nbsp; &nbsp; No Data Found ...
            </div>
        </div>
        <?php
 }

 include('photographedit.php');



}
?>
</div>
</div>
</div>      
</div>

	</div>
	</div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.alert alert-success alert-dismissible').slideUp("slow");
					}, 3000);
					});
	</script>
  <script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = 
                    /(\.doc|\.docx|\.odt|\.pdf|\.tex|\.txt|\.rtf|\.wps|\.wks|\.wpd|\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) 
			{
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            if (fi.files.length > 0) 
            {
            for (const i = 0; i <= fi.files.length - 1; i++) {
 
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 5096) {
                    alert(
                      "File too Big, please select a file less than 4mb");
                } else if (file < 500) {
                    alert(
                      "File too small, please select a file greater than 50kb");
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
           
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };         
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>
</body>
</html>
<?PHP } ?> 
