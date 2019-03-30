<?php
/**
 * Template Name: Home Template
 *
 * @package AccessPress Root
 */

get_header(); ?>

		<?php if(of_get_option('text_slider_cat') > 0): ?>
			<section id="message-slider" class="message-slides clearfix">
				<div class="ak-container">
					<div class="text-slider">
					<?php 
					$args = array(
						'cat' => of_get_option('text_slider_cat'),
						'posts_per_page' => 5 
						);
					$query = new WP_Query($args);
					if($query -> have_posts()):
						while($query->have_posts()):
							$query->the_post();
						?>
						<div class="slides">
							<h1 class="message-title">
								<?php the_title(); ?>
							</h1>
							<div class="message-content">
								<?php the_content(); ?>
							</div>
						</div>
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
					</div> <!-- bx-wrapper -->
				</div>
			</section> <!-- message-slider end -->
	<?php endif; ?>
	
			<section id="service-section" class="clearfix">
				<div class="ak-container">
                <?php if(of_get_option('service_title') || of_get_option('service_desc') ): ?>
					<div class="section-title-wrap">
						 <?php if(get_locale()=="en_US"):
                               $service_title = esc_attr(of_get_option('service_title_en'));
						       $service_desc =  wp_kses_post(of_get_option('service_desc_en'));
							   	$service_array = array(of_get_option('service_en1') , of_get_option('service_en2'), of_get_option('service_en3'), of_get_option('service_en4'),of_get_option('service_en5'),of_get_option('service_en6'));			 
						   else :
                               $service_title = esc_attr(of_get_option('service_title'));
                               $service_desc =  wp_kses_post(of_get_option('service_desc'));
							   $service_array = array(of_get_option('service1') , of_get_option('service2'), of_get_option('service3'), of_get_option('service4'),of_get_option('service5'),of_get_option('service6'));
                           endif; ?>
                        <?php if(of_get_option('service_title')): ?>
                            <h1 class="main-title"><?php echo $service_title; ?></h1>
                        <?php endif; ?>
						<?php if(of_get_option('service_desc')): ?>
						<div class="sub-desc">
							<?php echo  $service_desc ; ?>
						</div>
						<?php endif; ?>
					</div>
                    <?php endif; ?>

					<?php 
					$args = array(
						'post_type' => 'page',
						'post__in' => $service_array,
						'posts_per_page' => -1, 
						'orderby' => 'post__in'
						);

					$query = new WP_Query($args);					
					if($query->have_posts()): ?>
					<div class="service-block-wrap clearfix">
					<?php
						while($query->have_posts()):
							$query->the_post();
						?>
							<div class="service-block">
								<div class="service-image">
									<?php if(has_post_thumbnail()):
									$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-service-thumbnail' );
									?>
									<a href="<?php the_permalink(); ?>" class="image-wrap"> 
									<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
									</a>
									<div class="service-overlay">
										<a href="<?php the_permalink(); ?>"> <i class="fa fa-external-link"></i> </a>
									</div>
									<?php
									endif; ?>
								</div>
								<div class="service-content">
									<h1 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<div class="service-desc"><?php echo esc_html(accesspress_letter_count(get_the_content(),'80')); ?></div>
								</div>
							</div>
					<?php
						endwhile; ?>
					</div> <!-- service-block-wrap end -->
					<?php	
					endif;
					wp_reset_postdata();	
					?>
				</div>
			</section> <!--service section end -->	

			<section id="features" class="clearfix">
				<div class="ak-container">
					<?php
                    $query = new WP_Query( 'category_name=poslugy&posts_per_page=-1&order=ASC' ); ?>
                    <?php if(of_get_option('feature_title') || of_get_option('feature_desc')): ?>
					 <div class="section-title-wrap">
			    	<?php if(get_locale()=="en_US"):
                               $feature_title = esc_attr(of_get_option('feature_title_en'));
						       $feature_desc =  wp_kses_post(of_get_option('feature_desc_en'));
							   				 
						   else :
                               $feature_title = esc_attr(of_get_option('feature_title'));
                               $feature_desc =  wp_kses_post(of_get_option('feature_desc'));
							  
                           endif; 
					 if(of_get_option('feature_title')): ?>
                            <h1 class="main-title"><?php echo $feature_title; ?></h1>
                        <?php endif; 
						if(of_get_option('feature_desc')): ?>
						<div class="sub-desc">
							<?php echo  $feature_desc ; ?>
						</div>
					</div>
						<?php endif; 
					
					if($query->have_posts()): ?>

					<div class="feature-block-wrapper">
						<div class="feature-block-wrap clearfix">
							<?php
								while($query->have_posts()):
									$query->the_post();
								?>	
								<div class="feature-block">
									<?php if(has_post_thumbnail()): ?>
									<a href="<?php the_post_thumbnail_caption(); ?>" class="feature-icon">
										<?php the_post_thumbnail('thumbnail'); ?>
									</a>
									<?php endif; ?>
									<div class="feature-content">
										<h1 class="feature-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h1>
										<div class="feature-desc"><?php the_content(); ?></div>
									</div>
								</div>
								<?php
								endwhile; ?>
						</div>
					</div> <!-- feature-block-wrap end -->
					<?php	
					endif;
					wp_reset_postdata();	
					?>
				</div>
			</section> <!-- Features -->


			<section id="widgets">
				<div class="ak-container widget-container clearfix">
					<div class="widget-container-wrap">
					<?php 
					if(of_get_option('project')):
						 if(get_locale()=="en_US"):
							 $args = array(
					            	'page_id' => of_get_option('project_en')
					         	);
						     $readmore = esc_attr(of_get_option('project_readmore_en')); 
						 else: 
					           $args = array(
					            	'page_id' => of_get_option('project')
					         	);
				           	$readmore = esc_attr(of_get_option('project_readmore')); 
						endif;
						
					$query = new WP_Query($args);
					if($query->have_posts()):
						while($query->have_posts()):
							$query->the_post();
						?>
							<div class="info-title"><?php the_title(); ?></div> 
						<div class="widget-block">
							<div class="info-block-wrap">
								<?php if(has_post_thumbnail()):
									$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-project-big-thumbnail' );
								?>
								<div class="info-img"> 
								<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
								</a> 
								</div>
								<?php endif; ?>
								<div class="info-content"><?php echo esc_html(accesspress_letter_count(get_the_content(),'78')); ?></div>
								<a class="info-read-more" href="<?php the_permalink(); ?>"><?php echo $readmore; ?></a>
							</div>
				         	</div> <!-- widget-block -->
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					endif;
					?>

					<?php if(of_get_option('project_cat')): ?>
					  <div class="widget-block"> 
						<div class="project-block-wrap">
					<!--	<div class="info-title"><?php echo esc_html(get_cat_name(of_get_option('project_cat'))); ?></div>	-->
					<?php 
					$args = array(
						'posts_per_page' => 6,
						'cat' => of_get_option('project_cat')
						);
					$query = new WP_Query($args);
					if($query->have_posts()): ?>
					<div class="project-slider">
					<?php
						while($query->have_posts()):
							$query->the_post();
					?>
					<div class="slides">
						<div class="project-img-wrap">
							<?php 
								$big_image[0] = "";
							if(has_post_thumbnail()):
								$big_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
								$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-project-thumbnail' );
							?>
							<img src="<?php echo esc_url($image[0]); ?>">
							<?php 
							endif; ?>
							<div class="project-title"><?php the_title(); ?></div>
						</div>
						<div class="project-content-wrap">
							<div class="project-title"><?php the_title(); ?></div>
							<div class="project-content"><?php echo esc_html(accesspress_letter_count(get_the_content(),'120')); ?></div>
							<div class="project-link-wrap">
								<!-- <a class="project-search fancybox-gallery" data-lightbox-gallery="gallery1" href="<?php echo esc_url($big_image[0]); ?>"> <i class="fa fa-search"> </i> </a> . -->
								<a class="project-link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</div><!-- slides -->
					<?php
						endwhile; ?>
					</div>
					<?php	
					endif;
					wp_reset_postdata();
					?>
						</div> <!-- project-block-wrap -->
					</div> <!-- widget-block -->
				<?php endif; ?>
				</div>
				</div>
			</section> <!-- widget section -->

	<?php endif;
		?>



<?php get_footer(); ?>