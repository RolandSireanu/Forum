
$(".directoryClass").hover(function() {
	$(this).css("background-color", "#cdcddd");
	$(this).css('cursor', 'pointer');	
})

$(".directoryClass").mouseleave(function() {
	$(this).css("background-color", "#e7e7f0");
})

$(".directoryClass").mouseleave(function() {
	$(this).css("background-color", "#e7e7f0");
})

$(".disccussions").click(function(e) {	
	var i = $(this).attr("id");	
	window.location.assign("topics.php?show=".concat(i));	
		
})

$(".topics").click(function(e) {

	var i = $(this).attr("id");
	window.location.assign("posts.php?show=".concat(i));
})

// $("#newTopic").hover(function(){
// 	$(this).prop('src' , 'images/ButtonHover.png')
// })

// $("#newTopic").mouseleave(function(){
// 	$(this).prop('src' , 'images/Button.png')
// })