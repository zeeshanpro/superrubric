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
						<input type="text" class="form-control" name="txt_11" id="txt_11" value="PRIMARY CONTENT CONTRIBUTION" onKeyUp="return setTextToDiv('11');">
					</div>
				</div> 
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_12" id="txt_12" value="| 40%" onKeyUp="return setTextToDiv('12');">
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
						<textarea class="form-control" rows="4" name="txt_13" id="txt_13" value="" onKeyUp="return setTextToDiv('13');">Limited effort made to create meaningful post for class discussion and discovery.
           
Keywords: identifies, indicates, recalls, records, tells, repeats</textarea>
					</div>
				</div>
			</div>
             
             
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">		
					<div class="form-group">
						<span>ACHIEVING</span>
						<textarea class="form-control" rows="4" name="txt_18" id="txt_18" value="" onKeyUp="return setTextToDiv('18');">Post supports task and facilitates some online discovery and dialogue. 
                
Keywords: compares, describes, expresses, explains, examines, organizes
						</textarea>
					</div>
				</div>
			</div>
                          
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">			
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_23" id="txt_23" value="" onKeyUp="return setTextToDiv('23');">Post is well-developed and fully addresses and develops all aspects of the task.
                
Keywords: persuades, validates, critiques, argues, animates, supports, integrates
						</textarea>
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
						<input type="text" class="form-control" name="txt_29" id="txt_29" value="CRITICAL ENGAGEMENT" onKeyUp="return setTextToDiv('29');">
				  </div>
				</div>
				
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_30" id="txt_30" value="| 30%" onKeyUp="return setTextToDiv('30');">
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
						<textarea class="form-control" rows="4" name="txt_31" id="txt_31" value="" onKeyUp="return setTextToDiv('31');">Limited ability to critically engage with discovery and makes few attempts to enrich or extend other peers posts.
                
Keywords: listens, reads, highlights, copies, retells</textarea>
					</div>
				</div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>ACHIEVING</span>
						<textarea class="form-control" rows="4" name="txt_35" id="txt_35" value="" onKeyUp="return setTextToDiv('35');">Shows a good ability prompt discussion and discovery. Helps to build new ideas with peers.

Keywords: interprets, extends, contrasts, classifies, judges, shares, questions 
						</textarea>
					</div>
				</div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_39" id="txt_39" value="" onKeyUp="return setTextToDiv('39');">Demonstrates analysis of others’ posts; extends meaningful discussion by building on previous posts.
                                
Keywords: concludes, explains, justifies, reflects, leads, collaborates</textarea>
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
					<input type="text" class="form-control" name="txt_44" id="txt_44" value="FREQUENCY" onKeyUp="return setTextToDiv('44');">
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
					<textarea class="form-control" rows="4" name="txt_46" id="txt_46" value="" onKeyUp="return setTextToDiv('46');">Limited frequency of participation. Student shows some ability to recognize discussion. </textarea>
				</div>
              </div>
            </div>
             
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field">
				<div class="form-group">
					<span>ACHIEVING</span>
					<textarea class="form-control" rows="4" name="txt_50" id="txt_50" value="" onKeyUp="return setTextToDiv('50');">Moderate frequency of participation. Responds to most forums where they are mentioned and recognizes the discussion.</textarea>
				</div>
              </div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
				<div class="from-field">	
					<div class="form-group">
						<span>MASTERING</span>
						<textarea class="form-control" rows="4" name="txt_54" id="txt_54" value="" onKeyUp="return setTextToDiv('54');">Frequent participation. Responds to all posts where they are mentioned and shows thoughtful response.</textarea>
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
						<input type="text" class="form-control" name="txt_59" id="txt_59" value="USE OF LANGUAGE & CONVENTIONS" onKeyUp="return setTextToDiv('59');">

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
                <textarea class="form-control" rows="4" name="txt_65" id="txt_65" value="" onKeyUp="return setTextToDiv('65');">Limited errors in grammar, sentence structure and word usage. Content is easy to read. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>MASTERING</span>
                <textarea class="form-control" rows="4" name="txt_69" id="txt_69" value="" onKeyUp="return setTextToDiv('69');">No errors in grammar, sentence structure and word usage. Creative use of language provides a thick, narrative description of content and themes. </textarea>
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
						<input type="text" class="form-control" name="txt_74" id="txt_74" value="FORMATTING & REFERENCES" onKeyUp="return setTextToDiv('74');">
					</div>
				</div>
              
				<div class="from-field">
					<div class="form-group">
						<span>PERCENT VALUE</span>
						<input type="text" class="form-control" name="txt_75" id="txt_75" value="| 10%" onKeyUp="return setTextToDiv('75');">
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
                <textarea class="form-control" rows="4" name="txt_76" id="txt_76" value="" onKeyUp="return setTextToDiv('76');">Frequent or severe errors in formatting. Uses and cites some sources. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>ACHIEVING</span>
                <textarea class="form-control" rows="4" name="txt_80" id="txt_80" value="" onKeyUp="return setTextToDiv('80');">Limited errors in formatting and references. Writer cites sources with accuracy. </textarea>
              </div></div>
            </div>
             
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="from-field"><div class="form-group"><span>MASTERING</span>
                <textarea class="form-control" rows="4" name="txt_84" id="txt_84" value="" onKeyUp="return setTextToDiv('84');">No errors in formatting and references. Writer uses references to strengthen post and extend discussion.</textarea>
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
                    <th class="bg-gry" scope="row"><span id="txtdiv_11">PRIMARY CONTENT CONTRIBUTION</span>
                      <p id="txtdiv_12">| 40%</p></th>
                    <td><div class="pd5"><p id="txtdiv_13">Limited effort made to create meaningful post for class discussion and discovery.<br><br>
                       Keywords: identifies, indicates, recalls, records, tells, repeats</p></div>
                      <ul>
                        <li class="criteria_1"id="txtdiv_15">1</li>
                        <li class="criteria_1" id="txtdiv_16">2</li>
                        <li class="criteria_1" id="txtdiv_17">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_18">Post supports task and facilitates some online discovery and dialogue.</br><br> Keywords: compares, describes, expresses, explains, examines, organizes</p>
                    </div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_20">4</li>
                        <li class="criteria_1" id="txtdiv_21">5</li>
                        <li class="criteria_1" id="txtdiv_22">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_23">Post is well-developed and fully addresses and develops all aspects of the task.<br><br>Keywords: persuades, validates, critiques, argues, animates, supports, integrates</p></div>
                      <ul>
                        <li class="criteria_1" id="txtdiv_25">7</li>
                        <li class="criteria_1" id="txtdiv_26">8</li>
                        <li class="criteria_1" id="txtdiv_27">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_28"></p></td>
                  </tr>
                  <!--Box 2--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_29">CRITICAL ENGAGEMENT</span>
                      <p id="txtdiv_30">| 30%</p></th>
                    <td><div class="pd5"><p id="txtdiv_31">Limited ability to critically engage with discovery and makes few attempts to enrich or extend other peers posts.<br><br> Keywords: listens, reads, highlights, copies, retells</p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_32">1</li>
                        <li class="criteria_2" id="txtdiv_33">2</li>
                        <li class="criteria_2" id="txtdiv_34">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_35">Shows a good ability prompt discussion and discovery. Helps to build new ideas with peers.<br><br>Keywords: interprets, extends, contrasts, classifies, judges, shares, questions </p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_36">4</li>
                        <li class="criteria_2" id="txtdiv_37">5</li>
                        <li class="criteria_2" id="txtdiv_38">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_39">Demonstrates analysis of others’ posts; extends meaningful discussion by building on previous posts.<br><br> Keywords: concludes, explains, justifies, reflects, leads, collaborates </p></div>
                      <ul>
                        <li class="criteria_2" id="txtdiv_40">7</li>
                        <li class="criteria_2" id="txtdiv_41">8</li>
                        <li class="criteria_2" id="txtdiv_42">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_43"></p></td>
                  </tr>
                  <!--Box 3--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_44">FREQUENCY </span>
                      <p id="txtdiv_45">| 10%</p></th>
                    <td><div class="pd5"><p id="txtdiv_46">Limited frequency of participation. Student shows some ability to recognize discussion. </p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_47">1</li>
                        <li class="criteria_3" id="txtdiv_48">2</li>
                        <li class="criteria_3" id="txtdiv_49">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_50">Moderate frequency of participation. Responds to most forums where they are mentioned and recognizes the discussion.</p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_51">4</li>
                        <li class="criteria_3" id="txtdiv_52">5</li>
                        <li class="criteria_3" id="txtdiv_53">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_54">Frequent participation. Responds to all posts where they are mentioned and shows thoughtful response.</p></div>
                      <ul>
                        <li class="criteria_3" id="txtdiv_55">7</li>
                        <li class="criteria_3" id="txtdiv_56">8</li>
                        <li class="criteria_3" id="txtdiv_57">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_58"></p></td>
                  </tr>
                  <!--Box 4--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_59"> USE OF LANGUAGE & CONVENTIONS </span>
                      <p id="txtdiv_60">| 10%</p></th>
                    <td><div class="pd5"><p id="txtdiv_61">Frequent and severe errors in grammar, sentence structure and word usage. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_62">1</li>
                        <li class="criteria_4" id="txtdiv_63">2</li>
                        <li class="criteria_4" id="txtdiv_64">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_65">Limited errors in grammar, sentence structure and word usage. Content is easy to read. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_66">4</li>
                        <li class="criteria_4" id="txtdiv_67">5</li>
                        <li class="criteria_4" id="txtdiv_68">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_69">No errors in grammar, sentence structure and word usage. Creative use of language provides a thick, narrative description of content and themes. </p></div>
                      <ul>
                        <li class="criteria_4" id="txtdiv_70">7</li>
                        <li class="criteria_4" id="txtdiv_71">8</li>
                        <li class="criteria_4" id="txtdiv_72">9</li>
                      </ul></td>
                    <td><p class="fs-12" id="txtdiv_73"></p></td>
                  </tr>
                  <!--Box 5--->
                  <tr>
                    <th class="bg-gry" scope="row"><span id="txtdiv_74">FORMATTING & REFERENCES</span>
                      <p id="txtdiv_75">| 10%</p></th>
                    <td><div class="pd5"><p id="txtdiv_76">Frequent or severe errors in formatting. Uses and cites some sources. </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_77">1</li>
                        <li class="criteria_5" id="txtdiv_78">2</li>
                        <li class="criteria_5" id="txtdiv_79">3</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_80">Limited errors in formatting and references. Writer cites sources with accuracy. </p></div>
                      <ul>
                        <li class="criteria_5" id="txtdiv_81">4</li>
                        <li class="criteria_5" id="txtdiv_82">5</li>
                        <li class="criteria_5" id="txtdiv_83">6</li>
                      </ul></td>
                    <td><div class="pd5"><p id="txtdiv_84">No errors in formatting and references. Writer uses references to strengthen post and extend discussion.</p></div>
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
