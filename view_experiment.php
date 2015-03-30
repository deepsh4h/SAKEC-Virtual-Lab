<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php confirm_logged_in(); ?>
<?php include("../includes/header.php"); ?>
<?php
  $exp = find_exp_by_id($_GET["id"]);
  
  if (!$exp) {
    // exp ID was missing or invalid or 
    // exp couldn't be found in database
    redirect_to("404.php");
  }
?>
<div class="container">
    <center><h2><?php echo htmlentities($exp["name"]); ?></h2><br /></center>
<table class="table table-bordered">
      <tr>  
        <td width="10%"><b>Aim: </b></td>
        <td width="90%"><?php echo htmlentities($exp["name"]); ?></td>
      </tr>
      <tr>  
        <td width="10%"><b>Requirement: </b></td>
        <td width="90%"><?php echo html_entity_decode($exp["requirement"]); ?></td>
      </tr>
      <tr>  
        <td width="10%"><b>Objective: </b></td>
        <td width="90%"><?php echo html_entity_decode($exp["objective"]); ?></td>
      </tr>
      <tr>  
        <td width="10%"><b>Theory: </b></td>
        <td width="90%"><?php echo html_entity_decode($exp["theory"]); ?></td>
      </tr>
      <tr>  
        <td width="10%"><b>Download: </b></td>
        <td width="90%"><a href="downloads/<?php echo urlencode($exp["path"]); ?>">Download</a></td>
      </tr>

    </table>
</div>
<?php include("../includes/footer.php"); ?>