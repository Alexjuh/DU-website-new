<?php get_header();
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package DarkUnion
 */
 ?>
  <!-- <div id="content" class="row"> -->
        <div id="content" class="col-xs-12 col-sm-10 col-md-10">
          <?php
        		if (have_posts()) :
        			while (have_posts()) : the_post(); ?>
          <div id="main" class="col-xs-12 col-sm-7 col-sm-offset-1 col-md-7 col-md-offset-1">
            <div id="tabs" class="container">
              <?php wp_nav_menu( array( 'theme_location' => 'tabs' ) ); ?> <!-- voor tabs menu -->
            </div> <!-- END DIV TABS -->
            <div id="page-content">
              <p><?= the_content('post_content', $post->ID) ?></p>
            </div> <!-- END DIV PAGE-CONTENT -->
          </div> <!-- END DIV MAIN -->
        <?php endwhile;
          else: echo '<p>no content fount</p>';
            endif;
        ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
