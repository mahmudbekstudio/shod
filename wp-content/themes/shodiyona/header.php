<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="Keywords" content="<?php bloginfo('name') ?>" />
	<meta name="Description" content="<?php bloginfo('description') ?>" />
	<title><?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="">
	<?php wp_head(); ?>

	<link href="<?php bloginfo( 'template_directory' ); ?>/css/swiper.min.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/price-range.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/animate.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/main.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/html5shiv.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<?php
$bodyClass = array();
if(is_front_page() || is_home()) {
	$bodyClass[] = 'index-page';
}

?>
<body class="<?php echo join(' ', $bodyClass) ?>">
<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> <?php the_field('phone', 'option') ?></a></li>
							<li><a href="mailto: <?php $email = get_field('e-mail', 'option'); echo $email; ?>"><i class="fa fa-envelope"></i> <?php echo $email; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<?php
							$topLinks = get_field('top_links', 'option');
							$topLinksLength = count($topLinks);
							for($i = 0; $i < $topLinksLength; $i++) {
								echo '<li><a href="' . $topLinks[$i]['link'] . '" title="' . $topLinks[$i]['title'] . '"><i class="fa fa-' . $topLinks[$i]['icon'] . '"></i></a></li>';
							}
							?>
						</ul>
						<div class="material-menu-button pull-right">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.html"><img src="<?php bloginfo( 'template_directory' ); ?>/images/home/logo.png" alt="" /></a>
					</div>
					<div class="btn-group pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								O'zb
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-menu-sm">
								<li><a href="#">Рус</a></li>
								<li><a href="#">O'zb</a></li>
							</ul>
						</div>

						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								USD
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-menu-sm">
								<li><a href="#">UZS</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-user"></i> Аккаунт</a></li>
							<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Оформления</a></li>
							<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
							<!--li><a href="login.html"><i class="fa fa-lock"></i> Логин</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">

					<div class="material-menu mainmenu">
						<nav>
							<ul class="material-menu-list navbar-nav">
								<li><a href="index.html" class="active">Главная</a></li>
								<li class="has-dropdown"><a href="#">Категория<i class="fa fa-angle-down"></i></a>
									<ul class="dropdown sub-menu">
										<li><a href="shop.html">Рестораны</a></li>
										<li><a href="product-details.html">Организация Свадьбы</a></li>
										<li><a href="checkout.html">Отдых и Развлечения</a></li>
										<li><a href="cart.html">Красота и Здоровье</a></li>
										<li><a href="login.html">Магазины торговля</a></li>
										<li><a href="blog.html">Авто</a></li>
										<li><a href="blog-single.html">Аренда</a></li>
										<li><a href="blog-single.html">Фото и Видео</a></li>
										<li><a href="blog-single.html">Учебные центры</a></li>
									</ul>
								</li>
								<li><a href="#">Новости</a></li>
								<li><a href="contact-us.html">Контакты</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->