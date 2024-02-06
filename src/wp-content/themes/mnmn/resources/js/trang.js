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