<?php

require_once dirname(__FILE__) . '/functions.php';

add_plugin_hook('public_head', 'queue_theme_assets');

add_filter('exhibit_builder_display_random_featured_exhibit', 'hijack_exhibit_builder_random_featured_exhibit'); 

function home_about(){
    $text = '<div class="homepage-text"><h3 id = "About_head">About</h3><p id = "n_about_text">'.get_theme_option('about').'</p><p>Read more <a href = "http://www.rochestercommunitymemory.com/about">here</a></p></div>';
    return $text;
}
                

function featured_text(){
    $text = '<div id="featured-text" class = "homepage-text"><h3 id = "Featured_head">'.get_theme_option('text_heading').'</h3><p id = featured_text_body>'.get_theme_option('text_area').'</p></div>';
    return $text;
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

/*
** Inserts an iframe for the Neatline map on homepage 
*/

function neatline_home(){
    $neatline = get_theme_option('neatline_home');
    if (!empty($neatline)){
        return '<iframe src="'.$neatline.'" seamless="seamless" scrolling="no" frameborder = "0" id = "neatline_iframe_home"></iframe>';
    } 
}

/*
** Formats exhibit title for the three featured exhibits
** on the homepage
*/
function exhibit_title($exhibitNumber){
    $option = 'ex_title_'.$exhibitNumber;
    $title = '<h4>'.get_theme_option($option).'</h4>';
    return $title;
}

/*
** Formats link each exhibit photo directs to for the three 
** featured exhibits on the homepage
*/
function exhibit_link($exhibitNumber){
    $option = 'ex_link_'.$exhibitNumber;
    $link = '<a href ="'.get_theme_option($option).'">';
    return $link;
}

/*
** Formats image for each exhibit for the three 
** featured exhibits on the homepage
*/
function exhibit_img($exhibitNumber){
    $option = 'ex_img_'.$exhibitNumber;
    $img = '<img src="'.get_theme_option($option).'" id ="exhibit3" class = "n_image"/>';
    return $img;
}

/*function bnner_img(){
    return '<img src="'.get_theme_option('bnner_img').'" id ="banner_image" />';
}*/

/*
** Builds exhibit using the previous exhibit functions
*/
function build_exhibit($exhibitNumber){
    $exhibit = exhibit_link($exhibitNumber).exhibit_img($exhibitNumber).'</a><div class = "descr" id = "exhibit_title_3">'.exhibit_title($exhibitNumber).'</div>';
    return $exhibit;
}

/*
** Builds banner code with the link the banner directs to
** and the link to the banner image 
*/
function build_banner(){
    $bannerText = '<a href ="'.get_theme_option('banner_url').'"/><img src = "'.get_theme_option('banner_img').'" id = "front_banner" alt = "'.get_theme_option('banner_alt').'"/></a>';
    return $bannerText;
}


/*
** Formats logo url after uploading
*/
function logo_url()
{
	$logo = get_theme_option('main_logo');
	$logo_url = $logo ? WEB_ROOT.'/files/theme_uploads/'.$logo : img('home-logo.png');
	return $logo_url;
}

/*
** Formats logot to insert 
*/
function insert_logo(){
	return '<a href = "http://www.rochestercommunitymemory.com/"><img src="'.logo_url().'" alt="'.option('site_title').'" id = "home_Logo"/></a>';
}

/*
** Checks whether or not the site title should be shown
** If not, search container goes in line with the logo
** If yes, search container goes in line with the title 
*/
function hide_title(){
    $show = get_theme_option('title_off');
    if ($show ==1){
        $show = '<div id="search-container" style = "margin-top:80px">'.search_form(array('form_attributes' => array('role' => 'search'))).'</div>';
    }else{
        $show = '</div><div id = "head_row_2"><h1 id="site-title">'.link_to_home_page(theme_logo()).'</h1><div id="search-container">'.search_form(array('form_attributes' => array('role' => 'search'))).'</div></div>';
    }
    return $show;
}


?>