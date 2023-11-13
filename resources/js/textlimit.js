$(function() {
    var textHeight = $('.text-limit').height();
    var lineHeight = parseFloat($('.text-limit').css('line-height'));
    var lineNum = 2;
    var textNewHeight = lineHeight * lineNum;

    if (textHeight > textNewHeight) {
      $('.text-limit').css({
          'height': textNewHeight,
          'overflow':'hidden'
       });
      $('.readmore-btn').show();
      $('.readmore-btn').click(function() {
        $(this).hide();
        $('.text-limit').css({
          'height': textHeight,
          'overflow': 'visible'
         });
        return false;
      });
    };
  });

