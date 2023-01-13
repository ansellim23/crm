	/*const searchButton = document.getElementById('search-button');
const searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  const inputValue = searchInput.value;
  alert(inputValue);
});*/

//add projects
$(document).on('click','#add_project_form #add_project',function(e) {
    e.preventDefault();

     // alert("test");

 var form_data = new FormData($('#add_project_form')[0]);
$.ajax({
       type: "POST",
       url: base_url +  "dashboard/add_project",
       data: form_data,
       dataType: 'json',
       processData: false,
       contentType: false,
       success: function(res) {
      if (res.response=="success"){

          $("#add_project_form .alert-danger").removeClass("alert-danger").addClass("alert-success");
          $("#add_project_form .alert-success").css("display", "block");
          $("#add_project_form .alert-success p").html(res.message);
            setTimeout(function(){
                         location.reload();
                },1000);

      }

       else{
          $("#add_project_form .alert-success").removeClass("alert-success").addClass("alert-danger");
          $("#add_project_form .alert-danger").css("display", "block");
          $("#add_project_form .alert-danger p").html(res.message);
          setTimeout(function(){
                  $("#add_project_form .alert-danger").css("display", "none");
              },4000);

     }
  },

});

});

//update projects 
$(document).on('click','#update_project_form #update_project',function(e) {
  e.preventDefault();

  var form_data = new FormData($('#update_project_form')[0]);

 $.ajax({

       type: "POST",

       url: base_url +  "dashboard/update_project",

       data: form_data,

       dataType: 'json',

       processData: false,

       contentType: false,


       success: function(res) {

      if (res.response=="success"){

          $("#update_project_form .alert-danger").removeClass("alert-danger").addClass("alert-success");

          $("#update_project_form .alert-success").css("display", "block");

          $("#update_project_form .alert-success p").html(res.message);

          setTimeout(function(){

                location.reload();

              }, 2000);



      }

       else{

          $("#update_project_form .alert-success").removeClass("alert-success").addClass("alert-danger");

          $("#update_project_form .alert-danger").css("display", "block");

          $("#update_project_form .alert-danger p").html(res.message);

          setTimeout(function(){

                  $("#update_project_form .alert-danger").css("display", "none");

              },3000);





     }

  },

});

});

//add description
function addDescription(){

    var description =  '<div id="description">' +
                          '<label>Description</label>' +
                          '<input class="form-control" type="text" name="description[]">' +
                       '</div>';

     $('#add_description').append(description);

}

//view update project
  $(document).on("click", "#view_project", function(e){

      e.preventDefault();

      var projectid= $(this).data('projectid');

      // alert(projectid);
      // exit();

      dataEdit = 'project_id='+ projectid;

          $.ajax({

          type:'GET',

          data:dataEdit,

          url: base_url +'dashboard/view_project_details/'+ projectid,

          dataType: 'json',

          success:function(data){
              // console.log(data);
              // var tr ="";
           var details_stages = "";
           var status = "";



              for (var i = 0; i < data.length; i++) {

                 $("#update_project_form #project_name option[value='"+data[i].project_name+"']").attr('selected', 'selected');

                if (data[i].status == "completed") {
                   status = '<option selected value="completed">completed</option>' +
                            '<option value="pending">pending</option>';
                }
                  else{
                  status = '<option value="completed">completed</option>' +
                           '<option selected value="pending">pending</option>';
                }
                 
                details_stages +=  '<div>' +
                                    '<input type="hidden" name="project_id" value="'+data[i].project_id+'">' +
                                    '<input type="hidden" name="stage_id[]  " value="'+data[i].stage_id+'">' +
                                   '<label>Description</label>' +
                                   '<input class="form-control" type="text" value="'+data[i].description+'" name="description[]">'+
                                     '<label class="mr-2">Status</label>' +
                                     '<select class="browser-default mt-1" name="status[]">'+
                                        status +
                                     '</select>' +
                                    '</div>';

                                  
                }

                $('.details_stage').html(details_stages);

            }

    });



  });

//Side Modal - Add New Report
    $(function(){
        $('#add_more_report').click(function(){
          addnewreport();
       });
    });

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

          }