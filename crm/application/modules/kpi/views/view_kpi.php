      <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
<?if($kpis > 0){
    foreach ($kpis as $kpi) { ?>

    <div class="container" style="color:black;">
        <form id="updateKpiform" method="post">
        <div class="row fw-bold">
            <div class="col-md-8">
                <h3 class="text-uppercase border border-dark" style="background-color: #ffe599;">Training - Nesting Score Card</h3>            
            </div>
            <div class="col-md-4">         
            </div>
        </div>
        <div class="row fw-bold">
            <div class="col-md-8">         
            </div>
            <div class="col-md-4 text-center">
                <span class="border border-2 border-dark p-4 l-5 r-5 fw-bold" id="core"><?=$kpi['attendance_total'] + $kpi['qa_total'] + $kpi['submission_total'] + $kpi['revenue_total'];?></span>            
            </div>
        </div>
        <div class="row fw-bold">
            <div class="col-md-8">
                <div>
                    <span style="margin-right: 12px;">Name:</span>
                        <select name="name" readonly>
                           <?
                              if($agents > 0){
                                foreach ($agents as $agent) {
                                    if($kpi['to_user_id'] == $agent['user_id']){
                                  echo "<option selected value='".$agent['user_id']."'>".$agent['firstname']." ".$agent['lastname']."</option>";
                                    }
                                    else{
                                  echo "<option disabled value='".$agent['user_id']."'>".$agent['firstname']." ".$agent['lastname']." - ".$agent['usertype']."</option>";
                                    }
                                }
                              }
                            ?>
                       </select>
                </div>
                <div class="input-group mb-2">
                    <span>Position:</span><input type="text" name="position" value="<?echo $kpi['kpi_position'];?>">
                </div>
                <div>
                    <span style="margin-right: 12px;">Status:</span><input type="text" name="status" value="<?echo $kpi['status'];?>">
                </div>
                <div>
                    <span style="margin-right: 12px;">Month:</span>
                    <select name="month" readonly>
                        <option value="<?=$kpi['month']?>" selected><?=$kpi['month']?></option>
                        <option value="January" disabled>January</option>
                        <option value="February" disabled>February</option>
                        <option value="March" disabled>March</option>
                        <option value="April" disabled>April</option>
                        <option value="May" disabled>May</option>
                        <option value="June" disabled>June</option>
                        <option value="July" disabled>July</option>
                        <option value="August" disabled>August</option>
                        <option value="September" disabled>September</option>
                        <option value="October" disabled>October</option>
                        <option value="November" disabled>November</option>
                        <option value="December" disabled>December</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">  
                <div class="row">
                    <div class="col-md-6 text-center">
                        <p>5</p>
                        <p>4</p>
                        <p>3</p>
                        <p>2-1</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <p>Excellent</p>
                        <p>Very Good</p>
                        <p>Good</p>
                        <p>Failed</p>
                    </div>
                </div>
            </div>
        </div>

        <table style="border: 1px solid black;">
            <thead>
                <tr class="text-center">
                    <th colspan="3" style="background-color: #7db894;">Attendance 10%</th>
                    <th style="background-color: #f6b26b;">SCORE</th>
                    <th style="background-color: #f6b26b;">SUB TOTAL</th>
                    <th style="background-color: #f6b26b;">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <!-- Attendance -->
                <tr style="background-color: #b6d7a8;"> 
                    <td>0 Leave w/o pay <span style="float:right;">(5)</span></td>
                    <td rowspan="4" class="col-xs-1"></td>
                    <td>0 Late <span style="float:right;">(5)</span></td>
                    <td rowspan="4"></td>
                    <td rowspan="4"></td>
                    <td rowspan="4"></td>
                </tr>
                <tr style="background-color: #b6d7a8;"> 
                    <td>1 day Leave w/o pay <span style="float:right;">(4)</span></td>
                    <td>1 - 15 mins. <span style="float:right;">(4)</span></td>
                </tr>
                <tr style="background-color: #b6d7a8;">
                    <td>1.25-2 days Leave w/o pay <span style="float:right;">(3)</span></td>
                    <td>15 - 30 mins.<span style="float:right;">(3)</span></td>
                </tr>
                <tr style="background-color: #b6d7a8;">
                    <td>2.25-3 days Leave w/o pay <span style="float:right;">(2)</span></td>
                    <td>31 - 45 mins. <span style="float:right;">(2)</span></td>
                </tr>
                <tr style="background-color: #b6d7a8;">
                    <td>3.25 above days Leave w/o pay <span style="float:right;">(1)</span></td>
                    <td style="width: 150px;"></td>
                    <td>46 mins. above <span style="float:right;">(1)</span></td>
                    <td><input type="number" name="attendance_score" value="<?=$kpi['attendance_score'];?>" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #b6d7a8; text-align: center;"></td>
                    <td><input type="number" name="attendance_subtotal" id="attendance_subtotal" value="<?=$kpi['attendance_subtotal'];?>" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #b6d7a8; text-align: center;"></td>
                    <!-- <td><span id="attendance_subtotal"></span></td> -->
                    <td><input type="number" name="attendance_total" id="attendance_total" value="<?=$kpi['attendance_total'];?>" readonly style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #b6d7a8; text-align: center;"></td>
                </tr>
                <!-- End of Attendance -->

                <!-- QA -->
                <tr> 
                    <td colspan="3" class="text-center fw-bold" style="background-color: #6d9eeb;">QA 20%</td>
                    <td rowspan="4" style="background-color: #c9daf8;"></td>
                    <td rowspan="4" style="background-color: #c9daf8;"></td>
                    <td rowspan="4" style="background-color: #c9daf8;"></td>
                </tr>
                <tr class="bg_qa" style="background-color: #c9daf8;"> 
                    <td colspan="3">Excellent <span style="margin-left: 11.4rem;">(5)</span></td>
                </tr>
                <tr class="bg_qa" style="background-color: #c9daf8;">
                    <td colspan="3">Very Good <span style="margin-left: 10.6rem;">(4)</span></td>
                </tr>
                <tr class="bg_qa" style="background-color: #c9daf8;">
                    <td colspan="3">Good <span style="margin-left: 12.7rem;">(3)</span></td>
                </tr>
                <tr class="bg_qa" style="background-color: #c9daf8;">
                    <td colspan="3">Failed <span style="margin-left: 12.6rem;">(2-1)</span></td>
                    <td><input type="number" name="qa_score" value="<?=$kpi['qa_score'];?>" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #c9daf8; text-align: center;"></td>
                    <td><input type="number" name="qa_subtotal" value="<?=$kpi['qa_subtotal'];?>" id="qa_subtotal" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #c9daf8; text-align: center;"></td>
                    <td><input type="number" name="qa_total" value="<?=$kpi['qa_total'];?>" id="qa_total" readonly style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #c9daf8; text-align: center;"></td>
                </tr>
                <!-- End of QA -->

                <!-- Sales-Submission -->
                <tr> 
                    <td colspan="3" class="text-center fw-bold" style="background-color: #8e7cc3;">Sales-Submission 10%</td>
                    <td rowspan="4" style="background-color: #b4a7d6;"></td>
                    <td rowspan="4" style="background-color: #b4a7d6;"></td>
                    <td rowspan="4" style="background-color: #b4a7d6;"></td>
                </tr>
                <tr class="bg_ss" style="background-color: #b4a7d6;"> 
                    <td colspan="3">3 Submissions <span style="margin-left: 8.8rem;">(5)</span></td>
                </tr>
                <tr class="bg_ss" style="background-color: #b4a7d6;">
                    <td colspan="3">2 Submissions <span style="margin-left: 8.8rem;">(4)</span></td>
                </tr>
                <tr class="bg_ss" style="background-color: #b4a7d6;">
                    <td colspan="3">1 Submissions <span style="margin-left: 8.8rem;">(3)</span></td>
                </tr>
                <tr class="bg_ss" style="background-color: #b4a7d6;">
                    <td colspan="3">Failed <span style="margin-left: 12.6rem;">(0)</span></td>
                    <td><input type="number" name="submission_score" value="<?=$kpi['submission_score'];?>" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #b4a7d6; text-align: center;"></td>
                    <td><input type="number" name="submission_subtotal" value="<?=$kpi['submission_subtotal'];?>" id="submission_subtotal" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #b4a7d6; text-align: center;"></td>
                    <td><input type="number" name="submission_total" value="<?=$kpi['submission_total'];?>" id="submission_total" readonly style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #b4a7d6; text-align: center;"></td>
                </tr>
                <!-- End of Sales-Submission -->

                <!-- Sales - Revenue -->
                <tr> 
                    <td colspan="3" class="text-center fw-bold" style="background-color: #ffd966;">Sales-Revenue 60%</td>
                    <td rowspan="5" style="background-color: #ffe599;"></td>
                    <td rowspan="5" style="background-color: #ffe599;"></td>
                    <td rowspan="5" style="background-color: #ffe599;"></td>
                </tr>
                <tr class="bg_sr" style="background-color: #ffe599;"> 
                    <td colspan="3">$1,800.00 Up <span style="margin-left: 9.3rem;">(5)</span></td>
                </tr>
                <tr class="bg_sr" style="background-color: #ffe599;">
                    <td colspan="3">$999.00 - $1,799.00 <span style="margin-left: 6.4rem;">(4)</span></td>
                </tr>
                <tr class="bg_sr" style="background-color: #ffe599;">
                    <td colspan="3">$500.00 - $999.00 <span style="margin-left: 7.2rem;">(3)</span></td>
                </tr>
                <tr class="bg_sr" style="background-color: #ffe599;">
                    <td colspan="3">$200.00 - $499.00 <span style="margin-left: 7.2rem;">(2)</span></td>
                </tr>
                <tr class="bg_sr" style="background-color: #ffe599;">
                    <td colspan="3">$199.00 below <span style="margin-left: 8.8rem;">(1)</span></td>
                    <td><input type="number" name="revenue_score" value="<?=$kpi['revenue_score'];?>" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #ffe599; text-align: center;"></td>
                    <td><input type="number" name="revenue_subtotal" value="<?=$kpi['revenue_subtotal'];?>" id="revenue_subtotal" style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #ffe599; text-align: center;"></td>
                    <td><input type="number" name="revenue_total" value="<?=$kpi['revenue_total'];?>" id="revenue_total" readonly style="border: 0; outline: 0; border-bottom: 1px solid; background-color: #ffe599; text-align: center;"></td>
                </tr>
                 <!-- End of Sales - Revenue -->
            </tbody>
        </table>
        <input type="hidden" name="kpi_id" value="<?=$kpi['kpi_id']?>">
        <button type="button" class="btn btn-info" id="update_kpi" style="float:right;">Update</button>
        <a href="<?=base_url('kpi')?>" class="btn btn-danger">Back</a>
        <div class="alert alert-success"><p></p></div>
        </form>
    </div>
<? }
    }?>

</div>