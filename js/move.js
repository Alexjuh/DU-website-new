$(function() {
  /**
   * Add anchors to all A elements in the rassen menu
   */
  $('#menu-rassen a').each(function(i, el) {
    $(el).attr('href', $(el).attr('href')+'#tabs');
  });

  // Execute this code only if we have a menu-rassen
  if ($('#menu-rassen').length > 0) {
    $('.sub-menu li').each(function(iterator, element) {
      if ($(element).find('a > span').first().text() != 'Rassen') {
        return;
      }

      var html = $(element).find('ul').html();
      $(element).find('ul').remove();

      $('ul.tabs').html(html);
    });
  }

});
