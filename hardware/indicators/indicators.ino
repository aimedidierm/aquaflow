const int redLedPin = D3;
const int greenLedPin = D4;
const int buzzerPin = D5;

void setup() {
  pinMode(redLedPin, OUTPUT);
  pinMode(greenLedPin, OUTPUT);
  pinMode(buzzerPin, OUTPUT);
  
  digitalWrite(redLedPin, LOW);
  digitalWrite(greenLedPin, LOW);
  digitalWrite(buzzerPin, LOW);
}

void loop() {
  digitalWrite(redLedPin, HIGH);
  delay(500);
  digitalWrite(greenLedPin, HIGH);
  delay(500);
  digitalWrite(buzzerPin, HIGH);
  delay(500);
  digitalWrite(redLedPin, LOW);
  digitalWrite(greenLedPin, LOW);
  digitalWrite(buzzerPin, LOW);
  delay(1000);
}