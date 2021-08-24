

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
	<title>EMOLUMENT</title>

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
<button type="button" id="addNewUser" class="btn btn-primary">ADD EMOLUMENT</button>
</div>
</br></br>

<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading"><h4>EMOLUMENT</h4></div>
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead>
<tr>
<th >S/N</th>
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
$hName='localhost'; 
$uName='root';   
$password='';   
$dbName = "pms"; 
$dbCon = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$dbCon){
	  die('Could not Connect MySql Server:' .mysqli_error($dbCon));
  }

$ent = $_GET['ent'];
$query="SELECT * from services WHERE ent = '" . $ent . "'";
$result=mysqli_query($dbCon,$query);
$cnt=0;
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>
<tr>
<td><?php echo $cnt=$cnt+1;?></td>
<td><?php echo $array[2];?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<td><?php echo $array[5];?></td>
<td><?php echo $array[6];?></td>
<td><?php echo $array[7];?></td>
<td><?php echo $array[8];?></td>
<td><?php echo $array[9];?></td>
<td> 
<a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>
<a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="10" rowspan="1" headers="">No Data Found</td>
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
  <div class="col-md-6">
      <label for="inputEmail4" class="form-label">File Number</label>
	<input type="text" readonly class="form-control" id="ent" name="ent" value="<?php echo htmlentities($result->ent);?>" required="">

  </div>
  <?php }} ?>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">EMPLOYEE MODE</label>
  <select name="mode" id="mode" class="form-control form-control-lg" required>
                            <option value="">SELECT</option>
                            <option value="APPOINTMENT">APPOINTMENT</option>
                            <option value="PROMOTION">PROMOTION</option>
                            <option value="CONVERSION">CONVERSION</option>
                            <option value="REDESIGNATION">REDESIGNATION</option>
                            <option value="UPGRADE">UPGRADE</option>
                            <option value="READJUSTMENT OF SALARY">READJUSTMENT OF SALARY</option>
                            </select>
  </div>


  </br></br></br></br> </br>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">DESIGNATION</label>
  <INPUT name="designation" id="designation" class="form-control form-control-lg" required>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">APPOINTMENT TYPE</label>
    <select name="appointment" id="appointment" class="form-control form-control-lg" required>
                            <option value="">SELECT</option>
                            <option value="CONFIRMATION">CONFIRMATION</option>
                            <option value="SUBSTANTIVE">SUBSTANTIVE</option>
                            <option value="CURRENT">CURRENT</option>
 </select>
                              </div>


                              </br></br></br>
  </br></br>
                              <div class="col-md-12">
    <label for="inputPassword4" class="form-label">STRUCTURE</label>
    <select name="structure" id="structure" class="form-control form-control-lg" required>
    <option value="">SELECT</option>
                            <option value="1">USS</option>
                            <option value="2">EUSS</option>
                            <option value="3">HATISS</option>
                            <option value="4">CONTISS</option>
                            <option value="5">CONHESS</option>
                            <option value="6">CONMESS</option>
                            <option value="7">CONTOPSAL</option>
                            <option value="8">HAPSS</option>
 </select>
                              </div>


                              </br></br></br></br> </br>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">LEVEL</label>
  <select name="level" id="level" class="form-control form-control-lg" required>
                            <option value="">SELECT</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                </select>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">STEP</label>
    <input type="text" name="step" class="form-control" required >   

                              </div>

  </br></br></br></br></br>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">DATE</label>
	<input type="text" class="date-own1 form-control" id="date" name="date"  value="" required="">
  <script type="text/javascript">
$('.date-own1').datepicker({
  viewMode: "months", 
    minViewMode: "months",
   format: 'dd-mm-yyyy'
 });
</script>
  
  </div>


  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Created by</label>
    <input type="text" readonly class="form-control" id="createdby" name="createdby"  value="<?php echo htmlentities($_SESSION['alogin']); ?>"  required="">
  </div>

</br></br></br></br></br>
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
$('#userModel').html("Add Emolument");
$('#user-model').modal('show');
});
$('body').on('click', '.edit', function () {
var id = $(this).data('id');
$.ajax({
type:"POST",
url: "emolumentedit.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#userModel').html("Edit Emolument");
$('#user-model').modal('show');

$('#id').val(res.id);
$('#mode').val(res.mode);
$('#appointment').val(res.appointment);
$('#designation').val(res.designation);
$('#structure').val(res.structure);
$('#level').val(res.level);
$('#step').val(res.step);
$('#salary').val(res.salary);
$('#createdby').val(res.createdby); 
$('#date').val(res.date);
}
}


);
});
$('body').on('click', '.delete', function () {
if (confirm("Delete Record?") == true) {
var id = $(this).data('id');
$.ajax({
type:"POST",
url: "emolumentdelete.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#ent').html(res.ent);
$('#mode').html(res.mode);
$('#appointment').html(res.appointment);
$('#designation').html(res.designation);
$('#structure').html(res.structure);
$('#level').html(res.level);
$('#step').html(res.step);
$('#salary').html(res.salary);
$('#createdby').html(res.createdby);
$('#date').html(res.date);
window.location.reload();
}
});
}
});
$('#userInserUpdateForm').submit(function()
 {
$.ajax({
type:"POST",
url: "emolumentinsert-edit.php",
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