$(document).ready(function() {
    if ($('#others-room').length) {
        $('#others-room').owlCarousel({
            navigation: true,
            pagination: false,
            navigationText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>",
            ],
            mouseDrag: true,
            items: 4,
            transitionStyle: 'fade',
        });
    }

    if ($('.testimonials').length) {
        $('.testimonials').owlCarousel({
            navigation: false,
            pagination: true,
            navigationText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>",
            ],
            mouseDrag: true,
            items: 1,
            singleItem: true,
            // transitionStyle: 'fade',
        });
    }

    $('.dhts-show-rating').rating({
        theme: 'krajee-fa',
        displayOnly: true,
        showClear: false,
        step: 0.1,
        min: 0,
        max: 5,
        size: 'sm',
        starCaptions: function(val) {
            return `${val} out of 5.0`;
        },
        starCaptionClasses: function(val) {
            return 'caption-badge caption-success';
        },
    });
});
