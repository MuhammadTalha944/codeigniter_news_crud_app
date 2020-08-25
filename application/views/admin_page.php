<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="profile">
<div>
	<h3>Welcome to Admin Page,  <small><?php echo $username ?></small></h3>
	<div style="text-align: right">
		<b id="logout"><a href="logout">Logout</a></b>
	</div>
	<div style="text-align: center;font-size: 25px;">
		<p>
			<?php echo "Your Username is " . '<b style="color: darkred;">'.$username.'</b>'; ?>
		</p>
		<p>
			<?php echo "Your Email is " . '<b style="color: darkred;">'.$email.'</b>'; ?>
		</p>
	</div>
</div>

</div>
<br/>
</body>
</html>
