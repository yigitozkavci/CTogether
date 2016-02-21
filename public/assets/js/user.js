var currentMousePos, topics, updateEventHandlers, updateToolbox;

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
  $(".workspace").droppable({
    hoverClass: "hovered-workspace",
    out: function(event, ui) {
      return $(this).find(".drop-notifier").fadeOut(500);
    },
    over: function(event, ui) {
      return $(this).find(".drop-notifier").fadeIn(500);
    },
    drop: function(event, ui) {
      var $droppedElement, elem, elementToAdd, icon;
      $(".drop-notifier").fadeOut(500);
      $droppedElement = ui.helper;
      if (!$droppedElement.hasClass('dynamic-tool') && !$droppedElement.data('deleting')) {
        $droppedElement.css({
          position: "absolute",
          left: currentMousePos.x,
          top: currentMousePos.y
        });
        elem = ui.helper;
        icon = elem.find(".icon").html();
        elementToAdd = $('<div class="dynamic-tool">' + icon + '</div>');
        if (elem.data('type') === 'text') {
          elementToAdd.addClass('text');
        }
        elementToAdd.draggable().css({
          'left': ui.offset.left - 10,
          'top': ui.offset.top - 50,
          'position': 'absolute'
        });
        $('.workspace').append(elementToAdd);
        return updateEventHandlers();
      }
    }
  });
  return $(".trashbin").droppable({
    hoverClass: "hovered-trashbin",
    over: function(event, ui) {
      return $(ui.helper).data('deleting', true);
    },
    drop: function(event, ui) {
      var $droppedElement;
      $droppedElement = ui.helper;
      console.log($droppedElement);
      return $droppedElement.remove();
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

updateEventHandlers = function() {
  return $(".dynamic-tool.text").click(function() {
    var $input;
    $(this).empty();
    $input = $('<textarea style="z-index:-2"></textarea><div class="carrier" style="display:none;"><i class="fa fa-arrows"></i></div>');
    return $(this).append($input.css('border', 'none')).unbind('click');
  });
};
