
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
else{

if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}

if(isset($_POST['submit']))
  {
    $id=$_GET['id'];
    $ent = strtoupper($_POST['ent']);
    $ippis = strtoupper($_POST['ippis']);
    $title = $_POST['title'];
    $fname = strtoupper($_POST['fname']);
    $mname = strtoupper($_POST['mname']);
    $lname = strtoupper($_POST['lname']);
    $mdname = strtoupper($_POST['mdname']);
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $address = strtoupper($_POST['address']);
    $city = $_POST['city'];
    $stateoforigin = $_POST['stateoforigin'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $bgroup = $_POST['bgroup'];
    $genotype = $_POST['genotype'];
    $height = $_POST['height'];
     $weight = $_POST['weight'];
    $createdby  = $_POST['createdby'];

$sql="UPDATE employee SET ent=(:ent),ippis=(:ippis),title=(:title),fname=(:fname), mname=(:mname), lname=(:lname),mdname=(:mdname),gender=(:gender),marital=(:marital),address=(:address),city=(:city),stateoforigin=(:stateoforigin),phone=(:phone),email=(:email),bgroup=(:bgroup),genotype=(:genotype),height=(:height),weight=(:weight),createdby=(:createdby) WHERE id=(:id)";

  $query = $dbh->prepare($sql);
  $query-> bindParam(':ent', $ent, PDO::PARAM_STR);
  $query-> bindParam(':ippis', $ippis, PDO::PARAM_STR);
  $query-> bindParam(':title', $title, PDO::PARAM_STR);
  $query-> bindParam(':fname', $fname, PDO::PARAM_STR);
  $query-> bindParam(':mname', $mname, PDO::PARAM_STR);
  $query-> bindParam(':lname', $lname, PDO::PARAM_STR);
  $query-> bindParam(':mdname', $mdname, PDO::PARAM_STR);
  $query-> bindParam(':gender', $gender, PDO::PARAM_STR);
  $query-> bindParam(':marital', $marital, PDO::PARAM_STR);
  $query-> bindParam(':address', $address, PDO::PARAM_STR);
  $query-> bindParam(':city', $city, PDO::PARAM_STR);
  $query-> bindParam(':stateoforigin', $stateoforigin, PDO::PARAM_STR);
  $query-> bindParam(':phone', $phone, PDO::PARAM_STR);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':bgroup', $bgroup, PDO::PARAM_STR);
  $query-> bindParam(':genotype', $genotype, PDO::PARAM_STR);
  $query-> bindParam(':height', $height, PDO::PARAM_STR);
  $query-> bindParam(':weight', $weight, PDO::PARAM_STR);
  $query-> bindParam(':createdby', $createdby, PDO::PARAM_STR);
  $query-> bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
    $msg="Information Updated Successfully";
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
	<meta name="theme-color" content="#3e454c">
	
	<title>Edit New Employee</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
    <style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: red;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: red;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>	
</head>

<body>

<?php
		$sql = "SELECT * from employee where id = :id";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
                        <div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h6>ADD NEW EMPLOYEE</h6></div>  

 <div class="panel-body">
<?php if($msg){?>
<div class="succWrap" role="alert">
 <strong></strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="errorWrap" role="alert">
 <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
  </div> 
  </div>
<?php } ?>


                         <br>

  <form method="post"  enctype="multipart/form-data" name="regform" onSubmit="return validate();">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">FILE NUMBER</label>
      <input type="text" value="<?php echo htmlentities($result->ent);?>" required  name="ent" class="form-control" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">IPPIS</label>
      <input type="text" value="<?php echo htmlentities($result->ippis);?>" required  name="ippis"  class="form-control" id="inputPassword4" >
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">TITLE</label>

      <select required   name="title" class="form-control">
  <option readonly selected style="background-color:red"   value="<?php echo $result->title; ?>" 
  <?php if ($title == $result->title) { echo 'selected'; } ?> >
  <?php echo $result->title; ?></option>    
  
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                            <option value="Ms">Ms</option>
                            <option value="Dr">Dr</option>
                  
                        </select>
    </div>







    <div class="form-group col-md-6">
      <label for="inputPassword4">FIRST NAME</label>
      <input type="text" required value="<?php echo htmlentities($result->fname);?>" name="fname"  class="form-control" id="inputPassword4" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">LAST NAME</label>
      <input type="text" value="<?php echo htmlentities($result->lname);?>" required name="lname"  class="form-control" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">MIDDLE NAME</label>
      <input type="text" value="<?php echo htmlentities($result->mname);?>" required name="mname"  class="form-control" id="inputPassword4" >
    </div>
  </div>


  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputAddress">MD NAME</label>
    <input type="text" value="<?php echo htmlentities($result->mdname);?>" required name="mdname"  class="form-control" id="inputAddress" >
  </div>

  
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">GENDER</label>
      <select name="gender" class="form-control" required>
      <option readonly selected style="background-color:red"   value="<?php echo $result->gender; ?>" 
  <?php if ($gender == $result->gender) { echo 'selected'; } ?> >
  <?php echo $result->gender; ?></option> 
                            <option value="Male">Male</o>
                            <option value="Female">Female</option>
                            </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">MARITAL STATUS</label>
      <select name="marital" class="form-control" required>
      <option readonly selected style="background-color:red"   value="<?php echo $result->marital; ?>" 
  <?php if ($marital == $result->marital) { echo 'selected'; } ?> >
  <?php echo $result->marital; ?></option> 
                            <option value="Divorced">Divorced</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Separated">Separated</option>
                            <option value="Widow">Widow</option>
                            <option value="Widower">Widower</option>
                            </select>
                                </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">EMAIL ADDRESS</label>
      <input type="email" value="<?php echo htmlentities($result->email);?>" required name="email"  class="form-control" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">PHONE NUMBER</label>
      <input type="text" required value="<?php echo htmlentities($result->phone);?>" name="phone"  class="form-control" id="inputPassword4" >
    </div>
  </div>



  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputAddress">ADDRESS</label>
    <input type="text" required  name="address" value="<?php echo htmlentities($result->address);?>"  class="form-control" id="inputAddress" >
  </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">STATE</label>
     <select required style="text-transform:uppercase" onchange="toggleLGA(this);" name="stateoforigin" id="state"   class="form-control">
     <option readonly selected style="background-color:red"   value="<?php echo $result->stateoforigin; ?>" 
  <?php if ($stateoforigin == $result->stateoforigin) { echo 'selected'; } ?> >
  <?php echo $result->stateoforigin; ?></option> 
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="AkwaIbom">AkwaIbom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="FCT">FCT</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamafara</option>
                </select>
    </div>


    <div class="form-group col-md-4">
      <label for="inputCity">CITY</label>
      <select required  name="city" style="text-transform:uppercase" id="lga" class="form-control select-lga" required >
      <option readonly selected style="background-color:red"   value="<?php echo $result->city; ?>" 
  <?php if ($city == $result->city) { echo 'selected'; } ?> >
  <?php echo $result->city; ?></option>

                   </select>     
                       </div>



    <div class="form-group col-md-4">
      <label for="inputZip">BLOOD GROUP</label>


      <select style="text-transform:uppercase" name="bgroup" class="form-control">
      <option readonly selected style="background-color:red"   value="<?php echo $result->bgroup; ?>" 
  <?php if ($bgroup == $result->bgroup) { echo 'selected'; } ?> >
  <?php echo $result->bgroup; ?></option>                  
           <option  value="A-">A-</option>
                          <option  value="B+">B+</option>
                          <option  value="B-">B-</option>
                          <option  value="O+">O+</option>
                          <option  value="O-">O-</option>      
                          <option  value="AB+">AB+</option>
                          <option  value="AB-">AB-</option>   
                        </select>




    </div>
  </div>
 

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">GENOTYPE</label>
      <select style="text-transform:uppercase" name="genotype" class="form-control">
      <option readonly selected style="background-color:red"   value="<?php echo $result->genotype; ?>" 
  <?php if ($genotype == $result->genotype) { echo 'selected'; } ?> >
  <?php echo $result->genotype; ?></option>                            
                            <option  value="AA">AA</option>
                          <option  value="AO">AO</option>
                          <option  value="BB">BB</option>
                          <option  value="BO">BO</option>
                          <option  value="AB">AB</option>
                          <option  value="OO">OO</option>        
                        </select>
    </div>


    <div class="form-group col-md-4">
      <label for="inputState">HEIGHT</label>
      <input required  type="text" value="<?php echo htmlentities($result->height);?>" name="height"  class="form-control" id="inputZip">
    </div>


    <div class="form-group col-md-4">
      <label for="inputZip">WEIGHT</label>
      <input required type="text"  name="weight" value="<?php echo htmlentities($result->weight);?>" class="form-control" id="inputZip">
    </div>
  </div>
 
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputAddress"></label>
    <input required type="hidden"  name="createdby" value="<?php echo htmlentities($_SESSION['alogin']); ?>" class="form-control" id="inputAddress" >
  </div>
  </div>
  <input type="hidden" name="id" value="<?php echo htmlentities($result->id);?>" >


  <br>
  <div class="form-group col-md-6">                              
    <button class="btn btn-dark btn-lg" type="submit" name="submit">UPDATE REGISTRATION</button>          
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

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
  <script src="stateorigin/js/lga.min.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>
</html>
<?php } ?>