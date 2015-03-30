<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php admin_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("name", "path");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("name" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $name = mysql_prep($_POST["name"]);
    $aim = mysql_prep($_POST["aim"]);
    $requirement = mysqli_real_escape_string($connection, htmlentities($_POST["requirement"]));
    $objective = mysqli_real_escape_string($connection, htmlentities($_POST["objective"]));
    $theory = mysqli_real_escape_string($connection, htmlentities($_POST["theory"]));
    $path = mysql_prep($_POST["path"]);
    
    $query  = "INSERT INTO experiments (";
    $query .= "  name, aim, requirement, objective, theory, path";
    $query .= ") VALUES (";
    $query .= "  '{$name}', '{$aim}', '{$requirement}', '{$objective}', '{$theory}', '{$path}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Experiment added.";
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Experiment addition failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>

<!DOCTYPE html>
<html>
<head>
<title>
SAKEC Virtual Lab
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 
<link media="all" type="text/css" rel="stylesheet" href="css/bootstrap.css">
<link media="all" type="text/css" rel="stylesheet" href="css/bootstrap-theme.css">
<link media="all" type="text/css" rel="stylesheet" href="css/signin.css">
     <link href="justified-nav.css" rel="stylesheet">
     
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

// Example content CSS (should be your site CSS)
content_css : "tinymce/examples/css/content.css",

// Drop lists for link/image/media/template dialogs
template_external_list_url : "tinymce/examples/lists/template_list.js",
external_link_list_url : "tinymce/examples/lists/link_list.js",
external_image_list_url : "tinymce/examples/lists/image_list.js",
media_external_list_url : "tinymce/examples/lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

</head>
<body>
<div id="wrapper">
	<div id="header">
		<table>
			<tr>
				<td>
	  				<div id="logo" align='center'>
					<table border='0'>
						<tr>
							<td>
								<h1><a href="#">Virtual Labs - SAKEC</a></h1>
							</td>
						</tr>
					</table>
		  			</div>
				</td>
			</tr>
		</table>
	</div>
</div>	
<!-- end #header -->
<div class="navbar-wrapper">
<div class="navbar navbar-inverse" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">SAKEC Virtual Lab</a>
</div>
 
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="index.php">Home</a></li>
<li><a href="experiments.php">Experiments</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php 
    if(isset($_SESSION['user_id'])){
    if($_SESSION['username']=='admin') {
        $link = 'admin.php';
    }
    else{
        $link = '#';
    }}
    ?>
<?php 
if(isset($_SESSION['user_id'])){
    echo "<li><a href=\"$link\">" . htmlentities($_SESSION["username"]) . "</a></li>" ;
    echo "<li><a href=\"logout.php\">Logout</a></li>";
}
else{
    echo "<li><a href=\"login.php\">Login</a></li>";
    echo "<li><a href=\"register.php\">Register</a></li>";
}
?>
</ul>
</ul>
</div>
</div>
</div>
</div>
<div class="container">
<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    <center>
    <h2>Add new experiment</h2>
    <form action="add_exp.php" method="post">
      <table class="table table-bordered">
      <tr>  
        <td width="10%"><b>Name: </b></td>
        <td width="90%"><input type="textarea" name="name" size="60" /></td>
      </td>
      </tr>
        <td width="10%"><b>Aim: </b></td>
        <td width="90%"><input type="textarea" name="aim" size="100" /></td>
      </tr>
      <tr>
        <td width="10%"><b>Requirement: </b></td>
        <td width="90%"><textarea name="requirement" rows="4" cols="100" /></textarea></td>
      </tr>
      <tr>
        <td width="10%"><b>Objective: </b></td>
        <td width="90%"><textarea name="objective" rows="4" cols="100" /></textarea></td>
      </tr>
      <tr>
        <td width="10%"><b>Theory: </b></td>
        <td width="90%"><textarea name="theory" rows="15" cols="100" /></textarea></td> 
      </tr>
      <tr>  
        <td width="10%"><b>Path: </b></td>
        <td width="90%"><input type="textarea" name="path" size="35"/></td>
      </tr>
      </table>
      <input type="submit" name="submit" value="Add Experiment" />
    </form>
    <br />
    <a href="admin.php">Cancel</a>
  </div>
  </center>
</div>
</div>
<?php include("../includes/footer.php"); ?>
