<?php

if(!is_state("start")) {

  echo '
  <a class="waves-effect waves-light btn" href="?state=start&fase=1">
    START TEST
  </a>';

 } else {

  foreach($fases as $fase_key => $fase) {
    echo '
    <a class="waves-effect waves-light btn">
      '.$fase["profession"].'<br> '.$fase["expression"].'
    </a>';
  }

}