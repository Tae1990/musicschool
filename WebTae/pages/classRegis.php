<?php
include "../modules/database.php";
?>

<option value="">Choose classes</option>

<?php
if(!empty($_POST["lesson1ID"])){
  $ID1 = $_POST["lesson1ID"];

  $sql="SELECT lessonType FROM lessons WHERE lessonID='$ID1' ";
  $result=$conn->query($sql);
  $rowNum = $result->rowCount();
  $row=$result->fetch(PDO::FETCH_ASSOC);
?>
<option value=<?php echo $ID1; ?>><?php echo $row['lessonType']; ?></option>
<?php
/*
  for($i=1;$i<$rowNum2+1;$i++){ ?>
    <option value=<?php echo $row['lessonID'] ; ?>>
    <?php echo $row['lessonType'];?></option>
    <?php
    $row=$result2->fetch(PDO::FETCH_ASSOC);
  }
*/
} ?>

<?php
if(!empty($_POST["lesson2ID"])){
  $ID2 = $_POST["lesson2ID"];

  $sql="SELECT lessonType FROM lessons WHERE lessonID='$ID2' ";
  $result=$conn->query($sql);
  $rowNum = $result->rowCount();
  $row=$result->fetch(PDO::FETCH_ASSOC);
?>
<option value=<?php echo $ID2; ?>><?php echo $row['lessonType']; ?></option>
<?php
} ?>

<?php
if(!empty($_POST["lesson3ID"])){
  $ID3 = $_POST["lesson3ID"];

  $sql="SELECT lessonType FROM lessons WHERE lessonID='$ID3' ";
  $result=$conn->query($sql);
  $rowNum = $result->rowCount();
  $row=$result->fetch(PDO::FETCH_ASSOC);
?>
<option value=<?php echo $ID3; ?>><?php echo $row['lessonType']; ?></option>
<?php
} ?>

<?php
if(!empty($_POST["lesson4ID"])){
  $ID4 = $_POST["lesson4ID"];

  $sql="SELECT lessonType FROM lessons WHERE lessonID='$ID4' ";
  $result=$conn->query($sql);
  $rowNum = $result->rowCount();
  $row=$result->fetch(PDO::FETCH_ASSOC);
?>
<option value=<?php echo $ID4; ?>><?php echo $row['lessonType']; ?></option>
<?php
} ?>

<?php
if(!empty($_POST["lesson5ID"])){
  $ID5 = $_POST["lesson5ID"];

  $sql="SELECT lessonType FROM lessons WHERE lessonID='$ID5' ";
  $result=$conn->query($sql);
  $rowNum = $result->rowCount();
  $row=$result->fetch(PDO::FETCH_ASSOC);
?>
<option value=<?php echo $ID5; ?>><?php echo $row['lessonType']; ?></option>
<?php
} ?>
