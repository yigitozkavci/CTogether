parseWorkspace = function(callback) {
	html2canvas($(".workspace"), {
		onrendered: function(canvas) {
			return callback(canvas);
		}
	});
}
$(".solve-button").click(function() {
	var question_id = $(this).data('question');
	$.ajax({
		url: "http://localhost:8000/api/v1/question-components",
		type: "GET",
		data: {
			question_id: question_id
		},
		success: function(data) {
			console.log(JSON.parse(data));
			for(i in JSON.parse(data)) {
				var datum = JSON.parse(data)[i];
				console.log(datum);
				var $elem = $('<div class="dynamic-tool">'+datum.type+'</div>');
				$elem.css({
					left: datum.pos_left,
					top: datum.pos_top,
					position: "absolute"
				});
				console.log($elem);
				$(".workspace").append($elem.draggable());
			}
		}
	});
});
$(".submit-answer").click(function() {
	var canvas = parseWorkspace();
	var question_id = $(this).data('question')
	$.ajax({
		url: "http://localhost:8000/api/v1/answers",
		type: "POST",
		data: {
			image: canvas.toDataURL("image/png"),
			question_id: question_id
		},
		success: function(data, textStatus, jqXHR) {
			console.log("Wow, so success!");
		}
	});
});
$(".create-question").click(function() {
	var dynamic_icons = [];

	$(".dynamic-tool").each(function() {

		dynamic_icons.push({
			pos_left: $(this).css('left'),
			pos_top: $(this).css('top'),
			type: $(this).html()
		});
	});
	parseWorkspace(function(canvas) {
		$.ajax({
			url: "http://localhost:8000/api/v1/questions",
			type: "POST",
			data: {
				image: canvas.toDataURL("image/png"),
				workspace: $("#workspace").html(),
				dynamic_icons: dynamic_icons
			},
			success: function(data, textStatus, jqXHR) {
				//location.reload()
			}
		});
	});
});
