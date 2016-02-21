topics = ["mathematics", "electronics"]
###
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
###
currentMousePos = {x: 1, y: 1}
$(document).mousemove (e) ->
	currentMousePos.x = e.pageX;
	currentMousePos.y = e.pageY;
$ ->
	updateToolbox('mathematics')
	$("nav.sidebar .close-icon").click () ->
		div = $("nav.sidebar")
		div.animate
			width:0
			200
			->
				div.css('display', 'none')
	$(".logo").click () ->
		div = $("nav.sidebar")
		div.css
			'display': 'block'
		div.animate
			width:250
			200
	$(".question .body").click () ->
		$("#showQuestionModal").modal();
	selectbox = $(".sumoselect")
	selectbox.SumoSelect()
	selectbox.change (event) ->
		updateToolbox(selectbox.val())
	$(".tool").draggable
		helper: "clone"
		containment: "html"
	$(".workspace").droppable
		hoverClass: "hovered-workspace"
		out: (event, ui) ->
			$(@).find(".drop-notifier").fadeOut(500)
		over: (event, ui) ->
			$(@).find(".drop-notifier").fadeIn(500)
		drop: (event, ui) ->
			$(".drop-notifier").fadeOut(500);
			$droppedElement = ui.helper
			if !$droppedElement.hasClass('dynamic-tool') && !$droppedElement.data('deleting')
				$droppedElement.css
					position: "absolute"
					left: currentMousePos.x
					top: currentMousePos.y
				elem = ui.helper
				icon = elem.find(".icon").html()
				elementToAdd = $('<div class="dynamic-tool">'+icon+'</div>')
				if elem.data('type') == 'text'
					elementToAdd.addClass('text')
				elementToAdd.draggable().css( {
					'left': ui.offset.left-10,
					'top': ui.offset.top-50,
					'position': 'absolute'
				})
				$('.workspace').append(elementToAdd)
				updateEventHandlers()

	# Deleting objects that are left to the trashbin
	$(".trashbin").droppable
		hoverClass: "hovered-trashbin"
		over: (event, ui) ->
			$(ui.helper).data('deleting', true)
		drop: (event, ui) ->
			$droppedElement = ui.helper
			console.log $droppedElement
			$droppedElement.remove()
# Re-renders whole toolbox according to the information given.
updateToolbox = (topic) ->
	$(".toolbox").hide()
	$(".toolbox").each () ->
		if $(@).data('topic') == topic
			$(@).show()
			false
updateEventHandlers = () ->
	# Text tool
	$(".dynamic-tool.text").click () ->
		$(@).empty()
		$input = $('<textarea style="z-index:-2"></textarea><div class="carrier" style="display:none;"><i class="fa fa-arrows"></i></div>');
		$(@).append($input.css('border', 'none')).unbind('click')
