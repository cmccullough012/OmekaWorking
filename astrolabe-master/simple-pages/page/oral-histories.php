

<h1><?php echo metadata('simple_pages_page', 'title');?></h1>

<!-- Pulls whatever is saved for this page in the Admin interaface simple pages-->
<?php $text = metadata('simple_pages_page', 'text', array('no_escape' => true)); echo $this->shortcodes($text);?>

<!-- Obstructs the videos on mobile so it doesn't take data and time to load them-->
    <div id = "oral-mobile">
        <h3>In order to view our oral history videos, please visit our desktop site. We apologize for the inconvenience.</h3>
    </div>

<!-- main video container -->
<div id = "oral-histories-primary">
    <div id = "easyPaginate">
        <?php echo generate_video_mosaic('oral_text'); ?>
    </div>

</div>
<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
