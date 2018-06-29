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
        <div id = "tri_wrapper">
            <div class ="sub_container" id = "vertical_1">
                <?php echo build_exhibit_1(); ?>
                <!--<a href ="http://communityplacememory.omeka.net/exhibits/show/public-market">
                    
                </a>
                <div class = "descr" id ="p1">
                    <h4>Rochester Public Market</h4>
                </div> -->
            </div>
            <div class ="sub_container" id = "vertical_2">
                <a href ="http://communityplacememory.omeka.net/exhibits/show/central">
                    <?php echo exhibit_img_2(); ?>
                </a>
                <div class = "descr" id= "p2">
                    <h4>Central Park</h4>                 
                </div>
            </div>
            <div class ="sub_container" id = "vertical_3">
                <a href ="http://communityplacememory.omeka.net/exhibits/show/textiles">
                    <?php echo exhibit_img_3(); ?>
                </a>
                <div class = "descr" id="p3">
                    <h4>Textile Industry</h4>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
