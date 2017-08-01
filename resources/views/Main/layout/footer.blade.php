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
	 		$("#wish").clone().appendTo("#wrap-notif").fadeIn('slow').delay(5000).fadeOut('slow');
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
  </script>
</body>
</html>