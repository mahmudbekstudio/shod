<?php
global $includeFiles;
$includeFiles['css'][] = 'css/single/restaurant.css';
$includeFiles['js'][] = 'js/single/restaurant.js';
get_header(); ?>
<section class="single-restaurant">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 hidden-xs">
				<div class="left-sidebar">
					<h2><?php Language::_e('In this city') ?></h2>

					<div class="left-side-list">
						<?php
						$postsLimit = 3;
						$ids = getIdRestaurantsInThisCity(get_the_ID(), $postsLimit);
						$args = array(
							'posts_per_page'   => $postsLimit,
							'orderby'          => 'rand',
							'include'          => $ids,
							'post_type'        => 'restaurant'
						);
						$posts_array = get_posts( $args );
						foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
							<?php
							if ( has_post_thumbnail() ) {
								$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'category_thumb' );
								$imgSrc = $imgSrc[0];

								$imgSrcHover = wp_get_attachment_image_src( get_post_thumbnail_id(), 'category_thumb_hover' );
								$imgSrcHover = $imgSrcHover[0];
							} else {
								$imgSrc = get_bloginfo( 'template_directory' ) . '/images/no-thumbnail.jpg';
								$imgSrcHover = $imgSrc;
							}
							?>
							<div class="left-side-item">
								<a class="left-side-overlay" href="#" style="background-image: url('<?php echo $imgSrcHover; ?>')"></a>
								<div class="left-side-image">
									<img src="<?php echo $imgSrc; ?>" />
								</div>
							</div>
						<?php endforeach;
						wp_reset_postdata();
						?>
					</div>

					<?php /*<div class="shipping text-center"><!--shipping-->
						<img src="images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->*/ ?>

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<!--img src="images/product-details/1.jpg" alt="" /-->
						</div>
						<!--div class="swiper-container product-detail">
							<div class="swiper-wrapper">
								<div class="swiper-slide"><a href="">
										<img src="images/product-details/similar1.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
								</div>
								<div class="swiper-slide">
									<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
								</div>
								<div class="swiper-slide">
									<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
								</div>
							</div>
							<div class="swiper-pagination"></div>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div-->

					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<!--img src="images/product-details/new.jpg" class="newarrival" alt="" /-->
							<h2>Anne Klein Sleeveless Colorblock Scuba</h2>
							<p>Web ID: 1089772</p>
							<!--img src="images/product-details/rating.png" alt="" /-->
							<p><b>Availability:</b> In Stock</p>
							<p><b>Condition:</b> New</p>
							<p><b>Brand:</b> E-SHOPPER</p>
							<!--a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a-->
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->

				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a href="#details" data-toggle="tab">Details</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
							<li><a href="#tag" data-toggle="tab">Tag</a></li>
							<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade" id="details" >
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery1.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery2.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery3.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery4.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="companyprofile" >
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery1.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery3.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery4.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="tag" >
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery1.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery2.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery3.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<!--img src="images/home/gallery4.jpg" alt="" /-->
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade active in" id="reviews" >
							<div class="col-sm-12">
								<ul>
									<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
									<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
									<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<p><b>Write Your Review</b></p>

								<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
									<textarea name="" ></textarea>
									<b>Rating: </b> <!--img src="images/product-details/rating.png" alt="" /-->
									<button type="button" class="btn btn-default pull-right">
										Submit
									</button>
								</form>
							</div>
						</div>

					</div>
				</div><!--/category-tab-->

			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
