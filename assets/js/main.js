$(window).resize(function(){

	window.viewportWidth = $(window).width();
	window.viewportHeight = $(window).height();
	window.bannerHeight = window.viewportWidth / 1.889580093312597; 

	console.log("bannerHeight: "+window.bannerHeight);
	$("div.call-to-action").css("height", bannerHeight+"px");




});

$(function(){

$("div.entry-container").each(function(){
	$(this).css("height", ( $(this).width() / 2.5666) );
});

if ($("audio").length){
console.log('a');
var audio = document.getElementById('audio');
 
$.ajax({
    url: 'ajax.js',
    async: false,
    success: function() {
        audio.play(); // audio will play in iOS before 4.2.1
    }
});
}
$("iframe").each(function(){
		if (!$(this).parents("article").hasClass("post-2466")){
			$(this).css("width", "100%");
				newHeight = $(this).outerWidth() / 1.7778;
				$(this).css("height", newHeight);
		}
		else {
			$(this).css("width", "100%");
			console.log('this');
			newWidth = $(this).outerHeight() / 1.7778;
			newHeight = newWidth * 1.7778;
			console.log(newWidth);
			$(this).css({"width": newWidth, "height": newHeight});
		}
 	});



$("ul.dropdown-menu li").each(function(){

var thisClass = $(this).attr("class");

thisClass = thisClass.replace("menu-", "");
thisClass = thisClass.replace("active ", "");

console.log(thisClass);
var coverPhoto = $("div#cover-"+thisClass).find("div.cover-photo").find("img").attr("data-original");

$(this).find("a").css("background-image", "url('"+coverPhoto+"')").css("background-size", "100%");


});

$("a.next, a.previous").addClass("hide");

$("div.cover-photo.slide").css("left", (window.viewPortWidth*-1));

window.viewportWidth = $(window).width();
window.viewportHeight = $(window).height();


window.bannerHeight = window.viewportWidth / 1.889580093312597; 
$("div.call-to-action").css("height", bannerHeight+"px");



$("div.entry-content.banner").css("max-height", $("div#window article").width() / 2.5);
// $("div.cover-photo").find("img").css("height", $("div.issue").height());

window.coverPhotoWidth = $("article.post").find("h1").width();
window.coverPhotoOverflow = $("div.entry-content.banner").find("img").width();
console.log("width: "+coverPhotoWidth+ "overflow: "+window.coverPhotoOverflow);

window.coverPhotoOffset = (window.coverPhotoOveflow - window.coverPhotoWidth);

console.log("coverPhotoOffset: "+window.coverPhotoOffset);
$(".entry-content.banner").find("img").css("left", (window.coverPhotoOffset/2) * -1);

$(".entry-title").each(function(){
	var titleTemp = $(this).children("a").html();
	console.log(titleTemp);
	titleTemp = titleTemp.replace('and ', 'and<br />');

	$(this).children("a").html(titleTemp.replace(':', ':<br />'));
});

$(".piece-title").each(function(){
	if ($(this).parents(".post-4257")){
	}
	else {
	var titleTemp = $(this).html();
	console.log(titleTemp);
	titleTemp = titleTemp.replace(':', ': <br />');
	$(this).html(titleTemp.replace('and', 'and<br />'));
}

});

if (window.is_home){
	$('li.menu-this-issue').addClass('active');
}

$('li.menu-issues a').click(function(){ });

// check for hash
if (window.location.hash){
	var currentIssue = window.location.hash;
	var toClick = currentIssue.replace("#", 'cover-');
	console.log(toClick);
	$('div#'+toClick).children('div.cover-photo').animate({ left: '-'+($("div.issue").width())});
}
//cover photos

// alert($(window).width());
if ($(window).width() > 1255) {

	console.log('desktop style activate!');
$("div.banner a").each(function(){
	var thisImg = $(this).children("img");
	var bgImage = thisImg.attr("data-original");
	thisImg.hide();
	$(this).css({
		"background-image": "url("+bgImage+")",
		"background-size": "103%",
		"background-position": "center center"
	});

});
	// $("p").css("font-size", "2em");
// $("article").css("height", ( ( $(window).width() / 3 ) / 2.6392405063 )+"px" );
$( "div.issue" ).hover(
  function() {
    $( this ).find("div.cover-photo").addClass("open");
  }, function() {
    $( this ).find("div.cover-photo").removeClass("open");
  }
);
// $(window).scroll(function(){
// 	$("div.cover-photo").each(function(){
// 	if (checkVisible($(this))){
// 		$(this).addClass("open").parent().addClass("open");
// 	}
// 	else{
// 		$(this).delay(500).removeClass('open').parent().removeClass("open");
// 	}
// 	});

// });

}
else {
	$('div.cover-photo').click(
	function(event){

		$("div.cover-photo").removeClass("slide");;
		$(this).addClass("slide");
});
}





/*
$('ul.dropdown-menu li a').click(function(){
	console.log($(this));	
	$("a#issue-1").ScrollTo();
});*/



$('li.menu-issues > a, li.menu-store > a, li.menu-menu > a').click(function(){
	event.preventDefault();
	$("nav").toggleClass("open");
$('html, body').animate({
        scrollTop: $("#menu-primary-navigation").offset().top
    }, 500);
// 	if ($("nav").hasClass("open")){
// 		$("nav").animate({ height: "130px"}, 300, function(){
// 			$(this).removeClass("open");	

// 		});
// 	}
// 	else {
// 		$("nav").animate({ height: "initial"}, 300, function(){
// 		$(this).addClass("open");
// 	});
// }
	// $("nav").toggleClass("open", "1000", "ease");
	// $('ul.dropdown-menu').toggle();
	
	// $('ul.dropdown-menu').toggle();
	// if ( viewportWidth < "1026px" ){
	// 	$('header').toggleClass('open-mobile', 500);
	// } else {
	// 	$('header').toggleClass('open', 500);
	// }
	// if (! $(this).within("ul.dropdown-menu") ){
		if ($(this).hasClass("menu-menu"))
		return false;
	// }
});

if( $('img.bgstretch') != ''){
	var backstretch = $('img.bgstretch');
	if (backstretch.attr('src') && !$("body").hasClass("postid-1075")){
		$.backstretch(backstretch.attr('src'));
	}
}



$(window).scroll(function() { 
    var scroll = $(window).scrollTop();
    if (scroll > 768) {
        $(".top").removeClass("hide");
        $(".next").removeClass("hide").addClass("fixed");
        $(".previous").removeClass("hide").addClass("fixed");
    } else {
        $(".top").addClass("hide");
        $(".next").addClass("hide");
        $(".previous").addClass("hide");
}
});
/*
$(window).scroll(function() {
  var $credits = $(".credits");
  var window_offset = $credits.offset().top() - $(window).scrollTop();
	var window_scrollTop = $(window).scrollTop();
	if (window_offset <= 365){
		$('.next, .previous').addClass("hidden");
	}
	else {
		$('.next, .previous').removeClass("hidden");
	}
});*/
	


  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top-400
        }, 1000);
        //return false;
      }
    }
  });


});

// Extend jQuery.fn with our new method
jQuery.extend( jQuery.fn, {
    // Name of our method & one argument (the parent selector)
    within: function( pSelector ) {
        // Returns a subset of items using jQuery.filter
        return this.filter(function(){
            // Return truthy/falsey based on presence in parent
            return $(this).closest( pSelector ).length;
        });
    }
});

$(window).load(function(){
	$("img.lazy").lazyload({
		threshold: 2000,
		effect: "fadeIn"
	});

});

/* pop up subscribe */
$(document).ready(function(){

if ($("article").hasClass("post-4254")){
	$('.gallery p img').click(function(){

		var thisSrc = $(this).attr("src");

		var searchStr = thisSrc.search("back");
		console.log(searchStr);
		
		if (searchStr == -1){
			var newSrc = thisSrc.replace("front", "back");
		}
		else { 
			var newSrc = thisSrc.replace("back", "front");

		}
					$(this).attr('src', newSrc);

});
}



// $("div.cover-photo").find("img:not(.lazy)").each(function(){
// 	var imgSrc = $(this).attr("src");

// 	$(this).addClass("lazy").attr({ "data-original": imgSrc, "src": "/wp-content/themes/refigural/assets/img/gray.jpg" });
// });

// $(".entry-content").find("img:not(.lazy)").each(function(){
// 	var imgSrc = $(this).attr("src");

// 	$(this).addClass("lazy").attr({ "data-original": imgSrc, "src": "/wp-content/themes/refigural/assets/img/gray.jpg" });
// });

//$('p').has("img").addClass('img');
var viewportWidth = $(window).width();
var viewportHeight = $(window).height();
console.log("viewportWidth:"+viewportWidth);


var bannerHeight = $(".placeholder-banner").innerHeight()-50;
var bannerWidth = $(".placeholder-banner").innerWidth();
console.log(bannerHeight+"px !important");

$("div.call-to-action").css("height", bannerHeight+"px");

if (viewportWidth < "960px"){
	//$('p').has("img").addClass('fullscreen');
}

/*

	function readCookie(name) {
	    var nameEQ = name + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0;i < ca.length;i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1,c.length);
	        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	    }
	    return null;
	}
	
	var subCookie = readCookie("subscribe");
	console.log(subCookie);	
	if (subCookie != "1"){

	function showPopupSubWindow() {

		$("div#window").css("opacity", 0.05);
		$("div#subscribe-now").fadeToggle();
		

			$("a.close-popup").click(function(){
					if ($("#subscribe-now").is(":visible")){
					$("#window").css("opacity", 1);
					$("div#subscribe-now").fadeToggle();
							document.cookie =
							 'subscribe=1; expires=Fri, 3 Aug 2016 20:47:11 UTC; path=/';
				}
			});

			$(document).click(function(event) { 
			    if(!$(event.target).closest('#subscribe-now').length) {
			        if($('#subscribe-now').is(":visible")) {
			            	$("#window").css("opacity", 1);
							$("div#subscribe-now").fadeToggle();
							document.cookie =
							 'subscribe=1; expires=Fri, 3 Aug 2016 20:47:11 UTC; path=/';
			        }
			    }
			});

		}

		setTimeout(showPopupSubWindow, 1500);
	
	
}*/


if (window.backgroundvideo){
		$('#video').YTPlayer({
		    fitToBackground: true,
		    videoId: '<?php echo $backgroundvideo; ?>',
		    mute: false
		});
}


		
}

);

function checkVisible( elm, evalType ) {
    evalType = evalType || "visible";

    var vpH = $(window).height(), // Viewport Height
        st = $(window).scrollTop(), // Scroll Top
        y = $(elm).offset().top,
        elementHeight = $(elm).height();

    if (evalType === "visible") return (((y+elementHeight) < (vpH + st)) && ((y-elementHeight) > (st - elementHeight)));
    if (evalType === "above") return ((y < (vpH + st)));
}
