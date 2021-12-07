from machine import Pin,I2C,UART
import time
import urandom
import urequests as requests
import connectWifi
import BME280

#connect to wifi
connectWifi.connect()
#bme setup
i2c = I2C(scl=Pin(22), sda=Pin(21), freq=10000)
bme = BME280.BME280(i2c=i2c)
#gps uart
uart = UART(2, baudrate=9600, bits=8,tx=17,rx=16,parity=None, stop=1)
#data dict
data = {"temperature":0,"humidity":0,"pressure":0,"latitude":0,"longitude":0}

#get temperature humidity atmospheric pressure and gps data
def getData():
    cord =([-0.39421,36.96334],[-0.39309,36.96316],[-0.3929,36.96445],[-0.39439,36.96009])
    data["temperature"] = bme.temperature
    data["humidity"] = bme.humidity
    data["pressure"] = bme.pressure
    rand = urandom.randrange(4)
    data["latitude"] = cord[rand][0]
    data["longitude"] = cord[rand][1]
    #print("Data: " + str(data))
    return data

def postData(payload):
    #url = "http://192.168.43.214/denno/hardware/postespdata.php/"
    url = "http://gis-based-iot.epizy.com/postespdata.php"
    #extract data from the data dict to make the http post
    temp = hum = pres = lat = lon = 0
    temp = payload["temperature"]
    hum = payload["humidity"]
    pres = payload["pressure"]
    lat = payload["latitude"]
    lon = payload["longitude"]
    data= "latitude="+str(lat)+"&longitude="+str(lon)+"&humidity="+str(hum)+"&temperature="+str(temp)+"&pressure="+str(pres)+""
    #print(data)
    headers = {'content-type':'application/x-www-form-urlencoded'}
    try:
        response = requests.post(url,data=data,headers=headers)
        print(response.text)
        response.close()
        #print("Record added successfully!!")
    except OSError:
        #handle os error 23
        print ("The fucking Error 23  Encountered")
        import gc
        gc.collect()

while (1):
    #getData()
    postData(getData())
    time.sleep(10)
