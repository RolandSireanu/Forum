
$(".topicClass").hover(function() {
	$(this).css("background-color", "#cdcddd");
	$(this).css('cursor', 'pointer');	
})

$(".topicClass").mouseleave(function() {
	$(this).css("background-color", "#e7e7f0");
})

$(".topicClass").mouseleave(function() {
	$(this).css("background-color", "#e7e7f0");
})

$(".topicClass").click(function(e) {	
	var i = $(this).attr("id");
	if(i == "idAlgorithms"){
		window.location.assign("topics.php?show=1");	
	}
	
	if(i == "idGraphAlgorithms"){
		window.location.assign("posts.php?show='graphAlgo'");
	}
})