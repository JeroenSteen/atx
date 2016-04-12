//Include the library code:
#include <LiquidCrystal.h>

//Initialize the library with the numbers of the interface pins
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

void setup() {
  //Set up Serial library at 9600 bps
  Serial.begin(9600);
  
  //Set up the LCD's number of columns and rows:
  lcd.begin(16, 2);

  //Set terms with function
  setTerms("Kunstschilder", "Schilderen");
}

void loop() {
  moveTerms();
  
   if (Serial.available() > 0) { //if there is anything on the serial port, read it
        String msg = Serial.readString();
        int commaIndex = msg.indexOf(',');
        int msgLength = msg.length();
                
        String beginTerm = msg.substring(0, commaIndex);
        String endTerm = msg.substring(commaIndex+1, msgLength);
        
        setTerms(beginTerm, endTerm);
   } else {
     setTerms("Paverpoller", "Paverpollen");
   }
}

void setTerms(String firstTerm, String secondTerm) {
  lcd.clear();
  
  //First row
  lcd.setCursor(1,0);
  //Print a message to the LCD.
  lcd.print(firstTerm);
  
  //Second row
  lcd.setCursor(1,1);
  //Print a message to the LCD.
  lcd.print(secondTerm);
  
  lcd.scrollDisplayLeft();
}

void moveTerms(){
  // scroll 13 positions (string length) to the left
  // to move it offscreen left:
  for (int positionCounter = 0; positionCounter < 13; positionCounter++) {
    // scroll one position left:
    lcd.scrollDisplayLeft();
    // wait a bit:
    delay(150);
  }

  // scroll 29 positions (string length + display length) to the right
  // to move it offscreen right:
  for (int positionCounter = 0; positionCounter < 29; positionCounter++) {
    // scroll one position right:
    lcd.scrollDisplayRight();
    // wait a bit:
    delay(150);
  }

  // scroll 16 positions (display length + string length) to the left
  // to move it back to center:
  for (int positionCounter = 0; positionCounter < 16; positionCounter++) {
    // scroll one position left:
    lcd.scrollDisplayLeft();
    // wait a bit:
    delay(150);
  }

  // delay at the end of the full loop:
  delay(1000);
}
