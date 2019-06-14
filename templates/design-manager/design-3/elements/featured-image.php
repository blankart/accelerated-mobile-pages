<?php do_action('ampforwp_before_featured_image_hook',$this);
global $redux_builder_amp, $post;
$post_id 		= $post->ID;
$featured_image = "";
$amp_html 		= "";
$caption 		= "";
$featured_image = $this->get( 'featured_image' );
$get_webp = "";
$get_webp = get_post_thumbnail_id($post->ID);
$get_webp_type =  get_post_mime_type( $get_webp );
$webp_mime_type = explode('/', $get_webp_type);
$check_webp_type = '.'.$webp_mime_type['1'];
if($featured_image || ( ampforwp_is_custom_field_featured_image() && ampforwp_cf_featured_image_src() ) || true == $redux_builder_amp['ampforwp-featured-image-from-content'] || (function_exists('has_post_video') && has_post_video($post->ID)) ){
	if($check_webp_type == ".webp"){
	 ampforwp_webp_featured_image();
	}
	// Featured Video SmartMag theme Compatibility #2559
	if(class_exists('Bunyad') && Bunyad::posts()->meta('featured_video') ){
			global $wp_embed;
			$videoContent = Bunyad::posts()->meta('featured_video');
  		  	$featured_video = $wp_embed->autoembed($videoContent);
 			$amp_html = ampforwp_content_sanitizer($featured_video);
  	} // Featured Video Plus Compatibility #2394 #2583
	elseif(function_exists('has_post_video') && has_post_video($post->ID)){ 
		$videoContent = get_the_post_video();
		$amp_html = ampforwp_content_sanitizer($videoContent);
	}elseif (  $featured_image ) {
		$amp_html = $featured_image['amp_html'];
		$caption = $featured_image['caption'];
	}
	elseif ( ampforwp_is_custom_field_featured_image() ) {
		$amp_img_src 	= ampforwp_cf_featured_image_src();
		$amp_img_width 	= ampforwp_cf_featured_image_src('width');
		$amp_img_height = ampforwp_cf_featured_image_src('height');
		if( $amp_img_src ){			
			$amp_html = "<amp-img src='$amp_img_src' width=$amp_img_width height=$amp_img_height layout='responsive' ></amp-img>";
		}
	}
	elseif( true == ampforwp_get_setting('ampforwp-featured-image-from-content') && ampforwp_get_featured_image_from_content() ){
		$amp_html = ampforwp_get_featured_image_from_content();
	}
		if( $amp_html ) {	
			?>
			<div class="amp-wp-article-featured-image amp-wp-content featured-image-content">
				<div class="post-featured-img">
					<figure class="amp-wp-article-featured-image wp-caption">
						<?php echo $amp_html; // amphtml content; no kses ?>
						<?php if ( $caption ) : ?>
							<p class="wp-caption-text">
								<?php echo wp_kses_data( $caption ); ?>
							</p>
						<?php endif; ?> 
					</figure>
				</div>
			</div> <?php 
		}
	}else{
		ampforwp_webp_featured_image();
	}

do_action('ampforwp_after_featured_image_hook',$this); ?>