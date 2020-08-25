<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/login/index.php/user_authentication/user_login_process");
}
?>
<head>
<title>CodeIgniter | Registration Form</title>
 <!-- <title>CodeIgniter | News archive</title> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <!--data table--> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css" /> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js"></script>
</head>
<body>
<div class="container">
	<div id="main">
			<div id="login">
					<h2>Registration Form</h2>
					<hr/>
					<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('user_authentication/new_user_registration');

					echo form_label('Create Username : ');
					echo"<br/>";
					echo form_input('username');
					echo "<div class='error_msg'>";
					if (isset($message_display)) {
					echo $message_display;
					}
					echo "</div>";
					echo"<br/>";
					echo form_label('Email : ');
					echo"<br/>";
					$data = array(
					'type' => 'email',
					'name' => 'email_value'
					);
					echo form_input($data);
					echo"<br/>";
					echo"<br/>";
					echo form_label('Password : ');
					echo"<br/>";
					echo form_password('password');
					echo"<br/>";
					echo"<br/>";
					echo form_submit('submit', 'Sign Up');
					echo form_close();
					?>
					<a href="<?php echo base_url() ?> ">For Login Click Here</a>
			</div>
	</div>
</div>
</body>
</html>