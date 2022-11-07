<?php
    include("../../../db/connect.php");
    
    if(isset($_POST['id']))
    {
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $id = htmlspecialchars($id);
        
        $uni="select university_id from university_data where id='$id' LIMIT 1";
        $runresult = mysqli_query($con,$uni);
        if(mysqli_num_rows($runresult)>0)
        {
          while($row1=mysqli_fetch_array($runresult))
          {
            $university_id=$row1['university_id'];
          }
          $med="select id from stream_data where uni='$university_id'";
          $runmed = mysqli_query($con,$med);
          if(mysqli_num_rows($runmed)>0)
          {
            ?>
            <script>
              toastr.options = {
                "closeButton": false,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "1500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "hide"
                }
                  toastr["warning"]("This University Content Stream So First Remove Data From University First..!","Not Deleted")
          </script>
        <?php            
          }
          else
          {
        
        $data = "delete from university_data where id='$id'";
        $result = mysqli_query($con,$data) or die(mysqli_error($con));
        if($result)
        {
            ?>
			<script>
        toastr.options = {
            "closeButton": false,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "1500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "hide"
          }
            toastr["error"]("Deleted Success...!","Program")
		</script>
		<?php
        }
        else
        {
            ?>
            <script>
              toastr.options = {
                "closeButton": false,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "1500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "hide"
                }
                  toastr["warning"]("Something Went Wrong...!","Failed")
          </script>
          <?php	
        }
          }
        }
        else
        {
          ?>
                <script>
                  toastr.options = {
                    "closeButton": false,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "1500",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                    }
                      toastr["error"]("No University Found...!","Failed")
              </script>
              <?php	          
        }
    }
?>