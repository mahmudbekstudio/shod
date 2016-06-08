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
								<a class="left-side-overlay" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $imgSrcHover; ?>')"></a>
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
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<?php
							if ( has_post_thumbnail() ) {
								$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'category_thumb_main' );
								$imgSrc = $imgSrc[0];
							} else {
								$imgSrc = get_bloginfo( 'template_directory' ) . '/images/no-thumbnail-main.jpg';
							}
							?>
							<img src="<?php echo $imgSrc; ?>" alt="" />
						</div>
					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<?php /*<img src="<?php bloginfo( 'template_directory' ) ?>/images/product-details/new.jpg" class="newarrival" alt="" />*/ ?>
							<h2><?php the_title(); ?></h2>
							<?php
							$region = json_decode(get_field('region'));
							$address = get_field('address');
							?>
							<p><strong><?php Language::_e('Address') ?>:</strong>
								<?php Language::_e('City'); echo ' ' . Language::__($region->city) ?>
								<?php
								if(isset($region->district) && $region->district != '') {
									echo ', ';
									Language::_e('District');
									echo ' ' . Language::__($region->district);
								}

								if($address != '') {
									echo ', ' . $address;
								}
								?>
							</p>
							<?php
							$phone = get_field('phone');
							if(!empty($phone)) {
								?>
								<p><strong><?php Language::_e('Phone') ?>:</strong>
									<?php
									$phoneCount = count($phone);
									for($i = 0; $i < $phoneCount; $i++) {
										if($i > 0) {
											echo ', ';
										}
										echo $phone[$i]['mobile'];
									}
									?>
								</p>
								<?php
							}
							?>
							<?php
							$email = get_field('e-mail');
							if(!empty($email)) {
								?>
								<p><strong><?php Language::_e('E-mail') ?>:</strong> <a href="mailto: <?php echo $email; ?>"><?php echo $email; ?></a></p>
								<?php
							}
							?>
							<?php
							$website = get_field('website');
							if(!empty($website)) {
								?>
								<p><strong><?php Language::_e('Website') ?>:</strong> <a href="http://www.<?php echo $website; ?>" target="_blank">http://www.<?php echo $website; ?></a></p>
								<?php
							}
							?>
							<?php
							$contact_person = get_field('contact_person');
							if(!empty($contact_person)) {
								?>
								<p><strong><?php Language::_e('Contact person') ?>:</strong> <?php echo $contact_person; ?></p>
								<?php
							}
							?>
							<p> <strong><?php Language::_e('Working time') ?>:</strong>
							<?php
							$working_time = get_field('working_time');
							$langCode = Language::getLang();
							if($langCode == 'uz') {
								echo $working_time[0]['work_time_start'] . ' ';
								Language::_e('from');
								echo ' ' . $working_time[0]['work_time_end'] . ' ';
								Language::_e('to');
								echo ', ';
								Language::_e('weekends');
								echo ' ';
								Language::_e($working_time[0]['weekends']);
							} else {
								Language::_e('from');
								echo ' ' . $working_time[0]['work_time_start'] . ' ';
								Language::_e('to');
								echo ' ' . $working_time[0]['work_time_end'] . ', ';
								Language::_e('weekends');
								echo ' ';
								Language::_e($working_time[0]['weekends']);
							}
							?>
							</p>

							<?php
							$payment = get_field('payment');
							if(!empty($payment)) {
								?>
							<p> <strong><?php Language::_e('Payment') ?>:</strong>
								<?php
								$isFirst = true;
								foreach($payment as $val) {
									if($isFirst) {
										$isFirst = false;
									} else {
										echo ', ';
									}

									Language::_e($val);
								}
								?>
							</p>
								<?php
							}

							$type_of_restaurant = get_field('type_of_restaurant');
							if(!empty($type_of_restaurant)) {
								?>
								<p> <strong><?php Language::_e('Type Of Restaurant') ?>:</strong>
									<?php
									$isFirst = true;
									foreach($type_of_restaurant as $val) {
										if($isFirst) {
											$isFirst = false;
										} else {
											echo ', ';
										}

										Language::_e($val);
									}
									?>
								</p>
								<?php
							}

							$types_of_services = get_field('types_of_services');
							if(!empty($types_of_services)) {
								?>
								<p> <strong><?php Language::_e('Type Of Services') ?>:</strong>
									<?php
									$isFirst = true;
									foreach($types_of_services as $val) {
										if($isFirst) {
											$isFirst = false;
										} else {
											echo ', ';
										}

										Language::_e($val);
									}
									?>
								</p>
								<?php
							}

							$number_of_people = get_field('number_of_people');
							if(!empty($number_of_people)) {
								?>
								<p> <strong><?php Language::_e('Number Of People') ?>:</strong>
									<?php
									echo $number_of_people;
									?>
								</p>
								<?php
							}

							$contact_person = get_field('contact_person');
							if(!empty($contact_person)) {
								?>
								<p> <strong><?php Language::_e('Contact Person') ?>:</strong>
									<?php
									echo $contact_person;
									?>
								</p>
								<?php
							}

							$map = get_field('google_map');
							$map_url = '';
							if(!empty($map)) {
								$map_url = $map['url'];
							}
							if(!empty($map_url)) {
								$map = get_field('map');

								// AIzaSyB4LmNbml6DsnFm5G0jK2-v_-qPCZxPNUg
								//$map['address']
								//$map['lat']
								//$map['lng']
								?>
								<p> <strong><?php Language::_e('Map') ?>:</strong>
									<a class="open-google-popup" href="?map=<?php echo $map['address'] . '&lat=' . $map['lat'] . '&lng=' . $map['lng'] ?>"><img src="<?php echo $map_url; ?>" /></a>
								</p>
								<?php
							}
							?>
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
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
