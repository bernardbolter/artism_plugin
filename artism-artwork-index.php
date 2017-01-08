<?php
/* Template Name: Artism Artwork Index */
?>
<!DOCTYPE html>

<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );

?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<section class="artism-artwork-index">
  <h1>The Artwork of<br />Bernard Bolter</h1>
  <?php $artwork_loop = new WP_Query( array( 'post_type' => 'artism', 'posts_per_page' => -1 ) ); ?>
  <?php if ( $artwork_loop->have_posts() ) :
       while ( $artwork_loop->have_posts() ) : $artwork_loop->the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>


  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>



<?php wp_footer(); ?>

</body>
</html>
