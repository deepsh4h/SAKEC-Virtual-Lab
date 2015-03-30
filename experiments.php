<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php confirm_logged_in(); ?>
<?php
  $exp_set = find_all_experiments();
  $i=1;
?>
<?php include("../includes/header.php"); ?>

<div class="container">
    <h2>Experiments List</h2><br />
<table class="table table-bordered">
      <tr>
        <th style="text-align: left;">#</th>
        <th style="text-align: left;">Username</th>
        <th style="text-align: left;">Actions</th>
      </tr>
<?php while($exp = mysqli_fetch_assoc($exp_set)) { ?>
      <tr><?php
            echo "<td>" . $i++ . "</td>";
         ?>   
        <td><?php echo htmlentities($exp["name"]); ?></td>
        <td><a href="view_experiment.php?id=<?php echo urlencode($exp["id"]); ?>">View</a></td>
      </tr>
    <?php } ?>
    </table>
</div>
<?php include("../includes/footer.php"); ?>