$(function() {
  $("nav.sidebar .close-icon").click(function() {
    var div;
    div = $("nav.sidebar");
    return div.animate({
      width: 0
    }, 200, function() {
      return div.css('display', 'none');
    });
  });
  return $(".logo").click(function() {
    var div;
    div = $("nav.sidebar");
    div.css({
      'display': 'block'
    });
    return div.animate({
      width: 250
    }, 200);
  });
});
