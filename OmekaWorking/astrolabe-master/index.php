<?php echo head(array('bodyid'=>'home')); ?>

<div id = "n_wrap">
    <div id = "n_content">
        <div id = "n_map_container">
            <div id = "neatline_home">
                <?php echo neatline_home(); ?>
            </div>
        </div>
        <?php echo featured_text(); ?>
        <div id = "tri_wrapper">
            <div class ="sub_container" id = "vertical_1">
                <?php echo build_exhibit(1); ?>
            </div>
            <div class ="sub_container" id = "vertical_2">
                <?php echo build_exhibit(2); ?>
            </div>
            <div class ="sub_container" id = "vertical_3">
                <?php echo build_exhibit(3); ?>
            </div>
        </div>
        <div id = "banner_wrapper">
            <?php echo build_banner(); ?>
        </div>
        <?php echo home_about(); ?>
        
    </div>
</div>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
