jQuery(document).ready(function ($) {
    $.fn.slideshow  = function() {
        var slideCount = $('#slider ul li').length;
        var slideWidth = $('#slider ul li').width();
        var slideHeight = $('#slider ul li').height();
        var sliderUlWidth = slideCount * slideWidth;

        $('#slider').css({width: slideWidth, height: slideHeight});

        $('#slider ul').css({width: sliderUlWidth, marginLeft: slideCount <= 1 ? 0 : -slideWidth});

        function moveLeft() {
            $('#slider ul').animate({
                left: +slideWidth
            }, 200, function () {
                $('#slider ul li:last-child').prependTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        function moveRight() {
            $('#slider ul').animate({
                left: -slideWidth
            }, 200, function () {
                $('#slider ul li:first-child').appendTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        if (slideCount > 1) {
            $('#slider ul li:last-child').prependTo('#slider ul');

            $('a.control_prev').click(function () {
                moveLeft();
            });

            $('a.control_next').click(function () {
                moveRight();
            });
        }
    };

    $().slideshow();
});
