// add leave

$(document).on('click','#addleaveform #add_leave',function(e) {
    /*alert("success");*/
    $.ajax({

         type: "POST",

         url: base_url +  "account/add_leave",

         dataType: 'json',

         data: $("#addleaveform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#addleaveform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#addleaveform .alert-success").css("display", "block");

            $("#addleaveform .alert-success p").html(res.message);

            $('#addleaveform')[0].reset();
            setTimeout(function(){

                  location.reload();

                }, 2000);

              $("html, body").animate({ scrollTop: 0 }, "slow");


        }

         else{

            $("#addleaveform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#addleaveform .alert-danger").css("display", "block");

            $("#addleaveform .alert-danger p").html(res.message);
              $("html, body").animate({ scrollTop: 0 }, "slow");

            setTimeout(function(){

                    $("#addleaveform .alert-danger").css("display", "none");

                },3000);

              $("html, body").animate({ scrollTop: 0 }, "slow");

        }

    },

  });

  
 });

//add official business leave
$(document).on('click','#addoblform #add_obl',function(e) {
    e.preventDefault();

    var form_data = new FormData($('#addoblform')[0]);
    $.ajax({

         type: "POST",

         url: base_url +  "account/add_obl",
        
         data: form_data,

         dataType: 'json',

         processData: false,

         contentType: false,

         success: function(res) {

        if (res.response=="success"){

            $("#addoblform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#addoblform .alert-success").css("display", "block");

            $("#addoblform .alert-success p").html(res.message);

            $('#addoblform')[0].reset();

            setTimeout(function(){

                  location.reload();

                }, 2000);

                $("html, body").animate({ scrollTop: 0 }, "slow");


        }

         else{

            $("#addoblform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#addoblform .alert-danger").css("display", "block");

            $("#addoblform .alert-danger p").html(res.message);
            setTimeout(function(){

                    $("#addoblform .alert-danger").css("display", "none");

                },3000);

              $("html, body").animate({ scrollTop: 0 }, "slow");


       }

    },

  });

  
 });

//add undertime
$(document).on('click','#addundertimeform #add_undertime',function(e) {
    /*alert("success");*/
    $.ajax({

         type: "POST",

         url: base_url +  "account/add_undertime",

         dataType: 'json',

         data: $("#addundertimeform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#addundertimeform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#addundertimeform .alert-success").css("display", "block");

            $("#addundertimeform .alert-success p").html(res.message);

            $('#addundertimeform')[0].reset();

            setTimeout(function(){

                  location.reload();

                }, 2000);
          $("html, body").animate({ scrollTop: 0 }, "slow");



        }

         else{

            $("#addundertimeform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#addundertimeform .alert-danger").css("display", "block");

            $("#addundertimeform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#addundertimeform .alert-danger").css("display", "none");

                },3000);

                $("html, body").animate({ scrollTop: 0 }, "slow");

       }

    },

  });

  
 });



//approve leave, obl and undertime
$(document).on('click','#approval_form #approve_leave, #approval_form #approve_obl,  #approval_form #approve_undertime',function(e) {
    e.preventDefault();
    $.ajax({

         type: "POST",

         url: base_url +  "account/approve_form",
        
         data: $("#approval_form").serialize(),

         dataType: 'json',

         success: function(res) {

        if (res.response=="success"){

            $("#approval_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#approval_form .alert-success").css("display", "block");

            $("#approval_form .alert-success p").html(res.message);

            $('#approval_form')[0].reset();

            setTimeout(function(){

                  location.reload();

                }, 2000);
              $("html, body").animate({ scrollTop: 0 }, "slow");

        }

         else{

            $("#approve_leave .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#approve_leave .alert-danger").css("display", "block");

            $("#approve_leave .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#approve_leave .alert-danger").css("display", "none");

                },3000);

              $("html, body").animate({ scrollTop: 0 }, "slow");



       }

    },

  });

  
 });



//decline approve,  obl and undertime
$(document).on('click','#approval_form #decline_leave, #approval_form #decline_obl, #approval_form #decline_obl',function(e) {
    e.preventDefault();
    $.ajax({

         type: "POST",

         url: base_url +  "account/decline_form",
        
         data: $("#approval_form").serialize(),

         dataType: 'json',

         success: function(res) {

        if (res.response=="success"){

            $("#approval_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#approval_form .alert-success").css("display", "block");

            $("#approval_form .alert-success p").html(res.message);

            $('#approval_form')[0].reset();

            setTimeout(function(){

                  location.reload();

                }, 2000);

              $("html, body").animate({ scrollTop: 0 }, "slow");



        }

         else{

            $("#approval_form .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#approval_form .alert-danger").css("display", "block");

            $("#approval_form .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#approval_form .alert-danger").css("display", "none");

                },2000);
             $("html, body").animate({ scrollTop: 0 }, "slow");


       }

    },

  });

  
 });



$(document).on('click','#addleaveform #add_signature',function(e) {
     $("#addleaveform .signature_agent_leave_form").css("display", "block"); 
     $('#addleaveform #add_leave').prop("disabled", false)
});

$(document).on('click','#approval_form #add_signature, #approval_form #add_signature',function(e) {
     $("#approval_form .signature_manager_form").css("display", "block"); 
     $("#approval_form .signature_hr_form").css("display", "block"); 
     $('#approval_form #approve_leave').prop("disabled", false)
     $('#approval_form #approve_obl').prop("disabled", false)
     $('#approval_form #approve_undertime').prop("disabled", false)
}); 


$(document).on('click','#addoblform #add_signature',function(e) {
     $("#addoblform .signature_agent_obl_form").css("display", "block"); 
     $('#addoblform #add_obl').prop("disabled", false)
});
$(document).on('click','#addundertimeform #add_signature',function(e) {
     $("#addundertimeform .signature_agent_undertime_form").css("display", "block"); 
     $('#addundertimeform #add_undertime').prop("disabled", false)
});

