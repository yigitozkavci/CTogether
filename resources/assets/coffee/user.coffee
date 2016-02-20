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
