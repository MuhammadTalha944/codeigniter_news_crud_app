<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost:5000/user_authentication/user_login_process");
}
?>
<head>
    <title>CodeIgniter | News archive</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <!--data table--> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css" /> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js"></script> 	

</head>
<body>
<div class="container">
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
	<div id="main">
	<div id="login">
	<h2>News App | Login</h2>
	<hr/>
		<div class="col-md-2">
		</div>
		<div class="col-md-6">
					<?php echo form_open('user_authentication/user_login_process'); ?>
					<?php
					echo "<div class='error_msg'>";
					if (isset($error_message)) {
					echo $error_message;
					}
					echo "</div>";
					?>
					<label>Email :</label>
					<input class="form-control" type="email" name="username" id="name" placeholder="email"/>
					<span style="color: red"><?php echo form_error('username'); ?></span>
					<label>Password :</label>
					<input class="form-control" type="password" name="password" id="password" placeholder="**********"/>
					<span style="color: red"><?php echo form_error('password'); ?></span>
					<br>
					<input type="submit" value=" Login " name="submit"/>
					<a href="<?php echo base_url() ?>/user_authentication/user_registration_show">SignUp! Click Here</a>
					<?php echo form_close(); ?>
		</div>
	</div>
	</div>
</div>
</body>
</html>