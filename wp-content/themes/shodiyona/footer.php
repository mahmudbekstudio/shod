<?php if(!(is_front_page() || is_home())) : ?>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_directory' ); ?>/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_directory' ); ?>/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_directory' ); ?>/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_directory' ); ?>/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="<?php bloginfo( 'template_directory' ); ?>/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->
<?php endif; ?>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/swiper.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.scrollUp.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/price-range.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/materialmenu.jquery.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.cookie.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/main.js"></script>
<?php
global $includeFiles;
foreach($includeFiles['js'] as $jsFile) {
	?>
	<script src="<?php bloginfo( 'template_directory' ); ?>/<?php echo $jsFile; ?>"></script>
	<?php
}
?>
<?php wp_footer(); ?>
</body>
</html>