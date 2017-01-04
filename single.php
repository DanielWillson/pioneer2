<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="single-page">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<!-- Gets the URL of the featured image -->
	<?php if (has_post_thumbnail( $post->ID ) ): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0]; ?>
	<?php endif; ?>
	<!-- Lead image, headline, and excerpt -->
	<div class="article-lead" style="background-color: #000000; 
		background: url('<?php echo $image ?>') top center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}">
		<div class="article-lead-image-filter"></div>
		<div class="article-lead-content">
			<h1><?php the_title(); ?></h1>
			<span class="excerpt"><?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?></span>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>
		</div>
	</div>
	<!-- Sidebars. Left contains authors. Right contains sponsored (if post is sponsored) and social follow. Right is hidden at small enough sizes. -->
	<div class="left-sidebar">
		<div class="author-info">
			<?php 
			$article_type = types_render_field("article-type", array( ));
			$isArticle = has_category('article');
			$isPhotoEssay = has_category ('photo-essay-story-type');
			$isVideo = has_category ('video');

			if ($isArticle && $isVideo && $isPhotoEssay) {?>
			<div class="heading">Authors, Photographers, and Producers</div>

			<?php }	else if ($isArticle && !$isVideo && $isPhotoEssay) { ?>
			<div class="heading">Authors and Photographers </div>

			<?php }	else if ($isArticle && $isVideo && !$isPhotoEssay) { ?>
			<div class="heading">Authors and Producers</div>

			<?php }	else if (!$isArticle && $isVideo && $isPhotoEssay) { ?>
			<div class="heading">Photographers and Producers</div>

			<?php }	else if ($isArticle && !$isVideo && !$isPhotoEssay) { ?>
			<div class="heading">Authors</div>

			<?php } else if (!$isArticle && !$isVideo && $isPhotoEssay){  ?>
			<div class="heading">Photographers</div>

			<?php }	else if (!$isArticle && $isVideo && !$isPhotoEssay) { ?>
			<div class="heading">Producers</div>

			<?php } else { ?>
			<div class="heading">Producers</div> 
			<?php }	?>

			<?php 
			$authorIDs = coauthors_IDs( ',', ',', null, null, false);
			$myArray = explode(',', $authorIDs);
			
			foreach ($myArray as $authorID) {
				?><div class="author"><?php

				$author = get_user_by( 'ID', $authorID );
				$user_info = get_userdata( $authorID );

				$headshot = types_render_usermeta_field( "headshot", array( "width" => 50, "user_id" => $authorID ) );
				if ($headshot == "") {
					$headshot = get_avatar($authorID, 50);
				}
		   		$first_name = $user_info->first_name;
		   		$last_name = $user_info->last_name;
		   		$archive_page = get_author_posts_url( $authorID );
				$title = types_render_usermeta_field( "title", array( 
	        "user_id" => $authorID ));
				$organization = types_render_usermeta_field( "organization", array("user_id" => $authorID )); 
				 
				?>
				<div class="headshot"><?php
				echo $headshot . "\n";
				?></div>
				<a class="name" href="<?php echo $archive_page; ?>"><?php echo $first_name . " " . $last_name; ?></a>
				<div class="title"><?php
				echo $title;
				?></div>
				<div class="organization"><?php
				echo $organization;
				?></div></div><?php
			}
	    	?>
	    	<!-- mobile-name only shows at smaller screen sizes. it drops the images, titles, and orgs and only shows names of the authors. -->
	    	<div class="mobile-name">
				<?php
				coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "by ", $after = null, $echo = true )
				?>
	    	</div>
	    	<div class="learn-more">
	    		<a href="http://thepioneer.co/about">Learn more about our media education program &rarr;</a>
	    	</div>
		</div>
	</div>
	<div class="right-sidebar">
		<?php 
		if (has_category("Sponsored")) {
		?>
		<div class="sponsored">
			<div class="heading">
				Sponsored by:
			</div>
			<?php 
			$sponsor_name = types_render_field( "sponsor-name", array( ) );
			$sponsor_website = types_render_field( "sponsor-website", array( "output" => "raw" ) );
			$logo = types_render_field( "sponsor-logo", array( "url" => "true", "size" => "medium") );
			?>
			<a href="<?php echo $sponsor_website; ?>" target="_blank">
			<img src="<?php echo $logo; ?>" />
			</a>
			<div class="sponsor-info">
				<a href="http://thepioneer.co/sponsored">Learn more about our sponsored stories &rarr;</a>
			</div>
		</div>
		<?php
		}
		else {} 
		?>
		<div class="social">
			<div class="heading">
				Don't miss stories:
			</div>
			<div class="social-follow">
				<div class="fb-like" data-href="https://facebook.com/thepioneercville" data-width="75" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow">
					<a href="https://twitter.com/thepioneeruva" class="twitter-follow-button" data-show-count="false">Follow @thepioneeruva</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
				<div class="subscribe-cta">
					Get new stories each week in your inbox:
				</div>
				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup">
					<br>
					<form action="//hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&amp;id=97161904f1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
					<div class="mc-field-group">
						<input type="email" placeholder="you@youremail.com" name="EMAIL" class="required email" id="mce-EMAIL" class="email">
						
					</div>
					<div class="mc-field-group input-group">
					    <ul>
					    	<!-- If checked, adds them to the HC newsletter group as well. --> 
					    	<li>
					    		<input type="checkbox" value="1024" name="group[18193][1024]" id="mce-group[18193]-18193-0">
					    		<label class="hc-subscribe-box" for="mce-group[18193]-18193-0">Also send me free tech, business, &amp; design workshops in Charlottesville</label>
					    	</li>
					    	<!-- This checkbox is hidden by the CSS and is checked by default. MailChimp makes users select which newsletters they want - Pioneer and/or HC - and since they're on the Pioneer website, they'll be auto-subscribed to Pioneer via this box. -->
							<li class="pioneer-checkbox">
								<input type="checkbox" value="2048" name="group[18193][2048]" id="mce-group[18193]-18193-1" checked="checked">
								<label for="mce-group[18193]-18193-1">Send me the latest stories from The Pioneer</label>
							</li>

						</ul>
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_dae9a7242f836507908a2f2d6_97161904f1" tabindex="-1" value=""></div>
					    </div>
					</form>
				</div>

				<!--End mc_embed_signup-->
			</div>
		</div>
	</div>
	<article>

		<?php the_content(); ?>			

	</article>
	<?php endwhile; ?>

	<!-- Begin Social Share -->

	<div class="social-share">
		<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/share-this-page' ) ); ?>
	</div>

	<!-- Begin Post Call to Actions -->
	<div class="cta-container">
	<?php

	$show_cta_1 = types_render_field( "show-cta-1" );
	$show_cta_2 = types_render_field( "show-cta-2" );

	if ($show_cta_1) {
		$cta_1_headline = types_render_field( "cta-1-headline" );
		$cta_1_subheading = types_render_field( "cta-1-subheading" );
		$cta_1_link_text = types_render_field( "cta-1-link-text" );
		$cta_1_web_address = types_render_field( "cta-1-web-address", array( "output"=>"raw" ) );
		$cta_1_image = types_render_field( "cta-1-image", array( "url" => "true" ) );

		?>
		<div class="cta" style="background-color: #000000; 
		background: url('<?php echo $cta_1_image ?>') center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}">
			<div class="cta-image-filter"></div>
			<div class="cta-content">
				<div class="cta-headline">
					<h2><?php echo $cta_1_headline; ?></h2>
				</div>
				<div class="cta-subheading">
					<h4><?php echo $cta_1_subheading; ?></h4>
				</div>
				<div class="cta-link">
					<a href="<?php echo $cta_1_web_address; ?>" target="_blank">
						<h4><?php echo $cta_1_link_text; ?> &rarr;</h4>
					</a>
				</div>
			</div>
		</div>
		<?php
	}

	if ($show_cta_2) {
		$cta_2_headline = types_render_field( "cta-2-headline" );
		$cta_2_subheading = types_render_field( "cta-2-subheading" );
		$cta_2_link_text = types_render_field( "cta-2-link-text" );
		$cta_2_web_address = types_render_field( "cta-2-web-address", array( "output"=>"raw" ) );
		$cta_2_image = types_render_field( "cta-2-image", array( "url" => "true" ) );

		?>
		<div class="cta" style="background-color: #000000; 
		background: url('<?php echo $cta_2_image ?>') center center;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}">
			<div class="cta-image-filter"></div>
			<div class="cta-content">
				<div class="cta-headline">
					<h2><?php echo $cta_2_headline; ?></h2>
				</div>
				<div class="cta-subheading">
					<h4><?php echo $cta_2_subheading; ?></h4>
				</div>
				<div class="cta-link">
					<a href="<?php echo $cta_2_web_address; ?>" target="_blank">
						<h4><?php echo $cta_2_link_text; ?> &rarr;</h4>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	</div>

	<!-- Begin related articles -->
	<?php

	$categories = get_the_category();
	$disallowed_categories = array("Feature", "Sponsored", "Photo Essays", "Videos", "Articles");
	$catNames = array();

	foreach ($categories as $cat) {
	    $catNames[] = $cat->name;
	}

	$goodCategories = array_diff($catNames, $disallowed_categories);

	$current_category = "";
	$current_category_headline = "";

	if ( ! empty( $goodCategories ) ) {
	    $current_category = array_rand($goodCategories);   
	    $current_category = $goodCategories[$current_category];
		$current_category_headline = 'related stories about ' . strtolower($current_category);
	}
	else {
		$current_category_headline = 'recent stories';
	}

	$template_url = get_template_directory() . '/parts/shared/cat-hero.php';

	// Works like the Starkers Utilities function and includes the cat-hero in this doc.
	// Must use this include() function instead of Starkers so that the variable passing can work
	include ($template_url);

	?>



</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>