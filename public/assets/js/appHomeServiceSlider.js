$(document).ready(function () {

    // get current slide index
    let curSlide;
    $('.slide').each(function (i, e) {
        $(e).hasClass('active') ? curSlide = i : null;
    })
    getSlide();

    // next button
    $('.btn-next').click(nextBtn);
    // prev button
    $('.btn-prev').click(prevBtn);

    function prevBtn() {
        $('.slide').last().prependTo($('.slider-items'));
        getSlide();
    }

    function nextBtn() {
        $('.slide').first().appendTo($('.slider-items'));
        getSlide();
    }


    function getSlide() {
        $('.slide').removeClass('active');

        $('.slide').each(function (i, e) {
            $(e).css('transform', `translateX(${(i - curSlide) * 100}%)`);
            $('.slide').eq(curSlide).addClass('active');
        })
    }


});


