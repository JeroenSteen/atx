<?php
set_time_limit(0);

exec("mode COM5 BAUD=115200 PARITY=N data=8 stop=1 XON=off TO=on");
$fp = fopen("COM5", "w"); //r+

$counter = 0;
$forward = true;

while(true) {
  $padding = str_repeat(" ", $counter);

  $terms = [
    "firstTerm" => $padding."schilderen",
    "secondTerm" => $padding."kunstschilderes."
  ];

  //$open_state = (!$fp) ? "Not open: " : "Open: ";
  //Write to port
  $writtenBytes = fputs($fp, $terms["firstTerm"].",".$terms["secondTerm"]);
  //$terms["log"] = $open_state."Bytes written to port: $writtenBytes";

  if($counter > 10) {
    $forward = false;
  } /*else if ($counter == 0) {
    $forward = true;
  } */else {
    $forward = true;
  }

  if($forward) {
    $counter++;
  } else {
    $counter--;
  }
  sleep(1);
}

fclose($fp);