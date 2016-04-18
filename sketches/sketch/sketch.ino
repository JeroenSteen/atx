//Include the library code:
#include <LiquidCrystal.h>

//Initialize the library with the numbers of the interface pins
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

//Message on display; example: "Kunstschilder,schilderen"
String msg = "";
//Old text needs interupt for showing new text on Display
boolean needsInterupt = false;
//Biggest term length
int maxLength = 0;

char receivedMsg[100];
uint16_t bufferIndex;  

void setup() {
  //Set up Serial library at 115200 bps
  Serial.begin(115200);
  
  //Set up the LCD's number of columns and rows:
  lcd.begin(16, 2);

  //Set terms with function
  setTerms("Kunstschilder", "Schilderen");
}

void loop() {
  /*bufferIndex = 0;
  while (Serial.available()) {
    receivedMsg[bufferIndex] = Serial.read();
    bufferIndex++;
  }*/
  //String stringMsg = str(receivedMsg);
  
  //Buffer is filled
  /*if (bufferIndex  != 0 ){
    //setTerms("Ik", "kom");
    String msg = Serial.readString();
    int commaIndex = stringMsg.indexOf(',');
    int msgLength = stringMsg.length();
            
    String beginTerm = stringMsg.substring(0, commaIndex);
    String endTerm = stringMsg.substring(commaIndex+1, msgLength);
        
    setTerms(beginTerm, endTerm);
    moveTerms();
  }*/
  
  //Buffer is filled
  //if (bufferIndex  != 0 ){
  if (Serial.available() > 0) {
      needsInterupt = true;
      
      resetDisplay();
      
      msg = Serial.readString();
      int commaIndex = msg.indexOf(',');
      int msgLength = msg.length();
              
      String beginTerm = msg.substring(0, commaIndex);
      String endTerm = msg.substring(commaIndex+1, msgLength);
      
      int beginLength = beginTerm.length();
      int endLength = endTerm.length();
      if(beginLength > endLength) {
        maxLength = beginLength;
      } else {
        maxLength = endLength;
      }
      
      setTerms(beginTerm, endTerm);
      
      needsInterupt = false;
   }
   
   //Shows current text
   if(!needsInterupt) moveTerms();
}

void resetDisplay() {
  lcd.clear();
  lcd.setCursor(0,0);
  msg = "";
}

void setTerms(String firstTerm, String secondTerm) {
  resetDisplay();
  
  //First row
  lcd.setCursor(1,0);
  //Print a message to the LCD.
  lcd.print(firstTerm);
  
  //Second row
  lcd.setCursor(1,1);
  //Print a message to the LCD.
  lcd.print(secondTerm);
  
  //lcd.scrollDisplayLeft();
}

void moveTerms(){
  
  // scroll 13 positions (string length) to the left
  // to move it offscreen left:
  for (int positionCounter = 0; positionCounter < 13; positionCounter++) {
    if(needsInterupt) break;
    
    // scroll one position left:
    lcd.scrollDisplayLeft();
    // wait a bit:
    delay(150);
  }

  // scroll 29 positions (string length + display length) to the right
  // to move it offscreen right:
  for (int positionCounter = 0; positionCounter < 29; positionCounter++) {
    if(needsInterupt) break;
    
    // scroll one position right:
    lcd.scrollDisplayRight();
    // wait a bit:
    delay(150);
  }

  // scroll 16 positions (display length + string length) to the left
  // to move it back to center:
  for (int positionCounter = 0; positionCounter < 16; positionCounter++) {
    if(needsInterupt) break;
    
    // scroll one position left:
    lcd.scrollDisplayLeft();
    // wait a bit:
    delay(150);
  }

}
