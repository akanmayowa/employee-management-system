<?php
  
  // Include database file
  include 'serviceclass.php';

  $serviceObj = new Service();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $service = $serviceObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $serviceObj->updateRecord($_POST);
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
    <script type="text/javascript">


        
</script>
</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Register</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">EMPLOYEE NUMBER<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" readonly name="ent" value="<?php echo $service['ent']; ?>" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">EMPLOYMENT MODE<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="mode" class="form-control" required>
                            <?php $service2 = $serviceObj->showAllDataMode($editId);?>    
                            <option value="APPOINTMENT">APPOINTMENT</option>
                            <option value="PROMOTION">PROMOTION</option>
                            <option value="CONVERSION">CONVERSION</option>
                            <option value="REDESIGNATION">REDESIGNATION</option>
                            <option value="UPGRADE">UPGRADE</option>
                            <option value="READJUSTMENT OF SALARY">READJUSTMENT OF SALARY</option>
                            </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">DESIGNATION<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" value="<?php echo $service['designation']; ?>" name="designation" class="form-control"  required >
                            </div>

                            <label class="col-sm-1 control-label">APPOINTMNT<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="appointment" class="form-control" required>
                            <?php $service4 = $serviceObj->showAllDataApp($editId);?>                    
                            <option value="CONFIRMATION">CONFIRMATION</option>
                            <option value="SUBSTANTIVE">SUBSTANTIVE</option>
                            <option value="CURRENT">CURRENT</option>
                            </select>
                            </div>
                            </div>

                
                            </br>
                            <div class="form-group">
                            <label class="col-sm-1 control-label">STRUCTURE<span style="color:red">*</span></label>
                            <div class="col-sm-5">                                 
	<select  class="form-control"  name="structure">
  <?php $service1 = $serviceObj->showAllData($editId); ?>
                            <option value="USS">USS</option>
                            <option value="EUSS">EUSS</option>
                            <option value="HATISS">HATISS</option>
                            <option value="CONTISS">CONTISS</option>
                            <option value="CONHESS">CONHESS</option>
                            <option value="CONMESS">CONMESS</option>
                            <option value="CONTOPSAL">CONTOPSAL</option>
                            <option value="HAPSS">HAPSS</option>
                            </select>
                            </div>

                            <label class="col-sm-1 control-label">LEVEL<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="level" class="form-control" required>
                            <?php $service3 = $serviceObj->showAllDataLevel($editId);?>
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
                            </div>


                            <div class="form-group">
                            
                                
                           
                            <label class="col-sm-1 control-label">STEP<span style="color:red">*</span></label>
                            <div class="col-sm-5">
<input type="text" value="<?php echo $service['step']; ?>" name="step" class="form-control" required >   
                            </div>                
                            
                            
                            <label class="col-sm-1 control-label">SALARY<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" value="<?php echo $service['salary']; ?>" name="salary" class="form-control" required >
                            </div>
       


                            </br></br></br></br>
                            <div class="form-group">
                           
                            <label class="col-sm-1 control-label">DATE<span style="color:red">*</span></label>
                            <div class="col-sm-5">
<input type="text" name="date" value="<?php echo $service['date']; ?>" class="date-own form-control" required >   

                            </div>   
                           
                           
                           
                           
                           
                            <label class="col-sm-1 control-label">CREATED BY<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="createdby" readonly value="<?php echo $service['createdby']; ?>" name="createdby" class="form-control" required >              
                            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">

                           
                            </div>
  </div>




				</br></br></br>
                                <button class="btn btn-primary" name="update" type="submit">UPDATE SERICE INFO </button>
                                <button class="btn btn-danger" name="submit" type="submit">CANCEL</button>

                                </form>
                                <br>
                           
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

</body>
</html>