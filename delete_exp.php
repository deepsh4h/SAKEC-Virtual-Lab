<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_logged_in(); ?>

<?php
  $exp = find_exp_by_id($_GET["id"]);
  if (!$exp) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("admin.php");
  }
  
  $id = $exp["id"];
  $query = "DELETE FROM experiments WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Experiment deleted.";
    redirect_to("admin.php");
  } else {
    // Failure
    $_SESSION["message"] = "Experiment deletion failed.";
    redirect_to("admin.php");
  }
  
?>
