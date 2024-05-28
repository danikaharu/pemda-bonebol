(function ($) {
    "use strict";

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function () {
        $(document).on("click", "a.page-scroll", function (event) {
            var $anchor = $(this);
            $("html, body")
                .stop()
                .animate(
                    {
                        scrollTop: $($anchor.attr("href")).offset().top,
                    },
                    600,
                    "easeInOutExpo"
                );
            event.preventDefault();
        });
    });

    // closes the responsive menu on menu item click
    $(".navbar-nav li a").on("click", function (event) {
        if (!$(this).parent().hasClass("dropdown"))
            $(".navbar-collapse").collapse("hide");
    });

    /* Removes Long Focus On Buttons */
    $(".button, a, button").mouseup(function () {
        $(this).blur();
    });
})(jQuery);
