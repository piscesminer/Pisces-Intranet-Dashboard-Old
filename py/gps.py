import threading
from threading import Lock,Thread
import serial
from time import ctime,sleep
time = 0; 


def reader():

    ser = serial.Serial("/dev/serial0",9600)
    i=10
    while i>0:
     i=i-1;
     line = str(str(ser.readline())[2:])
     print(line)
     print("<br>")

if __name__ == '__main__':
    reader()
