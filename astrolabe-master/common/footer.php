    </div>

    <footer role="contentinfo">
        
        <div id = "footer_container">
            <?php echo build_footer_text(); 
                echo build_footer_logos();
                echo build_footer_contact();
                echo build_footer_social();
            ?>
        </div>

        <nav role="navigation">
            <?php echo public_nav_main(); ?>
        </nav>

        <div id="footer-text">
            <?php echo get_theme_option('Footer Text'); ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
        </div>

        <?php fire_plugin_hook('public_theme_footer'); ?>
        <?php echo js_tag('soundcite'); echo js_tag('script') ?>
        
      
        
        <!-- Juxtapose resources -->
        <script src="https://cdn.knightlab.com/libs/juxtapose/latest/js/juxtapose.min.js"></script>
        <link rel="stylesheet" href="https://cdn.knightlab.com/libs/juxtapose/latest/css/juxtapose.css">
        
        <!-- Soundcite resources-->
        <link href='https://cdn.knightlab.com/libs/soundcite/latest/css/player.css' rel='stylesheet' type='text/css'>
        <script type='text/javascript' src='https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js'></script>
        
        <!--install JQuery for the next script on Juxtapose -->
        <!-- for some reason this broke the easy paginate plugin, and without it, juxtapose sitll seems to be working so -->
                        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
                crossorigin="anonymous"></script>

    </footer><!-- end footer -->
</body>

</html>
