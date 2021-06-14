<?php
$post_data = json_decode(file_get_contents('php://input'), true); 
// the directory "data" must be writable by the server
$name = "data/".$post_data['filename'].".csv"; 
$data = $post_data['filedata'];
// write the file to disk
file_put_contents($name, $data);
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Start Page</title>
    <script src="jsPsych/jspsych.js"></script>
    <script src="jsPsych/plugins/jspsych-html-keyboard-response.js"></script>
    <script src="jsPsych/plugins/jspsych-image-keyboard-response.js"></script>
    <script src="jsPsych/plugins/jspsych-survey-likert.js"></script>
    <link href="jsPsych/css/jspsych.css" rel="stylesheet" type="text/css"></link>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">"
  </head>
  <body  style="background-color:black;">  
  
  <div class="loading centeredDiv">
    <h1 class="loading">Loading...</h1>
  </div>
  <div id="consentHolder" class="consent centeredDiv">
  <h3 id="consentPreamble" class="consent" style="color:white;">In order for us to conduct this test online, we need to include the standard consent form below. <br /> <br /> </h3>
  <div id="consentForm" class="consent consent-box"> 
    <h2 id="consentHeading" class="consent">
      CONSENT FOR PARTICIPATION IN A RESERCH PROJECT 200 FR. 1 (2016-2)
      <br>
      YALE UNIVERSITY SCHOOL OF MEDICINE CONNECTICUT MENTAL HEALTH CENTER
    </h2> 

    <h2>
      
    </h2>
    <p id="consentInstructions" class="consent">
      <b>Study Title:</b> Perception and Decisions
      <br><br>
      <b>Principal Investigator:</b> Philip R. Corlett, PhD
      <br><br>
      <b>Funding Source:</b> department funds
      <br><br>
      <u><b>Invitation to Participate and Description of Project</b></u>
      <br>
      You are invited to participate in a research study that concerns psychological processes related to beliefs, perceptions, decisions, and personality traits. Due to the nature of psychology experiments, we cannot explain the precise purpose of the experiment until after the session is over. Afterwards, the experimenter will be happy to answer any questions you might have about the purpose of the study.
      <br><br>
      <u><b>Description of Procedures</b></u>
      <br>
      If you agree to participate in this study, this Human Intelligence Task (HIT) will require you to (1) play a computer game using the computer mouse or keys on your keyboard and (2) answer simple questions about your demographics, health (including mental health), beliefs, and personality through an interactive web survey. You will never be asked for personally identifiable information such as your name, address, or date of birth. 
      <br>
      The experiment is designed to take approximately 1 hour. You will have up to six hours to complete the experiment and submit codes for credit. 
      <br><br>
      <u><b>Risks and Inconveniences</b></u>
      <br>
      There are little to no risks associated with this study. Some individuals may experience mild boredom. 
      <br><br>
      <u><b>Economic Considerations</b></u>
      <br>
      You will receive the reward specified on the Mechanical-Turk HIT for completing both the game and the questionnaire. Payment for completion of the HIT is up to $10.40 based on task performance. Upon finishing the game and submitting the questionnaire, you will receive code numbers. Please record these two code numbers and submit them for payment. 
      <br><br>
      <u><b>Confidentiality</b></u>
      <br>
      We will never ask for your name, birth date, email or any other identifying piece of information. Your data will be pooled with those of others, and your responses will be completely anonymous. We will keep this data indefinitely for possible use in scientific publications and presentations. 
      <br>
      The researcher will not know your name, and no identifying information will be connected to your survey answers in any way. The survey is therefore anonymous. However, your account is associated with an mTurk number that the researcher has to be able to see in order to pay you, and in some cases these numbers are associated with public profiles which could, in theory, be searched. For this reason, though the researcher will not be looking at anyone’s public profiles, the fact of your participation in the research (as opposed to your actual survey responses) is technically considered “confidential” rather than truly anonymous.
      <br><br>
      <u><b>Voluntary Participation</b></u>
      <br>
      Your participation in this study is completely voluntary. You are free to decline to participate or to end participation at any time by simply closing your browser window. However, please note that you must submit both the computer game and questionnaire in order to receive payment. You may decline answering any question by selecting the designated alternative response (e.g., “I do not wish to answer”). Declining questions will not affect payment.
      <br><br>
      <u><b>Questions or Concerns</b></u>
      <br>
      If you have any questions or concerns regarding the experiment, you may contact us here at the lab by emailing BLAMLabRequester@gmail.com If you have general questions about your rights as a research participant, you may contact the Yale University Human Investigation Committee at 203-785-4688 or human.subjects@yale.edu (HSC# 2000026290).

    </p>
  </div>


</div>
<div id="attritionHolder" class="attrition centeredDiv"> 
  <p id="attritionInstructions" class="attrition"></p>
  <input required type="text" id="attritionAns" class="attrition" size="60" style="width:inherit; height:17px; font-size:15px; margin: 0 auto;" />
</div>
<div id="errorMessageHolder" class="error centeredDiv">
  <p id="mobileBrowserErrorMessage">You cannot access this test from a mobile browser. Please use a desktop computer to complete the task.</p>
  <p id="workerIDErrorMessage">You are ineligible for this task, since your worker ID has been recorded as participating in this task already. 
    Please return the HIT.</p>
</div>



  <div id="nextButtonHolder" class="buttonHolder">
  <button id="nextButton" onclick="startExperiment()">CONSENT/NEXT</button>
</div>
</body>
  
  <script>
    /* create timeline */
    var timeline = [];


    /* define welcome message trial */
    var welcome = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;">Welcome to the experiment! Press any key to begin.</p>'
    };
    timeline.push(welcome);

    var ex_stimuli_array = [];
    ex_stimuli_array.push("images/1/2_X.jpg")
    ex_stimuli_array.push("images/1/10_X.jpg")

    var ex_stimuli= [
    {stimulus: ex_stimuli_array[0]},
    {stimulus: ex_stimuli_array[1]}, 
    ]

   

    /* define instructions trial */
    var instructions_1 = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;">In this task, you will see blended images of scenes and faces. Some images will have more "face" while other images will have more "scene". <br br> For example, the left image has more "scene", and the right image has more "face".'+
      "<p class='imgContainer'><img src='images/10_X.jpg' ></img> </p>"+
      "<p class='imgContainer'><img src='images/2_X.jpg' ></img> </p>"+
        "<p style='color:white;'>Press the space bar to continue.</p>",
      choices: [32],
    };
    timeline.push(instructions_1);
    //timeline.push(ex_stimuli);

    var instructions_2 = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;"> You must decide whether each image has more "scene" or more "face", and press the response key for either "scene" or "face".</p> ' +
      '<p style="color:white;"> You will be asked to rate your confidence of your classification after choosing. </p>'+    
      '<p style="color:white;"> Here are the response keys: </p>'+
      '<p style="color:white;"> Scene &#8594 <q>,</q> (comma)</p>'+
        '<p style="color:white;"> Face &#8594 <q>.</q> (period)</p>'+
        '<p style="color:white;">Here are some practice trials.</p> ' +
        '<p style="color:white;">Press either response key to continue.</p>',
      choices: [',', '.'],
    };
    timeline.push(instructions_2);



    /* START TRAINING TRIAL FOR PARTICIPANTS */
// set the stimulus folder (can change this to random assignment later)


    var stim_set = Math.floor(Math.random() * 10) + 1;
    var cat_vec = [1,3,4,5,6,7,8,9,11];

    var train_stimuli_array = [];
  
    for (var i = 0; i < 10; i++){
      if ((cat_vec[i] == 1)|(cat_vec[i] == 11)){
        j_len = 4
      }else if ((cat_vec[i] == 3)|(cat_vec[i] == 9)){
        j_len = 6
      }else if ((cat_vec[i] == 4)|(cat_vec[i] == 8)){
        j_len = 8
      }else if ((cat_vec[i] == 5)|(cat_vec[i] == 7)){
        j_len = 14
      }else {
        j_len = 16
      }
      for (var j = 1; j < j_len+1; j++){
        train_stimuli_array.push("images/"+ stim_set + "/" + cat_vec[i] + "_"+ j + ".jpg")
        
      } 
    }


    var c1_train_stimuli = [
    {stimulus: train_stimuli_array[0], data: {test_part: 'c1_train', correct_response: ','}},//{stimulus: train_stimuli_array[0]}, //{stimulus: train_stimuli_array[0], data: {test_part: 'test', correct_response: ','}},
    {stimulus: train_stimuli_array[30], data: {test_part: 'c1_train', correct_response: ','}},  //{stimulus: train_stimuli_array[1]}, //{stimulus: train_stimuli_array[1], data: {test_part: 'test', correct_response: ','}},
    {stimulus: train_stimuli_array[65], data: {test_part: 'c1_train', correct_response: '.'}},  //{stimulus: train_stimuli_array[2]},  //{stimulus: train_stimuli_array[2], data: {test_part: 'test', correct_response: '.'}},
    ]

    var fixation = {
      type: 'html-keyboard-response',
      stimulus: '<div style="color:white; font-size:60px;">+</div>',
      choices: jsPsych.NO_KEYS,
      trial_duration: 1000,
      data: {test_part: 'fixation'}
    }

    var scale_1 = [
      "<div style='color:white;'>1 <br />(Not confident)</div>", 
      "<div style='color:white;'>2</div>", 
      "<div style='color:white;'>3</div>", 
      "<div style='color:white;'>4</div>", 
      "<div style='color:white;'>5</div>", 
      "<div style='color:white;'>6</div>", 
      "<div style='color:white;'>7 <br />(Very confident)</div>", 
  
];

var likert_train_page = {
  type: 'survey-likert',
  questions: [
    {prompt: "<div style='color:white;'>How confident were you?</div>", labels: scale_1, required: true}
  ],
  scale_width: 750,
  data: jsPsych.data.get().select('responses')
}

    var c1_train = {
      type: "image-keyboard-response",
      stimulus: jsPsych.timelineVariable('stimulus'), //train_stimuli_array, //jsPsych.timelineVariable('stimulus'),
      choices: [',', '.'],
      prompt: 
      "<p style='color:white; text-align: center; position: absolute; bottom: 20%; left: 36%;'> <strong>Scene</strong> &#8594  <strong>,</strong> (comma)&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<strong> Face </strong> &#8594 <strong>.</strong> (period)</p>",
      data: jsPsych.timelineVariable('data'),
      on_finish: function(data){
        data.C1_train = jsPsych.pluginAPI.convertKeyCodeToKeyCharacter(data.key_press);
        jsPsych.setProgressBar(0.1)
        //data.c1 = data.key_press == jsPsych.pluginAPI.convertKeyCharacterToKeyCode(data.correct_response);
        
      }
    }

    var c1_train_procedure = {
      timeline: [fixation, c1_train, likert_train_page],
      timeline_variables: c1_train_stimuli,
      randomize_order: true
    }

    timeline.push(c1_train_procedure);

    /* END TRAINING TRIAL FOR PARTICIPANTS */

    var instructions_4 = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;">There will be 80 images shown in Phase I, followed by new instructions for Phase II. </p> '+
      '<p style="color:white;"> In Phase I, you will recieve <strong>3 cents</strong> for every correct classification. </p>'+
      '<p style="color:white;"> Remember the response keys are <q>,</q>  (Scene) and <q>.</q> (Face).</p>'+
      '<p style="color:white;">Let us begin! Press the space bar when you are ready to start the first section.</p> ',
      choices: [32],
      post_trial_gap: 2000
    };
    timeline.push(instructions_4);

    // Import all stimuli for the task
    // Rosa: change the stimuli to the new stimuli set
    var stim_set =  Math.floor(Math.random() * 10) + 1;
    var cat_vec = [1,3,4,5,6,7,8,9,11];

    var test_stimuli_array = [];

    for (var i = 0; i < 10; i++){

      if ((cat_vec[i] == 1)|(cat_vec[i] == 11)){
        j_len = 4
      }else if ((cat_vec[i] == 3)|(cat_vec[i] == 9)){
        j_len = 6
      }else if ((cat_vec[i] == 4)|(cat_vec[i] == 8)){
        j_len = 8
      }else if ((cat_vec[i] == 5)|(cat_vec[i] == 7)){
        j_len = 14
      }else {
        j_len = 16
      }
      for (var j = 1; j < j_len+1; j++){
        test_stimuli_array.push("./images/"+ stim_set + "/" + cat_vec[i] + "_"+ j + ".jpg")
      } 
    }
    

    /* START OF PHASE I - BLOCK 1 */
    var stimuli_block1_test =[
      {stimulus: test_stimuli_array[0], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[1], data: {test_part: 'test', correct_response: '.'}},
    ]
    // Import stimuli for phase I - block 1     
    var stimuli_block1 = [
      {stimulus: test_stimuli_array[0], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[1], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[2], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[3], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[4], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[5], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[6], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[7], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[8], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[9], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[10], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[11], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[12], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[13], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[14], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[15], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[16], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[17], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[18], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[19], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[20], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[21], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[22], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[23], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[24], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[25], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[26], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[27], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[28], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[29], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[30], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[31], data: {test_part: 'test', correct_response: '.'}},

      {stimulus: test_stimuli_array[32], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[33], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[34], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[35], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[36], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[37], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[38], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[39], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[40], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[41], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[42], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[43], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[44], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[45], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[46], data: {test_part: 'test', correct_response: ';'}},
      {stimulus: test_stimuli_array[47], data: {test_part: 'test', correct_response: ';'}},

      {stimulus: test_stimuli_array[48], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[49], data: {test_part: 'test', correct_response: ','}}, 
      {stimulus: test_stimuli_array[50], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[51], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[52], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[53], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[54], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[55], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[56], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[57], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[58], data: {test_part: 'test', correct_response: '.'}},
      {stimulus: test_stimuli_array[59], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[60], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[61], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[62], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[63], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[64], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[65], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[66], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[67], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[68], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[69], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[70], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[71], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[72], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[73], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[74], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[75], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[76], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[77], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[78], data: {test_part: 'test', correct_response: ','}},
      {stimulus: test_stimuli_array[79], data: {test_part: 'test', correct_response: ','}},
    ]

    //var shuffled_stimuli = jsPsych.randomization.shuffle(all_test_stimuli);
    var progress_bar1 = .1;
    var tick_amount1 = 0.005;

    var test = {
      type: "image-keyboard-response",
      stimulus: jsPsych.timelineVariable('stimulus'),
      choices: [',', '.'],
      data: jsPsych.timelineVariable('data'),
      prompt: 
      "<p style='color:white; text-align: center; position: absolute; bottom: 20%; left: 36%;'> <strong>Scene</strong> &#8594  <strong>,</strong> (comma)&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<strong> Face </strong> &#8594 <strong>.</strong> (period)</p>",
      //prompt: '<p> style="color:white;"> <strong> Scene (Press <q>,</q>) </strong> &nbsp; &nbsp; &nbsp; &nbsp; <strong> Face (Press <q>.</q>) </strong> </p>',
      on_finish: function(data){
        data.C1 = jsPsych.pluginAPI.convertKeyCodeToKeyCharacter(data.key_press);
        progress_bar1 += tick_amount1;
        jsPsych.setProgressBar(progress_bar1);
        //data.correct = data.key_press == jsPsych.pluginAPI.convertKeyCharacterToKeyCode(data.correct_response);
    }
  }

  var likert_page = {
  type: 'survey-likert',
  questions: [
    {prompt: "<div style='color:white;'>How confident were you?</div>", labels: scale_1, required: true}
  ],
  scale_width: 750,
  data: jsPsych.data.get().select('responses')
}

    var test_procedure_block1 = {
      timeline: [fixation, test, likert_page],
      timeline_variables: stimuli_block1_test,
      randomize_order: true
    }

    timeline.push(test_procedure_block1);


    // COMPLETION MESSAGE: Completed Classification Phase
    var instructions_8 = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;">Phase I of the experiment is complete.</p> ' +
          '<p style="color:white;">In the second half, you will be performing the same classification task. However, you will also be <strong> competing against </strong> with another Turker to earn money. </p> ' +
          '<p style="color:white;">Press the space bar to continue.</p> ',
      choices: [32],
      post_trial_gap: 2000
    };
    timeline.push(instructions_8);

    var instructions_9 = {
      type: "html-keyboard-response",
      stimulus: 
          '<p style="color:white;">Before you see each image, your opponent makes a bet on what type of image you will see (more "Face" or more "Scene"). </p>'+
          '<p style="color:white;">Each time, your opponent makes a bet of 7 cents. </p> ' +
			    '<p style="color:white;">If your opponent\'s bet is correct,  you <strong>lose 7 cents</strong> while they <strong>win 7 cents</strong>. </p> ' +
          '<p style="color:white;">If your opponent\'s bet is wrong, you <strong>win 7 cents</strong> while they <strong>lose 7 cents</strong>. </p> ' +
          '<p style="color:white;">After they place their bet, the image will be shown and you will make your classification. As before, you will receive a bonus of <strong> 3 cents </strong> for each correct classification. </p> ' +
			    '<p style="color:white;">In other words, if your opponent loses their bet and you make a correct classification, you will earn 7 + 3 = <strong> 10 cents </strong> for that image.</p> ' +
          '<p style="color:white;">Press the space bar to proceed to Phase II of the experiment.</p> ',
      choices: [32],
      post_trial_gap: 500
    };
    timeline.push(instructions_9);




    /* END PHASE I OF TASK: CLASSIFICATION PHASE */


    /* START PHASE II OF TASK: CLASSIFICATION and BETTING PHASE */

    var instructions_12 = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;"> Finding your opponent for the HIT...let us begin! Press the space bar when you are ready to start the second half of the HIT.</p> ',
      choices: [32],
      post_trial_gap: 2000
    };
    timeline.push(instructions_12);

  
    /* START OF PHASE I - BLOCK 1 */

    // Import stimuli for phase I - block 1  
    
    var stimuli_c2block1_test = [
      {stimulus: test_stimuli_array[0], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.'}},
      {stimulus: test_stimuli_array[1], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.'}},
      {stimulus: test_stimuli_array[2], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.'}}
    ]


    var stimuli_c2block1 = [
      {stimulus: test_stimuli_array[0], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[1], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[2], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[3], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[4], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[5], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[6], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[7], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[8], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[9], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[10], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[11], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[12], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[13], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[14], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[15], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[16], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[17], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[18], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[19], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[20], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[21], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[22], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[23], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[24], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[25], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[26], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[27], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[28], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[29], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},
      {stimulus: test_stimuli_array[30], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: '.', predict_bet: '.'}},
      {stimulus: test_stimuli_array[31], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: '.', predict_bet: ','}},

      {stimulus: test_stimuli_array[32], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[33], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[34], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[35], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[36], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[37], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[38], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[39], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: ','}},
      {stimulus: test_stimuli_array[40], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[41], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[42], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[43], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[44], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[45], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[46], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},
      {stimulus: test_stimuli_array[47], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ';', predict_bet: '.'}},

      {stimulus: test_stimuli_array[48], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[49], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}}, 
      {stimulus: test_stimuli_array[50], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[51], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[52], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[53], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[54], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[55], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[56], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[57], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[58], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[59], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[60], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[61], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[62], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[63], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[64], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[65], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[66], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[67], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[68], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[69], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[70], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[71], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[72], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[73], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[74], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[75], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[76], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[77], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
      {stimulus: test_stimuli_array[78], predict_bet: 'Face', data: {test_part: 'c2_test', correct_response: ',', predict_bet: ','}},
      {stimulus: test_stimuli_array[79], predict_bet: 'Scene', data: {test_part: 'c2_test', correct_response: ',', predict_bet: '.'}},
    ]

    //var shuffled_stimuli = jsPsych.randomization.shuffle(all_test_stimuli);

    var predict_scene = {
        type: "html-keyboard-response",
        stimulus: '<p style="color:white;> Your opponent bet 7 cents that the next image has more'+
                  '<p style="color:white;> <strong> Scene </strong> </p>',
        choices: jsPsych.NO_KEYS,
        trial_duration: 5000,
        data: {
          test_part:'predict_bet', 
        },
        on_finish: function(data){
          data.A = jsPsych.pluginAPI.convertKeyCodeToKeyCharacter(data.key_press)
        //data.correct = data.key_press == jsPsych.pluginAPI.convertKeyCharacterToKeyCode(data.pred_response);
      }
    }

   

    var predict_face = {
        type: "html-keyboard-response",
        stimulus: '<p style="color:white;> Your opponent bet 7 cents that the next image has more'+
                  '<p style="color:white;> <strong> Face </strong> </p>',
        choices: jsPsych.NO_KEYS,
        trial_duration: 5000,
        data: {
          test_part:'predict_bet', 
        },
        on_finish: function(data){
          data.A = jsPsych.pluginAPI.convertKeyCodeToKeyCharacter(data.key_press)
        //data.correct = data.key_press == jsPsych.pluginAPI.convertKeyCharacterToKeyCode(data.pred_response);
      }
    }

    var progress_bar2 = .55;
    var tick_amount2 = 0.005;
  
    var c2test = {
      type: "image-keyboard-response",
      stimulus: jsPsych.timelineVariable('stimulus'),
      choices: [',', '.'],
      data: jsPsych.timelineVariable('data'),
      prompt: 
      "<p style='color:white;position: absolute; bottom: 20%; left: 36%;'> <strong>Scene</strong> &#8594  <strong>,</strong> (comma)&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<strong> Face </strong> &#8594 <strong>.</strong> (period)</p>",
      on_finish: function(data){
        data.C2 = jsPsych.pluginAPI.convertKeyCodeToKeyCharacter(data.key_press);
        progress_bar2 += tick_amount2;
        jsPsych.setProgressBar(progress_bar2);
        //data.correct = data.key_press == jsPsych.pluginAPI.convertKeyCharacterToKeyCode(data.correct_response);
    }
  }

var test1 = 1;

var predict_varz = (jsPsych.timelineVariable('predict_bet')==',')? 'Scene': 'Nope';
var predict_varz2 = (jsPsych.timelineVariable('predict_bet')==',')? 'Scene': 'Nope';
var predict_varz3 = (jsPsych.timelineVariable('predict_bet')==',')? 'Scene': 'Nope';




  var test_procedure_c2block1 = {
        timeline: [
          {
            type: "html-keyboard-response",
            //stimulus: //'
            stimulus: 
                   
                    function(){
                     return '<p style="color:white;"> Your opponent bet 7 cents that the next image has more <br> <strong>'+jsPsych.timelineVariable('predict_bet', true)+'</strong> </p>';
                     },
                    
        choices: jsPsych.NO_KEYS,
        trial_duration: 5000,

        },fixation, c2test, likert_page],
        timeline_variables: stimuli_c2block1_test,
        randomize_order: true
   
  }
   timeline.push(test_procedure_c2block1);
  

  
    



    // COMPLETION MESSAGE: Completed Classification Phase
    var link = "https://yalesurvey.ca1.qualtrics.com/jfe/form/SV_9R1qVlrGBboxhdz"
    var instructions_16 = {
      type: "html-keyboard-response",
      stimulus: '<p style="color:white;">You have now completed the task! Saving data...PLEASE DO NOT CLOSE THIS BROWSER until you complete the second part.</p> ' +
          '<p style="color:white;">BEFORE THE LINK DISAPPEARS please move on to the second part of the task at this link to obtain your completion code:</p> ' +
          "<a href=" + link + ' target="_blank">' + link + "</a>",
      choices: jsPsych.NO_KEYS,
      trial_duration: 40000,
      on_start: function(trial) {
        jsPsych.setProgressBar(1);
      }
    };
    timeline.push(instructions_16);



    /* END PHASE II OF TASK: CLASSIFICATION and ANTICIPATION PHASE */

function saveData(name, data){
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'full-mot-perception-comp.php'); // 'write_data.php' is the path to the php file described above.
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.send(JSON.stringify({filename: name, filedata: data}));
}

//var this_seed = new Date().getTime();
    //Math.seedrandom(this_seed);

    //var randNum = Math.random() * 1000
    //var randNumRounded = Math.floor(randNum+1)
    function getParamFromURL(name)
    {
      name = name.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");
      var regexS = "[\?&]"+name+"=([^&#]*)";
      var regex = new RegExp( regexS );
      var results = regex.exec( window.location.href );
      if( results == null )
        return "";
      else
        return results[1];
    }
    var workerID = getParamFromURL( 'workerId' );

    /* start the experiment */
    function startExperiment(){
      jsPsych.init({
        timeline: timeline,
        show_progress_bar: true,
        auto_update_progress_bar: false,
        on_finish: function(){ saveData("full-mot-perception-comp_" + workerID, jsPsych.data.get().csv()); }
        //on_finish: function(){
          //jsPsych.data.get().filter([{test_part: 'test'},{test_part: 'prediction'},{test_part: 'c2_test'}]).localSave("csv", `test-self-deception-data.csv`);
            //jsPsych.data.displayData(); 
        //}
      });
    }
  </script>

<footer>

<!-- <script type="text/javascript" src="https://perceptionexperiments.net/SDU/Libraries/Timeout.js"></script> -->
<!-- <script type="text/javascript" src="https://perceptionexperiments.net/SDU/Libraries/lodash.js"></script> -->
<!-- <script type="text/javascript" src="https://perceptionexperiments.net/SDU/Libraries/seedrandom.js"></script> -->
<script type="text/javascript" src="//code.jquery.com/jquery-git.js"></script>
<!-- <script type="text/javascript" src="https://perceptionexperiments.net/SDU/Libraries/jquery.csv.js"></script> -->

<script>
// show page when loaded 
window.onload = function() {
  $(".loading").css({display: "none"});
  $(".consent").css({display: "block"});
  $(".buttonHolder").css({display: "block"});
};
</script>
</footer>
  </html>