<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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
						<p><strong>Account Registration</strong></p>
						<p>All fields required *</p>
					</div>
				</div>

			</div><br>

			<div class="form j_center">

				<form class="signup" action="registration.php" method="post" onsubmit="reg(event)">
					<div class="form-row">
						<label for="national id">National ID</label>
						<input type="text" id="national_id" name="national_id"
                       value="<?php if(isset($national_id)): echo $national_id; endif;  ?>">
                        <span class="err" id="national_id_err">
                        <?php
                        if(isset($errors['national_id']))
                        {
                            echo $errors['national_id'];
                        }?>
                        </span>
					</div>

					<div class="form-row">
						<label for="license no">License No.</label>
						<input placeholder="DOB (YYYYMMDD)" type="text" id="license_no" name="licenseNo" value="<?php if(isset($licenseNo)): echo $licenseno; endif; ?>" <?php if(isset($licenseNo)): echo $_SESSION['readonly']; endif; ?>>
						<span class="err" id="license_no_err">
                       <?php
                        if(isset($errors['licenseNo']))
                        {
                           echo $errors['licenseNo'];
                        }
                        ?>
                        </span>
					</div>

					<div class="form-row">
						<label for="first name">First Name</label>
						<input type="text" id="first_name" name="firstName"value="<?php if(isset($firstName)): echo $firstName; endif; ?>">
						<span class="err" id="f_name_err">
                       <?php
                        if(isset($errors['firstName']))
                        {
                           echo $errors['firstName'];
                        }
                        ?>
						</span>
					</div>

					<div class="form-row">
						<label for="last name">Last Name</label>
						<input type="text" id="last_name" name="surname" value="<?php if(isset($lname)): echo $lname; endif;  ?>">
						<span class="err" id="l_name_err"> <?php
                        if(isset($lname))
                        {
                            echo $_SESSION['surnameErr'];
                        }
                        ?>
                        </span>
					</div>
					
					<div class="form-row">
						<label for="last name">Email</label>
						<input type="text" id="email" name="email" value="<?php if(isset($email)): echo $email; endif;  ?>">
						<span class="err" id="email_err"> <?php
                        if(isset($email))
                        {
                            echo $_SESSION['emailErr'];
                        }
                        ?>
                        </span>
					</div>
					
					<div class="form-row">
						<label for="last name">Telephone</label>
						<div>
						    <input type="text" id="prefix" name="prefix" style="width: 20%;" value="<?php if(isset($prefix)): echo $prefix; endif;  ?>"> - 
						    <input type="text" id="suffix" name="lineNumber"
						    style="width: 70%;" value="<?php if(isset($line_number)): echo $line_number; endif;  ?>">
						</div>
						<span class="err" id="tele_err"> <?php
                        if(isset($prefix) && isset($line_number))
                        {
                            echo $_SESSION['telErr'];
                        }
                        ?>
                        </span>
					</div>
						
					<div class="form-row">
						<label for="address 1">Address 1</label>
						<input type="text" id="address_1" name="address1" value="<?php if(isset($addr)): echo $addr; endif;  ?>">
						<span class="err" id="add1_err"> <?php
                        if(isset($addr))
                        {
                            echo $_SESSION['add1Err'];
                        }
                        ?>
                        </span>
					</div>
						
					<div class="form-row">
						<label for="address 2">Address 2</label>
						<input type="text" id="address_2" name="address2" value="<?php if(isset($addr2)): echo $addr2; endif;  ?>">
						<span class="err" id="add2_err"> <?php
                        if(isset($addr2))
                        {
                            echo $_SESSION['add2Err'];
                        }
                        ?>
                        </span>
					</div>
						
					<div class="form-row">
						<label for="parish">Parish</label>
						<select id="parish" name ="parish" value="<?php if(isset($id)): echo $id; endif;  ?>">
							<?php loadParishes(); ?>
						</select>
						<span class="err" id="parish_err"><?php
                        if(isset($addr))
                        {
						    echo $_SESSION['parishErr'];
                        }
                        ?>
						</span>
					</div>
					<div class="button">

						<input type="submit" name="register" id="register" value="Register">
						
						<input type="button" name="cancel" id="cancel" value="Cancel" onclick="window.location.href = 'index.php'">
					</div>
					
					<div>
					    <input name="validation_by_js" type="hidden" value="">
					</div>
				</form>

				
			</div>
		</div>
	</div>
<!-- <script type="text/javascript" src="js/scripts.js"></script> -->
</body>
</html>