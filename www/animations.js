$(".directoryClass").hover(function() {
    $(this).css("background-color", "#eaeaf0");
    $(this).css("background", "linear-gradient(to bottom, rgba(147,147,147,1) 0%,rgba(254,254,254,1) 100%)");
    $(this).css('cursor', 'pointer');
})

$(".directoryClass").mouseleave(function() {
    $(this).css("background-color", "rgb(226, 226, 226)");
    $(this).css("background", "linear-gradient(to bottom, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 50%, rgba(254, 254, 254, 1) 100%)");
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