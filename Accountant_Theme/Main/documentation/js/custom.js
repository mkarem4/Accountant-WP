$(document)
    .ready(function() {

		/**************************
		* Scroll down menu fixed  *
		***************************/

        $(window)
            .scroll(function() {
                var wind = $(window)
                    .scrollTop()
                var wheight = $("header")
                    .height() + 100;;
                if (wind <= wheight) {
                    $('.panel-group')
                        .removeClass('fixed')
                } else {
                    $('.panel-group')
                        .addClass('fixed')
                }
            });

		/*********************
		* Scroll top action  *
		**********************/
		
        $(window)
            .scroll(function() {
                if ($(this)
                    .scrollTop() > 100) {
                    $('.scroll-top')
                        .fadeIn();
                } else {
                    $('.scroll-top')
                        .fadeOut();
                }
            });
        $('.scroll-top')
            .click(function() {
                $("html, body")
                    .animate({
                        scrollTop: 0
                    }, 600);
                return false;
            });

		/***************************
		* Scroll to action content  *
		****************************/

        // navigation click actions	
        $('.scroll-link')
            .on('click', function(event) {
                event.preventDefault();
                var sectionID = $(this)
                    .attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
        // scroll to top action
        $('.scroll-top')
            .on('click', function(event) {
                event.preventDefault();
                $('html, body')
                    .animate({
                        scrollTop: 0
                    }, 'slow');
            });
        // mobile nav toggle
        $('.navbar-toggle')
            .on('click', function(event) {
                event.preventDefault();
                $('.navbar-collapse')
                    .toggleClass("open");
            });
    });
// scroll function
function scrollToID(id, speed) {
    var offSet = 25;
    var targetOffset = $(id)
        .offset()
        .top - offSet;
    var mainNav = $('.navbar-collapse');
    $('html,body')
        .animate({
            scrollTop: targetOffset
        }, speed);
    if (mainNav.hasClass("open")) {
        mainNav.css("height", "1px")
            .removeClass("in")
            .addClass("collapse");
        mainNav.removeClass("open");
    }
}
if (typeof console === "undefined") {
    console = {
        log: function() {}
    };
}

/***********************
* syntax highlighter  *
***********************/

SyntaxHighlighter.all()