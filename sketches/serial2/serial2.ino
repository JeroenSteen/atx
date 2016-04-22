/*
  Serial Event example

 When new serial data arrives, this sketch adds it to a String.
 When a newline is received, the loop prints the string and
 clears it.

 A good test for this is to try it with a GPS receiver
 that sends out NMEA 0183 sentences.

 Created 9 May 2011
 by Tom Igoe

 This example code is in the public domain.

 http://www.arduino.cc/en/Tutorial/SerialEvent

 */

//Include the library code:
#include <LiquidCrystal.h>

//Initialize the library with the numbers of the interface pins
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

String msg = "";         // a string to hold incoming data
boolean complete = false;  // whether the string is complete

void setup() {
  // initialize serial:
  Serial.begin(115200);
  //Set up the LCD's number of columns and rows:
  lcd.begin(16, 2);
  // reserve 200 bytes for the inputString:
  msg.reserve(200);
}

void loop() {
 while (Serial.available()) {
    // get the new byte:
    char inChar = (char)Serial.read();
    // add it to the inputString:
    msg += inChar;
    // if the incoming character is a newline, set a flag
    // so the main loop can do something about it:
    if (inChar == '.') {
      complete = true;
    }
  }
  
  // print the string when a newline arrives:
  if (complete) {
    lcd.clear();
    
    int commaIndex = msg.indexOf(',');
    int msgLength = msg.length();       
    String beginTerm = msg.substring(0, commaIndex);
    String endTerm = msg.substring(commaIndex+1, msgLength);
    setTerms(beginTerm, endTerm);
    
    // clear the string:
    msg = "";
    complete = false;
  }
}

/*
  SerialEvent occurs whenever a new data comes in the
 hardware serial RX.  This routine is run between each
 time loop() runs, so using delay inside loop can delay
 response.  Multiple bytes of data may be available.
 */


void setTerms(String firstTerm, String secondTerm) {
  //First row
  lcd.setCursor(1,0);
  //Print a message to the LCD.
  lcd.print(firstTerm);
  
  //Second row
  lcd.setCursor(1,1);
  //Print a message to the LCD.
  lcd.print(secondTerm);
  
  //Reset cursor
  lcd.setCursor(0,0);
}
