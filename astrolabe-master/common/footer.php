    </div>

    <footer role="contentinfo">
        
        <div id = "footer_container">
            <div id = "footer_text" class = "foot_section">
                <p>This is some footer text. The customizations under the configure tab for the footer are not yet operational.</p>
            </div>
            <div id = "footer_logo" class = "foot_section">
                <a href = "www.rit.edu"><img src = "https://i.imgur.com/awdWLE0.png" id = "foot_logo_1" alt = "RIT"></a>
                <a href = "www.neh.gov"><img src = "https://i.imgur.com/WJ4eI8Y.png" id = "foot_logo_2" alt = "NEH"></a>
            </div>
            <div id = "footer_contact" class = "foot_section">
                <h4>Contact</h4>
                <p>1 Lomb Memorial dr<br>Rochester, NY 14623</p>
                <p>rochcmp@gmail.com</p>
            </div>
            <div id = "footer_social" class = "foot_section">
                <h4>Follow Us</h4>
                <p>This section under construction.</p>
            </div>
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
</html>
