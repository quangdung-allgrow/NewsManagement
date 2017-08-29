(function($) {
    $.addLoadingCenter = function() {
        $(document.body).append('<div class="ajax-loading"><div class="loader"></div></div>');

        $('.loader').css({
            'border': '5px solid #b5b5b5',
            'border-top': '5px solid #3498db',
            'border-radius': '50%',
            'width': '30px',
            'height': '30px',
            'animation': 'spin 2s linear infinite',
            'position': 'absolute',
            'left': '50%',
            'top': '50%'
        });

        $('.ajax-loading').css({
            'display': 'none',
            'background-color': 'rgba(0, 0, 0, 0.1)',
            'height': '100%',
            'left': '0',
            'position': 'fixed',
            'top': '0',
            'width': '100%',
            'z-index': '1050'
        });
    };

    $.addLoadingBottom = function() {
        $(document.body).append('<div class="ajax-loading"><div class="loader"></div></div>');

        $('.loader').css({
            'border': '5px solid #b5b5b5',
            'border-top': '5px solid #3498db',
            'border-radius': '50%',
            'width': '30px',
            'height': '30px',
            'animation': 'spin 2s linear infinite',
            'position': 'absolute',
            'right': '40px',
            'bottom': '40px',
            'background-color': '#fff'
        });

        $('.ajax-loading').css({
            'display': 'none',
            'height': '100%',
            'left': '0',
            'position': 'fixed',
            'top': '0',
            'width': '100%',
            'z-index': '1050'
        });
    };
})(jQuery);