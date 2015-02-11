$(document).ready(function($){
    $(window).load(function(){
      
        var lastScrollTop = 0;
       $("#showLeftPush").on('click',showMenu);
       $('.showlogin').on('click',showLoginForm);
       $('.close').on('click',hideLoginForm);
        $(document).on('scroll',resizeHeader);
        $(document).on('scroll',moveFirstSection);

     
         
         
         $(window).on("resize", methodToFixLayout);
$(document).on("scroll", function(){
   if($(window).scrollTop()>$(window).height()/2){
          $(".goup").fadeIn(1000);

      }else{
        $(".goup").fadeOut(1000);
      }
});

         function methodToFixLayout( e ) {
            var winHeight = $(window).height();
            var winWidth = $(window).width();
            if(winWidth<480){
              $('.menusp').followTo(winHeight-(winHeight*0.07));
            }
            if(winWidth>768){
                $('.menuasd').followTo(winHeight-125);
                }
        if(winWidth>480 && winWidth<768){
                 $('.menusp').followTo(winHeight-(winHeight*0.10));
                }
}

        
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
  
  if($(this).scrollTop()<800){
    $('header').removeClass('smaller');
  }else{
      if(!$('header').hasClass('smaller')){
        $('header').addClass('smaller');
        $('section.uno').css({'marginTop':'50px'});
      }
    
  
  }
}

function showLoginForm(){
  $('.loginBg').css({'display':'block'});
}
function hideLoginForm(){
  $('.loginBg').css({'display':'none'});
}

function moveFirstSection(){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
      $('.uno').css({'backgroundPositionY':'+=3px'});
      if($('.content-uno').css('opacity')>0){
        $('.content-uno').css({'opacity':'-=.05'});
      }
      
   } else {
      $('.uno').css({'backgroundPositionY':'-=3px'});
      if($('.content-uno').css('opacity')<1){
        $('.content-uno').css({'opacity':'+=.05'});
      }
   }
   lastScrollTop = st;
  
}


    	});
});