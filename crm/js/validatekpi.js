  // add create evaluation
  $(document).on('click','#addkpiform #add_createkpi',function(e) {
    
    $.ajax({

         type: "POST",

         url: base_url + "kpi/add_create_kpi",

         dataType: 'json',

         data: $("#addkpiform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#addkpiform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#addkpiform .alert-success").css("display", "block");

            $("#addkpiform .alert-success p").html(res.message);

            $('#addkpiform')[0].reset();

            setTimeout(function(){

                  window.location= res.redirect;
                  //location.reload();

                }, 1000);



        }

         else{

            $("#addkpiform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#addkpiform .alert-danger").css("display", "block");

            $("#addkpiform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#addkpiform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

  
 });


// Update KPI

$(document).on('click','#updateKpiform #update_kpi',function(e) {

  $.ajax({

         type: "POST",

         url: base_url +  "kpi/update_kpi",

         dataType: 'json',

         data: $("#updateKpiform").serialize(),

         success: function(res) {

        if (res.response=="success"){

            $("#updateKpiform .alert-danger").removeClass("alert-danger").addClass("alert-success");

            $("#updateKpiform .alert-success").css("display", "block");

            $("#updateKpiform .alert-success p").html(res.message);

            setTimeout(function(){

                  location.reload();

                }, 2000);



        }

         else{

            $("#updateKpiform .alert-success").removeClass("alert-success").addClass("alert-danger");

            $("#updateKpiform .alert-danger").css("display", "block");

            $("#updateKpiform .alert-danger p").html(res.message);

            setTimeout(function(){

                    $("#updateKpiform .alert-danger").css("display", "none");

                },3000);





       }

    },

  });

 });


  $('#addkpiform [name="attendance_subtotal"]').on('change', function () {
    
    let attendance_total = document.getElementById("attendance_subtotal").value * 0.1;
    document.getElementById("attendance_total").value = attendance_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);   

 });

  $('#addkpiform [name="qa_subtotal"]').on('change', function () {
    
    let qa_total = document.getElementById("qa_subtotal").value * 0.2;
    document.getElementById("qa_total").value = qa_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);  

 });

  $('#addkpiform [name="submission_subtotal"]').on('change', function () {
    
    let submission_total = document.getElementById("submission_subtotal").value * 0.1;
    document.getElementById("submission_total").value = submission_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);  

 });

  $('#addkpiform [name="revenue_subtotal"]').on('change', function () {
    
    let revenue_total = document.getElementById("revenue_subtotal").value * 0.6;
    document.getElementById("revenue_total").value = revenue_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);  

 });


//
  $('#updateKpiform [name="attendance_subtotal"]').on('change', function () {
    let attendance_total = document.getElementById("attendance_subtotal").value * 0.1;
    document.getElementById("attendance_total").value = attendance_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);   

 });

  $('#updateKpiform [name="qa_subtotal"]').on('change', function () {
    
    let qa_total = document.getElementById("qa_subtotal").value * 0.2;
    document.getElementById("qa_total").value = qa_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);  

 });

  $('#updateKpiform [name="submission_subtotal"]').on('change', function () {
    
    let submission_total = document.getElementById("submission_subtotal").value * 0.1;
    document.getElementById("submission_total").value = submission_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);  

 });

  $('#updateKpiform [name="revenue_subtotal"]').on('change', function () {
    
    let revenue_total = document.getElementById("revenue_subtotal").value * 0.6;
    document.getElementById("revenue_total").value = revenue_total.toFixed(2);
    let score = parseFloat(document.getElementById("attendance_total").value) + parseFloat(document.getElementById("qa_total").value) + parseFloat(document.getElementById("submission_total").value) + parseFloat(document.getElementById("revenue_total").value);
    document.getElementById("score").innerHTML = score.toFixed(1);  

 });