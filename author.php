<?php
/**
 * The template for displaying Author Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="author-page">
	<div class="author-content">
		<div class="left-content-container">
			<div class="left-content">
				<div class="headshot">
					<?php 
						$authorID = get_the_author_meta( 'ID' );
						$headshot = types_render_usermeta_field( "headshot", array( 'user_id'=>$authorID ) );
					if ($headshot == "") {
						$avatar = get_bloginfo( 'template_url');
						$avatar .= '/images/no-avatar.jpg';
						$headshot = "<img src=\"" . $avatar . "\" />";
					}
					echo $headshot;
					?>
				</div>
				<div class="name-title">
					<h1 class="name"><?php echo get_the_author(); ?></h1>
					<h4 class="title-org">
						<?php 
						$isActive = types_render_usermeta_field( "active-member", array( 'user_id'=>$authorID ) );
						$title = types_render_usermeta_field( "title", array( 'user_id'=>$authorID ) );
						if (!$isActive) {
							$title = "Former " . $title;
						}
						echo $title;
						?>, 
						<?php $organization = types_render_usermeta_field( "organization", array( 'user_id'=>$authorID ) );
						echo $organization;
						?>
					</h4>
					<?php
					
					$isGuest = types_render_usermeta_field( "guest-writer", array( 'user_id'=>$authorID ) );
					$dateJoined = types_render_usermeta_field( "date-joined", array( "format"=>"F Y", 'user_id'=>$authorID ));
					$dateLeft = types_render_usermeta_field( "date-left", array( "format"=>"F Y", 'user_id'=>$authorID ));

					if ($isGuest) { ?>
						<h4 class="active-info">Guest Contributor</h4>
					<?php
					} else if ($isActive) { ?>
						<h4 class="active-info">Active since <?php echo $dateJoined; ?></h4>
					<?php
					} else if (!$isActive) { ?>
						<h4 class="active-info">Active from <?php echo $dateJoined; ?> to <?php echo $dateLeft; ?></h4>	
					<?php
					} else {}
					?>

				</div>
				<div class="bio">
					<?php the_author_meta( 'description' ); ?>
				</div>
	
			</div>
		</div>
		<div class="right-content-container">
			<div class="right-content">
				<div class="heading">
					<h4>More Info About <?php the_author_meta( 'first_name' ); ?> </h4>
				</div>
				<div class="more-info-list">
					<ul>
						<?php 
							$isUVA = types_render_usermeta_field( "uva-check", array( 'user_id'=>$authorID ) );
							$major = types_render_usermeta_field( "major", array( 'user_id'=>$authorID ) );
							if ($major) { $major .= " Major"; }
							$gradYear = trim(types_render_usermeta_field( "graduation-year", array( 'user_id'=>$authorID ) ));
							$twitterHandle = types_render_usermeta_field( "twitter-handle", array( 'user_id'=>$authorID ) );
							if ($twitterHandle) { $twitterHandle = "http://twitter.com/" . $twitterHandle; }
							$linkedinURL = types_render_usermeta_field( "linkedin-url", array( 'output'=>'raw', 'user_id'=>$authorID ) );
							$personalWebsiteURL = types_render_usermeta_field( "personal-website-url", array( 'output'=>'raw', 'user_id'=>$authorID ) );

							if ($isUVA) {
							if ($major) {
						?>
						<li class="major">
							<?php echo $major ?>
						</li><?php } ?>
						<li class="year-major">
							<a href="http://www.virginia.edu" target="_blank">University of Virginia</a> 
							<?php 
								if ($gradYear) {
									echo "Class of " . $gradYear;
								}?>
						</li>
						<?php } if ($linkedinURL) { ?>
						<li class="linkedin">
							View <?php the_author_meta( 'first_name' ); ?>  on <a href="<?php echo $linkedinURL; ?>" target="_blank">LinkedIn</a>
						</li>
						<?php } if ($twitterHandle) {	?>
						<li class="twitter">
							Follow <?php the_author_meta( 'first_name' ); ?>  on <a href="<?php echo $twitterHandle; ?>" target="_blank">Twitter</a>
						</li>
						<?php } if ($personalWebsiteURL) {	?>
						<li class="personal">
							View <?php the_author_meta( 'first_name' ); ?>'s <a href="<?php echo $personalWebsiteURL; ?>" target="_blank">personal website</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="program-info">
					<?php
						if ($organization) {
							$isHackCville = strcmp($organization, "HackCville");
							$isHustleClass = strcmp($organization, "The Hustle Class");
							$isThePioneer = strcmp($organization, "The Pioneer");
							$isRethink = strcmp($organization, "Rethink");
							$verb = " was";
							if ($isActive) { $verb = " is"; }

							if ($isHackCville==0) { 
								the_author_meta('first_name'); echo $verb;?> a member of <a href="http://hackcville.com/" target="_blank">HackCville</a>, a 501(c)(3) non-profit that prepares students for careers in startups and entrepreneurship. <a href="http://hackcville.com/about">Learn more &rarr;</a>
							<?php } 
							if ($isThePioneer==0) {
								the_author_meta( 'first_name' ); echo $verb; ?>  a member of The Pioneer program at <a href="http://hackcville.com" target="_blank">HackCville</a>. The Pioneer is both an online publication and a media education program. <a href="http://thepioneer.co/about">Learn more &rarr;</a>
							<?php }
							if ($isHustleClass==0) {
								the_author_meta( 'first_name' ); echo $verb; ?> part of the Hustle Class program at <a href="http://hackcville.com" target="_blank">HackCville</a>. The Hustle Class is a semester-long program for UVA students interested in startups and entrepreneurship. <a href="http://hackcville.com/hustleclass">Learn more &rarr;</a>
							<?php }
							if ($isRethink==0) {
								the_author_meta( 'first_name' ); echo $verb; ?> part of the Rethink program at <a href="http://hackcville.com" target="_blank">HackCville</a>. Rethink is a semester-long program for UVA students interested in the future of education. <a href="http://hackcville.com/rethink">Learn more &rarr;</a>
						<?php } } ?>
				</div>
			</div>
		</div>
	</div>
	<?php if ( have_posts() ): the_post(); ?>
	<div class="author-stories standard-padding">
		<div class="list-container">
			<?php 
				$page = 1;
				if ($paged == 0) {
					$page = 1;
				}
				else {
					$page = $paged;
				}
			?>
			<div class="heading">
				<?php if ($page == 1) { ?>
					<h1><?php the_author_meta( 'first_name' ); ?>'s Published Stories</h1>
				<?php } else { ?>
					<h1><?php the_author_meta( 'first_name' ); ?>'s Published Stories: Page <?php echo $page ?></h1>
				<?php } ?>
			</div>
			<ul class="list-items">
				<?php 
				rewind_posts();
				while ( have_posts() ) : the_post();
					if (has_post_thumbnail( $post->ID ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image[0]; ?>
					<?php endif; ?>
				<li class="list-item">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><div class="list-item-image" style="background-color: #000000; 
					background: url('<?php echo $image ?>') center center;
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
					}"></div></a>
					<div class="list-item-content">
						<div class="list-item-title">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="list-item-excerpt">
							<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
						</div>
						<div class="list-item-date-author">
							<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - <span class="author"><?php 
								coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
								?>
							</span>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
			</ul>
			<div class="next-previous">
				<h4><?php posts_nav_link(' | ','&larr; Previous Page','Next Page &rarr;'); ?></h4>
			</div>
			<?php else: ?>

			<div class="heading">
				<br>
				<h4 style="text-align: center;"><?php the_author_meta( 'first_name' ); ?>  has no published stories on The Pioneer.</h4>
				<br>
			</div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>