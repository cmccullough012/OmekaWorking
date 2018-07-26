

<h1><?php echo metadata('simple_pages_page', 'title');?></h1>

<?php $text = metadata('simple_pages_page', 'text', array('no_escape' => true)); echo $this->shortcodes($text);?>

<div id = "easyPaginate">
    <?php echo generate_video_mosaic('oral_text'); ?>
</div>


<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
