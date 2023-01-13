 /*Reset id value when refresh*/
 window.onload = function() {
  document.getElementById('myid').value = '1';
  }

    $(document).on('click','.add_criterion_parent .add_more_criterion_description',function(e) {


      var  newdivs2 =  '<div class="d-flex justify-content-center">' +
                                '<p class="add_more_criterion_description"><i class="fa fa-plus-circle text-success"></i></p>' +
                                '<div class="border p-1">' +
                                    '<div>' +
                                        '<select class="form-control mb-1" name="criteria-points0[]">' +
                                            '<option value="1">1</option>' +
                                            '<option value="2">2</option>' +
                                            '<option value="3">3</option>' +
                                            '<option value="4">4</option>' +
                                            '<option value="5">5</option>' +
                                            '<option value="6">6</option>' +
                                            '<option value="7">7</option>' +
                                            '<option value="8">8</option>' +
                                            '<option value="9">9</option>' +
                                            '<option value="10">10</option>' +
                                        '</select>' +
                                    '</div>' +
                                    '<div>' +
                                        '<input class="form-control mb-1" type="text" name="level-title0[]" placeholder="Level title">' +
                                    '</div>' +
                                    '<div>' +
                                        '<textarea class="form-control" name="level-description0[]" cols="2" rows="1"></textarea>' +                       
                                    '</div>' +
                                '</div>' +
                            '</div>';
                        
       $(this).parent().append(newdivs2);

 });


// Addd attendance form
$(document).on('click','.add_criterion .add_more_criterion_description',function(e) {
      var myid = document.getElementById('myid').value;
      var  newdivs2 =  '<div class="d-flex justify-content-center">' +
                                '<p class="add_more_criterion_description"><i class="fa fa-plus-circle text-success"></i></p>' +
                                '<div class="border p-1">' +
                                    '<div>' +
                                        '<select class="form-control mb-1" name="criteria-points'+(myid-1)+'[]">' +
                                            '<option value="1">1</option>' +
                                            '<option value="2">2</option>' +
                                            '<option value="3">3</option>' +
                                            '<option value="4">4</option>' +
                                            '<option value="5">5</option>' +
                                            '<option value="6">6</option>' +
                                            '<option value="7">7</option>' +
                                            '<option value="8">8</option>' +
                                            '<option value="9">9</option>' +
                                            '<option value="10">10</option>' +
                                        '</select>' +
                                    '</div>' +
                                    '<div>' +
                                        '<input class="form-control mb-1" type="text" name="level-title'+(myid-1)+'[]" placeholder="Level title">' +
                                    '</div>' +
                                    '<div>' +
                                        '<textarea class="form-control" name="level-description'+(myid-1)+'[]" cols="2" rows="1"></textarea>' +                       
                                    '</div>' +
                                '</div>' +
                            '</div>';
                        
       $(this).parent().append(newdivs2);


 });

function addCriterion(){

            [].forEach.call(document.querySelectorAll('.add_more_criterion_description'), function (el) {
                el.style.visibility = 'hidden';
            });

            var myid = document.getElementById('myid').value;
            var n= ($('.add_criterion div').length -0)+1;

            var criterion = '<div class="row">' +
                                '<div class="row p-1">' +
                                '<div class="col-lg-12">' +
                                   ' <div class="border rounded p-2">' +
                                        '<div class="row">' +
                                            '<div class="col-lg-8">' +
                                                '<input class="form-control border-0 bg-light" type="text" id="critle" name="criteria-title[]" placeholder="Criterion title (required)">' +
                                            '</div>' +
                                            '<div class="col-lg-4">' +
                                                '<p class="bg-light text-right">/5 <a href="#"><span class="font-weight-bold">&vellip;</span></a></p>' +
                                            '</div>' +
                                        '</div>' +

                                        '<div>' +
                                           ' <textarea class="form-control border-0 bg-light mb-2" name="criteria-description[]" cols="30" rows="3" placeholder="Criterion description"></textarea>' +
                                        '</div>' +
                                
                                        '<div class="d-flex justify-content-center">' +
                                            '<p class="add_more_criterion_description"><i class="fa fa-plus-circle text-success"></i></p>' +
                                            '<div class="border p-1">' +
                                                '<div>' +
                                                    '<select class="form-control mb-1" name="criteria-points'+myid+'[]">' +
                                                        '<option value="1">1</option>' +
                                                        '<option value="2">2</option>' +
                                                        '<option value="3">3</option>' +
                                                        '<option value="4">4</option>' +
                                                        '<option value="5">5</option>' +
                                                        '<option value="6">6</option>' +
                                                        '<option value="7">7</option>' +
                                                        '<option value="8">8</option>' +
                                                        '<option value="9">9</option>' +
                                                        '<option value="10">10</option>' +
                                                    '</select>' +
                                                '</div>' +
                                                '<div>' +
                                                   ' <input class="form-control mb-1" type="text" name="level-title'+myid+'[]" placeholder="Level title">' +
                                                '</div>' +
                                                '<div>' +
                                                    '<textarea class="form-control" name="level-description'+myid+'[]" cols="2" rows="1"></textarea>' +
                                                '</div>' +
                                            '</div>' +

                                            '<div class="newdiv d-flex"></div>' +

                                        '</div>' +
                                    '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' ;
                        
            $('.add_criterion').append(criterion);
            document.getElementById('myid').value = parseInt(myid)+1;
    }



 
