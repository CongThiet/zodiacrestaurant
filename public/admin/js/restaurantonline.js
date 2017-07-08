(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

})(jQuery);

$(function() {
    var url = window.location.href;
    $("#sub-header a").each(function() {
        if (url == (this.href)) {
            $(this).addClass("action");
        }
    });
});

$("#payment_method_bacs").click(function() {
    $("#content_cod").css("display", "block");
    $("#content_atm").css("display", "none");
});

$("#payment_method_cheque").click(function() {
    $("#content_cod").css("display", "none");
    $("#content_atm").css("display", "block");
});

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function(e) {
//             $('#image')
//                 .attr('src', e.target.result)
//                 .width(220)
//                 .height(229);
//         };

//         reader.readAsDataURL(input.files[0]);
//     };
// };


(function($) {
    // Checkbox toggle function for selecting all checkboxes on the page
    $.fn.toggleCheckboxes = function() {
        // Get all checkbox elements
        checkboxes = $(':checkbox').not(this);

        // Check if the checkboxes are checked/unchecked and if so uncheck/check them
        if (this.is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }
    }
}(jQuery));
$('#select_all').change(function() {
    $(this).toggleCheckboxes();
});
$('#selectAll').change(function() {
    $(this).toggleCheckboxes();
});