var base_url = "http://localhost:8000/";
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
		url: base_url+"api/v1/question-components",
		type: "GET",
		data: {
			question_id: question_id
		},
		success: function(data) {
			$('.dynamic-tool').remove();
			for(i in JSON.parse(data)) {
				var datum = JSON.parse(data)[i];
				console.log(datum);
				var $elem = $('<div class="dynamic-tool">'+datum.type+'</div>');
				$elem.css({
					left: datum.pos_left,
					top: datum.pos_top,
					position: "absolute"
				});
				$(".workspace").append($elem.draggable());
				$(".solving-mode").fadeIn(500).html('Solving question: '+question_id);
				console.log($(".submit-answer").attr('data-question', question_id));
			}
		}
	});
});
$(".submit-answer").click(function() {
	var dis = $(this);
	var canvas = parseWorkspace(function(canvas) {
		var question_id = dis.data('question')
		$.ajax({
			url: base_url+"api/v1/answers",
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
			url: base_url+"api/v1/questions",
			type: "POST",
			data: {
				image: canvas.toDataURL("image/png"),
				workspace: $("#workspace").html(),
				dynamic_icons: dynamic_icons
			},
			success: function(data, textStatus, jqXHR) {
				location.reload()
			}
		});
	});
});
$(".question .body").click(function() {
	$("#showQuestionModal").modal();
	var question_id = $(this).parent().data('id');
	$.ajax({
		url: base_url+'api/v1/questions/'+question_id,
		type: "GET",
		success: function(data) {
			data = JSON.parse(data);
			$(".single-question .question-title").html(data.text);
		}
	});
	var answers = [];
	$.ajax({
		url: base_url+'api/v1/questions/'+question_id+'/answers',
		type: "GET",
		success: function(data) {
			data = JSON.parse(data);
			for(var i = 0; i < data.length; i++) {
				var answer = $('<div class="answer"><div>');
				answer.html(data[i].text);
				$(".answers").append(answer);
			}
		}
	});
});
