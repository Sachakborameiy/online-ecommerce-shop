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
});
