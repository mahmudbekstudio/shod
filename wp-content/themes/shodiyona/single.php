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
				<?php
				$dateFormat = get_option( 'date_format' );
				while ( have_posts() ) : the_post(); ?>
				<div class="blog-post-area">
					<h2 class="title text-center"><?php $categories = get_the_category();echo $categories[0]->name; ?></h2>
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
						<?php the_content(); ?>
						<!--div class="pager-area">
							<ul class="pager pull-right">
								<li><a href="#">Pre</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div-->
					</div>
				</div><!--/blog-post-area-->

				<!--div class="socials-share">
					<a href=""><img src="images/blog/socials.png" alt=""></a>
				</div--><!--/socials-share-->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
