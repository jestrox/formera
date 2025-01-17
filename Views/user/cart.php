<html lang="en">
<?php session_start();
include_once "../../Model/Class/formateur.class.php";
include_once "../../Model/Class/Admin.class.php";
include_once "../../Model/Class/Formation.class.php";
include_once "../../Model\Class\user.class.php";
include_once "../../Model\Class\participation.class.php";
include_once "../../Model\Class/favourit.class.php";
?>

<head>
	<title>Formation</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Formera project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/product.css">
	<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>

<body>
	<?php if (isset($_SESSION["passwordUser"]) && isset($_SESSION["emailUser"])) {

	?>
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
											<li><a href="formation.php">Formation</a></li>

											<li><a href="contact.php">Contact</a></li>
											<?php
											if ((isset($_SESSION["emailAdmin"]) && isset($_SESSION["passwordAdmin"])) || (isset($_SESSION["password"]) && isset($_SESSION["email"])) || (isset($_SESSION["passwordUser"]) && isset($_SESSION["emailUser"]))) {
												echo "<li><a href='../../Controllers\Logout.php'>Logout</a></li>";
											} else {
												echo "
                                    <li><a href='Login.php'>Login</a></li>
                                    <li><a href='Inscription.php'>Registration</a></li>";
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
									<?php if ((isset($_SESSION["passwordUser"]) && isset($_SESSION["emailUser"]))) { ?> 
										<div class="shopping_cart">
											<?php echo '<a href="cart.php?id=' . $_SESSION["idUser"] . '">' ?>

											<div>❤️ Favoris <span>(<?php if (isset($_SESSION['nb'])) {
																		$p = new Formation();
																		$x = 0;
																		$c = $_SESSION["cart"];
																		foreach ($c as $row) {
																			$x += $row[1];
																		}
																		echo $x;
																	} else {
																		echo 0;
																	} ?>)</span></div> </a>

										</div>
									<?php } ?>
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
										<input type="text" class="search_input" placeholder="Search" style="width: 250px;">
										<input type="text" class="search_input" placeholder="Search" style="width: 250px;">
										<input type="text" class="search_input" placeholder="Search" style="width: 250px;">
										<input type="text" class="search_input" placeholder="Search" style="width: 250px;">
										<button type="submit" style="height: 30px; width: 20px;"><i class="fa fa-search"></i></button>
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
								<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
							</form>
						</div>
						<ul class="page_menu_nav menu_mm">
							<li class="page_menu_item has-children menu_mm">
								<a href="index.php">Home<i class="fa fa-angle-down"></i></a>
								<ul class="page_menu_selection menu_mm">
									<li class="page_menu_item menu_mm"><a href="categories.php">Categories<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item menu_mm"><a href="prod.php">Product<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item menu_mm"><a href="cart.php">Cart<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item menu_mm"><a href="checkout.php">Checkout<i class="fa fa-angle-down"></i></a></li>
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



			<!-- Product Details -->


			<div class="container">

				<div class="products">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<div class="products_title">Related Products</div>
							</div>
						</div>

						<div class="row">
							<div class="col">

								<div class="product_grid">

									<!-- Product -->
									<?php
									$part = new Favourit();
									$list=$part->RechFavouritUser($_GET["id"]);
									foreach ($list as $row) {
										$f = new Formation();
										$form=$f->RechFormation($row[2])->fetch();
										echo '<div class="product">
                        <div class="product_image"><img src="images\formation\\' . $form[5] . '" alt=""  width="300px" height="200px"></div>
							<div class="product_content">
								<div class="product_title"><a href="formationDetails.php?id=' . $form[0] . '">' . $form[1] . '</a></div>
								<div class="product_price">' . $form[2] . '$</div>
							</div>
                        </div>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>


		</div>


		</div>

		<!-- Footer -->

		<div class="footer_overlay"></div>
		<footer class="footer">
			<div class="footer_background" style="background-image:url(images/footer2.jpg)"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
							<div class="footer_logo"><a href="#">Formera.</a></div>
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
		<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
		<script src="plugins/easing/easing.js"></script>
		<script src="plugins/parallax-js-master/parallax.min.js"></script>
		<script src="js/product.js"></script>
	<?php } else {
		header("location:../../index.php");
	} ?>
</body>

</html>