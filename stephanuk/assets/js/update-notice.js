(function ($) {
    "use strict";
    jQuery(window).load(function() {
        
        $('.trydus-notice.is-dismissible .notice-dismiss').on('click', function () {
            console.log('clicked')
            var data = {
                action: 'trydus_dismiss_notice',
            };

            $.post(notice_params.ajaxurl, data, function (response) {
                console.log(response, 'DONE!');
            });
        })
    });
})(jQuery);