<div class="cat-hero clearfix">
	<div class="cat-hero-header">
		<!-- Variable set in the PHP document that includes this file -->
		<h3><?php echo $current_category_headline; ?></h3>
		<?php 
		$catID = get_cat_ID( $current_category );
		$catLink = get_category_link( $catID );
		?>
		<h4><a href="<?php echo $catLink; ?>">more like this</a> &rarr;</h4>
	</div>
	<!-- 
	This block is separated into left and right sections. On desktop, this is self-explanatory when you look at the page. Behind the scenes, the left section requests the first 2 articles in the category. The right section requests the first 5 and the CSS hides the first 2 since they're already shown on the left.

	Once you shrink to the 1053 breakpoint, all of left is set to display:none and all of right (including the original 2 hidden articles) is set to display:block. From this point and smaller, all styling is done on the right section. Left isn't shown again at smaller sizes.
	-->
	<div class="cat-hero-left-container">
		<div class="cat-hero-left">
			<ul class="cat-hero-articles">
				<!-- Variable for $current_category set in the PHP document that includes this file -->
				<?php 
				$args = array( 
					'post_type' => 'post',
					'posts_per_page' => 2,
					'category_name' => $current_category );
				$loop = new WP_Query( $args );
				/* Requests the posts via The Loop */
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<!-- Gets the URL of the featured image -->
					<?php if (has_post_thumbnail( $post->ID ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image[0]; ?>
					<?php endif; ?>
					<li class="cat-hero-item">
						<div class="cat-hero-item-content">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
								<!-- sets featured image as background image of this div, allowing it resize easily -->
								<div class="cat-hero-item-image" style="background-color: #000000; 
						background: url('<?php echo $image ?>');
						-webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
						}">
								</div>
							</a>
							<div class="cat-hero-article-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="cat-hero-article-excerpt">
								<!-- Gets the post exercpt -->
								<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
							</div>
							<div class="cat-hero-article-divider">
							</div>
							<div class="cat-hero-article-date-author">
								<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - <span class="author"><?php 
									coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
									?>
								</span>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
	<div class="cat-hero-right-container">
		<div class="cat-hero-right">
			<ul class="cat-hero-articles">
				<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'category_name' => $current_category );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php if (has_post_thumbnail( $post->ID ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image[0]; ?>
					<?php endif; ?>
					<li class="cat-hero-item">
						<!-- We still load the images so they can be used at smaller screen sizes -->
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><div class="cat-hero-item-image" style="background-color: #000000; 
						background: url('<?php echo $image ?>');
						-webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
						}"></div></a>
						<div class="cat-hero-item-content">
							<div class="cat-hero-article-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="cat-hero-article-excerpt">
								<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
							</div>
							<div class="cat-hero-article-divider">
							</div>
							<div class="cat-hero-article-date-author">
								<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - <span class="author"><?php 
									coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
									?>
								</span>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
