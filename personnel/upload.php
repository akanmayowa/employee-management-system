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
<?php include ('uploadfunction.php'); ?>

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

<!DOCTYPE html>
<html lang="en">
    <head>

<link href="modal/modal/css1/bootstrap1.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">


<script src="modal/modal/js1/jquery1.js" type="text/javascript"></script>
<script src="modal/modal/js1/bootstrap1.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="modal/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="modal/js/DT_bootstrap.js"></script>


<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-social.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link rel="stylesheet" href="css/fileinput.min.css">
<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
</head>
<body>
<?php include('includes/header.php');?>
<div class="ts-main-content">
	<?php include('includes/leftbar2.php');?>
	<div class="content-wrapper">

    <div class="row-fluid">
        <div class="span12">
            <div class="container">
			<div class="col-md-8">
			<table class="table table-striped table-bordered"  class="">
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

<div align="RIGHT" class="container-fluid">
<?php include ('uploadmodal_add.php'); ?>
</div>




<div class="alert alert-info"><div class="btn btn-primary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;UPLOAD DOCUMENT</strong>
                            </div></div>
   <table id="example" cellpadding="0" width="100%" cellspacing="0" border="0" class="table table-striped table-bordered" >
                       
						    <thead>
                                <tr>
                                    <th style="text-align:center;">User Image</th>
                                    <th style="text-align:center;">FirstName</th>
                                    <th style="text-align:center;">LastName</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$conn = new PDO('mysql:host=localhost; dbname=pms','root', ''); 
								$result = $conn->prepare("SELECT * FROM upload");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['image'] != ""): ?>
									<img src="uploads/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								</td>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['ent']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['documentname']; ?></td>
								<td style="text-align:center; width:350px;">
									 <a href="#updte_img<?php echo $id;?>"  data-toggle="modal"  class="btn btn-warning" >Update Image</a>
									 <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-danger" >Delete </a>
								</td>
								</tr>
										<!-- Modal -->
							<div id="delete<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
							<h3 id="myModalLabel">Delete</h3>
							</div>
							<div class="modal-body">
							<div class="alert alert-danger">
							<?php if($row['image'] != ""): ?>
							<img src="uploads/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
							<?php else: ?>
							<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333; margin-left:15px;">
							<?php endif; ?>
							<b style="color:blue; margin-left:25px; font-size:30px;"><?php echo $row['ent']." ".$row['documentname']; ?></b>
							<br />
							<p style="font-size: larger; text-align: center;">Are you Sure you want to Delete?</p>
							</div>
							<hr>
							<div class="modal-footer">
							<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
							<a href="uploaddelete.php<?php echo '?id='.$id; ?>" class="btn btn-danger">Yes</a>
							</div>
							</div>
							</div>
										<!-- Modal Update Image -->
							<div id="updte_img<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
							<h3 id="myModalLabel">Update</h3>
							</div>
							<div class="modal-body">
							<div class="alert alert-danger">
                                   <?php if($row['image'] != ""): ?>
		<img src="uploads/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:1px solid #333333; margin-left: 30px;">
							<?php else: ?>
							<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333; margin-left: 30px;">
							<?php endif; ?>
							<form action="uploadedit.php<?php echo '?id='.$id; ?>" method="post" enctype="multipart/form-data">
							<div style="color:blue; margin-left:150px; font-size:30px;">
								<input type="file" id="file" required name="image" style="margin-top:-115px;">
       
							</div>
                                   <p>Employee #: <input readonly required value="<?php echo $row['ent']; ?>" type="text" name="ent"></p>
                                      <p>File Type:<input required value="<?php echo $row['documentname']; ?>" type="text" name="documentname" ></p>
                                      <p>created by: <input readonly required value="<?php echo $row['createdby']; ?>" type="text" name="createdby"></p>

							</div>
							<hr>
							<div class="modal-footer">
							<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
							<button type="submit" name="submit" class="btn btn-danger">Yes</button>
							</form>
							</div>
							</div>
							</div>
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
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
    <script src="year/js/yearpicker.js"></script>
    
</body>
</html>
<?PHP } ?> 