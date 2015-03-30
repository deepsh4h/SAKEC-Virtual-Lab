<?php
include("../../includes/db_connection.php");

 
$h4_block = "View Page!";
$get_contents_sql = "SELECT * FROM experiments";
$get_contents_res = mysqli_query($connection, $get_contents_sql) 
	or die(mysqli_error($connection));
 
if ($get_contents_res = mysqli_query($connection, $get_contents_sql)) {
  //fetch associative array
  while ($row = mysqli_fetch_assoc($get_contents_res)) {
 
    $id = $row['id'];
    $theory = $row['theory'];
    $modified = $row['modified'];
 
    //Draw the results
    $view_block  ="<p>ID: ".$id."</p>";
    $view_block .="<b>Contents</b>:".html_entity_decode($theory);
    $view_block .="<b>Modified</b>:".$modified."<br/>";
  }
}
 
//close connection to MySQL
mysqli_close($connection);
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
  <body>
    <div>
      <h4><?php echo $h4_block; ?></h4>
          <?php echo $view_block; ?>
          <a href="full.php">Back to Page Edit!</a>
    </div>
  </body>
</html>