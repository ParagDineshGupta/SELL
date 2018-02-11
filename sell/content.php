<div id="content">
		<div id="left-div">

			<ul>
		<?php 
			if (!isset($_SESSION['id'])) 
			{ 
		?>

			<li><a href="http://localhost/sell">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
				
		<?php	
	        }
			else { 
		?> 

			<li><a href="">C</a></li>
				<li><a href="">I</a></li>
				<li><a href="">S</a></li>
				<li><a href="">V</a></li>
				<li><a href="">D</a></li>
				
		<?php 
	        } 
		?>
				
			</ul>
	
		</div>
		<div id="right-div">
		