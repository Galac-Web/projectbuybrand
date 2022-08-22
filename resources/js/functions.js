window.search = search => {
    var match = RegExp('[?&]' + search + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

window.element_exists = element => {
    return !!element.length;
}

(function ($) {
    $.fn.exists = function () {
        return element_exists(this);
    };
})(jQuery);