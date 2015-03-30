<?php
include("../../includes/db_connection.php");

 
$h4_block = "Contents Saved!";
$elm1 = $_POST['elm1'];
$entity_elm1 = htmlentities($elm1);
$entity_elm1 = mysqli_real_escape_string($connection, $entity_elm1);
$add_contents_sql = "UPDATE experiments SET `theory`=
	'$entity_elm1', `modified`=now()";
$add_contents_res = mysqli_query($connection, $add_contents_sql) 
	or die(mysqli_error($connection));
 
//close connection to MySQL
mysqli_close($connection);
 
//create nice message for user
$display_block = "<p>The page has been successfully updated.</p>";
 
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
  <body>
    <div>
      <h4><?php echo $h4_block; ?></h4>
          <?php echo $display_block; ?>
          <a href="view.php">View Page!</a>
    </div>
  </body>
</html>