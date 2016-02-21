topic_colors = {
	mathematics: "red",
	electronics: "blue",
	chemistry: "green"
}
$ ->
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
