$(document).ready(function ($) {
    $(window).load(function () {


        $("#showLeftPush").on('click', showMenu);
        $(document).on('scroll', resizeHeader);
        $('.js-region').on('change', getProvinces);
        $('.js-province').on('change', getCities);
        $('.js-startdate').on('change', populateYears);
        $('.goup').on('click', scrollToTop);
        $('.saveEducation').on('click', saveEducation);
        $('.saveExperience').on('click', saveExperience);
        $('.js-us').on('click', showUserForm);
        $('.js-com').on('click', showCompanyForm);
        $('.closePopup').on('click', hideForm);
        $('.register').on('click', register);
        $('.js-add-skill').on('click', showPopup);
        $('.js-search-skill').on('keyup',searchSkill)
        $('.js-removeSkill').on('click', removeSkill)
        $("#datepicker").datepicker({
            changeYear: true,
            minDate: "-80Y",
            maxDate: "+1M +10D"
        });
      
        $(document).on("scroll", function () {
            if ($(window).scrollTop() > $(window).height() / 2) {
                $(".goup").fadeIn(1000);

            } else {
                $(".goup").fadeOut(1000);
            }
        });
        var sk='';

        //scroll entre enlaces
        $(function () {
            $('a[href*=#]:not([href=#])').click(function () {
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

        function showMenu() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
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
                            var pill = '<p class="completion" data="'+value.Skill.id+'">'+ value.Skill.title + "</p>";
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
            var id = $(this).attr('data');
            var title = $(this).text();
             $.ajax({
                    type: "POST",
                    data: {id:id},
                    url: "/users/saveSkill/",
                    success: function (data) {
                        if(!data.ko){
                            pill ='<p class="skillPill" data="' + data.skill_id + '">' + title + '<span class="fa fa-trash js-removeSkill"></span></p>';
                            $('.js-skills-block').append(pill);
                            $('.js-removeSkill').on('click', removeSkill);
                        }
                    },
                    dataType: 'json'
                });
        }
        
        function removeSkill(){
            var id = $(this).closest('.skillPill').attr('data');
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
        function getProvinces() {
            region = $(this).val();
            if (region != '') {
                $.ajax({
                    type: "GET",
                    url: "/users/getProvinces/" + region,
                    success: function (data) {
                        $(".js-province").html("");
                        $(".js-province").append("<option>Selecciona provincia</option>");
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
                        $(".js-province").append("<option>Selecciona ciudad</option>");
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
            var formData = {
                'title': $('#EducationTitle').val(),
                'description': $('#EducationDescription').val(),
                'start_date': $('#EducationStartDate').val(),
                'end_date': $('#EducationEndDate').val(),
                'user_id': $('#EducationUserId').val()
            };
            $.ajax({
                type: "POST",
                url: "/findem/users/saveEducation/",
                data: formData,
                success: function (data) {
                    $('#EducationTitle').val('');
                    $('#EducationDescription').val('');
                    $('#EducationStartDate').val('');
                    $('#EducationEndDate').val('');
                    ed = '<div class="singleEducation col-xs-12 col-md-12">';
                    ed += '<p>' + data.title + '</p>';
                    ed += '<p>' + data.description + ' ' + data.start_date + ' - ' + data.end_date + '</p>';
                    ed += '</div>';
                    $('.educationData').append(ed);
                },
                dataType: 'json'
            });

        }
        
          function saveExperience() {
            event.preventDefault();
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
                    $('#ExperienceStartDate').val('');
                    $('#ExperienceEndDate').val('');
                    ed = '<div class="singleExperience col-xs-12 col-md-12">';
                    ed += '<p>' + data.title + '</p>';
                    ed += '<p>' + data.company + ' ' + data.start_date + ' - ' + data.end_date + '</p>';
                     ed += '<p>' + data.description + '</p>';
                    ed += '</div>';
                    $('.experienceData').append(ed);
                },
                dataType: 'json'
            });

        }

        function showPopup(){
            if($(this).hasClass('js-add-skill')){
                $('.js-popup-skills').show();
            }
        }
        function showUserForm() {
            $('.bgopacity').show();
            $('.js-loginformuser').show();
        }
        function showCompanyForm() {
            $('.bgopacity').show();
            $('.js-loginformcompany').show();
        }
        function hideForm() {
            $(this).closest('.popup').hide();
        }
        
        function populateYears() {
            for ($i = $(this).val(); $i <= 2022; $i++) {
                var row = "<option value=\"" + $i + "\">" + $i + "</option>";
                $(row).appendTo(".js-enddate");
            }
        }
        function register() {
            event.preventDefault();
            var formData = {
                'username': $('#UserUsername').val(),
                'password': $('#UserPassword').val(),
                'role': $('#UserRole').val()
            };
            $.ajax({
                type: "POST",
                url: "/users/register/",
                data: formData,
                success: function (data) {
                    if (data.ok) {
                        html = data.ok;
                        $('.registermessage').empty();
                        $('.registermessage').append(html);

                    } else {
                        html = data.ko;
                        $('.registermessage').empty();
                        $('.registermessage').append(html);
                    }
                },
                dataType: 'json'
            });

        }







    });
});