import urequests as requests
import connectWifi
import json

connectWifi.connect()
lat = 44.543
lon = 32.5345
hum = 49.34
temp = 23.534
press = 101100

url = "http://192.168.43.214/denno/hardware/postespdata.php"
data= "latitude="+str(lat)+"&longitude="+str(lon)+"&humidity="+str(hum)+"&temperature="+str(temp)+"&pressure="+str(press)+""
#data= "latitude=44.544&longitude=32.545&humidity=49.5456&temperature=23.4545&pressure=101554"
headers = {'content-type':'application/x-www-form-urlencoded'}
response = requests.post(url,data=data,headers=headers)
print(response.text)
