#!/bin/bash
# Author: Marcin Szczodrak
# Date:  Dec 4, 2009

mkdir WORKSPACE_DIR &&
ORG_DIR=`pwd` &&
cd WORKSPACE_DIR &&

wget http://www.ftdichip.com/Drivers/D2XX/Linux/libftd2xx0.4.16.tar.gz &&
gunzip libftd2xx0.4.16.tar.gz &&
tar -xvf libftd2xx0.4.16.tar &&
cd libftd2xx0.4.16 &&
cp ftd2xx.h /usr/local/include &&
cp WinTypes.h /usr/local/include &&
chmod a+r /usr/local/include/ftd2xx.h &&
chmod a+r /usr/local/include/WinTypes.h && 
cp libftd2xx.so.0.4.16 /usr/local/lib &&
cd /usr/local/lib &&
ln -s libftd2xx.so.0.4.16 libftd2xx.so &&
cd /usr/lib &&
ln -s /usr/local/lib/libftd2xx.so.0.4.16 libftd2xx.so &&
ldconfig
chmod o+w /etc/fstab &&
echo "none /proc/bus/usb usbfs defaults,mode=0666 0 0" >> /etc/fstab &&
chmod o-w /etc/fstab &&
mount -a

cd $ORG_DIR &&
rm -rf WORKSPACE_DIR
