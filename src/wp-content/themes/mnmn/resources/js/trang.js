Object.assign(window, { $: jQuery, jQuery });

$(document).ready(function() {
    $('.grid_lichphatsong').find('.btn-default').addClass('btn-secondary');
    const firstChild = $('.all_grid_lichphatsong').children('.grid_lichphatsong').first();
    firstChild.addClass('bg-[var(--Primary-04)]');
    firstChild.find('.btn-default').removeClass('btn-secondary');
    firstChild.find('.btn-default').addClass('btn-primary');

});
$(document).ready(function() {
    // Bắt sự kiện khi nút được click
    $('[data-target]').on('click', function() {
        // Lấy giá trị của thuộc tính data-target
        var target = $(this).data('target');
        console.log(target);
        // Hiển thị phần tử mục tiêu
        $('#' + target).show();
        $('#' + target).addClass('show');

        $('.close-model').on('click', function() {

            $('#' + target).hide();
            $('#' + target).removeClass('show');
        });
    });


});