<?php
include('includes/config.php');
if(isset($_POST['submit']))
{


$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$designation=$_POST['designation'];


$notitype='Create Account';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name,email, password, designation, status) VALUES(:name, :email, :password, :designation, 1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

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
                            <label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="password" required >
                            </div>

                            <label class="col-sm-1 control-label">Department<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="designation" class="form-control" required>
                            <option value="">Select</option>
                            <option value="personnel">Personnel</option>
                            <option value="others">others</option>
                            </select>
                            </div>
                            </div>

                

                         

								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<p>Already Have Account? <a href="index.php" >Signin</a></p>
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