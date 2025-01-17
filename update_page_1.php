<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
 
$query="SELECT * FROM `students` where `id`='$id'";
$result=mysqli_query($connection,$query);
if(!$result){
  die("query failed".mysqli_connect_error());
}else{
 $row=mysqli_fetch_assoc($result);
 //print_r($row);
 
}
}
?>

<?php
  if (isset($_POST['update_students'])) {
    // Retrieve the ID from the URL
    $id = $_GET['id'];

    // Get the updated values from the form
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $age = $_POST['age'];

    // Perform the update query
    $query = "UPDATE `students` SET `first_name`='$f_name', `last_name`='$l_name', `age`='$age' WHERE `id`='$id'";
    echo $query;
   $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=Data updated successfully");
        exit(); // Always exit after header redirection
    }
}

?>
<form action="update_page_1.php?id=<?php echo $id; ?>" method="POST">
<div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']?>">
          </div>
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" class="form-control"value="<?php echo $row['last_name']?>">
          </div>
          
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control"value="<?php echo $row['age']?>">
          </div>
          <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>



<?php include('footer.php'); ?>