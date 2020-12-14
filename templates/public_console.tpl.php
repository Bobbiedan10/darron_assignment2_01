<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
</head>
<body onload="loadData();display();">
	<div class="wrapper j_center a_center">

		<div class="container Box">

			<div class="Heading">

				<div class="head_but j_txt_center a_txt_center">

					<div>
						<img class="image" src="img/COA.jpg" alt="Coat">
					</div>
					<div class="title">
						<p><strong>Barbados Revenue Authority</strong></p>
						<p><strong>Vehicle Licensing and Registration System</strong></p>
					</div>
					<div class="dropdown-menu">
						<input type="checkbox" id="menus" name="">
						<label for="menus"><i class="fa fa-reorder"></i></label>
						<div class="menu-content">
							<ul>
								<li><a href="logout.php">Log Out</a></li>
							</ul>
						</div>
					</div>
				</div>
			
				<div class="Sub-head">
					<div class="col">
						<div id="F_name">Name: <?php 
								echo $_SESSION['session_user']['name'];?></div>
						<div id="L_num">License No. : <?php echo $_SESSION['session_user']['licenseNo'];?>
						</div>
					</div>
				</div>

			</div><br>

			<div class="panel">
			
				<div class="P-row">
					<div class="btn">
						<button><a href="index.html">Renew License</a></button>
					</div>

					<div class="btn">
						<button><a href="index.html">Change Vehicle Registration</a></button>
					</div>
				</div>
				
				<div class="P-row">
					<div class="btn">
						<button><a href="index.html">Request Sticker</a></button>
					</div>

					<div class="btn">
						<button><a href="index.html">Register Vehicle</a></button>
					</div>
				</div>
			</div>
            
				
		</div>
	</div>
	
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>