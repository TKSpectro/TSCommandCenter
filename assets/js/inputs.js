/*
Handle custom select
*/

$(window).on('load', function() {
    var selectElements = $('.select');
    selectElements.each(function() {
        var placeholder = $(this).attr('placeholder');
        $(this).prepend('<i class="fas fa-chevron-down"></i>').prepend(placeholder);
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