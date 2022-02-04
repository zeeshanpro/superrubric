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
						<input type="text" class="form-control" name="txt_11" id="txt_11" value="CONTENT & CLARITY" onKeyUp="return setTextToDiv('11');">
					</div>
				</div> 
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_12" id="txt_12" value="| 35%" onKeyUp="return setTextToDiv('12');">
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
						<textarea class="form-control" rows="4" name="txt_13" id="txt_13" value="" onKeyUp="return setTextToDiv('13');">Limited depth of content. Clarity of writing needs development.
                
Keywords: recalls, records, numbers, lists, tells, defines</textarea>
					</div>
				</div>
			</div>
             
             
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">		
					<div class="form-group">
						<span>ACHIEVING</span>
						<textarea class="form-control" rows="4" name="txt_18" id="txt_18" value="" onKeyUp="return setTextToDiv('18');">Moderate depth of content. Writing demonstrates good clarity.
                
Keywords: expresses, relates, examines, sketches, articulates</textarea>
					</div>
				</div>
			</div>
                          
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">			
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_23" id="txt_23" value="" onKeyUp="return setTextToDiv('23');">Thick description. Detailed content provides very good clarity.
                
Keywords: persuades, critiques, argues, animates, designs, convinces</textarea>
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
						<input type="text" class="form-control" name="txt_29" id="txt_29" value="STRUCTURE & ORGANIZATION" onKeyUp="return setTextToDiv('29');">
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
						<textarea class="form-control" rows="4" name="txt_31" id="txt_31" value="" onKeyUp="return setTextToDiv('31');">Lack of coherent themes. Unclear and difficult to understand ideas

Keywords: matches, retells, selects, quotes, lists </textarea>
					</div>
				</div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>ACHIEVING</span>
						<textarea class="form-control" rows="4" name="txt_35" id="txt_35" value="" onKeyUp="return setTextToDiv('35');">Appropriate organization. Satisfying articulation of ideas. 
                
Keywords: articulates, determines, inferrs, summarizes, questions, explains</textarea>
					</div>
				</div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_39" id="txt_39" value="" onKeyUp="return setTextToDiv('39');">Logical, structured and engaging ideas create clear themes and organization. 

Keywords: reflects, defends, debates, predicts, solves</textarea>
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
					<input type="text" class="form-control" name="txt_44" id="txt_44" value="DETAIL & VOICE" onKeyUp="return setTextToDiv('44');">
                </div>
              </div>
              
             <div class="from-field">
				<div class="form-group">
					<span>PERCENT VALUE</span>
					<input type="text" class="form-control" name="txt_45" id="txt_45" value="| 10%" onKeyUp="return setTextToDiv('45');">
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
					<textarea class="form-control" rows="4" name="txt_46" id="txt_46" value="" onKeyUp="return setTextToDiv('46');">Writing appears mechanical and lifeless. Some effort made to develop personality in the writing.  </textarea>
				</div>
              </div>
            </div>
             
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
				<div class="form-group">
					<span>ACHIEVING</span>
					<textarea class="form-control" rows="4" name="txt_50" id="txt_50" value="" onKeyUp="return setTextToDiv('50');">Good ability to develop personality in writing. Entry contains detail with articulate writing. </textarea>
				</div>
              </div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">	
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_54" id="txt_54" value="" onKeyUp="return setTextToDiv('54');">Critically articulates voice to create unique reading experience. Expressive, engaging, and emotional.</textarea>
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
						<input type="text" class="form-control" name="txt_59" id="txt_59" value="USE OFLANGUAGE & CONVENTIONS" onKeyUp="return setTextToDiv('59');">

					</div>
				</div>
				
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_60" id="txt_60" value="| 10%" onKeyUp="return setTextToDiv('60');">
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
					<textarea class="form-control" rows="4" name="txt_61" id="txt_61" value="" onKeyUp="return setTextToDiv('61');">Frequent and severe errors in grammar, sentence structure and word usage. </textarea>
				</div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>ACHIEVING</span>
                <textarea class="form-control" rows="4" name="txt_65" id="txt_65" value="" onKeyUp="return setTextToDiv('65');">Limited errors in grammar, sentence structure and word usage. Content is easy to read.  </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>MASTERING</span>
                <textarea class="form-control" rows="4" name="txt_69" id="txt_69" value="" onKeyUp="return setTextToDiv('69');">No errors in grammar, sentence structure and word usage. Creative use of language provides a thick, narrative description of content and themes.</textarea>
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
						<input type="text" class="form-control" name="txt_74" id="txt_74" value="WORD CHOICE" onKeyUp="return setTextToDiv('74');">
					</div>
				</div>
              
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_75" id="txt_75" value="| 25%" onKeyUp="return setTextToDiv('75');">
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
                <textarea class="form-control" rows="4" name="txt_76" id="txt_76" value="" onKeyUp="return setTextToDiv('76');">Entry contains limited use of vocabulary. Few academic, transition or descriptive words are used. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>ACHIEVING</span>
                <textarea class="form-control" rows="4" name="txt_80" id="txt_80" value="" onKeyUp="return setTextToDiv('80');">Entry contains moderate use of vocabulary. Academic, transition, and descriptive words are used at grade level.  </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>MASTERING</span>
                <textarea class="form-control" rows="4" name="txt_84" id="txt_84" value="" onKeyUp="return setTextToDiv('84');">Entry contains excellent  use of vocabulary. Academic, transition, and descriptive words are used to create a storytelling experience.</textarea>
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
                    <th class="bg-gry" scope="row"><span id="txtdiv_11"> CONTENT & CLARITY</span>
                      <p id="txtdiv_12">| 35%</p></th>
                    <td><div class="pd5"><p id="txtdiv_13">Limited depth of content. Clarity of writing needs development. <br><br>Keywords: recalls, records, numbers, lists, tells, defines</p></div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_15">1</li>
                        <li class="criteria_1" id="txtdiv_16">2</li>
                        <li class="criteria_1" id="txtdiv_17">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_18">Moderate depth of content. Writing demonstrates good clarity.  <br><br>Keywords: expresses, relates, examines, sketches, articulates </p>
                    </div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_20">4</li>
                        <li class="criteria_1" id="txtdiv_21">5</li>
                        <li class="criteria_1" id="txtdiv_22">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_23">Thick description. Detailed content provides very good clarity. <br><br>Keywords: persuades, critiques, argues, animates, designs, convinces</p></div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_25">7</li>
                        <li class="criteria_1" id="txtdiv_26">8</li>
                        <li class="criteria_1" id="txtdiv_27">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_28"></p></td>
                  </tr>
                  <!--Box 2--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_29">STRUCTURE & ORGANIZATION</span>
                      <p id="txtdiv_30">| 20%</p></th>
                    <td><div class="pd5"><p id="txtdiv_31">Lack of coherent themes. Unclear and difficult to understand ideas <br><br>Keywords: matches, retells, selects, quotes, lists    </p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_32">1</li>
                        <li class="criteria_2" id="txtdiv_33">2</li>
                        <li class="criteria_2" id="txtdiv_34">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_35">Appropriate organization. Satisfying articulation of ideas.   <br><br>Keywords: articulates, determines, inferrs, summarizes, questions, explains</p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_36">4</li>
                        <li class="criteria_2" id="txtdiv_37">5</li>
                        <li class="criteria_2" id="txtdiv_38">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_39">Logical, structured and engaging ideas create clear themes and organization.  <br><br>Keywords: reflects, defends, debates, predicts, solves</p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_40">7</li>
                        <li class="criteria_2" id="txtdiv_41">8</li>
                        <li class="criteria_2" id="txtdiv_42">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_43"></p></td>
                  </tr>
                  <!--Box 3--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_44"> DETAIL & VOICE </span>
                      <p id="txtdiv_45">| 10%</p></th>
                    <td><div class="pd5"><p id="txtdiv_46">Writing appears mechanical and lifeless. Some effort made to develop personality in the writing.  </p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_47">1</li>
                        <li class="criteria_3" id="txtdiv_48">2</li>
                        <li class="criteria_3" id="txtdiv_49">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_50">Good ability to develop personality in writing. Entry contains detail with articulate writing. </p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_51">4</li>
                        <li class="criteria_3" id="txtdiv_52">5</li>
                        <li class="criteria_3" id="txtdiv_53">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_54">Critically articulates voice to create unique reading experience. Expressive, engaging, and emotional.</p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_55">7</li>
                        <li class="criteria_3" id="txtdiv_56">8</li>
                        <li class="criteria_3" id="txtdiv_57">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_58"></p></td>
                  </tr>
                  <!--Box 4--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_59">USE OF LANGUAGE & CONVENTIONS</span>
                      <p id="txtdiv_60">| 10%</p></th>
                    <td><div class="pd5"><p id="txtdiv_61">Frequent and severe errors in grammar, sentence structure and word usage. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_62">1</li>
                        <li class="criteria_4" id="txtdiv_63">2</li>
                        <li class="criteria_4" id="txtdiv_64">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_65">Limited errors in grammar, sentence structure and word usage. Content is easy to read.  </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_66">4</li>
                        <li class="criteria_4" id="txtdiv_67">5</li>
                        <li class="criteria_4" id="txtdiv_68">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_69">No errors in grammar, sentence structure and word usage. Creative use of language provides a thick, narrative description of content and themes.</p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_70">7</li>
                        <li class="criteria_4" id="txtdiv_71">8</li>
                        <li class="criteria_4" id="txtdiv_72">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_73"></p></td>
                  </tr>
                  <!--Box 5--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_74">WORD CHOICE</span>
                      <p id="txtdiv_75">| 25%</p></th>
                    <td><div class="pd5"><p id="txtdiv_76">Entry contains limited use of vocabulary. Few academic, transition or descriptive words are used. </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_77">1</li>
                        <li class="criteria_5" id="txtdiv_78">2</li>
                        <li class="criteria_5" id="txtdiv_79">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_80">Entry contains moderate use of vocabulary. Academic, transition, and descriptive words are used at grade level.  </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_81">4</li>
                        <li class="criteria_5" id="txtdiv_82">5</li>
                        <li class="criteria_5" id="txtdiv_83">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_84">Entry contains excellent  use of vocabulary. Academic, transition, and descriptive words are used to create a storytelling experience.</p></div>
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
