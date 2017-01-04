<?php
/**
 * Template Name: Search Start Page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="search-start-page standard-padding">
	<div class="list-container">
		<div class="heading">
			<h1>Search The Pioneer</h1>
		</div>
		
		<div class="search-box">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>