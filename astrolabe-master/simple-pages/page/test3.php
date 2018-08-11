<body>
<!-- The Modal -->
<button id = "soundciteSpan">Click Me</button>
<div id = "modal-option">
    <div id = "question">
        <p>Would you like to view the transcript? </p>
        <button id = "yes_btn">Yes</button>
        <button id = "no_btn">No</button>
    </div>
</div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
      
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Transcript</h2>
    </div>
    <div class="modal-body">
      <p>It’s certainly [do] its history. I think you learn as much about the city of Rochester, county of Monroe, from this little corner of it as you would from some of the more covered areas and more well known neighborhoods. You know, I think it is, in many ways, the Ellis island of Rochester. It had two settlement houses within five blocks of each other, basically, and it was a gateway neighborhood for wave after wave of immigrants both from outside the country and from within. I mean, this is, I guess they call it the Great Migration where African Americans were coming up from the south and this was one of the neighborhoods that was welcoming to them. This  was the Ellis island; it sounds crazy to say in the same country, but basically, that’s what the function was. </p>
      <p style = "text-align:right;">-Rich Holowka</p>
    </div>
    <div class="modal-footer">
      <h3>Click outside the box to dismiss.</h3>
        <p id = "stop">Nevermind, I don't want to see the transcripts.</p>
    </div>
  </div>

</div>
</body>
    
<script>
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
