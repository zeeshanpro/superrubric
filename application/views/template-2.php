<?php
defined('BASEPATH') or exit('No direct script access allowed');
echo $header;   ?>
<div class="action">
  <div class="from-section">
    <form id="pdfgenrate" action="<?php echo base_url('/templates/domconvertpdf'); ?>" method="post" name="">
      <?php echo $left_top; ?>
      <div class="from-box">

        <div class="professional mt-5">
          <button class="show_btn btn-default " id="show_main_criteria_1" onclick="return displayCriteria('main_criteria_1','show')">Restore</button>
          <button class="hide_btn btn-default" id="hide_main_criteria_1" onclick="return displayCriteria('main_criteria_1','hide')">Delete</button>
          <input type="hidden" name="criteria_1_display" value="1">
          <h4>Assessment Criteria 1</h4>
        </div>
        <div class="main_criteria_1">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="from-field">
                <div class="form-group">
                  <span>Criteria</span>
                  <input type="text" class="form-control" name="txt_11" id="txt_11" value="BOOK SUMMARY" onKeyUp="return setTextToDiv('11');">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="from-field">
                <div class="form-group">
                  <span>% Value</span>
                  <input type="text" class="form-control" name="txt_12" id="txt_12" value="30%" onKeyUp="return setTextToDiv('12');" onblur="calculateScore('12','28')">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="from-field">
                <div class="form-group col-md-5 display-inline">
                  <span>Level</span>
                  <select class="form-control" name="stanine_1" onChange="return setScale(1,this.value);">
                    <option value=""></option>
                    <option value="15">D-</option>
                    <option value="16">D</option>
                    <option value="17">D+</option>
                    <option value="20">C-</option>
                    <option value="21">C</option>
                    <option value="22">C+</option>
                    <option value="25">B-</option>
                    <option value="26">B</option>
                    <option value="27">B+</option>
                    <option value="251">A-</option>
                    <option value="261">A</option>
                    <option value="271">A+</option>
                  </select>
                </div>
                <div class="form-group col-md-6 display-inline">
                  <span>Score</span>
                  <input type="text" class="form-control" name="txt_28" id="txt_28" value="Score" onKeyUp="return setTextToDiv('28');" onblur="calculateScore('12','28')">
                  <input class="score" type="hidden" name="score_28" id="score_28">
                </div>
              </div>

            </div>
          </div>

          <div class="row panel-title">
            <button type="button" class="form-control collapseBtn" data-toggle="collapse" data-target="#criteria_detail_1">Criteria Detail</button>
          </div>

          <div class="row collapse" id="criteria_detail_1">

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>BEGINNING </span>
                  <textarea class="form-control" rows="4" name="txt_131" id="txt_131" value="" onKeyUp="return setTextToDiv('131');">Book summary is very limited. Summary does not show clear use of purpose and ideas. 
                Keywords: lists, locates, 
                numbers
						</textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>DEVELOPING </span>
                  <textarea class="form-control" rows="4" name="txt_13" id="txt_13" value="" onKeyUp="return setTextToDiv('13');">Summary does not show a good use of content, purpose, and ideas. 
                Keywords: lists, locates, numbers, defines, gathers</textarea>
                </div>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>ACHIEVING</span>
                  <textarea class="form-control" rows="4" name="txt_18" id="txt_18" value="" onKeyUp="return setTextToDiv('18');">Summary shows good use of the texts content, purpose and ideas. 
                Keywords: contrasts, examines, questions, concludes
						    </textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>MASTERING</span>
                  <textarea class="form-control" rows="4" name="txt_23" id="txt_23" value="" onKeyUp="return setTextToDiv('23');">Summary shows a command of the book’s contents, purpose, and ideas.
                
                Keywords: critiques, explains. Inferrs, links, deduces
						</textarea>
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="professional mt-5">
          <button class="show_btn btn-default" id="show_main_criteria_2" onclick="return displayCriteria('main_criteria_2','show')">Restore</button>
          <button class="hide_btn btn-default" id="hide_main_criteria_2" onclick="return displayCriteria('main_criteria_2','hide')">Delete</button>
          <input type="hidden" name="criteria_2_display" value="1">
          <h4>Assessment Criteria 2</h4>
        </div>
        <div class="main_criteria_2">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="from-field">
                <div class="form-group">
                  <span>Criteria</span>
                  <input type="text" class="form-control" name="txt_29" id="txt_29" value="CRITICAL ASSESSMENT OF TEXT" onKeyUp="return setTextToDiv('29');">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="from-field">
                <div class="form-group">
                  <span>% Value</span>
                  <input type="text" class="form-control" name="txt_30" id="txt_30" value="25%" onKeyUp="return setTextToDiv('30');" onblur="calculateScore('30','43')">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="from-field">
                <div class="form-group col-md-5 display-inline">
                  <span>Level</span>
                  <select class="form-control" name="stanine_2" onChange="return setScale(2,this.value);">
                    <option value=""></option>
                    <option value="32">D-</option>
                    <option value="33">D</option>
                    <option value="34">D+</option>
                    <option value="36">C-</option>
                    <option value="37">C</option>
                    <option value="38">C+</option>
                    <option value="40">B-</option>
                    <option value="41">B</option>
                    <option value="42">B+</option>
                    <option value="401">A-</option>
                    <option value="411">A</option>
                    <option value="421">A+</option>
                  </select>
                </div>
                <div class="form-group col-md-6 display-inline">
                  <span>Score</span>
                  <input type="text" class="form-control" name="txt_43" id="txt_43" value="Score" onKeyUp="return setTextToDiv('43');" onblur="calculateScore('30','43')">
                  <input class="score" type="hidden" name="score_43" id="score_43">
                </div>
              </div>
            </div>
          </div>

          <div class="row panel-title">
            <button type="button" class="form-control collapseBtn" data-toggle="collapse" data-target="#criteria_detail_2">Criteria Detail</button>
          </div>

          <div class="row collapse" id="criteria_detail_2">

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>BEGINNING </span>
                  <textarea class="form-control" rows="4" name="txt_311" id="txt_311" value="" onKeyUp="return setTextToDiv('311');">Student struggles to critically engage with text. 

                  Keywords: recites, repeats
                  </textarea>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>DEVELOPING</span>
                  <textarea class="form-control" rows="4" name="txt_31" id="txt_31" value="" onKeyUp="return setTextToDiv('31');">Student struggles to critically engage with text.
                                  
                  Keywords: quotes, recites, repeats</textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>ACHIEVING</span>
                  <textarea class="form-control" rows="4" name="txt_35" id="txt_35" value="" onKeyUp="return setTextToDiv('35');">Writer shows moderate ability to critically engage with ideas in text. 

                    Keywords: discovers, describes, examines
                                </textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>MASTERING</span>
                  <textarea class="form-control" rows="4" name="txt_39" id="txt_39" value="" onKeyUp="return setTextToDiv('39');">Writer demonstrates strong analytical skills and critical engagement with the text.
                
                  Keywords: distinguishes, orders, judges</textarea>
                </div>
              </div>
            </div>


          </div>

        </div>

        <div class="professional mt-5">
          <button class="show_btn btn-default" id="show_main_criteria_3" onclick="return displayCriteria('main_criteria_3','show')">Restore</button>
          <button class="hide_btn btn-default" id="hide_main_criteria_3" onclick="return displayCriteria('main_criteria_3','hide')">Delete</button>
          <input type="hidden" name="criteria_3_display" value="1">
          <h4>Assessment Criteria 3</h4>
        </div>

        <div class="main_criteria_3">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6">

              <div class="from-field">
                <div class="form-group">
                  <span>Criteria</span>
                  <input type="text" class="form-control" name="txt_44" id="txt_44" value="PRESENTATION OF IDEAS" onKeyUp="return setTextToDiv('44');">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="from-field">
                <div class="form-group">
                  <span>% Value</span>
                  <input type="text" class="form-control" name="txt_45" id="txt_45" value="20%" onKeyUp="return setTextToDiv('45');" onblur="calculateScore('45','58')">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="from-field">
                <div class="form-group col-md-5 display-inline">
                  <span>Level</span>
                  <select class="form-control" name="stanine_3" onChange="return setScale(3,this.value);">
                    <option value=""></option>
                    <option value="47">D-</option>
                    <option value="48">D</option>
                    <option value="49">D+</option>
                    <option value="51">C-</option>
                    <option value="52">C</option>
                    <option value="53">C+</option>
                    <option value="55">B-</option>
                    <option value="56">B</option>
                    <option value="57">B+</option>
                    <option value="551">A-</option>
                    <option value="561">A</option>
                    <option value="571">A+</option>
                  </select>
                </div>
                <div class="form-group col-md-6 display-inline">
                  <span>Score</span>
                  <input type="text" class="form-control" name="txt_58" id="txt_58" value="Score" onKeyUp="return setTextToDiv('58');" onblur="calculateScore('45','58')">
                  <input class="score" type="hidden" name="score_58" id="score_58">
                </div>
              </div>
            </div>
          </div>

          <div class="row panel-title">
            <button type="button" class="form-control collapseBtn" data-toggle="collapse" data-target="#criteria_detail_3">Criteria Detail</button>
          </div>

          <div class="row collapse" id="criteria_detail_3">

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>BEGINNING</span>
                  <textarea class="form-control" rows="4" name="txt_461" id="txt_461" value="" onKeyUp="return setTextToDiv('461');"> Presentation of ideas are not clear. Student shows limited effort to create unique presentation.
                </textarea>
                </div>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>DEVELOPING</span>
                  <textarea class="form-control" rows="4" name="txt_46" id="txt_46" value="" onKeyUp="return setTextToDiv('46');">Presentation of ideas are not clear. Student shows limited effort to create unique presentation.</textarea>
                </div>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>ACHIEVING</span>
                  <textarea class="form-control" rows="4" name="txt_50" id="txt_50" value="" onKeyUp="return setTextToDiv('50');">Student presents ideas in a simple and easy to understand format. Ideas are clear.</textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group">
                  <span>MASTERING</span>
                  <textarea class="form-control" rows="4" name="txt_54" id="txt_54" value="" onKeyUp="return setTextToDiv('54');">Student clearly articulates ideas into an engaging and creative piece of work that is meaningful.</textarea>
                </div>
              </div>
            </div>


          </div>
        </div>


        <div class="professional mt-5">
          <button class="show_btn btn-default" id="show_main_criteria_4" onclick="return displayCriteria('main_criteria_4','show')">Restore</button>
          <button class="hide_btn btn-default" id="hide_main_criteria_4" onclick="return displayCriteria('main_criteria_4','hide')">Delete</button>
          <input type="hidden" name="criteria_4_display" value="1">
          <h4>Assessment Criteria 4</h4>
        </div>
        <div class="main_criteria_4">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6">

              <div class="from-field">
                <div class="form-group">
                  <span>Criteria</span>
                  <input type="text" class="form-control" name="txt_59" id="txt_59" value="USE OF LANGUAGE & CONVENTIONS" onKeyUp="return setTextToDiv('59');">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="from-field">
                <div class="form-group">
                  <span>% Value</span>
                  <input type="text" class="form-control" name="txt_60" id="txt_60" value="15%" onKeyUp="return setTextToDiv('60');" onblur="calculateScore('60','73')">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="from-field">
                <div class="form-group col-md-5 display-inline">
                  <span>Level</span>
                  <select class="form-control" name="stanine_4" onChange="return setScale(4,this.value);">
                    <option value=""></option>
                    <option value="62">D-</option>
                    <option value="63">D</option>
                    <option value="64">D+</option>
                    <option value="66">C-</option>
                    <option value="67">C</option>
                    <option value="68">C+</option>
                    <option value="70">B-</option>
                    <option value="71">B</option>
                    <option value="72">B+</option>
                    <option value="701">A-</option>
                    <option value="711">A</option>
                    <option value="721">A+</option>
                  </select>
                </div>
                <div class="form-group col-md-6 display-inline">
                  <span>Score</span>
                  <input type="text" class="form-control" name="txt_73" id="txt_73" value="Score" onKeyUp="return setTextToDiv('73');" onblur="calculateScore('60','73')">
                  <input class="score" type="hidden" name="score_73" id="score_73">
                </div>
              </div>
            </div>
          </div>

          <div class="row panel-title">
            <button type="button" class="form-control collapseBtn" data-toggle="collapse" data-target="#criteria_detail_4">Criteria Detail</button>
          </div>

          <div class="row collapse" id="criteria_detail_4">
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>BEGINNING</span>
                  <textarea class="form-control" rows="4" name="txt_611" id="txt_611" value="" onKeyUp="return setTextToDiv('611');">Very high degree of errors in sentence structure and word usage makes writing difficult to understand. 
              </textarea>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>DEVELOPING</span>
                  <textarea class="form-control" rows="4" name="txt_61" id="txt_61" value="" onKeyUp="return setTextToDiv('61');">Frequent and severe errors in grammar, sentence structure and word usage.</textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>ACHIEVING</span>
                  <textarea class="form-control" rows="4" name="txt_65" id="txt_65" value="" onKeyUp="return setTextToDiv('65');">Limited errors in grammar, sentence structure and word usage. Content is easy to read. </textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>MASTERING</span>
                  <textarea class="form-control" rows="4" name="txt_69" id="txt_69" value="" onKeyUp="return setTextToDiv('69');">No errors in grammar, sentence structure and word usage. Creative use of language provides a thick, narrative description of content and themes. </textarea>
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="professional mt-5">
          <button class="show_btn btn-default" id="show_main_criteria_5" onclick="return displayCriteria('main_criteria_5','show')">Restore</button>
          <button class="hide_btn btn-default" id="hide_main_criteria_5" onclick="return displayCriteria('main_criteria_5','hide')">Delete</button>
          <input type="hidden" name="criteria_5_display" value="1">
          <h4>Assessment Criteria 5</h4>
        </div>

        <div class="main_criteria_5">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="from-field">
                <div class="form-group">
                  <span>Criteria</span>
                  <input type="text" class="form-control" name="txt_74" id="txt_74" value="WORD CHOICE" onKeyUp="return setTextToDiv('74');">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="from-field">
                <div class="form-group">
                  <span>% Value</span>
                  <input type="text" class="form-control" name="txt_75" id="txt_75" value="10%" onKeyUp="return setTextToDiv('75');" onblur="calculateScore('75','88')">
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="from-field">
                <div class="form-group col-md-5 display-inline">
                  <span>Level</span>
                  <select class="form-control" name="stanine_5" onChange="return setScale(5,this.value);">
                    <option value=""></option>
                    <option value="77">D-</option>
                    <option value="78">D</option>
                    <option value="79">D+</option>
                    <option value="81">C-</option>
                    <option value="82">C</option>
                    <option value="83">C+</option>
                    <option value="85">B-</option>
                    <option value="86">B</option>
                    <option value="87">B+</option>
                    <option value="851">A-</option>
                    <option value="861">A</option>
                    <option value="871">A+</option>
                  </select>
                </div>
                <div class="form-group col-md-6 display-inline">
                  <span>Score</span>
                  <input type="text" class="form-control" name="txt_88" id="txt_88" value="Score" onfocus="this.value=''" onKeyUp="return setTextToDiv('88');" onblur="calculateScore('75','88')">
                  <input class="score" type="hidden" name="score_88" id="score_88">
                </div>


              </div>

            </div>
          </div>

          <div class="row panel-title">
            <button type="button" class="form-control collapseBtn" data-toggle="collapse" data-target="#criteria_detail_5">Criteria Detail</button>
          </div>

          <div class="row collapse" id="criteria_detail_5">
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>BEGINNING</span>
                  <textarea class="form-control" rows="4" name="txt_761" id="txt_761" value="" onKeyUp="return setTextToDiv('761');">Very limited use of academic, transition, and descriptive words. Sentences repeat the same words frequently. 
                </textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">

              <div class="from-field">
                <div class="form-group"><span>DEVELOPING</span>
                  <textarea class="form-control" rows="4" name="txt_76" id="txt_76" value="" onKeyUp="return setTextToDiv('76');">Entry contains limited use of vocabulary. Few academic, transition, and descriptive words are used. </textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>ACHIEVING</span>
                  <textarea class="form-control" rows="4" name="txt_80" id="txt_80" value="" onKeyUp="return setTextToDiv('80');">Entry contains moderate use of vocabulary. Academic, transition, and descriptive words are used at grade level. </textarea>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
                <div class="form-group"><span>MASTERING</span>
                  <textarea class="form-control" rows="4" name="txt_84" id="txt_84" value="" onKeyUp="return setTextToDiv('84');">Entry contains excellent  use of vocabulary. Academic, transition, and descriptive words are used to create a storytelling experience. </textarea>
                </div>
              </div>
            </div>





          </div>
        </div>
        <?php echo $finalcomment; ?>

        <!--- this is test ---->

      </div>
    </form>
  </div>
</div>

<div class="right-panel show_left_panel">
  <div class="board">
    <div class="resume">
      <div class="btn-hover">
        <div class="download-btn" id="download_btn"> <?php echo $download_btn; ?></div>
      </div>
      <div class="top-header">
        <div class="row align-items-center">
          <?php echo $right_top; ?>
        </div>
        <div class="table-section">
          <table class="table table-bordered school-table">
            <thead>
              <tr>
                <th scope="col" id="txtdiv_6"><img src="<?php echo base_url('assets/img/headimg/assessment-criteria.jpg'); ?>"></th>
                <th scope="col" id="txtdiv_7011"><img src="<?php echo base_url('assets/img/headimg/beginning.jpg'); ?>"></th>
                <th scope="col" id="txtdiv_7"><img src="<?php echo base_url('assets/img/headimg/developing.jpg'); ?>"></th>
                <th scope="col" id="txtdiv_8"><img src="<?php echo base_url('assets/img/headimg/achieving.jpg'); ?>"></th>
                <th scope="col" id="txtdiv_9"><img src="<?php echo base_url('assets/img/headimg/mastering.jpg'); ?>"></th>
                <th class="bg-red" scope="col" id="txtdiv_10"><img src="<?php echo base_url('assets/img/headimg/score.jpg'); ?>"></th>
              </tr>
            </thead>
            <tbody>
              <!--Box 1--->
              <tr class="main_criteria_1">
                <th class="bg-gry" scope="row"><span id="txtdiv_11">BOOK SUMMARY</span>
                  <p id="txtdiv_12">30%</p>
                </th>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_131">Book summary is very limited. Summary does not show clear use of purpose and ideas.

                      Keywords: lists, locates,
                      numbers
                  </div>
                  <ul>
                    <li class="criteria_1" id="txtdiv_15">D-</li>
                    <li class="criteria_1" id="txtdiv_16">D</li>
                    <li class="criteria_1" id="txtdiv_17">D+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_13">Summary does not show a good use of content, purpose, and ideas. <br><br>
                      Keywords: lists, locates, numbers, defines, gathers</p>
                  </div>
                  <ul>
                    <li class="criteria_1" id="txtdiv_20">C-</li>
                    <li class="criteria_1" id="txtdiv_21">C</li>
                    <li class="criteria_1" id="txtdiv_22">C+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_18">Summary shows good use of the texts content, purpose and ideas. </br><br>Keywords: contrasts, examines, questions, concludes</p>
                  </div>
                  <ul>
                    <li class="criteria_1" id="txtdiv_25">B-</li>
                    <li class="criteria_1" id="txtdiv_26">B</li>
                    <li class="criteria_1" id="txtdiv_27">B+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_23">Summary shows a command of the book’s contents, purpose, and ideas.<br><br>Keywords: critiques, explains. Inferrs, links, deduces</p>
                  </div>
                  <ul>
                    <li class="criteria_1" id="txtdiv_251">A-</li>
                    <li class="criteria_1" id="txtdiv_261">A</li>
                    <li class="criteria_1" id="txtdiv_271">A+</li>
                  </ul>
                </td>
                <td>
                  <p class="fs-12" id="txtdiv_28"></p>
                </td>
              </tr>
              <!--Box 2--->
              <tr class="main_criteria_2">
                <th class="bg-gry" scope="row"><span id="txtdiv_29">CRITICAL ASSESSMENT OF TEXT</span>
                  <p id="txtdiv_30">25%</p>
                </th>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_311">Student struggles to critically engage with text.

                      Keywords: recites, repeats
                    </p>
                  </div>
                  <ul>
                    <li class="criteria_2" id="txtdiv_32">D-</li>
                    <li class="criteria_2" id="txtdiv_33">D</li>
                    <li class="criteria_2" id="txtdiv_34">D+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_31">Student struggles to critically engage with text.<br><br>Keywords: quotes, recites, repeats</p>
                  </div>
                  <ul>
                    <li class="criteria_2" id="txtdiv_36">C-</li>
                    <li class="criteria_2" id="txtdiv_37">C</li>
                    <li class="criteria_2" id="txtdiv_38">C+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_35">Writer shows moderate ability to critically engage with ideas in text. <br><br>Keywords: discovers, describes, examines</p>
                  </div>
                  <ul>
                    <li class="criteria_2" id="txtdiv_40">B-</li>
                    <li class="criteria_2" id="txtdiv_41">B</li>
                    <li class="criteria_2" id="txtdiv_42">B+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_39">Writer demonstrates strong analytical skills and critical engagement with the text.<br><br> Keywords: distinguishes, orders, judges </p>
                  </div>
                  <ul>
                    <li class="criteria_2" id="txtdiv_401">A-</li>
                    <li class="criteria_2" id="txtdiv_411">A</li>
                    <li class="criteria_2" id="txtdiv_421">A+</li>
                  </ul>
                </td>
                <td>
                  <p class="fs-12" id="txtdiv_43"></p>
                </td>
              </tr>
              <!--Box 3--->
              <tr class="main_criteria_3">
                <th class="bg-gry" scope="row"><span id="txtdiv_44">PRESENTATION OF IDEAS</span>
                  <p id="txtdiv_45">20%</p>
                </th>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_461">Presentation of ideas are not clear. Student shows limited effort to create unique presentation.
                    </p>
                  </div>
                  <ul>
                    <li class="criteria_3" id="txtdiv_47">D-</li>
                    <li class="criteria_3" id="txtdiv_48">D</li>
                    <li class="criteria_3" id="txtdiv_49">D+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_46">Presentation of ideas are not clear. Student shows limited effort to create unique presentation.</p>
                  </div>
                  <ul>
                    <li class="criteria_3" id="txtdiv_51">C-</li>
                    <li class="criteria_3" id="txtdiv_52">C</li>
                    <li class="criteria_3" id="txtdiv_53">C+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_50">Student presents ideas in a simple and easy to understand format. Ideas are clear.</p>
                  </div>
                  <ul>
                    <li class="criteria_3" id="txtdiv_55">B-</li>
                    <li class="criteria_3" id="txtdiv_56">B</li>
                    <li class="criteria_3" id="txtdiv_57">B+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_54">Student clearly articulates ideas into an engaging and creative piece of work that is meaningful.</p>
                  </div>
                  <ul>
                    <li class="criteria_3" id="txtdiv_551">A-</li>
                    <li class="criteria_3" id="txtdiv_561">A</li>
                    <li class="criteria_3" id="txtdiv_571">A+</li>
                  </ul>
                </td>
                <td>
                  <p class="fs-12" id="txtdiv_58"></p>
                </td>
              </tr>
              <!--Box 4--->
              <tr class="main_criteria_4">
                <th class="bg-gry" scope="row"><span id="txtdiv_59">USE OFLANGUAGE & CONVENTIONS</span>
                  <p id="txtdiv_60">15%</p>
                </th>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_611">Very high degree of errors in sentence structure and word usage makes writing difficult to understand.
                    </p>
                  </div>
                  <ul>
                    <li class="criteria_4" id="txtdiv_62">D-</li>
                    <li class="criteria_4" id="txtdiv_63">D</li>
                    <li class="criteria_4" id="txtdiv_64">D+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_61">Frequent and severe errors in grammar, sentence structure and word usage.</p>
                  </div>
                  <ul>
                    <li class="criteria_4" id="txtdiv_66">C-</li>
                    <li class="criteria_4" id="txtdiv_67">C</li>
                    <li class="criteria_4" id="txtdiv_68">C+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_65">Limited errors in grammar, sentence structure and word usage. Content is easy to read. </p>
                  </div>
                  <ul>
                    <li class="criteria_4" id="txtdiv_70">B-</li>
                    <li class="criteria_4" id="txtdiv_71">B</li>
                    <li class="criteria_4" id="txtdiv_72">B+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_69">No errors in grammar, sentence structure and word usage. Creative use of language provides a thick, narrative description of content and themes. </p>
                  </div>
                  <ul>
                    <li class="criteria_4" id="txtdiv_701">A-</li>
                    <li class="criteria_4" id="txtdiv_711">A</li>
                    <li class="criteria_4" id="txtdiv_721">A+</li>
                  </ul>
                </td>
                <td>
                  <p class="fs-12" id="txtdiv_73"></p>
                </td>
              </tr>
              <!--Box 5--->
              <tr class="main_criteria_5">
                <th class="bg-gry" scope="row"><span id="txtdiv_74">WORD CHOICE</span>
                  <p id="txtdiv_75">10%</p>
                </th>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_761">Very limited use of academic, transition, and descriptive words. Sentences repeat the same words frequently.
                    </p>
                  </div>
                  <ul>
                    <li class="criteria_5" id="txtdiv_77">D-</li>
                    <li class="criteria_5" id="txtdiv_78">D</li>
                    <li class="criteria_5" id="txtdiv_79">D+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_76">Entry contains limited use of vocabulary. Few academic, transition, and descriptive words are used. </p>
                  </div>
                  <ul>
                    <li class="criteria_5" id="txtdiv_81">C-</li>
                    <li class="criteria_5" id="txtdiv_82">C</li>
                    <li class="criteria_5" id="txtdiv_83">C+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_80">Entry contains moderate use of vocabulary. Academic, transition, and descriptive words are used at grade level. </p>
                  </div>
                  <ul>
                    <li class="criteria_5" id="txtdiv_85">B-</li>
                    <li class="criteria_5" id="txtdiv_86">B</li>
                    <li class="criteria_5" id="txtdiv_87">B+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p id="txtdiv_84">Entry contains excellent use of vocabulary. Academic, transition, and descriptive words are used to create a storytelling experience. </p>
                  </div>
                  <ul>
                    <li class="criteria_5" id="txtdiv_851">A-</li>
                    <li class="criteria_5" id="txtdiv_861">A</li>
                    <li class="criteria_5" id="txtdiv_871">A+</li>
                  </ul>
                </td>
                <td>
                  <div class="pd5">
                    <p class="fs-12" id="txtdiv_88"></p>
                </td>
        </div>
        </tr>
        <tr>
          <!--<th></th>-->
          <th class="text-center font_s" colspan="5" id="txtdiv_89">Final Comments</th>
          <!--<th class="bg-red font_s fs-12" id="txtdiv_90">FINAL SCORE</th>-->
          <th class="bg-red font_s fs-12" id="txtdiv_90"></th>
        </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

</div>

<?php echo $footer; ?>