</div>
  <script type="text/javascript" src="{{asset('/front-assets/js/jquery-3.2.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/front-assets/js/slick/slick.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/front-assets/aos/aos.js')}}"></script>
  <script>
$(document).ready(function(){
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

$(document).ready(function(){
    $("button.close-menu, .overlay").click(function(){
        $("#side-menu").css("left", "-300px");
        $('.overlay').fadeOut(200);
    });

    $("button.open-menu").click(function(){
        $("#side-menu").css("left", "0");
        $('.overlay').fadeIn(200);
    });
});

  $(".btn-drop").click(function(e){
    e.preventDefault();
    var element = $(this);
    element.next(".drop-menu").slideToggle(100);
  });

  $(window).click(function(e){
    if (!e.target.matches(".btn-drop")) {
      if ($(".drop-menu").slideToggle(100)) {
        $(".drop-menu").css("display","none");
      }
    }
  });
  </script>
</body>
</html>