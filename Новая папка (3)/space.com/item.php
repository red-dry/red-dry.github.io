<?php 
	session_start();
    include("connect.php");
	include("registration.php");

    $id = $_GET['id'];
    $res = mysql_query("SELECT * FROM tour join planet on tour.planet_name  = planet.planet_name join shattle on tour.shuttle_name  = shattle.shattle_name WHERE tour_id = $id", $link);   
    $item = mysql_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title><?php echo($item['planet_name']) ?></title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" type="image/png" href="img/fav.png" sizes="160x160">

	<meta name="theme-color" content="#000"><!-- Chrome, Firefox OS and Opera -->
	<meta name="msapplication-navbutton-color" content="#000"><!-- Windows Phone -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">	<!-- iOS Safari -->

</head>

<body>

	<div class="in-up clearfix">
		<div class="in-up-wrap clearfix">
			<div class="close"></div>
			<form class="log-in-form" action="auth.php" method="POST" style="<?php 
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
				<button  type="submit">log in</button>
			</form>
			<form class="sign-up-form" action="registration.php" method="POST" style="<?php 
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
				if($_SESSION['auth'] == 'auth' && $_SESSION['type'] == 'client'){
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
				if($_SESSION['auth'] == 'auth' && $_SESSION['type'] == 'client'){
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
	<section class="item-main">
        <div class="header">
            <section>
                <img src="img/<?php echo($item['tour_image'])?>" alt="">
                <h1 class=""><?php echo($item['tour_name'])?></h1>
            </section>
        </div>
		<div class="wrap">
			<div class="top-line" style="position: fixed">
				<a class="top-line-title" href='index.php'>spaced</a>
				<div class="top-line-menu">
					<ul>
						<li><a href="all.php">all destinations</a></li>
						<li><a href="#">about</a></li>
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
									echo '<a href="admin/admin.php" class="acc">'.$_SESSION['auth_login'].'</a>';
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
            <div class="tour clearfix">
                <h2>about</h2>
                <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam voluptate excepturi, temporibus accusantium deserunt earum voluptatem recusandae soluta perspiciatis ab non maiores veritatis culpa dolorem tempora odio consequuntur aliquid laborum dolores consectetur quidem. Voluptates maxime a cumque error suscipit mollitia ipsum voluptas quae vitae commodi dignissimos, natus quo, cum necessitatibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. A sequi rem tempore illum voluptatum aliquid laudantium itaque repellat debitis nostrum non accusantium inventore quos, in dolorem deleniti quo at? Id!    </p>
                <ul>
                    <li class="fly"><?php echo($item['tour_fly_days']) ?> days flying</li>
                    <li class="total"><?php echo($item['tour_days_on_planet']) ?> days on planet</li>
                    <li><?php echo($item['planet_distance_mkm']) ?> million km</li>
                </ul>
            </div>
            <div class="resort clearfix">
                <h2><?php echo($item['planet_name']) ?></h2>
                <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam voluptate excepturi, temporibus accusantium deserunt earum voluptatem recusandae soluta perspiciatis ab non maiores veritatis culpa dolorem tempora odio consequuntur aliquid laborum dolores consectetur quidem. Voluptates maxime a cumque error suscipit mollitia ipsum voluptas quae vitae commodi dignissimos, natus quo, cum necessitatibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. A sequi rem tempore illum voluptatum aliquid laudantium itaque repellat debitis nostrum non accusantium inventore quos, in dolorem deleniti quo at? Id!    </p>
                <ul>
                    <li class="fly"><?php echo($item['planet_surname']) ?></li>
                    <li class="total"><?php echo($item['planet_radius']) ?> southand km radius</li>
                    <li><?php echo($item['planet_fact']) ?></li>
                </ul>

            </div>
            <div class="transfer clearfix">
                <h2>transfer</h2>
                <div></div>
                <p><?php echo($item['shuttle_name']) ?></p>
                <ul>
                    <li><?php echo($item['shuttle_speed']) ?> mkm/h</li>
                    <li><?php echo($item['shattle_maxdist']) ?> million km max</li>
                    <li><?php echo($item['shattle_usd']) ?> million usd</li>
                </ul>
            </div>
            
        </div>
        <div class="order" > 
            <div class="order-overlay" >
				<p>thank for order!</p>
			</div>
            <a href="tourId=<?php echo $id?>&tourN=<?php echo($item['tour_name']);?>&tourC=<?php echo($item['tour_usd']);?>&clientId=<?php if($_SESSION['auth'] == 'auth'){
					echo $_SESSION['auth_id'];
				} else{
					echo 0;
				}?>" class="take-order" >take order</a>
            <p class="coast" ><?php echo($item['tour_usd']) ?> million usd</p>
        </div>
	</section>

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.min.css">
	<script src="js/scripts.min.js"></script>

</body>
</html>

