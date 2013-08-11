#!/bin/bash
# Author: Marcin Szczodrak
# Date:  May 28, 2010 

mkdir WORKSPACE_DIR &&
ORG_DIR=`pwd` &&
cd WORKSPACE_DIR &&
apt-get update &&
apt-get install libusb-dev libftdi1 libftdi-dev &&
ldconfig &&

wget http://www.ftdichip.com/Drivers/D2XX/Linux/libftd2xx0.4.16.tar.gz &&
gunzip libftd2xx0.4.16.tar.gz &&
tar -xvf libftd2xx0.4.16.tar &&
cd libftd2xx0.4.16 &&
cp ftd2xx.h /usr/local/include &&
cp WinTypes.h /usr/local/include &&
chmod a+r /usr/local/include/ftd2xx.h &&
chmod a+r /usr/local/include/WinTypes.h &&
cp libftd2xx.so.0.4.16 /usr/local/lib &&
cd /usr/local/lib 
ln -s libftd2xx.so.0.4.16 libftd2xx.so 
cd /usr/lib 
ln -s /usr/local/lib/libftd2xx.so.0.4.16 libftd2xx.so 
ldconfig


cd $ORG_DIR &&
cd WORKSPACE_DIR &&

wget http://download.berlios.de/openocd/openocd-0.4.0.tar.gz &&
gunzip openocd-0.4.0.tar.gz &&
tar -xvf openocd-0.4.0.tar &&
cd openocd-0.4.0 &&
./configure --disable-werror --enable-ft2232_ftd2xx &&
make &&
make install &&

cd /opt/tinyos-2.x/tools/platforms/intelmote2/openocd/ &&
mv imote2-ocd-program.py imote2-ocd-program_old.py &&
wget http://www.cs.columbia.edu/~msz/wsn/scripts/imote2-ocd-program.py &&
chmod +x imote2-ocd-program.py &&
cd /opt/tinyos-2.x-contrib/intelmote2/tools/platforms/intelmote2/openocd/ &&
mv imote2-ocd-program.py imote2-ocd-program_old.py &&
wget http://www.cs.columbia.edu/~msz/wsn/scripts/imote2-ocd-program.py &&
chmod +x imote2-ocd-program.py &&
cd /etc/udev/rules.d &&
wget http://www.cs.columbia.edu/~msz/wsn/scripts/45-ftdi2232-libftdi.rules &&
echo &&
echo &&
echo "You may need to reboot the system to make sure that you can use openocd server without sudo" &&
echo &&
echo "If you use ARM-USB-TINY JTAG cable the following should work:" &&
echo "1. Plug in the JTAG cable and usb cable and run" &&
echo "2. openocd -f interface/olimex-jtag-tiny.cfg -f board/crossbow_tech_imote2.cfg" &&
echo &&
cd $ORG_DIR &&
rm -rf WORKSPACE_DIR


