<?php get_header(); ?>
<div class="container-fluid">
 <div class="col-lg-9">
  <div>
   <?php echo do_shortcode('[wetslider]'); ?>
  </div>
  <hr />
	<div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">

     <?php echo do_shortcode('[stickynewz]'); ?>


    <div class="line-breaker"></div>
      <br />
        <br />
          <br />
            <br />
         <!-- Insanen.com -->
	</main><!-- #main -->
</div><!-- #primary -->
  <hr />
  <br />
	</div>
 <div class="col-lg-3">
<?php
get_sidebar();
?>
</div>
</div>
<?php
get_footer();
?>
