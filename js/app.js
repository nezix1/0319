(() => {
    "use strict";
    let addWindowScrollEvent = false;
    setTimeout((() => {
        if (addWindowScrollEvent) {
            let windowScroll = new Event("windowScroll");
            window.addEventListener("scroll", (function(e) {
                document.dispatchEvent(windowScroll);
            }));
        }
    }), 0);
    $(".icon-menu").click((function() {
        $("html").toggleClass("lock, menu-open");
    }));
    $("body").on("click", ".services__show-more", (function() {
        const el = $(this).closest(".services__item");
        el.toggleClass("active");
        if (el.hasClass("active")) {
            el.find("li").slideDown();
            $(this).text("сховати");
        } else {
            el.find("li:not(:nth-child(-n+3))").slideUp();
            $(this).text("бiльше...");
        }
    }));
    window["FLS"] = true;
})();