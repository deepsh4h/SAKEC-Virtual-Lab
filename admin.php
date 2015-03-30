<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_logged_in(); ?>

<?php
  $exp_set = find_all_experiments();
  $i=1;
?>
<?php include("../includes/header.php"); ?>

<div class="container">
<center><?php if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
    } ?></center>
    <h2>Experiments List</h2><br />
<table class="table table-bordered">
      <tr>
        <th style="text-align: left;">#</th>
        <th style="text-align: left; width: 600px;">Name</th>
        <th style="text-align: left;">Actions</th>
      </tr>
<?php while($exp = mysqli_fetch_assoc($exp_set)) { ?>
      <tr>
        <?php
            echo "<td>" . $i++ . "</td>";
         ?> 
        <td><?php echo htmlentities($exp["name"]); ?></td>
        <td><a href="view_experiment.php?id=<?php echo urlencode($exp["id"]); ?>">View</a>
        <a href="edit_exp.php?id=<?php echo urlencode($exp["id"]); ?>">Edit</a>
        <a href="downloads/<?php echo urlencode($exp["path"]); ?>">Download</a>
        <a href="delete_exp.php?id=<?php echo urlencode($exp["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
      </tr>
    <?php } ?>
    </table>
    
    <center><a href="add_exp.php">Add new experiment</a></center>
    <br />
</div>
<?php include("../includes/footer.php"); ?>