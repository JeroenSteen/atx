<?php

if(!StateOperator::is_state("start")) {

  $latest_tester_id = TestFase::latest_tester_id();
  $tester_id        = $latest_tester_id+1;

  echo '
  <a class="waves-effect waves-light btn" id="startButton" href="?state=start&fase=1&tester='.$tester_id.'">
    START TEST
  </a>
  <a class="waves-effect waves-light btn" href="'.get_home().'">
    UITLEG
  </a>';

 } else {

  if(isset($_GET["fase"])) {

    $fase_iterator = $_GET["fase"];
    //First started the test
    if($fase_iterator == 1) {
      $test_op  = new TestOperator();
      $fases    = $test_op->make();
    }

    $fase = FaseOperator::send($fase_iterator);

    echo '
    <p style="margin: 0 !important;">'.$fase["log"].'</p>
    <a class="waves-effect waves-light btn" id="testButton" style="height: 72px;">
      <span id="beginTerm">'.$fase["firstTerm"].'</span><br>
      <span id="endTerm">'.$fase["secondTerm"].'</span>
    </a>
    <div style="display: none;">
      <span id="branchID">'.$fase["branchID"].'</span>
      <span id="professionID">'.$fase["professionID"].'</span>
      <span id="expressionID">'.$fase["expressionID"].'</span>
      <span id="gender">'.$fase["gender"].'</span>
      <span id="rightTerm">'.$fase["rightTerm"].'</span>
    </div>';

  }

}