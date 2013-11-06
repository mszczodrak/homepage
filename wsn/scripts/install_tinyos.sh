#!/bin/bash
# Author: Marcin Szczodrak 
# Email: marcin@ieee.org
# Last Updated: October 18, 2013

INSTALL_DIR=/home/$USER
PROFILE_FILE=/home/$USER/.profile
# Version can be either tinyos-main or tinyos-release
TINYOS_VERSION=tinyos-main


# Install Pre-requisites

echo 'Installing Software Pre-requisities'

sudo apt-get update
sudo apt-get install -y --assume-yes automake
sudo apt-get install -y --assume-yes bison
sudo apt-get install -y --assume-yes build-essential
sudo apt-get install -y --assume-yes emacs
sudo apt-get install -y --assume-yes flex
sudo apt-get install -y --assume-yes gcc
sudo apt-get install -y --assume-yes git
sudo apt-get install -y --assume-yes gperf
sudo apt-get install -y --assume-yes graphviz
sudo apt-get install -y --assume-yes g++
sudo apt-get install -y --assume-yes python-dev
sudo apt-get install -y --assume-yes openjdk-7-jdk

# Pull TinyOS source code from repository

echo 'Downloading TinyOS source code'

if [ ! -d $INSTALL_DIR ]; then
	mkdir $INSTALL_DIR
fi

cd $INSTALL_DIR
if [ ! -d github ]; then
	mkdir github 
fi

cd $INSTALL_DIR
if [ ! -d tools ]; then
	mkdir tools
fi

cd $INSTALL_DIR/github
if [ -L tinyos ]; then
	rm tinyos
fi

cd $INSTALL_DIR/github
if [ -d nesc ]; then
	cd nesc
	git pull	
else
	git clone git@github.com:tinyos/nesc.git
fi

cd $INSTALL_DIR/github
if [ -d $TINYOS_VERSION ]; then
	cd $TINYOS_VERSION
	git pull
else
	git clone git@github.com:tinyos/$TINYOS_VERSION.git
fi

cd $INSTALL_DIR/github
ln -s $TINYOS_VERSION tinyos

# Installing nesc from source

echo 'Installing nesc from source code'
cd $INSTALL_DIR/github
cd nesc
./Bootstrap
./configure --prefix=$INSTALL_DIR/tools/nesc
make
make install

export PATH=$PATH:$INSTALL_DIR/tools/nesc/bin

# Installing tinyos tools
echo 'Installing tinyos tools from source code'

cd $INSTALL_DIR/github
cd tinyos/tools
./Bootstrap
./configure --prefix=$INSTALL_DIR/tools/tinyos-tools
make
make install


# Installing compilers
echo 'Installing compilers provided by TinyProd'
gpg --keyserver keyserver.ubuntu.com --recv-keys 34EC655A
gpg -a --export 34EC655A | sudo apt-key add -

export TOSPROD="/etc/apt/sources.list.d/tinyprod-debian.list"
echo "deb http://tinyprod.net/repos/debian squeeze main" | sudo tee $TOSPROD
echo "deb http://tinyprod.net/repos/debian msp430-46 main" | sudo tee -a $TOSPROD

sudo apt-get update
sudo apt-get install -y --assume-yes msp430-46
sudo apt-get install -y --assume-yes avr-tinyos
sudo apt-get remove -y --assume-yes tinyos-tools

# Set environmental variables
echo 'Setting environmental variables'
echo " " | sudo tee -a $PROFILE_FILE
echo "# Set the envoronment variables for TinyOS" | sudo tee -a $PROFILE_FILE
echo export TOSROOT=$INSTALL_DIR/github/tinyos | sudo tee -a $PROFILE_FILE
echo export TOSDIR=$INSTALL_DIR/github/tinyos/tos | sudo tee -a $PROFILE_FILE
echo export CLASSPATH=$INSTALL_DIR/github/tinyos/support/sdk/java/tinyos.jar:. | sudo tee -a $PROFILE_FILE
echo export MAKERULES=$INSTALL_DIR/github/tinyos/support/make/Makerules | sudo tee -a $PROFILE_FILE
echo export PATH=$PATH:$INSTALL_DIR/tools/tinyos-tools/bin:$INSTALL_DIR/tools/usr/bin | sudo tee -a $PROFILE_FILE
echo export PYTHONPATH=.:$INSTALL_DIR/github/tinyos/support/sdk/python:$PYTHONPATH | sudo tee -a $PROFILE_FILE
echo export MOTECOM=serial@/dev/ttyUSB0:115200 >> $PROFILE_FILE
#echo export INTELMOTE2_CONTRIB_DIR=/opt/tinyos-2.x-contrib/intelmote
echo " " | sudo tee -a $PROFILE_FILE

echo "Run "
echo "$ source ~/.profile "
echo "or"
echo "logout and login"


