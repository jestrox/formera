<html lang="en">
<?php session_start();
include_once "../../Model/Class/formateur.class.php";
include_once "../../Model/Class/Admin.class.php";
include_once "../../Model/Class/Formation.class.php";
include_once "../../Model\Class\user.class.php";
?>

<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Formera project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/contact.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="header_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="header_content d-flex flex-row align-items-center justify-content-start">
								<div class="logo"><a href="../../index.php">Formera</a></div>
								<nav class="main_nav">
									<ul>

										<li><a href="../../index.php">Home</a></li>

										<li><a href="../../Controllers/search.php">Formation</a></li>

										<li><a href="contact.php">Contact</a></li>
										<?php
										if ((isset($_SESSION["emailAdmin"]) && isset($_SESSION["passwordAdmin"])) || (isset($_SESSION["password"]) && isset($_SESSION["email"])) || (isset($_SESSION["passwordUser"]) && isset($_SESSION["emailUser"]))) {
											echo "<li><a href='../../Controllers\Logout.php'>Logout</a></li>";
										} else {
											echo "
                                    <li><a href='Login.php'>Login</a></li>
                                    <li><a href='Inscription.php'>Inscription</a></li>";
										}
										if (isset($_SESSION["password"]) && isset($_SESSION["email"]) || (isset($_SESSION["passwordUser"]) && isset($_SESSION["emailUser"]))) {
											echo "<li><a href='Profile.php'>Profile</a></li>";
										} elseif (isset($_SESSION["passwordAdmin"]) && isset($_SESSION["emailAdmin"])) {
											echo "<li><a href='../admin/pages/dashboard.php'>Admin</a></li>";
										}
										?>
									</ul>
								</nav>
								<div class="header_extra ml-auto">
								<?php if((isset($_SESSION["emailAdmin"]) && isset($_SESSION["passwordAdmin"])) || (isset($_SESSION["password"]) && isset($_SESSION["email"]))|| (isset($_SESSION["passwordUser"]) && isset($_SESSION["emailUser"]))){ ?>
                                <div class="shopping_cart">
                                    <?php echo '<a href="cart.php?id='.$_SESSION["idUser"].'">'?>
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
                                            <g>
                                                <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
                                                    c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
                                                    C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
                                                    H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
                                                    c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
                                            </g>
                                        </svg>
										<div>Cart <span>(<?php if(isset($_SESSION['nb'])) {
											$p=new Formation();
											$x=0;
											$c=$_SESSION["cart"];
											foreach($c as $row){$x+=$row[1];}echo $x;}else{echo 0;}?>)</span></div>                                    </a>
										
                                </div>
								<?php }?>
									<div class="search">
										<div class="search_icon">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 475.084 475.084" style="enable-background:new 0 0 475.084 475.084;" xml:space="preserve">
												<g>
													<path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
                                                c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
                                                C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
                                                c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
                                                c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
                                                c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
                                                c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
                                                 M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
                                                c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
                                                c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z
                                                " />
												</g>
											</svg>
										</div>
									</div>
									<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Search Panel -->
			<div class="search_panel trans_300">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
								<form action="#">
									<input type="text" class="search_input" placeholder="Search" required="required">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Social -->
			<div class="header_social">
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</header>

		<!-- Menu -->

		<div class="menu menu_mm trans_300">
			<div class="menu_container menu_mm">
				<div class="page_menu_content">

					<div class="page_menu_search menu_mm">
						<form action="#">
							<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for Formations...">
						</form>
					</div>
					<ul class="page_menu_nav menu_mm">
						<li class="page_menu_item has-children menu_mm">
							<a href="index.php">Home<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection menu_mm">
								<li class="page_menu_item menu_mm"><a href="categories.php">Categories<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item menu_mm"><a href="Formation.php">Formation<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item menu_mm"><a href="cart.php">Cart<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item menu_mm"><a href="contact.php">Contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item has-children menu_mm">
							<a href="categories.php">Categories<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection menu_mm">
								<li class="page_menu_item menu_mm"><a href="categories.php">Category<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item menu_mm"><a href="categories.php">Category<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item menu_mm"><a href="categories.php">Category<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item menu_mm"><a href="categories.php">Category<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</li>
						<li class="page_menu_item menu_mm"><a href="index.php">Accessories<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item menu_mm"><a href="contact.php">Contact<i class="fa fa-angle-down"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

			<div class="menu_social">
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>

		<!-- Home -->

		<!-- Contact -->
		<?php
		if ((isset($_SESSION["passwordAdmin"]) && isset($_SESSION["emailAdmin"]))) {
			include_once "../../Model/Config/config.php";
			$cnx = new connexion();
			$PDO = $cnx->CNX();
			$req = "SELECT * from message where reponse=''";
			$res = $PDO->query($req) or print_r($PDO->errorInfo());
			foreach ($res as $row) {
				echo "
	<div class='contact'>
		<div class='container'>
			<div class='row'>
				<!-- Get in touch -->
				<div class='col-lg-8 contact_col'>
					<div class='get_in_touch'>
						<div class='contact_form_container'>
							<form action='../../Controllers/reponse.php' id='contact_form' class='contact_form' method='POST'>
								<div class='row'>
									<div class='col-xl-6'>
										<!-- Name -->
										<label for='contact_name'>The Sender Email</label>
										<input type='text' name='email' id='contact_name' class='contact_input' required='required'  value='$row[1]' readonly/>
										<input type='text' name='id' id='contact_name' class='contact_input' required='required'  value='$row[0]' hidden/>
									</div>
								</div>
								<div>
									<label for='contact_textarea'>Message</label>
									<textarea name='message' id='contact_textarea' class='contact_input contact_textarea' required='required' readonly>$row[2]</textarea>
								</div>
								<div>
								<label for='contact_textarea'>Response</label>
								<textarea name='Response' id='contact_textarea' class='contact_input contact_textarea' required='required'></textarea>
							</div>
								<input type='submit' class='button contact_button' value='Response'/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";
			};
		} else {
			echo "
	<div class='contact'>
		<div class='container'>
			<div class='row'>

				<!-- Get in touch -->
				<div class='col-lg-8 contact_col'>
					<div class='get_in_touch'>
						<div class='section_title'>Get in Touch</div>
						<div class='section_subtitle'>Write us a message</div>
						<div class='contact_form_container'>
							<form action='..\../Controllers\message.php' id='contact_form' class='contact_form' method='POST'>
								<div class='row'>
									<div class='col-xl-6'>
										<!-- Name -->
										<label for='contact_name'>First Name*</label>
										<input type='text' id='contact_name' class='contact_input' required='required'>
									</div>
									<div class='col-xl-6 last_name_col'>
										<!-- Last Name -->
										<label for='contact_last_name'>Last Name*</label>
										<input type='text' id='contact_last_name' class='contact_input' required='required'>
									</div>
								</div>
								<div>
									<label for='contact_textarea'>Message*</label>
									<textarea name='message' id='contact_textarea' class='contact_input contact_textarea' required='required'></textarea>
								</div>
								<input type='submit' class='button contact_button' value='Send Message'/>";
			if (isset($_SESSION["password"]) && isset($_SESSION["email"]))
				echo "<a href='listMsg.php'><input type='button' name='message' value='Messages' class='button contact_button'/></a>";
			echo "
							</form>
						</div>
					</div>
				</div>
				
				<!-- Contact Info -->
				<div class='col-lg-3 offset-xl-1 contact_col'>
					<div class='contact_info'>
						<div class='contact_info_section'>
							<div class='contact_info_title'>Shippiing & Returns</div>
							<ul>
								<li>Phone: <span>+216 28 253 273</span></li>
								<li>Email: <span>abdessalem.masmoudi@esprit.tn</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	";
		}
		?>
		<!-- Footer -->

		<div class="footer_overlay"></div>
		<footer class="footer">
			<div class="footer_background" style="background-image:url(images/footer2.jpg)"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">

							<div class="copyright ml-auto mr-auto">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
							<div class="footer_social ml-lg-auto">
								<ul>
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="js/contact.js"></script>
</body>

</html>