<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package inLoungeTheme
 */

get_header(); ?>

<div class="container-fluid">
 <div class="col-lg-9">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

 <div class="col-lg-3"><?php
get_sidebar();?>
</div>
</div>

<?php get_footer();
