<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $header;   ?>
<div class="action">
      <div class="from-section">
		<form id="pdfgenrate" action="<?php echo base_url('/templates/domconvertpdf'); ?>" method="post" name="">  
         <?php echo $left_top; ?>
        <div class="from-box">
           
          <div class="professional mt-5">
            <h4>ASSESSMENT CRITERIA 1</h4>
          </div>
          <div class="row">
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span> CRITERIA </span>
						<input type="text" class="form-control" name="txt_11" id="txt_11" value="PATTERNS & ALGEBRA" onKeyUp="return setTextToDiv('11');">
					</div>
				</div> 
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_12" id="txt_12" value="| 20%" onKeyUp="return setTextToDiv('12');">
					</div>
				 </div>
				 <div class="from-field">
					<div class="form-group col-md-5 display-inline">
						<span>STANINE</span>
                            <select class="form-control" name="stanine_1" onChange="return setScale(1,this.value);">
                               <option value=""></option> <option value="15">1</option><option value="16">2</option><option value="17">3</option><option value="20">4</option><option value="21">5</option><option value="22">6</option><option value="25">7</option><option value="26">8</option><option value="27">9</option>
                            </select>
					</div>
					<div class="form-group col-md-6 display-inline">
						<span>SCORE</span>
						<input type="text" class="form-control" name="txt_28" id="txt_28" value="Score" onKeyUp="return setTextToDiv('28');">
					</div>
				</div> 
              
            </div>
            
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">	
					<div class="form-group">
						<span>DEVELOPING </span>
						<textarea class="form-control" rows="4" name="txt_13" id="txt_13" value="" onKeyUp="return setTextToDiv('13');">Limited ability to substitute, combine or express terms. With assistance, the student is capable of 1-2 step problems.</textarea>
					</div>
				</div>
			</div>
             
             
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">		
					<div class="form-group">
						<span>ACHIEVING</span>
						<textarea class="form-control" rows="4" name="txt_18" id="txt_18" value="" onKeyUp="return setTextToDiv('18');">Good ability to substitute, combine or express terms. Student is comfortable with 1-2 step problems and is progressing into equations that require adapted formulas.</textarea>
					</div>
				</div>
			</div>
                          
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">			
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_23" id="txt_23" value="" onKeyUp="return setTextToDiv('23');">Exceptional ability to substitute, combine or express terms. Student is capable of manipulating a formula to solve a problem.</textarea>
					</div>
				</div>
			</div>
              
            
          </div>
          
          
          <div class="professional mt-5">
            <h4>ASSESSMENT CRITERIA 2</h4>
          </div>
          <div class="row">
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">	
				  <div class="form-group">
						<span>CRITERIA</span>
						<input type="text" class="form-control" name="txt_29" id="txt_29" value="NUMBER SENSE AND NUMERATION" onKeyUp="return setTextToDiv('29');">
				  </div>
				</div>
				
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_30" id="txt_30" value="| 20%" onKeyUp="return setTextToDiv('30');">
					</div>
				 </div>
				
				<div class="from-field">	
					<div class="form-group col-md-5 display-inline">
						<span>STANINE</span>
                            <select class="form-control" name="stanine_2" onChange="return setScale(2,this.value);">
                               <option value=""></option> <option value="32">1</option><option value="33">2</option><option value="34">3</option><option value="36">4</option><option value="37">5</option><option value="38">6</option><option value="40">7</option><option value="41">8</option><option value="42">9</option>
                            </select>
					</div>
					<div class="form-group col-md-6 display-inline">
						<span>SCORE</span>
						<input type="text" class="form-control" name="txt_43" id="txt_43" value="Score" onKeyUp="return setTextToDiv('43');">
					</div>
				</div>
              
              
            </div>
            
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>DEVELOPING</span>
						<textarea class="form-control" rows="4" name="txt_31" id="txt_31" value="" onKeyUp="return setTextToDiv('31');">Student shows difficulty understanding place value, number comparisons and basic 1-2 digit addition/subtraction.</textarea>
					</div>
				</div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>ACHIEVING</span>
						<textarea class="form-control" rows="4" name="txt_35" id="txt_35" value="" onKeyUp="return setTextToDiv('35');">Student is capable of understanding place value, number comparisons and basic 1-2 digit addition/subtraction. Student is able to multiply and divide using assistive technology.</textarea>
					</div>
				</div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_39" id="txt_39" value="" onKeyUp="return setTextToDiv('39');">Student has a deep understanding of place value, number comparisons and numeration. Student is capable of word problems and regularly calculates 1-2 digit problems without assistive technology. </textarea>
					</div>
				</div>
            </div>
             
             
          </div>
          
          
          <div class="professional mt-5">
            <h4>ASSESSMENT CRITERIA 3</h4>
          </div>
          
          
          <div class="row">
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              
              <div class="from-field">
				<div class="form-group">
					<span>CRITERIA</span>
					<input type="text" class="form-control" name="txt_44" id="txt_44" value="GEOMETRY & SPATIAL SENSE" onKeyUp="return setTextToDiv('44');">
                </div>
              </div>
              
             <div class="from-field">
				<div class="form-group">
					<span>PERCENT VALUE</span>
					<input type="text" class="form-control" name="txt_45" id="txt_45" value="| 20%" onKeyUp="return setTextToDiv('45');">
				</div>
			 </div>
              
              <div class="from-field">
				 <div class="form-group col-md-5 display-inline">
						<span>STANINE</span>
                            <select class="form-control" name="stanine_3" onChange="return setScale(3,this.value);">
                               <option value=""></option> <option value="47">1</option><option value="48">2</option><option value="49">3</option><option value="51">4</option><option value="52">5</option><option value="53">6</option><option value="55">7</option><option value="56">8</option><option value="57">9</option>
                            </select>
				    </div>
				  <div class="form-group col-md-6 display-inline">
						<span>SCORE </span>
						<input type="text" class="form-control" name="txt_58" id="txt_58" value="Score" onKeyUp="return setTextToDiv('58');">
				  </div>
              </div>
              
              
            </div>
            
            
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
				<div class="form-group">
					<span>DEVELOPING</span>
					<textarea class="form-control" rows="4" name="txt_46" id="txt_46" value="" onKeyUp="return setTextToDiv('46');">Student demonstrates limited ability for shape identification and basic geometric equations. </textarea>
				</div>
              </div>
            </div>
             
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
				<div class="form-group">
					<span>ACHIEVING</span>
					<textarea class="form-control" rows="4" name="txt_50" id="txt_50" value="" onKeyUp="return setTextToDiv('50');">Student demonstrates ability to understand angles and equations needed to solve geometric problems. Student is gaining the ability to manipulate an equation to solve.</textarea>
				</div>
              </div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">	
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_54" id="txt_54" value="" onKeyUp="return setTextToDiv('54');">Detailed skills for geometry lead to complex problems and fast processing speeds. Student completes coursework with high accuracy and requires few prompts.</textarea>
					</div>
				</div>
			</div>
             
             
          </div>
          
          
          
          <div class="professional mt-5">
            <h4>ASSESSMENT CRITERIA 4</h4>
          </div>
          <div class="row">
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				
				<div class="from-field">		
					<div class="form-group">
						<span>CRITERIA</span>
						<input type="text" class="form-control" name="txt_59" id="txt_59" value="DATA & STATS" onKeyUp="return setTextToDiv('59');">

					</div>
				</div>
				
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_60" id="txt_60" value="| 20%" onKeyUp="return setTextToDiv('60');">
					</div>
				</div>
              
              <div class="from-field">
				  <div class="form-group col-md-5 display-inline">
						<span>STANINE</span>
                            <select class="form-control" name="stanine_4" onChange="return setScale(4,this.value);">
                               <option value=""></option> <option value="62">1</option><option value="63">2</option><option value="64">3</option><option value="66">4</option><option value="67">5</option><option value="68">6</option><option value="70">7</option><option value="71">8</option><option value="72">9</option>
                            </select>
				  </div>
				  <div class="form-group col-md-6 display-inline">
						<span>SCORE</span>
						<input type="text" class="form-control" name="txt_73" id="txt_73" value="Score" onKeyUp="return setTextToDiv('73');">
				  </div>
			  </div>
              
            </div>
            
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field"><div class="form-group"><span>DEVELOPING</span>
					<textarea class="form-control" rows="4" name="txt_61" id="txt_61" value="" onKeyUp="return setTextToDiv('61');">Limited ability to read and represent data. Student is developing the ability to calculate mean, median and mode. </textarea>
				</div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>ACHIEVING</span>
                <textarea class="form-control" rows="4" name="txt_65" id="txt_65" value="" onKeyUp="return setTextToDiv('65');">Good ability to read and represent data. Student can calculate mean, median, and mode. Student is beginning to understand distributions, and deviations. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>MASTERING</span>
                <textarea class="form-control" rows="4" name="txt_69" id="txt_69" value="" onKeyUp="return setTextToDiv('69');">A deep understanding for data and stats leads to concrete work with detailed graphs, plots, and representations. Student is able to understand what story the numbers tell. </textarea>
              </div></div>
            </div>
             
             
          </div>
          
          
          <div class="professional mt-5">
            <h4>ASSESSMENT CRITERIA 5</h4>
          </div>
          <div class="row">
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>CRITERIA</span>
						<input type="text" class="form-control" name="txt_74" id="txt_74" value="LIFE SKILLS MATH" onKeyUp="return setTextToDiv('74');">
					</div>
				</div>
              
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_75" id="txt_75" value="| 20%" onKeyUp="return setTextToDiv('75');">
					</div>
				</div>
              
              
              <div class="from-field">
				<div class="form-group col-md-5 display-inline">
						<span>STANINE</span>
                            <select class="form-control" name="stanine_5" onChange="return setScale(5,this.value);">
                               <option value=""></option> <option value="77">1</option><option value="78">2</option><option value="79">3</option><option value="81">4</option><option value="82">5</option><option value="83">6</option><option value="85">7</option><option value="86">8</option><option value="87">9</option>
                            </select>
				</div>
				<div class="form-group col-md-6 display-inline">
					<span>SCORE</span>
					<input type="text" class="form-control" name="txt_88" id="txt_88" value="Score" onfocus="this.value=''" onKeyUp="return setTextToDiv('88');">
				</div>
              </div>
              
            </div>
            
            
            <div class="col-sm-6 col-md-6 col-lg-3">
					
              <div class="from-field"><div class="form-group"><span>DEVELOPING</span>
                <textarea class="form-control" rows="4" name="txt_76" id="txt_76" value="" onKeyUp="return setTextToDiv('76');">Life skills such as saving, budgeting, and investing have not been observed. Student shows difficulty with telling time and measurement. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>ACHIEVING</span>
               <textarea class="form-control" rows="4" name="txt_80" id="txt_80" value="" onKeyUp="return setTextToDiv('80');">Life skills such as saving, budgeting, and investing have been demonstrated. Student is capable of telling time, and understanding measurement. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>MASTERING</span>
                <textarea class="form-control" rows="4" name="txt_84" id="txt_84" value="" onKeyUp="return setTextToDiv('84');">Life skills such as saving, budgeting, and investing are clearly visible. Student is capable of telling time, and understanding measurement and uses them to better their education. </textarea>
              </div></div>
            </div>
            
            
            
            <?php echo $finalcomment; ?>
          
          </div>
          
           
          
          <!--- this is test ---->
          
        </div>
		</form>
      </div>
    </div>
    
    
 <div class="right-panel">
      <div class="board">
        <div class="resume">
		<div class="btn-hover">
			<div class="download-btn" id="download_btn" > <?php echo $download_btn; ?></div>
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
                    <th scope="col" id="txtdiv_7"><img src="<?php echo base_url('assets/img/headimg/developing.jpg'); ?>"></th>
                    <th scope="col" id="txtdiv_8"><img src="<?php echo base_url('assets/img/headimg/achieving.jpg'); ?>"></th>
                    <th scope="col" id="txtdiv_9"><img src="<?php echo base_url('assets/img/headimg/mastering.jpg'); ?>"></th>
                    <th class="bg-red" scope="col" id="txtdiv_10"><img src="<?php echo base_url('assets/img/headimg/score.jpg'); ?>"></th>
                 </tr>
                </thead>
                <tbody>
                  <!--Box 1--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_11">PATTERNS & ALGEBRA</span>
                      <p id="txtdiv_12">| 20%</p></th>
                    <td><div class="pd5"><p id="txtdiv_13">Limited ability to substitute, combine or express terms. With assistance, the student is capable of 1-2 step problems.</p></div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_15">1</li>
                        <li class="criteria_1" id="txtdiv_16">2</li>
                        <li class="criteria_1" id="txtdiv_17">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_18">Good ability to substitute, combine or express terms. Student is comfortable with 1-2 step problems and is progressing into equations that require adapted formulas.</p>
                    </div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_20">4</li>
                        <li class="criteria_1" id="txtdiv_21">5</li>
                        <li class="criteria_1" id="txtdiv_22">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_23">Exceptional ability to substitute, combine or express terms. Student is capable of manipulating a formula to solve a problem.</p></div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_25">7</li>
                        <li class="criteria_1" id="txtdiv_26">8</li>
                        <li class="criteria_1" id="txtdiv_27">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_28"></p></td>
                  </tr>
                  <!--Box 2--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_29">NUMBER SENSE AND NUMERATION</span>
                      <p id="txtdiv_30">| 20%</p></th>
                    <td><div class="pd5"><p id="txtdiv_31">Student shows difficulty understanding place value, number comparisons and basic 1-2 digit addition/subtraction.</p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_32">1</li>
                        <li class="criteria_2" id="txtdiv_33">2</li>
                        <li class="criteria_2" id="txtdiv_34">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_35">Student is capable of understanding place value, number comparisons and basic 1-2 digit addition/subtraction. Student is able to multiply and divide using assistive technology.</p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_36">4</li>
                        <li class="criteria_2" id="txtdiv_37">5</li>
                        <li class="criteria_2" id="txtdiv_38">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_39">Student has a deep understanding of place value, number comparisons and numeration. Student is capable of word problems and regularly calculates 1-2 digit problems without assistive technology.</p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_40">7</li>
                        <li class="criteria_2" id="txtdiv_41">8</li>
                        <li class="criteria_2" id="txtdiv_42">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_43"></p></td>
                  </tr>
                  <!--Box 3--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_44">GEOMETRY & SPATIAL SENSE </span>
                      <p id="txtdiv_45">| 20%</p></th>
                    <td><div class="pd5"><p id="txtdiv_46">Student demonstrates limited ability for shape identification and basic geometric equations. </p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_47">1</li>
                        <li class="criteria_3" id="txtdiv_48">2</li>
                        <li class="criteria_3" id="txtdiv_49">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_50">Student demonstrates ability to understand angles and equations needed to solve geometric problems. Student is gaining the ability to manipulate an equation to solve.</p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_51">4</li>
                        <li class="criteria_3" id="txtdiv_52">5</li>
                        <li class="criteria_3" id="txtdiv_53">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_54">Detailed skills for geometry lead to complex problems and fast processing speeds. Student completes coursework with high accuracy and requires few prompts.</p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_55">7</li>
                        <li class="criteria_3" id="txtdiv_56">8</li>
                        <li class="criteria_3" id="txtdiv_57">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_58"></p></td>
                  </tr>
                  <!--Box 4--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_59">DATA & STATS</span>
                      <p id="txtdiv_60">| 20%</p></th>
                    <td><div class="pd5"><p id="txtdiv_61">Limited ability to read and represent data. Student is developing the ability to calculate mean, median and mode. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_62">1</li>
                        <li class="criteria_4" id="txtdiv_63">2</li>
                        <li class="criteria_4" id="txtdiv_64">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_65">Good ability to read and represent data. Student can calculate mean, median, and mode. Student is beginning to understand distributions, and deviations. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_66">4</li>
                        <li class="criteria_4" id="txtdiv_67">5</li>
                        <li class="criteria_4" id="txtdiv_68">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_69">A deep understanding for data and stats leads to concrete work with detailed graphs, plots, and representations. Student is able to understand what story the numbers tell. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_70">7</li>
                        <li class="criteria_4" id="txtdiv_71">8</li>
                        <li class="criteria_4" id="txtdiv_72">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_73"></p></td>
                  </tr>
                  <!--Box 5--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_74">LIFE SKILLS MATH</span>
                      <p id="txtdiv_75">| 20%</p></th>
                    <td><div class="pd5"><p id="txtdiv_76">Life skills such as saving, budgeting, and investing have not been observed. Student shows difficulty with telling time and measurement. </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_77">1</li>
                        <li class="criteria_5" id="txtdiv_78">2</li>
                        <li class="criteria_5" d="txtdiv_79">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_80">Life skills such as saving, budgeting, and investing have been demonstrated. Student is capable of telling time, and understanding measurement. </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_81">4</li>
                        <li class="criteria_5" id="txtdiv_82">5</li>
                        <li class="criteria_5" id="txtdiv_83">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_84">Life skills such as saving, budgeting, and investing are clearly visible. Student is capable of telling time, and understanding measurement and uses them to better their education. </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_85">7</li>
                        <li class="criteria_5" id="txtdiv_86">8</li>
                        <li class="criteria_5" id="txtdiv_87">9</li>
                      </ul></td>
                    <td><div class="pd5"><p class="fs-12" id="txtdiv_88"></p></td></div>
                  </tr>
                  <tr>

                    <th></th>
                     <th class="text-center font_s" colspan="3" id="txtdiv_89">FINAL COMMENTS</th>
                     <th class="bg-red font_s" id="txtdiv_90">FINAL SCORE</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
       
    </div>
   
<?php  echo $footer; ?>
