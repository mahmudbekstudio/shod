<?php get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<div class="shipping text-center"><!--shipping-->
						<img src="<?php bloginfo( 'template_directory' ); ?>/images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->
				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center"><?php echo single_cat_title( '', false ); ?></h2>
					<?php
					$dateFormat = get_option( 'date_format' );
					while ( have_posts() ) : the_post(); ?>
					<div class="single-blog-post">
						<h3><?php the_title(); ?></h3>
						<div class="post-meta">
							<ul>
								<!--li><i class="fa fa-user"></i> Mac Doe</li-->
								<li><i class="fa fa-clock-o"></i> <?php the_time(); ?></li>
								<li><i class="fa fa-calendar"></i> <?php the_time( $dateFormat ); ?></li>
							</ul>
						</div>
						<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('medium'); ?>
						</a>
						<?php endif; ?>
						<?php the_excerpt(); ?>
						<a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
					</div>
					<?php endwhile; ?>
					<?php
					if(function_exists('wp_paginate')) {
						wp_paginate();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
