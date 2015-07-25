<?php
// Template Tags
function exitpopup_title() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $seo_title ) ) {
		$output = esc_html( $seo_title );
	}
	return $output;
}

function exitpopup_metadescription() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $seo_description ) ) {
		$output = '<meta name="description" content="'.esc_attr( $seo_description ).'">';
	}

	return $output;
}

function exitpopup_privacy() {
	$output = '';

	if ( get_option( 'blog_public' ) == 0 ) {
		$output = "<meta name='robots' content='noindex,nofollow' />";
	}

	return $output;
}

function exitpopup_favicon() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $favicon ) ) {
		$output .= "<!-- Favicon -->\n";
		$output .= '<link href="'.esc_attr( $favicon ).'" rel="shortcut icon" type="image/x-icon" />';
	}

	return $output;
}

function exitpopup_customcss() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $custom_css ) ) {
		$output = '<style type="text/css">'.$custom_css.'</style>';
	}

	return $output;
}

function exitpopup_head() {
	$o = exitpopup_settings();
	extract( $o );

	// CSS
	$output = '';

	$output .= "<!-- Bootstrap and default Style -->\n";
	$output .= '<link rel="stylesheet" href="'.exitpopup_PLUGIN_URL.'themes/default/bootstrap/css/bootstrap.min.css">'."\n";
	$output .= '<link rel="stylesheet" href="'.exitpopup_PLUGIN_URL.'themes/default/style.css">'."\n";
	if ( is_rtl() ) {
		$output .= '<link rel="stylesheet" href="'.exitpopup_PLUGIN_URL.'themes/default/rtl.css">'."\n";
	}
	$output .= '<style type="text/css">'."\n";

	// Calculated Styles

	$output .= '/* calculated styles */'."\n";
	ob_start();
	?>

	/* Background Style */
    html{
    	height:100%;
		<?php if ( !empty( $bg_image ) ): ;?>
			<?php if ( isset( $bg_cover ) && in_array( '1', $bg_cover ) ) : ?>
				background: <?php echo $bg_color;?> url('<?php echo $bg_image; ?>') no-repeat top center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			<?php else: ?>
				background: <?php echo $bg_color;?> url('<?php echo $bg_image; ?>') <?php echo $bg_repeat;?> <?php echo $bg_position;?> <?php echo $bg_attahcment;?>;
			<?php endif ?>
        <?php else: 
              if(!empty($bg_color)):
     	?>
        	background: <?php echo $bg_color;?>;
		<?php endif;endif; ?>
    }
    .seed-csp4 body{
    	height:100%;
			<?php if ( !empty( $bg_effect ) ) : ?>
				background: transparent url('<?php echo plugins_url( 'images/bg-'.$bg_effect.'.png', __FILE__ ) ; ?>') repeat;
			<?php else: ?>
				background: transparent;
			<?php endif; ?>
	}

	<?php if ( !empty( $max_width ) ):?>
	#seed-csp4-content{
    	max-width: <?php echo intval($max_width);?>px;
	}
	<?php endif;?>

	<?php if ( !empty( $enable_well ) ):?>
	#seed-csp4-content{
		min-height: 20px;
		padding: 19px;
		background-color: #f5f5f5;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
	}
	<?php endif;?>

    /* Text Styles */
    <?php if ( !empty( $text_font ) ):?>
	    .seed-csp4 body{
	        font-family: <?php echo exitpopup::get_font_family($text_font); ?>
	    }

	    .seed-csp4 h1, .seed-csp4 h2, .seed-csp4 h3, .seed-csp4 h4, .seed-csp4 h5, .seed-csp4 h6{
	        font-family: <?php echo exitpopup::get_font_family($text_font); ?>
	    }
    <?php endif;?>

    <?php if ( !empty( $text_color ) ) { ?>
		.seed-csp4 body{
			color:<?php echo $text_color;?>;
		}
    <?php } ?>

    <?php if ( !empty( $link_color ) ) { ?>
    <?php if ( empty( $headline_color ) ) { $headline_color = $link_color; }?>
    <?php } ?>


    <?php if ( !empty( $headline_color ) ) { ?>
		.seed-csp4 h1, .seed-csp4 h2, .seed-csp4 h3, .seed-csp4 h4, .seed-csp4 h5, .seed-csp4 h6{
			color:<?php echo $headline_color;?>;
		}
    <?php }?>


    <?php if ( !empty( $link_color ) ) { ?>
		.seed-csp4 a, .seed-csp4 a:visited, .seed-csp4 a:hover, .seed-csp4 a:active{
			color:<?php echo $link_color;?>;
		}


    <?php }

	$output .= ob_get_clean();

	$output .= '</style>'."\n";



	// Javascript
	$output .= "<!-- JS -->\n";
	$include_url = includes_url();
	$last = $include_url[strlen( $include_url )-1];
	if ( $last != '/' ) {
		$include_url = $include_url . '/';
	}
	if ( empty( $enable_wp_head_footer ) ) {
		$output .= '<script src="'.$include_url.'js/jquery/jquery.js"></script>'."\n";
	}
	$output .= '<script src="'.exitpopup_PLUGIN_URL.'themes/default/bootstrap/js/bootstrap.js"></script>'."\n";

	$output .= '<script src="'.exitpopup_PLUGIN_URL.'themes/default/js/script.js"></script>'."\n";


	// Header Scripts
	if ( !empty( $header_scripts ) ) {
		$output .= "<!-- Header Scripts -->\n";
		$output .= $header_scripts;
	}

	// Google Analytics
	if ( !empty( $ga_analytics ) ) {
		$output .= "<!-- Google Analytics -->\n";
		$output .= $ga_analytics;
	}

	// Modernizr
	$output .= "<!-- Modernizr -->\n";
	$output .= '<script src="'.exitpopup_PLUGIN_URL.'themes/default/js/modernizr.min.js"></script>'."\n";

	return $output;
}

function exitpopup_footer() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';


	if(!empty($bg_cover)){
		$output .= '<!--[if lt IE 9]>
		<script>
		jQuery(document).ready(function($){';

	
		$output .= '$.supersized({';
		$output .= "slides:[ {image : '$bg_image'} ]";
		$output .= '});';
	

		$output .= '});
		</script>
		<![endif]-->';
	}


	if ( !empty( $footer_scripts ) ) {
		$output .= "<!-- Footer Scripts -->\n";
		$output .= $footer_scripts;
	}

	return $output;
}

function exitpopup_logo() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $logo ) ) {
		$output .= "<img id='seed-csp4-image' src='$logo'>";
	}

	return  $output;
}

function exitpopup_headline() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $headline ) ) {
		$output .= '<h1 id="seed-csp4-headline">'.$headline.'</h1>';
	}

	return  $output;
}

function exitpopup_description() {
	$o = exitpopup_settings();
	extract( $o );

	$output = '';

	if ( !empty( $description ) ) {
		$output .= '<div id="seed-csp4-description">'.shortcode_unautop(wpautop(convert_chars(wptexturize($description)))).'</div>';
	}

	return  $output;
}