$(function () {
  $(document).on('click touch', '.inner_gnbkurly .dropdown', function () {
    $(".dropdown_menu li").toggle();
    $().addClass("active");
  });
  
  $(document).on('click touch', '.dropdown_item-1 .menu_list.menu-1', function () {
    $(".sub_menu.menu-1").toggle();
    if ($(this).hasClass("active")) {
      $(".sub_menu.menu-1").removeClass("active");
    } else {
      $(".sub_menu.menu-1").removeClass("active");
      $(this).addClass("active");
    }
  });

  let scroll_up = $('#scroll_up');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      scroll_up.addClass('show');
    } else {
      scroll_up.removeClass('show');
    }
  });

  scroll_up.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });

});
