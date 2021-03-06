<?php
	include("connect.php");
	include("registration.php");

	session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title>SPACE</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" type="image/png" href="img/fav.png" sizes="160x160">

	<meta name="theme-color" content="#000"><!-- Chrome, Firefox OS and Opera -->
	<meta name="msapplication-navbutton-color" content="#000"><!-- Windows Phone -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">	<!-- iOS Safari -->

</head>

<body style="overflow-y: hidden">

	<div class="in-up clearfix">
		<div class="in-up-wrap clearfix">
			<div class="close"></div>
			<form class="log-in-form" action="auth.php" method="POST"
			style="<?php 
				if($_SESSION['auth'] == 'auth'){
					echo 'display: none';
				} else{
					echo 'display: block';
				}
			?> ">
				<h2 class="log-in">log in</h2>
					<ul>
						<li>
							<input class="login-input" name="login" type="text" placeholder="login"  autocomplete="off">
						</li>
						<li>
							<input class="password-input" name="password" type="password" placeholder="password"  autocomplete="off">
						</li>
					</ul>
				<button>log in</button>
			</form>
			<form class="sign-up-form" action="registration.php" method="POST" 
			style="<?php 
				if($_SESSION['auth'] == 'auth'){
					echo 'display: none';
				} else{
					echo 'display: block';
				}
			?> ">
				<h2 class="sign-up">sign up</h2>
				<ul>
					<li>
						<input type="text" placeholder="login" name="login-up"  autocomplete="off">
					</li>
					<li>
						<input type="text" placeholder="name" name="name"  autocomplete="off">
					</li>
					<li>
						<input type="text" placeholder="lastname" name="lastname"  autocomplete="off">
					</li>
					<li>
						<input type="text" placeholder="email" name="email"  autocomplete="off">
					</li>
					<li>
						<input type="password" placeholder="password" name="password-up"  autocomplete="off">
					</li>
				</ul>
				<button type="submit" class = "submit-up">sign up</button>
			</form>
			<form class="account-form" action="accset.php" method="POST"
			style="<?php 
				if($_SESSION['auth'] == 'auth'){
					echo 'display: block';
				} else{
					echo 'display: none';
				}
			?> ">
				<h2 class="account"> <?php echo $_SESSION['auth_login']; ?></h2>
				<ul>
					<li>
						<p>name</p><input class="acc-name" name="acc-name" type="text" value="" placeholder="" autocomplete="off">
					</li>
					<li>
						<p>lastname</p><input class="acc-lastname" name="acc-lastname" type="text" value=""  autocomplete="off">
					</li>
					<li>
						<p>email</p><input class="acc-email" name="acc-email" type="text" value=""  autocomplete="off">
					</li>
					<li>
						<p>number</p><input class="acc-number" name="acc-number" type="text" value=""  autocomplete="off">
					</li>
					<li>
						<p>born</p><input class="acc-born" name="acc-born" type="text" value=""  autocomplete="off">
					</li>
				</ul>
				<button>change</button>
			</form>
			<table class="order-list clearfix" 
			style="<?php 
				if($_SESSION['auth'] == 'auth'){
					echo 'display: block';
				} else{
					echo 'display: none';
				}
			?>">
				<caption class="order-title">your orders</caption>
				<tr class="order-item">
					<th class="date" ></th>
					<th class="name" ></th>
					<th class="cost" ></th>
				</tr>
			</table>
		</div>
	</div>
	<section class="main">
		<div class="main-bcg">
			<div class="space-1"></div>
			<div class="space-2"></div>
		</div>
		<div class="overlay">
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
			<div class="overlay-shadow"></div>
		</div>
		<div class="wrap">
			<div class="patch"></div>
			<div class="top-line">
				<p class="top-line-title">spaced</p>
				<div class="top-line-menu">
					<ul>
						<li> <a href="all.php"> all destinations</a></li>
						<li> <a href="#"> about</a></li>
						<li><?php 
								if($_SESSION['auth'] == 'auth' && $_SESSION['type'] == 'client'){
									echo '<a href="#" class="acc">'.$_SESSION['auth_login'].'</a>';
									echo '<svg version="1.1" class="logout" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							   <g>
								   <g>
									   <g>
										   <path d="M330.667,384c-5.896,0-10.667,4.771-10.667,10.667v74.667c0,11.76-9.573,21.333-21.333,21.333h-256
											   c-11.76,0-21.333-9.573-21.333-21.333V42.667c0-11.76,9.573-21.333,21.333-21.333h256c11.76,0,21.333,9.573,21.333,21.333v74.667
											   c0,5.896,4.771,10.667,10.667,10.667c5.896,0,10.667-4.771,10.667-10.667V42.667C341.333,19.135,322.198,0,298.667,0h-256
											   C19.135,0,0,19.135,0,42.667v426.667C0,492.865,19.135,512,42.667,512h256c23.531,0,42.667-19.135,42.667-42.667v-74.667
											   C341.333,388.771,336.563,384,330.667,384z"/>
										   <path d="M508.542,248.135l-128-117.333c-4.365-3.979-11.083-3.677-15.073,0.656c-3.979,4.344-3.688,11.094,0.656,15.073
											   l107.79,98.802H138.667c-5.896,0-10.667,4.771-10.667,10.667s4.771,10.667,10.667,10.667h335.249l-107.79,98.802
											   c-4.344,3.979-4.635,10.729-0.656,15.073c2.104,2.292,4.979,3.458,7.865,3.458c2.573,0,5.156-0.927,7.208-2.802l128-117.333
											   C510.75,261.844,512,258.99,512,256S510.75,250.156,508.542,248.135z"/>
									   </g>
								   </g>
							   </g>
							   </svg>';
								} else if($_SESSION['auth'] == 'auth' && $_SESSION['type'] == 'worker'){
									echo '<a href="admin/admin.php" class="">'.$_SESSION['auth_login'].'</a>';
									echo '<svg version="1.1" class="logout" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
									<g>
										<g>
											<g>
												<path d="M330.667,384c-5.896,0-10.667,4.771-10.667,10.667v74.667c0,11.76-9.573,21.333-21.333,21.333h-256
													c-11.76,0-21.333-9.573-21.333-21.333V42.667c0-11.76,9.573-21.333,21.333-21.333h256c11.76,0,21.333,9.573,21.333,21.333v74.667
													c0,5.896,4.771,10.667,10.667,10.667c5.896,0,10.667-4.771,10.667-10.667V42.667C341.333,19.135,322.198,0,298.667,0h-256
													C19.135,0,0,19.135,0,42.667v426.667C0,492.865,19.135,512,42.667,512h256c23.531,0,42.667-19.135,42.667-42.667v-74.667
													C341.333,388.771,336.563,384,330.667,384z"/>
												<path d="M508.542,248.135l-128-117.333c-4.365-3.979-11.083-3.677-15.073,0.656c-3.979,4.344-3.688,11.094,0.656,15.073
													l107.79,98.802H138.667c-5.896,0-10.667,4.771-10.667,10.667s4.771,10.667,10.667,10.667h335.249l-107.79,98.802
													c-4.344,3.979-4.635,10.729-0.656,15.073c2.104,2.292,4.979,3.458,7.865,3.458c2.573,0,5.156-0.927,7.208-2.802l128-117.333
													C510.75,261.844,512,258.99,512,256S510.75,250.156,508.542,248.135z"/>
											</g>
										</g>
									</g>
									</svg>';
								} else{
									echo '<a href="#" class="log">log in</a>';
								}
							?> 
						</li>
					</ul>
				</div>
			</div>
			<div class="content">
				<div class="content-bcg">
					<img src="" alt="" class="img" >
				</div>
				<div class="content-top">
					<p class="p">to space and back safely</p>
					<div class="pag-num"> <p class="fnum"></p><p class="snum"></p> </div>
				</div>
					<div class="content-title"> <h1 class="title"></h1></div>
				<div class="content-mid">
					<a href="#" class="look"> <p> look more </p></a>
					<p><span class="span-1">&</span> <span class="span-2">buy</span></p>
					<div class="pag-butt">
						<a href="#" class="prev">prev</a>
						<a href="#" class="next" >next</a>
					</div>
				</div>
				<div class="content-bottom">
					<ul>
						<li ><span class="fly-time"></span> days of flight</li>
						<li ><span class="dist"></span> million km of distance </li>
					</ul>
					<div class="all clearfix">
						<a href="all.php"> see all destination</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/reg.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.min.css">
	<script src="js/scripts.min.js"></script>

</body>
</html>
