

<h1><?php echo metadata('simple_pages_page', 'title');?></h1>

<!-- Obstructs the maps on mobile so it doesn't take data and time to load them-->
<div id = "maps-primary-mobile">
    <h3>In order to view our interactive maps, please visit our desktop site. We apologize for the inconvenience.</h3>
</div>

<!-- main map container -->
<div id= "maps-primary">
    <?php $text = metadata('simple_pages_page', 'text', array('no_escape' => true)); echo $this->shortcodes($text);?>

    <div id = "easyPaginateMaps">
        <?php echo generate_map_mosaic('map_link_block'); ?>
    </div>

</div>
<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
