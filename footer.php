<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package DarkUnion
 */
?>
    <div id="footer" class="col-xs-12 col-sm-10 col-md-10">
      <div class="col-xs-12 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1">
        <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        &copy <?php echo date ('Y'); ?>
        <?php echo 'Created and maintained by Alexjuh' ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
    </div>
      <?php wp_footer() ?>
    </div> <!-- END DIV FOOTER -->
  </div> <!-- END DIV WRAPPER -->
</body>
</html>
