<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passionate
 */

get_header(); ?>

	<div class="container">
		<div class="dt-main-cont">
			<div class="row">

				<?php if ( get_theme_mod( 'passionate_page_layout', 0 ) == 'left_sidebar' ) : ?>

					<div class="col-lg-4 col-md-4">
						<?php get_sidebar( 'left' ); ?>
					</div><!-- .col-lg-4 .col-md-4 -->

				<?php endif; ?>

				<div class="<?php if ( get_theme_mod( 'passionate_page_layout', 0 ) == 'left_sidebar' || get_theme_mod( 'passionate_page_layout', 0 ) == 'right_sidebar' ) : ?>col-lg-8 col-md-8<?php else: ?>col-lg-12 col-md-12<?php endif; ?>">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php if ( have_posts() ) : ?>

								<?php if ( is_home() && ! is_front_page() ) : ?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
								<?php endif; ?>

								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>

									<?php

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );
									?>

								<?php endwhile; ?>

								<?php the_posts_navigation(); ?>

							<?php else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!-- .col-lg-8 .col-md-8 -->

				<?php if ( get_theme_mod( 'passionate_page_layout', 0 ) == 'right_sidebar' ) : ?>

					<div class="col-lg-4 col-md-4">
						<?php get_sidebar(); ?>
					</div><!-- .col-lg-4 .col-md-4 -->

				<?php endif; ?>
			</div><!-- .row -->
		</div><!-- .dt-main-cont -->
	</div><!-- .container -->

<?php get_footer(); ?>
