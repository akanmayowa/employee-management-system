

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
	<title>EDUCATION</title>

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
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="css/bootstrap-datepicker.js"></script>
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
<button type="button" id="addNewUser" class="btn btn-primary">ADD EDUCTION</button>
</div>
</br></br>

<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading"><h4>EDUCTION</h4></div>
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead>
<tr>

<th scope="col">S/N</th>
<th scope="col">School</th>
<th scope="col">Course</th>
<th scope="col">Year</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

<?php
$hName='localhost'; 
$uName='root';   
$password='';   
$dbName = "pms"; 
$dbCon = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$dbCon){
	  die('Could not Connect MySql Server:' .mysqli_error($dbCon));
  }

$ent = $_GET['ent'];
$query="SELECT * from education WHERE ent = '" . $ent . "'";
$result=mysqli_query($dbCon,$query);
$cnt=0;
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>
<tr>
<td><?php echo $cnt=$cnt+1;?></td>
<td><?php echo $array[2];?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[6];?></td>

<td> 
<a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>
<a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="3" rowspan="1" headers="">No Data Found</td>
</tr>
<?php endif; ?>
<?php mysqli_free_result($result); ?>
</tbody>
</table>
</div>
</div>      
</div>

<div class="modal fade" id="user-model" aria-hidden="true">
<div class="modal-dialog" >
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userModel"></h4>
</div>
<div class="modal-body">


<form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
<input type="hidden" name="id" id="id">

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
  <div class="col-12">
      <label for="inputEmail4" class="form-label">File Number</label>
	<input type="text" readonly class="form-control" id="ent" name="ent" value="<?php echo htmlentities($result->ent);?>" required="">

  </div>
  <?php }} ?>

  </br>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">School</label>
	<input type="text" class="form-control" id="school" name="school"  value="" required="">
  </div>


  </br>
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Course</label>
	<input type="text" class="form-control" id="course" name="course"  value=""  required="">
</div>

</br>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Cert</label>
	<input type="text" class="form-control" id="cert" name="cert"  value=""  required="">
  </div>

  </br></br></br></br>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Grade</label>
	<input type="text" class="form-control" id="grade" name="grade"  value="" required="">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Year</label>
	<input type="text"  class="date-own form-control" id="year" name="year"  value="" required="">
  
    <script type="text/javascript">
$('.date-own').datepicker({

   minViewMode: 2,

   format: 'yyyy'

 });
</script>
  </div>


  </br></br></br></br></br>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Created by</label>
    <input type="text" class="form-control" id="createdby" name="createdby"  value="<?php echo htmlentities($_SESSION['alogin']); ?>"  required="">
  </div>

</br></br></br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser">Save changes</button>
	<button type="submit"  data-dismiss="modal" class="btn btn-danger">Cancel </button>
  </div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!-- end bootstrap model -->


<script type="text/javascript">
$(document).ready(function($){
$('#addNewUser').click(function () {
$('#userInserUpdateForm').trigger("reset");
$('#userModel').html("Add Education");
$('#user-model').modal('show');
});
$('body').on('click', '.edit', function () {
var id = $(this).data('id');
$.ajax({
type:"POST",
url: "educationedit.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#userModel').html("Edit Education");
$('#user-model').modal('show');

$('#id').val(res.id);
$('#ent').val(res.ent);
$('#school').val(res.school);
$('#course').val(res.course);
$('#cert').val(res.cert);
$('#grade').val(res.grade);
$('#year').val(res.year);
$('#createdby').val(res.createdby);                  
}
}


);
});
$('body').on('click', '.delete', function () {
if (confirm("Delete Record?") == true) {
var id = $(this).data('id');
$.ajax({
type:"POST",
url: "educationdelete.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#ent').html(res.ent);
$('#school').html(res.school);
$('#course').html(res.course);
$('#cert').html(res.cert);
$('#grade').html(res.grade);
$('#year').html(res.year);
$('#createdby').html(res.createdby);
window.location.reload();
}
});
}
});
$('#userInserUpdateForm').submit(function()
 {
$.ajax({
type:"POST",
url: "educationinsert-edit.php",
data: $(this).serialize(),  
dataType: 'json',
success: function(res)
{

location.reload();	}
});
});
});
</script>

	</div>
	</div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
    <script src="year/js/yearpicker.js"></script>
    

</body>
</html>
<?PHP } ?> 