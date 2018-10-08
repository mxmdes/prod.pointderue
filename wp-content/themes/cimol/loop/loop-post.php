<?php
/**
 * Blog Post Loop
 */
?>


						<!--BLOG POST START-->
						<?php 
						
						while (have_posts()) : the_post(); ?>
								
						<article id="post-<?php  the_ID(); ?>" <?php  post_class('clearfix blog-post'); ?>>
							 
							 <!--if post is standard-->
                             <?php  if ( get_post_meta($post->ID, 'post_format', true) == ''){ the_post_thumbnail(); }?>
							 <?php  if ( get_post_meta($post->ID, 'post_format', true) == 'post_standard'){ ?>
								<?php the_post_thumbnail( 'full', array( 'class' => 'full-size-img' ) );?>
								<!--if post is gallery-->
								<?php } else if ( get_post_meta($post->ID, 'post_format', true) == 'post_gallery'){ 
								echo '<div class="blog-gallery clearboth clearfix">';
									$cimol_image_ids = get_post_meta(get_the_ID(), 'post_gallery_setting', true);
									$cimol_image_ids = explode( ',', $cimol_image_ids );
									foreach( $cimol_image_ids as $cimol_image_id ) {
										$cimol_image_title  = get_the_title( $cimol_image_id );
										$cimol_image_port = wp_get_attachment_image( $cimol_image_id, 'full' );
										$cimol_imageurl     =  esc_url( wp_get_attachment_url( $cimol_image_id )); 
										echo '<div>
												<a class="blog-popup-img" href="' . $cimol_imageurl . '">
													<span>
													<i class="fa fa-search"></i>
													</span>
													' . $cimol_image_port . '
												</a>
											</div>';
								} echo'</div>';
								
								//if post is slider
								}else if ( get_post_meta($post->ID, 'post_format', true) == 'post_slider'){ ?>
                                
									<div class="blog-slider ani-slider slider" data-slick='{"autoplaySpeed":<?php if ( function_exists( 'ot_get_option' ) && ot_get_option( 'blog_slide_delay' ) !='' )
										{echo esc_attr ( ot_get_option( 'blog_slide_delay' ));} else {echo '8000'; } ?> }'>
                                        
									<?php $cimol_simage_ids = get_post_meta(get_the_ID(), 'post_slider_setting', true);
									$cimol_simage_ids = explode( ',', $cimol_simage_ids );
									foreach( $cimol_simage_ids as $cimol_simage_id ) {
										$cimol_simage_port = wp_get_attachment_image( $cimol_simage_id, 'full' );
										$cimol_simageurl     =  esc_url( wp_get_attachment_url( $cimol_simage_id )); ?>
										<div class="slide">
											<div class="slider-mask" data-animation="slideLeftReturn" data-delay="0.1s"></div>
											<div class="slider-img-bg blog-img-bg" data-animation="fadeIn" data-delay="0.2s" data-animation-duration="0.7s" 
											data-background="<?php echo esc_url($cimol_simageurl); ?>"></div>
											<div class="blog-slider-box">
												<div class="slider-content"></div>
											</div><!--/.blog-slider-box-->
										</div><!--/.slide-->
									<?php }
									echo'</div>'; 

									
								//if post video	
								} else if ( get_post_meta($post->ID, 'post_format', true) == 'post_video'){ 
								echo'<div class="video"><iframe width="560" height="315" 
								src="'.esc_attr( get_post_meta($post->ID, 'post_video_setting', true)).'?wmode=opaque;rel=0;showinfo=0;controls=0;iv_load_policy=3"></iframe></div>';
								
								//if post audio
								} else if ( get_post_meta($post->ID, 'post_format', true) == 'post_audio'){ ?>
								<div class="audio">
								<?php $cimol_audio =get_post_meta($post->ID, 'post_audio_setting', true);
								echo wp_kses( $cimol_audio, array( 
									'iframe' => array(
											'src' => array(),
											'width' => array(),
											'height' => array(),
											'scrolling' => array(),
											'frameborder' => array(),
										),
								) ); ?>
								</div>
								<?php }?>
							 
							 <div class="spacing20 clearfix"></div>
                             <a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php the_title(); ?></h2></a>
                             
							 <ul class="post-detail">
                             	<?php if(get_the_category_list()) { ?> 
							 		<li class="postarch"><i class="fa fa-clone"></i> <?php the_category(', '); ?></li>
                                <?php }?>
                                								
								<?php if(get_the_tag_list()) { ?> 
									<li class="posttag"><i class="fa fa-tags"></i>
										<?php the_tags('', ', '); ?>
									</li>
								<?php }?>
								<li class="postcal"><i class="fa fa-clock-o"></i> <?php echo get_the_date();  ?> </li>
							  </ul>
							 <div class="spacing40 clearfix"></div>
							 
							 
							 <?php the_excerpt(); ?>
							 <div class="spacing20 clearfix"></div>
							 <a class="content-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('View Post','cimol') ?></a>
							 <div class="border-post clearfix"></div>
							 <div class="clearboth spacing40"></div>
						</article><!--/.blog-post-->
                        <?php endwhile; ?>
						<!--BLOG POST END-->

	

