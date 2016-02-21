var currentMousePos, topics, updateToolbox;

topics = ["mathematics", "electronics"];


/*
class Tool
	constructor: (@icon_code, @name, @topic) ->
		@topic = topics[@topic]
	prepareHtml: () ->
		'<div class="tool">
			<div class="icon">'+@icon_code+'</div>
			'+@name+'
		</div>'
tools = []
tools.push(new Tool '<i class="fa fa-right-arrow"></i>', 'RightArrow', 0)
tools.push(new Tool '<i class="fa fa-left-arrow"></i>', 'LeftArrow', 0)
tools.push(new Tool '<i class="fa fa-home"></i>', 'Home', 1)
tools.push(new Tool '&#8747;', 'Integral', 0)
tools.push(new Tool '√', 'Square Root', 0)
 */

currentMousePos = {
  x: 1,
  y: 1
};

$(document).mousemove(function(e) {
  currentMousePos.x = e.pageX;
  return currentMousePos.y = e.pageY;
});

$(function() {
  var selectbox;
  updateToolbox('mathematics');
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
  selectbox.SumoSelect();
  selectbox.change(function(event) {
    return updateToolbox(selectbox.val());
  });
  $(".tool").draggable({
    helper: "clone",
    containment: "html"
  });
  return $(".workspace").droppable({
    hoverClass: "hovered-workspace",
    drop: function(event, ui) {
      var $droppedElement, elem;
      $(".drop-notifier").fadeOut(500);
      $droppedElement = ui.helper;
      if (!$droppedElement.hasClass('dynamic-tool')) {
        $droppedElement.css({
          position: "absolute",
          left: currentMousePos.x,
          top: currentMousePos.y
        });
        console.log("Dropped:");
        elem = ui.helper;
        return $('.workspace').append($('<div class="dynamic-tool"><i class="fa fa-home"></i></div>').draggable().css({
          'left': currentMousePos.x - 60,
          'top': currentMousePos.y - 60,
          'position': 'absolute'
        }));
      }
    }
  });
});

updateToolbox = function(topic) {
  $(".toolbox").hide();
  return $(".toolbox").each(function() {
    if ($(this).data('topic') === topic) {
      $(this).show();
      return false;
    }
  });
};
