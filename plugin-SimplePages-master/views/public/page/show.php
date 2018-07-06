<?php 
$bodyclass = 'page simple-page';
$top = simple_pages_earliest_ancestor_page(null);

// Build appropriate page titles
if (!$top) {
    $top = get_current_record('simple_pages_page');
    $topSlug = metadata($top, 'slug');
} else {
	$title = metadata('simple_pages_page', 'title');
	$subtitle = metadata('simple_pages_page', 'title');
}
echo head(array( 'title' => $title, 
	'bodyclass' => $bodyclass, 
	'bodyid' => metadata('simple_pages_page', 'slug'),
	'subtitle' => $subtitle,
	'currentUriOverride' => url($topSlug)
));

// If there is a file that matches the slug of this page, display that as the template
// Otherwise, use the template below on show.php
$fname = dirname(__FILE__) . '/' . metadata('simple_pages_page', 'slug') . '.php';
if (is_file( $fname )):
    include( $fname );
else :

    
    $bodyclass = 'page simple-page';
    if ($is_home_page):
        $bodyclass .= ' simple-page-home';
    endif; ?>

    <div id="primary">
        <?php if (!$is_home_page): ?>
        <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>
        <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
        <?php endif; ?>
        <?php
        $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
        echo $this->shortcodes($text);
        ?>
    </div>


<?php endif;
echo foot(); ?>

