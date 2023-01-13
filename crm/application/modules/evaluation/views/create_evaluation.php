<!-- page content -->
        <div class="right_col" role="main" style=" height: 100px; overflow-y: scroll;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
          </div>
        </div>
          <!-- /top tiles -->
  <div class="card mb-3">
    <!-- page content -->
      <form id="addevaluationform" method="post">
        <!-- <div class="alert alert-success"><p></p></div> -->
      <div class="container mt-5 p-3 text-dark">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-1">
                        <p><i class="fa fa-file-text-o"></i></p>
                    </div>
                    <div class="col-md-8 border-bottom bg-light mb-3">
                        <p class="p-2">Title</p>
                        <input type="text" class="form-control" name="title" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <p><i class="fa fa-bars"></i></p>
                    </div>
                    <div class="col-lg-8">
                        <!-- <textarea class="form-control border-0 bg-light" name="" id="editsignaturetxtEditor" cols="30" rows="5" placeholder="Instructions (optional)"></textarea> -->
                        <textarea class="form-control description"  cols="30" rows="5" name="description"></textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <p>Add the criteria you'll use to evaluate student work as well as any performance
                    levels or descriptions you want to include. Students will recieve a copy of this 
                    rubric with their assignment.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="border p-2">
                    <p>Form</p>
                       <select class="form-control border-0 bg-light" name="form-type" id="selectForm">
                           <option value="Employee Evaluation">Employee Evaluation</option>
                           <option value="Company Evaluation">Company Evaluation</option>
                       </select>
                    <p>Evaluator</p>
                       <select class="form-control border-0 bg-light" name="from_user[]" id="from_user1">
                           <?
                              if($all_users > 0){
                                foreach ($all_users as $user) {
                                  echo "<option value='".$user['user_id']."'>".$user['firstname']." ".$user['lastname']." - ".$user['usertype']."</option>";
                                }
                              }
                            ?>
                       </select>
                       <select class="form-control border-0 bg-light" name="from_user[]" id="from_user2" multiple hidden disabled>
                           <?
                              if($all_users > 0){
                                foreach ($all_users as $user) {
                                  echo "<option value='".$user['user_id']."'>".$user['firstname']." ".$user['lastname']." - ".$user['usertype']."</option>";
                                }
                              }
                            ?>
                       </select>
                    <p>Evaluatee</p>
                       <select class="form-control border-0 bg-light" name="to_user[]" id="to_user2" hidden disabled>
                           <?
                              if($all_users > 0){
                                foreach ($all_users as $user) {
                                    if ($user['user_id'] == 7) {
                                  echo "<option value='".$user['user_id']."'>".$user['firstname']." ".$user['lastname']." - ".$user['usertype']."</option>";
                                    }
                                }
                              }
                            ?>
                       </select>
                       <select class="form-control border-0 bg-light" name="to_user[]" id="to_user1" multiple>
                           <?
                              if($all_users > 0){
                                foreach ($all_users as $user) {
                                  echo "<option value='".$user['user_id']."'>".$user['firstname']." ".$user['lastname']." - ".$user['usertype']."</option>";
                                }
                              }
                            ?>
                       </select>
<!--                     <p>Points</p>
                        <select class="form-control border-0 bg-light">
                           <option value="100">100</option>
                        </select>
                        <input type="text" class="form-control border-0 bg-light" name="points" placeholder="enter points"> -->
                    <p>Due</p>
                       <!-- <select class="form-control border-0 bg-light" name="due-date" id="">
                           <option value="">due date</option>
                           <option value="">No due date</option>
                       </select> -->
                       <input type="date" class="form-control border-0 bg-light" name="due-date">
                </div>
            </div>
        </div>
           <div>
            <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <label for="">Sort the order of points by:</label>
                        <select class="border-0 bg-light" name="sort">
                            <option value="Descending">Descending</option>
                            <option value="Ascending">Ascending</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <span class="bg-light text-right">/60</span>
                    </div>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-lg-12">
                    <div class="border rounded p-2">
                        <div class="row">
                            <div class="col-lg-8">
                                <input class="form-control border-0 bg-light" type="text" name="criteria-title[]" id="critle" placeholder="Criterion title (required)">
                            </div>
                            <div class="col-lg-4">
                                <p class="bg-light text-right">/5 <a href="#"><span class="font-weight-bold">&vellip;</span></a></p>
                                <input type="hidden" value="1" id="myid" name="myid">
                            </div>
                        </div>
                    

                        <div>
                            <textarea class="form-control border-0 bg-light mb-2" name="criteria-description[]" cols="30" rows="3" placeholder="Criterion description"></textarea>
                        </div>
                <div class="add_criterion_parent">
                        <div class="d-flex justify-content-center">
                            <p class="add_more_criterion_description"><i class="fa fa-plus-circle text-success"></i></p>
                            <div class="border p-1">
                                <div>
                                    <select class="form-control mb-1" name="criteria-points0[]">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div>
                                    <input class="form-control mb-1" type="text" name="level-title0[]" placeholder="Level title">
                                </div>
                                <div>
                                    <textarea class="form-control" name="level-description0[]" cols="2" rows="1"></textarea>
                                </div>
                            </div>

                            <div class="newdiv d-flex"></div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="add_criterion"></div>
   
        <div class="row">
            <div class="col-lg-12 mt-3">
                <button  type="button" class="btn btn-default text-success" onclick="addCriterion()"><i class="fa fa-plus"></i> Add a criterion</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="button" class="btn btn-success" id="add_createeval">Save</button>
                <div class="alert alert-success"><p></p></div>
            </div>
        </div>
    </div>


  </form>

  </div>
    </div>

          <br />

    
        <!-- /page content -->          