$(document).ready(function () {
    $('#search').hide();
    $('.item').on('click',function(){
        $('#search').show();
        $('#choice').hide();
    });
});