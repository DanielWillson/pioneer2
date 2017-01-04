<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" />
		<!-- BEGIN Open Graph Tags -->

		<?php 

			$post_id = get_the_ID();
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
			$thumbnail_img = $thumbnail[0];
			$thumbnail_img_width = $thumbnail[1];
			$thumbnail_img_height = $thumbnail[2];

			$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id));
			$notAllowed = array("<p>", "<p> ", "</p>", " </p>", "<br>");
			$excerpt = str_replace($notAllowed, "", $excerpt);
			$type = "article";
			$title = get_the_title();
			$permalink = get_the_permalink();


			if (!is_single()) {
				$excerpt = types_render_field( "excerpt", array( "output"=>"raw") );
			}

			if (is_page()) {
				$thumbnail_img = get_bloginfo( 'template_url' ); 
				$thumbnail_img .= '/images/standard-thumbnail.jpg';
				$thumbnail_img_width = 1829;
				$thumbnail_img_height = 1097;	
			}

			if (is_front_page()) {
				$title = "The Pioneer";
				$permalink = "http://www.thepioneer.co";
			}

			if (is_author()) {
				
				$authorID = get_the_author_meta( 'ID' );
				$headshot = types_render_usermeta_field( "headshot", array( "width" => 600, 'user_id'=>$authorID, 'url'=>'true' ) );
				if ($headshot == "") {
					$avatar = get_bloginfo( 'template_url');
					$avatar .= '/images/no-avatar.jpg';
					$headshot = "<img src=\"" . $avatar . "\" />";
				}
				$thumbnail_img = $headshot;
				$thumbnail_img_width = 600;
				$thumbnail_img_height = 600;

				$type = "article.author";
				$title = get_the_author();
				$permalink = get_author_posts_url( $authorID );
				$excerpt = get_the_author_meta( 'description' );
			}

			if (is_category()) {
				
				$category_id = $wp_query->get_queried_object_id();
				$title = get_cat_name($category_id);
				$title .= " | The Pioneer";
				$permalink = get_category_link( $category_id );
				$type = "article";
				$description = "The Pioneer is both an online publication and the media education program at HackCville.";

				$thumbnail_img = get_bloginfo( 'template_url' ); 
				$thumbnail_img .= '/images/standard-thumbnail.jpg';
				$thumbnail_img_width = 1829;
				$thumbnail_img_height = 1097;
			}


		?>

		<!-- <meta property="fb:pages" content="743689375647531" /> -->
		<meta property="og:title" content="<?php echo $title; ?>" />
		<meta property="og:url" content="<?php echo $permalink; ?>" />
		<meta property="og:type" content="<?php echo $type; ?>" />
		<meta property="og:description" content="<?php echo $excerpt; ?>"/>
		<meta property="og:image" content="<?php echo $thumbnail_img; ?>" />
		<meta property="og:image:width" content = "<?php echo $thumbnail_img_width; ?>" />
		<meta property="og:image:height" content = "<?php echo $thumbnail_img_height; ?>" />
		<meta property="fb:app_id" content="1657839534433449" />
		<meta property="fb:admins" content="1432338858" />




		<!-- END OF OPEN GRAPH -->

		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<!-- Parsely JSON -->
		<?php if (is_single()) { 
		$id = get_the_ID(); 
		$co = coauthors("\", \"", "\", \"", "\"", "\"", false);

		$categories = get_the_category();
		$disallowed_categories = array("Photo Essays", "Videos", "Articles");
		$catNames = array();

		foreach ($categories as $cat) {
		    $catNames[] = $cat->name;
		}

		$goodCategories = array_diff($catNames, $disallowed_categories);

		$outputString = "\"";

		foreach ($goodCategories as $category) {
			$outputString = $outputString . $category . "\", \"";
		}
		$outputString = substr($outputString, 0, -3);

		?>
		<script type="application/ld+json"> 
		{
		"@context": "http://www.thepioneer.co",
		"@type": "NewsArticle",
		"headline": "<?php echo get_the_title($id); ?>",
		"url": "<?php the_permalink($id); ?>",
		"dateCreated": "<?php echo get_post_time('c', null, null, null); ?>",
		"articleSection": [<?php echo $outputString; ?>],
		"creator": [<?php echo $co; ?>]
		}
		</script>
		<?php } ?>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- Required for Facebook Like buttons to work -->
		<script>
			window.fbAsyncInit = function() {
			FB.init({
			appId      : '1657839534433449',
			xfbml      : true,
			version    : 'v2.5'
			});
			};

			(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
