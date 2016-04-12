<?php

class FaseOperator {

  public function send($fase_id) {

    //Find test file
    $fases  = file_get_contents("tmp/test.json");
    $fases  = json_decode($fases, true);
    $fase   = $fases[$fase_id];

    //Find attributes
    $profession  = $fase["profession"];
    $expression  = $fase["expression"];

    //Profession up (0) or down (1)
    $pos = rand(0,1);
    //Profession needs to be up
    if($pos == 0) {
      $terms = [
        'firstTerm'   => $profession,
        'secondTerm'  => $expression,
        'rightTerm'   => $profession
      ];
    } else {
      $terms = [
        'firstTerm'   => $expression,
        'secondTerm'  => $profession,
        'rightTerm'   => $profession
      ];
    }

    //http://stackoverflow.com/questions/627965/serial-comm-with-php-on-windows

    exec("mode COM5 BAUD=9600 PARITY=N data=8 stop=1 xon=off");
    $fp = fopen("COM5", "w");
    $open_state = (!$fp) ? "Not open: " : "Open: ";

    //Write to port
    $writtenBytes = fputs($fp, $terms["firstTerm"].",".$terms["secondTerm"]);

    $terms["log"] = $open_state."Bytes written to port: $writtenBytes";

    fclose($fp);

    //Interrupts Arduino
    return $terms;

  }

}

