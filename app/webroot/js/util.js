$(document).ready(function ($) {
    $(window).load(function () {
        $.cookieBar({
            message: 'Este sitio utiliza cookies para almacenar usos y preferencias',
            acceptButton: true,
            acceptText: 'Entiendo',
            expireDays: 365,
            fixed: true,
            bottom: true,
            zindex: '9999',
            redirect: '/',
            
            
        });
       $( document ).tooltip({
            track: true
          });
        $("#showLeftPush").on('click', showMenu);
        $('form').on('submit',validateForm);
        $(document).on('scroll', resizeHeader);
        $('.js-region').on('change', getProvinces);
        $('.js-province').on('change', getCities);
        $('.js-startdate').on('change', populateYears);
        $('.goup').on('click', scrollToTop);
        $('.saveEducation').on('click', saveEducation);
        $('.saveExperience').on('click', saveExperience);
        $('.closePopup').on('click', closePopup);
        $('.register').on('click', register);
        $('.js-add-skill').on('click', showPopup);
        $('.js-add-language').on('click', showPopup);
        $('.js-add-education').on('click', showPopup);
        $('.js-add-experience').on('click', showPopup);
        $('.js-location').on('click', showPopup);
        $('.js-reply-feedback').on('click', showReplyForm);
        $('.js-us').on('click', showPopup);
        $('.js-com').on('click', showPopup);
        $('.js-search-skill').on('keyup',searchSkill);
        $('.js-search-language').on('keyup',searchLanguage);
        $('.js-removeSkill').on('click', removeSkill);
        $('.js-removeEducation').on('click', removeEducation);
        $('.js-removeExperience').on('click', removeExperience);
        $('.js-removeLanguage').on('click', removeLanguage);
        $('.js-single-sent').on('click', showMessageBody);
        $('.js-single-received').on('click', showMessageBody);
        $('.js-single-received').on('click', showMessageBody);
        $('.js-sent-tab').on('click',showSent);
        $('.js-received-tab').on('click',showReceived);
        $('.js-search-sm').on('click',searchUsers);
        $('.js-bookmark').on('click',bookmarkUser);
        $('.js-unbookmark').on('click',unbookmarkUser);
        $('.js-send-reply').on('click',sendReply);
        $('.js-post-comment').on('click',postComment);
        $('.js-btn-about').on('click',clickAbout);
        $(window).scroll(function() {
            var o = $(this).scrollTop();
            if($(".uno").length>0){
             $(".uno").css("background-position-y", parseInt(-o / 4) + "px");
            }
        });
         if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && $('#cbp-spmenu-s1').length>0 ) {
                   $(document).swipe({
                        tap: function(event, target) {
                        },
                        swipe:function(event, direction, distance, duration, fingerCount){
                                        //Handling swipe direction.
                                        if (direction=="left") {
                                          hideMenuSwipe();
                                        } else {
                                          showMenuSwipe();
                                        }
                                      },
                                      allowPageScroll:"vertical",
                                      threshold:150,
                                    });
                }
       
        $("#datepicker").datepicker({
            changeYear: true,
            minDate: "-80Y",
            maxDate: "+1M +10D"
        });
        if($('.js-profilecompleted').attr('aria-label')==="0"){
            showPopup(true);
        }
        
        
        //$('body').mCustomScrollbar();
        $('.js-msgbodycontainer').mCustomScrollbar();
        $('.cbp-spmenu').mCustomScrollbar();
        $('.inbox-messages').mCustomScrollbar();
        
      
        $(document).on("scroll", function () {
            if ($(window).scrollTop() > $(window).height() / 2) {
                $(".goup").fadeIn(1000);

            } else {
                $(".goup").fadeOut(1000);
            }
        });
        var sk='';
        var lastScrollTop = 0;
        //scroll entre enlaces
        $(function () {
            $('a[href*=#]:not([href=#])').click(function () {
                event.preventDefault();
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
        function showMenuSwipe() {
           
            if (!$('body').hasClass('cbp-spmenu-push-toright')) {
                $('body').addClass('cbp-spmenu-push-toright');
            }
            if (!$('#cbp-spmenu-s1').hasClass('cbp-spmenu-open')) {
                
                $('#cbp-spmenu-s1').addClass('cbp-spmenu-open');
            }
            $('.pushmenu-bg').fadeIn();
            $('.pushmenu-bg').on('click',hideMenuSwipe);
        }
        function hideMenuSwipe() {
            $('.pushmenu-bg').fadeOut();
            if ($('body').hasClass('cbp-spmenu-push-toright')) {
                $('body').removeClass('cbp-spmenu-push-toright');
            } 
            if ($('#cbp-spmenu-s1').hasClass('cbp-spmenu-open')) {
                $('#cbp-spmenu-s1').removeClass('cbp-spmenu-open');
            }
        }
        function showMenu() {
            if ($(this).find('span').hasClass('active')) {
                $(this).find('span').removeClass('fa-close');
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    $('body').css('overflow-y','auto');
                }
                $(this).find('span').addClass('fa-bars');
                $(this).find('span').removeClass('active');
            } else {
                $(this).find('span').removeClass('fa-bars');
                $(this).find('span').addClass('fa-close');
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    $('body').css('overflow-y','hidden');
                }
                $(this).find('span').addClass('active');
            }
       
            if ($('body').hasClass('cbp-spmenu-push-toright')) {
                $('body').removeClass('cbp-spmenu-push-toright');
            } else {
                $('body').addClass('cbp-spmenu-push-toright');
            }
            if ($('#cbp-spmenu-s1').hasClass('cbp-spmenu-open')) {
                $('#cbp-spmenu-s1').removeClass('cbp-spmenu-open');
            } else {
                $('#cbp-spmenu-s1').addClass('cbp-spmenu-open');
            }
        }
        function resizeHeader() {
           
            if ($(this).scrollTop() < 100) {
                $('header').removeClass('smaller');
            } else {
                if (!$('header').hasClass('smaller')) {
                    $('header').addClass('smaller');
                    $('section.uno').css({'marginTop': '50px'});
                }


            }
        }
        function showSent(){
            
            $(this).addClass('active');
            $(this).siblings('.inbox-single-tab').removeClass('active');
            $('.ul-messages').find('.js-single-received').each(function(){
               if(!$(this).hasClass('hidden')){
                   $(this).addClass('hidden');
               }
           });
           $('.ul-messages').find('.js-single-sent').each(function(){
               if($(this).hasClass('hidden')){
                   $(this).removeClass('hidden');
               }
           });
        }
        
        function showReceived(){
            $(this).addClass('active');
            $(this).siblings('.inbox-single-tab').removeClass('active');
            $('.ul-messages').find('.js-single-sent').each(function(){
               if(!$(this).hasClass('hidden')){
                   $(this).addClass('hidden');
               }
           });
           $('.ul-messages').find('.js-single-received').each(function(){
               if($(this).hasClass('hidden')){
                   $(this).removeClass('hidden');
               }
           });
        }
        function showMessageBody(){
           var id = $(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/showMessageBody/",
                    success: function (data) {
                        $(".js-msgbodycontainer").html(data);
                        
                    },
                    dataType: 'html'
                });
        }
        function scrollToTop() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        }


    function searchSkill(event) {
                sk = $(this).val();
                if(sk.length > 0){
                $.ajax({
                    type: "POST",
                    data: {sk:sk},
                    url: "/skills/getSkill/",
                    success: function (data) {
                        $(".js-optionSkills").empty();
                        $.each(data, function (item, value) {
                            var pill = '<p class="completion" aria-label="'+value.Skill.id+'">'+ value.Skill.title + "</p>";
                            $(pill).appendTo(".js-optionSkills");
                            $('.completion').on('click',addSkill);
                        });
                    },
                    dataType: 'json'
                });
                   
                }else{
                    $(".js-optionSkills").empty();
                }
           
        }
        function addSkill(){
            var id = $(this).attr('aria-label');
            var title = $(this).text();
            var btn = $(this);
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/saveSkill/",
                    success: function (data) {
                        if(!data.ko){
                            pill ='<p class="skillPill" aria-label="' + data.skill_id + '">' + title + '<span class="fa fa-trash js-removeSkill"></span></p>';
                            $('.js-skills-block').append(pill);
                            $('.js-removeSkill').on('click', removeSkill);
                            btn.closest('.popup').find('.closePopup').trigger('click')
                        }
                    },
                    dataType: 'json'
                });
        }
        
        function removeSkill(){
            var id = $(this).closest('.skillPill').attr('aria-label');
            var pill = $(this).closest('.skillPill');
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/removeSkill/",
                    success: function (data) {
                        if(data.ok === 1){
                            pill.remove();
                        }
                    },
                    dataType: 'json'
                });
        }
        
        function searchLanguage(event) {
                sk = $(this).val();
                if(sk.length > 0){
                $.ajax({
                    type: "POST",
                    data: {sk:sk},
                    url: "/languages/getLanguage/",
                    success: function (data) {
                        $(".js-optionLanguages").empty();
                        $.each(data, function (item, value) {
                            var pill = '<p class="completion" aria-label="'+value.Language.id+'">'+ value.Language.title + "</p>";
                            $(pill).appendTo(".js-optionLanguages");
                            $('.completion').on('click',addLanguage);
                            $('.js-optionLanguages').mCustomScrollbar();
                        });
                    },
                    dataType: 'json'
                });
                   
                }else{
                    $(".js-optionLanguages").empty();
                }
           
        }
        function addLanguage(){
            var id = $(this).attr('aria-label');
            var title = $(this).text();
            var btn = $(this);
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/saveLanguage/",
                    success: function (data) {
                        if(!data.ko){
                            pill ='<p class="skillPill" aria-label="' + data.language_id + '">' + title + '<span class="fa fa-trash js-removeLanguage"></span></p>';
                            $('.js-languages-block').append(pill);
                            $('.js-removeLanguage').on('click', removeLanguage);
                            btn.closest('.popup').find('.closePopup').trigger('click')
                        }
                    },
                    dataType: 'json'
                });
        }
        
        function removeLanguage(){
            var id = $(this).closest('.skillPill').attr('aria-label');
            var pill = $(this).closest('.skillPill');
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/removeLanguage/",
                    success: function (data) {
                        if(data.ok === 1){
                            pill.remove();
                        }
                    },
                    dataType: 'json'
                });
        }
        
         function removeEducation(){
            var id = $(this).closest('p').attr('aria-label');
            var education = $(this).closest('.singleEducation');
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/removeEducation/",
                    success: function (data) {
                        if(data.ok === 1){
                            education.remove();
                        }
                    },
                    dataType: 'json'
                });
        }
        function removeExperience(){
            var id = $(this).closest('p').attr('aria-label');
            var experience = $(this).closest('.singleExperience');
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/removeExperience/",
                    success: function (data) {
                        if(data.ok === 1){
                            experience.remove();
                        }
                    },
                    dataType: 'json'
                });
        }
        function getProvinces() {
            region = $(this).val();
            if (region != '') {
                $.ajax({
                    type: "GET",
                    url: "/users/getProvinces/" + region,
                    success: function (data) {
                        $(".js-province").html("");
                        $(".js-province").append('<option value="">Selecciona provincia</option>');
                        $.each(data, function (item, value) {
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
        function getCities() {
            province = $(this).val();
            if (province != '') {
                $.ajax({
                    type: "GET",
                    url: "/users/getCities/" + province,
                    success: function (data) {
                        $(".js-city").html("");
                        $(".js-city").append('<option value="">Selecciona ciudad</option>');
                        $.each(data, function (item, value) {
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

        function saveEducation() {
            event.preventDefault();
            var valid = validateForm($('.js-educationtitle').closest('form'))
           if(valid){
            var formData = {
                'title': $('.js-educationtitle').val(),
                'description': $('.js-educationdescription').val(),
                'start_date': $('.js-educationstart').val(),
                'end_date': $('.js-educationend').val(),
                'user_id': $('.js-educationuser').val()
            };
            $.ajax({
                type: "POST",
                url: "/users/saveEducation/",
                data: formData,
                success: function (data) {
                    $('.js-educationtitle').val('');
                   $('.js-educationdescription').val('');
                    $('.js-educationstart').val('');
                    $('.js-educationend').val('');
                    ed = '<div class="singleEducation col-xs-12 col-md-12">';
                    ed += '<p aria-label="'+data.id+'"=>' + data.title + '<span class="fa fa-trash js-removeEducation"></span></p>';
                    ed += '<p>' + data.description + ' ' + data.start_date + ' - ' + data.end_date + '</p>';
                    ed += '</div>';
                    $('.educationData').append(ed);
                    $('.js-educationend').closest('.popup').find('.closePopup').trigger('click');
                     $('.js-removeEducation').on('click', removeEducation);
                },
                dataType: 'json'
            });
        }
        }
        // Replace the search result table on load.
if (('localStorage' in window) && window['localStorage'] !== null) {
    if ('results' in localStorage && window.location.hash=="") {
        $(".js-results-container").html(localStorage.getItem('results'));
        $('.js-bookmark').on('click',bookmarkUser);
        
    }
}

// Save the search result table when leaving the page.
$(window).unload(function () {
    if (('localStorage' in window) && window['localStorage'] !== null) {
        if($(".js-results-container").length > 0){
           var form = $(".js-results-container").html();
        localStorage.setItem('results', form); 
        }
        
    }
});
        
        
          function saveExperience() {
              event.preventDefault();
              var valid = validateForm($('#ExperienceTitle').closest('form'))
           if(valid){
            
            var formData = {
                'title': $('#ExperienceTitle').val(),
                'description': $('#ExperienceDescription').val(),
                'company': $('#ExperienceCompany').val(),
                'start_date': $('#ExperienceStartDate').val(),
                'end_date': $('#ExperienceEndDate').val(),
                'user_id': $('#ExperienceUserId').val()
            };
            $.ajax({
                type: "POST",
                url: "/users/saveExperience/",
                data: formData,
                success: function (data) {
                    $('#ExperienceTitle').val('');
                    $('#ExperienceDescription').val('');
                    $('#ExperienceCompany').val('');
                    $('#ExperienceStartDate').val('');
                    $('#ExperienceEndDate').val('');
                    ed = '<div class="singleExperience col-xs-12 col-md-12">';
                    ed += '<p aria-label="'+data.id+'"=>' + data.title + '<span class="fa fa-trash js-removeExperience"></span></p>';
                    ed += '<p>' + data.company + ' ' + data.start_date + ' - ' + data.end_date + '</p>';
                     ed += '<p>' + data.description + '</p>';
                    ed += '</div>';
                    $('.experienceData').append(ed);
                    $('#ExperienceEndDate').closest('.popup').find('.closePopup').trigger('click');
                    $('.js-removeExperience').on('click', removeExperience);
                },
                dataType: 'json'
            });
        }

        }

        function showPopup(complete){
            if($(this).hasClass('js-add-skill')){
                $('.js-popup-skills').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
            if($(this).hasClass('js-add-language')){
                $('.js-popup-languages').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
            if($(this).hasClass('js-com')){
                $('.js-loginformcompany').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
            if($(this).hasClass('js-us')){
                $('.js-loginformuser').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
            if($(this).hasClass('js-add-education')){
                $('.js-popup-add-education').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
            if($(this).hasClass('js-add-experience')){
                $('.js-popup-add-experience').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
            if($(this).hasClass('js-location')){
               
                $('.js-popup-view-map').closest('.popupBg').show();
                 google.maps.event.trigger(map, 'resize');
                $('body').css('overflow-y','hidden');
            }
            if(complete){
                $('.js-popup-complete').closest('.popupBg').show();
                $('body').css('overflow-y','hidden');
            }
        }
        
        function closePopup() {
            $(this).closest('.popup').find('.error-input').each(function(){
                $(this).removeClass('error-input');
            });
            $(this).closest('.popup').find('.error-message').hide();
            $(this).closest('.popupBg').hide();
            $('body').css('overflow-y','auto');
        }
        
        function showReplyForm(){
            $('.reply-feedback').toggle(500);
        }
        
        function populateYears() {
            for ($i = $(this).val(); $i <= 2022; $i++) {
                var row = "<option value=\"" + $i + "\">" + $i + "</option>";
                $(row).appendTo(".js-enddate");
            }
        }
        function register() {
            event.preventDefault();
             var valid = validateForm($(this).closest('form'))
           if(valid){
            event.preventDefault();
            var formData = {
                'username': $(this).closest('form').find('.js-register-username').val(),
                'password': $(this).closest('form').find('.js-register-password').val(),
                'role': $(this).closest('form').find('.js-register-role').val()
            };
            $.ajax({
                type: "POST",
                url: "/users/register/",
                data: formData,
                success: function (data) {
                    if (data.ok==1) {
                        window.location.assign("/iniciar-sesion")

                    } else {
                        if(data.ko==0) {
                            html = data.message; 
                            $('.registermessage').empty();
                            $('.registermessage').append(html);
                        }else{
                            html = data.ko; 
                            $('.registermessage').empty();
                            $('.registermessage').append(html);
                        }
                        
                        
                    }
                },
                dataType: 'json'
            });
        }
        }
function searchUsers(){
     event.preventDefault();
            var formData = {
                'region_id': $('.js-region').val(),
                'city_id': $('.js-city').val(),
                'province_id': $('.js-province').val(),
                'category_id': $('.js-category').val(),
                'skills': $('.js-skills-input').val(),
                'languages': $('.js-languages-input').val(),
            };
            $.ajax({
                type: "POST",
                url: "/users/search/",
                data: formData,
                success: function (data) {
                            $('.js-results-container').html(data);
                            $('.js-bookmark').on('click',bookmarkUser);
                },
                dataType: 'html'
            });
}
function bookmarkUser(){
     event.preventDefault();
            var block = $(this).closest('.user-result-block');
            var user_id = $(this).closest('.user-result-block').attr('data');
            $.ajax({
                type: "POST",
                url: "/users/bookmarkuser/",
                data: {user_id:user_id},
                success: function (data) {
                           block.remove(); 
                },
                dataType: 'json'
            });
}
function unbookmarkUser(){
     event.preventDefault();
            var block = $(this).closest('.user-result-block');
            var user_id = $(this).closest('.user-result-block').attr('data');
            $.ajax({
                type: "POST",
                url: "/users/unbookmarkuser/",
                data: {user_id:user_id},
                success: function (data) {
                           block.remove(); 
                },
                dataType: 'json'
            });
}
function postComment(){
    event.preventDefault();
      var valid = validateForm($('.js-userid').closest('form'))
           if(valid){
            var formData = {
                'user_id': $('.js-userid').val(),
                'post_id': $('.js-postid').val(),
                'comment': $('.js-comment').val(),
            };
            $.ajax({
                type: "POST",
                url: "/comments/postComment/",
                data: formData,
                success: function (data) {
                            $('.js-comments-container').html(data);
                            $('.js-post-comment').on('click',postComment);
                },
                dataType: 'html'
            });
        }
}



function validateForm(form){
	
        if(form.type == 'submit'){
            form = $(this)
        }else{
            event.preventDefault();
        }
		var noerror = true;
		$('.error-message').hide();		
		form.find('input').removeClass('error-input');
		
		
		form.find('.js-required').each(function(index, value){
		  if($(this).val() == ''){
		  	
                            $(this).addClass('error-input');
                            $(this).closest('form').find('.error-message').show();
                            $('.error-message').html('Rellena los campos marcados en rojo, son requeridos');
	  		
	  		
	  		noerror = false;
		  }
		}); 
		
		form.find('.js-email').each(function(index, value){
		  if(!validateEmail($(this).val())){
		  	$(this).addClass('error-input');
		  	$(this).closest('form').find('.error-message').show();
                         $('.error-message').html('Introduce un email válido');
		  	noerror = false;
		  }
		});	
		if(!noerror){
			return false;
		}
		form.find('.js-password').each(function(index, value){
		  if($(this).val().length < 8){
		  	$(this).addClass('error-input');
		  	$(this).closest('form').find('.error-message').show();
		  	noerror = false;
		  }
		});	
                
                form.find('.js-startdate').each(function(index, value){
		  if($(this).val() > $(this).closest('form').find('.js-enddate').val()){
		  	$(this).addClass('error-input');
		  	$(this).closest('form').find('.error-message').show();
                        $('.error-message').html('El año de comienzo no puede ser mayor que el de finalización')
		  	noerror = false;
		  }
		});
			
		if(!noerror){
			return false;
		}else{
                    return true;
                }
		
}
function sendReply(){
    event.preventDefault();
    var valid = validateForm($(this).closest('form'))
           if(valid){
            var message = $('#ResponseMessage').val();
            var mail = $('#ResponseEmail').val();
            $.ajax({
                type: "POST",
                url: "/feedbacks/sendReply/",
                data: {
                    message:message,
                    mail:mail
                },
                success: function (data) {
                },
                dataType: 'json'
            });
        }
}
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function clickAbout(){
    $('.js-click-about').trigger('click');
}

    });
});