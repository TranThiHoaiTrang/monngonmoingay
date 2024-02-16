$('.testinput').on('keyup', function() {
    console.log($(location).attr('href'));
    var max = parseInt(this.max);
    var min = parseInt(this.min);
    if (parseInt(this.value) > max) {
        this.value = max;
    }
    if (parseInt(this.value) < min) {
        this.value = min;
    }
});
$(document).ready(function() {
    $('.select_col_post').on('change', function() {
        var slug_post = $('.slug_post').val();
        var page = '/page/'
        var trang = $(this).val() + '/';
        var url = slug_post + page + trang;
        // console.log(url);
        window.location = url

    });
});
$(document).ready(function() {
    const firstChild = $('.all_grid_lichphatsong').children().first();
    firstChild.addClass('bg-[var(--Primary-04)]')
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