<?php echo head(array('bodyid'=>'home')); ?>

<div id = "n_wrap">
    <div id = "n_content">
        <div id = "n_map_container">
            <div id = "neatline_home">
                <?php echo neatline_home(); ?>
            </div>
        </div>
        <?php if ($homepageText = get_theme_option('about')): ?>
        <div id="homepage-text">
            <?php echo mh_about(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
