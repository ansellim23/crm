<style type="text/css">
        #addleadmodal .modal-content, #updateleadmodal .modal-content, #viewleadmodal .modal-content, #payleadmodal .modal-content{padding: 0px 20px; width: 200%; margin-left: -160px;}
        #addreportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #updatereportModal .modal-content{padding: 0px 20px; width: 355%; margin-left: -615px;}
        #viewleadhistorymodal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewreportModal .modal-content{padding: 0px 20px; width: 280%; margin-left: -405px;}
        #viewleadremarkhistorymodal .modal-content{ width: 200% !important; margin-left: -415px !important;}

    table.dataTable thead > tr > th.sorting{padding-right: 0px !important;}
    #payleadmodal .modal-content{ width: 300% !important; margin-left: -415px !important;}
    .hide_initialpayment, .hide_amount_paid, .alert-success{display: none;}

 .signup-form{width: 100%;}
 .signup-form form{overflow: scroll;}
 .signup-form input[type="checkbox"] {
    margin-top: 3px;
    text-align: center;
    margin: 0px auto;
}
.signup-form .btn {
    font-size: 16px;
    font-weight: bold;
    min-width: 111px;
    outline: none !important;
    width: 100%;
    display: inline-block;
}
.inline-block{
  margin: 15px 0px auto 0px;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
    color: #000000;
}
    </style>

        <!-- page content -->
        <div class="right_col" role="main">



                      <div class="signup-form">
                      <form id="updatereportform" method="post">
                        <h2>Production Manual</h2>
                        <p class="hint-text">Update Report.</p>
                        <span class="col-sm-12">Project Information</span></br></br>
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Project ID</label>                         
                             <!--   <select class="form-control project_id" name="project_id">
                                <option value="">Please Select A Project ID</option>
                                <?php 
                                   if ($author_names > 0){
                                       foreach ($author_names as $author_name){
                                         echo "<option value='".$author_name['project_id']."'>".modules::run("dashboard/setindex_prefix",$author_name['project_id'])."</option>";
                                     }
                                  } 
                                ?>
                              </select> -->
                              <input class="form-control project_id" name="project_id"  id="project_id" type="text"  value="<?=$report['project_id'];?>" placeholder="-- -- ----" readonly>
                           </div>
                          <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Date Sold</label>                         
                              <input class="form-control date_sold" name="date_sold"  id="date_sold" type="text" value="<?=date("Y/m/d",strtotime($report['date_contract_signed']));?>" placeholder="-- -- ----" readonly>
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Project Status</label>                         
                              <select class="form-control project_status" name="project_status" >
                                <option value="">Please Select A Project Status</option>
                                <option value="<?=$report['project_status'];?>" selected readonly ><?=$report['project_status'];?></option>
                                <option value="Approved for Submission">Approved for Submission</option>
                                <option value="Approved Completion">Approved Completion</option>
                              </select>
                           </div>
                           <span class="form-group col-sm-12">Book Design and Marketing</span></br></br>
                             <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Interior Designer</label>                         
                                 <select class="form-control interior_designer" name="interior_designer">
                                      <option>Please Select An Interior Designer</option>
                                      <?php 
                                         if ($interior_designers > 0){
                                             foreach ($interior_designers as $interior_designer){
                                                if($data_interior_designer['interior_user_id'] != 0){
                                                   echo "<option value='".$data_interior_designer['interior_user_id']."' selected>".$interior_designer['firstname'] .' '.$interior_designer['lastname'] ."</option>";
                                                }
                                                  echo "<option value='".$interior_designer['user_id']."'>".$interior_designer['firstname'] .' '.$interior_designer['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                             <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Cover Designer</label>                         
                                  <select class="form-control cover_designer" name="cover_designer">
                                      <option>Please Select An Interior Designer</option>
                                      <?php 
                                         if ($cover_designers > 0){
                                             foreach ($cover_designers as $cover_designer){
                                                if($data_cover_designer['cover_user_id'] != 0){
                                                   echo "<option value='".$data_cover_designer['cover_user_id']."' selected>".$cover_designer['firstname'] .' '.$cover_designer['lastname'] ."</option>";
                                                }
                                                 echo "<option value='".$cover_designer['user_id']."'>".$cover_designer['firstname'] .' '.$cover_designer['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Publisher/Marketing</label>                         
                                 <select class="form-control publisher_id" name="publisher_id">
                                      <option >Please Select A Publisher/Marketing</option>
                                      <?php 
                                         if ($publishers > 0){
                                             foreach ($publishers as $publisher){
                                               if($data_cover_designer['publisher_id'] != 0){
                                                   echo "<option value='".$data_cover_designer['publisher_id']."' selected>".$publisher['firstname'] .' '.$publisher['firstname'] ."</option>";
                                                }
                                               echo "<option value='".$publisher['user_id']."'>".$publisher['firstname'] .' '.$publisher['lastname'] ."</option>";
                                           }
                                        } 
                                      ?>
                                  </select>
                            </div>
                            <span class="form-group col-sm-12">Author's Information</span></br></br>
                           <div class="form-group col-sm-6 flex-column d-flex">
                            <label for="validationCustom03">Author's Name</label>                         
                              <input class="form-control author_name" readonly name="author_name"  id="author_name" type="text" value="<?=$report['author_name'];?>"  placeholder="Enter the Author's Name">
                           </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                              <label for="validationCustom03">Pen Name</label>                         
                               <input class="form-control pen_name" name="pen_name"  id="pen_name" type="text" value="<?=$report['pen_name'];?>" placeholder="Enter the Pen Name">
                               <input class="form-control report_id" name="report_id"  id="report_id" type="hidden" value="<?=$report_id?>" placeholder="Enter the Report Id">
                           </div>

                           <span class="form-group col-sm-12">Book's Information</span></br></br>
                           <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Author's Book Count</label>                         
                               <input class="form-control number_of_book" name="number_of_book"  id="number_of_book" value="<?=$report['number_of_books'];?>" type="text" placeholder="Enter the Number of Books">
                           </div>
                           <div class="form-group col-sm-3 flex-column d-flex">
                            <label for="validationCustom03">Book Categories</label>                         
                               <select class="form-control book_categories selectpicker" name="book_categories"  id="book_categories" data-live-search="true">
                                <option >Please Select A Book Categories</option>
                                <option value="<?=$report['book_categories'];?>" selected><?=$report['book_categories'];?></option>
                                <option value="Art/General">Art/General</option>
                                <option value="Biography & Autobiography">Biography & Autobiography/</option>
                                <option value="Biography & Autobiography/General">Biography & Autobiography/General</option>
                                <option value="Biography & Autobiography/Rich & Famous">Biography & Autobiography/Rich & Famous</option>
                                <option value="Body, Mind & Spirit/Occultism">Body, Mind & Spirit/Occultism</option>
                                <option value="Body, Mind & Spirit/Supernatural">Body, Mind & Spirit/Supernatural</option>
                                <option value="Business & Economics/Careers/General">Business & Economics/Careers/General</option>
                                <option value="Business & Economics/General">Business & Economics/General</option>
                                <option value="Computers/General">Computers/General</option>
                                <option value="Cooking/General">Cooking/General</option>
                                <option value="Education/General">Education/General</option>
                                <option value="Entertainment & Performing Arts">Entertainment & Performing Arts</option>
                                <option value="Family & Relationships/Divorce">Family & Relationships/Divorce</option>
                                <option value="Family & Relationships/General">Family & Relationships/General</option>
                                <option value="Family & Relationships/Marriage">Family & Relationships/Marriage</option>
                                <option value="Family & Relationships/Parent & Adult Child">Family & Relationships/Parent & Adult Child</option>
                                <option value="Family & Relationships/Parenting">Family & Relationships/Parenting</option>
                                <option value="Fiction/Action & Adventure">Fiction/Action & Adventure</option>
                                <option value="Fiction/Classics">Fiction/Classics</option>
                                <option value="Fiction/Erotica">Fiction/Erotica</option>
                                <option value="Fiction/Fantasy/General">Fiction/Fantasy/General</option>
                                <option value="Fiction/Gay">Fiction/Gay</option>
                                <option value="Fiction/General">Fiction/General</option>
                                <option value="Fiction/History ">Fiction/History </option>
                                <option value="Fiction/Horror">Fiction/Horror</option>
                                <option value="Fiction/Lesbian">Fiction/Lesbian</option>
                                <option value="Fiction/Science Fiction/General">Fiction/Science Fiction/General</option>
                                <option value="Fiction/Short Stories (single author)">Fiction/Short Stories (single author)</option>
                                <option value="Fiction/Suspense">Fiction/Suspense</option>
                                <option value="Fiction/Thrillers">Fiction/Thrillers</option>
                                <option value="Fiction/Westerns">Fiction/Westerns</option>
                                <option value="Foreign Languages Study/General">Foreign Languages Study/General</option>
                                <option value="Health & Fitness/General">Health & Fitness/General</option>
                                <option value="Health & Fitness/Sexuality">Health & Fitness/Sexuality</option>
                                <option value="History/General">History/General</option>
                                <option value="History/Military/General">History/Military/General</option>
                                <option value="History/Native American">History/Native American</option>
                                <option value="House & Home/Repair">House & Home/Repair</option>
                                <option value="Humor/General">Humor/General</option>
                                <option value="Juvenile Fiction/General">Juvenile Fiction/General</option>
                                <option value="Juvenile Nonfiction/General">Juvenile Nonfiction/General</option>
                                <option value="Language Arts & Disciplines/General">Language Arts & Disciplines/General</option>
                                <option value="Law/General">Law/General</option>
                                <option value="Literary Collections/General">Literary Collections/General</option>
                                <option value="Mathematics/General">Mathematics/General</option>
                                <option value="Music/General">Music/General</option>
                                <option value="Nature/Animals">Nature/Animals</option>
                                <option value="Nature/General">Nature/General</option>
                                <option value="Performing Arts/General">Performing Arts/General</option>
                                <option value="Pets/General">Pets/General</option>
                                <option value="Philosophy/General">Philosophy/General</option>
                                <option value="Poetry/General">Poetry/General</option>
                                <option value="Political Science/General">Political Science/General</option>
                                <option value="Psychology/General">Psychology/General</option>
                                <option value="Reference/Genealogy">Reference/Genealogy</option>
                                <option value="Reference/General">Reference/General</option>
                                <option value="Reference/Personal & Practical Guides">Reference/Personal & Practical Guides</option>
                                <option value="Religion/Holidays/Christmas">Religion/Holidays/Christmas</option>
                                <option value="Religion/Inspirational">Religion/Inspirational</option>
                                <option value="Religion/Spirituality">Religion/Spirituality</option>
                                <option value="Science/General">Science/General</option>
                                <option value="Self-Help/General">Self-Help/General</option>
                                <option value="Social Science/Ethnic Studies/African-American Studies">Social Science/Ethnic Studies/African-American Studies</option>
                                <option value="Social Science/Ethnic Studies/General">Social Science/Ethnic Studies/General</option>
                                <option value="Social Science/Ethnic Studies/Hispanic-American Studies">Social Science/Ethnic Studies/Hispanic-American Studies</option>
                                <option value="Social Science/Handicapped">Social Science/Handicapped</option>
                                <option value="Social Science/Sociology/General">Social Science/Sociology/General</option>
                                <option value="Social Science/Women’s Studies">Social Science/Women’s Studies</option>
                                <option value="Sports & Recreation/General">Sports & Recreation/General</option>
                                <option value="Sports & Recreation/Martial Arts & Self-Defense">Sports & Recreation/Martial Arts & Self-Defense</option>
                                <option value="Technology/General">Technology/General</option>
                                <option value="Transportation/Automotive/General">Transportation/Automotive/General</option>
                                <option value="Transportation/Aviation/General">Transportation/Aviation/General</option>
                                <option value="Travel/General">Travel/General</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-3 flex-column d-flex">
                            <label for="validationCustom03">Book Color Type</label>                         
                               <select class="form-control book_color" name="book_color">
                                <option>Please Select A Book Color Type</option>
                                <option value="<?=$report['book_color'];?>" selected><?=$report['book_color'];?></option>
                                <option value="Full Color/Children's Book">Full Color/Children's Book</option>
                                <option value="Black and White">Black and White</option>
                              </select>
                           </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                            <label for="validationCustom03">Book Size</label>                         
                               <select class="form-control book_size" name="book_size">
                                <option value=" ">Please Select A Size</option>
                                <option value="<?=$report['book_size'];?>" selected><?=$report['book_size'];?></option>
                                <option value="5 x 8">5 x 8</option>
                                <option value="5.5 x 8.5">5.5 x 8.5</option>
                                <option value="6 x 9">6 x 9</option>
                                <option value="8.5 x 8.5">8.5 x 8.5</option>
                                <option value="8.5 x 11">8.5 x 11</option>
                              </select>
                           </div>
                          
                            <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Paper Color Type</label>                         
                               <select class="form-control color_type" name="color_type">
                                <option value="">Please Select A Paper Color Type</option>
                                <option value="<?=$report['book_colortype'];?>" selected><?=$report['book_colortype'];?></option>
                                <option value="Creme">Creme</option>
                                <option value="White">White</option>
                              </select>
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Hardcover Format (if applicable)</label>                         
                              <select class="form-control hard_cover_format" name="hard_cover_format">
                                <option>Please A Hardcover Format</option>
                                <option value="<?=$report['hard_cover_format'];?>" selected><?=$report['hard_cover_format'];?></option>
                                <option value="Dustjacket">Dustjacket</option>
                                <option value="Casebound">Casebound</option>
                              </select>                           
                            </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                             <label for="validationCustom03">Audience</label>                         
                               <input class="form-control audience" name="audience" value="<?=$report['audience'];?>"  id="audience" type="text" placeholder="Enter the Audience">
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">Book Title/s & Sub Title/s</label>                         
                                <textarea class="form-control book_title" readonly rows="2" name="book_title"><?=$report['book_title'];?></textarea>
                           </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">About the Author</label>                         
                                  <textarea class="form-control about_author" rows="2" name="about_author"><?=$report['book_colortype'];?></textarea>
                           </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                              <label for="validationCustom03">About the Book</label>                         
                                  <textarea class="form-control about_book" rows="2" name="about_book"><?=$report['about_book'];?></textarea>
                           </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Cover Design Instructions</label>                         
                                <textarea class="form-control cover_design" rows="2" name="cover_design"><?=$report['cover_design_ints'];?></textarea>
                            </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Interior Design Instructions</label>                         
                                <textarea class="form-control interior_design" rows="2" name="interior_design"><?=$report['interior_design_ints'];?></textarea>
                            </div>
                            <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Publishing Logo Instructions</label>                         
                                  <textarea class="form-control publishing_logo" rows="2" name="publishing_logo"><?=$report['publishing_logo_ints'];?></textarea>
                            </div>
                             <div class="form-group col-sm-3 flex-column d-flex">
                              <label for="validationCustom03">Mailing Address</label>                         
                                  <textarea class="form-control mailing_address"  rows="2" name="mailing_address"><?=$report['mailing_address'];?></textarea>
                            </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                               <label for="validationCustom03">Publishing Name</label>                         
                               <input class="form-control publishing_name" name="publishing_name" value="<?=$report['publishing_name'];?>" id="publishing_name" type="text" placeholder="Enter the Publishing Name">
                           </div>
                            <div class="form-group col-sm-4 flex-column d-flex">
                            <label for="validationCustom03">Author's Picture</label>                         
                              <select class="form-control author_picture" name="author_picture">
                                <option>Please select an Author's Picture</option>
                                <option value="<?=$report['author_picture'];?>" selected><?=$report['author_picture'];?></option>
                                <option value="Pending">Pending</option>
                                <option value="Done">Done</option>
                              </select>                           
                            </div>
                             <div class="form-group col-sm-4 flex-column d-flex">
                               <label for="validationCustom03">Package Name</label>                         
                               <input class="form-control service_offered"  readonly name="service_offered" value="<?=$report['services_offered'];?>" id="service_offered" type="text" placeholder="Enter the Service Offered">
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                              <button type="button" class="btn btn-outline-success btn-lg line_word_details" data-toggle='modal' data-target="#sidemodal1" data-project_id="<?=$report['project_id'];?>">Lines/Words</button>
                           </div>
                           <div class="form-group col-sm-4 flex-column d-flex">
                              <button type="button" class="btn btn-outline-success btn-lg front_cover_details" data-toggle='modal' data-target="#sidemodal2" data-project_id="<?=$report['project_id'];?>" >Front Cover</button>
                           </div>  
                           <div class="form-group col-sm-4 flex-column d-flex">
                              <button type="button" class="btn btn-outline-success btn-lg back_cover_details" data-toggle='modal' data-target="#sidemodal3" data-project_id="<?=$report['project_id'];?>">Back Cover</button>
                           </div> 
                            <div class="alert alert-success"><p></p></div>
                        <div class="form-group" style="text-align: center;">
                                <button type="button" id="update_report" class="btn btn-success btn-lg btn-block" style="width:10%;">Update</button>
                                <a href="<?php echo site_url("dashboard/report")?>" class="btn btn-primary " style="width:18%; color:#ffffff;">Go back to Production Manual</a>

                        </div>
                        </form>
                    </div>
                     </div>
          <br />

    
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Horizons <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
     

     
            <!--Lines/Words Side Modal-->
                <div  class="modal fade" id="sidemodal1" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Lines/Words</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form id="update_lines_form">
                            <div class="alert alert-success"><p></p></div>
                             <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="interior_designer" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="publisher_id" placeholder="Project ID" >
                          <div class="modal-body">
                           <div class="card-body">
                              <div class="table-responsive">
                                <button style="float:right; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-plus" id="add_more_report">ADD MORE</button>
                               <table class="table table-bordered" id="leaddataTableFixed" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Page Number</th>
                                      <th>Paragraph Number</th>
                                      <th>Line Number</th>
                                      <th>Actual Sentence/Word</th>
                                      <th>Correct Sentence/Word</th>
                                      <th>Remove</th>
                                    </tr>
                                  </thead>
                                  <tbody class="author_report_detail">
<!--                                       <tr>
                                        <td><input class="form-control page_number" name="page_number[]" style="height:50px; width:90px;" id="page_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Enter the Page Number"></td>              
                                        <td style="width:100px;"><input type="text" class="form-control paragraph_number" name="paragraph_number[]" style="height:50px;" id="paragraph_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Paragraph Number"></td>
                                        <td style="width:100px;"><input type="text" class="form-control line_number" name="line_number[]" style="height:50px;" id="line_number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Enter the Line Number"></td>
                                        <td style="width:520px;"><textarea class="form-control actual_sentence" rows="2" name="actual_sentence[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_sentence" rows="2" name="correct_sentence[]"></textarea></td>
                                      </tr> -->
                                  </tbody>
                                </table>
                                 <button style="float:left; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-edit" id="update_line_word"> Update</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      
                    </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

            <!-- Front Cover Side Modal-->
                <div  class="modal fade" id="sidemodal2" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Front Cover</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form id="update_front_cover_form">
                            <div class="alert alert-success"><p></p></div>
                           <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="cover_designer" placeholder="Project ID" >
                             <input type="hidden" readonly class="form-control" name="publisher_id" placeholder="Project ID" >
                              <div class="modal-body">
                                <div class="card-body">
                                  <div class="table-responsive">
                                   <table class="table table-bordered" id="front_coverdataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th style="display:none;"></th>
                                          <th>Front Cover Instructions</th>
                                          <th>Actual Cover</th>
                                          <th>Correct Cover</th>
                                          <th style="display:none;"></th>
                                        </tr>
                                      </thead>
                                      <tbody class="front_cover_report_detail">
                                          <tr>
                                            <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Design Wise" style="height:50px;" id="front_back_cover"  readonly></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                           <tr>
                                            <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="By Line" style="height:50px;" id="front_back_cover"  readonly></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                           <tr>
                                            <td style="width:520px;"><textarea class="form-control front_back_cover" rows="2" name="front_back_cover[]" readonly>Endorsements (Quotes, achievements, certificates, awards, Dedication and etc.)</textarea></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                           <tr>
                                            <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Genre" style="height:50px;" id="front_back_cover"  readonly></td>
                                            <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                            <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                          </tr>
                                      </tbody>
                                    </table>
                                    <button style="float:left; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-edit" id="update_front_cover"> Update</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          
                    </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

            <!-- Back Cover Side Modal-->
                <div  class="modal fade" id="sidemodal3" data-backdrop="true">
                  <div class="modal-dialog modal-right w-xl">
                    <div class="modal-content h-100 no-radius">
                    
                      <!-- Modal Header -->
                           <div class="modal-header">
                            <h4 class="modal-title">Back Cover</h4> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                         <form id="update_back_cover_form">
                            <div class="alert alert-success"><p></p></div>
                          <input type="hidden" readonly class="form-control" name="project_id" placeholder="Project ID" >
                           <input type="hidden" readonly class="form-control" name="cover_designer" placeholder="Project ID" >
                           <input type="hidden" readonly class="form-control" name="publisher_id" placeholder="Project ID" >
                          <div class="modal-body">
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table table-bordered" id="back_coverdataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="display:none;"></th>
                                      <th>Back Cover Instructions</th>
                                      <th>Actual Cover</th>
                                      <th>Correct Cover</th>
                                      <th style="display:none;"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="back_cover_report_detail">
                                      <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="Design Wise" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>

                                      </tr>
                                       <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="About the author" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                       <tr>
                                         <td style="width:100px;"><input type="text" class="form-control front_back_cover" name="front_back_cover[]" value="About the book" style="height:50px;" id="front_back_cover"  readonly></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                       <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" readonly rows="2" name="front_back_cover[]">QR code (only for authors with linked website)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                      <tr>
                                        <td style="width:520px;"><textarea class="form-control front_back_cover" readonly rows="2" name="front_back_cover[]">Endorsements (Quotes, achievements, certificates, awards, Dedication and etc.)</textarea></td>
                                        <td style="width:520px;"><textarea class="form-control actual_cover" rows="2" name="actual_cover[]"></textarea></td>
                                        <td style="width:520px;"><textarea class="form-control correct_cover" rows="2" name="correct_cover[]"></textarea></td>
                                        <td style="width:100px; display:none;"><input type="text" class="form-control status_cover" name="status_cover[]" value="back_cover" style="height:50px;" id="status_cover"  readonly></td>
                                      </tr>
                                  </tbody>
                                </table>
                                <button style="float:left; height:50px; width:10%;" type="button" class="btn btn-primary fa fa-edit" id="update_back_cover"> Update</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      
                    </div>
                          
                    </div>
                  </div>
                </div>
            <!-- end of Remark modal -->

