<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
$id = ($this->session->userdata['logged_in']['id']);
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
	<div>
		<?php
		    	$string_to_encrypt=$id;
				$password="password";
				$encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password);
		 ?>
		<h3><a href="http://127.0.0.1:8000/<?php echo $encrypted_string; ?>">Go to Laravel Project</a></h3>
		<!-- <h3><a href="http://127.0.0.1:8000/Checking_route">Go to Laravel Project</a></h3> -->
	</div>
	<div style="text-align: right">
		<b id="logout"><a href="logout">Logout</a></b>
	</div>
	<div style="text-align: center;font-size: 25px;">
		<p>
			<?php echo "Your Username is " . '<b style="color: darkred;">'.$username.'</b>'; ?>
		</p>
		<p>
			<?php echo "Your Email is " . '<b style="color: darkred;">'.$email.'</b>'; ?>
		  <!-- <?php echo $id;  ?>	 -->
		</p>
	</div>
</div>

</div>
<br/>
</body>
</html>
