<?php
    include("../../../db/connect.php");
    
    if(isset($_POST['id']))
    {
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $id = htmlspecialchars($id);
        
        $tem="select term_id from term_data where id='$id' LIMIT 1";
        $runresult = mysqli_query($con,$tem);
        if(mysqli_num_rows($runresult)>0)
        {
          while($row1=mysqli_fetch_array($runresult))
          {
            $term_id=$row1['term_id'];
          }
          $sub="select id from subject_data where term_id='$term_id'";
          $runpro = mysqli_query($con,$sub);
          if(mysqli_num_rows($runpro)>0)
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
                  toastr["warning"]("This Term Content Branch So First Remove Data From Term First..!","Not Deleted")
          </script>
        <?php            
          }
          else
          {
        
        $data = "delete from term_data where id='$id'";
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
            toastr["error"]("Deleted Success...!","Term")
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
                      toastr["error"]("No Term Found...!","Failed")
              </script>
              <?php	          
        }
    }
?>