<?php
/**
 * Template Name: Home
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0 
 */
?>
                                
<?php 
   
// Imports the PHP & HTML Headers
Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );

// Imports the hero section
Starkers_Utilities::get_template_parts( array( 'parts/shared/hero' ) ); 
 
// Sets up $current_category and $current_category_headline for the category hero (cat-hero)
// $current_category is the category passed to the hero
// $current_category_headline is the text passed to the headline seen on the site
$current_category = '';
$current_category_headline = 'entrepreneurship stories';
$current_category = 'Entrepreneurship';

$template_url = get_template_directory();
$template_url .= '/parts/shared/cat-hero.php';

// Works like the Starkers Utilities function and includes the cat-hero in this doc.
// Must use this include() function instead of Starkers so that the variable passing can work
include ($template_url);

// Resets the 2 category variables and imports again to create the technology section
$current_category_headline = 'technology stories';
$current_category = 'Technology';
include ($template_url);

// Imports the newsletter subscribe section
Starkers_Utilities::get_template_parts( array( 'parts/shared/full-width-subscribe' ) );

// Resets the 2 category variables and imports again to create the art section
$current_category_headline = 'art and design stories';
$current_category = 'Art';
include ($template_url);

// Resets the 2 category variables and imports again to create the music section
$current_category_headline = 'music stories';
$current_category = 'Music';
include ($template_url);

// Resets the 2 category variables and imports again to create the HackCville section
$current_category_headline = 'hackcville stories';
$current_category = 'HackCville';
include ($template_url);

// Imports the PHP & HTML footers
Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); 


?>