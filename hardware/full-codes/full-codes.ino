#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ESP8266HTTPClient.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 20, 4);

const char* ssid = "Balance";
const char* password = "balance1234";

// Server endpoint
const char* serverName = "https://your-ngrok-url.ngrok-free.app/api/status";

// TDS sensor pin
const int TDS_PIN = A0;
const int redLedPin = D3;
const int greenLedPin = D4;
const int buzzerPin = D5;

// Calibration values for the TDS sensor
const float Voltage_Conversion_Factor = 3.3 / 1024.0; // Voltage conversion factor for 3.3V and 10-bit ADC
const float TDS_Factor = 0.5; // Conversion factor from voltage to TDS

WiFiClientSecure wifiClient;

void setup() {
  lcd.init();
  lcd.init();
  lcd.clear();
  lcd.backlight();
  lcd.clear();
  Serial.begin(115200);
  pinMode(redLedPin, OUTPUT);
  pinMode(greenLedPin, OUTPUT);
  pinMode(buzzerPin, OUTPUT);
  
  digitalWrite(redLedPin, LOW);
  digitalWrite(greenLedPin, LOW);
  digitalWrite(buzzerPin, LOW);
  lcd.print("Connecting");
  lcd.setCursor(0, 1);
  lcd.print("to WiFi...");
  
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi...");
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("connected");
  lcd.clear();
  lcd.print("connected");
  delay(1000);
  wifiClient.setInsecure();
  lcd.clear();
  lcd.print("System");
  lcd.setCursor(0, 1);
  lcd.print("Ready");
  delay(2000);
}

void loop() {
  int sensorValue = analogRead(TDS_PIN);
  float voltage = sensorValue * Voltage_Conversion_Factor;
  float tdsValue = (voltage / TDS_Factor) * 1000;
  
  Serial.print("TDS Value: ");
  Serial.print(tdsValue);
  Serial.println(" ppm");
  lcd.clear();
  lcd.print("TDS Value: ");
  lcd.print(tdsValue);
  if(tdsValue > 40){
    lcd.setCursor(0, 1);
    lcd.print("Bad quality");
    delay(200);
    badQuality();
  } else {
    lcd.setCursor(0, 1);
    lcd.print("Good quality");
    delay(200);
    goodQuality();
  }
  
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(wifiClient, serverName);
    http.addHeader("Content-Type", "application/json");
    String jsonPayload = "{\"tds\": ";
    jsonPayload += tdsValue;
    jsonPayload += "}";
    int httpResponseCode = http.POST(jsonPayload);
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      Serial.println(response);
    } else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
      Serial.print("Error reason: ");
      Serial.println(http.errorToString(httpResponseCode));
    }
    http.end();
  } else {
    lcd.clear();
    lcd.print("WiFi");
    lcd.setCursor(0, 1);
    lcd.print("Disconnected");
    delay(2000);
  }
}

void badQuality(){
  digitalWrite(redLedPin, HIGH);
  digitalWrite(greenLedPin, LOW);
  digitalWrite(buzzerPin, HIGH);
}

void goodQuality(){
  digitalWrite(redLedPin, LOW);
  digitalWrite(greenLedPin, HIGH);
  digitalWrite(buzzerPin, LOW);
}
