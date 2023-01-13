

$(".alert-danger, .alert-success").css("display", "none");



   $('.registerform .message a').click(function(){

        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");

        $('.modal-title').text('Member Login');

        $(".modal-footer").show();





    });

   $('.formlogin .message a').click(function(){

        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");

        $('.modal-title').text('Sign Up Now');

        $(".modal-footer").hide();



    });

   $('#forgot_password').click(function(){

          $(this).closest('.modal').modal('toggle');

           $('.modal-backdrop').remove();



   });

   $('#sign_in').click(function(){

          $(this).closest('.modal').modal('toggle');

           $('.modal-backdrop').remove();



   });

$(document).on('click','.registerform #register',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/register",

         dataType: 'json',

         data: $(".registerform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $(".registerform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $(".registerform .alert-success").css("display", "block");

            $(".registerform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $(".registerform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $(".registerform .alert-danger").css("display", "block");

            $(".registerform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $(".registerform .alert-danger").css("display", "none");

                },4000);

       }

    },

  });

 });

 //add assign User

 $('#addAssignUserform').on('click','#add_manager', function(){

     var nonempty = $('#addAssignUserform .project_id').filter(function() {

     return this.checked != false

      });

      if (nonempty.length == 0) {

         $("#addAssignUserform .alert-success").removeClass("alert-success").addClass("alert-danger");

         $("#addAssignUserform .alert-danger").css("display", "block");

         $("#addAssignUserform .alert-danger p").html("Please check lead atleast once field");

      }

      else{

          Assign_Manager();

    }

  });

  function Assign_Manager(){

    $.ajax({

           type: "POST",

           url: base_url +  "account/add_assign_user",

           dataType: 'json',

           data: $("#addAssignUserform").serialize(),

           success: function(res) {

          if (res.response=="success"){

              $("#addAssignUserform .alert-danger").removeClass("alert-danger").addClass("alert-success");

              $("#addAssignUserform .alert-success").css("display", "block");

              $("#addAssignUserform .alert-success p").html(res.message);

              setTimeout(function(){

                    location.reload();

                  }, 2000);



          }

           else{

              $("#addAssignUserform .alert-success").removeClass("alert-success").addClass("alert-danger");

              $("#addAssignUserform .alert-danger").css("display", "block");

              $("#addAssignUserform .alert-danger p").html(res.message);

              setTimeout(function(){

                      $("#addAssignUserform .alert-danger").css("display", "none");

                  },3000);

         }

      },

    });

  }

 //add assign Agent

$(document).on('click','.addAssignUserform #add_agent',function(e) {

var nonempty = $('.addAssignUserform .project_id').filter(function() {

     return this.checked != false

      });

      if (nonempty.length == 0) {

         $(".addAssignUserform .alert-success").removeClass("alert-success").addClass("alert-danger");

         $(".addAssignUserform .alert-danger").css("display", "block");

         $(".addAssignUserform .alert-danger p").html("Please check lead atleast once field");

      }

      else{

          Assign_Agent();

    }

  });

   function Assign_Agent(){

      // preloader
      $("#loader_2").css("display", "block");
      $.ajax({

             type: "POST",

             url: base_url +  "account/add_assign_agent",

             dataType: 'json',

             data: $(".addAssignUserform").serialize(),

             success: function(res) {

            if (res.response=="success"){

                $(".addAssignUserform .alert-danger").removeClass("alert-danger").addClass("alert-success");

                $(".addAssignUserform .alert-success").css("display", "block");

                $(".addAssignUserform .alert-success p").html(res.message);

                setTimeout(function(){

                      location.reload();
                      // preloader
                      $("#loader_2").css("display", "none");

                    }, 2000);



            }

             else{

                $(".addAssignUserform .alert-success").removeClass("alert-success").addClass("alert-danger");

                $(".addAssignUserform .alert-danger").css("display", "block");

                $(".addAssignUserform .alert-danger p").html(res.message);

                setTimeout(function(){

                        $(".addAssignUserform .alert-danger").css("display", "none");
                        $("#loader_2").css("display", "none");

                    },3000);

           }

        },

      });

  }


  $(document).on('click','.addAssignUserform_Regular #add_agent',function(e) {

var nonempty = $('.addAssignUserform_Regular .project_id').filter(function() {

     return this.checked != false

      });

      if (nonempty.length == 0) {

         $(".addAssignUserform_Regular .alert-success").removeClass("alert-success").addClass("alert-danger");

         $(".addAssignUserform_Regular .alert-danger").css("display", "block");

         $(".addAssignUserform_Regular .alert-danger p").html("Please check lead atleast once field");

      }

      else{

          Assign_Agent_Regular();

    }

  });

   function Assign_Agent_Regular(){

    // preloader
    $("#loader_1").css("display", "block");

      $.ajax({

             type: "POST",

             url: base_url +  "account/add_assign_agent",

             dataType: 'json',

             data: $(".addAssignUserform_Regular").serialize(),

             success: function(res) {

            if (res.response=="success"){

                $(".addAssignUserform_Regular .alert-danger").removeClass("alert-danger").addClass("alert-success");

                $(".addAssignUserform_Regular .alert-success").css("display", "block");

                $(".addAssignUserform_Regular .alert-success p").html(res.message);

                setTimeout(function(){

                      location.reload();
                       // preloader
                       $("#loader_1").css("display", "none");

                    }, 2000);



            }

             else{

                $(".addAssignUserform_Regular .alert-success").removeClass("alert-success").addClass("alert-danger");

                $(".addAssignUserform_Regular .alert-danger").css("display", "block");

                $(".addAssignUserform_Regular .alert-danger p").html(res.message);

                setTimeout(function(){

                        $(".addAssignUserform_Regular .alert-danger").css("display", "none");
                        $("#loader_1").css("display", "none");

                    },3000);

           }

        },

      });

  }

$(document).on('click','.forgotpasswordForm #forgot_password',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/forgot_password",

         dataType: 'json',

         data: $(".forgotpasswordForm").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $(".forgotpasswordForm .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $(".forgotpasswordForm .alert-success").css("display", "block");

            $(".forgotpasswordForm .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $(".forgotpasswordForm .alert-success").removeClass("alert-success").addClass("alert-danger");

            $(".forgotpasswordForm .alert-danger").css("display", "block");

            $(".forgotpasswordForm .alert-danger p").html(res.message);

            setTimeout(function(){

                    $(".forgotpasswordForm .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });





// add User

$(document).on('click','#adduserform #add_user',function(e) {
    var form_data = new FormData($('#adduserform')[0]);

    //preloader
    $("#loader_4").css("display","block");

  $.ajax({

         type: "POST",

         url: base_url +  "account/add_user",


         data: form_data,
        
         dataType: 'json',

         processData: false,

         contentType: false,

         success: function(res) {

        if (res.response=="success"){

            $("#adduserform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#adduserform .alert-success").css("display", "block");

            $("#adduserform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();
                  //preloader
                  $("#loader_4").css("display","none");

                }, 2000);



        }

         else{

            $("#adduserform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#adduserform .alert-danger").css("display", "block");

            $("#adduserform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#adduserform .alert-danger").css("display", "none");
                    //preloader
                    $("#loader_4").css("display","none");

                },3000);





       }

    },

  });

 });


function readURL(input) {

    var url = input.value;

    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $('#adduserform #image_preview').attr('src', e.target.result);

        }


          reader.readAsDataURL(input.files[0]);

    }else{

         $('#adduserform #image_preview').attr('src', base_url + 'images/No_image_available.png');

    }

}

function readURL_update(input) {

    var url = input.value;

    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $('#updateuserform #image_preview').attr('src', e.target.result);

        }


          reader.readAsDataURL(input.files[0]);

    }else{

         $('#updateuserform #image_preview').attr('src', base_url + 'images/No_image_available.png');

    }

}



  $("#adduserform #customFileInput").change(function() {

          readURL(this);

  });


  $("#updateuserform #customFileInputupdate").change(function() {

          readURL_update(this);

  });
  //Update User
  $(document).on('click','#updateuserform #update_user',function(e) {

    var form_data = new FormData($('#updateuserform')[0]);

    //preloader
    $("#loader_5").css("display", "block");

   $.ajax({

         type: "POST",

         url: base_url +  "account/update_user",

         data: form_data,

         dataType: 'json',

         processData: false,

         contentType: false,


         success: function(res) {

        if (res.response=="success"){

            $("#updateuserform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#updateuserform .alert-success").css("display", "block");

            $("#updateuserform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();
                  //preloader
                  $("#loader_5").css("display", "none");

                }, 2000);



        }

         else{

            $("#updateuserform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#updateuserform .alert-danger").css("display", "block");

            $("#updateuserform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#updateuserform .alert-danger").css("display", "none");
                    //preloader
                    $("#loader_5").css("display", "none");

                },3000);





       }

    },

  });

 });



// Edit User

$(document).on('click','#editUserform #update_account',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/update_profile",

         dataType: 'json',

         data: $("#editUserform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#editUserform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#editUserform .alert-success").css("display", "block");

            $("#editUserform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $("#editUserform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#editUserform .alert-danger").css("display", "block");

            $("#editUserform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#editUserform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });

// Change Password

$(document).on('click','#editUserPasswordform #change_password',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/update_password",

         dataType: 'json',

         data: $("#editUserPasswordform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#editUserPasswordform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#editUserPasswordform .alert-success").css("display", "block");

            $("#editUserPasswordform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $("#editUserPasswordform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#editUserPasswordform .alert-danger").css("display", "block");

            $("#editUserPasswordform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#editUserPasswordform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });

// Change Password Manager

$(document).on('click','#editUserPasswordform #change_password_mgr',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/update_password",

         dataType: 'json',

         data: $("#editUserPasswordform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#editUserPasswordform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#editUserPasswordform .alert-success").css("display", "block");

            $("#editUserPasswordform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $("#editUserPasswordform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#editUserPasswordform .alert-danger").css("display", "block");

            $("#editUserPasswordform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#editUserPasswordform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });

// Change Password homepage

$(document).on('click','#resetPasswordForm #change_password',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/update_password_homepage",

         dataType: 'json',

         data: $("#resetPasswordForm").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#resetPasswordForm .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#resetPasswordForm .alert-success").css("display", "block");

            $("#resetPasswordForm .alert-success p").html(res.message);

            $("#resetPasswordForm input[name='newpassword']").val('');

            $("#resetPasswordForm input[name='confirmpassword']").val('');

        }

         else{

            $("#resetPasswordForm .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#resetPasswordForm .alert-danger").css("display", "block");

            $("#resetPasswordForm .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#resetPasswordForm .alert-danger").css("display", "none");

                },3000);

         }

       },

  });

 });


$(document).on('click','.formlogin #login',function(e) {

  e.preventDefault();
  document.getElementById("loader").style.display = "block";

  $.ajax({

         type: "POST",

         url: base_url +  "account/login_user",

         dataType: 'json',

         data: $(".formlogin").serialize(),

         success: function(res) {

         if (res.response=="success"){

            $(".formlogin .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $(".formlogin .alert-success").css("display", "block");

            $(".formlogin .alert-success p").html(res.message);
              document.getElementById("loader").style.display = "none";
             window.location= res.redirect;

        }
         else if (res.response=="idle_error"){

            $(".modal-backdrop").css({ opacity: 0.5 });
            $(".fade:not(.show)").css({ opacity: "1 !important"});
            $('#codeFormModal').modal("show");  

            $(".codeForm input[name='user_id']").val(res.user_id);

            $(".codeForm .alert-success").removeClass("alert-success").addClass("alert-danger");

            $(".codeForm .alert-danger").css("display", "block");

            $(".codeForm .alert-danger p").html(res.message);
               setTimeout(function(){

                    $(".codeForm .alert-danger").css("display", "none");

                },1000);




        }

         else{

            
            $(".formlogin .alert-success").removeClass("alert-success").addClass("alert-danger");

            $(".formlogin .alert-danger").css("display", "block");

            $(".formlogin .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#loginForm .alert-danger").css("display", "none");
                    document.getElementById("loader").style.display = "none";

              },900);





       }

    },

  });

 });





$(document).on('click','#uploadForm #upload',function(e) {

     

       var data = new FormData($('#uploadForm')[0]);



      $.ajax({

      type: "POST",

      url: base_url + 'account/upload_file',

      contentType: false,

      cache: false,

      processData: false,

      data: data,

      dataType: 'json',

         success: function(res) {

        if (res.response=="success"){

            $("#uploadForm .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#uploadForm .alert-success").css("display", "block");

            $("#uploadForm .alert-success p").html(res.message);

            // alert('test');

            // setTimeout(function(){

            //       location.reload(); 

            //     }, 2000);



        }

         else{

            $("#uploadForm .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#uploadForm .alert-danger").css("display", "block");

            $("#uploadForm .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#uploadForm .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });





// $(document).ready(function(){



//   $image_crop = $('#image_demo').croppie({

//     enableExif: true,

//     viewport: {

//       width:200,

//       height:200,

//       type:'square' //circle

//     },

//     boundary:{

//       width:300,

//       height:300

//     }

//   });



//   $('#uploadfile').on('change', function(){

//     var reader = new FileReader();

//     reader.onload = function (event) {

//       $image_crop.croppie('bind', {

//         url: event.target.result

//       }).then(function(){

//         console.log('jQuery bind complete');

//       });

//     }

//     reader.readAsDataURL(this.files[0]);

//     $('#uploadimageModal').modal('show');

//   });



//   $('.crop_image').click(function(event){

//     $image_crop.croppie('result', {

//       type: 'canvas',

//       size: 'viewport'

//     }).then(function(response){

//       $.ajax({

//         url:base_url +  'account/store_image',

//         type: "POST",

//         data:{"image": response},

//         dataType: 'json',

//         success:function(data)

//         {

//           $('#uploadimageModal').modal('hide');

//            $('#image_preview').attr('src', base_url +'images/'+data.get_image);

//         }

//       });

//     })

//   });



// });  





 // view User

 $(document).on("click", ".view_accountprofile", function(e){

        e.preventDefault();

        var userid= $(this).data('userid');

        dataEdit = 'user_id='+ userid;

            $.ajax({

            type:'GET',

            data:dataEdit,

            url: base_url +'account/view_user_profile/'+ userid,

            dataType: 'json',

            success:function(data){

                var tr ="";

                for (var i = 0; i < data.length; i++) {

                   $("#editUserform input[name='firstname']").val(data[i].firstname);
                   $("#editUserform input[name='real_name']").val(data[i].real_name);

                   $("#editUserform input[name='lastname']").val(data[i].lastname);

                   $("#editUserform input[name='username']").val(data[i].username);

                   $("#editUserform input[name='email_address']").val(data[i].emailaddress);

                   $("#editUserform input[name='email_address_confirm']").val(data[i].emailaddress);

                   $("#editUserform input[name='contact']").val(data[i].contact);

                   $("#editUserform .usertype option[value='"+data[i].usertype+"']").attr('selected', 'selected');

                 }

              }

      });



    });



    //view update user
    $(document).on("click", ".view_user", function(e){

        e.preventDefault();

        var userid= $(this).data('userid');

        dataEdit = 'user_id='+ userid;

            $.ajax({

            type:'GET',

            data:dataEdit,

            url: base_url +'account/view_user_profile/'+ userid,

            dataType: 'json',

            success:function(data){

                var tr ="";

                for (var i = 0; i < data.length; i++) {

                   $("#updateuserform input[name='real_name']").val(data[i].real_name);
                   $("#updateuserform input[name='firstname']").val(data[i].firstname);

                   $("#updateuserform input[name='lastname']").val(data[i].lastname);

                   $("#updateuserform input[name='username']").val(data[i].username);

                   $("#updateuserform input[name='email_address']").val(data[i].emailaddress);

                   $("#updateuserform input[name='email_address_confirm']").val(data[i].emailaddress);

                   $("#updateuserform input[name='contact']").val(data[i].contact);

                    $("#updateuserform input[name='userid']").val(data[i].user_id);

                   $("#updateuserform .usertype option[value='"+data[i].usertype+"']").attr('selected', 'selected');

                   $("#updateuserform .status option[value='"+data[i].status_user+"']").attr('selected', 'selected');

                   $("#updateuserform .schedule_type option[value='"+data[i].schedule_status+"']").attr('selected', 'selected');

                   $("#updateuserform input[name='start_time']").val(data[i].time_in_start);
                   $("#updateuserform input[name='end_time']").val(data[i].time_out_start);

                   $('#updateuserform #image_preview').attr('src', base_url + 'upload_signatures/'+data[i].signature+'');



                 }

              }

      });



    });





// var screenshot_id = 0;

//     function post_data(imageURL){

//          $.ajax({  

//                 url:  base_url +  "account/expire_login",

//                 type: "POST",  

//                 data: {  

//                     image: imageURL

//                 },  

//                 dataType: "json",  

//                 success: function(res) { 

//                     console.log(res.response);

//                 }  

//             });  



//        }

// $(document).ready(function(){

//   setTimeout(function(){

//          html2canvas(document.body).then(canvas => {  

//                 // document.body.appendChild(canvas);  

//                 //console.log(canvas.toDataURL());  

//                 dataURL = canvas.toDataURL();  

//                 post_data(dataURL);  

//             });  

//     },1*60*1000);

// });



   // var timerVar;

   //  $(document).idle({

   //    onIdle: function(){

   //      $('#timer').css('display', 'block');

   //      timerVar = setInterval(countTimer, 1000);

   //      var totalSeconds = 900;

   //      function countTimer() {

   //         ++totalSeconds;

   //         var hour = Math.floor(totalSeconds /3600);

   //         var minute = Math.floor((totalSeconds - hour*3600)/60);

   //         var seconds = totalSeconds - (hour*3600 + minute*60)+1;

           

   //         if(hour < 10)

   //           hour = "0"+hour;

   //         if(minute < 10)

   //           minute = "0"+minute;

   //         if(seconds < 10)

   //           seconds = "0"+seconds;

   //         $('#timer').text(hour + ":" + minute + ":" + seconds);

   //      }





   //    },

   //    onActive: function(){

   //        $('#status').toggleClass('idle').html('Active!');

   //        clearInterval(timerVar);

   //    },

   //    onHide: function(){

   //      $('#visibility').toggleClass('idle').html('Hidden!');

   //       html2canvas(document.body).then(canvas => {  

   //              // document.body.appendChild(canvas);  

   //              //console.log(canvas.toDataURL());  

   //              dataURL = canvas.toDataURL();  

   //              post_data(dataURL);  

   //          }); 

   //    },

   //    onShow: function(){

   //      // Add a slight pause so you can see the change

   //      setTimeout(function(){

   //        $('#visibility').toggleClass('idle').html('Visible!');

   //      }, 250);

   //    },

   //    idle: 2000,

   //    keepTracking: true

   //  });













  //   $(document).ready(function(){

  //       var size;

  //       $('#image_preview').Jcrop({

  //         aspectRatio: 1,

  //         onSelect: function(c){

  //          size = {x:c.x,y:c.y,w:c.w,h:c.h};   

  //          $("#crop").css("visibility", "visible");  

  //         }

  //       });

     

  //       $("#crop").click(function(){

  //           var img = $("#image_preview").attr('src');

  //           $("#cropped_img").show();

  //           $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);

  //       });

  // });

// var user_login  = userlogin === null?  0 : userlogin;
// var type_user  =  user_type === null?  '': user_type;
//   var idleTime = 0; // how long user is idle
//   var timerVar = 0;
//   var get_status = '';

//   var test = 900; // how long user is idle
//   var idleTimeout = 1000 * 60 * 15; // logout if user is idle for 20 mins
//   var pingFrequency = 1000 * 60; // ping every 60 seconds
//   var warningTime = 1000 * 60 * 2; // warning at 2 mins left
//   var warningVisible = false; // whether user has been warned

//   // if(user_login == 1 && type_user == "Agent"){
//       setInterval(SendPing, pingFrequency);
//       setInterval(IdleCounter, 1000); // fire every second
//   //  }
//   // else{  
//   //    idleTime = 0;
//   //    clearInterval(timerVar);
//   //  }    // alert(user_type)


//   function IdleCounter() {
//       idleTime += 1000; // update idleTime (possible logic flaws here; untested example)

//       // console.log(idleTime.toString());

//   }

//   function SendPing() {
//       if (idleTime < idleTimeout) {
//         var totalSeconds = 900; 
//         var get_time ="";


//         timerVar =  setInterval(function(){ 
//              ++totalSeconds;

//               var hour = Math.floor(totalSeconds /3600);

//               var minute = Math.floor((totalSeconds - hour*3600)/60);

//               var seconds = totalSeconds - (hour*3600 + minute*60)+1;

               

//               if(hour < 10)

//                  hour = "0"+hour;

//               if(minute < 10)

//                  minute = "0"+minute;

//               if(seconds < 10)

//                  seconds = "0"+seconds;

//                  get_time = hour + ":" + minute + ":" + seconds;

//                   dataEdit = 'idleTime='+  get_time;

//               $.ajax({
//                 type:'GET',
//                 data:dataEdit,
//                 url: base_url +'account/idle_user/' + get_time,
//                 dataType: 'json',       
//                  success: function(data) {  
//                       get_user(data);
//                  },// success                
//               })// ajax


//             }, 1000); 
      
//     }
//   }


//   function ResetIdleTime() {
//       // user did something; reset idle counter
//       idleTime = 0;
//       clearInterval(timerVar);
//       dataEdit = 'status_idle='+  0;
//       $.ajax({
//                 type:'GET',
//                 data:dataEdit,
//                 url: base_url +'account/update_idle_status/',
//                 dataType: 'json',       
//                  success: function(data) {   

//                  },// success                

//       })// ajax
//       // alert("Idle time reset to 0");
//   }
//   $(document) // various events that can reset idle time
//   .on("mousemove", ResetIdleTime)
//       .on("click", ResetIdleTime)

//       .on("keydown", ResetIdleTime)
//       .children("body")
//       .on("scroll", ResetIdleTime);




//    dataEdit = 'user_id=' + 0;
//      window.setTimeout(function(){
//         $.ajax({
//             url: base_url +'dashboard/beep_idle' ,
//             type: "GET",
//             data: dataEdit,
//             dataType: 'json',  
//             success: function (result) {
//                 $(".modal-backdrop").css({ opacity: 0.5 });
//                 $(".fade:not(.show)").css({ opacity: "1 !important"});
//                  $('#warningModal').modal("show");               
//             },
//         });
//     }, 1000);
// }


// var interval = 0;
//   $.get(base_url +"account/session_id", function (result) {
//     var session_id = result.trim();

//     if (userid == session_id){
//       console.log('test');
//     }
//     else{
//       console.log('hello');
//     }

// });

// function startTimer(display) {
//   let timer = 15;
//   const interval = setInterval(function() {
//     let minutes = parseInt(timer / 60, 10)
//     let seconds = parseInt(timer % 60, 10);
//     minutes = minutes < 10 ? "0" + minutes : minutes;
//     seconds = seconds < 10 ? "0" + seconds : seconds;
//     display.textContent = seconds;
//     if (timer !== 0) {
//       --timer;
//     } else if (timer == 0) {
//       $.ajax({
//      url: base_url +  "account/update_idle_status",
//      success: function(res) {
//         },
//       });
//      $.ajax({
//         data:dataEdit,
//         url: base_url +'account/logout',      
//          success: function(data) { 
//               setTimeout(function(){
//                     location.reload();
//                   }, 500);  
//          },
//       });
//       clearInterval(interval);
//     }
//   }, 1000);
// }

var interval_timer;
function startTimer(display) {
  let timer = 15;
  const interval_timer = setInterval(function() {
    let minutes = parseInt(timer / 60, 10)
    let seconds = parseInt(timer % 60, 10);
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    display.textContent = seconds;
    if (timer !== 0) {
      --timer;
    } 
    else if (timer == 0) {
      $.get(base_url + "account/session_id_hide", function (result) {
        var  session_id = result.trim();
          $('#warningModal_'+session_id+'').modal("hide"); 
          $('#mdlLoggedOut_'+session_id+'').modal("show"); 
        
       });
      clearInterval(interval_timer);
    }
  }, 1000);
}
     $( ".session_expired" ).hover(function() {
           $.ajax({
               url: base_url +  "account/update_idle_status",
                  success: function(res) {
                    },
           });
          $.get(base_url + "account/logout", function (result) {
        
      });          
  });  

     $( ".timer_count_down" ).hover(function() {
           $.ajax({
               url: base_url +  "account/update_idle_status",
                  success: function(res) {
                    },
           });
        clearInterval(interval_timer);
  }); 

// window.onload = function() {
//   var seconds = 5,
//     display = document.querySelector('#time');
//   startTimer(seconds, display);
// };
function timeInHours(str)
{
   var sp = str.split(":");
   return sp[0] + sp[1]/60;
}

function hoursToString(h)
{
   var hours = floor(h);
   var minutes = (h - hours)*60;

   return hours + ":" + minutes;
}

function Once(){

    display = document.querySelector('#time');
    startTimer(display);

    Once = function(){};
}



   var totalSeconds =0; 

function load_beep_idle(type, userid){
  var user_id = userid;
  var get_time = 0;
  
  var dt = new Date();
  var current_time = moment().format("hh:mm");
  
   get_user_id = 'user_id='+  user_id;

  $.post(base_url + "account/agent_no_activities", function (result) {
      });
    $.post(base_url + "account/user_activities", function (result) {
       var arr = JSON.parse(result);
    var subtract_time_out = moment(arr.time_out_start, "hh:mm").subtract(15, 'minutes').format('hh:mm');
    var time_out_start = moment(arr.time_out_start, "hh:mm").format('hh:mm');
    console.log(arr.time_out);
    if(current_time >= subtract_time_out  && current_time <= time_out_start && arr.response == "Lacking"){
        $('#warning_activitiesModal_'+arr.user_id+'').modal("show"); 
        $('#warning_activitiesModal_'+arr.user_id+' .late').text(arr.late_minutes);
        $('#warning_activitiesModal_'+arr.user_id+' .over_lunch').text(arr.excess_break);
        $('#warning_activitiesModal_'+arr.user_id+' .over_break').text(arr.excess_lunch);
        $('#warning_activitiesModal_'+arr.user_id+' .total_activities').text(arr.current_activities);
        $('#warning_activitiesModal_'+arr.user_id+' .time_out').text(arr.time_out);
        $('#congratulation_activitiesModal_'+arr.user_id+'').modal("hide"); 
        $('.modal-backdrop').removeClass();

        if(arr.time_out =="No Time Out"){
          $('.no_time_out').css("display", "block");

        }
        else{
          $('.no_time_out').css("display", "none");
        }

    }
    else if(current_time >= subtract_time_out  && current_time <= time_out_start && arr.response == "Congratulation"){
         $('#congratulation_activitiesModal_'+arr.user_id+'').modal("show"); 
         $('#warning_activitiesModal_'+arr.user_id+'').modal("hide"); 
         $('.modal-backdrop').removeClass();

   
    }
    else{
          $('#warning_activitiesModal_'+arr.user_id+'').modal("hide"); 
          $('#congratulation_activitiesModal_'+arr.user_id+'').modal("hide"); 

    }

  // $('body').removeClass( "modal-open" );
    });

    // $.get(base_url + "account/user_activities", function (result) {
 

    //      console.log(result);

      



    // });
    if(userid !=0){
     $(".modal-backdrop").css({ opacity: 0.5 });
     $(".fade:not(.show)").css({ opacity: "1 !important"});
     $('#warningModal_'+userid+'').modal("show"); 
     $("#update_user_idle_form input[name='user_id']").val(userid);
     Once();
     



    $("<audio></audio>").attr({
    'src': base_url +'audio/Purge_Siren_Sound_Effect.mp3',
    'volume':0.7,
    'autoplay':'autoplay'
    }).appendTo("body");
     ++totalSeconds;

              var hour = Math.floor(totalSeconds /3600);

              var minute = Math.floor((totalSeconds - hour*3600)/60);

              var seconds = totalSeconds - (hour*3600 + minute*60)+1;

               

              if(hour < 10)

                 hour = "0"+hour;

              if(minute < 10)

                 minute = "0"+minute;

              if(seconds < 10)

                 seconds = "0"+seconds;

                 get_time = hour + ":" + minute + ":" + seconds;
                 dataEdit = 'idleTime='+  get_time;

             $.ajax({
                type:'GET',
                data:dataEdit,
                url: base_url +'account/idle_user_beep/' + get_time,
                dataType: 'json', 
                async: true,
                cache: false,
                timeout:50000,      
                 success: function(data) {  
                 },// success                
              });

    }
    else{
       $('#warningModal_'+userid+'').modal("hide"); 
       }

    }
   function waitForResponse(){
     
    $.ajax({
       type: "GET",
       url: base_url +'dashboard/beep_idle',
       dataType: 'json', 
       async: true,
       cache: false,
       timeout:50000,
         
        success: function(data){
          load_beep_idle("new", data);
     
          setTimeout(
          waitForResponse,
           1000
         );
     },
  });
};
         
  // waitForResponse();


  $(document).on('click','#update_user_activities ',function(e) {
           setTimeout(function(){
                  location.reload();
         },1000);
      $.post(base_url + "account/update_user_activities", function (result) {
      });
 });

  $( ".warning_activitiesModal, .congratulation_activitiesModal" ).hover(function() {
           setTimeout(function(){
               $.post(base_url + "account/update_user_activities", function (result) {
            });
         },2000);
       
    });
// var user_login  = userlogin === null?  0 : userlogin;


  //   function ResetIdleTime() {
  //     // user did something; reset idle counter
  //     idleTime = 0;
  //     dataEdit = 'status_idle='+  0;
  //     $.ajax({
  //               type:'GET',
  //               data:dataEdit,
  //               url: base_url +'account/update_idle_status/',
  //               dataType: 'json',   
  //               async: true,
  //                cache: false,
  //                timeout:50000,    
  //                success: function(data) {   
  //                //    setTimeout(
  //                //   ResetIdleTime,
  //                //  1000
  //                // );

  //                },// success                

  //     })// ajax
  //     // alert("Idle time reset to 0");
  // }
  // $(document) // various events that can reset idle time
  // .on("mousemove", ResetIdleTime)
  //     .children("body");



// var interval = 0;
// function countdown() {
//   var user_id = 0;

//   interval = setInterval( function() {
    
//   $.get(base_url +"account/session_id", function (result) {
//     user_id = result;

//   });
//   var test = user_id;
//     dataEdit = 'user_id='+ user_id;

//      $.ajax({
//             type: "GET",
//             data: dataEdit,
//             url: base_url +'dashboard/beep_idle',
//             dataType: 'json',  
//             success: function (result) {
//               if (user_id == result){
//                 $(".modal-backdrop").css({ opacity: 0.5 });
//                 $(".fade:not(.show)").css({ opacity: "1 !important"});
//                 $('#warningModal').modal("show");    
//               }
//               else{


//               }
//             },
//         });
//   }, 1000);
// }


// countdown();

// Addd attendance form
$(document).on('click','#idle_user_form #add_idle',function(e) {
                        // $('#editUserModal').modal('show');  

      var get_user = new Array();
        $("#idle_user_form  input[name='user_id']:checked").each(function() {  
                get_user.push($(this).val());
        });

  $.ajax({
         type: "POST",
         url: base_url +  "dashboard/add_idle_user",
         dataType: 'json',
         data: $("#idle_user_form").serialize(),
         success: function(res) {
        if (res.response=="success"){

            $("#idle_user_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#idle_user_form .alert-success").css("display", "block");
            $("#idle_user_form .alert-success p").html(res.message);
              // setTimeout(function(){
              //              location.reload();
              //     },1000);
   



        }

         else{
            $("#idle_user_form .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#idle_user_form .alert-danger").css("display", "block");
            $("#idle_user_form .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#idle_user_form .alert-danger").css("display", "none");
                },3000);

       }
    },

  });

 });

$(document).on('click','#update_user_idle_form #update_idle',function(e) {
                        // $('#editUserModal').modal('show');  

  $.ajax({
         type: "POST",
         url: base_url +  "account/update_idle_manual",
         dataType: 'json',
         data: $("#update_user_idle_form").serialize(),
         success: function(res) {
        if (res.response=="success"){

            $("#update_user_idle_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
            // $("#update_user_idle_form .alert-success").css("display", "block");
            // $("#update_user_idle_form .alert-success p").html(res.message);
                           location.reload();
   



        }

         else{
            $("#update_user_idle_form .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#update_user_idle_form .alert-danger").css("display", "block");
            $("#update_user_idle_form .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#update_user_idle_form .alert-danger").css("display", "none");
                },1000);

       }
    },

  });

 });

// alert(userlogin);



//logout from idle form

$(document).on('click','#update_user_idle_form #logout',function(e) {

    $.ajax({
     url: base_url +  "account/update_idle_status",
     success: function(res) {
        },
      });

     $.ajax({
        data:dataEdit,
        url: base_url +'account/logout',      
         success: function(data) { 
              setTimeout(function(){
                    location.reload();
                  }, 500);  
         },
      });

 });


//view penalty

$(document).on("click", "#view_penalty", function(e){

        e.preventDefault();

        var userid= $(this).data('userid');

        alert(userid);

        dataEdit = 'userid='+ userid;

            $.ajax({

            type:'GET',

            data:dataEdit,

            url: base_url +'dashboard/view_penaltymatrix/'+ userid,

            dataType: 'json',

            success:function(data){

                

                for (var i = 0; i < data.length; i++) {

                   $("#penaltyMatrixform select[name='field1']").val(data[i].field_1);


                 }



              }

      });



    });

//update penalty

$(document).on('click','#update_penalty',function(e) {


  $.ajax({

         type: "POST",

         url: base_url + 'account/update_penalty',

         dataType: 'json',

         data: $("#penaltyMatrixform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#penaltyMatrixform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#penaltyMatrixform .alert-success").css("display", "block");

            $("#penaltyMatrixform .alert-success p").html(res.message);

            // setTimeout(function(){

            //       location.reload();

            //     }, 2000);



        }

         else{

            $("#penaltyMatrixform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#penaltyMatrixform .alert-danger").css("display", "block");

            $("#penaltyMatrixform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#penaltyMatrixform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });


$(document).on('click','#loginAs',function(e) {
    var emailaddress = $(this).data('email');
    var usertype = $(this).data('usertype');
// alert(emailaddress+usertype);
// exit();
  $.ajax({

         type: "GET",

         url: base_url +  "account/loginAs",

         dataType: 'json',

         data: {emailaddress:emailaddress, usertype:usertype},

         success: function(res) {

        if (res.response=="success"){

            $(".alert-danger").removeClass("alert-danger").addClass("alert-success");

            $(".alert-success").css("display", "block");

            $(".alert-success p").html(res.message);

            setTimeout(function(){

                        window.location= res.redirect;

                },1000);



        }

         else{

            $(".alert-success").removeClass("alert-success").addClass("alert-danger");

            $(".alert-danger").css("display", "block");

            $("alert-danger p").html(res.message);

            setTimeout(function(){

                    $(".alert-danger").css("display", "none");

                },30100);





       }

    },

  });

 });



$(document).on('click','.codeForm #add_code',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "account/login_code",

         dataType: 'json',

         data: $(".codeForm").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $(".codeForm .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $(".codeForm .alert-success").css("display", "block");

            $(".codeForm .alert-success p").html(res.message);

            setTimeout(function(){

                        window.location= res.redirect;

                },1000);

        }

         else{

            $(".codeForm .alert-success").removeClass("alert-success").addClass("alert-danger");

            $(".codeForm .alert-danger").css("display", "block");

            $(".codeForm .alert-danger p").html(res.message);

            setTimeout(function(){

                    $(".codeForm .alert-danger").css("display", "none");

                },3000);

         }

       },

  });

 });


// add Deduction

$(document).on('click','#adddeductionform #add_deduction',function(e) {
    var form_data = new FormData($('#adddeductionform')[0]);

  $.ajax({

         type: "POST",

         url: base_url +  "dashboard/add_deduction",


         data: form_data,
        
         dataType: 'json',

         processData: false,

         contentType: false,

         success: function(res) {

        if (res.response=="success"){

            $("#adddeductionform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#adddeductionform .alert-success").css("display", "block");

            $("#adddeductionform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $("#adddeductionform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#adddeductionform .alert-danger").css("display", "block");

            $("#adddeductionform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#adddeductionform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });


// Add todo user
$(document).on('click','#addtodoform #add_todo',function(e) {
    // alert('test');
    // exit();
                        // $('#editUserModal').modal('show');  

  $.ajax({
         type: "POST",
         url: base_url +  "todolist/add_todo",
         dataType: 'json',
         data: $("#addtodoform").serialize(),
         success: function(res) {
        if (res.response=="success"){

            $("#addtodoform .alert-danger").removeClass("alert-danger").addClass("alert-success");
            $("#addtodoform .alert-success").css("display", "block");
            $("#addtodoform .alert-success p").html(res.message);
               setTimeout(function(){
                            location.reload();
                   },1000);
   



        }

         else{
            $("#addtodoform .alert-success").removeClass("alert-success").addClass("alert-danger");
            $("#addtodoform .alert-danger").css("display", "block");
            $("#addtodoform .alert-danger p").html(res.message);
            setTimeout(function(){
                    $("#addtodoform .alert-danger").css("display", "none");
                },3000);

       }
    },

  });

 });

// Update todo status
// $(document).on('change','.update_todo_status',function(e) {
//     var event_id = $(this).val();

//      // alert(event_id);
//      // exit();
 

//   $.ajax({
//          type: "POST",
//          url: base_url +  "todolist/update_todo_status",
//          dataType: 'json',
//          data: $("#updatetodoform").serialize(),
//          success: function(res) {
//         if (res.response=="success"){

//             $("#updatetodoform .alert-danger").removeClass("alert-danger").addClass("alert-success");
//             $("#updatetodoform .alert-success").css("display", "block");
//             $("#updatetodoform .alert-success p").html(res.message);
//                // setTimeout(function(){
//                //              location.reload();
//                //     },1000);
   



//         }

//          else{
//             $("#updatetodoform .alert-success").removeClass("alert-success").addClass("alert-danger");
//             $("#updatetodoform .alert-danger").css("display", "block");
//             $("#updatetodoform .alert-danger p").html(res.message);
//             setTimeout(function(){
//                     $("#updatetodoform .alert-danger").css("display", "none");
//                 },3000);

//        }
//     },

//   });

//  });


//update todo status to done
$(document).on('change','.update_todo_status',function(e) {
        e.preventDefault();

        var event_id = $(this).val();

        dataEdit = 'event_id='+ event_id;

            $.ajax({

            type:'GET',

            data:dataEdit,

            url: base_url +'todolist/update_todo_status/'+ event_id,

            dataType: 'json',

            success:function(data){

                 setTimeout(function(){
                              location.reload();
                     },1000);

              }

      });
            
      });

//update todo status to assigned
$(document).on('change','.update_todo_status1',function(e) {
        e.preventDefault();

        var event_id = $(this).val();

        dataEdit = 'event_id='+ event_id;

            $.ajax({

            type:'GET',

            data:dataEdit,

            url: base_url +'todolist/update_todo_status1/'+ event_id,

            dataType: 'json',

            success:function(data){

                 setTimeout(function(){
                              location.reload();
                     },1000);

              }

      });



    });

//view todo full details modal
$(document).on('click','.my_event',function(e) {
        e.preventDefault();

        var event_id = $(this).data('event_id');

        // alert(event_id); exit();

        dataEdit = 'event_id='+ event_id;

            $.ajax({

            type:'GET',

            data:dataEdit,

            url: base_url +'todolist/view_todo_details/'+ event_id,

            dataType: 'json',

            success:function(data){

                 for (var i = 0; i < data.length; i++) {


                    $(".title").text(data[i].event_title);

                    $(".desc").text(data[i].description);

                    $(".start").text(data[i].event_start);

                    $(".end").text(data[i].event_end);

                    $(".status").text(data[i].event_level);

                    $(".origin").text(data[i].type);

                    $(".type").text(data[i].status_event);

                    $(".user_from").text(data[i].usercharge);


                  }

              }

      });



    });

    // automatic add lead

    // var btn = document.getElementById("on_off")
    // btn.addEventListener("click", function(){
    //   currentvalue = document.getElementById('on_off').value;
    //   if(currentvalue == "Off"){
    //     document.getElementById("on_off").value="On";
    //     document.getElementById("on_off").innerHTML = "On";
    //     document.getElementById("on_off").style.backgroundColor = "green"
    //   }else{
    //     document.getElementById("on_off").value="Off";
    //     document.getElementById("on_off").innerHTML = "Off"
    //     document.getElementById("on_off").style.backgroundColor = "red"
    //   }
    // });

    

    // Addd attendance form
$(document).on('click','#on_off',function(e) {
                currentvalue = document.getElementById('on_off').value;
                  if(currentvalue == "Off"){
                    document.getElementById("on_off").value="On";
                    document.getElementById("on_off").innerHTML = "On";
                    document.getElementById("on_off").style.backgroundColor = "green";
                    $("#auto_assign_lead_form input[name='on_off']").val("On");
                  }else{
                     document.getElementById("on_off").value="Off";
                     document.getElementById("on_off").innerHTML = "Off"
                     document.getElementById("on_off").style.backgroundColor = "red";
                     $("#auto_assign_lead_form input[name='on_off']").val("Off");
                  }

  $.ajax({  
         type: "POST",
         url: base_url +  "account/update_user_auto_assign",
         dataType: 'json',
         data: $("#auto_assign_lead_form").serialize(),
         success: function(res) {
           console.log(res.message);
        if (res.response=="success"){
       //      $("#auto_assign_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
       //      $("#auto_assign_lead_form .alert-success").css("display", "block");
       //      $("#auto_assign_lead_form .alert-success p").html(res.message);

       //      setTimeout(function(){
       //                   location.reload();
       //          },1000);

       //  }
       //   else{
       //      $("#auto_assign_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
       //      $("#auto_assign_lead_form .alert-danger").css("display", "block");
       //      $("#auto_assign_lead_form .alert-danger p").html(res.message);
       //      setTimeout(function(){
       //              $("#auto_assign_lead_form .alert-danger").css("display", "none");
       //          },3000);

       // }
       }
    },
  });
 });

 //check lead
 function setindex_prefix(index_assigned)
    {
            switch(index_assigned.length)
            {
                case 1:
                    var new_index_assigned = "000"+  index_assigned;
                    break;
                case 2:
                    var new_index_assigned = "00"+  index_assigned;
                break;
                case 3:
                    var new_index_assigned = "0"+  index_assigned;
                    break;
                default:
                    var new_index_assigned =  index_assigned;
            }
            
          return "PROJ"+ new_index_assigned;
    }
    
//  var table = $('#leaddataTablefixed').DataTable({
//   bInfo:      false,
//   scrollY:        700,
//   scrollCollapse: true,
//   scroller:       true,
//   scroller: {
//            loadingIndicator: true
//        },   
//      }).columns(1).search('#@://d+5', true, false).draw();

//   $('input.search-box-dataTable').on('keypress', function (e) {
//       if(e.keyCode == 13)
//    {
//       if( $('input.search-box-dataTable').val() === '' ) {
//       table.columns(1).search('#@://d+5',true,false).draw();
//    } else {
//        table.columns(1).search($(this).val(), true, false).draw();
//      }

//    }
// });