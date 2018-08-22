

<h1><?php echo metadata('simple_pages_page', 'title');?></h1>

<?php $text = metadata('simple_pages_page', 'text', array('no_escape' => true)); echo $this->shortcodes($text);?>

    <div id = "oral-mobile">
        <h3>In order to view our oral history videos, please visit our desktop site. We apologize for the inconvenience.</h3>
    </div>
<div id = "oral-histories-primary">
    <div id = "easyPaginate">
        <?php echo generate_video_mosaic('oral_text'); ?>
    </div>

</div>
<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
