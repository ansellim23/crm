//add gala

  $(document).on("click", ".view_gala_detail", function(e){
      e.preventDefault();
       $("#upload_gala_form input[name='project_id']").val($(this).data('project_id'));
       $("#upload_gala_form input[name='report_id']").val($(this).data('report_id'));
    });

$(document).on('click','#upload_gala_form #add_gala',function(e) {
    e.preventDefault();

    var form_data = new FormData($('#upload_gala_form')[0]);
    $.ajax({

         type: "POST",

         url: base_url +  "dashboard/upload_gala",
        
         data: form_data,

         dataType: 'json',

         processData: false,

         contentType: false,

         success: function(res) {

        if (res.response=="success"){

            $("#upload_gala_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#upload_gala_form .alert-success").css("display", "block");

            $("#upload_gala_form .alert-success p").html(res.message);

            $('#upload_gala_form')[0].reset();

            setTimeout(function(){

                  location.reload();

                }, 3000);



        }

         else{

            $("#upload_gala_form .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#upload_gala_form .alert-danger").css("display", "block");

            $("#upload_gala_form .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#upload_gala_form .alert-danger").css("display", "none");

                },3000);


       }

    },

  });

  
 });