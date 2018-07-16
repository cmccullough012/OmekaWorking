

<h1><?php echo $pageTitle;?></h1>

<p>Oral Histories page text goes here</p>

<?php echo pagination_links($options = array('per_page' => 5)); ?>

<div id = "easyPaginate">
<!--    <img src = "https://i.imgur.com/4IgpomA.jpg";/>
    <img src = "https://i.imgur.com/27sFPMO.jpg";/>
    <img src = "https://i.imgur.com/NowVArz.jpg";/>
    <img src = "https://i.imgur.com/mKriWnE.jpg";/>
         
</div> -->

<?php echo generate_video_mosaic('oral_text'); ?>
</div>


<?php echo pagination_links($options = array('per_page' => 5)); ?>

<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
