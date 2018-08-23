            // TRANSCRIPT MODALS 
            var modal = document.getElementById('modalDiv');

            var ask = document.getElementById('modal-option');
            var yes = document.getElementById('yes_btn');
            var no = document.getElementById('no_btn');
            var stop = document.getElementById('stop');

            // Get the button that opens the modal
            var btn = null;
            var btn1 = document.getElementById("soundciteSpan1");
            var btn2 = document.getElementById("soundciteSpan2");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            var clicked = 0;
            var consent = false;

            btn1.onclick = function(){
                btn = btn1;
                document.getElementById("transcript1").style.display = "block";
                if (document.getElementById("transcript2")){
                    document.getElementById("transcript2").style.display = "none";
                }
                modalFunction();
            }

            if(btn2){
                btn2.onclick = function(){
                    btn = btn1;
                    document.getElementById("transcript1").style.display = "none";
                    document.getElementById("transcript2").style.display = "block";
                    modalFunction();
                }
            }


            function modalFunction() {
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