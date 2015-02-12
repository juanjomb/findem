$(document).ready(function($){
    $(window).load(function(){
      
        
       $("#showLeftPush").on('click',showMenu);
        $(document).on('scroll',resizeHeader);
        $('.js-region').on('change',getProvinces);
        $('.js-province').on('change',getCities);
         
         
         $(window).on("resize", methodToFixLayout);
$(document).on("scroll", function(){
   if($(window).scrollTop()>$(window).height()/2){
          $(".goup").fadeIn(1000);

      }else{
        $(".goup").fadeOut(1000);
      }
});

    
         //scroll entre enlaces
  $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

  function showMenu(){
    if($(this).hasClass('active')){
      $(this).removeClass('active');
    }else{
      $(this).addClass('active');
    }
    if($('body').hasClass('cbp-spmenu-push-toright')){
      $('body').removeClass('cbp-spmenu-push-toright');
    }else{
      $('body').addClass('cbp-spmenu-push-toright');
    }
    if($('#cbp-spmenu-s1').hasClass('cbp-spmenu-open')){
      $('#cbp-spmenu-s1').removeClass('cbp-spmenu-open');
    }else{
      $('#cbp-spmenu-s1').addClass('cbp-spmenu-open');
    }
  }
function resizeHeader(){
  
  if($(this).scrollTop()<100){
    $('header').removeClass('smaller');
  }else{
      if(!$('header').hasClass('smaller')){
        $('header').addClass('smaller');
        $('section.uno').css({'marginTop':'50px'});
      }
    
  
  }
}


function getProvinces(){
	region = $(this).val();
	if (region != ''){
		$.ajax({
			type: "GET",
			url: "/findem/users/getProvinces/"+region,
			success: function(data){
				$(".js-province").html("");
				$.each(data, function(item, value){
					var row = "<option value=\"" + item + "\">" + value + "</option>";
	                $(row).appendTo(".js-province"); 
				});
			},
			dataType: 'json'
		});
	} else {
		$(".js-province").html('');
	}
}
function getCities(){
	province = $(this).val();
	if (province != ''){
		$.ajax({
			type: "GET",
			url: "/findem/users/getCities/"+province,
			success: function(data){
				$(".js-city").html("");
				$.each(data, function(item, value){
					var row = "<option value=\"" + item + "\">" + value + "</option>";
	                $(row).appendTo(".js-city"); 
				});
			},
			dataType: 'json'
		});
	} else {
		$(".js-city").html('');
	}
}

    	});
});