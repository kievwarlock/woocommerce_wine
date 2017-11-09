<div class="blog-sidebar-inner">
	
	<div class="blog-sidebar-item">
		<div class="blog-sidebar-title">
			<?php echo __(  'Last galleries' , 'winecard' ); ?>
		</div>
		<div class="blog-sidebar-popular">
			<?php
				 if( is_singular( 'gallery' ) ){
					 $exclude_ids = array( get_the_ID() );
				 }else{
					 $exclude_ids = '';
				 }
				$args = array(
					'posts_per_page' => 5,
					'post_type' => 'gallery',
					'post__not_in' => $exclude_ids,
					'post_status' => 'publish',					
				);

				$query = new WP_Query( $args );

				// Цикл
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						if( get_the_post_thumbnail_url() ) {
							$style_bg = 'style="background:url(' . get_the_post_thumbnail_url("", "medium") . ') center no-repeat; background-size:cover; " ';
						}else{
							$style_bg ='';
						}
						?>
						<div class="blog-sidebar-popular-item">
							<?php if($style_bg){ ?>
							<div class="blog-sidebar-popular-item-image">
								<div class="blog-sidebar-popular-item-image-bg" <?=$style_bg?> ></div>
							</div>
							<?php } ?>
							<div class="blog-sidebar-popular-item-title">
								<?php the_title();?>
							</div>
							<a href="<?php the_permalink();?>" class="blog-sidebar-popular-item-more"></a>
						</div>
						
						<?php
					}
				} else {
					// Постов не найдено
				}
				/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>