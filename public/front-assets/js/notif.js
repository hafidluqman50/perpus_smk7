$(function(){
    $("button.notif-wishlist").click(function(){
        $("#wrap-notif").each(function(){
          $(this).show().animate({
            right:'10px'
          },300);
      $(".wish-box:first-child").clone().appendTo("#wrap-notif").show().animate({
        right:'10px'
      },300).delay(5000).fadeOut();
        });
    });
});