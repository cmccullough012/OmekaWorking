<div class="juxtapose-container">
  <div class="juxtapose">
    <img src="http://www.rochestercommunitymemory.com/files/original/50a34748248f5f93eddb7597e8d46b13.jpg" data-label="First" />
    <img src="http://www.rochestercommunitymemory.com/files/original/a390472166a30278b6b3659d114f73dc.jpg" data-label="Second" />
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.knightlab.com/libs/juxtapose/latest/css/juxtapose.css">
<script src="https://cdn.knightlab.com/libs/juxtapose/latest/js/juxtapose.min.js"></script>
<script>
var $juxtapose = $('.juxtapose'),
    $juxtapose_container = $('.juxtapose-container'),
    juxtapose_ratio;

$(window).load(function(){
  juxtapose_ratio = $juxtapose.outerHeight() / $juxtapose.outerWidth();
});

$(window).resize(function(){
  var new_width = $juxtapose_container.outerWidth(),
      new_height = new_width*juxtapose_ratio;

  $juxtapose.css({
    width: new_width,
    height: new_height
  })
});
</script>