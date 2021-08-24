
<?php 
include('includes/config.php');

session_start();
error_reporting(0);
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
	<title>SERVICE</title>


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

</br></br>
<div align="left" class="container-fluid">
<a href="serviceadd.php?ent=<?php echo $result->ent;?>" type="button"  class="btn btn-primary">ADD SERVICE INFO</a>
</div>
</br></br>

<div class="col-md-12">


<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") 
    {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
<div class="panel panel-primary">

<div class="panel-heading"><h4>SERVICE INFO</h4></div>


<?php
  
  // Include database file
  include 'serviceclass.php';

  $serviceObj = new Service();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']))
   {
      $deleteId = $_GET['deleteId'];
      $serviceObj->deleteRecord($deleteId);
  }
     
?> 


<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead>
    <thead>
      <tr>
<th >APPOINTMENT</th>
<th >MODE</th>
<th >DESIGNATION</th>
<th >STRUCTURE</th>
<th >LEVEL</th>
<th >STEP</th>
<th >SALARY</th>
<th >DATE</th>
<th >ACTION</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $services = $serviceObj->displayData(); 
          foreach ($services as $service) 
		  {
        ?>
        <tr>
          <td><?php echo $service['appointment'] ?></td>
          <td><?php echo $service['mode'] ?></td>
          <td><?php echo $service['designation'] ?></td>

          <td><?php echo $service['structure'] ?> </td>
		  <td><?php echo $service['level'] ?></td>
		  <td><?php echo $service['step'] ?></td>
          <td><?php echo $service['salary'] ?></td>
          <td><?php echo $service['date'] ?></td>
          <td>
            <a href="serviceupdate.php?editId=<?php echo $service['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="service.php?ent=<?php echo $service['ent'] ?>&deleteId=<?php echo $service['id'] ?>"
            
            
            style="color:red" onclick="confirm('Are you sure want to delete this record')">
            
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>













</div>
</div>      
</div>
	</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>
</html>
<?PHP } ?> 