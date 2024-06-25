// TDS sensor pin
const int TDS_PIN = A0;

// Calibration values for the TDS sensor
const float Voltage_Conversion_Factor = 3.3 / 1024.0; // Voltage conversion factor for 3.3V and 10-bit ADC
const float TDS_Factor = 0.5; // Conversion factor from voltage to TDS

void setup() {
  // Initialize serial communication
  Serial.begin(115200);
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
  
  // Delay before the next reading
  delay(1000);
}
