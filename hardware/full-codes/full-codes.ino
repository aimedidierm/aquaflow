#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ESP8266HTTPClient.h>

// WiFi credentials
const char* ssid = "Balance";
const char* password = "balance1234";

// Server endpoint
const char* serverName = "https://didier.requestcatcher.com/";

// TDS sensor pin
const int TDS_PIN = A0;

// Calibration values for the TDS sensor
const float Voltage_Conversion_Factor = 3.3 / 1024.0; // Voltage conversion factor for 3.3V and 10-bit ADC
const float TDS_Factor = 0.5; // Conversion factor from voltage to TDS

WiFiClientSecure wifiClient;

void setup() {
  // Initialize serial communication
  Serial.begin(115200);
  
  // Initialize WiFi
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi...");
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("connected");

  // Disable SSL certificate verification
  wifiClient.setInsecure();
}

void loop() {
  // Read the analog value from the TDS sensor
  int sensorValue = analogRead(TDS_PIN);
  
  // Convert the analog value to voltage
  float voltage = sensorValue * Voltage_Conversion_Factor;
  
  // Calculate TDS (Total Dissolved Solids) value
  float tdsValue = (voltage / TDS_Factor) * 1000;
  
  // Print the TDS value to the serial monitor
  Serial.print("TDS Value: ");
  Serial.print(tdsValue);
  Serial.println(" ppm");

  // Check WiFi connection
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(wifiClient, serverName);

    // Specify content-type header
    http.addHeader("Content-Type", "application/json");

    // Prepare JSON payload
    //{"tds": 1269.73}
    String jsonPayload = "{\"tds\": ";
    jsonPayload += tdsValue;
    jsonPayload += "}";

    // Send HTTP POST request
    int httpResponseCode = http.POST(jsonPayload);
    
    // Print response
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      Serial.println(response);
    } else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  } else {
    Serial.println("WiFi Disconnected");
  }
  
  // Delay before the next reading
  delay(10000); // Send data every 10 seconds
}
