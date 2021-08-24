<div class="modal fade" id="edit<?php echo $customer['id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
</div>
<div class="modal-body">
<div class="container-fluid">
<div class="container-fluid">
<form action="photograph.php" method="post" enctype="multipart/form-data" class="form-horizontal">
     
 <table class="table table-bordered table-responsive">
 
    <tr>
    <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">

     <td><label class="control-label">Employee #</label></td>
        <td><input readonly class="form-control" type="text" name="ent" placeholder="Enter Username" value="<?php echo $customer['ent']; ?>" /></td>
    </tr>
  
    <tr>
     <td><label class="control-label">modifier</label></td>
        <td><input  class="form-control" type="text" name="modifier" value="<?php echo $customer['modifier']; ?>" /></td>
    </tr>

    <tr>
     <td><label class="control-label">Profile Img.</label></td>
        <td><input  class="input-group" required id="file" onchange="return fileValidation()" type="file"  name="photo"  /></td>
    </tr>
    

    <tr>
     <td><label class="control-label">Preview</label></td>
     <td height="100"col="3" rowspan="3" width="100"> <div height="100"  width="30" id="imagePreview"></div></td>    </tr>
    <tr>

    <tr>
    
        <td colspan="2"><button type="submit"  name="update" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save picture
        </button>
        </td>
    </tr>
    </table>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
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