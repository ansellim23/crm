
      // // Add Memo form
      // $(document).on('click','#memo_form #add_memo',function(e) {
      //   // var x = document.getElementById("subject").value;
      //   // alert(x);
      //   // exit();
      //   $.ajax({
      //          type: "POST",
      //          url: base_url +  "dashboard/add_announcement",
      //          dataType: 'json',
      //          data: $("#memo_form").serialize(),
      //          success: function(res) {
      //         if (res.response=="success"){
      //             $("#memo_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
      //             $("#memo_form .alert-success").css("display", "block");
      //             $("#memo_form .alert-success p").html(res.message);
      //             setTimeout(function(){
      //                          location.reload();
      //                 },4000);

      //         }
      //          else{
      //             $("#memo_form .alert-success").removeClass("alert-success").addClass("alert-danger");
      //             $("#memo_form .alert-danger").css("display", "block");
      //             $("#memo_form .alert-danger p").html(res.message);
      //             setTimeout(function(){
      //                     $("#memo_form .alert-danger").css("display", "none");
      //                 },3000);


      //        }
      //     },
      //   });
      //  });


      $(document).on('click','#memo_form #add_memo',function(e) {
      
      var data = new FormData($('.upload_file_form')[0]);
      var tr="";
    $.ajax({
        url: base_url +  "dashboard/add_announcement",
        type: "POST",   
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: data,
        success: function(res) {
              if (res.response=="success"){
                  $("#memo_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#memo_form .alert-success").css("display", "block");
                  $("#memo_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#memo_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#memo_form .alert-danger").css("display", "block");
                  $("#memo_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#memo_form .alert-danger").css("display", "none");
                      },3000);

            }
        }
    });   
});

  $('.confirmItem').click(function (event) {
    if (confirm('I confirm that I have read this document and have fully understood its contents.')) {
        document.getElementById('btnConfirm').style.display = 'none';
        document.getElementById('txtConfirm').style.display = 'block';
          $.ajax({
          type: "POST",
          url: base_url +'dashboard/confirm_announcement',
          dataType: 'json',
          data: $("#announcement_form").serialize(), // serializes the form's elements.
          success: function(res) {
              if (res.response=="success"){
                location.reload();
                  $("#announcement_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#announcement_form .alert-success").css("display", "block");
                  $("#announcement_form .alert-success p").html(res.message);
                  setTimeout(function(){
                          $("#file_form .alert-success").css("display", "none");
                      },4000);

              }
               else{
                  $("#announcement_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#announcement_form .alert-danger").css("display", "block");
                  $("#announcement_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#file_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
    }
}); 



      


