$(function(){
	//======= ANIMATION SCROLL ========//
	AOS.init();
	//======= END ANIMATION SCROLL ========//
	
	//======= TOGGLE RESPONSIVE =========//
	$('.navbar-burger').on('click',function(){
	  $('#navMenuExample').slideToggle(200);
	});
	//======= END TOGGLE RESPONSIVE =========//

	//======== IMAGE SHOW ========//
	  $("#image").change(function(){
	    var file = document.getElementById("image").files[0];
	    var readImg = new FileReader();
	    readImg.readAsDataURL(file);
	    readImg.onload = function(e) {
	       $('#uploadPreview').attr('src',e.target.result).fadeIn();
	    }
	  });
	//======== END IMAGE SHOW ========//

	//======== SHOW PASSWORD JS ========//
	 if ($('#pinjam').is(':checked')) {
  		$('button[type="submit"]').attr('disabled',false);
	  }
	  $('#pinjam').on('click',function(){
	  	if ($(this).is(':checked')) {
	  		$('button[type="submit"]').attr('disabled',false);
	  		// alert('test');
	  	}
	  	else {
	  		$('button[type="submit"]').attr('disabled',true);	
	  	}
	  });

	//======== END SHOW PASSWORD JS ========//
});