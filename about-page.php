<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="default-page standard-padding about-page">
	<article>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="heading">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="content">
			
				<?php the_content(); ?>
			
		</div>
		<?php endwhile; ?>
	
		<div class="heading">
			<h1>The Pioneer Student Staff</h1>
		</div>
		<div class="all-authors">
			<?php
			$args = array(
			'orderby'      => 'display_name',
			'order'        => 'ASC'
			);
			// Get all users order by amount of posts
			$allUsers = get_users($args);

			foreach($allUsers as $user)
			{
				$userID = $user->ID;
				$isActive = types_render_usermeta_field( "active-member", array( 'user_id'=>$userID ) );
				$organization = types_render_usermeta_field( "organization", array( 'user_id'=>$userID ) );
				$isThePioneer = strcmp($organization, "The Pioneer");

				if ($isActive) {
					if ($isThePioneer==0) {
						$headshot = types_render_usermeta_field( "headshot", array( "width" => 200, 'user_id'=>$userID ) );
						if ($headshot == "") {
							$avatar = get_bloginfo( 'template_url');
							$avatar .= '/images/no-avatar.jpg';
							$headshot = "<img src=\"" . $avatar . "\" />";
						}
						$fullName = $user->display_name;
						$postsLink = get_author_posts_url($userID);
						$title = types_render_usermeta_field( "title", array( 'user_id'=>$userID ) );

						?>
						<div class="author">
							<a href="<?php echo $postsLink; ?>">
								<div class="headshot">
									<?php echo $headshot ?>
								</div>
							</a>
							<div class="author-info">
								<span class="name"><?php echo $fullName; ?></span>
								<span class="title"><?php echo $title; ?></span>
								<span class="allposts"><a href="<?php echo $postsLink; ?>">See all posts &rarr;</a></span>
							</div>
						</div>
						<?php
					}
				}
			}
			?> 
		</div> 
		<div class="heading">
			<h1>HackCville Staff Contributors</h1>
		</div>
		<div class="all-authors">
			<?php
			foreach($allUsers as $user)
			{
				$userID = $user->ID;
				$isActive = types_render_usermeta_field( "active-member", array( 'user_id'=>$userID ) );
				$organization = types_render_usermeta_field( "organization", array( 'user_id'=>$userID ) );
				$isHackCville = strcmp($organization, "HackCville");

				if ($isActive) {
					if ($isHackCville==0) {
						$headshot = types_render_usermeta_field( "headshot", array( "width" => 200, 'user_id'=>$userID ) );
						if ($headshot == "") {
							$avatar = get_bloginfo( 'template_url');
							$avatar .= '/images/no-avatar.jpg';
							$headshot = "<img src=\"" . $avatar . "\" />";
						}
						$fullName = $user->display_name;
						$postsLink = get_author_posts_url($userID);
						$title = types_render_usermeta_field( "title", array( 'user_id'=>$userID ) );

						?>
						<div class="author">
							<a href="<?php echo $postsLink; ?>">
								<div class="headshot">
									<?php echo $headshot ?>
								</div>
							</a>
							<div class="author-info">
								<span class="name"><?php echo $fullName; ?></span>
								<span class="title"><?php echo $title; ?></span>
								<span class="allposts"><a href="<?php echo $postsLink; ?>">See all posts &rarr;</a></span>
							</div>
						</div>
						<?php
					}
				}	
			}

			?>
		</div>
	</article>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>