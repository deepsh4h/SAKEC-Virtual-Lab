<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php include("../includes/header.php"); ?>
<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$user_found = attempt_login($username, $password);

    if ($user_found) {
      // Success
			// Mark user as logged in
			$_SESSION["user_id"] = $user_found["id"];
			$_SESSION["username"] = $user_found["username"];
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<div class="container">

<center><?php echo message(); ?>
    <?php echo form_errors($errors); ?> </center>
<form method="POST" action="login.php" accept-charset="UTF-8" class="form-signin">
<h2 class="form-signin-heading">Please sign in</h2>
<label for="inputUsername" class="sr-only">Username</label>
<input name="username" type="username" id="inputUsername" class="form-control" placeholder="Username" value="<?php echo htmlentities($username); ?>" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
<div class="checkbox">
<label>
<input type="checkbox" value="remember-me"> Remember me
</label>
</div>
<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button><br/>
</form>
</div>
 
<?php include("../includes/footer.php"); ?>