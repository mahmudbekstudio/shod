<?php
/*
Template Name: Contact us
*/
get_header(); ?>
<div id="contact-page" class="container">
	<div class="bg">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-sm-8">
				<div class="contact-form">
					<div id="main-contact-form" class="contact-form row">
						<h2 class="title text-center"><?php Language::_e('Contact form') ?></h2>
						<?php echo do_shortcode(get_field('contact_form_code')); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="contact-info">
					<h2 class="title text-center"><?php Language::_e('Contact Info') ?></h2>
					<address>
						<?php the_content(); ?>
					</address>
				</div>
			</div>
			<?php  endwhile;endif; ?>
		</div>
	</div>
</div><!--/#contact-page-->
<?php get_footer(); ?>

