<div class="hero">
	<div class="hero-left">
		<ul class="hero-articles">
			<?php 
			$args = array( 
				'post_type' => 'post',
				'posts_per_page' => 1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php if (has_post_thumbnail( $post->ID ) ): 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					$image = $image[0]; ?>
				<?php endif; ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
				<li class="hero-item" style="background-color: #000000; 
					background: url('<?php echo $image ?>');
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
					}">
					<div class="hero-item-image-filter"></div>
					<div class="hero-item-content">
						<div class="hero-article-title">
							<?php the_title(); ?>
						</div>
						<div class="hero-article-excerpt">
							<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
						</div>
						<div class="hero-article-divider">
						</div>
						<div class="hero-article-date-author">
							<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - <span class="author"><?php 
								coauthors( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
								?>
							</span>
						</div>
					</div>
				</li>
				</a>
			<?php endwhile; ?>
		</ul>
	</div>
	<div class="hero-right">
		<ul class="hero-articles">
			<?php 
			$args = array( 
				'post_type' => 'post',
				'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php if (has_post_thumbnail( $post->ID ) ): 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$image = $image[0]; ?>
				<?php endif; ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
				<li class="hero-item" style="background-color: #000000; 
					background: url('<?php echo $image ?>');
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;">
					<div class="hero-item-image-filter"></div>
					<div class="hero-item-content">
						<div class="hero-article-title">
							<?php the_title(); ?>
						</div>
						<div class="hero-article-excerpt">
							<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
						</div>
						<div class="hero-article-divider">
						</div>
						<div class="hero-article-date-author">
							<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - <span class="author"><?php 
								coauthors( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
								?>
							</span>
						</div>
					</div>
				</li>
				</a>
			<?php endwhile; ?>
		</ul>
	</div>
</div>
