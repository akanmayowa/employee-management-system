
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

  <a class="btn btn-primary" href="#myModal" data-toggle="modal">Click Here To Add</a>
	<br>
	<br>
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
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<h3 id="myModalLabel">Add</h3>
</div>
<div class="modal-body">
<form method="post" action="upload.php" id="newForm" enctype="multipart/form-data">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Employee #</label></td>
		<td width="30"></td>
		<td><input type="text" name="ent" readonly value="<?php echo htmlentities($result->ent);?>" required /></td>
	</tr>
    <tr>
		<td><label style="color:#3a87ad; font-size:18px;">Document Type</label></td>
		<td width="30"></td>
		<td><input type="text" class="form-control" name="documentname"  required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Created By</label></td>
		<td width="30"></td>
		<td><input type="text" readonly value="<?php echo htmlentities($result->createdby);?>" name="createdby"  required /></td>
	</tr>
    <?php }} ?>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Select your Image</label></td>
		<td width="30"></td>
		<td><input type="file" id="file" onchange="return fileValidation()" required name="image"></td>
	</tr>
	<tr>
		<td height="100"col="3" rowspan="3" width="100"> <div height="100"  width="30" id="imagePreview"></div></td>
	</tr>
</table>

    </div>
    <div class="modal-footer">
	<button class="btn"  onclick="javascript:window.location.reload()" class="close" type="reset"  data-dismiss="modal" aria-hidden="true">Close</button>
<button type="submit" name="Submit" class="btn btn-primary">Upload</button>
    </div>
</form>
</div>		
<script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = 
                    /(\.doc|\.docx|\.odt|\.pdf|\.tex|\.txt|\.rtf|\.wps|\.wks|\.wpd|\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) 
			{
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            if (fi.files.length > 0) 
            {
            for (const i = 0; i <= fi.files.length - 1; i++) {
 
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 5096) {
                    alert(
                      "File too Big, please select a file less than 4mb");
                } else if (file < 500) {
                    alert(
                      "File too small, please select a file greater than 50kb");
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
           
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }

			


        }
    </script>

<?PHP } ?> 