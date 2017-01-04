<footer>
	<div class="footer-left-container">
		<div class="footer-left">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo home_url(); ?>/wp-content/themes/pioneer-2/images/pioneer-white-logo.png" title="The Pioneer" alt="The Pioneer">
			</a>
			<p>The Pioneer is the publication of <a href="http://hackcville.com" target="_blank" alt="HackCville">HackCville</a>. All of our producers are either current students or graduates of HackCville’s <a href="http://hackcville.com/programs" target="_blank" alt="HackCville Programs">media education programs</a>. Our producers develop skills in modern media production through publishing stories about creative, civic, and entrepreneurial innovators in the University of Virginia and greater Charlottesville community. <a href="http://thepioneer.co/about">Learn more &rarr;</a></p>
		</div>
	</div>
	<div class="footer-right-container">
		<div class="footer-right">
			<h4>More from The Pioneer</h4>
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			<div class="social-follow">
				<div class="fb-like" data-href="https://facebook.com/thepioneercville" data-width="75" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow">
					<a href="https://twitter.com/thepioneeruva" class="twitter-follow-button" data-show-count="false">Follow @thepioneeruva</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom-container">
		<div class="footer-bottom">
			<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.   -  Designed in-house, powered by WordPress.</p>
		</div>
	</div>
</footer>
<!-- required for Instagram follow button -->
<script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="//x.instagramfollowbutton.com/follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>
