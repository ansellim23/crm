<style type="text/css">
  .agent_coaching{display: none;}

</style>    
  <div class="card mb-3">
  	<!-- page content -->
      <form id="coachingform" name="foo" method="post">
        <div class="alert alert-success"><p></p></div>
      <div class="container p-5 text-dark">
        <div class="row">
            <div class="col-lg-6">
                <img  class="img-fluid" src="<? echo base_url().'images/Horizons-logo.png';?>" alt="logo">
            </div>
            <div class="col-lg-6">
                <h1 class="text-uppercase font-weight-bold margintop">coaching form Detail</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div>
                    <h4 class="text-uppercase">date of session</h4>
                    <p class="beforeimg"><input type="date" name="session_date" id="session_date" value="<?=($coaching_user['date_session']) == NULL ? date('Y-m-d') :  date('Y-m-d', strtotime($coaching_user['date_session'])) ;?>"></p>
                </div>
                <div>
                    <h4 class="text-uppercase">team</h4>
                    <p class="beforeimg"><input type="text" readonly name="manager_name" value="<?php echo $coaching_user['manager_name']; ?>"></p>
                </div>
                <div>
                    <h4 class="text-uppercase">agent</h4>
                    <p class="beforeimg"><input type="text" name="full_name" value="<?=ucfirst($coaching_user['agent_name']);?>"></p>
                    <input type="hidden" name="user_id" value="<?=ucfirst($this->session->userdata['userlogin']['user_id']);?>">
                </div>
            </div>
            <div class="col-lg-8">
                <div>
                    <h4 class="text-uppercase">details</h4>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                         <tr>
                            <th>Line Items for improvement</th>
                            <th>How often have these lineitems been reviewed in the past?</th>
                         </tr>
                        </thead>
                        <tbody>
                         <tr>
                            <td><textarea class="form-control" id="line_item" name="line_item"  cols="30" rows="10"><?=$coaching_user['line_item'];?></textarea></td>
                            <td><textarea class="form-control" id="line_item_review" name="line_item_review"  cols="30" rows="10"><?=$coaching_user['line_item_review'];?></textarea></td>
                         </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-uppercase">experience/review/reflect</h4>
            </div>
        </div>
        <div class="row">  
            <div class="col-lg-12">
                <table class="table table-bordered ">
                    <thead>
                     <tr>
                        <th>What happened?</th>
                     </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <td><textarea class="form-control"  name="experience" id="experience" cols="30" rows="10"><?=$coaching_user['experience'];?></textarea></td>
                     </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-uppercase">INTERPRETATION</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Look back
                                (What went well and why? What didin't go well and why?)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" name="interpretation" id="interpretation" cols="30" rows="10"><?=$coaching_user['interpretation'];?></textarea></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Look forward (What are the pros and cons of not doing anything)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" name="look_forward" id="look_forward" cols="30" rows="10"><?=$coaching_user['look_forward'];?></textarea></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Plan ahead (What could be changed in the future)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" name="plan_ahead" id="plan_ahead" cols="30" rows="10"><?=$coaching_user['plan_ahead'];?></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h4 class="text-uppercase font-weight-bold">agreed by:</h4>
                <h4 class="text-uppercase mt-5 mb-5">manager's signature</h4>
                   <?php if($coaching_user['manager_name'] != ''):?>
                        <div style="position:relative; top:0">
                            <img style='width:150px; height:150px; position:relative; top:115px;' src="<?php echo base_url('upload_signatures/'.$coaching_user['manager_signature'])?>">
                             <span class="d-block"><?=$coaching_user['manager_transaction_code'];?></span>
                       </div>
                       <p class="beforeimg bordertop"><input type="text" value="<?=ucfirst($coaching_user['manager_name']);?>"></p>
                      <?php endif;?>
                <h4 class="text-uppercase  mt-5 mb-5">employee's signature</h4>

              <div class="<?=($coaching_user['transaction_code'] == '') ? 'agent_coaching': 'done'; ?>" style="position:relative; top:0">
                    <img style='width:150px; height:125px; position:relative; top:90px;' src="<?=($coaching_user['agent_signature'] == '') ? base_url('upload_signatures/'.$user_signature['signature']) : base_url('upload_signatures/'.$coaching_user['agent_signature']) ;?>">
                     <span class="d-block"><?=($coaching_user['manager_transaction_code'] == '') ? $transaction_code : $coaching_user['manager_transaction_code'] ;?></span>
                      <input type="hidden" name="agent_signature" value="<?=$user_signature['signature'];?>">
                      <input type="hidden" name="transaction_code" value="<?=$transaction_code;?>">
                    </div>
                    <input type="hidden" name="coaching_id" value="<?=$coaching_user['coaching_id'];?>">

                <input type="text">
                <p class="beforeimg bordertop"><input type="text" value="<?=ucfirst($coaching_user['agent_name']);?>"></p>
                <div class="submitmargin">
                     <?php if($coaching_user['sign_status'] == 'Pending'):?>
                  <button type="button" class="btn btn-success" id="update_coaching" disabled>Sign</button>
                   <button type="button" class="btn btn-primary" id="add_signature">Add Signature</button>
                 <?php endif;?>
                 </div>

            </div>
            <div class="col-lg-8">
                <h4 class="text-uppercase">action plan</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>What exactly am I going to do?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" name="action_plan" id="action_plan" cols="30" rows="10"><?=$coaching_user['action_plan'];?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>How will I action the plan?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" name="how_action_plan" id="how_action_plan" cols="30" rows="10"><?=$coaching_user['how_action_plan'];?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>When am I going to do it?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><textarea class="form-control" name="when_action_plan" id="when_action_plan" cols="30" rows="10"><?=$coaching_user['when_action_plan'];?></textarea></th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Is there anything left to stop you from taking action?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" name="anything_action_plan" id="anything_action_plan" cols="30" rows="10"><?=$coaching_user['anything_action_plan'];?></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  </form>

  </div>
    </div>