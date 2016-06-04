<?php if(!isset($_POST['ajaxLoad'])) : ?>
<?php
	global $includeFiles;
	$includeFiles['css'][] = 'css/chosen/chosen.min.css';
	$includeFiles['js'][] = 'js/chosen.jquery.min.js';
	$includeFiles['js'][] = 'js/content-category.js';
	$includeFiles['css'][] = 'css/content-category.css';
	get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2><?php Language::_e('Filter'); ?></h2>
					<form action="<?php the_permalink(); ?>" method="post" class="category-filter-wrapper">
						<input type="hidden" name="ajaxLoad" value="1">
						<fieldset class="category-filter-block">
							<legend><?php Language::_e('Region') ?>:</legend>
							<?php
							global $countryList;
							$cityArr = array();
							$districtArr = array();
							$selectCountry = 'uzbekistan';
							$selectRegion = 'tashkent region';

							?>
							<input type="hidden" name="filter[select_country][country]" value="<?php echo $selectCountry; ?>">
							<input type="hidden" name="filter[select_country][region]" value="<?php echo $selectRegion; ?>">
							<?php

							foreach($countryList[$selectCountry][$selectRegion] as $city => $districtList) {
								$cityArr[] = array('name' => $city, 'title' => Language::__($city));
								if(!empty($districtList)) {
									foreach($districtList as $district) {
										$districtArr[] = array('name' => $district, 'title' => Language::__($district), 'parent' => $city);
									}
								}
							}
							?>
							<div class="category-filter-item">
								<div class="category-filter-item-label"><?php Language::_e('Choose a city') ?></div>
								<select style="opacity: 0" data-placeholder="<?php Language::_e('Choose a city') ?>" multiple class="select-country-city chosen-select" name="filter[select_country][city][]">
									<?php foreach($cityArr as $val) : ?>
										<option value="<?php echo $val['name'] ?>"><?php echo $val['title']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="category-filter-item">
								<div class="category-filter-item-label"><?php Language::_e('Choose a district') ?></div>
								<select style="opacity: 0" data-placeholder="<?php Language::_e('Choose a district') ?>" multiple class="select-country-district chosen-select" name="filter[select_country][district][]">
									<?php foreach($districtArr as $val) : ?>
										<option data-parent="<?php echo $val['parent'] ?>" value="<?php echo $val['name'] ?>"><?php echo $val['title']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</fieldset>
						<div class="category-filter-block">
							<div class="category-filter-item">
								<a href="#" class="btn btn-primary category-filter-update">Update</a>
							</div>
						</div>
					</form>



					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										Sportswear
									</a>
								</h4>
							</div>
							<div id="sportswear" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="">Nike </a></li>
										<li><a href="">Under Armour </a></li>
										<li><a href="">Adidas </a></li>
										<li><a href="">Puma</a></li>
										<li><a href="">ASICS </a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#mens">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										Mens
									</a>
								</h4>
							</div>
							<div id="mens" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="">Fendi</a></li>
										<li><a href="">Guess</a></li>
										<li><a href="">Valentino</a></li>
										<li><a href="">Dior</a></li>
										<li><a href="">Versace</a></li>
										<li><a href="">Armani</a></li>
										<li><a href="">Prada</a></li>
										<li><a href="">Dolce and Gabbana</a></li>
										<li><a href="">Chanel</a></li>
										<li><a href="">Gucci</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#womens">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										Womens
									</a>
								</h4>
							</div>
							<div id="womens" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="">Fendi</a></li>
										<li><a href="">Guess</a></li>
										<li><a href="">Valentino</a></li>
										<li><a href="">Dior</a></li>
										<li><a href="">Versace</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Kids</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Fashion</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Households</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Interiors</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Clothing</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Bags</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Shoes</a></h4>
							</div>
						</div>
					</div><!--/category-productsr-->

					<div class="brands_products"><!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
								<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
								<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
								<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
								<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
								<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
								<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
							</ul>
						</div>
					</div><!--/brands_products-->

					<div class="price-range"><!--price-range-->
						<h2>Price Range</h2>
						<div class="well">
							<input type="text" class="span2 slider" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							<b>$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->

					<div class="shipping text-center"><!--shipping-->
						<img src="images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center"><?php the_title(); ?></h2>
	<div class="category-items-list">
<?php endif; ?>
					<?php
$postsPaged = isset($_POST['postsPaged']) && $_POST['postsPaged'] > 0 ? $_POST['postsPaged'] : 1;
$args = array(
	'post_type' => $GLOBALS['post_type'],
	'posts_per_page' => 12,
	'paged' => $postsPaged
);

function selectselectDsitrictFromCity($country, $region, $city, $districtList) {
	global $countryList;
	$regionItem = $countryList[$country][$region];
	$cityItem = $regionItem[$city];
	$result = array();

	if(!empty($districtList)) {
		foreach($districtList as $val) {
			if(in_array($val, $cityItem)) {
				$result[] = $val;
			}
		}
	}

	return $result;
}

if(isset($_POST['filter'])) {

	if(isset($_POST['filter']['select_country'])) {
		if(!empty($_POST['filter']['select_country']['city'])) {
			$sqlArr = array();

			foreach($_POST['filter']['select_country']['city'] as $val) {
				$country = $_POST['filter']['select_country']['country'];
				$region = $_POST['filter']['select_country']['region'];
				$district = $_POST['filter']['select_country']['district'];
				$districtList = selectselectDsitrictFromCity($country, $region, $val, $district);

				$filterKey = $country . ',' . $region . ',' . $val;

				if(empty($districtList)) {
					$sqlArr[] = array('select_country_city',  $filterKey);
				} else {
					foreach($districtList as $districtVal) {
						$sqlArr[] = array('select_country_district',  $filterKey . ',' . $districtVal);
					}
				}
			}

			global $wpdb;

			$sql = "SELECT `post_ID` FROM `" . $wpdb->prefix . "filter` WHERE ";
			$sqlWhere = '';

			foreach($sqlArr as $row) {
				$key = $row[0];
				$val = $row[1];
				$sqlWhere .= $sqlWhere ? ' OR ' : '';
				$sqlWhere .= "(`meta_key`='" . $key . "' AND `meta_val`='" . $val . "')";
			}
			$idsResults = $wpdb->get_results($sql . $sqlWhere . " GROUP BY `post_ID`", 'ARRAY_A');
			$ids = array();
			foreach($idsResults as $val) {
				$ids[] = $val['post_ID'];
			}
			$args['post__in'] = $ids;
		}
	}
}

$the_query = new WP_Query( $args );
if($the_query->have_posts()) :
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<div class="thumbnail-wrapper">
									<?php if ( has_post_thumbnail() ): ?>
										<?php
										if ( has_post_thumbnail() ) {
											$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'category_thumb' );
											$imgSrc = $imgSrc[0];
										} else {
											$imgSrc = get_bloginfo( 'template_directory' ) . '/images/no-thumbnail.jpg';
										}
										?>
										<img src="<?php echo $imgSrc; ?>" />
									<?php else: ?>
										<img src="<?php bloginfo( 'template_directory' ); ?>/images/no-thumbnail.jpg" />
									<?php endif; ?>
									</div>
									<h2><?php the_title(); ?></h2>
									<p><?php echo get_field('address'); ?></p>
									<a href="<?php the_permalink(); ?>" class="btn btn-default read-more"><i class="fa fa-arrow-circle-right"></i><?php Language::_e('Read more') ?></a>
								</div>
								<?php
								$map = get_field('google_map');
								$map_url = '';
								if(!empty($map)) {
									$map_url = "background-image: url('" . $map['url'] . "');";
								}
								?>
								<div class="product-overlay" style="<?php echo $map_url ?>">
									<div class="overlay-content">
										<h2><?php the_title(); ?></h2>
										<p class="category-phone"><?php
											$phone = get_field('phone');
											echo $phone[0]['mobile']
											?></p>
										<a href="<?php the_permalink(); ?>" class="btn btn-default read-more"><i class="fa fa-arrow-circle-right"></i><?php Language::_e('Read more') ?></a>
									</div>
								</div>
							</div>
							<?php /*<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>*/ ?>
						</div>
					</div>
					<?php endwhile;
?>
<div class="ajax-load hide"><i class="fa fa-refresh fa-spin fa-2x fa-fw margin-bottom"></i></div>
<?php
	endif;
wp_reset_postdata();
?>
<?php if(!isset($_POST['ajaxLoad'])) : ?>
</div>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<?php endif; ?>