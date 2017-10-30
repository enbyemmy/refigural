<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->


  <div class="wrap container" role="document">

	  <?php
	    do_action('get_header');
	    get_template_part('templates/header');
	  ?>
    <div class="content row">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
  <script type="text/javascript" src="/wp-content/themes/refigural/assets/js/jquery.backstretch.min.js"></script>
  <script src="/wp-content/themes/refigural/assets/js/jquery.lazyload.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/wp-content/themes/refigural/assets/js/main.js"></script>

</body>
</html>
