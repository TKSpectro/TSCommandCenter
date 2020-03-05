/*
Handle custom select
*/

$(window).on('load', function() {
    var selectElements = $('.select');
    selectElements.each(function() {
        var rootElement = $(this);
        var icon = $('<i class="fas fa-chevron-down"></i>');

        $(icon).prependTo($(this).find('p').first());

        $(this).find('.select_option').each(function(){
            $(this).on('click', function(){
                // Default procedurec of on click
                rootElement.attr('data-value', $(this).data('value'));
                rootElement.find('p').first().html($(this).text());
                $(icon).prependTo(rootElement.find('p').first());

                // Execute specified callback if not null and a function
                var callback = eval($(this).data('callback'));
                if(callback != null) {
                    if(typeof callback == 'function') {
                        callback();
                    }
                }
            });
        });
    });
});

$('.select').on('click', function(){
    closeAllSelectDropdowns();
    var wrapper = $(this).find('.select_wrapper').first();

    if(wrapper.hasClass('visible')) {
        closeAllSelectDropdowns();
    } else {
        wrapper.addClass('visible');
    }
});

$(document).click(function(e) {
    e.stopPropagation();
    if(e.target.className != 'select') {
        closeAllSelectDropdowns();
    }
    
});

function closeAllSelectDropdowns(){
    $('.select').each(function() {
        var wrapper = $(this).find('.select_wrapper').first();
        wrapper.removeClass('visible');
    });
}