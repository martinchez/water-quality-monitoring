from machine import UART
uart = UART(1, 9600)
uart.init(9600, bits=8,tx=17,rx=16, parity=None, stop=1)

while True:
    if uart.any():
        print(uart.read())
