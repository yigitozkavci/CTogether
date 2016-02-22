var currentMousePos, div, toolsOnBoard, topics, updateEventHandlers, updateToolbox;

topics = ["mathematics", "electronics"];

toolsOnBoard = [];

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
      return $(this).find(".drop-notifier").fadeOut(200);
    },
    over: function(event, ui) {
      return $(this).find(".drop-notifier").fadeIn(200);
    },
    drop: function(event, ui) {
      var $droppedElement, elem, elementToAdd, icon;
      $(".drop-notifier, .drop-notifier > span").fadeOut(500);
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
        toolsOnBoard.push({
          icon: icon,
          positions: {
            left: elementToAdd.left,
            top: elementToAdd.top
          },
          type: elem.data('type')
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

div = $("nav.sidebar");

div.css({
  display: 'none',
  width: 0
});

$("nav.sidebar .close-icon").click(function() {
  div = $("nav.sidebar");
  return div.animate({
    width: 0
  }, 200, function() {
    return div.css('display', 'none');
  });
});

$(".logo").click(function() {
  div = $("nav.sidebar");
  div.css({
    'display': 'block'
  });
  return div.animate({
    width: 250
  }, 200);
});
