$(document).on('click','#coachingform #add_coaching',function(e) {

    var line_item = $('#line_item');
    var line_item_review = $('#line_item_review');
    var experience = $('#experience');
    var interpretation = $('#interpretation');
    var look_forward = $('#look_forward');
    var plan_ahead = $('#plan_ahead');
    var action_plan = $('#action_plan');
    var how_action_plan = $('#how_action_plan');
    var when_action_plan = $('#when_action_plan');
    var anything_action_plan = $('#anything_action_plan');
    var date_session = $('#date_session');


	    if (!line_item.val()) {
	         line_item.addClass('error')
        } else {
             line_item.removeClass('error')
        }
        if (!line_item_review.val()) {
            line_item_review.addClass('error')
        } else {
            line_item_review.removeClass('error')
        }
        if (!experience.val()) {
            experience.addClass('error')
        } else {
            experience.removeClass('error')
        }
        if (!interpretation.val()) {
            interpretation.addClass('error')
        } else {
            interpretation.removeClass('error')
        }
        if (!look_forward.val()) {
            look_forward.addClass('error')
        } else {
            look_forward.removeClass('error')
        }
        if (!plan_ahead.val()) {
            plan_ahead.addClass('error')
        } else {
            plan_ahead.removeClass('error')
        }
        if (!action_plan.val()) {
            action_plan.addClass('error')
        } else {
            action_plan.removeClass('error')
        }
        if (!how_action_plan.val()) {
            how_action_plan.addClass('error')
        } else {
            how_action_plan.removeClass('error')
        }
        if (!when_action_plan.val()) {
            when_action_plan.addClass('error')
        } else {
            when_action_plan.removeClass('error')
        }
        if (!when_action_plan.val()) {
            when_action_plan.addClass('error')
        } else {
            when_action_plan.removeClass('error')
        }
        if (!anything_action_plan.val()) {
            anything_action_plan.addClass('error')
        } else {
            anything_action_plan.removeClass('error')
        }
        if (!date_session.val()) {
            date_session.addClass('error')
        } else {
            date_session.removeClass('error')
        }
  $.ajax({

         type: "POST",

         url: base_url +  "coaching/add_coaching",

         dataType: 'json',

         data: $("#coachingform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#coachingform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#coachingform .alert-success").css("display", "block");

            $("#coachingform .alert-success p").html(res.message);
            $("html, body").animate({ scrollTop: 0 }, "slow")
            $(".right_col").animate({ scrollTop: 0 }, "slow")

            setTimeout(function(){

                  location.reload();

                }, 4000);

        }

         else{

            $("#coachingform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#coachingform .alert-danger").css("display", "block");

            $("#coachingform .alert-danger p").html(res.message);



            setTimeout(function(){

                    $("#coachingform .alert-danger").css("display", "none");

                },6000);
            $("html, body").animate({ scrollTop: 0 }, "slow");

             $(".right_col").animate({ scrollTop: 0 }, "slow");

       }

    },

  });


 });
//add coaching manager

$(document).on('click','#add_coaching_manager_form #sign_coaching',function(e) {

    var line_item = $('#line_item');
    var line_item_review = $('#line_item_review');
    var experience = $('#experience');
    var interpretation = $('#interpretation');
    var look_forward = $('#look_forward');
    var plan_ahead = $('#plan_ahead');
    var action_plan = $('#action_plan');
    var how_action_plan = $('#how_action_plan');
    var when_action_plan = $('#when_action_plan');
    var anything_action_plan = $('#anything_action_plan');
    var date_session = $('#date_session');


        if (!line_item.val()) {
             line_item.addClass('error')
        } else {
             line_item.removeClass('error')
        }
        if (!line_item_review.val()) {
            line_item_review.addClass('error')
        } else {
            line_item_review.removeClass('error')
        }
        if (!experience.val()) {
            experience.addClass('error')
        } else {
            experience.removeClass('error')
        }
        if (!interpretation.val()) {
            interpretation.addClass('error')
        } else {
            interpretation.removeClass('error')
        }
        if (!look_forward.val()) {
            look_forward.addClass('error')
        } else {
            look_forward.removeClass('error')
        }
        if (!plan_ahead.val()) {
            plan_ahead.addClass('error')
        } else {
            plan_ahead.removeClass('error')
        }
        if (!action_plan.val()) {
            action_plan.addClass('error')
        } else {
            action_plan.removeClass('error')
        }
        if (!how_action_plan.val()) {
            how_action_plan.addClass('error')
        } else {
            how_action_plan.removeClass('error')
        }
        if (!when_action_plan.val()) {
            when_action_plan.addClass('error')
        } else {
            when_action_plan.removeClass('error')
        }
        if (!when_action_plan.val()) {
            when_action_plan.addClass('error')
        } else {
            when_action_plan.removeClass('error')
        }
        if (!anything_action_plan.val()) {
            anything_action_plan.addClass('error')
        } else {
            anything_action_plan.removeClass('error')
        }
        if (!date_session.val()) {
            date_session.addClass('error')
        } else {
            date_session.removeClass('error')
        }
  $.ajax({

         type: "POST",

         url: base_url +  "coaching/add_coaching_manager",

         dataType: 'json',

         data: $("#add_coaching_manager_form").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#add_coaching_manager_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#add_coaching_manager_form .alert-success").css("display", "block");

            $("#add_coaching_manager_form .alert-success p").html(res.message);
            $("html, body").animate({ scrollTop: 0 }, "slow")
            $(".right_col").animate({ scrollTop: 0 }, "slow")

            setTimeout(function(){

                  location.reload();

                }, 4000);

        }

         else{

            $("#add_coaching_manager_form .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#add_coaching_manager_form .alert-danger").css("display", "block");

            $("#add_coaching_manager_form .alert-danger p").html(res.message);



            setTimeout(function(){

                    $("#add_coaching_manager_form .alert-danger").css("display", "none");

                },6000);
            $("html, body").animate({ scrollTop: 0 }, "slow");

             $(".right_col").animate({ scrollTop: 0 }, "slow");

       }

    },

  });


 });





$(document).on('click','#coachingform #update_coaching',function(e) {

    var line_item = $('#line_item');
    var line_item_review = $('#line_item_review');
    var experience = $('#experience');
    var interpretation = $('#interpretation');
    var look_forward = $('#look_forward');
    var plan_ahead = $('#plan_ahead');
    var action_plan = $('#action_plan');
    var how_action_plan = $('#how_action_plan');
    var when_action_plan = $('#when_action_plan');
    var anything_action_plan = $('#anything_action_plan');
    var date_session = $('#date_session');


	    if (!line_item.val()) {
	         line_item.addClass('error')
        } else {
             line_item.removeClass('error')
        }
        if (!line_item_review.val()) {
            line_item_review.addClass('error')
        } else {
            line_item_review.removeClass('error')
        }
        if (!experience.val()) {
            experience.addClass('error')
        } else {
            experience.removeClass('error')
        }
        if (!interpretation.val()) {
            interpretation.addClass('error')
        } else {
            interpretation.removeClass('error')
        }
        if (!look_forward.val()) {
            look_forward.addClass('error')
        } else {
            look_forward.removeClass('error')
        }
        if (!plan_ahead.val()) {
            plan_ahead.addClass('error')
        } else {
            plan_ahead.removeClass('error')
        }
        if (!action_plan.val()) {
            action_plan.addClass('error')
        } else {
            action_plan.removeClass('error')
        }
        if (!how_action_plan.val()) {
            how_action_plan.addClass('error')
        } else {
            how_action_plan.removeClass('error')
        }
        if (!when_action_plan.val()) {
            when_action_plan.addClass('error')
        } else {
            when_action_plan.removeClass('error')
        }
        if (!when_action_plan.val()) {
            when_action_plan.addClass('error')
        } else {
            when_action_plan.removeClass('error')
        }
        if (!anything_action_plan.val()) {
            anything_action_plan.addClass('error')
        } else {
            anything_action_plan.removeClass('error')
        }
        if (!date_session.val()) {
            date_session.addClass('error')
        } else {
            date_session.removeClass('error')
        }
  $.ajax({

         type: "POST",

         url: base_url +  "coaching/update_coaching",

         dataType: 'json',

         data: $("#coachingform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#coachingform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#coachingform .alert-success").css("display", "block");

            $("#coachingform .alert-success p").html(res.message);
            $("html, body").animate({ scrollTop: 0 }, "slow")
            $(".right_col").animate({ scrollTop: 0 }, "slow")


        }

         else{

            $("#coachingform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#coachingform .alert-danger").css("display", "block");

            $("#coachingform .alert-danger p").html(res.message);



            setTimeout(function(){

                    $("#coachingform .alert-danger").css("display", "none");

                },6000);
            $("html, body").animate({ scrollTop: 0 }, "slow");

             $(".right_col").animate({ scrollTop: 0 }, "slow");

       }

    },

  });


 });


$(document).on('click','#coaching_sign_form #sign_coaching',function(e) {


  $.ajax({

         type: "POST",

         url: base_url +  "coaching/sign_coaching",

         dataType: 'json',

         data: $("#coaching_sign_form").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#coaching_sign_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#coaching_sign_form .alert-success").css("display", "block");

            $("#coaching_sign_form .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);

          $("html, body").animate({ scrollTop: 0 }, "slow");

             $(".right_col").animate({ scrollTop: 0 }, "slow");


        }

         else{

            $("#coaching_sign_form .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#coaching_sign_form .alert-danger").css("display", "block");

            $("#coaching_sign_form .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#coaching_sign_form .alert-danger").css("display", "none");

                },3000);
            $("html, body").animate({ scrollTop: 0 }, "slow");

             $(".right_col").animate({ scrollTop: 0 }, "slow");


       }

    },

  });

 });


$(document).on('click','#coachingform #add_signature, #coaching_sign_form #add_signature, #add_coaching_manager_form #add_signature',function(e) {
     $("#coachingform .signature_coaching").css("display", "block"); 
     $("#coachingform .agent_coaching").css("display", "block"); 
     $("#coaching_sign_form .signature_manager_coaching").css("display", "block"); 
     $("#add_coaching_manager_form .signature_manager_coaching").css("display", "block"); 
     $('#coachingform #add_coaching').prop("disabled", false);
     $('#coachingform #update_coaching').prop("disabled", false);
     $('#add_coaching_manager_form #sign_coaching').prop("disabled", false);
     $('#coaching_sign_form #sign_coaching').prop("disabled", false);
});

