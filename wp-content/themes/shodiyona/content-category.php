<?php if(!isset($_POST['ajaxLoad'])) : ?>
<?php get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2><?php Language::_e('Filter'); ?></h2>
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
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
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
<?php endif; ?>
					<?php
$postsPaged = isset($_POST['postsPaged']) && $_POST['postsPaged'] > 0 ? $_POST['postsPaged'] : 1;
$args = array(
	'post_type' => $GLOBALS['post_type'],
	'posts_per_page' => 12,
	'paged' => $postsPaged
);
$the_query = new WP_Query( $args );
if($the_query->have_posts()) :
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail('category_thumb'); ?>
									<?php endif; ?>
									<h2><?php the_title(); ?></h2>
									<p><?php echo get_field('address'); ?></p>
									<a href="<?php the_permalink(); ?>" class="btn btn-default read-more"><i class="fa fa-arrow-circle-right"></i><?php Language::_e('Read more') ?></a>
								</div>
								<div class="product-overlay" style="background-image: url('https://maps.googleapis.com/maps/api/staticmap?center=7%20Shifokor%20Str.,%20%D0%A2%D0%BE%D1%88%D0%BA%D0%B5%D0%BD%D1%82,%20%D0%A3%D0%B7%D0%B1%D0%B5%D0%BA%D0%B8%D1%81%D1%82%D0%B0%D0%BD&zoom=14&size=256x226&maptype=roadmap&markers=color:red|label:R|41.359176507582454,69.18603658676147&key=AIzaSyCtjMo5SZD5YHfCgwElAiwd40-cBgFCNOI'); background-repeat: no-repeat;">
									<div class="overlay-content">
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
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<?php endif; ?>