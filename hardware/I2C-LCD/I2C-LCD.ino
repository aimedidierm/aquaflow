#include <Wire.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 20, 4);

void setup()
{
  lcd.init();
  lcd.init();
  lcd.clear();
  lcd.backlight();
  lcd.clear(),
  lcd.print("System");
  lcd.setCursor(0, 1);
  lcd.print("Ready");
  delay(3000);
}
void loop()
{
}