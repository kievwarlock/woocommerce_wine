<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<main>
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

	?>
	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					
				<div class="single-header">
					<div class="blog-archive-item-date">
						<span><?php echo get_the_date('n.j'); ?></span>
						<span><?php echo get_the_date('Y'); ?></span>
					</div>
					<div class="single-header-categories">
						<?php
						
						$post_categories = wp_get_post_categories( get_the_ID() , array('fields' => 'all') );
				
						foreach ( $post_categories as $post_categories_item ){
							?>
							<a href="<?= get_category_link($post_categories_item->term_id) ?>">
								<?=$post_categories_item->name?>
							</a>
							<?php
						}
						?>
					</div>
					<div class="single-header-share">
						<span><?=__( 'Share', 'woocommerce' );?></span> <?php echo do_shortcode('[apss-share]');?>
					</div>
				
				</div>			
				
			</div>
		</div>
		<div class="page-template">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div class="post-single">
						<?php
						if( get_the_post_thumbnail_url() ) {
							$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "large") . ') center no-repeat; background-size:cover; " ';
							?>
							<div class="post-single-title-block">
								<div class="post-single-title-block-bg" <?=$style_bg ?> ></div>
								<h1><?php the_title();?></h1>
							</div>
							<?php
						}else{
							?>							
							<h1><?php the_title();?></h1>							
							<?php
						}
						?>
						<div class="post-single-content">				
							<?php the_content();?>	
						</div>		
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


	<?php
	endwhile; // End of the loop.
	?>

</main>	

<?php get_footer();
