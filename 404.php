<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="default-page 404-page standard-padding">
	<article>
		<div class="heading">
			<h1>We're sorry - that page doesn't exist.</h1>
		</div>
		<div class="content">
			Please check your source to make sure the URL is correct. Otherwise, you can visit our homepage or search for an article above. We're sorry for the trouble!
		</div>
	</article>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>