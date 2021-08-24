

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

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>View Profile</title>

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
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>

	<?php include('includes/header.php');?>
	
    <div class="container-fluid">
    <br><br><br><br>
    <div class="row">
    <br>
    </div>
    <div class="row">
  		<div class="col-sm-3">
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>


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
               
          <div  class="panel panel-default">
            <div style="border: 3px solid red" class="panel-heading">EMPLOYEE INFO</div>
        
          <ul class="list-group">
            <li class="list-group-item text-right"><span class="pull-left"><strong>FILE NUMBER:</strong></span> <?php echo htmlentities($result->ent);?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>IPPIS:</strong></span><?php echo htmlentities($result->ippis);?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>TITLE:</strong></span><?php echo htmlentities($result->title);?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>FIRST NAME:</strong></span> <?php echo htmlentities($result->fname);?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>LAST NAME:</strong></span> <?php echo htmlentities($result->lname);?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>MIDDLE NAME:</strong></span> <?php echo htmlentities($result->mname);?></li> 
            <li class="list-group-item text-right"><span class="pull-left"><strong>MD NAME:</strong></span> <?php echo htmlentities($result->mdame);?></li> 
          </ul> 
          </div>

          <?php }} ?>

        </div>
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">BIO DATA</a></li>
                <li><a data-toggle="tab" href="#messages">BANK DETAILS</a></li>
                <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
                <li><a data-toggle="tab" href="#s">Menu 3</a></li>

              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>GENDER</h4></label>
                              <span style="border: 2px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->gender);?></span>                    
                          
                          
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>MARITAL STATUS</h4></label>
                            <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->marital);?></span>                    
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>EMAIL ADDRESS</h4></label>
                              <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->email);?></span>                    
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>PHONE NUMBER</h4></label>
                             <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->phone);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>ADDRESS</h4></label>
                              <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->address);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>CITY</h4></label>
                              <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->city);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>STATE</h4></label>
                              <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->stateoforigin);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>BLOOD GROUP</h4></label>
                            <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->bgroup);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>GENOTYPE</h4></label>
                              <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->genotype);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>HEIGHT</h4></label>
                            <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->height);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>WEIGHT</h4></label>
                              <span style="border: 3px solid red" class="form-control"  class="border border-success"><?php echo htmlentities($result->weight);?></span>                    
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>CREATED BY</h4></label>
                            <span  style="background-color:powderblue;" class="form-control"  class="border border-success"><?php echo htmlentities($result->createdby);?></span>                    
                          </div>
                      </div>
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <hr>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>BANK NAME</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>ACCOUNT TYPE</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          

                     
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>ACCOUNT NUMBER</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                 
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>
               







              <div class="tab-pane" id="s">
            		
               	
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="first_name"><h4>name</h4></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                              <label for="last_name"><h4>Last name</h4></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>
            
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>
            
                        <div class="form-group">
                            <div class="col-xs-6">
                               <label for="mobile"><h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="email"><h4>Location</h4></label>
                                <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="password"><h4>Password</h4></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                              <label for="password2"><h4>Verify</h4></label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                             <div class="col-xs-12">
                                  <br>
                                    <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                     <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                              </div>
                        </div>
                    </form>
                </div>









              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->







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
<script type="text/javascript">
			

            $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(".file-upload").on('change', function(){
    readURL(this);
});
});
	</script>




</body>
</html>
<?PHP } ?> 
