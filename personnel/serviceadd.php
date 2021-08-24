
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

  // Include database file
  include 'serviceclass.php';

  $serviceObj = new Service();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $serviceObj->insertData($_POST);
  }

?>



<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	
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
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
                        <div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h6>ADD SERVICE INFO</h6></div>                              
                         <br>
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
  <form method="post"  enctype="multipart/form-data" name="regform" onSubmit="return validate();">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">EMPLOYEE NUMBER</label>
      <input type="text" readonly value="<?php echo htmlentities($result->ent);?>" style="text-transform:uppercase" required  name="ent" class="form-control" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">EMPLOYMENT MODE</label>
      <select name="mode" class="form-control" required>
                            <option value="">SELECT</option>
                            <option value="APPOINTMENT">APPOINTMENT</option>
                            <option value="PROMOTION">PROMOTION</option>
                            <option value="CONVERSION">CONVERSION</option>
                            <option value="REDESIGNATION">REDESIGNATION</option>
                            <option value="UPGRADE">UPGRADE</option>
                            <option value="READJUSTMENT OF SALARY">READJUSTMENT OF SALARY</option>
                            </select>    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">DESIGNATION</label>
      <input type="text" name="designation" class="form-control"  required >
    </div>


    <div class="form-group col-md-6">
      <label for="inputPassword4">APPOINTMENT TYPE</label>
      <select name="appointment" class="form-control" required>
                            <option value="">SELECT</option>
                            <option value="CONFIRMATION">CONFIRMATION</option>
                            <option value="SUBSTANTIVE">SUBSTANTIVE</option>
                            <option value="CURRENT">CURRENT</option>
                            </select>    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">STRUCTURE</label>
      <select name="structure" class="form-control" required>
                            <option value="">SELECT</option>
                            <option value="USS">USS</option>
                            <option value="EUSS">EUSS</option>
                            <option value="HATISS">HATISS</option>
                            <option value="CONTISS">CONTISS</option>
                            <option value="CONHESS">CONHESS</option>
                            <option value="CONMESS">CONMESS</option>
                            <option value="CONTOPSAL">CONTOPSAL</option>
                            <option value="HAPSS">HAPSS</option>
                            </select>    </div>

                            
    <div class="form-group col-md-6">
      <label for="inputPassword4">LEVEL</label>
      <select name="level" class="form-control" required>
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
                            </select>    </div>
  </div>


  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">STEP</label>
    <input type="text" name="step" class="form-control" required >   
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">SALARY</label>
    <input type="text" name="salary" class="form-control" required >
  </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">DATE</label>
      <input type="text"  name="date" class="date-own form-control"  required >   
      <script type="text/javascript">
$('.date-own').datepicker({
   format: 'dd-mm-yyyy'
   
 });
</script>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">CREATED BY</label>
      <input type="createdby" readonly value="<?php echo htmlentities($_SESSION['alogin']); ?>" name="createdby" class="form-control" required >              

                                </div>
  </div>
  <?php }} ?>

  



    </div>
  </div>
 


  <br>
  <div align="center" class="form-group">                              
    <button class="btn btn-primary btn-lg" type="submit" name="submit">REGISTER</button>          
  <button class="btn btn-danger btn-lg" name="reset" type="submit">CANCEL</button>
                                </div>
</form>
								</div>
							</div>
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
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
  <script src="year/js/yearpicker.js"></script>

</body>
</html>
<?PHP } ?> 