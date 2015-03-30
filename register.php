<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php require_once("../includes/header.php"); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
    
    $query  = "INSERT INTO users (";
    $query .= "  username, password";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Registered successfully.";
      redirect_to("register.php");
    } else {
      // Failure
      $_SESSION["message"] = "Registration failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<div class="container">
    <!-- Register Form Start -->
    <center><?php if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
    } ?></center>
<div class='col-lg-4 col-lg-offset-4'>
<center><h1><i class='fa fa-user'></i>Register</h1></center>
<form method="POST" action="register.php" accept-charset="UTF-8" class="form-signin">

<input placeholder="Username" class="form-control" name="username" type="text" id="username" />
<input placeholder="Password" class="form-control" name="password" type="password" value="" id="password" />
<input placeholder="Confirm Password" class="form-control" name="password_confirmation" type="password" value="" id="password_confirmation" />
<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button><br/>
</form>
</div>
</div>
      <!-- Register Form End -->

</div> <!-- /container -->
<?php message(); ?>
  <?php $errors = errors(); ?>
  <?php echo form_errors($errors); ?>    
<?php require_once("../includes/footer.php"); ?>