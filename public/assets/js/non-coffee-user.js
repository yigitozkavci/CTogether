parseWorkspace = function() {
	html2canvas($(".workspace"), {
		onrendered: function(canvas) {
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
		}
	});
}
