var topic_colors;

topic_colors = {
  mathematics: "red",
  electronics: "blue",
  chemistry: "green"
};

$(function() {
  var selectbox;
  $("nav.sidebar .close-icon").click(function() {
    var div;
    div = $("nav.sidebar");
    return div.animate({
      width: 0
    }, 200, function() {
      return div.css('display', 'none');
    });
  });
  $(".logo").click(function() {
    var div;
    div = $("nav.sidebar");
    div.css({
      'display': 'block'
    });
    return div.animate({
      width: 250
    }, 200);
  });
  $(".question .body").click(function() {
    return $("#showQuestionModal").modal();
  });
  selectbox = $(".sumoselect");
  return selectbox.SumoSelect();
});
