from machine import UART
import time
uart = UART(2, baudrate=9600, bits=8,tx=17,rx=16,parity=None, stop=1)
line = uart.readline()

for x in range(10):
    line = uart.readline()
    time.sleep(1)
    if("GPRMC" in str(line)):
        print("FOUND GPRMC")
        break

splitted = []
x = str(line).split("\r\n")
for i in range(len(x)):
    if("$GPRMC" in x[i]):
        counter = i
        splitted = x[counter].split(",")

#lattitude
if(int(splitted[3][0:2])<10):
    latfinal = float(splitted[3][0:3]) + float(splitted[3][3:])/60
else:
    latfinal = float(splitted[3][0:2]) + float(splitted[3][2:])/60
print("Latitude is: " + str(latfinal))
#longitude
if(int(splitted[5][0:2])<10):
    longfinal = float(splitted[5][0:3]) + float(splitted[5][3:])/60
else:
    longfinal = float(splitted[5][0:2]) + float(splitted[5][2:])/60
print("Longtitude is: " + str(longfinal))
