<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main>	
		<div class="container">	
			<h1 class="page-title"><span>U</span><?php single_post_title(); ?><?php single_term_title()?></h1>
			<div class="page-template">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						<div class="blog-archive">
							<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) : the_post();
									
									get_template_part( 'template-parts/archive/archive', 'blog' );
								
								endwhile;

								

							else :

							endif;
							?>
						</div>
						<div class="post-pagination">
							<?php if(wp_pagenavi()) wp_pagenavi()?>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<div class="blog-sidebar">
							<?php get_template_part( 'template-parts/sidebar/sidebar', 'blog' ); ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</main>
	

<?php get_footer();
