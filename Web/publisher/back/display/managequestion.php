<div id="page-wrap">
		<div id="tabs">
    		<ul>
    		     <?php
    		     $count = 0;
              $cmd="select * from video_question_data where test_id='$test_id' ORDER BY id ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {
                  $count = $count + 1;
                  ?>
        		    <li><a href="<?php echo '#fragment-'.$count; ?>" style="min-width:40px;"><?php echo $count; ?></a></li>
        		<?php
              }
              ?>
    	   </ul>
	
	        <?php
              $number = 0;
              $cmd="select * from video_question_data where test_id='$test_id' ORDER BY id ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {
                  $index = $row['id'];
                  $qid = $row['que_id'];
                  $number = $number+1;
                  $qs=$row['question'];
                  $a=$row['a'];
                  $b=$row['b'];
                  $c=$row['c'];
                  $d=$row['d'];
                  $ans=$row['correct'];
                  $sol=$row['sol'];
                  $qid=base64_encode($qid);
                    
              ?>
        	<div id="<?php echo 'fragment-'.$number; ?>" class="ui-tabs-panel <?php if($number!= 1){ echo 'ui-tabs-hide'; } ?>">
        	     <p class="text-justify"><?php echo 'Q'.$number.$qs; ?> </p> 
        	     <p class="text-justify"><?php echo 'Option A : '.$a; ?> </p> 
        	     <p class="text-justify"><?php echo 'Option B : '.$b; ?> </p> 
        	     <p class="text-justify"><?php echo 'Option C : '.$c; ?> </p> 
        	     <p class="text-justify"><?php echo 'Option D : '.$d; ?>  </p>
        	     <?php
        	        if($sol == 'Not Set')
        	        {
        	            ?>
        	                <p class="text-justify" style="margin-bottom-2%;"><?php echo 'Correct Answer : '.$ans; ?></p>
        	            <?php
        	        }
        	        else
        	        {
        	            ?>
        	                <p class="text-justify"><?php echo 'Correct Answer : '.$ans; ?></p>
        	                <p class="text-justify" style="margin-bottom-2%;"><?php echo 'Solution : '.$sol; ?> </p> 
        	            <?php     
        	        }
        	     ?>
        	         <center>
              <form target="_blank" action="editquestion" method="get">
                            <input type="hidden" name="queid" id="queid" value="<?=$qid;?>">
        <button type="submit" class="ps-btn" name="edit" id="edit" style="background-color:#28a745;"><i class="icon-pencil" style="font-weight:bold;"></i> Edit</button>
                        </form>
                        <br>
<button onclick="deletequestion(<?php echo $row['id'];  ?>)" class="ps-btn"
                      style="background-color:#dc3545;"><i class="icon-trash" style="font-weight:bold;"></i> Delete</button>    
</center>        	</div>

        	<?php
              }
        	?>
        	

        </div>
		
	</div>