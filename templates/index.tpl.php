<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<meta charset="utf-8">
</head>
<body onload="loadData()">
	<div class="wrapper j_center a_center">

		<div class="container Box">

			<div class="Heading">

				<div class="head j_txt_center a_txt_center">
                    <div>
                        <img class="image" src="img/COA.jpg" alt="Coat">
                    </div>
					<div class="title">
						<p><strong>Barbados Revenue Authority</strong></p>
						<p><strong>Vehicle Licensing and Registration System</strong></p>
					</div>
				</div><br>
			
				<div class="Sub-head">
					<div class="col">
						<p><strong>Driver Sign In</strong></p>
					</div>
				</div>

			</div><br>

			<div class="">
                
				<form action="validate.php" class="signup" method="post" onsubmit="logIn(event);">
					<div class="form-row">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" value="<?php if(isset($username)): echo $username; endif; ?>">
						<span class="err" id="err_username">
						<?php if(isset($errors['username'])): echo $errors['username']; endif;?>
						</span>
					</div>

					<div class="form-row">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" value="<?php if(isset($password)): echo $password; endif; ?>">
						<span class="err" id="err_password">
						<?php if(isset($errors['password'])): echo $errors['password']; endif;?>
            </span>
					</div>
					<div class="button">
<?php if(isset($errors['credentials']))
	{
		echo "<p style='color:red;'>".$errors['credentials']."</p>";
	}?>    
                        <input type="submit" name="sign_in" id="sign_in" value="Sign In"><br>

                        <a href="">Forgot Password</a>
                        <a href="registration.php">Sign Up</a>

				    </div>
				    <input name="validation_by_js" type="hidden" value="">
				</form>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src="js/scripts.js"></script> -->
</body>
</html>