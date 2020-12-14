<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/styles.css">
	<meta charset="utf-8">
</head>
<body onload="loadData()">
	<div class="wrapper j_center a_center">

		<div class="container Box">

			<div class="Heading">

				<div class="head j_txt_center a_txt_center">
                    <div>
					<img class="image" src="../../Photos/COA.jpg" alt="Coat">
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

			<div class="form" >
			
				<form class="signup" onsubmit="logIn(event)">
					<div class="form-row">
						<label for="username">Employee ID</label>
						<input type="text" id="username" name="username">
						<span class="err" id="err"></span>
					</div>

					<div class="form-row">
						<label for="password">Password</label>
						<input type="password" id="password" name="password">
						<span class="err" id="err"></span>
					</div>
					<div class="button">

                        <input type="submit" name="sign_In" id="sign_in" value="Sign In"><br>

                        <a href="">Recover Password</a>

				    </div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>