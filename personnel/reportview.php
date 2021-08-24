
<?php 
include('includes/config.php');

session_start();
//error_reporting(0);
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
	<title>Indiviual Profile</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('includes/header.php');?>
<br/>
<br/>
<br/>
<br/>
<div class="container-fluid">
<h2 class="page-title">
                        <a  href="report.php" class="btn btn-primary" role="button"><h5>CLICK TO RETURN BACK</h5></a>
                        </h2> 
                        </div>
<div class="container">
    <div class="col-sm-10">
        <div data-spy="scroll" class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_default_1" data-toggle="tab">PERSONAL DATA</a>
                    </li>
                    <li>
                        <a href="#tab_default_2" data-toggle="tab">CAREER DATA</a>
                    </li>
                    <li>
                        <a href="#tab_default_3" data-toggle="tab">CHILDREN/NOK</a>
                    </li>
                    <li>
                        <a href="#tab_default_4" data-toggle="tab">EDUCATION</a>
                    </li>
                    <li>
                        <a href="#tab_default_5" data-toggle="tab">LEAVE</a>
                    </li>
                    
                    <li>
                        <a href="#tab_default_6" data-toggle="tab">UPLOAD DOCUMENT</a>
                    </li>
                          
                    <li>
                        <a href="#tab_default_7" data-toggle="tab">SEMINAR</a>
                    </li>   
                    <li>
                        <a href="#tab_default_8" data-toggle="tab">CENSOR</a>
                    </li>   


                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="well well-sm">
                            <h4>PERSONAL DATA</h4>
                        </div>
<?php
include('reportclass.php');
$userid=$_GET['ent'];
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordemployee($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>
    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">

                        <tbody>
                            <tr>      
                                <td>Employee #</td>
                                <td><?php echo htmlentities($row['ent']);?></td> 
                            </tr>
                            <tr>      
                                <td>IPPIS #</td> 

                                <td><?php echo htmlentities($row['ippis']);?></td> 
                            </tr>
                            <tr>    
                                <td>Fullname</td>
                                <td><?php echo htmlentities($row['lname']);?><?php echo htmlentities($row['fname']);?><?php echo htmlentities($row['mname']);?></td>
                            </tr>
                     
                            <tr>
                                <td>Gender</td>
                                <td><?php echo htmlentities($row['gender']);?></td>
                            </tr>
                            <tr>
                                <td>Email Address </td>
                                <td>:<?php echo htmlentities($row['email']);?> </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>:<?php echo htmlentities($row['phone']);?> </td>
                            </tr>
                            <tr>
                                <td>State of Origin</td>
                                <td>:<?php echo htmlentities($row['stateoforigin']);?> </td>
                            </tr>
                            <tr>
                                <td>Marital Status</td>
                                <td>:<?php echo htmlentities($row['marital']);?> </td> 
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:<?php echo htmlentities($row['address']);?> </td>
                            </tr>

                            <?php } else{?>
   
                            <tr>
                                <td>No Record Found</td>
                                <td></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="tab-pane" id="tab_default_2">
                    <div class="well well-sm">
                        <h4>SERVICE/EMOLUMENT RECORD</h4>
                    </div>
                   
                   
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                          
                    <thead>
                            <tr>
                            <th>S/N</th>
                                <th>APPOINTMENT</th>
                                <th>MODE</th>
                                <th>DESIGNATION</th>
                                <th>STRUCTURE</th> 
                                <th>LEVEL</th>
                                <th>STEP</th>
                                <th>SALARY</th>
                                <th>DATE</th> 
                            </tr></thead>
                            <tbody>
                            <tr>

<?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordservice($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>              
                                <td><?php echo $cnt++;?></td>
                                <td><?php echo htmlentities($row['appointment']);?></td>
                                <td><?php echo htmlentities($row['mode']);?></td>
                                <td><?php echo htmlentities($row['designation']);?></td>
                                <td>
                                <?php 
                                $oneresult1=new DB_con();
                                $oneresult1=$oneresult1->showAllData($row['id']);
                                ?>
                                </td>
                                <td><?php echo htmlentities($row['level']);?></td>
                                <td><?php echo htmlentities($row['step']);?></td>
                                <td><?php echo htmlentities($row['salary']);?></td>
                                <td><?php echo htmlentities($row['date']);?></td> 
                            </tr>
                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?>         
                        </tbody>
                    </table>
                </div>
                
                <div class="tab-pane" id="tab_default_3">
                    <div class="well well-sm">
                        <h4>NEXT OF KIN</h4>
                    </div>
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <tbody>

                            <tr>
                               <th>S/N</th>
                                <th>NAME</th>
                                <th>RELATIONSHIP</th>
                                <th>GENDER</th>
                                <th>CITY</th>
                                <th>ADDRESS</th>
                                <th>PHONE NUMBER</th> 
                            </tr>
                            <tr>
                            
<?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordnok($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
    if($sql)
    {
?>                               <td><?php echo $cnt++;?></td>
                                <td><?php echo htmlentities($row['lname']);?><?php echo htmlentities($row['fnamw']);?><?php echo htmlentities($row['mname']);?></td>
                                <td><?php echo htmlentities($row['relationship']);?> </td>
                                <td><?php echo htmlentities($row['gender']);?></td>
                                <td><?php echo htmlentities($row['city']);?></td>
                                <td><?php echo htmlentities($row['address']);?></td>
                                <td><?php echo htmlentities($row['phone']);?></td> 
                            </tr>
                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?>         
                        </tbody>
                    </table>
                    
                    <br/>
                    <br/>
                    
                    <div class="well well-sm">
                        <h4>CHILDREN</h4>
                    </div>
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thread>
                            <tr>
                                <th>S/N</th>
                                <th>NAME</th>
                                <th>GENDER</th>
                                <th>DATE OF BIRTH</th>
                            </tr></thread>
                        <tbody>

                            <tr>
                            
<?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordchildren($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
    if($sql)
    {
?>      
                               <td><?php echo $cnt++;?></td>
                                <td><?php echo htmlentities($row['name']);?></td>
                                <td><?php echo htmlentities($row['gender']);?></td>
                                <td><?php echo htmlentities($row['bdate']);?></td>
                      
                            </tr>
                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?>         
                        </tbody>
                    </table>
                 




                  
                </div>
                
                <div class="tab-pane" id="tab_default_4">
                    <div class="well well-sm">
                        <h4>EDUCATION</h4>
                    </div>
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <tbody>


                        <?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordeducation($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>         <tr>

                                <td>SCHOOL NAME</td>
                                <td>:<?php echo htmlentities($row['school']);?></td>
                            </tr>
                            <tr>
                                <td>COURSE OF STUDY</td>
                                <td>:<?php echo htmlentities($row['course']);?></td>
                            </tr>
                            <tr>
                                <td>CERTIFICATE TYPE</td>
                                <td>: <?php echo htmlentities($row['cert']);?></td>
                            </tr>
                            <tr>
                                <td>SCHOOL GRADE</td>
                                <td>:<?php echo htmlentities($row['grade']);?> </td>
                            </tr>
                            <tr>
                                <td>YEAR OF STUDY</td>
                                <td>:<?php echo htmlentities($row['year']);?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>:<?php //echo htmlentities($row['year']);?> </td>
                            </tr>
                            

                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?> 



                        </tbody>
                    </table>
                </div>
                
                <div class="tab-pane" id="tab_default_5">
                    <div class="well well-sm">
                        <h4>LEAVE</h4>
                    </div>
                  
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thread>
                            <tr>
                            <th>S/N</th>
                                <th>LEAVE TYPE</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>RECOMMENDATION</th>
                                <th>DESTINATION</th>
                            </tr>
                            </thread>
                            <tbody>
                            <?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordleave($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>                               <tr>
                                <td><?php echo $cnt++;?></td>
                                <td><?php echo htmlentities($row['leavetype']);?></td>
                                <td><?php echo htmlentities($row['startdate']);?></td>
                                <td><?php echo htmlentities($row['enddate']);?></td>
                                <td><?php echo htmlentities($row['recommendation']);?></td>
                                <td><?php echo htmlentities($row['destination']);?></td> 
                            </tr>
                          
                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?> 
        </tbody>
                    </table>    
                    <br/>
                </div>
                
                <div class="tab-pane" id="tab_default_6">
                    <div class="CONTAINER-FLUID">
                        <h4>UPLOAD DOCUMENT</h4>
                    </div>
                  
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <tbody>                     
                            <?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordupload($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>                         
                            <tr>
     <td><?php echo htmlentities($row['documentname']);?>
     </br></br><img src="uploads/<?php echo $row['image']; ?>" width="600px" height="500px" style="border:1px solid #333333;">
  
                            </tr>
        <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?> 
                        </tbody>
                    </table>    
                </div>
                


                <div class="tab-pane" id="tab_default_7">
                    <div class="well well-sm">
                        <h4>SEMINAR</h4>
                    </div>
                  
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thread>
                            <tr>
                            <th>S/N</th>
                                <th>TITLE</th>
                                <th>LOCATION</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>REMARKS</th>
                            </tr>
                            </thread>
                            
                            <tbody>
                            <?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordseminar($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>                               <tr>
                                <td><?php echo $cnt++;?></td>
                                <td><?php echo htmlentities($row['title']);?></td>
                                <td><?php echo htmlentities($row['location']);?></td> 
                                <td><?php echo htmlentities($row['startdate']);?></td>
                                <td><?php echo htmlentities($row['enddate']);?></td>
                                <td><?php echo htmlentities($row['remarks']);?></td>
                            </tr>
                          
                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?> 
        </tbody>
                    </table>    
                    <br/>
                </div>
                


                <div class="tab-pane" id="tab_default_8">
                    <div class="well well-sm">
                        <h4>CENSOR</h4>
                    </div>

                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thread><tr>
                    <th>S/N</th>
                                <th>DATE OF OFFENCE</th>
                                <th>SUMMARY</th>
                                <th>PENALTY</th>
                                <th>CENSOR-DATE</th>
                            </tr></thread>
                            <tbody>
                            <?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordcensor($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>                               <tr>
                                <td><?php echo $cnt++;?></td>
                                <td><?php echo htmlentities($row['offencedate']);?></td>
                                <td><?php echo htmlentities($row['summary']);?></td>
                                <td><?php echo htmlentities($row['penalty']);?></td>
                                <td><?php echo htmlentities($row['censordate']);?></td>
                            </tr>
                          
                            <?php } else{?>
   
   <tr>
       <td>No Record Found</td>
       <td></td>
   </tr>
   <?php }} ?> 
        </tbody>
                    </table>    
                    <br/>
                </div>
                





            </div>
        </div>
    </div>
</div>


<div class="col-sm-2">
    <div class="">
        <?php
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecordphotograph($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
      if($sql)
      {
?>     
<?php  echo '<div>' .
 '<img src = "data:image/jpeg;base64,' . base64_encode($row['photo']) . '" class="img-rounded" width=200px" height="250px" />'
 . '</div>'; ?> 
</div>
 <?php } else{?>  
    <?php  echo '<div>' .
 '<img src = "" class="img-rounded" width=200px" height="250px" />'
 . '</div>'; ?> 
   <?php }} ?> 


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
	<script src="reportjs.js"></script>
</body>
</html>
<?PHP } ?> 