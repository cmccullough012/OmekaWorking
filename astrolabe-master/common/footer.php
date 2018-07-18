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

    </footer><!-- end footer -->
</body>
<script src = "../javascripts/script.js"></script>
</html>
