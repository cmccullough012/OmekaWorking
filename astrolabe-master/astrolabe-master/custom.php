<?php

require_once dirname(__FILE__) . '/functions.php';

add_plugin_hook('public_head', 'queue_theme_assets');

add_filter('exhibit_builder_display_random_featured_exhibit', 'hijack_exhibit_builder_random_featured_exhibit'); 

function mh_about($text=null){
	if (!$text) {
		// If the 'About Text' option has a value, use it. Otherwise, use default text
		$text =
			get_theme_option('about') ?
			strip_tags(get_theme_option('about'),'<a><em><i><strong><bold><u>') :
			__('%s is powered by <a href="http://omeka.org/">Omeka</a> + <a href="http://curatescape.org/">Curatescape</a>, a humanities-centered web and mobile framework available for both Android and iOS devices.',option('site_title'));
	}
	return $text;
}
                

function mh_home_about($length=800,$html=null){

	$html .= '<div class="about-text">';
		$html .= '<article>';
			
			$html .= '<header>';
				$html .= '<h2>'.option('site_title').'</h2>';
				$html .= '<span class="sponsor">'.__('A project by').' <span class="sponsor-name">'.mh_owner_link().'</span></span>';
			$html .= '</header>';
		
			$html .= '<div class="about-main"><p>';
				$html .= substr(mh_about(),0,$length);
				$html .= ($length < strlen(mh_about())) ? '... ' : null;
				$html .= ' <a href="'.url('about').'">'.__('Read more <span>About Us</span>').'</a>';
			$html .= '</p></div>';
	
		$html .= '</article>';
	$html .= '</div>';

	return $html;
}

/*
** Logo URL
*/
function home_logo_url()
{
	$logo = get_theme_option('lg_logo');
	$logo_url = $logo ? WEB_ROOT.'/files/theme_uploads/'.$logo : img('home-logo.png');
	return $logo_url;
}

/*
** Logo IMG Tag
*/
function home_logo(){
	return '<img src="'.home_logo_url().'" alt="'.option('site_title').'"/>';
}

/*
** Build an array of social media links (including icons) from theme settings
*/
function media_array($max=5){
	$social=array();
	($email=get_theme_option('contact_email') ? get_theme_option('contact_email') : get_option('administrator_email')) ? array_push($social,'<a target="_blank" rel="noopener" title="Email" href="mailto:'.$email.'" class="button social icon email"><i class="fa fa-lg fa-envelope" aria-hidden="true"><span> Email</span></i></a>') : null;		
	($twitter=get_theme_option('twitter_username')) ? array_push($social,'<a target="_blank" rel="noopener" title="Twitter" href="https://twitter.com/'.$twitter.'" class="button social icon twitter"><i class="fa fa-lg fa-twitter" aria-hidden="true"><span> Twitter</span></i></a>') : null;
	($instagram=get_theme_option('instagram_username')) ? array_push($social,'<a target="_blank" rel="noopener" title="Instagram" href="https://www.instagram.com/'.$instagram.'" class="button social icon instagram"><i class="fa fa-lg fa-instagram" aria-hidden="true"><span> Instagram</span></i></a>') : null;		
    ($facebook=get_theme_option('facebook_link')) ? array_push($social,'<a target="_blank" rel="noopener" title="Facebook" href="'.$facebook.'" class="button social icon facebook"><i class="fa fa-lg fa-facebook" aria-hidden="true"><span> Facebook</span></i></a>') : null;
	($youtube=get_theme_option('youtube_username')) ? array_push($social,'<a target="_blank" rel="noopener" title="Youtube" href="'.$youtube.'" class="button social icon youtube"><i class="fa fa-lg fa-youtube-play" aria-hidden="true"><span> Youtube</span></i></a>') : null;				

	if( ($total=count($social)) > 0 ){
		if($total>$max){
			for($i=$total; $i>($max-1); $i-- ){
				unset($social[$i]);
			}			
		}
		return $social;
	}else{
		return false;
	}	
}

/*
** Social media links for footer
** $class 'colored' uses a service-specific color as background
** $class 'no-label' visually hides the label and just uses the icon
*/
function media_footer($class=null, $max=9){
	$class.= get_theme_option('social_label') ? ' label' : ' no-label';
	$class.= get_theme_option('social_color') ? ' colored' : ' no-color';
	if( $social=media_array($max) ){
		return '<div class="link-icons '.$class.'">'.implode(' ',$social).'</div>';
	}
}

/*
** Build a series of social media link for the homepage
** $class 'colored' uses a service-specific color as background
** $class 'no-label' visually hides the label and just uses the icon
*/
function media_home($class="", $max=3){
	if( $social=media_array($max) ){
		return '<div class="link-icons '.$class.'">'.implode(' ',$social).'</div>';
	}
}

function neatline_home(){
    $neatline = get_theme_option('neatline_home');
    if (!empty($neatline)){
        return '<iframe src="'.$neatline.'" seamless="seamless" scrolling="no" frameborder = "0" id = "neatline_iframe_home"></iframe>';
    } 
}

?>