//Ethernet
#include <Ethernet.h>

// the media access control (ethernet hardware) address for the shield:
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };  
//the IP address for the shield:
IPAddress ip{ 192, 168, 137, 2 };    

//byte mac[] = {  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress server(192, 168, 137, 1);
EthernetClient client;

//Servo
#include <Servo.h>
Servo servo;

//LCD
  #include <Wire.h>
  #include <LCD.h>
  #include <LiquidCrystal_I2C.h>
  #include <LiquidCrystal.h>
  LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE);

//Ultrasonic
 const int trigpin=13;
 const int echopin=11;
 float duration;
 int cm;

//Fingerprint Sensor
#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>

int getFingerprintIDez();

// pin #2 is IN from sensor (GREEN wire)
// pin #3 is OUT from arduino  (WHITE wire)
SoftwareSerial mySerial(2, 3);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

// On Leonardo/Micro or others with hardware serial, use those! #0 is green wire, #1 is white
//Adafruit_Fingerprint finger = Adafruit_Fingerprint(&Serial1);

void setup()  
{
  while (!Serial);  // For Yun/Leo/Micro/Zero/...
  
  Serial.begin(57600);
  lcd.begin(16,2);
  lcd.home();
  pinMode(trigpin,OUTPUT);
  pinMode(echopin,INPUT);
  servo.attach(8);
  servo.write(0);

  Ethernet.begin(mac, ip);
  Serial.print("server is at ");
  Serial.println(server);
  // give the Ethernet shield a second to initialize:
  delay(1000);
  Serial.println("connecting...");
 
  // if you get a connection, report back via serial:
  if (client.connect(server, 80)) {
    Serial.println("connected\n");
  } 
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed\n");
  }
  
  Serial.println("Adafruit finger detect test");

  // set the data rate for the sensor serial port
  finger.begin(57600);
  
  if (finger.verifyPassword()) {
    Serial.println("Found fingerprint sensor!");
  } else {
    Serial.println("Did not find fingerprint sensor :(");
    while (1);
  }
  Serial.println("Waiting for valid finger...");
}

void loop()                     // run over and over again
{
  start:
  lcd.setCursor(2,0);
  lcd.print("Please place"); 
  lcd.setCursor(2,1);
  lcd.print("your finger");
  getFingerprintIDez();
  delay(50);            //don't need to run this at full speed.
}



uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }
  
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Did not find a match");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }   
  
  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID); 
  Serial.print(" with confidence of "); Serial.println(finger.confidence);

  /*client.print( "GET /ljc/log.php?");
  client.print("fingerprint_id=");
  client.print( finger.fingerID );
  client.println( "HTTP/1.1");
  client.print( "Host: " );
  client.println(server);
  client.println("Connection: close");
  client.stop();*/
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;
  
  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID); 
  Serial.print(" with confidence of "); Serial.println(finger.confidence);

  client.print( "GET /ljc2/logcheck.php?");
  client.print("fingerprint_id=");
  client.print( finger.fingerID );
  client.println( "HTTP/1.1");
  client.print( "Host: " );
  client.println(server);
  client.println("Connection: close");
  client.stop();
  
  lcd.setCursor(0,0);
  lcd.print(" Access Granted ");
  lcd.setCursor(6,1);
  lcd.print("               "); 
  for(int steps=0; steps<11; steps++)
  {
    servo.write(90);  // Rotate CW 1 turn
    delay(1);
    }
    
    int cm=10;
    while(cm>6)
    {
      pinMode(trigpin, OUTPUT);
      digitalWrite(trigpin, LOW);
      delayMicroseconds(2);
      digitalWrite(trigpin, HIGH);
      delayMicroseconds(10);
      digitalWrite(trigpin, LOW);
      pinMode(echopin, INPUT);
      duration = pulseIn(echopin, HIGH);
      cm = duration/58.2;
      delay(50);
      }
      delay(2000);
      
      for(int steps=0; steps<11; steps++)
      {
        servo.write(0);
        delay(1);
        }
        
  return finger.fingerID;        
}
