<?php
//phpinfo();
//http://www.instructables.com/id/Control-an-Arduino-with-PHP/step4/How-it-works-the-Arduino-side/

$terms = [
  'firstTerm'   => 'Kunstschilder',
  'secondTerm'  => 'Schilderen'
];
echo json_encode($terms, true).PHP_EOL;

//http://stackoverflow.com/questions/627965/serial-comm-with-php-on-windows
exec("mode COM5 BAUD=9600 PARITY=N data=8 stop=1 xon=off");
$fp = fopen ("COM5", "w");
if (!$fp) {
  echo "Not open";
} else {
  echo "Open";
}

$writtenBytes = fputs($fp, "Hello");

echo "Bytes written to port: $writtenBytes".PHP_EOL;

fclose();

//Interrupts Arduino