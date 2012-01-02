<div style="margin:0 auto; width:850px;"><div id="header-section">
  <div id="header" class="wrapper">
  <?=$html->image('header.png', array("alt"=>"Survey","width"=>"850"));?>
  </div>
</div><!-- /header -->

<div id="form-section">
  <div id="form" class="wrapper" style="float:left;">    
	<form action="/survey/surveys/add" id="SurveyAddForm" method="post" accept-charset="utf-8">
  <div style="display:none;">
    <input type="hidden" name="_method" value="POST">
  </div>
  
  
   <!-- ************ Question 1 *************-->
      <div class="question">
        <div class="number-box">
          <span class="number">1</span> <!-- end number -->
        </div>
        <div class="question-box">
          <h1><strong>Please enter your details below:</strong></h1>
            
  <input type="text" class="text-input" name="data[Survey][first_name]" value="" placeholder="First Name">
<br /><br />            <input type="text" class="text-input" name="data[Survey][last_name]" value="" placeholder="Last Name">
<br /><br />            <input type="text" class="text-input" name="data[Survey][email]" value="" placeholder="Email">
<br /><br />            <input type="text" class="text-input" name="data[Survey][phone]" value="" placeholder="Phone Number (optional)">
<br /><br />            <input type="text" class="text-input" name="data[Survey][zipcode]" value="" placeholder="Zipcode">
<br /><br />            <input type="text" class="text-input" name="data[Survey][age]" value="" placeholder="Age">

        </div><!-- /question-box -->
      <div class="clear"></div>
      </div> <!-- end question -->
      
    
  
  
      <!-- ************ Question 1 *************-->
      <div class="question">
        <div class="number-box">
          <span class="number">2</span> <!-- end number -->
        </div>
        <div class="question-box">
          <h1><strong>Please complete this sentence and be specific:</strong><br />We will have job growth in Central New York during the next five years, if: </h1>
            
            <input type="text" class="text-input" name="data[Survey][q1]" value="" placeholder="Finish sentence here">
        </div><!-- /question-box -->
      <div class="clear"></div>
      </div> <!-- end question -->

      <!-- ************ Question 2 *************-->
      <div class="question">
        <div class="number-box">
          <span class="number">3</span> <!-- end number -->
        </div>
        <div class="question-box">
          <h1>Using the list of economic goals below, please pick YOUR TOP 3, with #1 being the MOST important goal for our region: </h1>
          
          <input type="text" name="data[Survey][q2_a1]" class="text-input-2" id="question2_1" placeholder="#" maxlength="1" />
          <label for=="question2_1">Better public transportation</label><br />

          <input type="text" name="data[Survey][q2_a2]" class="text-input-2" id="question2_2" placeholder="#" maxlength="1" />
          <label for=="question2_2">Fewer people living in poverty</label><br />

          <input type="text" name="data[Survey][q2_a3]" class="text-input-2" id="question2_3" placeholder="#" maxlength="1" />
          <label for=="question2_3">More businesses</label><br />

          <input type="text" name="data[Survey][q2_a4]" class="text-input-2" id="question2_4" placeholder="#" maxlength="1" />
          <label for=="question2_4">Higher wages</label><br />

          <input type="text" name="data[Survey][q2_a5]" class="text-input-2" id="question2_5" placeholder="#" maxlength="1" />
          <label for=="question2_5">A greener economy</label><br />

          <input type="text" name="data[Survey][q2_a6]" class="text-input-2" id="question2_6" placeholder="#" maxlength="1" />
          <label for=="question2_6">More jobs</label><br />

          <input type="text" name="data[Survey][q2_a7]" class="text-input-2" id="question2_7" placeholder="#" maxlength="1" />
          <label for=="question2_7">More people choosing to live here</label><br />

 
        </div><!-- /question-box -->
      <div class="clear"></div>
      </div> <!-- end question -->

      <!-- ************ Question 3 *************-->
      <div class="question">
        <div class="number-box">
          <span class="number">4</span> <!-- end number -->
        </div>
        <div class="question-box">
          <h1>In your view, which of the following steps is <strong>most likely to transform</strong> the CNY economy? <strong>Choose one or add your own idea in the space provided.</strong></h1>
          <div class="radio" id="question3">
              <input class="button" id="question3_1" name="data[Survey][q3]" type="radio" value="Strengthen communities by investing in neighborhoods, downtown areas and main streets" />
              <label for="question3_1">Strengthen communities by investing in neighborhoods, downtown areas and main streets</label><br />

              <input class="button" id="question3_2" name="data[Survey][q3]" type="radio" value="Support new businesses and unique CNY business strengths, like agriculture, tourism, healthcare, and renewable fuelsod" />
              <label for="">Support new businesses and unique CNY business strengths, like agriculture, tourism, healthcare, and renewable fuels</label><br />

              <input class="button" id="question3_3" name="data[Survey][q3]" type="radio" value="Connect CNY to the global marketplace" />
              <label for="">Connect CNY to the global marketplace</label><br />

              <input class="button custom" id="question3_4" name="data[Survey][q3]" type="radio" value="custom answer" />
              <label for="">Other:</label>
              <input type="text" class="text-input" name="data[Survey][q3_custom]" value="" placeholder="Custom Answer"> 
          </div>
        </div><!-- /question-box -->
      <div class="clear"></div>
      </div> <!-- end question -->

      <!-- ************ Question 4 *************-->
      <div class="question" >
        <div class="number-box" id="number4">
          <span class="number">5</span> <!-- end number -->
        </div>
        <div class="question-box" style="height:252px">
          
          <div class="hide-question">  
                Answer question 3 to continue
          </div>
          <h1>Thinking about your top choice in Question 3, which of the following is <strong>most likely to achieve your top goal?</strong></h1>
          <div class="radio">
              
              <div id="question4-1" style="display:none">  
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Construct green buildings to make cities and towns more attractive" />
                <label for="">Construct green buildings to make cities and towns more attractive</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Encourage partnerships between business, cultural organizations, and higher education" />
                <label for="">Encourage partnerships between business, cultural organizations, and higher education</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Close the education and opportunity gap through retraining and youth programs" />
                <label for="">Close the education and opportunity gap through retraining and youth programs</label><br />
              </div>
              <div id="question4-2" style="display:none;">
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Improve the region’s health care system" />
                <label for="">Improve the region’s health care system</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Invest in better marketing of tourism" />
                <label for="">Invest in better marketing of tourism</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Expand businesses that offer energy efficiency" />
                <label for="">Expand businesses that offer energy efficiency</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Improve the agriculture and food delivery system" />
                <label for="">Improve the agriculture and food delivery system</label><br />
              </div>
              <div id="question4-3" style="display:none;">
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Increase the marketing of our region to global investors" />
                <label for="">Increase the marketing of our region to global investors</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Offer grants to new businesses" />
                <label for="">Offer grants to new businesses</label><br />
                <input class="button" id="" name="data[Survey][q4]" type="radio" value="Support business efforts to export more goods and services" />
                <label for="">Support business efforts to export more goods and services</label><br />
              </div>

              <div id="question4-4" style="display:none;">
              
              </div>
              
              <input class="button custom" id="" name="" type="radio" value="custom answer" />
              <label for="">Custom Answer:</label>
              <input type="text" class="text-input" name="data[Survey][q4_custom]" value="" placeholder="Custom Answer"> 
            </div>
        </div><!-- /question-box -->
      <div class="clear"></div>
      </div> <!-- end question -->

      <!-- ************ Question 5 *************-->
      <div class="question">
        <div class="number-box">
          <span class="number">6</span> <!-- end number -->
        </div>
        <div class="question-box">
          <h1><strong>Please complete this sentence and be specific: </strong><br /> The government can help businesses succeed in Central New York by:</h1>
          <input type="text" class="text-input" name="data[Survey][q5]" value="" placeholder="Finish sentence here">
        </div><!-- /question-box -->
        <div class="clear"></div>
      </div> <!-- end question -->
      
      <!-- ************ Submit *************-->
      <input id="submit-survey" name="commit" type="submit" value="Submit" /><br />

     </form>
  </div> <!-- end form -->  
  
  <div style="float: left;
width: 142px;
background-color: white;
margin-top: -3px;
height: 1225px;">
<a href="http://nyworks.ny.gov/content/central-new-york"><?=$html->image('sidebar.gif', array("alt"=>"Open For Business","width"=>"135","height"=>"217"));?></a>
<a href="http://www.facebook.com/pages/Be-Heard-CNY/154949061261586"><?=$html->image('facebooklogo.jpg', array("alt"=>"Open For Business","style"=>"margin:15px 0px 0px 40px"));?></a>
</div>
  
</div><!-- end form-section -->

</div>