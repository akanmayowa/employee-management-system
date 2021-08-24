

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
	<title>CENSOR</title>


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
<button type="button" id="addNewUserx" class="btn btn-primary">ADD CENSOR INFO</button>
</div>
</br></br>

<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading"><h4>CENSOR INFO</h4></div>
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead>
<tr>
<th scope="col">Date of Offence</th>
<th scope="col">Smmary</th>
<th scope="col">Penalty</th>
<th scope="col">CensorDate</th>
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
$query="SELECT * from censor WHERE ent = '" . $ent . "'";
$result=mysqli_query($dbCon,$query);
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>
<tr>
<td><?php echo $array[2];?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<td><?php echo $array[5];?></td>


<td> 
<a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>
<a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
</td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="5" rowspan="1" headers="">No Data Found</td>
</tr>
<?php endif; ?>
<?php mysqli_free_result($result); ?>
</tbody>
</table>
</div>
</div>      
</div>

<!-- boostrap model -->
<div class="modal fade" id="user-model" aria-hidden="true">
<div class="modal-dialog" >
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userModel"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="userInserUpdateFormx" name="userInserUpdateFormx" class="form-horizontal" method="POST">
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
    <label for="inputAddress2" class="form-label">Offence Date</label>
	<input type="text" class="form-control" id="offencedate" name="offencedate"  value="" required="">
  </div>

</br>


<div class="col-12">
    <label for="inputAddress2" class="form-label">Summary</label>
	<input type="text" class="form-control" id="summary" name="summary"  value="" required="">
  </div>
</br>

<div class="col-12">
    <label for="inputAddress2" class="form-label">Penalty</label>
	<input type="text" class="form-control" id="penalty" name="penalty"  value="" required="">
  </div>
</br>

 
<div class="col-md-6">
    <label for="inputPassword4" class="form-label">Censor Date</label>
	<input type="text"  class="form-control" id="censordate" name="censordate"  required="">
  </div>    


  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Created by</label>
	<input type="text" readonly class="form-control" id="modifier" name="modifier"  value="<?php echo htmlentities($_SESSION['alogin']); ?>" required="">
  </div>



</br></br></br></br></br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUserx">Save changes</button>
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
$('#addNewUserx').click(function () {
$('#userInserUpdateFormx').trigger("reset");
$('#userModel').html("Add Censor Details");
$('#user-model').modal('show');
});
$('body').on('click', '.edit', function () {
var id = $(this).data('id');
$.ajax({
type:"POST",
url: "censoredit.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#userModel').html("Edit Censor Details");
$('#user-model').modal('show');

$('#id').val(res.id);
$('#ent').val(res.ent);
$('#offencedate').val(res.offencedate);
$('#summary').val(res.summary);
$('#penalty').val(res.penalty);
$('#censordate').val(res.censordate);
$('#modifier').val(res.modifier);  
}
}


);
});
$('body').on('click', '.delete', function () {
if (confirm("Delete Record?") == true) {
var id = $(this).data('id');
$.ajax({
type:"POST",
url: "censordelete.php",
data: { id: id },
dataType: 'json',
success: function(res)
{
$('#ent').html(res.ent);
$('#offencedate').html(res.offencedate);
$('#summary').html(res.summary);
$('#penalty').html(res.penanlty);
$('#censordate').html(res.censordate);
$('#modifier').html(res.modifier);
window.location.reload();
}
});
}
});
$('#userInserUpdateFormx').submit(function()
 {
$.ajax({
type:"POST",
url: "censorinsert-edit.php",
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

</body>
</html>
<?PHP } ?> 