parseWorkspace = function(callback) {
	html2canvas($(".workspace"), {
		onrendered: function(canvas) {
			return callback(canvas);
		}
	});
}
$(".submit-answer").click(function() {
	var canvas = parseWorkspace();
	$.ajax({
		url: "http://localhost:8000/api/v1/answers",
		type: "POST",
		data: {
			image: canvas.toDataURL("image/png")
		},
		success: function(data, textStatus, jqXHR) {
			console.log("Wow, so success!");
		}
	});
});
$(".create-question").click(function() {
	parseWorkspace(function(canvas) {
		$.ajax({
			url: "http://localhost:8000/api/v1/questions",
			type: "POST",
			data: {
				image: canvas.toDataURL("image/png"),
				workspace: $("#workspace").html()
			},
			success: function(data, textStatus, jqXHR) {
				console.log("Wow, so success!");
			}
		});
	});
});
