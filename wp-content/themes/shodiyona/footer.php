<?php if(!(is_front_page() || is_home())) : ?>
	<footer id="footer"><!--Footer-->
		<?php /*<div class="footer-top">
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
		</div>*/ ?>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">&copy; 2016 Shodiyona.uz. <?php Language::_e('All rights reserved') ?>.</p>
					<?php /*<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>*/ ?>
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
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.browser.js"></script>
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
<!-- START WWW.UZ TOP-RATING --><SCRIPT language="javascript" type="text/javascript">
	<!--
	top_js="1.0";top_r="id=37595&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="smart_top=1; path=/"; top_r+="&c="+(document.cookie?"Y":"N")
	//-->
</SCRIPT>
<SCRIPT language="javascript1.1" type="text/javascript">
	<!--
	top_js="1.1";top_r+="&j="+(navigator.javaEnabled()?"Y":"N")
	//-->
</SCRIPT>
<SCRIPT language="javascript1.2" type="text/javascript">
	<!--
	top_js="1.2";top_r+="&wh="+screen.width+'x'+screen.height+"&px="+
		(((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)
	//-->
</SCRIPT>
<SCRIPT language="javascript1.3" type="text/javascript">
	<!--
	top_js="1.3";
	//-->
</SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript">
	<!--
	top_rat="&col=340F6E&t=ffffff&p=BD6F6F";top_r+="&js="+top_js+"";document.write('<img src="http://cnt0.www.uz/counter/collect?'+top_r+top_rat+'" width=0 height=0 border=0 />')//-->
</SCRIPT><NOSCRIPT><IMG height=0 src="http://cnt0.www.uz/counter/collect?id=37595&pg=http%3A//uzinfocom.uz&col=340F6E&t=ffffff&p=BD6F6F" width=0 border=0 /></NOSCRIPT><!-- FINISH WWW.UZ TOP-RATING -->
</body>
</html>