

<h1><?php echo $pageTitle;?></h1>

<p>Oral Histories page text goes here</p>

<?php echo pagination_links(); ?>

<?php echo generate_video_mosaic('oral_text'); ?>


<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
