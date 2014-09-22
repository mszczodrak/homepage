#!/bin/bash
# Author: Marcin Szczodrak 
# Email: marcin@ieee.org
# Last Updated: August 18, 2014

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
	#git clone git@github.com:tinyos/nesc.git
	git clone https://github.com/tinyos/nesc.git
fi

cd $INSTALL_DIR/github
if [ -d $TINYOS_VERSION ]; then
	cd $TINYOS_VERSION
	git pull
else
	#git clone git@github.com:tinyos/$TINYOS_VERSION.git
	git clone https://github.com/tinyos/$TINYOS_VERSION.git
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

export TOSSTAN="/etc/apt/sources.list.d/tinyon-stanford-debian.list"
echo "deb http://tinyos.stanford.edu/tinyos/dists/ubuntu natty main" | sudo tee $TOSSTAN

sudo apt-get update
sudo apt-get install -y --force-yes msp430-46
sudo apt-get install -y --force-yes avr-tinyos
sudo apt-get remove -y --assume-yes tinyos-tools

# Set environmental variables
echo 'Setting environmental variables'
echo " " | sudo tee -a $PROFILE_FILE
echo "# Set the envoronment variables for TinyOS" | sudo tee -a $PROFILE_FILE
echo export CLASSPATH=$INSTALL_DIR/github/tinyos/support/sdk/java/tinyos.jar:. | sudo tee -a $PROFILE_FILE
echo export PATH=$PATH:$INSTALL_DIR/tools/tinyos-tools/bin:$INSTALL_DIR/tools/usr/bin | sudo tee -a $PROFILE_FILE
echo export PYTHONPATH=.:$INSTALL_DIR/github/tinyos/support/sdk/python:$PYTHONPATH | sudo tee -a $PROFILE_FILE
echo export MOTECOM=serial@/dev/ttyUSB0:115200 >> $PROFILE_FILE
echo " " | sudo tee -a $PROFILE_FILE

echo "Run "
echo "$ source ~/.profile "
echo "or"
echo "logout and login"


