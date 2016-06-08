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
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/price-range.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/animate.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/main.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/responsive.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_directory' ); ?>/css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/html5shiv.js"></script>
	<![endif]-->
	<?php
	global $includeFiles;
	foreach($includeFiles['css'] as $cssFile) {
		?>
		<link href="<?php bloginfo( 'template_directory' ); ?>/<?php echo $cssFile; ?>" rel="stylesheet">
	<?php
	}
	?>
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_directory' ); ?>/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<?php
global $q_config;
$bodyClass = array();
if(is_front_page() || is_home()) {
	$bodyClass[] = 'index-page';
}
//print_r($q_config);print_r(get_permalink());exit;
//print_r(qtrans_getSortedLanguages());exit;
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
					<?php if(!(is_front_page() || is_home())) : ?>
					<a href="#" class="back-prev-page"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
					<?php endif; ?>
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
						<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/home/logo.png" alt="" /></a>
					</div>
					<div class="btn-group pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								<?php echo $q_config['language_name'][$q_config['language']]; ?>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-menu-sm">
							<?php
							global $currentUrl;
							foreach($q_config['language_name'] as $lang => $langTitle) {
								if($q_config['language'] != $lang) {
									echo '<li><a href="' . qtranxf_convertURL($currentUrl, $lang) . '">' . $langTitle . '</a></li>';
								}
							}
							?>
							</ul>
						</div>

						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								<?php
								global $currencyCode, $currencyList;
								$currencyListCount = count($currencyList);
								for($i = 0; $i < $currencyListCount; $i++) {
									if($currencyList[$i]['code'] == $currencyCode) {
										echo $currencyList[$i]['title'];
									}
								}
								?>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-menu-sm currency-list">
								<?php
								for($i = 0; $i < $currencyListCount; $i++) {
									if($currencyList[$i]['code'] != $currencyCode) {
										echo '<li><a href="#" data-currency="' . $currencyList[$i]['code'] . '">' . $currencyList[$i]['title'] . '</a></li>';
									}
								}
								?>
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
								<li class="material-menu-logo"><a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/home/logo.png" alt="" /></a></li>
								<?php
								$isFirst = true;
								$menuList = get_menu_list('Menu');
								global $currentUrl;
								foreach($menuList as $id => $menuItem) {
									$menuActive = false;
									if($currentUrl == $menuItem['url']) {
										$menuActive = true;
									}
									if(empty($menuItem['children'])) {
										echo '<li class="' . ($isFirst ? 'first-element' : '') . '"><a href="' . $menuItem['url'] . '" class="' . ($menuActive ? 'active' : '') . '">' . $menuItem['title'] . '</a></li>';
									} else {
										echo '<li class="has-dropdown' . ($isFirst ? ' first-element' : '') . '"><a href="' . $menuItem['url'] . '" class="' . ($menuActive ? 'active' : '') . '">' . $menuItem['title'] . '<i class="fa fa-angle-down"></i></a>';
										echo '<ul class="dropdown sub-menu">';
										foreach($menuItem['children'] as $subMenuId => $subMenuItem) {
											$subMenuActive = false;
											if(site_url() . $_SERVER['REQUEST_URI'] == $subMenuItem['url']) {
												$subMenuActive = true;
											}
											echo '<li><a href="' . $subMenuItem['url'] . '" class="' . ($subMenuActive ? 'active' : '') . '">' . $subMenuItem['title'] . '</a></li>';
										}
										echo '</ul>';
										echo '</li>';
									}
									$isFirst = false;
								}
								?>
								<? /*<li><a href="index.html" class="active">Главная</a></li>
								<li class="has-dropdown"><a href="#">Категория<i class="fa fa-angle-down"></i></a>
									<ul class="dropdown sub-menu">
										<li><a href="restaurant.html">Рестораны</a></li>
										<li><a href="organization.html">Организация Свадьбы</a></li>
										<li><a href="rest.html">Отдых и Развлечения</a></li>
										<li><a href="beuty.html">Красота и Здоровье</a></li>
										<li><a href="shop.html">Магазины торговля</a></li>
										<li><a href="auto.html">Авто</a></li>
										<li><a href="rent.html">Аренда</a></li>
										<li><a href="photo.html">Фото и Видео</a></li>
										<li><a href="training.html">Учебные центры</a></li>
									</ul>
								</li>
								<li><a href="#">Новости</a></li>
								<li><a href="contact-us.html">Контакты</a></li>*/ ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->

<section id="advertisement">
	<div class="container">
		<img src="images/shop/advertisement.jpg" alt="" />
	</div>
</section>