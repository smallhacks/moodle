#!/usr/bin/python3
from pijuice import PiJuice # Import pijuice module
pijuice = PiJuice(1, 0x14) # Instantiate PiJuice interface object

# PiJuice GetStatus
status_error = pijuice.status.GetStatus()['error']
is_fault = str(pijuice.status.GetStatus()['data']['isFault'])
battery_status = pijuice.status.GetStatus()['data']['battery']
battery_temp = str(pijuice.status.GetBatteryTemperature()['data'])

# PiJuice GetChargeLevel
charge_level_error = pijuice.status.GetChargeLevel()['error']
charge_level = str(pijuice.status.GetChargeLevel()['data'])

#status_error = "NO_ERROR"
#is_fault = "False"
#battery_status = "Pas mal"
#charge_level_error = "NO_ERROR"
#charge_level = "48"

# Print the result as JSON format
print (pijuice.status.GetStatus()['data']['isFault'])
print ('{"status_error": "'+status_error+'", "is_fault": "'+is_fault+'", "battery_status": "'+battery_status+'", "battery_temp": "'+battery_temp+'", "charge_level_error": "'+charge_level_error+'", "charge_level": "'+charge_level+'"}')
