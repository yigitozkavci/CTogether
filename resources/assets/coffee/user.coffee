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
		drop: (event, ui) ->
			$(".drop-notifier").fadeOut(500);
			$droppedElement = ui.helper
			if !$droppedElement.hasClass('dynamic-tool')
				$droppedElement.css
					position: "absolute"
					left: currentMousePos.x
					top: currentMousePos.y
				console.log "Dropped:"
				elem = ui.helper
				$('.workspace').append($('<div class="dynamic-tool"><i class="fa fa-home"></i></div>').draggable().css( {
					'left': currentMousePos.x-60,
					'top': currentMousePos.y-60,
					'position': 'absolute'
				}))
updateToolbox = (topic) ->
	$(".toolbox").hide()
	$(".toolbox").each () ->
		if $(@).data('topic') == topic
			$(@).show()
			false
