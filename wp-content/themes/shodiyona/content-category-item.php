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
				<p class="content-category-address"><?php echo get_field('address'); ?></p>
				<a href="<?php the_permalink(); ?>" class="btn btn-default read-more"><i class="fa fa-arrow-circle-right"></i><?php Language::_e('Read more') ?></a>
			</div>
			<?php
			$map = get_field('google_map');
			$map_url = '';
			if(!empty($map)) {
				$map_url = "background-image: url('" . $map['sizes']['category_map_thumbnail'] . "');";
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