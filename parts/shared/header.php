<script>
	$(document).ready(function(){
		/* Used to toggle the appearance of the drop-down mobile nav menu */
	    $("#show-button").click(function(){
	        $("#menu-dropdown").fadeToggle("fast");
	    });
	    /* Makes iframes responsive */
	    $("iframe").wrap("<div class='iframe'/>");
	    // $current_src = $("iframe").attr("src");
	    // $current_src = $current_src . "?api=1";
	    // $("iframe").attr("src", $current_src);


	});
</script>

<!-- Begin Master HC Bar Import -->
<!-- <?php 
	$URL = "http://thepioneer2.wpengine.com/hc-master/hc-master.html?v=4";
	$domain = file_get_contents($URL);
	print_r($domain);
?> -->
<!-- End Master HC Bar Import -->
<header>
	<!-- Everything in header must be in header-content to keep its position: fixed behavior -->
	<div id="header-content">
		<!-- Logo -->
		<a href="<?php echo home_url(); ?>"><img src="<?php echo home_url(); ?>/wp-content/themes/pioneer-2/images/pioneer-logo.png" alt="The Pioneer" title="The Pioneer" class="header-logo" /></a>

		<!-- Nav for Desktop -->
		<div id="main-menu-container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php echo $current_src; ?>
		</div>

		<!-- Nav for Mobile -->
		<div id="show-button">
			<img src="<?php echo home_url(); ?>/wp-content/themes/pioneer-2/images/navicon.gif" alt="Menu" class="navicon">
			<div id="menu-dropdown">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</div>
		<!-- Commented out search form in case we want to add that in the future -->
		<!-- <?php get_search_form(); ?>-->
	</div>
</header>
