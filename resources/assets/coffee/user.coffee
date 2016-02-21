topics = ["mathematics", "electronics"]
toolsOnBoard = []
currentMousePos = {x: 1, y: 1}
$(document).mousemove (e) ->
	currentMousePos.x = e.pageX;
	currentMousePos.y = e.pageY;
$ ->
	updateToolbox('mathematics')
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
			$(@).find(".drop-notifier").fadeOut(200)
		over: (event, ui) ->
			$(@).find(".drop-notifier").fadeIn(200)
		drop: (event, ui) ->
			$(".drop-notifier, .drop-notifier > span").fadeOut(500);
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
				toolsOnBoard.push({
					icon: icon,
					positions: {
						left: elementToAdd.left,
						top: elementToAdd.top
					},
					type: elem.data('type')
				});
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

# Sidebar toggle
div = $("nav.sidebar")
div.css
	display: 'none'
	width:0
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
