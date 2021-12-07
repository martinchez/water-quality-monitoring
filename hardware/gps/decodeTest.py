from machine import UART
from micropyGPS import MicropyGPS

uart = UART(2, baudrate=9600, bits=8,tx=17,rx=16,parity=None, stop=1)
gps = MicropyGPS()

buf = uart.readline()
print("Nmea data:")
print(buf)
