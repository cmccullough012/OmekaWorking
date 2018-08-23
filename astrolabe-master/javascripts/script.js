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

