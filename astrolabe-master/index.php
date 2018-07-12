<?php echo head(array('bodyid'=>'home')); ?>



<div id = "n_wrap">
    <div id = "hide">
        <p id = "banner_img"><?php echo get_file_name(banner_img); ?></p>
        <p id = "mobile_ban"><?php echo get_file_name(mobile_ban); ?></p>
        <script> 
            function mobileFriendly(id1, id2) {
                var x = window.matchMedia("(max-width: 450px)");
                var large = document.getElementById(id1).innerHTML;
                var small = document.getElementById(id2).innerHTML;

                if (x.matches) { // If media query matches
                    document.getElementById("banner_wrapper").style.backgroundImage = 'url(../../files/theme_uploads/' + small + ')';
                } else {
                    document.getElementById("banner_wrapper").style.backgroundImage = 'url(../../files/theme_uploads/' + large + ')';
                }
            }
            
            mobileFriendly("banner_img", "mobile_ban");
        </script>
    </div>
    <div id = "n_content">
        <!-- Neatline map section -->
        <section id = "map">
            <div id = "n_map_container">
                <div id = "neatline_home">
                    <?php echo neatline_home(); ?>
                </div>
            </div>
            <!-- Text underneath map -->
            <?php echo featured_text(); ?>
        </section>
        <!--Three featured exhibits-->
        <section id = "tri_wrapper">
            <aside class ="sub_container" id = "vertical_1">
                <?php echo build_exhibit(1); ?>
            </aside>
            <aside class ="sub_container" id = "vertical_2">
                <?php echo build_exhibit(2); ?>
            </aside>
            <aside class ="sub_container" id = "vertical_3">
                <?php echo build_exhibit(3); ?>
            </aside>
        </section>
        <!-- Banner portal into another exhibit or simple page -->
        <section id = "banner_wrapper">
            <?php echo build_banner(); ?>
        </section>
        <!-- About text section -->
        <section id = "about">
            <?php echo home_about(); ?>
        </section>
    </div>
</div>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
