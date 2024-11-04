jQuery(document).ready(function ($) {
    $('#load-more-projects').on('click', function () {
        var button = $(this);
        var page = parseInt(button.data('page')) + 1;
        var maxPages = parseInt(button.data('max-pages'));

        $.ajax({
            url: load_more_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_projects',
                page: page
            },
            success: function (response) {
                if (response) {
                    $('#projects-container').append(response);
                    button.data('page', page);

                    // Hide button if we've reached the last page
                    if (page >= maxPages) {
                        button.hide();
                    }
                }
            }
        });
    });
});
