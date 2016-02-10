<html>
<head>
  <title>User Login</title>
  <meta charsif="utf-8">
  <style type="text/css">
  		.error {
  			color:red;
  		}
  		.container h1 {
  			margin-left: 30px;
  			margin-top: 20px;
  		}
  		.register, .login{
  			display:inline-block;
  			vertical-align: top;
  			border: 2px solid black;
  			padding: 20px;
  			margin-left: 30px;
  			margin-top: 0px;
  		}
  		.input {
  			margin: 5px;
  		}
  		
  </style>
</head>
<body>
<?php 
  	if($this->session->flashdata("login_error")) {
 ?>
 	<div class="error">
	   <?=$this->session->flashdata("login_error");?>
	</div>
<?php
 	}
?>
<?php
 	if($this->session->flashdata("error")) {
?>
	<div class="error">
 		<?= $this->session->flashdata("error"); ?>
 </div>
<?php
 }
?>
			<div class="container">
				<h1>Welcome!</h1>
				<div class="register">
				  	<h1>Register</h1>
				  	<form action="/users/register" method="POST">
						  <div class="input">
						    <label for="name">Name:</label>
						    <input type="text" name="name">
						  </div>
						  <div class="input">
						    <label for="alias">Alias:</label>
						    <input type="text" name="alias">
						  </div>
						  <div class="input">
						    <label for="email">Email address:</label>
						    <input type="email" name="email">
						  </div>
						  <div class="input">
						    <label for="password">Password:</label>
						    <input type="password"  name="password"> <br>
						    * Password must be at least 8 characters long!
						  </div>
						  <div class="input">
						    <label for="confirm_password">Confirm Password:</label>
						    <input type="password"  name="confirm_password">
						  </div>
						  <div class="input">
						    <label for="date_of_birth">Date of Birth:</label>
						    <input type="date"  name="date_of_birth">
						  </div>
						  <input type="submit" value="Register">
						</form>
				  </div>
				  <div class="login">
						<h1>Login</h1>
						<form action="/users/login" method="POST">
						  <div class="input">
						    <label for="email">Email address:</label>
						    <input type="email"  name="email">
						  </div>
						  <div class="input">
						    <label for="password">Password:</label>
						    <input type="password"  name="password">
						  </div>
						  <input type="submit" value="Sign In">
						</form>
				</div>
			</div>
</body>