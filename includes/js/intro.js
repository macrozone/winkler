// Generated by CoffeeScript 1.7.1
(function() {
  jQuery(function($) {
    var $intro, gone, hide;
    $intro = $("<div id='intro'><div class='logo'></div><div class='layer layer-1'></div><div class='layer layer-2'></div></div>");
    $intro.appendTo($("body"));
    gone = false;
    hide = function() {
      if (!gone) {
        gone = true;
        $intro.addClass("hiding");
        return setTimeout(function() {
          return $intro.remove();
        }, 10000);
      }
    };
    $intro.on("click", hide);
    return setTimeout(hide, 3000);
  });

}).call(this);
