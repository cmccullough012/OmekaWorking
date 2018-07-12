<?php

require_once dirname(__FILE__) . '/functions.php';

add_plugin_hook('public_head', 'queue_theme_assets');

add_filter('exhibit_builder_display_random_featured_exhibit', 'hijack_exhibit_builder_random_featured_exhibit'); 

/*
** Adds a fancy read more button to whatever section
** $link URL to direct to
** $button_id css id to style the button later 
** $button_text "Read more" or "more" or "continue" or whatever
*/

function read_more_button($link, $button_id, $button_text){
    $read_more = '<a href = "'.$link.'"><p id = "'.$button_id.'" class = "read_more_button">'.$button_text.' >></p></a>';
    return $read_more;
}


function home_about(){
    $text = '<div class="homepage-text"><h3 id = "About_head">About</h3><p id = "n_about_text">'.get_theme_option('about').'</p>'.read_more_button('http://rochestercommunitymemory.com/about', 'About_read_more', 'Read more').'</div>';
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
    $img = '<img src="'.image_url($option, $option).'" id ="exhibit'.$exhibitNumber.'" class = "n_image" alt = "'.exhibit_title($exhibitNumber).'"/>';
    return $img;
}

/*function bnner_img(){
    return '<img src="'.get_theme_option('bnner_img').'" id ="banner_image" />';
}*/

/*
** Builds exhibit using the previous exhibit functions
*/
function build_exhibit($exhibitNumber){
    $exhibit = exhibit_link($exhibitNumber).exhibit_img($exhibitNumber).'</a><div class = "descr" id = "exhibit_title_'.$exhibitNumber.'">'.exhibit_title($exhibitNumber).'</div>';
    return $exhibit;
}

/*
** Builds banner code with the link the banner directs to
** and the link to the banner image 
*/
function build_banner(){
    $bannerText = '<a href ="'.get_theme_option('banner_url').'"/><img src = "'.image_url('banner_img', 'banner_home').'" id = "front_banner" alt = "'.get_theme_option('banner_alt').'"/></a>';
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

function logo_url_test()
{
	$logo = get_theme_option('main_logo');
	$logo_url = $logo ? WEB_ROOT.'/files/theme_uploads/'.$logo : img('home-logo.png');
	return $logo;
}

function logo_url_test_name(){
    $logo = get_theme_option('main_logo');
    rename($logo, 'Main_logo.png');
}

function get_file_name($file){
    $name = get_theme_option($file);
    return $name;
}


/* $file variable as it appears in Config.ini*/
function rename_file($file, $new){
    $oldName = WEB_ROOT.'/files/theme_uploads/'.logo_url_test($file);
    $newName = WEB_ROOT.'/files/theme_uploads/'.$new;
    rename($oldName, $newName);
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
        $show = '</a><div id="search-container" class = "no_title">'.search_form(array('form_attributes' => array('role' => 'search'))).'</div>';
    }else{
        $show = '</div><div id = "head_row_2"><h1 id="site-title">'.link_to_home_page(theme_logo()).'</h1><a href = "#" id ="nav_icon"><img src = "https://i.imgur.com/GH9aF56.png"/></a><div id="search-container">'.search_form(array('form_attributes' => array('role' => 'search'))).'</div></div>';
    }
    return $show;
}

/*
** Build footer text 
*/
function build_footer_text(){
    $foot_text = get_theme_option('foot_text');
    return '<div id = "footer_text" class = "foot_section"><p>'.$foot_text.'</p></div>';
}


/*function logo_variable_url($upload, $name)
{
	$logo = get_theme_option($upload);
	$logo_url = $logo ? WEB_ROOT.'/files/theme_uploads/'.$logo : img($name);
	return $logo_url;
} */

/*
** Generates a URL and stores file locally for any image
** $upload refers to the name of the item in the config.ini file
** $name refers to a name to store the file under 
*/

function image_url($upload, $name){
    $image = get_theme_option($upload);
    $image_url = $image ? WEB_ROOT.'/files/theme_uploads/'.$image : img($name);
    return $image_url;
}

/*
** Build footer logo section
*/
function build_footer_logos(){
    $logo1 = '<a href = "'.get_theme_option('foot_url_1').'"><img src = "'.image_url('foot_img_1', 'foot_img_1').'" id = "foot_logo_1" alt = "'.get_theme_option('foot_alt_1').'"></a>';
    $logo2 = '<a href = "'.get_theme_option('foot_url_2').'"><img src = "'.image_url('foot_img_2', 'foot_img_2').'" id = "foot_logo_2" alt = "'.get_theme_option('foot_alt_2').'"></a>';
    return '<div id = "footer_logo" class = "foot_section">'.$logo1.$logo2.'</div>';
}

/*
** Build footer contact 
*/
function build_footer_contact(){
    $address = '<p>'.get_theme_option('foot_address').'</p>';
    $phone = '<p>'.get_theme_option('foot_phone').'</p>';
    $email = '<p>'.get_theme_option('contact_email').'</p>';
    return '<div id = "footer_contact" class = "foot_section"><h4>Contact</h4>'.$address.$phone.$email.'</div>';
}

/*
** Build footer social links 
*/

function build_footer_social(){
    $twitter_url = get_theme_option('twitter_username');
    $youtube_url = get_theme_option('youtube_username');
    $facebook_url = get_theme_option('facebook_link');
    
    $twitter = null;
    $youtube = null;
    $facebook = null; 
    $title = '<h4>Follow Us</h4>';

    if (!empty($twitter_url)){
        $twitter = '<a href = "'.$twitter_url.'"><img src = "https://i.imgur.com/GzurvMk.png" id = "twitter" alt = "twitter" /></a>';
    }
    
    if (!empty($youtube_url)){
        $youtube = '<a href = "'.$youtube_url.'"><img src = "https://i.imgur.com/367xSxZ.png" id = "youtube" alt = "youtube" /></a>';
    }
    
    if (!empty($facebook_url)){
        $facebook = '<a href = "'.$faceboook_url.'"><img src = "https://i.imgur.com/nzHDRdv.png" id = "facebook" alt = "facebook" /></a>';
    }
    
    if (empty($twitter) && empty($youtube) && empty($facebook)){
        $title = null;
    }
    
    return '<div id = "footer_social" class = "foot_section">'.$title.$twitter.$youtube.$facebook.'</div>';
    
    
}

?>