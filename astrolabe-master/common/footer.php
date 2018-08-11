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
        
        <!-- Juxtapose resources -->
        <script src="https://cdn.knightlab.com/libs/juxtapose/latest/js/juxtapose.min.js"></script>
        <link rel="stylesheet" href="https://cdn.knightlab.com/libs/juxtapose/latest/css/juxtapose.css">
        
        <!-- Soundcite resources-->
        <link href='https://cdn.knightlab.com/libs/soundcite/latest/css/player.css' rel='stylesheet' type='text/css'>
        <script type='text/javascript' src='https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js'></script>
        
        <!--install JQuery for the next script on Juxtapose -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
                crossorigin="anonymous"></script>
        
        <script>
            //Makes Juxtapose frame responsive
            var $juxtapose = $('.juxtapose');

              $juxtapose.each(function(index, element) {
                var $juxtaposeContainer = $juxtapose.parent();
                var juxtaposeRatio;

                $(window).on('load', function (event) {
                  juxtaposeRatio = $(element).outerHeight() / $(element).outerWidth();
                });

                $(window).on('resize', function (event) {
                  var newWidth = $juxtaposeContainer.outerWidth();
                  var newHeight = newWidth * juxtaposeRatio;
                  $(element).css({width: newWidth, height: newHeight});
                });

              });
            
            // TRANSCRIPT MODALS 
            var modal = document.getElementById('myModal');
    
            var ask = document.getElementById('modal-option');
            var yes = document.getElementById('yes_btn');
            var no = document.getElementById('no_btn');
            var stop = document.getElementById('stop');

            // Get the button that opens the modal
            var btn = document.getElementById("soundciteSpan");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            var clicked = 0;
            var consent = false;
    
            btn.onclick = function() {
                if (consent==false && clicked ==0){
                    ask.style.display = "block";
                } else if (consent ==false && clicked ==-1){
                    return;
                } else {
                    if (clicked==1){
                        clicked = 0;
                        return; 
                    } if (clicked ==-1){
                        return;
                    } else {
                        modal.style.display = "block";
                        clicked = 1;
                    }
                }
            }

            // When the user clicks the button, open the modal 
            
        
            yes.onclick =function() {
                consent = true;
                ask.style.display = "none";
                modal.style.display = "block";
                clicked = 1;
  
            }
            
            no.onclick = function() {
                clicked = -1;
                ask.style.display = "none";
            }
    
            stop.onclick = function(){
                clicked = -1;
                modal.style.display = "none";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            
        </script>
      <!--  <script src = "/home/rocheste/public_html/themes/astrolabe/javascripts/modalScript.js" type = "text/javascript"></script>-->
    </footer><!-- end footer -->
</body>

</html>
