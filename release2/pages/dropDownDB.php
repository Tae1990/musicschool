

 <option value="">Choose a month</option>

 <?php
 if(!empty($_POST["monthArr"])){
   $monthArr = $_POST["monthArr"];
   $num=count($monthArr);
 }

 for($i=0; $i<$num; $i++){?>
     <option value=<?php echo $monthArr[$i];?>><?php echo $monthArr[$i];?></option><?php
 }?>
