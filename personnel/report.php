<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


	
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
	<title>Report</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
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

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">
                        <a class="btn btn-primary" role="button"><h5>INDIVIDUAL RECORD</h5></a>
                        </h2>      

						<div class="panel panel-primary">
							<div class="panel-heading">SEARCH HERE</div>
							<div class="panel-body">
							<div class="container" style="margin-top: 50px;">
      
	   <h2 style="text-align: center;"><b></b></h2><br>
        <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-8 form-group">
              <input type="text" onkeyup="loadData()" id="search" class="form-control" autocomplete="off" placeholder="Search here.."><br>
			</div>
          <div class="col-md-2"></div>
        </div>
      <div class="result">
        
      </div>
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
	<script type="text/javascript">
  
        function loadData(query)
		{
          $.ajax({
            url : "reportaction.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $(".result").html(response);
            }
          });  
        }

        // live search data from table without reload/refresh page
        $("#search").keyup(function(){
          var search = $(this).val();
          if (search !="")
		   {
            loadData(search);
          }
	
		  
		  else
		  {
            loadData();
          }
        });
    
</script>

</body>
</html>
<?php } ?>
