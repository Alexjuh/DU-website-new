<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "col-" div.
 *
 * @package DarkUnion
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
  </head>

  <body>
    <div id="wrapper" class="row">
      <div id="navbar" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <p>hier komt de navigatie<p>
      </div> <!-- END DIV NAVBAR -->
      <div id="header" class="col-xs-12 col-sm-10 col-md-10">
        <h1>HEADER</h1>
      </div> <!-- END DIV HEADER -->
