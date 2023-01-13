[].slice.call(document.querySelectorAll('.toggleDetails')).forEach(function(e){e.onclick = function(){
   this.parentElement.querySelector('.divhide').classList.toggle('hidden');
   this.parentElement.querySelector('.divshow').classList.toggle('hidden');
}});

  function score_click(clicked_id)
  {
      var score = document.getElementById(clicked_id).getAttribute('value');
      var input = document.getElementById(clicked_id).getAttribute('value1');
    
      $(".col"+input).removeClass('colored');
      $(".bx"+input).removeClass('coloredBox');

      document.getElementById(clicked_id).classList.toggle('colored');
      document.getElementById("box"+clicked_id).classList.toggle('coloredBox');


      document.getElementById("score"+input).value = score;
      $("#subtotal"+input).text(score);

      var numItems = $('.score').length;
      var overall_points =  document.getElementById("overall_points").textContent;
      let passing_score = parseInt(overall_points) * 0.8;
      var total = 0;

      for (let i = 1; i <= numItems; i++) {
        total = total + parseInt(document.getElementById('score'+i).value);
       $("#total").text(total);
      }

      if(total < passing_score){
        document.getElementById("add_evaluation_score").innerHTML="Submit and set schedule for coaching";
      }
      else{
        document.getElementById("add_evaluation_score").innerHTML="Submit";
      }


  }

  // add create evaluation
  $(document).on('click','#addevaluationform #add_createeval',function(e) {
    
    $.ajax({

         type: "POST",

         url: base_url +  "evaluation/add_create_evaluation",

         dataType: 'json',

         data: $("#addevaluationform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#addevaluationform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#addevaluationform .alert-success").css("display", "block");

            $("#addevaluationform .alert-success p").html(res.message);

            $('#addevaluationform')[0].reset();

            setTimeout(function(){

                  location.reload();

                }, 1000);



        }

         else{

            $("#addevaluationform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#addevaluationform .alert-danger").css("display", "block");

            $("#addevaluationform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#addevaluationform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

  
 });


  // add evaluation score
  $(document).on('click','#teamevaluationform #add_evaluation_score',function(e) {
    
    $.ajax({

         type: "POST",

         url: base_url +  "evaluation/add_evaluation_score",

         dataType: 'json',

         data: $("#teamevaluationform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#teamevaluationform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#teamevaluationform .alert-success").css("display", "block");

            $("#teamevaluationform .alert-success p").html(res.message);

            setTimeout(function(){

                  window.location= res.redirect;

                }, 1000);



        }

         else{

            $("#teamevaluationform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#teamevaluationform .alert-danger").css("display", "block");

            $("#teamevaluationform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#teamevaluationform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

  
 });


      // Addd attendance form
$(document).on('change','#selectForm',function(e) {
//alert('success');

var form = document.getElementById("selectForm").value;

if(form == 'Company Evaluation'){
    $('#to_user1').prop('hidden', true);
    $('#to_user1').prop('disabled', true);
    $('#to_user2').prop('hidden', false);
    $('#to_user2').prop('disabled', false);
    $('#from_user1').prop('hidden', true);
    $('#from_user1').prop('disabled', true);
    $('#from_user2').prop('hidden', false);
    $('#from_user2').prop('disabled', false);
}
else if(form == 'Employee Evaluation'){
    $('#to_user1').prop('hidden', false);
    $('#to_user1').prop('disabled', false);
    $('#to_user2').prop('hidden', true);
    $('#to_user2').prop('disabled', true);
    $('#from_user1').prop('hidden', false);
    $('#from_user1').prop('disabled', false);
    $('#from_user2').prop('hidden', true);
    $('#from_user2').prop('disabled', true);
}

 });   