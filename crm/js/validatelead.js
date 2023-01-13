      //add lead total amount
       $("#lead_form .total_amount").keyup(function(){
                  var total_amount = 0;
                  var initial_payment =  $("#initial_payment").val();
                  
                  totalamount =  parseFloat($(this).val()) - parseFloat(initial_payment);
                  $("#remain_balance").val("$ " + totalamount.toFixed(2));

                  if($(this).val() == "" || $(this).val() == 0){
                     $("#remain_balance").val("$ 0.00"  );
                }
                  else{
                      $("#remain_balance").val("$ " + totalamount.toFixed(2));
                }
            }); 

        $("#lead_form #initial_payment").keyup(function(){
                  var total_amount = 0; 

                  totalamount =  parseFloat($(".total_amount").val()) - parseFloat($(this).val());
                  $("#remain_balance").val("$ " + totalamount.toFixed(2));

                  if($(this).val() == "" || $(this).val() == 0){
                     $("#remain_balance").val("$ 0.00"  );
                }
                  else{
                      $("#remain_balance").val("$ " + totalamount.toFixed(2));
                }
                  if(parseFloat($(this).val()) >= parseFloat($(".total_amount").val())){
                       this.value =  $(".total_amount").val();
                      $("#remain_balance").val("$ " + $(".total_amount").val());

                  }
            }); 

      // update total amount

       $("#update_lead_form .total_amount").keyup(function(){
                  var total_amount = 0;
                  var initial_payment =  $("#update_lead_form #initial_payment").val().replace("$", "");
                  totalamount =  parseFloat($(this).val()) - parseFloat(initial_payment);
                  $("#update_lead_form #remain_balance").val("$ " + totalamount.toFixed(2));

                  if($(this).val() == "" || $(this).val() == 0){
                     $("#update_lead_form #remain_balance").val("$ 0.00"  );
                }
                  else{
                      $("#update_lead_form #remain_balance").val("$ " + totalamount.toFixed(2));
                }
            }); 

        $("#update_lead_form #initial_payment").keyup(function(){
                  var total_amount = 0; 
                  var price =  $("#update_lead_form .total_amount").val().replace("$", "");

                  totalamount =  parseFloat(price) - parseFloat($(this).val());
                  $("#update_lead_form #remain_balance").val("$ " + totalamount.toFixed(2));

                  if($(this).val() == "" || $(this).val() == 0){
                     $("#update_lead_form #remain_balance").val("$ 0.00"  );
                }
                  else{
                      $("#update_lead_form #remain_balance").val("$ " + totalamount.toFixed(2));
                }
                  if(parseFloat($(this).val()) >= parseFloat(price)){
                       this.value =  $("#update_lead_form .total_amount").val();
                      $("#update_lead_form #remain_balance").val($("#update_lead_form .total_amount").val());

                }
            }); 
       $("#update_lead_form .total_amount").keyup(function(){
                  var total_amount = 0;
                  var initial_payment =  $("#update_lead_form #initial_payment").val().replace("$", "");
                  totalamount =  parseFloat($(this).val()) - parseFloat(initial_payment);
                  $("#update_lead_form #remain_balance").val("$ " + totalamount.toFixed(2));

                  if($(this).val() == "" || $(this).val() == 0){
                     $("#update_lead_form #remain_balance").val("$ 0.00"  );
                }
                  else{
                      $("#update_lead_form #remain_balance").val("$ " + totalamount.toFixed(2));
                }
            }); 
      //payload
        $("#pay_lead_form #initial_payment").keyup(function(){
                  var totalamount = 0; 
                  var isFirst = true;
                  var price =  $("#payleadmodal #balance").text().replace("$", "").replace(",","");
                  var amount_paid =  $("#pay_lead_form input[name='amount_paid']").val().replace("$", "").replace(",","");
                  var collection_status = $("#pay_lead_form .status option:selected").val();
                  var get_total_amount = 0;
                  var get_price = 0;
                  var payment_status = '';
                  var payment = parseFloat($(this).val().replace("$", "").replace(",", ""));
                  var status = "";
                   $("#payleadmodal .view_all_lead tr").each(function() {
                              var paid_amount = $(this).find('td.amount_paid').text().replace("$", "").replace(",","");
                              status =      $(this).find('td.status').text();
                              payment_status = $(this).find('td.payment_status').text();

                              // add only if the value is number
                              if(!isNaN(paid_amount) && paid_amount.length != 0 && payment_status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled")   {
                                   if(!isFirst)
                                      totalamount += parseFloat(paid_amount); 
                                  else
                                  {
                                      totalamount=parseFloat(paid_amount);
                                      isFirst=false;
                                  }
                              }
                          });

                    if (collection_status == 'Refund Payment'){
                       get_total_amount  = parseFloat(amount_paid) -  (totalamount - parseFloat(payment)); 
                    }
                    else{
                       get_total_amount  = parseFloat(amount_paid) -  totalamount - parseFloat(payment);
                    } 
                       $("#pay_lead_form #remain_balance").val("$ " + get_total_amount.toLocaleString());

                //   if(payment == "" || payment == 0){
                //      $("#pay_lead_form #remain_balance").val($("#payleadmodal #balance").text());
                // }
                //   else{
                //       $("#pay_lead_form #remain_balance").val("$ " + get_total_amount.toLocaleString('en'));
                // }
                  if(parseFloat(payment) > parseFloat(price)){
                       this.value = parseFloat(price).toLocaleString("en");
                      $("#pay_lead_form #remain_balance").val($("#payleadmodal #balance").text());
                }
                else if(parseFloat(payment) > parseFloat(price) && status == 'Refund Payment' ){
                       this.value =  parseFloat(totalamount).toLocaleString();
                      $("#pay_lead_form #remain_balance").val($("#payleadmodal #balance").text());
                 }
            }); 

      // Addd Lead form
      $(document).on('click','#lead_form #add_lead',function(e) {
        //preloader
        $("#loader_3").css("display", "block");
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/add_lead",
               dataType: 'json',
               data: $("#lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#lead_form .alert-success").css("display", "block");
                  $("#lead_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                               //preloader
                               $("#loader_3").css("display", "none");
                      },4000);

              }
               else{
                  $("#lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#lead_form .alert-danger").css("display", "block");
                  $("#lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#lead_form .alert-danger").css("display", "none");
                          $("#loader_3").css("display", "none");
                      },3000);


             }
          },
        });
       });


      // import lead
      $(document).on('click','#upload_lead_form #import_lead',function(e) {
          var data = new FormData($('#upload_lead_form')[0]);
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/import_lead",
               secureuri   :false,
               mimeType: "multipart/form-data",
               contentType: false,
               cache: false,
               processData: false,
               data: data,
               dataType: 'json',
               success: function(res) {
              if (res.response=="success"){
                  $("#upload_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#upload_lead_form .alert-success").css("display", "block");
                  $("#upload_lead_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#upload_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#upload_lead_form .alert-danger").css("display", "block");
                  $("#upload_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#upload_lead_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });
      // update Lead form
      $(document).on('click','#update_lead_form #update_lead',function(e) {
        //loader
        $("#loader_1").css("display", "block");
        $("#loader_2").css("display", "block");
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_lead",
               dataType: 'json',
               data: $("#update_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_lead_form .alert-success").css("display", "block");
                  $("#update_lead_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               $("#update_lead_form .alert-success").css("display", "none");
                               $("#update_lead_form .alert-success p").html('');
                               $("#update_lead_form")[0].reset();
                               $('#updateleadmodal').modal('hide');
                                //loader
                                $("#loader_1").css("display", "none");
                                $("#loader_2").css("display", "none");
                      },3000);

              }
               else{
                  $("#update_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_lead_form .alert-danger").css("display", "block");
                  $("#update_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_lead_form .alert-danger").css("display", "none");
                          //loader
                          $("#loader_1").css("display", "none");
                          $("#loader_2").css("display", "none");
                      },3000);


             }
          },
        });
       });
      // add Paylead form
      $(document).on('click','#pay_lead_form #pay_lead',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/pay_lead",
               dataType: 'json',
               data: $("#pay_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#pay_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#pay_lead_form .alert-success").css("display", "block");
                  $("#pay_lead_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#pay_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#pay_lead_form .alert-danger").css("display", "block");
                  $("#pay_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#pay_lead_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

      //  update Pay  collection
      $(document).on('click','#pay_lead_form #update_pay_lead',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_pay_lead",
               dataType: 'json',
               data: $("#pay_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#pay_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#pay_lead_form .alert-success").css("display", "block");
                  $("#pay_lead_form .alert-success p").html(res.message);
                      setTimeout(function(){
                               location.reload();
                      },3000);

              }
               else{
                  $("#pay_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#pay_lead_form .alert-danger").css("display", "block");
                  $("#pay_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#pay_lead_form .alert-danger").css("display", "none");
                      },3000);
             }
          },
        });
       });

      //  update Pay  collection
      $(document).on('click','#update_contractinnvestment_lead_form #update_lead_contractinvestment',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_lead_contract_investment",
               dataType: 'json',
               data: $("#update_contractinnvestment_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_contractinnvestment_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_contractinnvestment_lead_form .alert-success").css("display", "block");
                  $("#update_contractinnvestment_lead_form .alert-success p").html(res.message);

             

              }
               else{
                  $("#update_contractinnvestment_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_contractinnvestment_lead_form .alert-danger").css("display", "block");
                  $("#update_contractinnvestment_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_contractinnvestment_lead_form .alert-danger").css("display", "none");
                      },3000);
             }
          },
        });
       });






      //  Update Approval Status
      $(document).on('click','#update_approval_lead_form #update_approval',function(e) {
                var getstatus = "";
                var get_collect_status = "";
                var get_payment_status = "";
                var get_approve_status = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_collection_date = "";
                var get_date_collection = "";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var get_total_amount = 0;
                var isFirst = true; 
                var get_installment_term = '';
                var display_action_payment = '';
                var display_action_approval ='';
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_approval",
               dataType: 'json',
               data: $("#update_approval_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_approval_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_approval_lead_form .alert-success").css("display", "block");
                  $("#update_approval_lead_form .alert-success p").html(res.message);
                   var data = res.payment;
                      for (var i = 0; i < data.length; i++) {
                         get_collect_status = data[i].collect_payment_status;
                         get_payment_status = data[i].status_payment;
                         get_approval_status = data[i].approval_status;
                         get_installment_term = data[i].installment_term;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].collection_date);
                         get_date_collection = data[i].collection_date;
                         if(data[i].approval_status =="Pending" || data[i].approval_status == null){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">Action</button>';
                            display_action_approval ='<button type="button" class="btn btn-danger view_lead_approval" data-toggle="modal" data-target="#viewlead_approval_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                            display_action_approval ='<button type="button" disabled class="btn btn-success">'+data[i].approval_status+'</button>';
                         }
                         if(data[i].approval_status =="Approved" && data[i].status_payment =="Pending" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else  if(data[i].approval_status =="Approved" && data[i].status_payment =="Paid" || data[i].status_payment =="Cancelled" ){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }

                         else  if(data[i].approval_status =="Approved" && data[i].status_payment !="Refunded" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }
                         if(data[i].amount_paid !=null){
                           tr += '<tr>'+
                                  '<td class="amount_paid">$ '+parseFloat(get_initial_payment.replace(",","")).toLocaleString("en")+'</td>'+
                                  '<td>'+convertDate(data[i].collection_date)+'</td>'+
                                  '<td class="status">'+data[i].collect_payment_status+'</td>'+
                                  '<td><span class="approval_status">'+data[i].approval_status+ '</span> - ' +(data[i].date_approve == null ? 'Not Yet': convertDate(data[i].date_approve))+ '</td>'+
                                  '<td><span class="payment_status">'+data[i].status_payment+ '</span> - ' +(data[i].date_paid == null ? 'Not Yet': convertDate(data[i].date_paid))+ '</td>'+
                                  '<td>'+data[i].payment_usercharge+'</td>'+
                                  '<td>'+data[i].payment_usertype+'</td>'+ 
                                  '<td><button type="button" class="btn btn-info view_lead_remark" data-toggle="modal" data-target="#viewlead_paymentremark_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'">View</button></td>'+
                                  '<td>'+display_action_approval+'</td>'+
                                  '<td>'+display_action_payment+'</td>'+
                               '</tr>'; 
                             }
                        else{
                           tr ='';
                        }
                         // 
                       }
                      // $("#pay_lead_form .status option[value='"+getstatus+"']").attr('selected', 'selected').text(getstatus).change();
                         // $("#pay_lead_form .installment_term option[value='"+get_installment_term+"']").attr('selected', 'selected').text(get_installment_term).change();

                      $('#payleadmodal .view_all_lead').html(tr);
                      $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});

                      var get_last_amount = $('#payleadmodal .view_all_lead').find('.amount_paid:last').text();
                      $('#payleadmodal .view_all_lead').find('.amount_paid:last').text(get_last_amount);
                      $("#pay_lead_form input[name='initial_payment']").val(get_last_amount);


                      $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",", "");
                              var status =      $(this).find('td.status').text();
                              var payment_status =      $(this).find('td span.payment_status').text();
                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled")   {
                                   if(!isFirst)
                                      totalamount += parseFloat(amount_paid); 
                                   else{
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount;

                        if(getstatus != "Refund Payment"){
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString("en")+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString("en")+'.00');

                        }
                        else{
                             $("#payleadmodal #display_balance").css("display", "none");
                             $("#payleadmodal  #remain_balance").val("$ 0.00");
                        }
                       //colect payment status


                       if (get_payment_status =='Pending' || get_approval_status =='Pending') {
                                $("#pay_lead_form #pay_lead").prop("disabled", true);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", false);

                       }
                       else if (get_payment_status =='Pending' || get_approval_status =='Declined') {
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", true);

                       }
                       else if (get_payment_status =='Pending' || get_approval_status =='Approved') {
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", true);

                       }
                       else if (get_payment_status =='Sold' || get_payment_status =='Cancelled') {
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                       }

                  setTimeout(function(){
                               $('#viewlead_approval_modal').modal('toggle');

                      },3000);

              }
               else{
                  $("#update_approval_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_approval_lead_form .alert-danger").css("display", "block");
                  $("#update_approval_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_approval_lead_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

      // Update Payment Status
      $(document).on('click','#update_payment_lead_form #update_lead_payment',function(e) {
                var getstatus = "";
                var get_collect_status = "";
                var get_payment_status = "";
                var get_approve_status = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_collection_date = "";
                var get_date_collection = "";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var get_total_amount = 0;
                var isFirst = true; 
                var get_installment_term = '';
                var display_action_payment = '';
                var display_action_approval ='';
                var total_refund = 0;
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_lead_payment",
               dataType: 'json',
               data: $("#update_payment_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_payment_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_payment_lead_form .alert-success").css("display", "block");
                  $("#update_payment_lead_form .alert-success p").html(res.message);
                   var data = res.payment;
                      for (var i = 0; i < data.length; i++) {
                         get_collect_status = data[i].collect_payment_status;
                         get_payment_status = data[i].status_payment;
                         get_approval_status = data[i].approval_status;
                         getstatus = data[i].collect_payment_status;
                         get_installment_term = data[i].installment_term;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].collection_date);
                         get_date_collection = data[i].collection_date;
                         if(data[i].approval_status =="Pending" || data[i].approval_status == null){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">Action</button>';
                            display_action_approval ='<button type="button" class="btn btn-danger view_lead_approval" data-toggle="modal" data-target="#viewlead_approval_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_approval" data-toggle="modal" data-target="#viewlead_approval_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'">Action</button>';
                            display_action_approval ='<button type="button" class="btn btn-success">'+data[i].approval_status+'</button>';
                         }
                         if(data[i].approval_status =="Approved" && data[i].status_payment =="Pending" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else  if(data[i].approval_status =="Approved" && data[i].status_payment =="Paid" || data[i].status_payment =="Cancelled" ){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }

                         else  if(data[i].approval_status =="Approved" && data[i].status_payment !="Refunded" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }
                         if(data[i].amount_paid !=null){
                           tr += '<tr>'+
                                  '<td class="amount_paid">$ '+parseFloat(get_initial_payment.replace(",","")).toLocaleString("en")+'</td>'+
                                  '<td>'+convertDate(data[i].collection_date)+'</td>'+
                                  '<td class="status">'+data[i].collect_payment_status+'</td>'+
                                  '<td><span class="approval_status">'+data[i].approval_status+ '</span> - ' +(data[i].date_approve == null ? 'Not Yet': convertDate(data[i].date_approve))+ '</td>'+
                                  '<td><span class="payment_status">'+data[i].status_payment+ '</span> - ' +(data[i].date_paid == null ? 'Not Yet': convertDate(data[i].date_paid))+ '</td>'+
                                  '<td>'+data[i].payment_usercharge+'</td>'+
                                  '<td>'+data[i].payment_usertype+'</td>'+ 
                                  '<td><button type="button" class="btn btn-info view_lead_remark" data-toggle="modal" data-target="#viewlead_paymentremark_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'">View</button></td>'+
                                  '<td>'+display_action_approval+'</td>'+
                                  '<td>'+display_action_payment+'</td>'+
                               '</tr>'; 
                             }
                        else{
                           tr ='';
                        }
                         // 
                       }

                      $('#payleadmodal .view_all_lead').html(tr);
                      $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});

                      var get_last_amount = $('#payleadmodal .view_all_lead').find('.amount_paid:last').text();
                      $('#payleadmodal .view_all_lead').find('.amount_paid:last').text(get_last_amount);
                      $("#pay_lead_form input[name='initial_payment']").val(get_last_amount);


                          $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",", "");
                              var status = $(this).find('td.status').text();
                              var payment_status =  $(this).find('td span.payment_status').text();
                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       totalamount += parseFloat(amount_paid); 
                                   else{ 
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status == "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       total_refund += parseFloat(amount_paid); 
                                   else{ 
                                       total_refund=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount;
                        if(getstatus != "Refund Payment"){
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else if(getstatus== "Refund Payment"){
                           get_total_amount  = (get_price -  totalamount) + total_refund;
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        
                        else{
                             $("#payleadmodal #display_balance").css("display", "none");
                             $("#payleadmodal  #remain_balance").val("$ 0.00");
                        }
                        if ($('#payleadmodal #balance').text()== '$ 0.00'){
                             $("#payleadmodal input, .status").prop("disabled", true);
                      }
                        else{
                             $("#payleadmodal input:not(#pay_lead), .status").prop("disabled", false);
                        }

                       //colect payment status
                    if ($('#pay_lead_form #pay_lead').text() != 'Refund'){
                        if (get_payment_status =='Pending' || get_approval_status =='Pending') {
                                $("#pay_lead_form #pay_lead").prop("disabled", true);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", false);

                       }
                       else if (get_payment_status =='Pending' || get_approval_status =='Declined') {
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", true);

                       }
                       else if (get_payment_status =='Pending' || get_approval_status =='Approved') {
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", true);

                       }
                       else if (get_payment_status =='Sold' || get_payment_status =='Cancelled') {
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                                $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                       }
                    }


                  setTimeout(function(){
                               $('#viewlead_payment_modal').modal('toggle');
                      },3000);

              }
               else{
                  $("#update_approval_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_approval_lead_form .alert-danger").css("display", "block");
                  $("#update_approval_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_approval_lead_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

      // update Contract Form
      $(document).on('click','#update_contract_lead_form #update_lead_contract',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_lead_contract",
               dataType: 'json',
               data: $("#update_contract_lead_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_contract_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_contract_lead_form .alert-success").css("display", "block");
                  $("#update_contract_lead_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },3000);

              }
               else{
                  $("#update_contract_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_contract_lead_form .alert-danger").css("display", "block");
                  $("#update_contract_lead_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_contract_lead_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });
      // update Author Approval
      $(document).on('click','#update_approval_contract_form #update_approval_contract',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_authorsign_contract",
               dataType: 'json',
               data: $("#update_approval_contract_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_approval_contract_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_approval_contract_form .alert-success").css("display", "block");
                  $("#update_approval_contract_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },3000);

              }
               else{
                  $("#update_approval_contract_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_approval_contract_form .alert-danger").css("display", "block");
                  $("#update_approval_contract_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_approval_contract_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });


      $('#lead_form .status').on('change', function () {
             var dateToday = new Date(); 
             $("#lead_form input[name='initial_payment']").attr("readonly", false);
             $("#lead_form input[name='collection_date']").attr("readonly", false);
              if($(this).val() == "In Progress" || $(this).val() == "Assigned Low" ){

                  $(".hide_amount_paid, .hide_initialpayment").css("display", "block");
       
             }
             else if($(this).val() == "Assigned Mid" || $(this).val() == "Assigned High" ){

                  $(".hide_amount_paid, .hide_initialpayment").css("display", "block");
       
             }

             else if($(this).val() == "Full Payment"){
                  $(".hide_amount_paid").css("display", "block");
                  $(".hide_initialpayment").css("display", "none");
             }
             else{

                  $(".hide_amount_paid").css("display", "block");
                  $(".hide_initialpayment").css("display", "none");
             }
      });

          $("#lead_form input[name='email_address']").keyup(function(event) {
              text = $(this).val();
              $(".email_address").attr("href", "mailto:"+text);
          });
             $("#lead_form input[name='email_address']").focusout(function(){
               text = $(this).val();
               $(".email_address").attr("href", "mailto:"+text);
            });

           $("#contact_number").keyup(function(event) {
              text = $(this).val();
              $(".contact_number").attr("href", "tel:+"+text);
          });
             $('#contact_number').focusout(function(){
               text = $(this).val();
               $(".contact_number").attr("href", "tel:+"+text);
            });

      var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

      function convertDate(date_str) {
         var temp_date = date_str.split("-");
        return months[Number(temp_date[1]) - 1] + " " + temp_date[2].slice(0, 3).trim() +"," + temp_date[0];
      }
      // view material item
       $(document).on("click", ".view_leaddetail", function(e){
              e.preventDefault();
              var project_id= $(this).data('project_id');
              dataEdit = 'project_id='+ project_id;
                var getstatus = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var get_total_amount = 0;
                var totalamount = 0;
                var get_collection_date ="";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var get_collection_date = '';
                var isFirst = true;
                  $("#view_lead_form .datepicker").attr('readonly', 'readonly');
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead/'+ project_id,
                  dataType: 'json',
                  success:function(data){

                      for (var i = 0; i < data.length; i++) {
                         $(".view_lead_form input[name='brand_name']").val(data[i].brand_name);
                         $("#viewleadmodal .payment_status").text(data[i].payment_status + ')');
                         $(".view_lead_form input[name='product_name']").val(data[i].product_name);
                         $(".view_lead_form input[name='author_name']").val(data[i].author_name);
                         $(".view_lead_form input[name='title_name']").val(data[i].book_title);
                         $(".view_lead_form input[name='project_id']").val(data[i].project_id);
                         $(".view_lead_form input[name='status']").val(data[i].status);
                         $(".view_lead_form input[name='email_address']").val(data[i].email_address);
                         $(".view_lead_form input[name='contact_number']").val(data[i].contact_number);
                         $(".view_lead_form input[name='amount_paid']").val("$ " + parseFloat(data[i].price).toFixed(2));
                         $(".view_lead_form input [name='initial_payment']").val("$ " + parseFloat(data[i].initial_payment).toFixed(2));
                         // $(".view_lead_form input[name='collection_date']").val(data[i].collection_date);
                         $(".view_lead_form input[name='installment_term']").val(data[i].installment_term);
                         $(".view_lead_form .address").val(data[i].address);
                         $(".view_lead_form .remark").val(data[i].collection_remark);
                         $(".view_lead_form .address").text(data[i].address);
                         getstatus = data[i].status;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].date_commitment); 
                         get_table = data[i].status;
                           // tr += '<tr>'+
                           //        '<td class="amount_paid">$ '+parseFloat(data[i].amount_paid).toFixed(2)+'</td>'+
                           //        '<td>'+(data[i].date_collection !='0000-00-00 00:00:00' ? convertDate(data[i].date_collection) : convertDate(data[i].date_paid)) +'</td>'+
                           //        '<td>'+data[i].collection_status+'</td>'+
                           //        '<td>'+data[i].payment_status+'</td>'+
                           //        '<td>'+(data[i].date_paid == null ? "Not yet paid": convertDate(data[i].date_paid))+'</td>'+
                           //         '<td><button type="button" class="btn btn-info view_lead_remark" data-toggle="modal" data-target="#viewlead_remark_modal" data-backdrop="static" data-keyboard="false" data-collection_id="'+data[i].collection_id+'">View</button></td>'+
                           //     '</tr>'; 
                         }
                             $('#viewleadmodal .view_all_lead').html(tr);

                            // INITIALIZE DATEPICKER PLUGIN
                      $('.view_lead_form .datepicker').datepicker({
                          clearBtn: true,
                          format: "dd/mm/yyyy",
                          startDate: get_collection_date,
                      }).datepicker("setDate", get_collection_date).on('show', function() {
                          if ($(this).attr("disabled", 'disabled')) {
                              $(this).datepicker('hide')
                          }
                      });
                        $("#viewleadmodal .view_all_lead .amount_paid").each(function() {
                              var value = $(this).text().replace("$", "");
                              // add only if the value is number
                              if(!isNaN(value) && value.length != 0) {
                                   if(!isFirst)
                                      totalamount += parseFloat(value); 
                                  else
                                  {
                                      totalamount=parseFloat(value);
                                      isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount
                        $(".view_lead_form  #remain_balance").val("$ " + get_total_amount.toFixed(2));
                        if (get_collection_date !="0000-00-00 00:00:00"){

                            $("#viewleadmodal #display_balance").css("display", "block");
                            $("#viewleadmodal #balance").text("$ " + get_total_amount.toFixed(2));
                        }
                        else{
                           $("#viewleadmodal #display_balance").css("display", "none");
                        }

                       if(getstatus == "Partial Payment"){
                             $(".view_lead_form .hide_amount_paid, .view_lead_form .hide_initialpayment").css("display", "block");
                       }
                       else if(getstatus == "Full Payment" || getstatus == "In Progress" || getstatus == "Assigned Low"){
                            $(".view_lead_form .hide_amount_paid").css("display", "block");
                            $(".view_lead_form .hide_initialpayment").css("display", "none");
                       }
                       else if(getstatus == "Assigned High" || getstatus == "Assigned Mid"){
                            $(".view_lead_form .hide_amount_paid").css("display", "block");
                            $(".view_lead_form .hide_initialpayment").css("display", "none");
                       }
                       else{
                            $(".view_lead_form .hide_amount_paid").css("display", "block");
                            $(".view_lead_form .hide_initialpayment").css("display", "none");
                       }

                  }
            });

          });


      // view update lead form
       $(document).on("click", ".view_update_leaddetail", function(e){
              e.preventDefault();
                $('#update_lead_form')[0].reset();
             $("#update_lead_form .status option[value='In Progress']").removeAttr('selected').text('In Progress').change();
             $("#update_lead_form .status option[value='Assigned Low']").removeAttr('selected').text('Assigned Low').change();
             $("#update_lead_form .status option[value='Assigned Mid']").removeAttr('selected').text('Assigned Mid').change();
             $("#update_lead_form .status option[value='Assigned High']").removeAttr('selected').text('Assigned High').change();
             $("#update_lead_form .status option[value='Recycled']").removeAttr('selected').text('Recycled').change();
             $("#update_lead_form .status option[value='Dead']").removeAttr('selected').text('Dead').change();

              var project_id= $(this).data('project_id');
              dataEdit = 'project_id='+ project_id;
                var getstatus = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_date_commitment ="";
                var get_date_collection ="";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var get_total_amount = 0;
                var isFirst = true;
                var get_installment_term ='';

                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead/'+ project_id,
                  dataType: 'json',
                  success:function(res){
                      var data = res.get_data;
                      var count = res.number_of_row;
                      var usertype = res.usertype;
                      for (var i = 0; i < data.length; i++) {
                         $("#update_lead_form input[name='brand_name']").val(data[i].brand_name);
                         $("#update_lead_form input[name='product_name']").val(data[i].product_name);
                         $("#update_lead_form input[name='author_name']").val(data[i].author_name);
                         $("#update_lead_form input[name='title_name']").val(data[i].book_title);
                         $("#update_lead_form input[name='project_id']").val(data[i].project_id);
                         $("#update_lead_form input[name='area_code']").val(data[i].area_code);
                         $("#update_lead_form input[name='email_address']").val(data[i].email_address);
                         $("#update_lead_form input[name='contact_number']").val(data[i].contact_number);
                         $("#update_lead_form .call").attr("href", "callto:" + data[i].contact_number);
                         $("#update_lead_form input[name='amount_paid']").val("$ " + parseFloat(data[i].price.replace(",","")).toLocaleString("en")+'.00');
                         
                         //$("#update_lead_form .status option[value='"+data[i].collection_status+"']").removeAttr('selected').change();
                         $("#update_lead_form .status option[value='"+data[i].status+"']").attr('selected', 'selected').text(data[i].status).change();
                         //alert(data[i].status);

                         $("#update_lead_form .income_level option[value='"+data[i].income_level+"']").removeAttr('selected').change();
                         $("#update_lead_form .income_level option[value='"+data[i].income_level+"']").attr('selected', 'selected').text(data[i].income_level).change();

                         // $("#update_lead_form input[name='collection_date']").val(data[i].collection_date);
                         $("#update_lead_form .installment_term").val(data[i].installment_term);
                         $("#update_lead_form .address").val(data[i].address);
                         $("#update_lead_form .remark").val(data[i].remark);
                         getstatus = data[i].collection_status;
                         get_installment_term = data[i].installment_term;
                         get_date_commitment = new Date(data[i].date_commitment);


                       }
                      //$("#update_lead_form .status option[value='"+getstatus+"']").attr('selected', 'selected').text(getstatus).change();
                      $("#update_lead_form .installment_term option[value='"+get_installment_term+"']").attr('selected', 'selected').text(get_installment_term).change();
                      $("#pay_lead_form .status option[value='"+get_installment_term+"']").removeAttr('selected').change();

                      $("#update_lead_form .installment_term option:not(:selected)").removeAttr('selected');

                      // var count = $('#updateleadmodal .view_all_lead').children('tr').length;
                      // var get_last_date = $('#updateleadmodal .view_all_lead').find('.date_collection:last').text();
                      // var get_last_amount = $('#updateleadmodal .view_all_lead').find('.amount_paid:last').text();
                      // $("#update_lead_form input[name='initial_payment']").val(get_last_amount);

                      if(usertype != 'Admin'){
                           // $("#update_lead_form input[name='brand_name']").prop('readonly', true);
                           $("#update_lead_form input[name='product_name']").prop('readonly', false);
                           $("#update_lead_form input[name='author_name']").prop('readonly', true);
                           $("#update_lead_form input[name='title_name']").prop('readonly', true);
                           $("#update_lead_form input[name='email_address']").prop('readonly', true);
                           $("#update_lead_form input[name='contact_number']").prop('readonly', true);
                           $("#update_lead_form input[name='amount_paid']").prop('readonly', false);
                           $("#update_lead_form .installment_term").prop('readonly', true);
                       }
                     else{
                           // $("#update_lead_form input[name='brand_name']").prop('readonly', false);
                           $("#update_lead_form input[name='product_name']").prop('readonly', false);
                           $("#update_lead_form input[name='author_name']").prop('readonly', false);
                           $("#update_lead_form input[name='title_name']").prop('readonly', false);
                           $("#update_lead_form input[name='email_address']").prop('readonly', false);
                           $("#update_lead_form input[name='contact_number']").prop('readonly', false);
                           $("#update_lead_form input[name='amount_paid']").prop('readonly', false);
                          $("#update_lead_form .installment_term").prop('readonly', false);

                     }
                          $('#update_lead_form .datepicker').datepicker({
                            clearBtn: true,
                            format: "dd/mm/yyyy",
                            startDate: '01/01/2020',
                          }).datepicker("setDate", get_date_commitment);
                          // alert(get_date_commitment);

                }
            });

          });

      // view Pay lead form
       $(document).on("click", ".view_pay_leaddetail", function(e){
              e.preventDefault();
               var project_id= $(this).data('project_id');
               $('#pay_lead_form .view_approval_history').attr('data-project_id', project_id);
               $('#pay_lead_form .view_confirmpayment_history').attr('data-project_id', project_id);

               dataEdit = 'project_id='+ project_id;
               $("#pay_lead_form .hide_amount_paid, #pay_lead_form .hide_initialpayment").css("display", "block");

                var getstatus = "";
                var get_collect_status = "";
                var get_payment_status = "";
                var get_approve_status = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_collection_date = "";
                var get_date_collection = "";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var total_refund = 0;
                var get_total_amount = 0;
                var isFirst = true; 
                var get_installment_term = '';
                var display_action_payment='';
                var display_action_approval='';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead/'+ project_id,
                  dataType: 'json',
                  success:function(res){
                      var data = res.get_payment_data;
                      var count = res.number_of_row;
                      var usertype = res.usertype;
                      var user_id = res.user_id;

                      for (var i = 0; i < data.length; i++) {
                         $("#pay_lead_form input[name='brand_name']").val(data[i].brand_name);
                         $("#pay_lead_form input[name='product_name']").val(data[i].product_name);
                         $("#pay_lead_form input[name='author_name']").val(data[i].author_name);
                         $("#pay_lead_form input[name='title_name']").val(data[i].book_title);
                         $("#pay_lead_form input[name='project_id']").val(data[0].project_id);
                         $("#pay_lead_form input[name='collection_id']").val(data[0].collection_id);
                         $("#pay_lead_form input[name='status_payment]").val(data[i].status_payment);
                         $("#pay_lead_form input[name='email_address']").val(data[i].email_address);
                         $("#pay_lead_form input[name='contact_number']").val(data[i].contact_number);
                         $("#pay_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#update_approval_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#pay_lead_form input[name='approved_status']").val(data[i].approval_status);

                         $("#pay_lead_form input[name='previous_amount']").val(data[i].initial_payment);
                         $("#pay_lead_form input[name='previous_collect_status']").val(data[i].collect_payment_status);
                         $("#pay_lead_form input[name='previous_collect_date']").val(data[i].collection_date);
                         $("#pay_lead_form input[name='amount_paid']").val("$ " + parseFloat(data[i].price.replace(",","")).toLocaleString("en")+'.00');
                         $("#pay_lead_form .status option[value='"+data[i].payment_status+"']").removeAttr('selected').change();
                         // $("#pay_lead_form input[name='initial_payment']").val("$ " + parseFloat(data[i].initial_payment).toFixed(2));
                          $("#pay_lead_form .installment_term option:not(:selected)").removeAttr('selected');
                         // $("#pay_lead_form .status option:selected").val(data[i].status);
                         // $("#pay_lead_form .installment_term").val(data[i].installment_term);
                         $("#pay_lead_form .address").val(data[i].address);
                         $("#pay_lead_form .remark").val(data[i].payment_remark);
                         get_collect_status = data[i].collect_payment_status;
                         get_payment_status = data[i].status_payment;
                         get_approval_status = data[i].approval_status;
                         getstatus = data[i].collect_payment_status;
                         get_installment_term = data[i].installment_term;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].collection_date);
                         get_date_collection = data[i].collection_date;
                         if(data[i].collect_payment_status =="Refund Payment" && data[i].user_refund == user_id){
                            display_action_approval ='<button type="button" disabled class="btn btn-secondary">'+data[i].approval_status+'</button>';
                         }
                         else if(data[i].approval_status =="Pending" || data[i].approval_status == null){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">Action</button>';
                            display_action_approval ='<button type="button" class="btn btn-danger view_lead_approval" data-toggle="modal" data-target="#viewlead_approval_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                            display_action_approval ='<button type="button" disabled class="btn btn-success">'+data[i].approval_status+'</button>';
                         }
                         if(data[i].approval_status =="Approved" && data[i].status_payment =="Pending" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else  if(data[i].approval_status =="Approved" && data[i].status_payment =="Paid" || data[i].status_payment =="Cancelled" ){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }

                         else  if(data[i].approval_status =="Approved" && data[i].status_payment !="Refunded" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }
                         if(data[i].amount_paid !=null){
                           tr += '<tr>'+
                                  '<td class="amount_paid">$ '+parseFloat(get_initial_payment.replace(",","")).toLocaleString('en')+'</td>'+
                                  '<td>'+convertDate(data[i].collection_date)+'</td>'+
                                  '<td class="status">'+data[i].collect_payment_status+'</td>'+ 
                                  '<td><span class="approval_status">'+data[i].approval_status+ '</span> - ' +(data[i].date_approve == null ? 'Not Yet': convertDate(data[i].date_approve))+ '</td>'+
                                  '<td><span class="payment_status">'+data[i].status_payment+ '</span> - ' +(data[i].date_paid == null ? 'Not Yet': convertDate(data[i].date_paid))+ '</td>'+
                                  '<td>'+data[i].payment_usercharge+'</td>'+
                                  '<td>'+data[i].payment_usertype+'</td>'+ 
                                  '<td><button type="button" class="btn btn-info view_payment_remark" data-toggle="modal" data-target="#viewlead_paymentremark_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'">View</button></td>'+
                                  '<td class="show_approval">'+display_action_approval+'</td>'+
                                  '<td class="show_payment">'+display_action_payment+'</td>'+
                               '</tr>'; 
                             }
                        else{
                           tr ='';
                        }
                         // 
                       }

                      // $("#pay_lead_form .status option[value='"+getstatus+"']").attr('selected', 'selected').text(getstatus).change();
                         $("#pay_lead_form .installment_term option[value='"+get_installment_term+"']").attr('selected', 'selected').text(get_installment_term).change();

                      $('#payleadmodal .view_all_lead').html(tr);

                      if(usertype == 'Agent'){
                        $(".view_all_lead td.show_approval").hide();
                        $(".view_all_lead td.show_payment").hide();
                        $('#collectionagentdataTable').DataTable({"sPaginationType": "listbox"});

                      }
                      else if(usertype == 'Finance'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();
                      $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});

                      }
                      else if(usertype == 'Admin'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();
                       $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});


                      }

                      var get_last_amount = $('#payleadmodal .view_all_lead').find('.amount_paid:last').text();
                      var get_last_approval = $('#payleadmodal .view_all_lead').find('.approval_status:last').text();
                      $('#payleadmodal .view_all_lead').find('.amount_paid:last').text(get_last_amount);
                      $("#pay_lead_form input[name='initial_payment']").val(get_last_amount);
                      if (typeof(get_payment_status) == 'undefined' || get_payment_status == null){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                      else if (get_payment_status != 'Pending' && get_approval_status !='Pending'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                       else if (get_last_approval == 'Declined'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }

                      else{
                          $("#pay_lead_form #update_pay_lead").prop("disabled", false);

                      }

                      $('#pay_lead_form .datepicker').datepicker({
                                    clearBtn: true,
                                    format: "dd/mm/yyyy",
                                    startDate: '01/01/2020',
                               }).datepicker("setDate", (get_date_collection == null ? new Date() : get_date_collection));
                        $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",", "");
                              var status = $(this).find('td.status').text();
                              var payment_status =  $(this).find('td span.payment_status').text();
                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       totalamount += parseFloat(amount_paid); 
                                   else{ 
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status == "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       total_refund += parseFloat(amount_paid); 
                                   else{ 
                                       total_refund=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount;

                        if(getstatus != "Refund Payment"){
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else if(getstatus== "Refund Payment"){
                           get_total_amount  = (get_price -  totalamount) + total_refund;
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else{
                             $("#payleadmodal #display_balance").css("display", "none");
                             $("#payleadmodal  #remain_balance").val("$ 0.00");
                        }
                         $("#pay_lead_form input[name='get_previous_balance']").val(get_total_amount);

                        if (get_collect_status == null){
                          $('#pay_lead_form .status').html('<option value="" selected="selected">Please Select a Payment</option>'+
                                                           '<option value="Partial Payment">Partial Payment</option>'+
                                                           '<option value="Full Payment">Full Payment</option>'
                                                            );
                          $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                          $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                          $("#pay_lead_form .installment_term").attr("disabled", false);


                        }
                        else if(get_collect_status == "Partial Payment" && get_payment_status == "Pending"){
                            $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                             '<option value="Full Payment">Full Payment</option>'
                                                          );
                             $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false);

                       } 
                        else if(get_collect_status == "Partial Payment" && get_payment_status == "Paid" && usertype != 'Agent'){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                            '<option value="Full Payment">Full Payment</option>'+
                                                            '<option value="Refund Payment">Refund Payment</option>'
                                                            );
                             $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false);



                       }
                       else if(get_collect_status == "Partial Payment"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                            '<option value="Full Payment">Full Payment</option>'
                                                            );
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false );

                       } 
                       else if(get_collect_status == "Full Payment" && get_payment_status == "Pending"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" >Partial Payment</option>'+
                                                            '<option value="Full Payment" selected="selected">Full Payment</option>'
                                                            ); 
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Full Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);

                       } 
                       else if(get_collect_status == "Full Payment" && get_payment_status == "Sold"){
                           $('#pay_lead_form .status').html('<option value="Full Payment" selected="selected">Full Payment</option>'
                                                            );
                           $('#pay_lead_form .datepicker').datepicker({
                             clearBtn: true,
                             format: "dd/mm/yyyy",
                             }).datepicker("setDate", get_date_collection).datepicker('destroy').attr('disabled', 'disabled');
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                           $('#pay_lead_form #pay_lead').prop('disabled', false);
                           $("#pay_lead_form .change_status").text('Full Payment');
                           $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);

                       } 
                       if (get_last_approval =='Declined'){
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                       }
                       else if (get_payment_status =='Pending' || get_approval_status =='Pending'){
                                $("#pay_lead_form #pay_lead").prop("disabled", true);
                       }
                       else if (get_payment_status =='Refunded'){
                                $("#pay_lead_form #pay_lead").prop("disabled", true);
                       }
                       else{
                              $("#pay_lead_form #pay_lead").prop("disabled", false  );

                       }

                }
            });

          });


            // view Pay lead form disabled view only
       $(document).on("click", ".view_pay_leaddetail1", function(e){
              e.preventDefault();
               var project_id= $(this).data('project_id');
               $('#pay_lead_form .view_approval_history').attr('data-project_id', project_id);
               $('#pay_lead_form .view_confirmpayment_history').attr('data-project_id', project_id);

               dataEdit = 'project_id='+ project_id;
               $("#pay_lead_form .hide_amount_paid, #pay_lead_form .hide_initialpayment").css("display", "block");

                var getstatus = "";
                var get_collect_status = "";
                var get_payment_status = "";
                var get_approve_status = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_collection_date = "";
                var get_date_collection = "";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var total_refund = 0;
                var get_total_amount = 0;
                var isFirst = true; 
                var get_installment_term = '';
                var display_action_payment='';
                var display_action_approval='';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead/'+ project_id,
                  dataType: 'json',
                  success:function(res){
                      var data = res.get_payment_data;
                      var count = res.number_of_row;
                      var usertype = res.usertype;
                      var user_id = res.user_id;

                      for (var i = 0; i < data.length; i++) {
                         $("#pay_lead_form input[name='brand_name']").val(data[i].brand_name);
                         $("#pay_lead_form input[name='product_name']").val(data[i].product_name);
                         $("#pay_lead_form input[name='author_name']").val(data[i].author_name);
                         $("#pay_lead_form input[name='title_name']").val(data[i].book_title);
                         $("#pay_lead_form input[name='project_id']").val(data[0].project_id);
                         $("#pay_lead_form input[name='collection_id']").val(data[0].collection_id);
                         $("#pay_lead_form input[name='status_payment]").val(data[i].status_payment);
                         $("#pay_lead_form input[name='email_address']").val(data[i].email_address);
                         $("#pay_lead_form input[name='contact_number']").val(data[i].contact_number);
                         $("#pay_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#update_approval_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#pay_lead_form input[name='approved_status']").val(data[i].approval_status);

                         $("#pay_lead_form input[name='previous_amount']").val(data[i].initial_payment);
                         $("#pay_lead_form input[name='previous_collect_status']").val(data[i].collect_payment_status);
                         $("#pay_lead_form input[name='previous_collect_date']").val(data[i].collection_date);
                         $("#pay_lead_form input[name='amount_paid']").val("$ " + parseFloat(data[i].price.replace(",","")).toLocaleString("en")+'.00');
                         $("#pay_lead_form .status option[value='"+data[i].payment_status+"']").removeAttr('selected').change();
                         // $("#pay_lead_form input[name='initial_payment']").val("$ " + parseFloat(data[i].initial_payment).toFixed(2));
                          $("#pay_lead_form .installment_term option:not(:selected)").removeAttr('selected');
                         // $("#pay_lead_form .status option:selected").val(data[i].status);
                         // $("#pay_lead_form .installment_term").val(data[i].installment_term);
                         $("#pay_lead_form .address").val(data[i].address);
                         $("#pay_lead_form .remark").val(data[i].payment_remark);
                         get_collect_status = data[i].collect_payment_status;
                         get_payment_status = data[i].status_payment;
                         get_approval_status = data[i].approval_status;
                         getstatus = data[i].collect_payment_status;
                         get_installment_term = data[i].installment_term;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].collection_date);
                         get_date_collection = data[i].collection_date;
                         if(data[i].collect_payment_status =="Refund Payment" && data[i].user_refund == user_id){
                            display_action_approval ='<button type="button" disabled class="btn btn-secondary">'+data[i].approval_status+'</button>';
                         }
                         else if(data[i].approval_status =="Pending" || data[i].approval_status == null){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">Action</button>';
                            display_action_approval ='<button type="button" class="btn btn-danger view_lead_approval" data-toggle="modal" data-target="#viewlead_approval_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                            display_action_approval ='<button type="button" disabled class="btn btn-success">'+data[i].approval_status+'</button>';
                         }
                         if(data[i].approval_status =="Approved" && data[i].status_payment =="Pending" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else  if(data[i].approval_status =="Approved" && data[i].status_payment =="Paid" || data[i].status_payment =="Cancelled" ){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }

                         else  if(data[i].approval_status =="Approved" && data[i].status_payment !="Refunded" ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }
                         if(data[i].amount_paid !=null){
                           tr += '<tr>'+
                                  '<td class="amount_paid">$ '+parseFloat(get_initial_payment.replace(",","")).toLocaleString('en')+'</td>'+
                                  '<td>'+convertDate(data[i].collection_date)+'</td>'+
                                  '<td class="status">'+data[i].collect_payment_status+'</td>'+ 
                                  '<td><span class="approval_status">'+data[i].approval_status+ '</span> - ' +(data[i].date_approve == null ? 'Not Yet': convertDate(data[i].date_approve))+ '</td>'+
                                  '<td><span class="payment_status">'+data[i].status_payment+ '</span> - ' +(data[i].date_paid == null ? 'Not Yet': convertDate(data[i].date_paid))+ '</td>'+
                                  '<td>'+data[i].payment_usercharge+'</td>'+
                                  '<td>'+data[i].payment_usertype+'</td>'+ 
                                  '<td><button type="button" class="btn btn-info view_payment_remark" data-toggle="modal" data-target="#viewlead_paymentremark_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'">View</button></td>'+
                                  '<td class="show_approval">'+display_action_approval+'</td>'+
                                  '<td class="show_payment">'+display_action_payment+'</td>'+
                               '</tr>'; 
                             }
                        else{
                           tr ='';
                        }
                         // 
                       }

                      // $("#pay_lead_form .status option[value='"+getstatus+"']").attr('selected', 'selected').text(getstatus).change();
                         $("#pay_lead_form .installment_term option[value='"+get_installment_term+"']").attr('selected', 'selected').text(get_installment_term).change();

                      $('#payleadmodal .view_all_lead').html(tr);

                      if(usertype == 'Agent'){
                        $(".view_all_lead td.show_approval").hide();
                        $(".view_all_lead td.show_payment").hide();
                        $('#collectionagentdataTable').DataTable({"sPaginationType": "listbox"});

                      }
                      else if(usertype == 'Finance'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();
                      $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});

                      }
                      else if(usertype == 'Admin'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();
                       $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});


                      }

                      var get_last_amount = $('#payleadmodal .view_all_lead').find('.amount_paid:last').text();
                      var get_last_approval = $('#payleadmodal .view_all_lead').find('.approval_status:last').text();
                      $('#payleadmodal .view_all_lead').find('.amount_paid:last').text(get_last_amount);
                      $("#pay_lead_form input[name='initial_payment']").val(get_last_amount);
                      if (typeof(get_payment_status) == 'undefined' || get_payment_status == null){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                      else if (get_payment_status != 'Pending' && get_approval_status !='Pending'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                       else if (get_last_approval == 'Declined'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }

                      else{
                          $("#pay_lead_form #update_pay_lead").prop("disabled", false);

                      }

                      $('#pay_lead_form .datepicker').datepicker({
                                    clearBtn: true,
                                    format: "dd/mm/yyyy",
                                    startDate: '01/01/2020',
                               }).datepicker("setDate", (get_date_collection == null ? new Date() : get_date_collection));
                        $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",", "");
                              var status = $(this).find('td.status').text();
                              var payment_status =  $(this).find('td span.payment_status').text();
                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       totalamount += parseFloat(amount_paid); 
                                   else{ 
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status == "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       total_refund += parseFloat(amount_paid); 
                                   else{ 
                                       total_refund=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount;

                        if(getstatus != "Refund Payment"){
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else if(getstatus== "Refund Payment"){
                           get_total_amount  = (get_price -  totalamount) + total_refund;
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else{
                             $("#payleadmodal #display_balance").css("display", "none");
                             $("#payleadmodal  #remain_balance").val("$ 0.00");
                        }
                         $("#pay_lead_form input[name='get_previous_balance']").val(get_total_amount);

                        if (get_collect_status == null){
                          $('#pay_lead_form .status').html('<option value="" selected="selected">Please Select a Payment</option>'+
                                                           '<option value="Partial Payment">Partial Payment</option>'+
                                                           '<option value="Full Payment">Full Payment</option>'
                                                            );
                          $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                          $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                          $("#pay_lead_form .installment_term").attr("disabled", false);


                        }
                        else if(get_collect_status == "Partial Payment" && get_payment_status == "Pending"){
                            $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                             '<option value="Full Payment">Full Payment</option>'
                                                          );
                             $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false);

                       } 
                        else if(get_collect_status == "Partial Payment" && get_payment_status == "Paid" && usertype != 'Agent'){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                            '<option value="Full Payment">Full Payment</option>'+
                                                            '<option value="Refund Payment">Refund Payment</option>'
                                                            );
                             $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false);



                       }
                       else if(get_collect_status == "Partial Payment"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                            '<option value="Full Payment">Full Payment</option>'
                                                            );
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false );

                       } 
                       else if(get_collect_status == "Full Payment" && get_payment_status == "Pending"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" >Partial Payment</option>'+
                                                            '<option value="Full Payment" selected="selected">Full Payment</option>'
                                                            ); 
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', false);
                             $("#pay_lead_form .change_status").text('Full Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);

                       } 
                       else if(get_collect_status == "Full Payment" && get_payment_status == "Sold"){
                           $('#pay_lead_form .status').html('<option value="Full Payment" selected="selected">Full Payment</option>'
                                                            );
                           $('#pay_lead_form .datepicker').datepicker({
                             clearBtn: true,
                             format: "dd/mm/yyyy",
                             }).datepicker("setDate", get_date_collection).datepicker('destroy').attr('disabled', 'disabled');
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                           $('#pay_lead_form #pay_lead').prop('disabled', false);
                           $("#pay_lead_form .change_status").text('Full Payment');
                           $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);

                       } 
                       if (get_last_approval =='Declined'){
                                $("#pay_lead_form #pay_lead").prop("disabled", false);
                       }
                       else if (get_payment_status =='Pending' || get_approval_status =='Pending'){
                                $("#pay_lead_form #pay_lead").prop("disabled", true);
                       }
                       else if (get_payment_status =='Refunded'){
                                $("#pay_lead_form #pay_lead").prop("disabled", true);
                       }
                       else{
                              $("#pay_lead_form #pay_lead").prop("disabled", false  );

                       }

                }
            });

          });

      // view Pay lead form
       $(document).on("click", ".monitor_pay_leaddetail", function(e){
              e.preventDefault();

               var project_id= $(this).data('project_id');
               dataEdit = 'project_id='+ project_id;
               $("#pay_lead_form .hide_amount_paid, #pay_lead_form .hide_initialpayment").css("display", "block");

                var getstatus = "";
                var get_collect_status = "";
                var get_payment_status = "";
                var get_approve_status = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_collection_date = "";
                var get_date_collection = "";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var total_refund = 0;
                var get_total_amount = 0;
                var isFirst = true; 
                var get_installment_term = '';
                var display_action_payment='';
                var display_action_approval='';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead/'+ project_id,
                  dataType: 'json',
                  success:function(res){
                      var data = res.get_payment_data;
                      var count = res.number_of_row;
                      var usertype = res.usertype;

                      for (var i = 0; i < data.length; i++) {
                         $("#pay_lead_form input[name='brand_name']").val(data[i].brand_name);
                         $("#pay_lead_form input[name='product_name']").val(data[i].product_name);
                         $("#pay_lead_form input[name='author_name']").val(data[i].author_name);
                         $("#pay_lead_form input[name='title_name']").val(data[i].book_title);
                         $("#pay_lead_form input[name='project_id']").val(data[0].project_id);
                         $("#pay_lead_form input[name='collection_id']").val(data[0].collection_id);
                         $("#pay_lead_form input[name='status_payment']").val(data[i].status_payment);
                         $("#pay_lead_form input[name='status']").val(data[i].collect_payment_status);
                         $("#pay_lead_form input[name='email_address']").val(data[i].email_address);
                         $("#pay_lead_form input[name='contact_number']").val(data[i].contact_number);
                         $("#pay_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#update_approval_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#pay_lead_form input[name='approved_status']").val(data[i].approval_status);

                         $("#pay_lead_form input[name='previous_amount']").val(data[i].initial_payment);
                         $("#pay_lead_form input[name='previous_collect_status']").val(data[i].collect_payment_status);
                         $("#pay_lead_form input[name='previous_collect_date']").val(data[i].collection_date);
                         $("#pay_lead_form input[name='amount_paid']").val("$ " + parseFloat(data[i].price.replace(",","")).toLocaleString("en")+'.00');
                         $("#pay_lead_form .status option[value='"+data[i].payment_status+"']").removeAttr('selected').change();
                         // $("#pay_lead_form input[name='initial_payment']").val("$ " + parseFloat(data[i].initial_payment).toFixed(2));
                          $("#pay_lead_form .installment_term option:not(:selected)").removeAttr('selected');
                         // $("#pay_lead_form .status option:selected").val(data[i].status);
                         // $("#pay_lead_form .installment_term").val(data[i].installment_term);
                         $("#pay_lead_form .address").val(data[i].address);
                         $("#pay_lead_form .remark").val(data[i].payment_remark);
                         get_collect_status = data[i].collect_payment_status;
                         get_payment_status = data[i].status_payment;
                         get_approval_status = data[i].approval_status;
                         getstatus = data[i].collect_payment_status;
                         get_installment_term = data[i].installment_term;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].collection_date);
                         get_date_collection = data[i].collection_date;


                         if(data[i].amount_paid !=null){
                           tr += '<tr>'+
                                  '<td class="amount_paid">$ '+parseFloat(get_initial_payment.replace(",","")).toLocaleString('en')+'</td>'+
                                  '<td>'+convertDate(data[i].collection_date)+'</td>'+
                                  '<td class="status">'+data[i].collect_payment_status+'</td>'+ 
                                  '<td><span class="approval_status">'+data[i].approval_status+ '</span> - ' +(data[i].date_approve == null ? 'Not Yet': convertDate(data[i].date_approve))+ '</td>'+
                                  '<td><span class="payment_status">'+data[i].status_payment+ '</span> - ' +(data[i].date_paid == null ? 'Not Yet': convertDate(data[i].date_paid))+ '</td>'+
                                  '<td><button type="button" class="btn btn-info view_payment_remark" data-toggle="modal" data-target="#viewlead_paymentremark_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'">View</button></td>'+
                               '</tr>'; 
                             }
                        else{
                           tr ='';
                        }
                         // 
                       }

                      // $("#pay_lead_form .status option[value='"+getstatus+"']").attr('selected', 'selected').text(getstatus).change();
                         $("#pay_lead_form .installment_term option[value='"+get_installment_term+"']").attr('selected', 'selected').text(get_installment_term).change();

                      $('#payleadmodal .view_all_lead').html(tr);
                      $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});

                      if(usertype == 'Agent'){
                        $(".view_all_lead td.show_approval").hide();
                        $(".view_all_lead td.show_payment").hide();

                      }
                      else if(usertype == 'Finance'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();

                      }
                      else if(usertype == 'Admin'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();

                      }

                      var get_last_amount = $('#payleadmodal .view_all_lead').find('.amount_paid:last').text();
                      var get_last_approval = $('#payleadmodal .view_all_lead').find('.approval_status:last').text();
                      $('#payleadmodal .view_all_lead').find('.amount_paid:last').text(get_last_amount);
                      $("#pay_lead_form input[name='initial_payment']").val(get_last_amount);
                      if (typeof(get_payment_status) == 'undefined' || get_payment_status == null){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                      else if (get_payment_status != 'Pending' && get_approval_status !='Pending'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                       else if (get_last_approval == 'Declined'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }

                      else{
                          $("#pay_lead_form #update_pay_lead").prop("disabled", false);

                      }

                      $('#pay_lead_form .datepicker').datepicker({
                                    clearBtn: true,
                                    format: "dd/mm/yyyy",
                                    startDate: '01/01/2020',
                               }).datepicker("setDate", (get_date_collection == null ? new Date() : get_date_collection));
                        $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",", "");
                              var status = $(this).find('td.status').text();
                              var payment_status =  $(this).find('td span.payment_status').text();
                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       totalamount += parseFloat(amount_paid); 
                                   else{ 
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status == "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       total_refund += parseFloat(amount_paid); 
                                   else{ 
                                       total_refund=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount;

                        if(getstatus != "Refund Payment"){
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else if(getstatus== "Refund Payment"){
                           get_total_amount  = (get_price -  totalamount) + total_refund;
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else{
                             $("#payleadmodal #display_balance").css("display", "none");
                             $("#payleadmodal  #remain_balance").val("$ 0.00");
                        }
                         $("#pay_lead_form input[name='get_previous_balance']").val(get_total_amount);

            

                }
            });

          });




      // view Pay lead form Finance 
       $(document).on("click", ".view_pay_leaddetail_finance", function(e){
              e.preventDefault();
               var project_id= $(this).data('project_id');
              $('#pay_lead_form .view_approval_history').attr('data-project_id', project_id);
               $('#pay_lead_form .view_confirmpayment_history').attr('data-project_id', project_id);
               dataEdit = 'project_id='+ project_id;
               $("#pay_lead_form .hide_amount_paid, #pay_lead_form .hide_initialpayment").css("display", "block");

                var getstatus = "";
                var get_collect_status = "";
                var get_payment_status = "";
                var get_approve_status = "";
                var remain_balance = "";
                var get_price = 0;
                var get_initial_payment = 0;
                var totalamount = 0;
                var get_collection_date = "";
                var get_date_collection = "";
                var get_table = "";
                var tr ="";
                var get_data = 0;
                var totalamount = 0;
                var total_refund = 0;
                var get_total_amount = 0;
                var isFirst = true; 
                var get_installment_term = '';
                var display_action_payment='';
                var display_action_approval='';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead/'+ project_id,
                  dataType: 'json',
                  success:function(res){
                      var data = res.get_payment_data;
                      var count = res.number_of_row;
                      var usertype = res.usertype;
                      var user_id = res.user_id;

                      for (var i = 0; i < data.length; i++) {
                         $("#pay_lead_form input[name='brand_name']").val(data[i].brand_name);
                         $("#pay_lead_form input[name='product_name']").val(data[i].product_name);
                         $("#pay_lead_form input[name='author_name']").val(data[i].author_name);
                         $("#pay_lead_form input[name='title_name']").val(data[i].book_title);
                         $("#pay_lead_form input[name='project_id']").val(data[0].project_id);
                         $("#pay_lead_form input[name='collection_id']").val(data[0].collection_id);
                         $("#pay_lead_form input[name='status_payment]").val(data[i].status_payment);
                         $("#pay_lead_form input[name='email_address']").val(data[i].email_address);
                         $("#pay_lead_form input[name='contact_number']").val(data[i].contact_number);
                         $("#pay_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#update_approval_lead_form input[name='payment_id']").val(data[i].payment_id);
                         $("#pay_lead_form input[name='approved_status']").val(data[i].approval_status);

                         $("#pay_lead_form input[name='previous_amount']").val(data[i].initial_payment);
                         $("#pay_lead_form input[name='previous_collect_status']").val(data[i].collect_payment_status);
                         $("#pay_lead_form input[name='previous_collect_date']").val(data[i].collection_date);
                         $("#pay_lead_form input[name='amount_paid']").val("$ " + parseFloat(data[i].price.replace(",","")).toLocaleString("en"));
                         $("#pay_lead_form .status option[value='"+data[i].payment_status+"']").removeAttr('selected').change();
                         // $("#pay_lead_form input[name='initial_payment']").val("$ " + parseFloat(data[i].initial_payment).toFixed(2));
                          $("#pay_lead_form .installment_term option:not(:selected)").removeAttr('selected');
                         // $("#pay_lead_form .status option:selected").val(data[i].status);
                         // $("#pay_lead_form .installment_term").val(data[i].installment_term);
                         $("#pay_lead_form .address").val(data[i].address);
                         $("#pay_lead_form .remark").val(data[i].payment_remark);
                         get_collect_status = data[i].collect_payment_status;
                         get_payment_status = data[i].status_payment;
                         get_approval_status = data[i].approval_status;
                         getstatus = data[i].collect_payment_status;
                         get_installment_term = data[i].installment_term;
                         get_price = parseFloat(data[i].price.replace(",",""));
                         get_initial_payment = data[i].initial_payment;
                         get_collection_date = new Date(data[i].collection_date);
                         get_date_collection = data[i].collection_date;
              
                         if(data[i].collect_payment_status =="Refund Payment" && data[i].user_refund == user_id){
                            display_action_approval ='<button type="button" disabled class="btn btn-secondary">'+data[i].approval_status+'</button>';
                         }
                         else if(data[i].approval_status =="Pending" || data[i].approval_status == null){
                            display_action_payment = '<button type="button" disabled class="btn btn-success">Action</button>';
                            display_action_approval ='<button type="button" class="btn btn-danger view_lead_approval" data-toggle="modal" data-target="#viewlead_approval_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                            display_action_approval ='<button type="button" disabled class="btn btn-success">'+data[i].approval_status+'</button>';
                         }
                         if(data[i].collect_payment_status =="Refund Payment" && data[i].user_refund == user_id){
                            display_action_payment ='<button type="button" disabled class="btn btn-secondary">'+data[i].status_payment+'</button>';
                         }
                         else if(data[i].approval_status =="Approved" && data[i].status_payment =="Pending" && data[i].date_paid == null ){
                            display_action_payment = '<button type="button" class="btn btn-danger view_lead_payment" data-toggle="modal" data-target="#viewlead_payment_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'" data-project_id="'+data[i].project_id+'" data-date_collection="'+get_date_collection+'">Action</button>';
                         }
                         else{
                            display_action_payment = '<button type="button" disabled class="btn btn-success">'+data[i].status_payment+'</button>';
                         }

                         if(data[i].amount_paid !=null){
                           tr += '<tr>'+
                                  '<td class="amount_paid">$ '+parseFloat(get_initial_payment.replace(",","")).toLocaleString('en')+'</td>'+
                                  '<td>'+convertDate(data[i].collection_date)+'</td>'+
                                  '<td class="status">'+data[i].collect_payment_status+'</td>'+ 
                                  '<td><span class="approval_status">'+data[i].approval_status+ '</span> - ' +(data[i].date_approve == null ? 'Not Yet': convertDate(data[i].date_approve))+ '</td>'+
                                  '<td><span class="payment_status">'+data[i].status_payment+ '</span> - <span class="payment_date">' +(data[i].date_paid == null ? 'Not Yet': convertDate(data[i].date_paid))+ '</span></td>'+
                                  '<td>'+data[i].payment_usercharge+'</td>'+
                                  '<td>'+data[i].payment_usertype+'</td>'+
                                  '<td><button type="button" class="btn btn-info view_payment_remark" data-toggle="modal" data-target="#viewlead_paymentremark_modal" data-backdrop="static" data-keyboard="false" data-payment_id="'+data[i].payment_id+'">View</button></td>'+
                                  '<td class="show_approval">'+display_action_approval+'</td>'+
                                  '<td class="show_payment">'+display_action_payment+'</td>'+
                               '</tr>'; 
                             }
                        else{
                           tr ='';
                        }
                         // 
                       }

                      // $("#pay_lead_form .status option[value='"+getstatus+"']").attr('selected', 'selected').text(getstatus).change();
                       $("#pay_lead_form .installment_term option[value='"+get_installment_term+"']").attr('selected', 'selected').text(get_installment_term).change();

                       $('#payleadmodal .view_all_lead').html(tr);
                        $('#collectiondataTable').DataTable({"sPaginationType": "listbox"});


                      if(usertype == 'Agent'){
                        $(".view_all_lead td.show_approval").hide();
                        $(".view_all_lead td.show_payment").hide();

                      }
                      else if(usertype == 'Finance'){
                        $(".view_all_lead td.show_approval").show();
                        $(".view_all_lead td.show_payment").show();

                      }
                      var get_last_amount = $('#payleadmodal .view_all_lead').find('.amount_paid:last').text();
                      var get_last_approval = $('#payleadmodal .view_all_lead').find('.approval_status:last').text();

                      $('#payleadmodal .view_all_lead').find('.amount_paid:last').text(get_last_amount);
                      $("#pay_lead_form input[name='initial_payment']").val(get_last_amount);
                      if (typeof(get_payment_status) == 'undefined' || get_payment_status == null){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                      else if (get_payment_status != 'Pending' && get_approval_status !='Pending'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                      else if(get_last_approval == 'Declined'){
                          $("#pay_lead_form #update_pay_lead").prop("disabled", true);
                      }
                      else{
                          $("#pay_lead_form #update_pay_lead").prop("disabled", false);

                      }

                      $('#pay_lead_form .datepicker').datepicker({
                                    clearBtn: true,
                                    format: "dd/mm/yyyy",
                                    startDate: '01/01/2020',
                               }).datepicker("setDate", (get_date_collection == null ? new Date() : get_date_collection));
                        $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",", "");
                              var status = $(this).find('td.status').text();
                              var payment_status =  $(this).find('td span.payment_status').text();
                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       totalamount += parseFloat(amount_paid); 
                                   else{ 
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status == "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled"){
                                   if(!isFirst)
                                       total_refund += parseFloat(amount_paid); 
                                   else{ 
                                       total_refund=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }
                          });
                        get_total_amount  = get_price - totalamount;

                        if(getstatus != "Refund Payment"){
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else if(getstatus== "Refund Payment"){
                           get_total_amount  = (get_price -  totalamount) + total_refund;
                           $("#payleadmodal  #remain_balance").val("$ " + get_total_amount.toLocaleString()+'.00');

                            $("#payleadmodal #display_balance").css("display", "block");
                            $("#payleadmodal #balance").text("$ " + get_total_amount.toLocaleString()+'.00');

                        }
                        else{
                             $("#payleadmodal #display_balance").css("display", "none");
                             $("#payleadmodal  #remain_balance").val("$ 0.00");
                        }
                        if ($('#payleadmodal #balance').text()== '$ 0.00'){
                             $("#payleadmodal input, .status").prop("disabled", true);
                      }
                        else{
                             $("#payleadmodal input:not(#pay_lead), .status").prop("disabled", false);
                        }
                        if (get_collect_status == null){
                          $('#pay_lead_form .status').html('<option value="" selected="selected">Please Select a Payment</option>'+
                                                           '<option value="Partial Payment">Partial Payment</option>'+
                                                           '<option value="Full Payment">Full Payment</option>'
                                                            );
                          $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                          $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                          $("#pay_lead_form .installment_term").attr("disabled", false);


                        }
                        else if(get_collect_status == "Partial Payment" && get_payment_status == "Pending"){
                            $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                             '<option value="Full Payment">Full Payment</option>'
                                                          );
                             $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false);

                       } 
                        else if(get_collect_status == "Partial Payment" && get_payment_status == "Sold"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                            '<option value="Full Payment">Full Payment</option>'+
                                                            '<option value="Refund Payment">Refund Payment</option>'
                                                            );
                             $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false);

                       }
                       else if(get_collect_status == "Partial Payment"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" selected="selected">Partial Payment</option>'+
                                                            '<option value="Full Payment">Full Payment</option>'+
                                                            '<option value="Refund Payment">Refund Payment</option>'
                                                            );
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $('#pay_lead_form #pay_lead').prop('disabled', true);
                             $("#pay_lead_form .change_status").text('Partial Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                             $("#pay_lead_form .installment_term").attr("disabled", false );

                       } 
                       else if(get_collect_status == "Full Payment" && get_payment_status == "Pending"){
                           $('#pay_lead_form .status').html('<option value="Partial Payment" >Partial Payment</option>'+
                                                            '<option value="Full Payment" selected="selected">Full Payment</option>'+
                                                            '<option value="Refund Payment">Refund Payment</option>'
                                                            ); 
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                             $("#pay_lead_form .change_status").text('Full Payment');
                             $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);


                       } 
                       else if(get_collect_status == "Full Payment" && get_payment_status == "Sold"){
                           $('#pay_lead_form .status').html('<option value="Full Payment" selected="selected">Full Payment</option>'+
                                                            '<option value="Refund Payment">Refund Payment</option>'
                                                            );
                           $('#pay_lead_form .datepicker').datepicker({
                             clearBtn: true,
                             format: "dd/mm/yyyy",
                             }).datepicker("setDate", get_date_collection).datepicker('destroy').attr('disabled', 'disabled');
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                           $("#pay_lead_form .change_status").text('Full Payment');
                           $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);

                       } 
                       else if(get_collect_status == "Refund Payment" && get_payment_status == "Pending"){
                           $('#pay_lead_form .status').html('<option value="Full Payment">Full Payment</option>'+
                                                            '<option value="Refund Payment" selected="selected">Refund Payment</option>'
                                                            );
                           $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                           $("#pay_lead_form .change_status").text('Refund Payment');
                           $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                             $("#pay_lead_form .installment_term").attr("disabled", true);
                       } 

                      else if(get_collect_status == "Refund Payment" && get_payment_status == "Refunded"){
                                 $('#pay_lead_form .status').html('<option value="Refund Payment" selected="selected">Refund Payment</option>');
                                   $("#pay_lead_form .change_status").text('Refund Payment');
                                   $("#pay_lead_form .status option:not(:selected)").removeAttr('selected');
                                   $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                                   $("#pay_lead_form .installment_term").attr("disabled", true);

                                   $('#pay_lead_form .datepicker').datepicker({
                                   clearBtn: true,
                                   format: "dd/mm/yyyy",
                                   }).datepicker("setDate", get_date_collection).datepicker('destroy').attr('disabled', 'disabled');
                             } 

                       //colect payment status

                       // if (get_payment_status =='Pending' || get_approval_status =='Pending'){
                       //          $("#pay_lead_form #pay_lead").prop("disabled", true);

                       // }
                       // else{
                       //        $("#pay_lead_form #pay_lead").prop("disabled", false  );

                       // }

                }
            });

          });
      // view Lead_Approval
       $(document).on("click", ".view_lead_approval, .view_lead_payment, .view_contractual_lead, .view_contractualinvvestment_lead,  .view_author_contract", function(e){
              e.preventDefault();
              var total_refunded = 0;
               $("#update_approval_lead_form input[name='payment_id']").val($(this).data('payment_id'));
               $("#update_approval_lead_form input[name='project_id']").val($(this).data('project_id'));
               $("#update_payment_lead_form input[name='payment_id']").val($(this).data('payment_id'));
               $("#update_payment_lead_form input[name='project_id']").val($(this).data('project_id'));
               $("#update_contract_lead_form input[name='project_id']").val($(this).data('project_id'));
               $("#update_contract_lead_form input[name='project_id']").val($(this).data('project_id'));
               $("#update_approval_contract_form input[name='project_id']").val($(this).data('project_id'));
                var amount_paid = $(this).closest("tr").find(".amount_paid").text().replace("$", "").replace(",", "");   
                var collection_status = $(this).closest("tr").find(".status").text(); 
                var contract_approval = $(this).closest("tr").find(".contract_approval").text(); 
                $("#update_approval_contract_form input[name='contract_approval']").val(contract_approval);

                var remaining_balance = $("#payleadmodal #balance").text().replace("$", "").replace(",", "");  
                if(collection_status == "Refund Payment"){
                    total_refunded = parseFloat(remaining_balance) + parseFloat(amount_paid);
                    $("#update_payment_lead_form  .payment_status option[value='Pending']").remove(); 
                    $("#update_payment_lead_form  .payment_status option[value='Paid']").remove(); 
                    $("#update_payment_lead_form input[name='get_previous_balance']").val(total_refunded);
                }
                else{
                    total_refunded = parseFloat(remaining_balance) - parseFloat(amount_paid);
                    $("#update_payment_lead_form  .payment_status option[value='Refunded']").remove(); 
                    $("#update_payment_lead_form input[name='get_previous_balance']").val(total_refunded);

                }

          });
       // $(document).on("click", "#payleadmodal .close, #payleadmodal #close",  function(e){
       //  $("#pay_lead_form").load(location.href + " #pay_lead_form");

       // });


      //process paymennt
          // $("#update_payment_lead_form  .payment_status").change(function(){
          //   alert('tr');     
          // });
        // CHANGE Status paid lead form
          $("#pay_lead_form  .status").change(function(){
                $("#pay_lead_form .change_status").text($(this).val());
                var totalamount = 0;
                var isFirst = true;
                var get_total_amount = true;
                var get_price = $("#pay_lead_form input[name='amount_paid']").val().replace("$", "").replace(",","");
                var get_last_approval_status = $('#payleadmodal .view_all_lead').find('.approval_status:last').text();
                var get_last_payment_status = $('#payleadmodal .view_all_lead').find('.payment_status:last').text();
                var get_last_payment_date = $('#payleadmodal .view_all_lead').find('.payment_date:last').text();
                var get_last_payment_status = $('#payleadmodal .view_all_lead').find('.payment_status:last').text();
                $("#payleadmodal .view_all_lead tr").each(function() {
                              var amount_paid = $(this).find('td.amount_paid').text().replace("$", "").replace(",","");
                              var status =      $(this).find('td.status').text();
                              var payment_status = $(this).find('td.payment_status').text();  

                              // add only if the value is number
                              if(!isNaN(amount_paid) && amount_paid.length != 0 && status != "Refund Payment" && payment_status != "Pending" && payment_status != "Cancelled")   {
                                   if(!isFirst)
                                      totalamount += parseFloat(amount_paid); 
                                  else
                                  {
                                      totalamount=parseFloat(amount_paid);
                                      isFirst=false;
                                  }
                              }
                          });
                get_total_amount  = parseFloat(get_price) - totalamount;

                if($(this).val() == "Full Payment" ){
                    $("#pay_lead_form input[name='initial_payment']").attr("readonly", true);
                    $("#pay_lead_form input[name='initial_payment']").val("$ " + get_total_amount.toLocaleString()+'.00');
                    $("#pay_lead_form #pay_lead").attr("disabled", true);
                }
             
                else {
                    $("#pay_lead_form input[name='initial_payment']").attr("readonly", false);
                    $("#pay_lead_form input[name='initial_payment']").val("$ 0.00");
                }
                if ($('#pay_lead_form #pay_lead').text() == 'Refund'){

                  if(get_last_payment_status =='Cancelled'){
                      $("#pay_lead_form #pay_lead").attr("disabled", true);
                  }
                  else if($(this).val() == "Refund Payment"  && get_last_payment_status !='Refunded'){
                      $("#pay_lead_form #pay_lead").attr("disabled", false);
                  }
                  else {
                      $("#pay_lead_form #pay_lead").attr("disabled", true);
                  }
                }
               else{
                      $("#pay_lead_form #pay_lead").attr("disabled", false);
                  }

          });
      // view Lead Remark
       $(document).on("click", ".view_lead_remark", function(e){
              e.preventDefault();
              var collection_id= $(this).data('collection_id');
              dataEdit = 'collection_id='+ collection_id;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_collection_remark/'+ collection_id,
                  dataType: 'json',
                  success:function(data){
                      var tr ="";
                      for (var i = 0; i < data.length; i++) {
                         $(".view_collection_form .remark").val(data[i].collection_remark);
                         $("#vewleadreamarkmodal .remark").val(data[i].collection_remark);

                      }
                    }


            });

          });
      // view Lead Remark
       $(document).on("click", ".view_payment_remark", function(e){
              e.preventDefault();
              var payment_id= $(this).data('payment_id');
              dataEdit = 'payment_id='+ payment_id;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_payment_remark/'+ payment_id,
                  dataType: 'json',
                  success:function(data){
                      var tr ="";
                      for (var i = 0; i < data.length; i++) {
                         $("#viewlead_paymentremark_modal .remark").val(data[i].payment_remark);

                      }
                    }


            });

          });


       // view Lead Remark
       $(document).on("click", ".view_leadremark_history", function(e){
              e.preventDefault();
             alert('test')

          });






      $('#sales_lead_form [name="month"], #sales_lead_form [name="year"]').on('change', function () {
      var month = $('#sales_lead_form [name="month"]').val();
      var year = $('#sales_lead_form [name="year"]').val();

      $('#leaddataTable').DataTable( {
              "sPaginationType": "listbox",
              "processing": true,
              "serverSide": false,
               "destroy": true,

              "ajax": {
                  "url":   base_url +  "dashboard/select_sales_date",
                  "type": "POST",
                              "dataSrc":"",
                   "data": { 
                     "month": month,       
                     "year": year,        
                      }
              },
           columns: [
              { data: 'project_id',
                    "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return setindex_prefix(data);                          
                          }
               },
              { data: 'product_name' },
              { data: 'author_name' },
              { data: 'book_title' },
              { data: 'email_address' },
              { data: 'contact_number' },
              { data: 'initial_payment',
              "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return "$ " + data.toLocaleString()+'.00';                          
                          }

               },
              { data: null,
                "render" : function( data, type, row, full ) {

                            return row.collect_payment_status +' - '+ new Date(row.collection_date).toLocaleDateString('en-GB');                          
                        }
               },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var date_approved = row.date_approve == null ? 'Not Yet': new Date(row.date_approve).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+row.approval_status +'</span> - '+ date_approved;                          
                        }
               },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<span class='status_payment'>"+row.status_payment +'</span> - '+ new Date(row.date_paid).toLocaleDateString('en-GB');                          
                        }
               }, 
           ],
          "createdRow": function ( row, data, index ) {
            $('td', row).eq(0).attr('id', 'project_id');
            $('td', row).eq(6).addClass('amount_paid');
              },
         "initComplete":function( settings, json){
            var totalamount = 0;
            var isFirst = true;
                 $("#leaddataTable .viewleadactivities tr").each(function(index) {
                      var amount_paid = $(this).find('.amount_paid').text().replace("$", "").replace(",", "");
                      var status =      $(this).find('td.status').text();
                      var payment_status =  $(this).find('.status_payment').text().indexOf('Paid') > -1;
                      var status_payment =  $(this).find('.status_payment').text();
                      var thisId = $(this).find('#project_id').text();
                      var sumVal = parseFloat($(this).find('.amount_paid').text().replace('$','').replace(',', ''));
                     // dd only if the value is number
                      if(!isNaN(payment_status) && payment_status == true)   {
                           if(!isFirst)
                              totalamount += parseFloat(amount_paid); 
                           else{
                               totalamount=parseFloat(amount_paid);
                               isFirst=false;
                          }
                      }

               });
                  $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + totalamount.toLocaleString("en")+'.00');

             }

          });
        $('#leaddataTable_filter input').on('keyup', function() {
          var totalamount = 0;
          var isFirst = true;
          $("#leaddataTable .viewleadactivities tr").each(function() {
                              var amount_paid = $(this).find('.amount_paid').text().replace("$", "").replace(",", "");
                              var status =      $(this).find('td.status').text();
                              var payment_status =  $(this).find('.status_payment').text().indexOf('Paid') > -1;
                              var status_payment =  $(this).find('.status_payment').text();
                              var thisId = $(this).find('#project_id').text();
                              var sumVal = parseFloat($(this).find('.amount_paid').text().replace('$','').replace(',', ''));
                             // add only if the value is number
                              if(!isNaN(payment_status) && payment_status == true)   {
                                   if(!isFirst)
                                      totalamount += parseFloat(amount_paid); 
                                   else{
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }

          });
            $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + totalamount.toLocaleString("en")+'.00');

      });

       });

      $('#sales_leadhistory_form [name="month"], #sales_leadhistory_form [name="year"]').on('change', function () {
      var month = $('#sales_leadhistory_form [name="month"]').val();
      var year = $('#sales_leadhistory_form [name="year"]').val();
      $('#leaddataTable').DataTable( {
             "sPaginationType": "listbox",
              "processing": true,
              "serverSide": false,
               "destroy": true,

              "ajax": {
                  "url":   base_url +  "dashboard/select_saleshistory_date",
                  "type": "POST",
                              "dataSrc":"",
                   "data": { 
                     "month": month,       
                     "year": year,        
                      }
              },
           columns: [
              { data: 'project_id',
                    "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return setindex_prefix(data);                          
                          }
               },
              { data: 'product_name' },
              { data: 'author_name' },
              { data: 'book_title' },
              { data: 'email_address' },
              { data: 'contact_number' },
              { data: 'initial_payment',
              "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return "$ " + data.toLocaleString()+'.00';                          
                          }

               },
              { data: null,
                "render" : function( data, type, row, full ) {

                            return row.collect_payment_status +' - '+ new Date(row.collection_date).toLocaleDateString('en-GB');                          
                        }
               },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var date_approved = row.date_approve == null ? 'Not Yet': new Date(row.date_approve).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+row.approval_status +'</span> - '+ date_approved;                          
                        }
               },
               { data: null,
                "render" : function( data, type, row, full ) {
                            var date_paid = row.date_paid == null ? 'Not Yet': new Date(row.date_paid).toLocaleDateString('en-GB');
                            return "<span class='status_payment'>"+row.status_payment +'</span> - '+ date_paid;                          
                        }
               }, 
           ],
          "createdRow": function ( row, data, index ) {
            $('td', row).eq(0).attr('id', 'project_id');
            $('td', row).eq(6).addClass('amount_paid');
              },
         "initComplete":function( settings, json){
            var totalamount = 0;
            var isFirst = true;
                 $("#leaddataTable .viewleadactivities tr").each(function(index) {
                      var amount_paid = $(this).find('.amount_paid').text().replace("$", "").replace(",", "");
                      var status =      $(this).find('td.status').text();
                      var payment_status =  $(this).find('.status_payment').text().indexOf('Paid') > -1;
                      var status_payment =  $(this).find('.status_payment').text();
                      var thisId = $(this).find('#project_id').text();
                      var sumVal = parseFloat($(this).find('.amount_paid').text().replace('$','').replace(',', ''));
                     // dd only if the value is number
                      if(!isNaN(payment_status) && payment_status == true)   {
                           if(!isFirst)
                              totalamount += parseFloat(amount_paid); 
                           else{
                               totalamount=parseFloat(amount_paid);
                               isFirst=false;
                          }
                      }

               });
                  $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + totalamount.toLocaleString("en")+'.00');

             }

          });
        $('#leaddataTable_filter input').on('keyup', function() {
          var totalamount = 0;
          var isFirst = true;
          $("#leaddataTable .viewleadactivities tr").each(function() {
                              var amount_paid = $(this).find('.amount_paid').text().replace("$", "").replace(",", "");
                              var status =      $(this).find('td.status').text();
                              var payment_status =  $(this).find('.status_payment').text().indexOf('Paid') > -1;
                              var status_payment =  $(this).find('.status_payment').text();
                              var thisId = $(this).find('#project_id').text();
                              var sumVal = parseFloat($(this).find('.amount_paid').text().replace('$','').replace(',', ''));
                             // add only if the value is number
                              if(!isNaN(payment_status) && payment_status == true)   {
                                   if(!isFirst)
                                      totalamount += parseFloat(amount_paid); 
                                   else{
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }

          });
            $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + totalamount.toLocaleString("en")+'.00');

      });

       });

    // $('#leaddataTable').DataTable( {"sPaginationType": "listbox"});

          //  $.ajax({
          //     url:   base_url +  "dashboard/load_data_user",       
          //     method: 'POST',
          //     dataType: 'json',
          //     success: function (data) {
          //          var load_data = []
          //         for (var i = 0; i < data.length; i++) {
          //              load_data.push({
          //                     'Package Name': data[i].user_id,
          //                 })      
          //            }
          //           $('#leaddataTable').DataTable( {
          //               data: load_data,
          //              "sPaginationType": "listbox",
          //               deferRender:    true,
          //               scrollCollapse: true,
          //               scroller:       true,
          //               "columns": [{
          //                  "data": "Package Name"
          //                 }
          //                 ]
          //                });
          //           }
          // });

          

        $('#leaddataTable_filter input').on('keyup', function() {
          var totalamount = 0;
          var isFirst = true;
          $("#leaddataTable .viewleadactivities tr").each(function() {
                              var amount_paid = $(this).find('.amount_paid').text().replace("$", "").replace(",", "");
                              var status =      $(this).find('td.status').text();
                              var payment_status =  $(this).find('.status_payment').text().indexOf('Paid') > -1;
                              var status_payment =  $(this).find('.status_payment').text();
                              var thisId = $(this).find('#project_id').text();
                              var sumVal = parseFloat($(this).find('.amount_paid').text().replace('$','').replace(',', ''));
                             // add only if the value is number
                              if(!isNaN(payment_status) && payment_status == true)   {
                                   if(!isFirst)
                                      totalamount += parseFloat(amount_paid); 
                                   else{
                                       totalamount=parseFloat(amount_paid);
                                       isFirst=false;
                                  }
                              }

          });
            $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + totalamount.toLocaleString("en")+'.00');

      });


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

     function setindex_prefix_lead(index_assigned)
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
                  
                return "LEAD"+ new_index_assigned;
          }
  
        function formatPhoneNumber(phoneNumber = '') {
          var phoneNumber = phoneNumber.replace('/[^0-9]/','');

          if(phoneNumber.length > 10) {
              var countryCode = phoneNumber.substr(0, phoneNumber.length-10);
              var areaCode = phoneNumber.substr(-10, 3);
              var nextThree = phoneNumber.substr(-7, 3);
              var lastFour = phoneNumber.substr(-4, 4);

              phoneNumber = '('+areaCode+') '+nextThree+'-'+lastFour;
          }
          else if(phoneNumber.length == 10) {
              var areaCode = phoneNumber.substr(0, 3);
              var nextThree = phoneNumber.substr(3, 3);
              var lastFour = phoneNumber.substr(6, 4);

              phoneNumber = '('+areaCode+') '+nextThree+'-'+lastFour;
          }
          else if(phoneNumber.length == 7) {
              var nextThree = phoneNumber.substr(0, 3);
              var lastFour = phoneNumber.substr(3, 4);

              phoneNumber = nextThree+'-'+lastFour;
          }

          return phoneNumber;
      }


      function convertHMS(value) {
          const sec = parseInt(value, 10); // convert value to number if it's string
          let hours   = Math.floor(sec / 3600); // get hours
          let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes
          let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds
          // add 0 if value < 10; Example: 2 => 02
          if (hours   < 10) {hours   = "0"+hours;}
          if (minutes < 10) {minutes = "0"+minutes;}
          if (seconds < 10) {seconds = "0"+seconds;}
          return hours+':'+minutes+':'+seconds; // Return is HH : MM : SS
      }

   

      function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
      var id_project = 0;
      var author_name ='';
      var designer_id =0;
      $(document).on('click','.view_leadhistory',function(e) {
            id_project= $(this).data('project_id');
            author_name= $(this).data('author_name');
             $('#viewleadhistorymodal .viewleadremark_history').attr('data-author_name', author_name);
             $('#viewleadhistorymodal .viewleadremark_history').attr('data-project_id', id_project);
             $("#leadremarkform input[name='project_id']").val(id_project);
             $("#leadremarkform input[name='author_name']").val(author_name);

            dataEdit = 'project_id='+ id_project+'&author_name='+author_name;

            $('.form-status-holder').html('');
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead_history/'+ id_project,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        $("#leadremarkform input[name='project_id']").val(data[i].project_id);
                        $("#leadremarkform input[name='author_name']").val(data[i].author_name);
                        //$("#leadremarkform .remark").val(data[i].create_remark);
                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].email_address+'</td>'+
                                  '<td>'+data[i].contact_number+'</td>'+
                                  '<td>'+data[i].collection_status+'</td>'+
                                  '<td>'+data[i].alter_collection_status+ ' ' + new Date(data[i].date_create).toLocaleDateString('en-GB')+'</td>'+
                                  '<td>'+data[i].price+'</td>'+
                                  "<td><button type='button' class='btn btn-outline-info btn-sm viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-project_id='"+data[i].project_id+"'>View</a></td>"+
                               '</tr>'; 
                         }

                        if(tr !=''){
                        $('#viewleadhistorymodal .viewleadhistory').html(tr);
                          $(".viewleadhistory td").filter(function() {
                                return  $(this).text() == 'undefined';
                            }).closest("tr").remove();
                       }
                       else{
                          $('#viewleadhistorymodal .viewleadhistory').html('');
                       }

                       $('#historyleadtable').DataTable({"sPaginationType": "listbox"});
                  }
           });
       });
      $(document).on('click','.view_designerhistory',function(e) {
            id_project= $(this).data('project_id');
            author_name= $(this).data('author_name');
            designer_id= $(this).data('designer_id');

             $('#viewleadhistorymodal .viewdesignerremark_history').attr('data-author_name', author_name);
             $('#viewleadhistorymodal .viewdesignerremark_history').attr('data-project_id', id_project);
             $('#viewleadhistorymodal .viewdesignerremark_history').attr('data-designer_id', designer_id);
             $("#designerremarkform input[name='designer_id']").val(designer_id);


            dataEdit = 'project_id='+ id_project+'&author_name='+author_name;

            $('.form-status-holder').html('');
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designer_history/'+ id_project,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        $("#designerremarkform input[name='project_id']").val(data[i].project_id);
                        $("#designerremarkform input[name='author_name']").val(data[i].author_name);
                        $("#designerremarkform .remark").val(data[i].create_remark);
                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].email_address+'</td>'+
                                  '<td>'+data[i].contact_number+'</td>'+
                                  '<td>'+data[i].collection_status+'</td>'+
                                  '<td>'+data[i].alter_collection_status+ ' ' + new Date(data[i].date_create).toLocaleDateString('en-GB')+'</td>'+
                               '</tr>'; 
                         }

                        if(tr !=''){
                        $('#viewleadhistorymodal .viewdesignerhistory').html(tr);
                          $(".viewdesignerhistory td").filter(function() {
                                return  $(this).text() == 'undefined';
                            }).closest("tr").remove();
                       }
                       else{
                          $('#viewleadhistorymodal .viewdesignerhistory').html('');
                       }

                       $('#historyleadtable').DataTable({"sPaginationType": "listbox"});
                  }
           });
       });

      $(document).on('click','.view_designercover_interiorhistory',function(e) {
            id_project= $(this).data('project_id');
            author_name= $(this).data('author_name');
            designer_id= $(this).data('designer_id');

             $('#viewleadhistorymodal .viewdesignerremark_history').attr('data-author_name', author_name);
             $('#viewleadhistorymodal .viewdesignerremark_history').attr('data-project_id', id_project);
             $('#viewleadhistorymodal .viewdesignerremark_history').attr('data-designer_id', designer_id);
             $("#designerremarkform input[name='designer_id']").val(designer_id);


            dataEdit = 'project_id='+ id_project+'&author_name='+author_name;

            $('.form-status-holder').html('');
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designer_history/'+ id_project,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        $("#designerremarkform input[name='project_id']").val(data[i].project_id);
                        $("#designerremarkform input[name='author_name']").val(data[i].author_name);
                        $("#designerremarkform .remark").val(data[i].create_remark);
                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].collection_status+'</td>'+
                                  '<td>'+data[i].alter_collection_status+ ' ' + new Date(data[i].date_create).toLocaleDateString('en-GB')+'</td>'+
                               '</tr>'; 
                         }

                        if(tr !=''){
                        $('#viewleadhistorymodal .viewdesignerhistory').html(tr);
                          $(".viewdesignerhistory td").filter(function() {
                                return  $(this).text() == 'undefined';
                            }).closest("tr").remove();
                       }
                       else{
                          $('#viewleadhistorymodal .viewdesignerhistory').html('');
                       }

                       $('#historyleadtable').DataTable({"sPaginationType": "listbox"});
                  }
           });
       });


      $(document).on('click','#viewleadhistorymodal .viewleadremark_history',function(e) {

            // alert('test');
            var project_id= $(this).data('project_id');
            dataEdit = 'project_id='+ project_id;
            //alert(project_id);
            var tr= '';
              var tr_status_lead= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead_remark_history/'+ project_id,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        tr += '<tr>'+
                                  '<td>'+data[i].from_user+'</td>'+
                                  '<td>'+data[i].from_usertype+'</td>'+
                                  '<td>'+data[i].create_remark+'</td>'+
                                  '<td>'+new Date(data[i].date_create_remark).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                      for (var i = 0; i < data.length; i++) {
                        tr_status_lead += '<tr>'+
                                  '<td>'+data[i].firstname + ' ' + data[i].lastname+'</td>'+
                                  '<td>'+data[i].collection_status+'</td>'+
                                  '<td>'+new Date(data[i].alter_date_commitment).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                        $('#viewleadremarkhistorymodal .viewleadremarkhistory').html(tr);
                        $('#viewleadremarkhistorymodal .viewlead_status_history').html(tr_status_lead);
                        $(".viewleadremarkhistory td").filter(function() {
                                return $(this).text() == 'undefined';
                            }).closest("tr").remove();
                         $(".viewlead_status_history td").filter(function() {
                                return $(this).text() == 'undefined undefined';
                            }).closest("tr").remove();

                            $('#historyremarkleadtable').DataTable({"sPaginationType": "listbox"});
                            $('#historylead_assigntable').DataTable({"sPaginationType": "listbox"});


                  }
           });
       });


      $(document).on('click','.viewleadremark_history1',function(e) {

            var project_id= $(this).data('project_id');
              // alert(project_id);
            dataEdit = 'project_id='+ project_id;
            var tr= '';
            var tr_status_lead= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_lead_remark_history/'+ project_id,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        tr += '<tr>'+
                                  '<td>'+data[i].from_user+'</td>'+
                                  '<td>'+data[i].from_usertype+'</td>'+
                                  '<td>'+data[i].create_remark+'</td>'+
                                  '<td>'+new Date(data[i].date_create_remark).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                        $('#viewleadremarkhistorymodal .viewleadremarkhistory').html(tr);

                     for (var i = 0; i < data.length; i++) {
                        tr_status_lead += '<tr>'+
                                  '<td>'+data[i].firstname + ' ' + data[i].lastname +'</td>'+
                                  '<td>'+data[i].collection_status+'</td>'+
                                  '<td>'+new Date(data[i].alter_date_commitment).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                        $('#viewleadremarkhistorymodal .viewlead_status_history').html(tr_status_lead);
                        $(".viewleadremarkhistory td").filter(function() {
                                return $(this).text() == 'undefined';
                            }).closest("tr").remove();
                         $(".viewlead_status_history td").filter(function() {
                                return $(this).text() == 'undefined undefined';
                            }).closest("tr").remove();
                         $('#historyremarkleadtable').DataTable({"sPaginationType": "listbox"});
                         $('#historylead_assigntable').DataTable({"sPaginationType": "listbox"});

                  }
           });
       });



      $(document).on('click','#viewleadhistorymodal .viewdesignerremark_history',function(e) {
         
            dataEdit = 'author_name='+ author_name+'&designer_id='+designer_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designer_history/'+ author_name,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        tr += '<tr>'+
                                  '<td>'+data[i].from_user+'</td>'+
                                  '<td>'+data[i].from_usertype+'</td>'+
                                  '<td>'+data[i].create_remark+'</td>'+
                                  '<td>'+new Date(data[i].date_create_remark).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                        $('#viewleadremarkhistorymodal .viewdesignerremarkhistory').html(tr);
                        $(".viewdesignerremarkhistory td").filter(function() {
                                return $(this).text() == 'undefined';
                            }).closest("tr").remove();
                         $('#historyremarkleadtable').DataTable({"sPaginationType": "listbox"});

                  }
           });
       });


      $(document).on('click','#leadmanagerdataTable .view_lead_assign_manager, #leadmanagerdataTable .view_manager_assign',function(e) {
            var manager_id= $(this).data('manager_id');
            var date_lead_assign= $(this).data('date_lead_assign');

            dataEdit = 'manager_id='+manager_id+'&date_lead_assign='+date_lead_assign;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'account/view_available_lead',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                          $('#UpdateSignLeadform [name="manager"]').val(data[i].firstname + ' ' + data[i].lastname);
                          $('#UpdateSignLeadform [name="user_id"]').val(data[i].user_id);
                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].email_address+'</td>'+
                                  '<td>'+data[i].contact_number+'</td>'+
                                  '<td>'+data[i].area_code+'</td>'+
                                  '<td>$ '+parseFloat(data[i].price.replace(",","")).toLocaleString("en")+'</td>'+
                                  '<td>'+data[i].status+'</td>'+
                                  '<td>'+data[i].contractual_status+'</td>'+
                                  '<td>'+new Date(data[i].lead_date_assign).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                        $('#vewleadassign_managermodal .viewleadassign_manager').html(tr);

         $('#assignmanagerdatatable').DataTable({"autoWidth": false, columnDefs: [

                  { width: '10%', targets: 2 },
                  { width: '10%', targets: 4 },

              ],
              "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], [10, 25, 50,100, 250, 500, 1000, "All"]],

              fixedColumns: true});

                  }
           });
       });

      $(document).on('click','#leadagentdataTable .view_lead_assign_agent',function(e) {
            var agent_id= $(this).data('agent_id');
            var date_create= $(this).data('date_create');
            var assign_user= $(this).data('assign_user');

            dataEdit = 'agent_id='+agent_id+'&date_create='+date_create+'&assign_user='+assign_user;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'account/view_lead_assign' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {

                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].email_address+'</td>'+
                                  '<td>'+data[i].contact_number+'</td>'+
                                  '<td>'+data[i].area_code+'</td>'+
                                  '<td>$ '+parseFloat(data[i].price).toLocaleString("en")+'</td>'+
                                  '<td>'+data[i].status+'</td>'+
                                  '<td>'+data[i].contractual_status+'</td>'+
                                  '<td>'+new Date(data[i].lead_date_agent_assign).toLocaleString([], { hour12: true})+'</td>'+

                               '</tr>'; 
                         }
                   $('#historyleadtable_agent_assign').DataTable({"sPaginationType": "listbox"});

                        $('#vewleadassign_agentmodal .viewleadassign_agent').html(tr);

                  }
                  
           });


       });
      // view leaad history modal
      $(document).on('click','#leaddataTable .view_report_author_history',function(e) {
            var project_id= $(this).data('project_id');
            dataEdit = 'project_id='+project_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_report_history',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                           tr += '<tr>'+
                                    '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                    '<td>'+data[i].author_name+'</td>'+
                                    '<td>'+data[i].email_address+'</td>'+
                                    '<td>'+data[i].contact_number+'</td>'+
                                    '<td>'+data[i].status_history+'</td>'+
                                    '<td>'+new Date(data[i].date_history).toLocaleString([], { hour12: true})+'</td>'+
                                    '<td>'+data[i].usertype+'</td>'+
                                 '</tr>'; 
                           }
                        $('#viewreportModal .viewreporthistory').html(tr);

                  }
           });
       });

      // view report cover designer 
      $(document).on('click','#leaddataTable .view_report_designer_history',function(e) {
            var project_id= $(this).data('project_id');
            var user_id= $(this).data('user_id');
            dataEdit = 'project_id='+project_id+'&user_id='+user_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_reportdesigner_history',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                           tr += '<tr>'+
                                    '<td>'+data[i].author_name+'</td>'+
                                    '<td>'+data[i].book_title+'</td>'+
                                    '<td>'+data[i].firstname+ ' ' + data[i].lastname+ '</td>'+
                                    '<td>'+data[i].status_history_designer+'</td>'+
                                    '<td>'+new Date(data[i].date_history_designer).toLocaleString([], { hour12: true})+'</td>'+
                                    '<td>'+data[i].user_type+'</td>'+
                                 '</tr>'; 
                           }
                        $('#viewreport_designermodal .viewreportdesignerhistory').html(tr);

                         $('#historydesignertable').DataTable({"sPaginationType": "listbox"});


                  }
           });
       });


      // view cover designer report by report id
      $(document).on('click','#leaddataTable .view_report_coverdesigner',function(e) {
            var project_id= $(this).data('project_id');
            dataEdit = 'project_id='+project_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_report_coverdesigner',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                            $("#update_coverdesigner_form input[name='author_name']").val(data[i].author_name);
                            $("#update_coverdesigner_form input[name='title_name']").val(data[i].book_title);
                            $("#update_coverdesigner_form input[name='cover_designer_name']").val(data[i].firstname +' '+ data[i].lastname);
                            $("#update_coverdesigner_form input[name='date_received']").val(data[i].date_received);
                            $("#update_coverdesigner_form input[name='project_status']").val(data[i].project_status);
                            $("#update_coverdesigner_form input[name='date_delivered']").val(data[i].date_delivered);
                            $("#update_coverdesigner_form input[name='date_completed']").val(data[i].date_report);
                            $("#update_coverdesigner_form input[name='user_id']").val(data[i].user_id);
                            $("#update_coverdesigner_form input[name='report_id']").val(data[i].report_id);
                            $("#update_coverdesigner_form input[name='project_id']").val(data[i].project_id);
                            if (data[i].status_payment == null){
                                $("#update_coverdesigner_form .status_payment option[value='Pending']").attr('selected', 'selected').text("Pending").change();
                            }
                            else{
                               $("#update_coverdesigner_form .status_payment option[value='"+data[i].status_payment+"']").attr('selected', 'selected').text(data[i].status_payment).change();
                              }

                           }

                  }
           });
       });

      // view inerorir designer report by report id
      $(document).on('click','#leaddataTable .view_report_interiordesigner',function(e) {
            var project_id= $(this).data('project_id');
            dataEdit = 'project_id='+project_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_report_interiordesigner',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                            $("#update_interiordesigner_form input[name='author_name']").val(data[i].author_name);
                            $("#update_interiordesigner_form input[name='title_name']").val(data[i].book_title);
                            $("#update_interiordesigner_form input[name='cover_designer_name']").val(data[i].firstname +' '+ data[i].lastname);
                            $("#update_interiordesigner_form input[name='date_received']").val(data[i].date_received);
                            $("#update_interiordesigner_form input[name='project_status']").val(data[i].project_status);
                            $("#update_interiordesigner_form input[name='date_delivered']").val(data[i].date_delivered);
                            $("#update_interiordesigner_form input[name='date_completed']").val(data[i].date_report);
                            $("#update_interiordesigner_form input[name='user_id']").val(data[i].user_id);
                            $("#update_interiordesigner_form input[name='report_id']").val(data[i].report_id);
                            $("#update_interiordesigner_form input[name='project_id']").val(data[i].project_id);
                            if (data[i].status_payment == null){
                                $("#update_interiordesigner_form .status_payment option[value='Pending']").attr('selected', 'selected').text("Pending").change();
                            }
                            else{
                               $("#update_interiordesigner_form .status_payment option[value='"+data[i].status_payment+"']").attr('selected', 'selected').text(data[i].status_payment).change();
                              }

                           }

                  }
           });
       });
      $(document).on('click','#leaddataTable .view_report_author, .line_word_details, .front_cover_details, .back_cover_details',function(e) {
            var project_id= $(this).data('project_id');

            dataEdit = 'project_id='+project_id;
            var tr= '';
            var tr_front_cover_designer= '';
            var tr_back_cover_designer= '';
            $("#updatereportform :input").attr("disabled", false);

                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_author_report' ,
                  dataType: 'json',
                  success:function(data){

                      var report = data.report;
                      var interior_designer = data.data_interior_designer;
                      var cover_designer = data.data_cover_designer;
                      var front_cover = data.data_front_cover_designer;
                      var back_cover = data.data_back_cover_designer
                      var usertype = data.usertype;
                      if(interior_designer.length > 0){
                           for (var i = 0; i < interior_designer.length; i++) {
                                   
                                    tr += '<tr>'+
                                        '<td style="display:none;"><input class="form-control interior_id" type="text" name="interior_id[]" value="'+interior_designer[i].interior_id+'" style="height:50px; width:90px;" id="interior_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control page_number" name="page_number[]" value="'+interior_designer[i].page_no+'" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Page Number"></td>'+
                                        '<td style="width:100px;"><input type="text" class="form-control paragraph_number" value="'+interior_designer[i].paragraph_no+'" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                                        '<td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" value="'+interior_designer[i].line_no+'" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]">'+interior_designer[i].actual_sentence+'</textarea></td>'+
                                        '<td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]">'+interior_designer[i].correct_sentence+'</textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove" data-project_id="'+interior_designer[i].project_id+'" data-interior_id="'+interior_designer[i].interior_id+'" >Remove</button></td>'+
                                     '</tr>';
                              $("#updatereportform .interior_designer option[value='"+interior_designer[i].interior_user_id+"']").attr("selected", true);
                              $("#updatereportform .publisher_id option[value='"+interior_designer[i].publisher_id+"']").attr("selected", true);


                              $("#update_lines_form input[name='interior_designer']").val(interior_designer[i].interior_user_id);
                              $("#update_lines_form input[name='publisher_id']").val(interior_designer[i].publisher_id);


                           }
                         }
                        else{
                              tr += '<tr>'+
                                          '<td style="display:none;"><input class="form-control interior_id" type="text" name="interior_id[]" value="0" style="height:50px; width:90px;" id="interior_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control page_number" name="page_number[]" value="" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Page Number"></td>'+
                                        '<td style="width:100px;"><input type="text" class="form-control paragraph_number" value="" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                                        '<td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" value="" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>'+
                                        '<td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                     '</tr>';
                              $("#updatereportform .interior_designer option[value='']").attr("selected", true);
                              $("#updatereportform .publisher_id option[value='']").attr("selected", true);
                        }

                          for (var i = 0; i < cover_designer.length; i++) {

                             $("#updatereportform .cover_designer option[value='"+cover_designer[i].cover_user_id+"']").attr("selected", true);
                             $("#updatereportform .publisher_id option[value='"+cover_designer[i].publisher_id+"']").attr("selected", true);



       
                           }

                          for (var i = 0; i < front_cover.length; i++) {
                             tr_front_cover_designer += '<tr>'+
                                       '<td style="display:none;"><input class="form-control designer_id" type="text" name="designer_id[]" value="'+front_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly name="front_back_cover[]">'+front_cover[i].front_back_cover+'</textarea></td>'+
                                        '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]">'+front_cover[i].actual_cover+'</textarea></td>'+
                                        '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]">'+front_cover[i].correct_cover+'</textarea></td>'+
                                        '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                    '</tr>';

                                  $("#update_front_cover_form input[name='cover_designer']").val(front_cover[i].cover_user_id);
                                  $("#update_front_cover_form input[name='publisher_id']").val(front_cover[i].publisher_id);
                             }

                                                 
                      for (var i = 0; i < back_cover.length; i++) {

                            tr_back_cover_designer += '<tr>'+
                                     '<td style="display:none;"><input class="form-control designer_id" type="hidden" name="designer_id[]" value="'+back_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                      '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly name="front_back_cover[]">'+back_cover[i].front_back_cover+'</textarea></td>'+
                                      '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]">'+back_cover[i].actual_cover+'</textarea></td>'+
                                      '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]">'+back_cover[i].correct_cover+'</textarea></td>'+
                                      '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                  '</tr>';

                                     $("#update_back_cover_form input[name='cover_designer']").val(back_cover[i].cover_user_id);
                                     $("#update_back_cover_form input[name='publisher_id']").val(back_cover[i].publisher_id);

                                }
               
                      
                       $('#sidemodal1 .author_report_detail').html(tr);
                       if(front_cover.length > 0){
                          $('#sidemodal2 .front_cover_report_detail').html(tr_front_cover_designer);
                       }
                       if(back_cover.length > 0){
                         $('#sidemodal3 .back_cover_report_detail').html(tr_back_cover_designer);
                     }
                     


                      for (var i = 0; i < report.length; i++) {
                      $("#updatereportform .project_id option[value='"+report[i].project_id+"']").attr('selected', 'selected').text(setindex_prefix(report[i].project_id)).change();
                      $("#updatereportform .project_status option[value='"+report[i].project_status+"']").attr('selected', 'selected').text(report[i].project_status).change();
                      $('#updatereportform .book_categories option[value="'+report[i].book_categories+'"]').attr('selected', 'selected').text(report[i].book_categories).change();
                      $('#updatereportform .book_color option[value="'+report[i].book_color+'"]').attr('selected', 'selected').text(report[i].book_color).change();
                      $("#updatereportform .book_size option[value='"+report[i].book_size+"']").attr('selected', 'selected').text(report[i].book_size).change();
                      $("#updatereportform .color_type option[value='"+report[i].book_colortype+"']").attr('selected', 'selected').text(report[i].book_colortype).change();
                      // $("#updatereportform .author_picture option[value='"+report[i].author_picture+"']").attr('selected', 'selected').text(report[i].author_picture).change();
                      $("#updatereportform .hard_cover_format option[value='"+report[i].hard_cover_format+"']").attr('selected', 'selected').text(report[i].hard_cover_format).change();
                      $("#updatereportform input[name='editor_name']").val(report[i].editor_name);
                      $("#updatereportform input[name='pen_name']").val(report[i].pen_name);
                      $("#updatereportform input[name='project_id']").val(setindex_prefix(report[i].project_id));
                      $("#updatereportform input[name='project_id2']").val(report[i].project_id);
                      $("#updatereportform input[name='number_of_book']").val(report[i].number_of_books);
                      $("#updatereportform input[name='report_id']").val(report[i].report_id);
                      $("#updatereportform input[name='publishing_name']").val(report[i].publishing_name);
                      $("#updatereportform input[name='date_sold']").val(new Date(report[i].date_contract_signed).toLocaleDateString('en-GB'));

                      // $("#updatereportform .book_title").text(report[i].book_title);
                      $("#updatereportform .about_author").text(report[i].about_author);
                      $("#updatereportform .about_book").text(report[i].about_book);
                      $("#updatereportform input[name='service_offered']").val(report[i].services_offered);
                      $("#updatereportform input[name='audience']").val(report[i].audience);
                      $("#updatereportform input[name='publishing_name']").val(report[i].publishing_name);
                      $("#update_lines_form input[name='project_id']").val(report[i].project_id);
                      $("#update_front_cover_form input[name='project_id']").val(report[i].project_id);


                      $("#update_back_cover_form input[name='project_id']").val(report[i].project_id);
                      $("#updatereportform .cover_design").text(report[i].cover_design_ints);
                      $("#updatereportform .interior_design").text(report[i].interior_design_ints);

                      // $("#updatereportform .cover_designer").text(data[i].cover_designer);
                      // $("#updatereportform .interior_designer").text(data[i].interior_designer);

                      $("#updatereportform .mailing_address").text(report[i].mailing_address);
                      $("#updatereportform .publishing_logo").text(report[i].publishing_logo_ints);

                      if (report[i].project_status == "Approved Completion" && usertype == "Production"){
                          $("#updatereportform :input").attr("disabled", true);

                      }
                      else{
                         $("#updatereportform :input").attr("disabled", false);

                      }
                  }
        
        

                        $('#updatereportModal #front_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});
                        $('#updatereportModal #back_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});


                  }
           });
       });

      $(document).on('click','#leaddataTable .view_designer_report, #leaddataTable .view_designer_detail',function(e) {
            var project_id= $(this).data('project_id');
            var user_id= $(this).data('user_id');
            var report_id= $(this).data('report_id');
            var usertype= $(this).data('usertype');
            var designer_report_id= $(this).data('designer_report_id');
             $("#updatedesignerreportform input[name='project_id']").val(project_id);
             $("#updatedesignerreportform input[name='report_id']").val(report_id);
             $("#updatedesignerreportform input[name='user_id']").val(user_id);
             $("#updatedesignerreportform input[name='designer_report_id']").val(designer_report_id);
             $('#updatedesignerreportform .project_status option:selected').removeAttr('selected');
             $('#updatedesignerreportform .status_payment option:selected').removeAttr('selected');


            dataEdit = 'project_id='+project_id+'&user_id='+user_id+'&usertype='+usertype+'&designer_report_id='+designer_report_id;
            var tr= '';
            var tr_front_cover_designer= '';
            var tr_back_cover_designer= '';
            var tr_transaction_payment_designer = '';
            var tr_interior_designer = '';
                             

             $("#updatedesignerreportform :input").attr("disabled", false);
            var totalamount = 0;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designer_report' ,
                  dataType: 'json',
                  success:function(data){
                      var report = data.report;
                      var interior_designer = data.data_interior_designer;
                      var cover_designer = data.data_cover_designer;
                      var front_cover = data.data_front_cover_designer;
                      var back_cover = data.data_back_cover_designer
                      var transaction_payment = data.data_transaction_designer;
                      var occured_total = data.data_occured_total;
                      var totalamount = 0;

                    for (var i = 0; i < interior_designer.length; i++) {

                        tr_interior_designer += '<tr>'+
                            '<td style="display:none;"><input class="form-control interior_id" type="text" disabled name="interior_id[]" value="'+interior_designer[i].interior_id+'" style="height:50px; width:90px;" id="interior_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                            '<td><input class="form-control page_number" name="page_number[]" value="'+interior_designer[i].page_no+'" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" disabled placeholder="Enter the Page Number"></td>'+
                            '<td style="width:100px;"><input type="text" disabled class="form-control paragraph_number" value="'+interior_designer[i].paragraph_no+'" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                            '<td style="width:100px;"><input type="text" disabled class="form-control line_number" name="line_number[]" value="'+interior_designer[i].line_no+'" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                            '<td style="width:520px;"><textarea class="form-control  actual_sentence" disabled rows="2" name="actual_sentence[]">'+interior_designer[i].actual_sentence+'</textarea></td>'+
                            '<td style="width:520px;"><textarea class="form-control  correct_sentence" disabled rows="2" name="correct_sentence[]">'+interior_designer[i].correct_sentence+'</textarea></td>'+
                         '</tr>';

                       }
                 if (front_cover.length > 0){
                      for (var i = 0; i < front_cover.length; i++) {
                         tr_front_cover_designer += '<tr>'+
                                   '<td style="display:none;"><input class="form-control designer_id" type="text" name="designer_id[]" value="'+front_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                    '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly readonly name="front_back_cover[]">'+front_cover[i].front_back_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2"  readonly name="actual_cover[]">'+front_cover[i].actual_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" readonly name="correct_cover[]">'+front_cover[i].correct_cover+'</textarea></td>'+
                                    '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" readonly name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>'+
                                '</tr>';
                           }
                                                 
                       for (var i = 0; i < back_cover.length; i++) {

                          tr_back_cover_designer += '<tr>'+
                                   '<td style="display:none;"><input class="form-control designer_id" type="hidden" name="designer_id[]" value="'+back_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                    '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly name="front_back_cover[]">'+back_cover[i].front_back_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2" readonly name="actual_cover[]">'+back_cover[i].actual_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" readonly name="correct_cover[]">'+back_cover[i].correct_cover+'</textarea></td>'+
                                    '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" readonly name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                '</tr>';
                              }
              }
                        if (transaction_payment.length > 0){
                            for (var i = 0; i < transaction_payment.length; i++) {

                              tr_transaction_payment_designer += '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="'+transaction_payment[i].transaction_id+'" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" value="'+transaction_payment[i].charge_incurred+'" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]">'+transaction_payment[i].remarktr_designer+'</textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                                  }
                            }
                         else
                           {
                             tr_transaction_payment_designer = '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="0" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]"></textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                            
                              }                 
                                

                        // $('#updatereportModal .author_report_detail').html(tr);

                        $('#update_designer_report_modal .front_cover_report_detail, #detail_designer_report_modal .front_cover_report_detail').html(tr_front_cover_designer);
                        $('#update_designer_report_modal .back_cover_report_detail, #detail_designer_report_modal .back_cover_report_detail').html(tr_back_cover_designer);
                        $('#update_designer_report_modal .author_reportdesigner_detail, #detail_designer_report_modal .author_reportdesigner_detail').html(tr_transaction_payment_designer);
                        $('#update_designer_report_modal .author_report_detail, #detail_designer_report_modal .author_report_detail').html(tr_interior_designer);

                 if (report.length > 0){
                   for (var i = 0; i < report.length; i++) {
                      if (report[i].project_status_designer != null ){
                           $("#updatedesignerreportform .project_status").val(report[i].project_status_designer);
                      }
                      else{
                           $("#updatedesignerreportform .project_status").val("");
                      }


                      if (report[i].status_payment == "Payment Received"){

                           $("#updatedesignerreportform .status_payment").val(report[i].status_payment);
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Received']").hide(); 
                           $("#viewdetails .status_payment").val(report[i].status_payment);
                           $("#viewdetails  .status_payment option[value='Payment Not Received']").hide(); 
                      }
                      else if (report[i].status_payment == "Payment Confirmed"){
                           $("#updatedesignerreportform :input").attr("disabled", true);

                      }

                      else if (report[i].status_payment != "Payment Inprocess"){
                           $("#updatedesignerreportform .status_payment").val(report[i].status_payment);

                      }
                       else{
                           $("#updatedesignerreportform .status_payment").val("");
                      }
                     
                      if (report[i].date_delivered != null){
                             var dateToday = new Date(report[i].date_delivered); 
                      }
                      else{
                             var dateToday = null; 

                      }
                      



                      // if (occured_total == null || occured_total == "undefined"){
                      //     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");
                      // }
                      // else{
                      //     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(occured_total).toLocaleString("en") +".00");

                      // }
                  

                      $("#updatedesignerreportform input[name='pen_name'], #viewdetails input[name='pen_name']").val(report[i].pen_name);
       
                      $("#updatedesignerreportform input[name='book_categories'], #viewdetails input[name='book_categories']").val(report[i].book_categories);
                      $("#updatedesignerreportform input[name='author_name'], #viewdetails input[name='author_name']").val(report[i].author_name);
        
                      $("#updatedesignerreportform .book_title, #viewdetails .book_title").text(report[i].book_title);
                      $("#updatedesignerreportform input[name='book_size'], #viewdetails input[name='book_size']").val(report[i].book_size);
                      $("#updatedesignerreportform input[name='color_type'], #viewdetails input[name='color_type']").val(report[i].book_colortype);
                      $("#updatedesignerreportform .about_book, #viewdetails .about_book").text(report[i].about_book);
                      $("#updatedesignerreportform .about_author, #viewdetails .about_author").text(report[i].about_author);
                      $("#updatedesignerreportform .publishing_name, #viewdetails .publishing_name").text(report[i].publishing_name);
                      $("#updatedesignerreportform .publishing_logo, #viewdetails .publishing_logo").text(report[i].publishing_logo_ints);
                     }
                   }
                    else{
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Received']").show(); 
                           $("#viewdetails  .status_payment option[value='Payment Not Received']").show(); 
                    }
                        
                    $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              totalamount += +$(this).val();
                     }); 
                       if (totalamount == ""){
                             $("#updatedesignerreportform input[name='total_amount']").val("Php : 0.00");

                       }
                       else{
                             $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");
                       }

              $("#update_designer_report_modal .author_reportdesigner_detail .charge_incurred").keyup(function(){
                           var charge_amount = 0;
                       $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              charge_amount += +$(this).val();
                     }); 
                     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");

           } );

                        $('#update_designer_report_modal #front_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});
                        $('#update_designer_report_modal #back_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});

              
                          $('#updatedesignerreportform .datepicker').datepicker({
                              clearBtn: true,
                              format: "dd/mm/yyyy",
                              startDate: dateToday,
                          }).datepicker("setDate", dateToday);


                  }
           });
       });


      $(document).on('click','#leaddataTable .view_publishing_cover_designer_report',function(e) {
            var project_id= $(this).data('project_id');
            var user_id= $(this).data('user_id');

            dataEdit = 'project_id='+project_id+'&user_id='+user_id;
            var tr= '';
            var tr_front_cover_designer= '';
            var tr_back_cover_designer= '';
            var tr_transaction_payment_designer = '';
             $("#updatedesignerreportform :input").attr("disabled", false);
            var totalamount = 0;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_publishing_cover_report' ,
                  dataType: 'json',
                  success:function(data){
                      var report = data.report;
                      var front_cover = data.data_front_cover_designer;
                      var back_cover = data.data_back_cover_designer
                      var transaction_payment = data.data_transaction_designer

                      for (var i = 0; i < front_cover.length; i++) {
                         tr_front_cover_designer += '<tr>'+
                                   '<td style="display:none;"><input class="form-control designer_id" type="text" name="designer_id[]" value="'+front_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                    '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly readonly name="front_back_cover[]">'+front_cover[i].front_back_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2"  readonly name="actual_cover[]">'+front_cover[i].actual_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" readonly name="correct_cover[]">'+front_cover[i].correct_cover+'</textarea></td>'+
                                    '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" readonly name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                '</tr>';
                           }
                                                 
                       for (var i = 0; i < back_cover.length; i++) {

                          tr_back_cover_designer += '<tr>'+
                                   '<td style="display:none;"><input class="form-control designer_id" type="hidden" name="designer_id[]" value="'+back_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                    '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly name="front_back_cover[]">'+back_cover[i].front_back_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2" readonly name="actual_cover[]">'+back_cover[i].actual_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" readonly name="correct_cover[]">'+back_cover[i].correct_cover+'</textarea></td>'+
                                    '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" readonly name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                '</tr>';
                              }
                        if (transaction_payment.length > 0){
                            for (var i = 0; i < transaction_payment.length; i++) {

                              tr_transaction_payment_designer += '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="'+transaction_payment[i].transaction_id+'" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" value="'+transaction_payment[i].charge_incurred+'" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]">'+transaction_payment[i].remarktr_designer+'</textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                                  }
                            }
                         else
                           {
                             tr_transaction_payment_designer = '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="0" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]"></textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                            
                              }                 
                      

                        // $('#updatereportModal .author_report_detail').html(tr);

                        $('#update_designer_report_modal .front_cover_report_detail').html(tr_front_cover_designer);
                         $('#update_designer_report_modal .back_cover_report_detail').html(tr_back_cover_designer);
                         $('#update_designer_report_modal .author_reportdesigner_detail').html(tr_transaction_payment_designer);

                      for (var i = 0; i < report.length; i++) {
                      if (report[i].project_status_designer != ""){
                           $("#updatedesignerreportform .project_status option[value='"+report[i].project_status_designer+"']").attr('selected', 'selected').text(report[i].project_status_designer).change();
                      }
                 
                      if (report[i].status_payment == "Payment Received"){

                           $("#updatedesignerreportform .status_payment option[value='"+report[i].status_payment+"']").attr('selected', 'selected').text(report[i].status_payment).change();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Received']").remove(); 
                      }
                      else if (report[i].status_payment == "Payment Confirmed"){
                           $("#updatedesignerreportform :input").attr("disabled", true);

                      }

                      else if (report[i].status_payment != "Payment Inprocess"){
                           $("#updatedesignerreportform .status_payment option[value='"+report[i].status_payment+"']").attr('selected', 'selected').text(report[i].status_payment).change();
                      }
                     
                      if (report[i].date_delivered != null){
                             var dateToday = new Date(report[i].date_delivered); 
                      }
                      else{
                             var dateToday = null; 

                      }

                      if (report[i].total_amount == null){
                          $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");
                      }
                      else{
                          $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(report[i].total_amount).toLocaleString("en") +".00");

                      }
                      

                      $("#updatedesignerreportform input[name='pen_name']").val(report[i].pen_name);
       
                      $("#updatedesignerreportform input[name='designer_report_id']").val(report[i].designer_report_id);
                      $("#updatedesignerreportform input[name='book_categories']").val(report[i].book_categories);
                      $("#updatedesignerreportform input[name='author_name']").val(report[i].author_name);
                      $("#updatedesignerreportform input[name='project_id']").val(report[i].project_id);
                      $("#updatedesignerreportform input[name='report_id']").val(report[i].report_id);
                      $("#updatedesignerreportform input[name='user_id']").val(report[i].user_id);
                      $("#updatedesignerreportform .book_title").text(report[i].book_title);
                      $("#updatedesignerreportform input[name='book_size']").val(report[i].book_size);
                      $("#updatedesignerreportform input[name='color_type']").val(report[i].book_colortype);
                      $("#updatedesignerreportform .about_book").text(report[i].about_book);
                      $("#updatedesignerreportform .about_author").text(report[i].about_author);
                      $("#updatedesignerreportform .publishing_name").text(report[i].publishing_name);
                      $("#updatedesignerreportform .publishing_logo").text(report[i].publishing_logo_ints);
                     }


           


              $("#update_designer_report_modal .author_reportdesigner_detail .charge_incurred").keyup(function(){
                         var charge_amount = 0;
         
                            $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              charge_amount += +$(this).val();

                }); 
                    $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");

           }); 

                        $('#update_designer_report_modal #front_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});
                        $('#update_designer_report_modal #back_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});

              
                          $('#updatedesignerreportform .datepicker').datepicker({
                              clearBtn: true,
                              format: "dd/mm/yyyy",
                              startDate: dateToday,
                          }).datepicker("setDate", dateToday);


                  }
           });
       });



      $(document).on('click','#leaddataTable .view_designeradmin_report',function(e) {
            var project_id= $(this).data('project_id');
            var user_id= $(this).data('user_id');
            var report_id= $(this).data('report_id');
            var designer_report_id= $(this).data('designer_report_id');
            $("#updatedesignerreportform input[name='project_id']").val(project_id);
            $("#updatedesignerreportform input[name='report_id']").val(report_id);
            $("#updatedesignerreportform input[name='user_id']").val(user_id);


            dataEdit = 'project_id='+project_id+'&user_id='+user_id+'&designer_report_id='+designer_report_id;
            var tr= '';
            var tr_front_cover_designer= '';
            var tr_back_cover_designer= '';
            var tr_transaction_payment_designer = '';
           var charge_amount = 0;
            var totalamount = 0;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designercover_report' ,
                  dataType: 'json',
                  success:function(data){
                      var report = data.report;
                      var front_cover = data.data_front_cover_designer;
                      var back_cover = data.data_back_cover_designer
                      var transaction_payment = data.data_transaction_designer;

                     if (transaction_payment.length > 0){
                            for (var i = 0; i < transaction_payment.length; i++) {

                              tr_transaction_payment_designer += '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="'+transaction_payment[i].transaction_id+'" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" value="'+transaction_payment[i].charge_incurred+'" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]">'+transaction_payment[i].remarktr_designer+'</textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                                  }
                            }
                     else{
                             tr_transaction_payment_designer = '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="0" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]"></textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                            
                              } 
                         $('#update_designer_report_modal .author_reportdesigner_detail').html(tr_transaction_payment_designer);
                         $(".author_reportdesigner_detail :input").attr("disabled", true);
                         $("#add_more_reportdesigner").attr("disabled", true);
                if (report.length > 0 ) {
                  for (var i = 0; i < report.length; i++) {
                      if (report[i].project_status_designer == null){
                           $("#updatedesignerreportform .project_status").val("Pending");

                      }
                      else{
                           $("#updatedesignerreportform .project_status").val(report[i].project_status_designer);
                           $("#updatedesignerreportform  .project_status option[value='Pending']").hide(); 

                      }
                      if (report[i].status_payment == null){
                           $("#updatedesignerreportform  .status_payment").val("Pending"); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 
                       }
       
                     else if (report[i].status_payment == "Payment Inprocess" || report[i].status_payment == "Pending"){
                           $("#updatedesignerreportform  .status_payment").val(report[i].status_payment); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 

                      }
       
                     else if (report[i].status_payment == "Payment Received"){
                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 

                       }
                    else if (report[i].status_payment == "Payment Not Received"){
                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 

                       }
                     else if (report[i].status_payment == "Payment Confirmed"){
                         $("#updatedesignerreportform  .status_payment").val(report[i].status_payment); 

                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 
                           $(".author_reportdesigner_detail :input").attr("disabled", false);
                           $("#add_more_reportdesigner").attr("disabled", false);


                       }
                      else if (report[i].status_payment == "Payment Not Accepted"){
                           $("#updatedesignerreportform  .status_payment").val(report[i].status_payment); 
                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 

                       }


                      if (report[i].date_delivered != null){
                             var dateToday = new Date(report[i].date_delivered); 
                      }
                      else{
                             var dateToday = null; 

                      }

                      // if (report[i].total_amount == null){
                      //     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");
                      // }
                      // else{
                      //     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(report[i].total_amount).toLocaleString("en") +".00");

                      // }
                      


                      $("#updatedesignerreportform input[name='pen_name']").val(report[i].pen_name);
       
                      $("#updatedesignerreportform input[name='designer_report_id']").val(report[i].designer_report_id);
                      $("#updatedesignerreportform input[name='book_categories']").val(report[i].book_categories);
                      $("#updatedesignerreportform input[name='author_name']").val(report[i].author_name);
                      $("#updatedesignerreportform .book_title").text(report[i].book_title);
                      $("#updatedesignerreportform input[name='book_size']").val(report[i].book_size);
                      $("#updatedesignerreportform input[name='color_type']").val(report[i].book_colortype);
                      $("#updatedesignerreportform .about_book").text(report[i].about_book);
                      $("#updatedesignerreportform .about_author").text(report[i].about_author);
                      $("#updatedesignerreportform .publishing_name").text(report[i].publishing_name);
                      $("#updatedesignerreportform .publishing_logo").text(report[i].publishing_logo_ints);
                     }
                   }
                   else{
                          $("#updatedesignerreportform  .project_status option[value='Approved For Completion']").hide(); 
                          $("#updatedesignerreportform  .project_status option[value='Pending']").show(); 
                          // $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").show(); 
                          // $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").show(); 
                          // $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").show(); 
                          // $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").show(); 

                          $("#updatedesignerreportform  .status_payment option[value='Pending']").show(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").show();
                           // $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").show(); 

                          // $("#updatedesignerreportform  .status_payment option[value='Pending']").show(); 
                          $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                          $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 


                   }


                      for (var i = 0; i < front_cover.length; i++) {
                         tr_front_cover_designer += '<tr>'+
                                   '<td style="display:none;"><input class="form-control designer_id" type="text" name="designer_id[]" value="'+front_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                    '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly readonly name="front_back_cover[]">'+front_cover[i].front_back_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2"  readonly name="actual_cover[]">'+front_cover[i].actual_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" readonly name="correct_cover[]">'+front_cover[i].correct_cover+'</textarea></td>'+
                                    '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" readonly name="status_cover[]" value="front_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                '</tr>';
                           }
                                                 
                       for (var i = 0; i < back_cover.length; i++) {

                          tr_back_cover_designer += '<tr>'+
                                   '<td style="display:none;"><input class="form-control designer_id" type="hidden" name="designer_id[]" value="'+back_cover[i].designer_id+'" style="height:50px; width:90px;" id="designer_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                    '<td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" readonly name="front_back_cover[]">'+back_cover[i].front_back_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control actual_cover" rows="2" readonly name="actual_cover[]">'+back_cover[i].actual_cover+'</textarea></td>'+
                                    '<td style="width:520px;"><textarea class="form-control correct_cover" rows="2" readonly name="correct_cover[]">'+back_cover[i].correct_cover+'</textarea></td>'+
                                    '<td style="width:100px; display:none;"><input type="text" class="form-control status_cover" readonly name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>'+

                                '</tr>';
                              }

                      
                        // $('#updatereportModal .author_report_detail').html(tr);
       

                        $('#update_designer_report_modal .front_cover_report_detail').html(tr_front_cover_designer);
                         $('#update_designer_report_modal .back_cover_report_detail').html(tr_back_cover_designer);


                     $(".author_reportdesigner_detail .charge_incurred").each(function() {
                            charge_amount += +$(this).val();
                     });
                     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");

              $("#update_designer_report_modal .author_reportdesigner_detail .charge_incurred").keyup(function(){

                            $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              charge_amount += +$(this).val();
                }); 
                    $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");

           }); 

                        $('#update_designer_report_modal #front_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});
                        $('#update_designer_report_modal #back_coverdataTable').DataTable({"autoWidth": false, columnDefs: [
                                { width: '15%', targets: 1 }
                            ],
                            "searching": false,
                             "paging": false,
                             "info": false,

                            fixedColumns: true});

              
                          $('#updatedesignerreportform .datepicker').datepicker({
                              clearBtn: true,
                              format: "dd/mm/yyyy",
                              startDate: dateToday,
                          }).datepicker("setDate", dateToday);


                  }
           });
       });



      $(document).on('click','#leaddataTable .view_interiordesigner_report',function(e) {
            var project_id= $(this).data('project_id');
            var user_id= $(this).data('user_id');
            dataEdit = 'project_id='+project_id+'&user_id='+user_id;
            var tr= '';
            var tr_front_cover_designer= '';
            var tr_back_cover_designer= '';
            var tr_transaction_payment_designer = '';
            var totalamount = 0;
            $("#updatedesignerreportform :input").attr("disabled", false);

                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designer_report' ,   
                  dataType: 'json',   
                  success:function(data){   
                      var report = data.report;   
                      var interior_designer = data.data_interior_designer;   
                      var transaction_payment = data.data_transaction_designer;   

                      if (transaction_payment.length > 0){
                            for (var i = 0; i < transaction_payment.length; i++) {

                              tr_transaction_payment_designer += '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="'+transaction_payment[i].transaction_id+'" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" value="'+transaction_payment[i].charge_incurred+'" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]">'+transaction_payment[i].remarktr_designer+'</textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                                  }
                            }
                         else
                           {
                             tr_transaction_payment_designer = '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="0" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]"></textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                            
                              }  
                        $('#update_designer_report_modal .author_reportdesigner_detail').html(tr_transaction_payment_designer);
       

                          for (var i = 0; i < report.length; i++) {
                              if (report[i].project_status_designer != ""){
                                   $("#updatedesignerreportform .project_status option[value='"+report[i].project_status_designer+"']").attr('selected', 'selected').text(report[i].project_status_designer).change();
                              }
                         
                              if (report[i].status_payment == "Payment Received"){

                                   $("#updatedesignerreportform .status_payment option[value='"+report[i].status_payment+"']").attr('selected', 'selected').text(report[i].status_payment).change();
                                   $("#updatedesignerreportform  .status_payment option[value='Payment Not Received']").remove(); 
                              }
                              else if (report[i].status_payment == "Payment Not Received"){

                                   $("#updatedesignerreportform .status_payment option[value='"+report[i].status_payment+"']").attr('selected', 'selected').text(report[i].status_payment).change();
                                   $("#updatedesignerreportform  .status_payment option[value='Payment Received']").remove(); 
                              }
                              else if (report[i].status_payment == "Payment Confirmed"){
                                   $("#updatedesignerreportform :input").attr("disabled", true);

                              }

                              else if (report[i].status_payment != "Payment Inprocess"){
                                   $("#updatedesignerreportform .status_payment option[value='"+report[i].status_payment+"']").attr('selected', 'selected').text(report[i].status_payment).change();
                              }
                             
                              if (report[i].date_delivered != null){
                                     var dateToday = new Date(report[i].date_delivered); 
                              }
                              else{
                                     var dateToday = null; 

                              }

                              if (report[i].total_amount == null){
                                  $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");
                              }
                              else{
                                  $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(report[i].total_amount).toLocaleString("en") +".00");

                              }
                     
                          $("#updatedesignerreportform input[name='pen_name']").val(report[i].pen_name);
                          $("#updatedesignerreportform input[name='audience']").val(report[i].audience);
                          $("#updatedesignerreportform input[name='number_of_book']").val(report[i].number_of_books);
                          $("#updatedesignerreportform input[name='author_picture']").val(report[i].author_picture);
                          $("#updatedesignerreportform input[name='book_color']").val(report[i].book_color);
                          $("#updatedesignerreportform input[name='project_id']").val(report[i].project_id);
                          $("#updatedesignerreportform input[name='report_id']").val(report[i].report_id);
                          $("#updatedesignerreportform input[name='user_id']").val(report[i].designer_user_id);
                          $("#updatedesignerreportform input[name='designer_report_id']").val(report[i].designer_report_id);
                          $("#updatedesignerreportform input[name='book_categories']").val(report[i].book_categories);
                          $("#updatedesignerreportform input[name='author_name']").val(report[i].author_name);
                          $("#updatedesignerreportform .book_title").text(report[i].book_title);
                          $("#updatedesignerreportform input[name='book_size']").val(report[i].book_size);
                          $("#updatedesignerreportform input[name='color_type']").val(report[i].book_colortype);
                          $("#updatedesignerreportform .about_book").text(report[i].about_book);
                          $("#updatedesignerreportform .about_author").text(report[i].about_author);
                          $("#updatedesignerreportform .publishing_name").text(report[i].publishing_name);
                          $("#updatedesignerreportform .publishing_logo").text(report[i].publishing_logo_ints);
                          $("#updatedesignerreportform .hard_cover_format").text(report[i].hard_cover_format);
                          $("#updatedesignerreportform .cover_design").text(report[i].cover_design_ints);
                          $("#updatedesignerreportform .interior_design").text(report[i].interior_design_ints);
                         }
                      for (var i = 0; i < interior_designer.length; i++) {

                        tr += '<tr>'+
                            '<td><input class="form-control page_number" readonly name="page_number[]" value="'+interior_designer[i].page_no+'" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Page Number"></td>'+
                            '<td style="width:100px;"><input type="text" readonly class="form-control paragraph_number" value="'+interior_designer[i].paragraph_no+'" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                            '<td style="width:100px;"><input type="text" readonly class="form-control line_number" name="line_number[]" value="'+interior_designer[i].line_no+'" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                            '<td style="width:520px;"><textarea readonly class="form-control actual_sentence" rows="2" name="actual_sentence[]">'+interior_designer[i].actual_sentence+'</textarea></td>'+
                            '<td style="width:520px;"><textarea readonly class="form-control correct_sentence" rows="2" name="correct_sentence[]">'+interior_designer[i].correct_sentence+'</textarea></td>'+
                         '</tr>';
                       }

                        
                      

                        $('#update_designer_report_modal .author_report_detail').html(tr);



              $("#update_designer_report_modal .author_reportdesigner_detail .charge_incurred").keyup(function(){
                         var charge_amount = 0;
         
                            $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              charge_amount += +$(this).val();

                }); 
                    $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");

           }); 

              
                          $('#updatedesignerreportform .datepicker').datepicker({
                              clearBtn: true,
                              format: "dd/mm/yyyy",
                              startDate: dateToday,
                          }).datepicker("setDate", dateToday);


                  }
           });
       });

      $(document).on('click','#leaddataTable .view_interiordesigneradmin_report',function(e) {
            var project_id= $(this).data('project_id');
            var user_id= $(this).data('user_id');
            var report_id= $(this).data('report_id');
            var designer_report_id= $(this).data('designer_report_id');
            var charge_amount = 0;

            $("#updatedesignerreportform input[name='project_id']").val(project_id);
            $("#updatedesignerreportform input[name='report_id']").val(report_id);
            $("#updatedesignerreportform input[name='user_id']").val(user_id);
            $("#updatedesignerreportform input[name='designer_report_id']").val(designer_report_id);

            dataEdit = 'project_id='+project_id+'&user_id='+user_id+'&designer_report_id='+designer_report_id;
            var tr= '';
            var tr_front_cover_designer= '';
            var tr_back_cover_designer= '';
            var tr_transaction_payment_designer = '';
            var totalamount = 0;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_designerinterior_report' ,
                  dataType: 'json',
                  success:function(data){
                      var report = data.report;
                      var interior_designer = data.data_interior_designer;
                      var transaction_payment = data.data_transaction_designer;

                     for (var i = 0; i < interior_designer.length; i++) {

                        tr += '<tr>'+
                            '<td><input class="form-control page_number" readonly name="page_number[]" value="'+interior_designer[i].page_no+'" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Page Number"></td>'+
                            '<td style="width:100px;"><input type="text" readonly class="form-control paragraph_number" value="'+interior_designer[i].paragraph_no+'" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                            '<td style="width:100px;"><input type="text" readonly class="form-control line_number" name="line_number[]" value="'+interior_designer[i].line_no+'" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                            '<td style="width:520px;"><textarea readonly class="form-control actual_sentence" rows="2" name="actual_sentence[]">'+interior_designer[i].actual_sentence+'</textarea></td>'+
                            '<td style="width:520px;"><textarea readonly class="form-control correct_sentence" rows="2" name="correct_sentence[]">'+interior_designer[i].correct_sentence+'</textarea></td>'+
                         '</tr>';
                       }
                      if (transaction_payment.length > 0){
                          for (var i = 0; i < transaction_payment.length; i++) {

                            tr_transaction_payment_designer += '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="'+transaction_payment[i].transaction_id+'" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" value="'+transaction_payment[i].charge_incurred+'" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]">'+transaction_payment[i].remarktr_designer+'</textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                                  }
                            }
                         else
                           {
                             tr_transaction_payment_designer = '<tr>'+
                                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="0" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Charge Occured"></td>'+
                                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]"></textarea></td>'+
                                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                                       '</tr>';
                            
                              }                 
                      

                         $('#update_designer_report_modal .author_report_detail').html(tr);

                         $('#update_designer_report_modal .author_reportdesigner_detail').html(tr_transaction_payment_designer);
                         $(".author_reportdesigner_detail :input").attr("disabled", true);
                         $("#add_more_reportdesigner").attr("disabled", true);
               
                if (report.length > 0){
                  for (var i = 0; i < report.length; i++) {
                      if (report[i].project_status_designer == null){
                           $("#updatedesignerreportform .project_status").val("Pending");

                      }
                      else{
                           $("#updatedesignerreportform .project_status").val(report[i].project_status_designer);
                           $("#updatedesignerreportform  .project_status option[value='Pending']").hide(); 

                      }
                      if (report[i].status_payment == null){
                           $("#updatedesignerreportform  .status_payment").val("Pending"); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 
                       }
       
                     else if (report[i].status_payment == "Payment Inprocess" || report[i].status_payment == "Pending"){
                           $("#updatedesignerreportform  .status_payment").val(report[i].status_payment); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 

                      }
       
                     else if (report[i].status_payment == "Payment Received"){
                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 

                       }
                    else if (report[i].status_payment == "Payment Not Received"){
                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 

                       }
                     else if (report[i].status_payment == "Payment Confirmed"){
                         $("#updatedesignerreportform  .status_payment").val(report[i].status_payment); 

                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 
                           $(".author_reportdesigner_detail :input").attr("disabled", false);
                           $("#add_more_reportdesigner").attr("disabled", false);


                       }
                      else if (report[i].status_payment == "Payment Not Accepted"){
                           $("#updatedesignerreportform  .status_payment").val(report[i].status_payment); 
                           $("#updatedesignerreportform  .status_payment option[value='Pending']").hide(); 
                           $("#updatedesignerreportform  .status_payment option[value='Payment Inprocess']").hide();
                           $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 

                       }



                      if (report[i].date_delivered != null){
                             var dateToday = new Date(report[i].date_delivered); 
                      }
                      else{
                             var dateToday = null; 

                      }
                      

                  
                      $("#updatedesignerreportform input[name='pen_name']").val(report[i].pen_name);
                      $("#updatedesignerreportform input[name='audience']").val(report[i].audience);
                      $("#updatedesignerreportform input[name='number_of_book']").val(report[i].number_of_books);
                      $("#updatedesignerreportform input[name='author_picture']").val(report[i].author_picture);
                      $("#updatedesignerreportform input[name='book_color']").val(report[i].book_color);
                      $("#updatedesignerreportform input[name='project_id']").val(report[i].project_id);
                      $("#updatedesignerreportform input[name='report_id']").val(report[i].report_id);
                      $("#updatedesignerreportform input[name='user_id']").val(report[i].user_id);
                      $("#updatedesignerreportform input[name='designer_report_id']").val(report[i].designer_report_id);
                      $("#updatedesignerreportform input[name='book_categories']").val(report[i].book_categories);
                      $("#updatedesignerreportform input[name='author_name']").val(report[i].author_name);
                      $("#updatedesignerreportform .book_title").text(report[i].book_title);
                      $("#updatedesignerreportform input[name='book_size']").val(report[i].book_size);
                      $("#updatedesignerreportform input[name='color_type']").val(report[i].book_colortype);
                      $("#updatedesignerreportform .about_book").text(report[i].about_book);
                      $("#updatedesignerreportform .about_author").text(report[i].about_author);
                      $("#updatedesignerreportform .publishing_name").text(report[i].publishing_name);
                      $("#updatedesignerreportform .publishing_logo").text(report[i].publishing_logo_ints);
                      $("#updatedesignerreportform .hard_cover_format").text(report[i].hard_cover_format);
                      $("#updatedesignerreportform .cover_design").text(report[i].cover_design_ints);
                      $("#updatedesignerreportform .interior_design").text(report[i].interior_design_ints);

                     }
                   }
                   else{
                        $("#updatedesignerreportform  .status_payment option[value='Payment Confirmed']").hide(); 
                        $("#updatedesignerreportform  .status_payment option[value='Payment Not Accepted']").hide(); 
                        $("#updatedesignerreportform  .project_status option[value='Approved For Completion']").hide(); 
                   }

                      $(".author_reportdesigner_detail .charge_incurred").each(function() {
                             charge_amount += +$(this).val();
                       }); 
                        $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");



              $("#update_designer_report_modal .author_reportdesigner_detail .charge_incurred").keyup(function(){
         
                            $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              charge_amount += +$(this).val();

                 }); 
                    $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(charge_amount).toLocaleString("en") +".00");

              }); 

              
                          $('#updatedesignerreportform .datepicker').datepicker({
                              clearBtn: true,
                              format: "dd/mm/yyyy",
                              startDate: dateToday,
                          }).datepicker("setDate", dateToday);


                  }
           });
       });



      $(document).on('click','#leaddataTable .view_report_author_toadmin',function(e) {
            var project_id= $(this).data('project_id');
      // $('#updatereportform input, textarea').attr('readonly', 'readonly');
      // $('#updatereportform select option:not(.project_status option)').attr('readonly', 'readonly');
            dataEdit = 'project_id='+project_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_author_report' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                      $("#updatereportform .author_name option[value='"+data[i].project_id+"']").attr('selected', 'selected').text(data[i].author_name).change();
                      $("#updatereportform .project_status option[value='"+data[i].project_status+"']").attr('selected', 'selected').text(data[i].project_status).change();
                      $('#updatereportform .book_categories option[value="'+data[i].book_categories+'"]').attr('selected', 'selected').text(data[i].book_categories).change();
                      $('#updatereportform .book_color option[value="'+data[i].book_color+'"]').attr('selected', 'selected').text(data[i].book_color).change();
                      $("#updatereportform .book_size option[value='"+data[i].book_size+"']").attr('selected', 'selected').text(data[i].book_size).change();
                      $("#updatereportform .color_type option[value='"+data[i].book_colortype+"']").attr('selected', 'selected').text(data[i].book_colortype).change();
                      $("#updatereportform .author_picture option[value='"+data[i].author_picture+"']").attr('selected', 'selected').text(data[i].author_picture).change();
                      $("#updatereportform .hard_cover_format option[value='"+data[i].hard_cover_format+"']").attr('selected', 'selected').text(data[i].hard_cover_format).change();
                      $("#updatereportform input[name='editor_name']").val(data[i].editor_name);
                      $("#updatereportform input[name='pen_name']").val(data[i].pen_name);
                      $("#updatereportform input[name='project_id']").val(setindex_prefix(data[i].project_id));
                      $("#updatereportform input[name='number_of_book']").val(data[i].number_of_books);
                      $("#updatereportform input[name='date_sold']").val(new Date(data[i].date_contract_signed).toLocaleDateString('en-GB'));

                      $("#updatereportform .book_title").text(data[i].book_title);
                      $("#updatereportform .about_author").text(data[i].about_author);
                      $("#updatereportform .about_book").text(data[i].about_book);
                      $("#updatereportform input[name='service_offered']").val(data[i].services_offered);
                      $("#updatereportform input[name='audience']").val(data[i].audience);
                      $("#updatereportform input[name='publishing_name']").val(data[i].publishing_name);
                      $("#updatereportform .cover_design").text(data[i].cover_design_ints);
                      $("#updatereportform .interior_design").text(data[i].interior_design_ints);
                       $("#updatereportform .cover_designer").text(data[i].cover_designer);
                      $("#updatereportform .interior_designer").text(data[i].interior_designer);
                      $("#updatereportform .mailing_address").text(data[i].mailing_address);
                      $("#updatereportform .publishing_logo").text(data[i].publishing_logo_ints);

                        tr += '<tr>'+
                                  '<td><input class="form-control activity" name="activity[]" value="'+data[i].activity+'" style="height:50px; width:255px;" id="activity" type="text" placeholder="Enter the Collection Activity"></td>'+
                                  '<input class="form-control activity" name="report_id[]" value="'+data[i].report_id+'" style="height:50px; width:255px;" id="activity" type="hidden" readonly placeholder="Enter the Collection Activity">'+
                                  '<td style="width:300px;">'+
                                   '<div class="form-group mb-4" style="margin-bottom:-25px !important;">'+
                                          '<div class="datepicker date input-group p-0 shadow-sm"><input type="text" placeholder="Choose a Due date" name="due_date[]"  class="form-control py-4 px-4 due_date" value="'+new Date(data[i].due_date).toISOString().slice(0, 10) .split('-').reverse().join('/')+'">'+
                                              '<div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</td>'+                    
                                  '<td style="width:185px;"><input class="form-control bud_get" name="bud_get[]" value="'+data[i].bud_get+'" style="height:50px;" id="bud_get" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Budget"></td>'+
                                  '<td style="width:223px;"><input class="form-control percentage" name="percentage[]" style="height:50px;" value="'+data[i].percentage+'" id="percentage" type="text" placeholder="Enter the Percentage"></td>'+
                                  '<td><div class="progress"><div  class="progress-bar bg-success progress-bar-striped" style="width:'+data[i].percentage+'%"></div> <div></td>'+
                                  '<td style="width:520px;"><input class="form-control remark" name="remark[]" style="height:50px;" value="'+data[i].remark+'" id="remark" type="text" placeholder="Enter the Remark"></td>'+
                               '</tr>';
                                                 
                           }
                        $('#updatereportModal .author_report_detail').html(tr);
                         $('.author_report_detail .datepicker').datepicker({
                                clearBtn: true,
                                format: "dd/mm/yyyy"
                            });
            

                  }
           });
       });
      $(document).on('click','#leaddataTable .view_report_author_status',function(e) {
            var project_id= $(this).data('project_id');

            dataEdit = 'project_id='+project_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_author_report' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                      $("#viewreportform input[name='author_name']").val(data[i].author_name);
                      $("#viewreportform input[name='editor_name']").val(data[i].editor_name);


                        tr += '<tr>'+
                                  '<td><input class="form-control activity" disabled name="activity[]" value="'+data[i].activity+'" style="height:50px; width:255px;" id="activity" type="text" placeholder="Enter the Collection Activity"></td>'+
                                  '<input class="form-control activity" disabled name="report_id[]" value="'+data[i].report_id+'" style="height:50px; width:255px;" id="activity" type="hidden" readonly placeholder="Enter the Collection Activity">'+
                                  '<td style="width:300px;">'+
                                   '<div class="form-group mb-4" style="margin-bottom:-25px !important;">'+
                                          '<div class="datepicker date input-group p-0 shadow-sm"><input type="text" disabled placeholder="Choose a Due date" name="due_date[]"  class="form-control py-4 px-4 due_date" value="'+new Date(data[i].due_date).toISOString().slice(0, 10) .split('-').reverse().join('/')+'">'+
                                              '<div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>'+
                                          '</div>'+
                                      '</div>'+
                                  '</td>'+                    
                                  '<td style="width:185px;"><input class="form-control bud_get" name="bud_get[]" disabled value="'+data[i].bud_get+'" style="height:50px;" id="bud_get" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Budget"></td>'+
                                  '<td style="width:223px;"><input class="form-control percentage" name="percentage[]" disabled style="height:50px;" value="'+data[i].percentage+'" id="percentage" type="text" placeholder="Enter the Percentage"></td>'+
                                  '<td><div class="progress"><div  class="progress-bar bg-success progress-bar-striped" disabled style="width:'+data[i].percentage+'%"></div> <div></td>'+
                                  '<td style="width:520px;"><input class="form-control remark" name="remark[]" style="height:50px;" disabled value="'+data[i].remark+'" id="remark" type="text" placeholder="Enter the Remark"></td>'+
                               '</tr>';
                                                 
                           }
                        $('#viewauthor_reportmodal .author_report_detail').html(tr);


                  }
           });
       });


       
      $(document).on('click','#leadremarkform #add_remark',function(e) {
              saveTo_remark();
      });

      function saveTo_remark()
      {
        $("#loader").css("display", "block");
        $("#loader_1").css("display", "block");
        $.ajax({
          url: base_url +'dashboard/add_remark_leadhistory',
          type: "POST",
          data: $("#leadremarkform").serialize(), // serializes the form's elements.
          dataType: 'json',
          success: function(res) {
              if (res.response=="success"){
                  $("#leadremarkform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#leadremarkform .alert-success").css("display", "block");
                  $("#leadremarkform .alert-success p").html(res.message);
                  setTimeout(function(){
                          $("#leadremarkform .alert-success").css("display", "none");
                          $("#leadremarkform")[0].reset();
                          $('#viewleadhistorymodal').modal('hide');
                          //location.reload();
                          $("#loader").css("display", "none");
                          $("#loader_1").css("display", "none");
                      },2000);

              }
               else{
                  $("#leadremarkform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#leadremarkform .alert-danger").css("display", "block");
                  $("#leadremarkform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#leadremarkform .alert-danger").css("display", "none");
                          $("#loader").css("display", "none");
                          $("#loader_1").css("display", "none");
                      },3000);


             }
          },
        });
      }

      $(document).on('click','#designerremarkform #add_remark',function(e) {
              saveToDESIGNER();
      });

      function saveToDESIGNER()
      {
        $.ajax({
          url: base_url +'dashboard/add_remark_desginerhistory',
          type: "POST",
          data: $("#designerremarkform").serialize(), // serializes the form's elements.
          dataType: 'json',
          success: function(res) {
              if (res.response=="success"){
                  $("#designerremarkform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#designerremarkform .alert-success").css("display", "block");
                  $("#designerremarkform .alert-success p").html(res.message);
                  setTimeout(function(){
                          $("#designerremarkform .alert-success").css("display", "none");
                      },4000);

              }
               else{
                  $("#designerremarkform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#designerremarkform .alert-danger").css("display", "block");
                  $("#designerremarkform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#designerremarkform .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
      }
         //add Subject
       $('#addsubjectform').on('click','#add_subject', function(){
           var nonempty = $('#addsubjectform .project_id').filter(function() {
           return this.checked != false
            });
            if (nonempty.length == 0) {
               $("#addsubjectform .alert-success").removeClass("alert-success").addClass("alert-danger");
               $("#addsubjectform .alert-danger").css("display", "block");
               $("#addsubjectform .alert-danger p").html("Please check author atleast once field");
            }
            else{
                add_Subject();
          }
        });
        function add_Subject(){
          $.ajax({
                 type: "POST",
                 url: base_url +'dashboard/add_subject',
                 dataType: 'json',
                 data: $("#addsubjectform").serialize(),
                 success: function(res) {
                if (res.response=="success"){
                    $("#addsubjectform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                    $("#addsubjectform .alert-success").css("display", "block");
                    $("#addsubjectform .alert-success p").html(res.message);
                      setTimeout(function(){
                          location.reload();
                        }, 2000);


                }
                 else{
                    $("#addsubjectform .alert-success").removeClass("alert-success").addClass("alert-danger");
                    $("#addsubjectform .alert-danger").css("display", "block");
                    $("#addsubjectform .alert-danger p").html(res.message);
                    setTimeout(function(){
                            $("#addsubjectform .alert-danger").css("display", "none");
                        },3000);
               }
            },
          });
        }
           //Update Subject
       $('#updatesubjectform').on('click','#update_subject', function(){
           var nonempty = $('#updatesubjectform .project_id').filter(function() {
           return this.checked != false
            });
            if (nonempty.length == 0) {
               $("#updatesubjectform .alert-success").removeClass("alert-success").addClass("alert-danger");
               $("#updatesubjectform .alert-danger").css("display", "block");
               $("#updatesubjectform .alert-danger p").html("Please check author atleast once field");
            }
            else{
                update_Subject();
          }
        });
        function update_Subject(){
          $.ajax({
                 type: "POST",
                 url: base_url +'dashboard/update_subject',
                 dataType: 'json',
                 data: $("#updatesubjectform").serialize(),
                 success: function(res) {
                if (res.response=="success"){
                    $("#updatesubjectform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                    $("#updatesubjectform .alert-success").css("display", "block");
                    $("#updatesubjectform .alert-success p").html(res.message);
                      setTimeout(function(){
                            $("#updatesubjectform .alert-danger").css("display", "none");
                        },3000);

                }
                 else{
                    $("#updatesubjectform .alert-success").removeClass("alert-success").addClass("alert-danger");
                    $("#updatesubjectform .alert-danger").css("display", "block");
                    $("#updatesubjectform .alert-danger p").html(res.message);
                    setTimeout(function(){
                            $("#updatesubjectform .alert-danger").css("display", "none");
                        },3000);
               }
            },
          });
        }

        $(document).on('click','#leaddataTablefixed .view_email_detail',function(e) {
            var project_id= $(this).data('project_id');

            dataEdit = 'project_id='+project_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/select_email' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                      $("#emailform input[name='email_address']").val(data[i].email_address);
                      $("#emailform input[name='project_id']").val(data[i].project_id);
                      $("#emailform input[name='subject']").val(data[i].author_name + ' :' +data[i].subject);
                                                 
                    }


                  }
           });
       });
          $(document).on('click','#historyemailtable .view_message_detail',function(e) {
            var history_email_id= $(this).data('history_email_id');

            dataEdit = 'history_email_id='+history_email_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/select_mesage' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        $("#messageModal input[name='email_address']").val(data[i].to);
                        $("#messageModal input[name='subject']").val(data[i].subject);
                         CKEDITOR.instances['messagetxtEditor'].setData(data[i].message);                                                  
                    }


                  }
           });
       });
      // $('input[type=hidden]').prop('disabled', true);
      // $('#addAssignUserform .date_lead_assign').on('change', function () {

      //    $.ajax({
      //          type: "POST",
      //          url: base_url +  "account/view_available_lead",
      //          dataType: 'json',
      //          data: $("#addAssignUserform").serialize(),
      //          success: function(res) {
      //           $('#addAssignUserform [name="number_of_lead"]').val(res);
      //        },
      //   });

      // });

       $(document).on("click", "#pay_lead_form .view_approval_history", function(e){
          e.preventDefault();
            var project_id= $(this).data('project_id');

            dataEdit = 'project_id='+project_id
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_approvalpayment_history' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {

                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].email_address+'</td>'+
                                  '<td>'+data[i].contact_number+'</td>'+
                                  '<td>'+data[i].area_code+'</td>'+
                                  '<td>$ '+parseFloat(data[i].initial_payment).toLocaleString("en")+'</td>'+
                                  '<td>'+data[i].approval_status_history+ ' - ' + new Date(data[i].approval_date_history).toLocaleString([], { hour12: true})+ '</td>'+
                                  '<td>'+data[i].approval_usercharge+'</td>'+
                                  '<td>'+data[i].approval_usertype+'</td>'+

                               '</tr>'; 
                         }
                        $('#approvalhistorymodal .viewapproval_payment').html(tr);
                        $('#approvalhistoryDatatable').DataTable({"sPaginationType": "listbox"});

                  }
           });

        });
       $(document).on("click", "#pay_lead_form .view_confirmpayment_history", function(e){
          e.preventDefault();
            var project_id= $(this).data('project_id');

            dataEdit = 'project_id='+project_id
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_confirmationpayment_history' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {

                        tr += '<tr>'+
                                  '<td>'+setindex_prefix(data[i].project_id)+'</td>'+
                                  '<td>'+data[i].product_name+'</td>'+
                                  '<td>'+data[i].author_name+'</td>'+
                                  '<td>'+data[i].book_title+'</td>'+
                                  '<td>'+data[i].email_address+'</td>'+
                                  '<td>'+data[i].contact_number+'</td>'+
                                  '<td>'+data[i].area_code+'</td>'+
                                  '<td>$ '+parseFloat(data[i].initial_payment).toLocaleString("en")+'</td>'+
                                  '<td>'+data[i].approval_payment_status+ ' - ' + new Date(data[i].payment_date_charge).toLocaleString([], { hour12: true})+ '</td>'+
                                  '<td>'+data[i].payment_usercharge+'</td>'+
                                  '<td>'+data[i].payment_usertype+'</td>'+

                               '</tr>'; 
                         }
                        $('#confirmationhistorymodal .viewconfirm_payment').html(tr);

                        $('#confirmationpaymenthistory').DataTable({"sPaginationType": "listbox"});

                  }
           });

        });

      // Add New Report
      function addnewreport(){
           var n= ($('.author_report_detail tr').length -0)+1;
           var tr= '<tr>'+
                      '<td style="display:none;"><input class="form-control interior_id" type="text" name="interior_id[]" value="0" style="height:50px; width:90px;" id="interior_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                      '<td><input class="form-control page_number" name="page_number[]" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Page Number"></td>'+
                      '<td style="width:100px;"><input type="text" class="form-control paragraph_number" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                      '<td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                      '<td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>'+
                      '<td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>'+
                      '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                   '</tr>';

                  $('.author_report_detail').append(tr);

                  //     $('.author_report_detail .datepicker').datepicker({
                  //       clearBtn: true,
                  //       format: "dd/mm/yyyy"
                  //   });

                  //   $("#addreportform .author_report_detail .percentage").keyup(function(){

                  //      var percentage = $(this).val();
                  //      $(this).closest("tr").find(".progress-bar").css('width', percentage +'%');
                       
                  // });
            }

      function updateaddnewreport(){
           var n= ($('#updatereportform .author_report_detail tr').length -0)+1;
           var tr= '<tr>'+
                      '<td><input class="form-control page_number" name="page_number[]" style="height:50px; width:90px;" id="page_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Page Number"></td>'+
                      '<td style="width:100px;"><input type="text" class="form-control paragraph_number" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Paragraph Number"></td>'+
                      '<td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" style="height:50px;" id="line_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="Enter the Line Number"></td>'+
                      '<td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>'+
                      '<td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>'+
                      '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                   '</tr>';

                  $('#updatereportform .author_report_detail').append(tr);

                  //     $('.author_report_detail .datepicker').datepicker({
                  //       clearBtn: true,
                  //       format: "dd/mm/yyyy"
                  //   });

                  //   $("#addreportform .author_report_detail .percentage").keyup(function(){

                  //      var percentage = $(this).val();
                  //      $(this).closest("tr").find(".progress-bar").css('width', percentage +'%');
                       
                  // });
            }

        // Add New Lead
      function addnewreportdesigner(){
                var totalamount = 0;

           var n= ($('.author_reportdesigner_detail tr').length -0)+1;
                tr = '<tr>'+
                        '<td style="display:none;"><input class="form-control transaction_id" type="hidden" name="transaction_id[]" value="0" style="height:50px; width:90px;" id="transaction_id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter the Page Number"></td>'+
                        '<td><input class="form-control charge_incurred" name="charge_incurred[]" style="height:50px; " id="charge_incurred" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" placeholder="Enter the Charge Occured"></td>'+
                        '<td style="width:520px;"><textarea class="form-control remark" rows="2"  name="remark[]"></textarea></td>'+
                        '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                      '</tr>';

                  $('.author_reportdesigner_detail').append(tr);


         

          } 

          


      // Add New Book Categories
      function addnewcategory(){
           var n= ($('.book_category_detail tr').length -0)+1;
           var tr= '<tr>'+
                      '<td><input class="form-control book_category" name="book_category[]" style="height:50px; width:255px;" id="book_category" type="text" placeholder="Enter a Book Category"></td>'+                   
                      '<td><input class="form-control book_size" name="book_size[]" style="height:50px;" id="book_size" type="text" placeholder="Enter a Book Size"></td>'+
                      '<td><button type="button" class="btn btn-danger remove" name="remove" id="remove">Remove</button></td>'+
                   '</tr>';

                  $('.book_category_detail').append(tr);
            }



      $(function(){
          $('#add_more_report').click(function(){
            addnewreport();
         });
      });

    $(function(){
          $('#updatereportform #add_more_report').click(function(){
              updateaddnewreport();
         });
      });
      $(function(){
          $('#add_more_reportdesigner').click(function(){
           addnewreportdesigner();

              $("#update_designer_report_modal .author_reportdesigner_detail .charge_incurred").keyup(function(){
                   var totalamount =0;
                 
                            $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              totalamount += +$(this).val();

                }); 
                     $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");


           }); 
         });
      });

      $(function(){
          $('#add_more_book_category').click(function(){
           addnewcategory();
         });
      });
        $('body').delegate('#addreportform #remove','click', function(){
                var count= $('#addreportform table').find('.author_report_detail').children().length;
                if (count!=1){
                  $(this).closest ('tr').remove();
             }
       });
        $('body').delegate('#addbookcategoryform #remove','click', function(){
                var count= $('#addbookcategoryform table').find('.book_category_detail').children().length;
                if (count!=1){
                  $(this).closest ('tr').remove();
             }
       });

      $('body').delegate('#updatedesignerreportform #remove','click', function(){
                var count= $('#updatedesignerreportform table').find('.author_reportdesigner_detail').children().length;
                if (count!=1){
                  $(this).closest ('tr').remove();
                   var totalamount =0;
                            $(".author_reportdesigner_detail .charge_incurred").each(function() {
                              totalamount += +$(this).val();

                }); 
                    $("#updatedesignerreportform input[name='total_amount']").val("Php :" +   parseFloat(totalamount).toLocaleString("en") +".00");

             }
       });


      // $('body').delegate('#update_lines_form #remove','click', function(){
      //        var report_id= $(this).data('report_id');
      //        var project_id= $(this).data('project_id');
      //        var access= $(this).data('access');

      //       dataEdit = 'report_id='+report_id+'&project_id='+project_id;
      //             $.ajax({
      //             type:'GET',
      //             data:dataEdit,
      //             url: base_url +'dashboard/delete_report' ,
      //             dataType: 'json',
      //             success: function(res) {
      //                 if (res.response=="success"){
      //                   console.log("success");
      //                 }
      //                  else{
      //                   console.log("error");

      //                }
      //             },
      //           });
      //         // var count= $('#update_lines_form table').find('.author_report_detail').children().length;
      //         //   if (count!=1){
      //             $(this).closest ('tr').remove();
      //        // }
              
      //  });


      $('body').delegate('#update_lines_form #remove','click', function(){
             var report_id= $(this).data('report_id');
             var project_id= $(this).data('project_id');
             var interior_id= $(this).data('interior_id');
             var access= $(this).data('access');

            dataEdit = 'interior_id='+interior_id+'&project_id='+project_id;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/delete_line_words' ,
                  dataType: 'json',
                  success: function(res) {
                      if (res.response=="success"){
                        console.log("success");
                      }
                       else{
                        console.log("error");

                     }
                  },
                });
              // var count= $('#update_lines_form table').find('.author_report_detail').children().length;
              //   if (count!=1){
                  $(this).closest ('tr').remove();
             // }
              
       });
        $("#addreportform .author_report_detail .percentage").keyup(function(){

           var percentage = $(this).val();
           $(this).closest("tr").find(".progress-bar").css('width', percentage +'%');
           
      });


        //add Author Report
       $('#addreportform').on('click','#add_report', function(){
        // alert($("#addreportform input[name='front_back_cover[]']").val());
           // var nonempty = $('#addreportform .activity, #addreportform .due_date, #addreportform .bud_get, #addreportform .percentage').filter(function() {
           // return this.value != ''
           //  });
           //  if (nonempty.length == 0) {
           //     $("#addreportform .alert-success").removeClass("alert-success").addClass("alert-danger");
           //     $("#addreportform .alert-danger").css("display", "block");
           //     $("#addreportform .alert-danger p").html("Please Add Report field atleast once");
           //  }
           //  else{
                Add_Report();
          // }
        });


        function Add_Report(){
          $.ajax({
                 type: "POST",
                 url: base_url +  "dashboard/add_report",
                 dataType: 'json',
                 data: $("#addreportform").serialize(),
                 success: function(res) {
                if (res.response=="success"){
                    $("#addreportform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                    $("#addreportform .alert-success").css("display", "block");
                    $("#addreportform .alert-success p").html(res.message);
                     $("html, body").animate({ scrollTop: 0 }, "slow");
                    setTimeout(function(){
                          location.reload();
                        }, 4000);



                }
                 else{
                    $("#addreportform .alert-success").removeClass("alert-success").addClass("alert-danger");
                    $("#addreportform .alert-danger").css("display", "block");
                    $("#addreportform .alert-danger p").html(res.message);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    setTimeout(function(){
                            $("#addreportform .alert-danger").css("display", "none");
                        },6000);

               }
            },
          });
        }

         //add Book Category
       // $('#addbookcategoryform').on('click','#add_category', function(){
       //     var nonempty = $('#addbookcategoryform .book_category, #addbookcategoryform .book_size').filter(function() {
       //     return this.value != ''
       //      });
       //      if (nonempty.length == 0) {
       //         $("#addbookcategoryform .alert-success").removeClass("alert-success").addClass("alert-danger");
       //         $("#addbookcategoryform .alert-danger").css("display", "block");
       //         $("#addbookcategoryform .alert-danger p").html("Please Add Book Category Book Size field atleast once");
       //      }
       //      else{
       //          Add_Book_Category();
       //    }
       //  });
       //    function Add_Book_Category(){
       //    $.ajax({
       //           type: "POST",
       //           url: base_url +  "dashboard/add_report",
       //           dataType: 'json',
       //           data: $("#addbookcategoryform").serialize(),
       //           success: function(res) {
       //          if (res.response=="success"){
       //              $("#addbookcategoryform .alert-danger").removeClass("alert-danger").addClass("alert-success");
       //              $("#addbookcategoryform .alert-success").css("display", "block");
       //              $("#addbookcategoryform .alert-success p").html(res.message);
       //              setTimeout(function(){
       //                    location.reload();
       //                  }, 2000);

       //          }
       //           else{
       //              $("#addbookcategoryform .alert-success").removeClass("alert-success").addClass("alert-danger");
       //              $("#addbookcategoryform .alert-danger").css("display", "block");
       //              $("#addbookcategoryform .alert-danger p").html(res.message);
       //              setTimeout(function(){
       //                      $("#addbookcategoryform .alert-danger").css("display", "none");
       //                  },3000);
       //         }
       //      },
       //    });
       //  }


        //Update Author Report
       $('#updatereportform').on('click','#update_report', function(){
           var nonempty = $('#updatereportform .activity, #updatereportform .due_date, #updatereportform .bud_get, #updatereportform .percentage').filter(function() {
           return this.value != ''
            });
            // if (nonempty.length == 0) {
            //    $("#updatereportform .alert-success").removeClass("alert-success").addClass("alert-danger");
            //    $("#updatereportform .alert-danger").css("display", "block");
            //    $("#updatereportform .alert-danger p").html("Please Add Report field atleast once");
            // }
            // else{
                Update_Report();
          // }
        });
        function Update_Report(){
          $.ajax({
                 type: "POST",
                 url: base_url +  "dashboard/update_report",
                 dataType: 'json',
                 data: $("#updatereportform").serialize(),
                 success: function(res) {
                if (res.response=="success"){
                    $("#updatereportform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                    $("#updatereportform .alert-success").css("display", "block");
                    $("#updatereportform .alert-success").css("clear", "left");
                    $("#updatereportform .alert-success p").html(res.message);
                    setTimeout(function(){
                          location.reload();
                        }, 1000);

                }
                 else{
                    $("#updatereportform .alert-success").removeClass("alert-success").addClass("alert-danger");
                    $("#updatereportform .alert-danger").css("display", "block");
                    $("#updatereportform .alert-danger").css("clear", "left");
                    $("#updatereportform .alert-danger p").html(res.message);
                    setTimeout(function(){
                            $("#updatereportform .alert-danger").css("display", "none");
                        },3000);
               }
            },
          });
        }
// update line words
     $(document).on('click','#update_lines_form #update_line_word',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_line_word",
               dataType: 'json',
               data: $("#update_lines_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_lines_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_lines_form .alert-success").css("display", "block");
                  $("#update_lines_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },1000);

              }
               else{
                  $("#update_lines_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_lines_form .alert-danger").css("display", "block");
                  $("#update_lines_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_lines_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });
//  front cover form
     $(document).on('click','#update_front_cover_form #update_front_cover',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_front_cover",
               dataType: 'json',
               data: $("#update_front_cover_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_front_cover_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_front_cover_form .alert-success").css("display", "block");
                  $("#update_front_cover_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },1000);

              }
               else{
                  $("#update_front_cover_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_front_cover_form .alert-danger").css("display", "block");
                  $("#update_front_cover_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_front_cover_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });
//  back cover form
     $(document).on('click','#update_back_cover_form #update_back_cover',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_back_cover",
               dataType: 'json',
               data: $("#update_back_cover_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_back_cover_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_back_cover_form .alert-success").css("display", "block");
                  $("#update_back_cover_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },1000);

              }
               else{
                  $("#update_back_cover_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_back_cover_form .alert-danger").css("display", "block");
                  $("#update_back_cover_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_back_cover_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

        // Addd Cover Report form
      $(document).on('click','#update_coverdesigner_form #update_cover_designer',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_cover_designer_report",
               dataType: 'json',
               data: $("#update_coverdesigner_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_coverdesigner_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_coverdesigner_form .alert-success").css("display", "block");
                  $("#update_coverdesigner_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#update_coverdesigner_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_coverdesigner_form .alert-danger").css("display", "block");
                  $("#update_coverdesigner_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_coverdesigner_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

        // Addd Interior Report form
      $(document).on('click','#update_interiordesigner_form #update_interior_designer',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_interior_designer_report",
               dataType: 'json',
               data: $("#update_interiordesigner_form").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#update_interiordesigner_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#update_interiordesigner_form .alert-success").css("display", "block");
                  $("#update_interiordesigner_form .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#update_interiordesigner_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#update_interiordesigner_form .alert-danger").css("display", "block");
                  $("#update_interiordesigner_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#update_interiordesigner_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

        // Update Report Cover And Interior Designer
      $(document).on('click','#updatedesignerreportform #update_report_designer',function(e) {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_report_designer_transaction",
               dataType: 'json',
               data: $("#updatedesignerreportform").serialize(),
               success: function(res) {
              if (res.response=="success"){
                  $("#updatedesignerreportform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#updatedesignerreportform .alert-success").css("display", "block");
                  $("#updatedesignerreportform .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#updatedesignerreportform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#updatedesignerreportform .alert-danger").css("display", "block");
                  $("#updatedesignerreportform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#updatedesignerreportform .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });


      // Addd Signature form
      $(document).on('click','#signatureform #add_signature',function(e) {
          // var description = tinyMCE.get('').getContent();

          var description = CKEDITOR.instances['signaturetxtEditor'].getData();
          var signature = $("#signatureform input[name='signature']").val();
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/add_signature",
               dataType: 'json',
               data: {signature:signature,
                      description:description,
                    },
               success: function(res) {
              if (res.response=="success"){
                  $("#signatureform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#signatureform .alert-success").css("display", "block");
                  $("#signatureform .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#signatureform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#signatureform .alert-danger").css("display", "block");
                  $("#signatureform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#signatureform .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });
      function htmlEntities(str) {
          return String(str).replace(/&amp;/g, '&');
      }
      // Edit Signature Form
      $(document).on('click','#updatesignatureform #update_signature',function(e) {
          // var description = tinyMCE.get('').getContent();
          var description = CKEDITOR.instances['editsignaturetxtEditor'].getData();
          var signature = $("#updatesignatureform input[name='signature']").val();
          var signature_id = $("#updatesignatureform input[name='signature_id']").val();
          var signature_exist = $("#updatesignatureform input[name='signature_exist']").val();
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/update_signature",
               dataType: 'json',
               data: {signature:signature,
                      description:description,
                      signature_id:signature_id,
                      signature_exist:signature_exist
                    },
               success: function(res) {
              if (res.response=="success"){
                  $("#updatesignatureform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#updatesignatureform .alert-success").css("display", "block");
                  $("#updatesignatureform .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#updatesignatureform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#updatesignatureform .alert-danger").css("display", "block");
                  $("#updatesignatureform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#updatesignatureform .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

      // Composr Email 
      $(document).on('click','#composeemailform #send_email',function(e) {
          // var description = tinyMCE.get('').getContent();
          var data = CKEDITOR.replace('emailEditor');
          var description = CKEDITOR.instances['emailEditor'].getData();
          var subject = $("#composeemailform input[name='subject']").val();
          var email_address = $("#composeemailform input[name='email_address']").val();
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/send_email",
               dataType: 'json',
               data: {subject:subject,
                      description:description,
                      email_address:email_address
                    },
               success: function(res) {
              if (res.response=="success"){
                  $("#composeemailform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#composeemailform .alert-success").css("display", "block");
                  $("#composeemailform .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#composeemailform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#composeemailform .alert-danger").css("display", "block");
                  $("#composeemailform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#composeemailform .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });

      // send email author
      $(document).on('click','#emailform #send_email_author',function(e) {
          // var description = tinyMCE.get('').getContent();
          var description = CKEDITOR.instances['txtEditor'].getData();
          var subject = $("#emailform input[name='subject']").val();
          var project_id = $("#emailform input[name='project_id']").val();
          var email_address = $("#emailform input[name='email_address']").val();
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/send_email_author",
               dataType: 'json',
               data: {subject:subject,
                      description:description,
                      project_id:project_id,
                      email_address:email_address
                    },
               success: function(res) {
              if (res.response=="success"){
                  $("#emailform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#emailform .alert-success").css("display", "block");
                  $("#emailform .alert-success p").html(res.message);
                  setTimeout(function(){
                               location.reload();
                      },4000);

              }
               else{
                  $("#emailform .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#emailform .alert-danger").css("display", "block");
                  $("#emailform .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#emailform .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
       });


      // send email author
      $(document).on('click','.send_email_author',function(e) {
          // var description = tinyMCE.get('').getContent();
         var subject= $(this).data('subject');
         var project_id= $(this).data('project_id');
        $.ajax({
               type: "GET",
               url: base_url +  "dashboard/send_email_author",
               dataType: 'json',
               data: {subject:subject,
                      project_id:project_id
                    },
                success: function(res) {
                    console.log(res);

             },
        });
       });
      $(document).on('click','.view_email_history',function(e) {
            var project_id= $(this).data('project_id');

            dataEdit = 'project_id='+project_id;

            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_email_history/',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        tr += '<tr>'+
                                  '<td>'+data[i].from+'</td>'+
                                  '<td>'+data[i].subject+'</td>'+
                                  '<td>'+data[i].usertype+'</td>'+
                                  '<td>'+new Date(data[i].date_sent).toLocaleDateString('en-GB')+'</td>'+
                               '</tr>'; 
                         }

                    if(data.length > 0){
                        $('#emailhistoryModal .view_email_history').html(tr);

                       }
                       else{
                          $('#emailhistoryModal .view_email_history').html('');
                       }

                       $('#historyemailtable').DataTable({"sPaginationType": "listbox"});
                  },
           });
       });

      //View Edit Signature

        $(document).on('click','#leaddataTablefixed .view_signature_detail',function(e) {
            var signature_id= $(this).data('signature_id');
            dataEdit = 'signature_id='+signature_id;
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/select_signature' ,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        $("#updatesignatureform input[name='signature']").val(data[i].signature);
                        $("#updatesignatureform input[name='signature_exist']").val(data[i].signature);
                        $("#updatesignatureform input[name='signature_id']").val(data[i].signature_id);
                        CKEDITOR.instances['editsignaturetxtEditor'].setData(data[i].description);  

                                                 
                    }


                  }
           });
       });
        $('#composeemailform [name="signature"]').on('change', function () {
                  $.ajax({
                  type:'POST',
                  url: base_url +'dashboard/select_signature_email' ,
                  data:$("#composeemailform").serialize(),
                  dataType: 'json',
                  success:function(data){
                    if(data != false){
                       for (var i = 0; i < data.length; i++) {
                         CKEDITOR.instances['emailEditor'].setData(data[i].description);  

                         }
                     }
                    else{
                         CKEDITOR.instances['emailEditor'].setData(data[i].description);                      
                    }

                  }
           });

       });

      $('#addreportform [name="project_id"]').on('change', function () {
        $(".project_status").attr('readonly', false);
        $(".interior_designer").attr('readonly', false);
        $(".cover_designer").attr('readonly', false);
        $(".publisher_id").attr('readonly', false);
        $(".pen_name").attr('readonly', false);
        $(".number_of_book").attr('readonly', false);
        $(".book_categories").attr('readonly', false);
        $(".book_color").attr('readonly', false);
        $(".book_size").attr('readonly', false);
        $(".color_type").attr('readonly', false);
        $(".hard_cover_format").attr('readonly', false);
        $(".audience").attr('readonly', false);
        $(".about_author").attr('readonly', false);
        $(".about_book").attr('readonly', false);
        $(".cover_design").attr('readonly', false);
        $(".interior_design").attr('readonly', false);
        $(".publishing_logo").attr('readonly', false);
        $(".mailing_address").attr('readonly', false);
        $(".publishing_name").attr('readonly', false);
        $(".author_picture").attr('readonly', false);
        $.ajax({
                  type:'POST',
                  url: base_url +'dashboard/select_author_name' ,
                  data:$("#addreportform").serialize(),
                  dataType: 'json',
                  success:function(data){
                      var report = data.report;
                      var interior_designer = data.data_interior_designer;
                      var cover_designer = data.data_cover_designer;
                      var author_details = data.author_data;

                      if (author_details =='false'){
                          $("#addreportform .alert-success").removeClass("alert-success").addClass("alert-danger");
                          $("#addreportform .alert-danger").css("display", "block");
                          $("#addreportform .alert-danger p").html("Your selected project is not found or matched the Author's User . Please create or tell the author's to register of their account from Horizon Website.");
                            // ("html, body").animate({ scrollTop: 0 }, "slow");
                            $(".add_report").attr('disabled', true);
                          setTimeout(function(){
                                  $("#addreportform .alert-danger").css("display", "none");
                              },9000);



                        }
                      else{
                           // ("html, body").animate({ scrollTop: 0 }, "slow");
                           $("#addreportform input[name='author_id']").val(author_details.ID);
                           $("#addreportform .alert-danger").css("display", "none");
                           $(".add_report").attr('disabled', false);


                      }

                   
                    if(data != false){
                       for (var i = 0; i < report.length; i++) {
                          $("#addreportform input[name='date_sold']").val(new Date(report[i].date_contract_signed).toLocaleDateString('en-GB'));
                          $("#addreportform input[name='author_name']").val(report[i].author_name);
                          $("#addreportform .book_title").text(report[i].book_title);
                          $("#addreportform input[name='service_offered']").val(report[i].product_name);
                          $("#addreportform .mailing_address").text(report[i].address);
                          $("#addreportform .project_status option[value='"+report[i].project_status+"']").attr('selected', 'selected').text(report[i].project_status).change();
                          $('#addreportform .book_categories option[value="'+report[i].book_categories+'"]').attr('selected', 'selected').text(report[i].book_categories).change();
                          $('#addreportform .book_color option[value="'+report[i].book_color+'"]').attr('selected', 'selected').text(report[i].book_color).change();
                          $("#addreportform .book_size option[value='"+report[i].book_size+"']").attr('selected', 'selected').text(report[i].book_size).change();
                          $("#addreportform .color_type option[value='"+report[i].book_colortype+"']").attr('selected', 'selected').text(report[i].book_colortype).change();
                          $("#addreportform .author_picture option[value='"+report[i].author_picture+"']").attr('selected', 'selected').text(report[i].author_picture).change();
                          $("#addreportform .hard_cover_format option[value='"+report[i].hard_cover_format+"']").attr('selected', 'selected').text(report[i].hard_cover_format).change();
                          
                          $("#addreportform input[name='editor_name']").val(report[i].editor_name);
                          $("#addreportform input[name='pen_name']").val(report[i].pen_name);
                          $("#addreportform input[name='number_of_book']").val(report[i].number_of_books);
                          $("#addreportform input[name='report_id']").val(report[i].report_id);
                          $("#addreportform input[name='publishing_name']").val(report[i].publishing_name);


                          // $("#addreportform .book_title").text(report[i].book_title);
                          $("#addreportform .about_author").text(report[i].about_author);
                          $("#addreportform .about_book").text(report[i].about_book);
                          $("#addreportform input[name='service_offered']").val(report[i].services_offered);
                          $("#addreportform input[name='audience']").val(report[i].audience);
                          $("#addreportform input[name='publishing_name']").val(report[i].publishing_name);
                          $("#addreportform .cover_design").text(report[i].cover_design_ints);
                          $("#addreportform .interior_design").text(report[i].interior_design_ints);
                          $("#addreportform .publishing_logo").text(report[i].publishing_logo_ints);

                         }
                        for (var i = 0; i < interior_designer.length; i++) {

                           $("#addreportform .interior_designer option[value='"+interior_designer[i].interior_user_id+"']").attr("selected", true);
                           $("#addreportform .publisher_id option[value='"+interior_designer[i].publisher_id+"']").attr("selected", true);


                       }
                        for (var i = 0; i < cover_designer.length; i++) {

                           $("#addreportform .cover_designer option[value='"+cover_designer[i].cover_user_id+"']").attr("selected", true);
                           $("#addreportform .publisher_id option[value='"+cover_designer[i].publisher_id+"']").attr("selected", true);

                     
                       }
                     }
                    else{
                          $("#addreportform input[name='date_sold']").val('');
                          $("#addreportform input[name='author_name']").val('');                  
                          $("#addreportform .book_title").text('');                  
                          $("#addreportform input[name='service_offered']").val();
                          $("#addreportform .mailing_address").text('');     
                          $("#addreportform input[name='editor_name']").val('');
                          $("#addreportform input[name='pen_name']").val('');
                          $("#addreportform input[name='number_of_book']").val('');
                          $("#addreportform input[name='report_id']").val('');
                          $("#addreportform input[name='publishing_name']").val('');

                          // $("#addreportform .book_title").text(report[i].book_title);
                          $("#addreportform .about_author").text('');
                          $("#addreportform .about_book").text('');
                          $("#addreportform input[name='service_offered']").val('');
                          $("#addreportform input[name='audience']").val('');
                          $("#addreportform input[name='publishing_name']").val('');
                          $("#addreportform .cover_design").text('');
                          $("#addreportform .interior_design").text('');
                          $("#addreportform .publishing_logo").text('');
                          $("#addreportform .cover_designer").val('');
                          $("#addreportform .publisher_id").val('');
                          $("#addreportform .interior_designer").val('');
                          $("#addreportform .cover_designer option[value='']").attr('selected', true);
                          $("#addreportform .publisher_id option[value='']").attr('selected', true);
                          $("#addreportform .interior_designer option[value='']").attr('selected', true);


                         }             
                    }
           });

       });

     $('#updatesubmissionform [name="project_id"]').on('change', function () {
        $(".project_status").attr('readonly', false);
        $(".interior_designer").attr('disabled', false);
        $(".cover_designer").attr('disabled', false);
        $(".publisher_id").attr('disabled', false);
        $(".pen_name").attr('disabled', false);
        $(".number_of_book").attr('disabled', false);
        $(".book_categories").attr('disabled', false);
        $("#updatesubmissionform .dropdown-toggle").removeClass("disabled");
        $(".book_color").attr('disabled', false);
        $(".book_size").attr('disabled', false);
        $(".color_type").attr('disabled', false);
        $(".hard_cover_format").attr('disabled', false);
        $(".audience").attr('disabled', false);
        $(".about_author").attr('disabled', false);
        $(".about_book").attr('disabled', false);
        $(".cover_design").attr('disabled', false);
        $(".interior_design").attr('disabled', false);
        $(".publishing_logo").attr('disabled', false);
        $(".mailing_address").attr('disabled', false);
        $(".publishing_name").attr('disabled', false);
        $(".author_picture").attr('disabled', false);
        $.ajax({
                  type:'POST',
                  url: base_url +'dashboard/select_author_name' ,
                  data:$("#updatesubmissionform").serialize(),
                  dataType: 'json', 
                  success:function(data){
                      var report = data.report;
                      var interior_designer = data.data_interior_designer;
                      var cover_designer = data.data_cover_designer;
                    if(data != false){
                       for (var i = 0; i < report.length; i++) {
                          $("#updatesubmissionform input[name='date_sold']").val(new Date(report[i].date_contract_signed).toLocaleDateString('en-GB'));
                          $("#updatesubmissionform input[name='author_name']").val(report[i].author_name);
                          // $("#updatesubmissionform .book_title").text(report[i].book_title);
                          // $("#updatesubmissionform input[name='service_offered']").val(report[i].product_name);
                          $("#updatesubmissionform input[name='service_offered']").val(report[i].services_offered);
                          $("#updatesubmissionform .project_status option[value='"+report[i].project_status+"']").attr('selected', 'selected').text(report[i].project_status).change(); 
                          // $("#updatesubmissionform input[name='editor_name']").val(report[i].editor_name);
                          // $("#updatesubmissionform input[name='pen_name']").val(report[i].pen_name);
                          // $("#updatesubmissionform input[name='number_of_book']").val(report[i].number_of_books);
                          // $("#updatesubmissionform input[name='publishing_name']").val(report[i].publishing_name); 
                          // $("#updatesubmissionform .cover_design").text(report[i].cover_design_ints);
                          // $("#updatesubmissionform .interior_design").text(report[i].interior_design_ints);
                          // $("#updatesubmissionform .publishing_logo").text(report[i].publishing_logo_ints);

                         }
                       //  for (var i = 0; i < interior_designer.length; i++) {

                       //     $("#updatesubmissionform .interior_designer option[value='"+interior_designer[i].interior_user_id+"']").attr("selected", true);
                       //     $("#updatesubmissionform .publisher_id option[value='"+cover_designer[i].publisher_id+"']").attr("selected", true);


                       // }
                       //  for (var i = 0; i < cover_designer.length; i++) {

                       //     $("#updatesubmissionform .cover_designer option[value='"+cover_designer[i].cover_user_id+"']").attr("selected", true);
                       //     $("#updatesubmissionform .publisher_id option[value='"+cover_designer[i].publisher_id+"']").attr("selected", true);

                     
                       // }
                     }
                    else{



                         }             
                    }
           });

       });
      $('#updatereportform [name="project_id"]').on('change', function () {
        $.ajax({
                  type:'POST',
                  url: base_url +'dashboard/select_author_name' ,
                  data:$("#updatereportform").serialize(),
                  dataType: 'json',
                  success:function(data){
                    if(data != false){
                       for (var i = 0; i < data.length; i++) {
                          $("#updatereportform input[name='date_sold']").val(new Date(data[i].date_contract_signed).toLocaleDateString('en-GB'));
                          $("#updatereportform input[name='author_name']").val(data[i].author_name);
                          $("#updatereportform .book_title").text(data[i].book_title);
                          $("#updatereportform input[name='service_offered']").val(data[i].product_name);
                          $("#updatereportform .mailing_address").text(data[i].address);
                         }
                     }
                    else{
                          $("#updatereportform input[name='date_sold']").val('');
                          $("#updatereportform input[name='author_name']").val('');                  
                          $("#updatereportform .book_title").text('');                  
                          $("#updatereportform input[name='service_offered']").val();
                          $("#updatereportform .mailing_address").text('');                  
                    }

                  }
           });

       });

          $('#emailform [name="signature"]').on('change', function () {
                  $.ajax({
                  type:'POST',
                  url: base_url +'dashboard/select_signature_email' ,
                  data:$("#emailform").serialize(),
                  dataType: 'json',
                  success:function(data){
                    if(data != false){
                       for (var i = 0; i < data.length; i++) {
                         CKEDITOR.instances['txtEditor'].setData(data[i].description);                                                  

                         }
                     }
                    else{
                         CKEDITOR.instances['txtEditor'].setData('');                                                  
                    }

                  }
           });

       });


      $(document).on('click','#file_form #add_file',function(e) {
          // $('#leaddataTablefixed').DataTable({"sPaginationType": "listbox"}).ajax.reload( null, true);
          $.ajax({
          url: base_url +'dashboard/add_file_reamrk',
          type: "POST",
          data: $("#file_form").serialize(), // serializes the form's elements.
          dataType: 'json',
          success: function(res) {
              if (res.response=="success"){
                  $("#file_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#file_form .alert-success").css("display", "block");
                  $("#file_form .alert-success p").html(res.message);
                  setTimeout(function(){
                          $("#file_form .alert-success").css("display", "none");
                      },4000);

              }
               else{
                  $("#file_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#file_form .alert-danger").css("display", "block");
                  $("#file_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#file_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
      });
      $(document).on('click','.file_details .view_filehistory',function(e) {
        e.preventDefault();
            var file_id= $(this).data('file_id');
            var file_name = $(this).data('file_name');
             $("#file_form input[name='file_id']").val(file_id);
             $("#file_form input[name='file_name']").val(file_name);
             var ext = file_name.split('.').pop();

             if (ext == "pdf"){
                   $('.iframe').attr('src', base_url+'uploads/'+file_name);

             }
            else if (ext == "jpg"  || ext == "jpeg" || ext == "png" || ext == "gif" ){
                   $('.iframe').attr('src', base_url+'uploads/'+file_name).css("margin", "0px auto");

            }
            else  if (ext == "zip"){
                   $('.iframe').attr('src', "");

           }
            else if (ext == "doc" || ext == "xlsx" || ext == "xls" || ext == "docx" || ext == "ppt" || ext == "pptx" || ext == "csv"){
               $('.iframe').attr("src", "https://docs.google.com/gview?url="+base_url+"uploads/"+file_name+"&embedded=true");

           }

            dataEdit = 'file_id='+ file_id;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_file_remark/',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {

                        tr += '<tr>'+
                                  '<td>'+data[i].from_user+'</td>'+
                                  '<td>'+data[i].comment+'</td>'+
                                  '<td>'+jQuery.timeago(new Date(data[i].date_comment))+'</td>'+
                                  '<td>'+new Date(data[i].date_comment).toLocaleDateString('en-GB')+'</td>'+
                               '</tr>'; 
                         }

                       if(tr !=''){
                        $('#viewfilehistorymodal .viewfilehistory').html(tr);

                       }
                       else{
                          $('#viewleadhistorymodal .viewleadhistory').html('');
                       }

                       $('#historyfileTable').DataTable({"sPaginationType": "listbox"});
                  }
           });
       });



//filter performance TASK

     $('#performance_task_form #user_id').on('change', function () {
         $.ajax({
               type: "POST",
               url: base_url +  "dashboard/select_performance_task",
               dataType: 'json',
               data: $("#performance_task_form").serialize(),
               success: function(res) {
               // alert(moment(res.time_in).format('hh:mm:ss'));
                 $('.time_in').text(res.time_in == null ? "00:00:00" : moment(res.time_in).format('hh:mm:ss'));
                 $('.time_out').text(res.time_out == null ? "00:00:00" : moment(res.time_out).format('hh:mm:ss'));
                 $('.current_call_logs').text(res.current_call_logs + '/50');
                 $('.prev_call_logs').text(res.prev_call_logs + '/50');
                 $('.current_pipes').text(res.current_pipes + '/5');
                 $('.prev_pipes').text(res.prev_pipes + '/5');
                 $('.current_quota').text(res.current_quota);
                 $('.prev_qouta').text(res.prev_qouta);
                 $('.excess_break').text(res.excess_break);
                 $('.excess_lunch').text(res.excess_lunch);


             },
        });

      });


         // $.ajax({
         //      url:   base_url +  "dashboard/lead_email_update_ajax",       
         //      method: 'POST',
         //      dataType: 'json',
         //      success: function (data) {
         //           var load_data = []
         //          for (var i = 0; i < data.length; i++) {
         //               load_data.push({
         //                      'Project ID': setindex_prefix(data[i].project_id),
         //                      'Package Name': data[i].product_name,
         //                      'Author Name': data[i].author_name,
         //                      'Book Title': data[i].book_title,
         //                      'Email Address': data[i].email_address,
         //                      'Contact #': data[i].contact_number,
         //                      'Area Code': data[i].area_code,
         //                      'Subject':  data[i].subject,
         //                      'Date Create':new Date(data[i].date_create).toLocaleDateString('en-GB'),
         //                      "<input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'>": "<td style='text-align:center;'><input type='checkbox' name='project_id[]' class='form-check-input project_id' value="+data[i].project_id+"></td>"
         //                  })      
         //             }
         //            var table = $('#leaddataTableemail_author_update').removeAttr('width').DataTable( {
         //                data: load_data,
         //                deferRender:    true,
         //                paging:false,
         //                scrollY:        500,
         //                scrollCollapse: true,
         //                scroller:       true,
         //                fixedColumns: true,
         //                "columns": [{
         //                   "data": "Project ID"
         //                  },{
         //                    "data": "Package Name"
         //                  },{
         //                    "data": "Author Name"
         //                  },{
         //                    "data": "Book Title"
         //                  },{
         //                    "data": "Email Address"
         //                  },{
         //                    "data": "Contact #"
         //                  },{
         //                    "data": "Area Code"
         //                  },{
         //                    "data": "Date Create"
         //                  },{
         //                    "data": "<input type='checkbox' id='check_all_author' class='form-check-input' style='position:relative; width:45px;'>"
         //                  }
         //                  ]
         //                 });
         //            }
         //  });


      // $(document).ready(function(){
      //   var state = history.state || {};
      //   var reloadCount = state.reloadCount || 0;
      //   if (performance.navigation.type === 1) { // Reload
      //       state.reloadCount = ++reloadCount;
      //       history.replaceState(state, null, document.URL);
      //        // $.get(base_url +  "account/visit_page", function(data){
      //            // console.log(data);
      //       // });

      //   } else if (reloadCount) {
      //       reloadCount = 0;
      //       delete state.reloadCount;
      //       history.replaceState(state, null, document.URL);
      //   } 
      //      $.ajax({  
      //             url:  base_url +  "account/visit_page",
      //             type: "POST",  
      //             data: {  
      //                 reloadCount: reloadCount,
      //                 current_url: window.location.href
      //             },  
      //             dataType: "json",  
      //             success: function(res) { 
      //                 console.log(res.response);
      //             }  
      //         });  
      //     });
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
       $.fn.dataTable.ext.errMode = 'none';

        // viewallactivitie default total saels
        // var isFirst = true;
        // var totalamount = 0;
        //   $("#leaddataTable .viewleadactivities tr").each(function(index) {
        //           var amount_paid = $(this).find('.amount_paid').text().replace("$", "").replace(",", "");
        //           var status =      $(this).find('td.status').text();
        //           var payment_status =  $(this).find('.status_payment').text().indexOf('Paid') > -1;
        //           var status_payment =  $(this).find('.status_payment').text();
        //           var thisId = $(this).find('#project_id').text();
        //           var sumVal = parseFloat($(this).find('.amount_paid').text().replace('$','').replace(',', ''));
        //          // dd only if the value is number
        //           if(!isNaN(payment_status) && payment_status == true)   {
        //                if(!isFirst)
        //                   totalamount += parseFloat(amount_paid); 
        //                else{
        //                    totalamount=parseFloat(amount_paid);
        //                    isFirst=false;
        //               }
        //           }
        //    });

        // $('#sales .total_sales, .tile_stats_count .total_sales').text('$ ' + totalamount.toLocaleString("en")+'.00');  

//  function copyToClipboard() {

//   var aux = document.createElement("input");
//   aux.setAttribute("value", "print screen disabled!");      
//   document.body.appendChild(aux);
//   aux.select();
//   document.execCommand("copy");
//   // Remove it from the body
//   document.body.removeChild(aux);
//   alert("Print screen disabled!");
// }

// $(window).keyup(function(e){
//   if(e.keyCode == 44){
//     copyToClipboard();
//   }
// });

      $(document).on('click','#comment_form #add_comment',function(e) {
          $.ajax({
          type: "POST",
          url: base_url +'dashboard/add_production_remark',
          dataType: 'json',
          data: $("#comment_form").serialize(), // serializes the form's elements.
          success: function(res) {
              if (res.response=="success"){
                location.reload();
                  $("#comment_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
                  $("#comment_form .alert-success").css("display", "block");
                  $("#comment_form .alert-success p").html(res.message);
                  setTimeout(function(){
                          $("#file_form .alert-success").css("display", "none");
                      },4000);

              }
               else{
                  $("#comment_form .alert-success").removeClass("alert-success").addClass("alert-danger");
                  $("#comment_form .alert-danger").css("display", "block");
                  $("#comment_form .alert-danger p").html(res.message);
                  setTimeout(function(){
                          $("#file_form .alert-danger").css("display", "none");
                      },3000);


             }
          },
        });
      });




$(function () {
    var start = moment().subtract(29, 'days');
    var end = moment();
    var get_user_id = 0;
    $("#sales_total_form input[name='from_date']").val(start.format('YYYY-MM-DD'));
    $("#sales_total_form input[name='end_date']").val(end.format('YYYY-MM-DD'));
    function cb(start, end) {
        $('#sales_report_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $("#sales_total_form input[name='from_date']").val(start.format('YYYY-MM-DD'));
        $("#sales_total_form input[name='end_date']").val(end.format('YYYY-MM-DD'));
    }

    $('#sales_report_range').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);


  $('#sales_report_range').on('apply.daterangepicker', function(ev, picker) {

     var start = picker.startDate.format('YYYY-MM-DD');
     var end = picker.endDate.format('YYYY-MM-DD');
     $("#sales_total_form input[name='from_date']").val(start);
     $("#sales_total_form input[name='to_date']").val(end);
       let total_sales = 0;
       let total_deduction = 0;
       let get_percentage =  0;
       let commission_receivable =  0; 
     $.ajax({
               type: "POST",
               url: base_url +  "dashboard/select_total_sales",
               dataType: 'json',
               data: $("#sales_total_form").serialize(),
               success: function(data) {

                 if (data == null){
                       $(".total_sales").text('0.00');

                 }
                 else{
                   total_sales = data.total_amount;
                   total_deduction = data.deduction;
                   get_percentage = (data.total_amount - 500) * 46 * 0.2;
                    commission_receivable= get_percentage  - data.deduction;
                  $(".total_sales").text(parseFloat(total_sales.replace(",","")).toLocaleString("en")+'.00');
                  $(".commission_deduction").text(total_deduction == null ? '₱0.00' : '₱'+ total_deduction +'.00');
                  $(".total_commission").text('₱' + get_percentage.toFixed(2));
                  $(".commission_receivable").text('₱' + commission_receivable.toFixed(2));
                

                 }
              
               },
          });

     });

  
    $('#sales_total_form .agent_type').on('change', function () {
        $.ajax({
               type: "POST",
               url: base_url +  "dashboard/select_total_sales",
               dataType: 'json',
               data: $("#sales_total_form").serialize(),
               success: function(data) {
                 var total_sales = data.total_amount;
                var total_deduction = data.deduction;
                var get_percentage = data.total_amount * 46 * 0.2;
                var commission_receivable= get_percentage  - data.deduction - 500;
                $(".total_sales").text(parseFloat(total_sales.replace(",","")).toLocaleString("en")+'.00s');
                // $(".commission_deduction").text(parseFloat(total_deduction.replace(",","")).toLocaleString("en")+'.00');
                $(".total_commission").text(parseFloat(get_percentage.replace(",","")).toLocaleString("en")+'.00s');
                $(".commission_receivable").text(parseFloat(commission_receivable.replace(",","")).toLocaleString("en")+'.00s');


               },
          });

    });
  
});





       //      $(document).on('click','#comment_form #add_comment',function(e) {
       //    // var description = tinyMCE.get('').getContent();
       //    var id = $(this).data('project_id');
       //    var remark = document.getElementById("remark");
       //    alert(remark);
       //    exit();
       //   var subject= $(this).data('subject');
       //   var project_id= $(this).data('project_id');
       //  $.ajax({
       //         type: "GET",
       //         url: base_url +  "dashboard/add_production_remark",
       //         dataType: 'json',
       //         data: {subject:subject,
       //                project_id:project_id
       //              },
       //          success: function(res) {
       //              console.log(res);

       //       },
       //  });
       // });

          // Change Publisher/Marketing will copy to Cover/Interior Designer
          $("#updatereportform  .publisher_id").change(function(){
            var val = $("#updatereportform  .publisher_id").find(":selected").text();
            $("#updatereportform  .interior_designer option:contains("+ val +")").attr('selected', 'selected');
            $("#updatereportform  .cover_designer option:contains("+ val +")").attr('selected', 'selected');
          });


      $(document).on('click','.deduction_detail',function(e) {

            var tr= '';
            var tr_status_lead= '';
                  $.ajax({
                  type:'GET',
                  url: base_url +'dashboard/view_user_deductions',
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        tr += '<tr>'+
                                  '<td>'+data[i].deduction_type+'</td>'+
                                  '<td>'+data[i].amount+'</td>'+
                                  '<td>'+new Date(data[i].deduction_date).toLocaleString()+'</td>'+
                               '</tr>'; 
                         }
                        $('#deductionmodal .viewdeduction').html(tr);

                     // for (var i = 0; i < data.length; i++) {
                     //    tr_status_lead += '<tr>'+
                     //              '<td>'+data[i].firstname + ' ' + data[i].lastname +'</td>'+
                     //              '<td>'+data[i].collection_status+'</td>'+
                     //              '<td>'+new Date(data[i].alter_date_commitment).toLocaleString([], { hour12: true})+'</td>'+
                     //           '</tr>'; 
                     //     }
                     //    $('#viewleadremarkhistorymodal .viewlead_status_history').html(tr_status_lead);
                     //    $(".viewleadremarkhistory td").filter(function() {
                     //            return $(this).text() == 'undefined';
                     //        }).closest("tr").remove();
                     //     $(".viewlead_status_history td").filter(function() {
                     //            return $(this).text() == 'undefined undefined';
                     //        }).closest("tr").remove();
                     //     $('#historyremarkleadtable').DataTable({"sPaginationType": "listbox"});
                         $('#deductiontable').DataTable({"sPaginationType": "listbox"});

                  }
           });
       });

      $(document).on('click','.view_project_history',function(e) {

        var project_id= $(this).data('project_id');
              dataEdit = 'project_id='+ project_id;;
            var tr= '';
                  $.ajax({
                  type:'GET',
                  data:dataEdit,
                  url: base_url +'dashboard/view_project_history/'+ project_id,
                  dataType: 'json',
                  success:function(data){
                      for (var i = 0; i < data.length; i++) {
                        tr += '<tr>'+
                                  '<td>'+data[i].user_charge+'</td>'+
                                  '<td>'+data[i].usertype+'</td>'+
                                  '<td>'+data[i].status_history+'</td>'+
                                  '<td>'+new Date(data[i].date_history).toLocaleString([], { hour12: true})+'</td>'+
                               '</tr>'; 
                         }
                          $('#viewprojectremarkhistorymodal .viewprojectremarkhistory').html(tr);

                          $('#historyremarkprojecttable').DataTable({"sPaginationType": "listbox"});

                  }
           });
       });


        //Update Author Submission
       $(document).on('click','#updatesubmissionform #update_submission', function(e){

          $.ajax({
                 type: "POST",
                 url: base_url +  "dashboard/update_submission",
                 dataType: 'json',
                 data: $("#updatesubmissionform").serialize(),
                 success: function(res) {
                if (res.response=="success"){
                    $("#updatesubmissionform .alert-danger").removeClass("alert-danger").addClass("alert-success");
                    $("#updatesubmissionform .alert-success").css("display", "block");
                    $("#updatesubmissionform .alert-success").css("clear", "left");
                    $("#updatesubmissionform .alert-success p").html(res.message);
                      $("html, body").animate({ scrollTop: 0 }, "slow");
                      setTimeout(function(){
                           window.location.href = res.redirect;
                          }, 1000);
                }
                 else{
                    $("#updatesubmissionform .alert-success").removeClass("alert-success").addClass("alert-danger");
                    $("#updatesubmissionform .alert-danger").css("display", "block");
                    $("#updatesubmissionform .alert-danger").css("clear", "left");
                    $("#updatesubmissionform .alert-danger p").html(res.message);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    setTimeout(function(){
                            $("#updatesubmissionform .alert-danger").css("display", "none");
                        },3000);
               }
            }
          });
        });

       $(document).on('change','#leadremarkform #pre_suggestion', function(e){
          var text = this.value;
          $("#leadremarkform .remark").val(text);
      });

       $(document).on('blur ','.exampleFormControlTextarea',function(e) {
          var special_note = $(this).val();
          var project_id= $(this).data('project_id');
          var author_name= $(this).data('author_name');
          dataEdit = 'project_id='+ project_id + '&author_name='+ author_name  + '&remark='+ special_note ;
          var t = $(this).closest("tr").find(".badge-success");
            $.ajax({
              type: "GET",
              data:dataEdit,
              url: base_url +'dashboard/add_remark_leadhistory_auto',
              dataType: 'json',
              success: function(res) {
               t.text('Date: ' + moment().format('YYYY/MM/DD HH:mm:ss'));
               },
            });

        });

      function saveTo_remark_Auto()
      {
              }




  //      function addTimes(startTime, endTime) {
  //             var times = [ 0, 0, 0 ]
  //             var max = times.length

  //             var a = (startTime || '').split(':')
  //             var b = (endTime || '').split(':')

  //             // normalize time values
  //             for (var i = 0; i < max; i++) {
  //               a[i] = isNaN(parseInt(a[i])) ? 0 : parseInt(a[i])
  //               b[i] = isNaN(parseInt(b[i])) ? 0 : parseInt(b[i])
  //             }

  //             // store time values
  //             for (var i = 0; i < max; i++) {
  //               times[i] = a[i] + b[i]
  //             }

  //             var hours = times[0]
  //             var minutes = times[1]
  //             var seconds = times[2]

  //             if (seconds >= 60) {
  //               var m = (seconds / 60) << 0
  //               minutes += m
  //               seconds -= 60 * m
  //             }

  //             if (minutes >= 60) {
  //                 var  res = (minutes / 60) | 0;
  //                 hours += res;
  //                 minutes = minutes - (60 * res);
  //             }

  //               return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2)
  // }
     
  $('#leaddataTable').DataTable( {
              "processing": true,
              "serverSide": false,
              "ajax": {
                  "url":   base_url +  "dashboard/load_data_user",
                  "type": "POST",
                              "dataSrc":"",
              },
              deferRender:    true,
              "sPaginationType": "listbox",
                scrollY:        1000,
                       scrollCollapse: true,
               scroller:       true,
          columns: [
              { data: 'project_id',
                    "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return setindex_prefix_lead(data);                          
                          }
               },
              { data: 'product_name' },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="+row.author_name+" data-project_id="+row.project_id+" data-userid="+session_user_id+">"+row.author_name+"</a>"; 
                        }
               }, 
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='http://google.com/search?q="+row.author_name+"+"+row.book_title+"' target='blank'>"+row.book_title+"</a>"; 
                        }
               }, 
              { data: 'email_address' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='callto:"+row.contact_number+"'>"+row.contact_number+"</a>"; 
                        }
               }, 
              { data: 'income_level' },
              { data: 'lead_owner' },
              { data: 'price' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var status = row.date_approve == null ? row.status: row.status +' - '+ new Date(row.date_approve).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+status+'</span> ';                          
                        }
               },
               { data: 'contractual_status'},
               { data: null,
                "render" : function( data, type, row, full ) {

                            var create_remark = row.create_remark == null ? '': row.create_remark ;
                            var date_create_remark = row.date_create_remark == null ? '': row.date_create_remark ;

                            return '<td class="text-center"><textarea data-author_name="'+row.author_name+'" data-project_id="'+row.project_id+'" data-userid="'+session_user_id+'" class="form-control exampleFormControlTextarea"  style="width:130px;"  name="special_note"  rows="2">'+create_remark+'</textarea><span class="badge badge-success">Date: '+date_create_remark+'</span></td>'; 
                        }
               }, 
                { data: 'lead_date_agent_assign',
                "render" : function( data, type, row, full ) {
                            var lead_date_agent_assign = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                            return lead_date_agent_assign;                          
                        }
               },
               //  { data: 'date_create_remark',
               //      "render" : function( data, type, full ) {
               //              // you could prepend a dollar sign before returning, or do it
               //              // in the formatNumber method itself
               //              var date_create_remark = data == null ? '': data ;
               //              return date_create_remark;                          
               //            }
               // },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<td><button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='"+row.author_name+"' data-project_id='"+row.project_id+"'>View</a>"; 
                        }
               },
              { data: null,
                "render" : function( data, type, row, full ) {
                             if(row.status == 'In Progress'){
                                  return "<button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='"+row.project_id+"'>Collect</button></td>";
                                }
                                else{
                                 return "<button type='button' class='btn btn-success'>Collect</button>";

                                }                         
                        }
               },
           ],
         });



  $('#leadManagerdataTable').DataTable( {
              "processing": true,
              "serverSide": true,
              "ajax": {
                  "url":   base_url +  "dashboard/load_data_user_limit",
                  "type": "POST",
              },
              "sPaginationType": "listbox",
          columns: [
              { data: 'project_id',
                    "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return setindex_prefix_lead(data);                          
                          }
               },
              { data: 'product_name' },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="+row.author_name+" data-project_id="+row.project_id+" data-userid="+session_user_id+">"+row.author_name+"</a>"; 
                        }
               }, 
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='http://google.com/search?q="+row.author_name+"+"+row.book_title+"' target='blank'>"+row.book_title+"</a>"; 
                        }
               }, 
              { data: 'email_address' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='callto:"+row.contact_number+"'>"+row.contact_number+"</a>"; 
                        }
               }, 
              { data: 'income_level' },
              { data: 'lead_owner' },
              { data: 'price' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var status = row.status == null ? row.status: row.status +' - '+ new Date(row.date_create).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+status+'</span> ';                          
                        }
               },
               { data: 'contractual_status'},
               { data: null,
                "render" : function( data, type, row, full ) {

                            var create_remark = row.create_remark == null ? '': row.create_remark ;
                            var date_create_remark = row.date_create_remark == null ? '': row.date_create_remark ;

                            return '<td class="text-center"><textarea data-author_name="'+row.author_name+'" data-project_id="'+row.project_id+'" data-userid="'+session_user_id+'" class="form-control exampleFormControlTextarea"  style="width:130px;"  name="special_note"  rows="2">'+create_remark+'</textarea><span class="badge badge-success">Date: '+date_create_remark+'</span></td>'; 
                        }
               }, 
                { data: 'lead_date_agent_assign',
                "render" : function( data, type, row, full ) {
                            var lead_date_agent_assign = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                            return lead_date_agent_assign;                          
                        }
               },
               //  { data: 'date_create_remark',
               //      "render" : function( data, type, full ) {
               //              // you could prepend a dollar sign before returning, or do it
               //              // in the formatNumber method itself
               //              var date_create_remark = data == null ? '': data ;
               //              return date_create_remark;                          
               //            }
               // },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<td><button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='"+row.author_name+"' data-project_id='"+row.project_id+"'>View</a>"; 
                        }
               },
              { data: null,
                "render" : function( data, type, row, full ) {
                             if(row.status == 'In Progress'){
                                  return "<button type='button' style='color:#ffffff !important;' class='btn btn-warning view_pay_leaddetail' data-toggle='modal' data-target='#payleadmodal' data-backdrop='static' data-keyboard='false' data-project_id='"+row.project_id+"'>Collect</button></td>";
                                }
                                else{
                                 return "<button type='button' class='btn btn-success'>Collect</button>";

                                }                         
                        }
               },
           ],
         });

      $('#leadManagerDashboarddataTable').DataTable( {
              "processing": true,
              "serverSide": true,
              "ajax": {
                  "url":   base_url +  "dashboard/load_data_user_limit",
                  "type": "POST",
              },
              "sPaginationType": "listbox",
          columns: [
              { data: 'project_id',
                    "render" : function( data, type, full ) {
                            // you could prepend a dollar sign before returning, or do it
                            // in the formatNumber method itself
                            return setindex_prefix_lead(data);                          
                          }
               },
              { data: 'product_name' },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='#' class='view_leadhistory' data-toggle='modal' data-target='#viewleadhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name="+row.author_name+" data-project_id="+row.project_id+" data-userid="+session_user_id+">"+row.author_name+"</a>"; 
                        }
               }, 
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='http://google.com/search?q="+row.author_name+"+"+row.book_title+"' target='blank'>"+row.book_title+"</a>"; 
                        }
               }, 
              { data: 'email_address' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            return "<a href='callto:"+row.contact_number+"'>"+row.contact_number+"</a>"; 
                        }
               }, 
              { data: 'income_level' },
              { data: 'lead_owner' },
              { data: 'price' },
              { data: 'remaining_balance' },
              { data: null,
                "render" : function( data, type, row, full ) {
                            var status = row.status == null ? row.status: row.status +' - '+ new Date(row.date_create).toLocaleDateString('en-GB');
                            return "<span class='approval_status'>"+status+'</span> ';                          
                        }
               },
                { data: 'lead_date_agent_assign',
                "render" : function( data, type, row, full ) {
                            var lead_date_agent_assign = data == null ? '': new Date(data).toLocaleDateString('en-GB');
                            return lead_date_agent_assign;                          
                        }
               },
                { data: 'contractual_status'},
               //  { data: 'date_create_remark',
               //      "render" : function( data, type, full ) {
               //              // you could prepend a dollar sign before returning, or do it
               //              // in the formatNumber method itself
               //              var date_create_remark = data == null ? '': data ;
               //              return date_create_remark;                          
               //            }
               // },
               { data: null,
                "render" : function( data, type, row, full ) {
                            return "<td><button type='button' class='btn btn-outline-info viewleadremark_history1' data-toggle='modal' data-target='#viewleadremarkhistorymodal' data-backdrop='static' data-keyboard='false' data-author_name='"+row.author_name+"' data-project_id='"+row.project_id+"'>View</a>"; 
                        }
               }
           ],
         });




  $(document).on('click',' #status_lead_form #recyle_lead',function(e) {
      $("#loader").css("display", "block");


      $.ajax({

             type: "POST",

             url: base_url +  "dashboard/get_recycle_lead",

             dataType: 'json',

             data: $("#status_lead_form").serialize(),

             success: function(res) {

            if (res.response=="success"){

                $("#status_lead_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

                $("#status_lead_form .alert-success").css("display", "block");

                $("#status_lead_form .alert-success p").html(res.message);

                setTimeout(function(){
                     $("#loader").css("display", "none");
                      location.reload();

                    }, 2000);

            }

             else{

                $("#status_lead_form .alert-success").removeClass("alert-success").addClass("alert-danger");

                $("#status_lead_form .alert-danger").css("display", "block");

                $("#status_lead_form .alert-danger p").html(res.message);

                setTimeout(function(){
                      $("#loader").css("display", "none");

                        $("#status_lead_form .alert-danger").css("display", "none");

                    },4000);

           }

        },

      });

 });
