<?php

class FaseOperator {

  public function send($terms) {

    //http://stackoverflow.com/questions/627965/serial-comm-with-php-on-windows

    /*
    $terms = [
      'firstTerm'   => 'Kunstschilder',
      'secondTerm'  => 'Schilderen'
    ];
    echo json_encode($terms, true).PHP_EOL;
    */

    exec("mode COM5 BAUD=9600 PARITY=N data=8 stop=1 xon=off");
    $fp = fopen ("COM5", "w");
    if (!$fp) {
      echo "Not open";
    } else {
      echo "Open";
    }
    //Write to port
    $writtenBytes = fputs($fp, "Hello");

    echo "Bytes written to port: $writtenBytes".PHP_EOL;

    fclose();

    //Interrupts Arduino
    }

}

