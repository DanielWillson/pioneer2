<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="archive-page standard-padding">
	<div class="list-container">
		<?php 
		if ( have_posts() ): 
			$page = 1;
			if ($paged == 0) {
				$page = 1;
			}
			else {
				$page = $paged;
			}
		?>
		<div class="heading">
			<?php if ( is_day() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?>							
			<?php elseif ( is_month() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?>
			<?php elseif ( is_year() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'Y' ); ?>
			<?php else : ?>
			<h1>Archive: 
			<?php endif; ?>
			Page <?php echo $page ?></h1>
		</div>
		<ul class="list-items">
			<?php 
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
		<h2>No posts to display.</h2>
		<?php endif; ?>

	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>