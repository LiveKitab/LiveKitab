<?php
    include("../../../db/connect.php");
    
    if(isset($_POST['id']))
    {
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $id = htmlspecialchars($id);
        
        $str="select b_id from branch_data where id='$id' LIMIT 1";
        $runresult = mysqli_query($con,$str);
        if(mysqli_num_rows($runresult)>0)
        {
          while($row1=mysqli_fetch_array($runresult))
          {
            $b_id=$row1['b_id'];
          }
          $pro="select id from term_data where b_id='$b_id'";
          $runpro = mysqli_query($con,$pro);
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
                  toastr["warning"]("This Branch Content Term So First Remove Data From Branch First..!","Not Deleted")
          </script>
        <?php            
          }
          else
          {
        
        $data = "delete from branch_data where id='$id'";
        $result = mysqli_query($con,$data) or die(mysqli_error($con));
        if($result)
        {
            ?>
			<script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["error"]("Deleted Success...!","Branch")
		</script>
		<?php
        }
        else
        {
            ?>
            <script>
              toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
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
                      toastr["error"]("No Branch Found...!","Failed")
              </script>
              <?php	          
        }
    }
?>