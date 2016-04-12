<?php

if(!StateOperator::is_state("start")) {

  $latest_tester_id = TestFase::latest_tester_id();
  $tester_id        = $latest_tester_id+1;

  echo '
  <a class="waves-effect waves-light btn" href="?state=start&fase=1&tester='.$tester_id.'">
    START TEST
  </a>';

 } else {

  if(isset($_GET["fase"])) {
    $fase = FaseOperator::send($_GET["fase"]);

    echo '
    <p style="margin: 0 !important;">'.$fase["log"].'</p>
    <a class="waves-effect waves-light btn" style="height: 72px;">
      <span id="beginTerm">'.$fase["firstTerm"].'</span><br>
      <span id="endTerm">'.$fase["secondTerm"].'</span>
    </a>
    <span id="rightTerm" style="display: none;">'.$fase["rightTerm"].'</span>';

  }

}