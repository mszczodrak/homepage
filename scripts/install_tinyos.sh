#!/bin/bash
# Author: Marcin Szczodrak 
# Email: marcin@ieee.org
# Last Updated: October 18, 2013

INSTALL_DIR=/home/$USER
PROFILE_FILE=/home/$USER/.profile
# Version can be either tinyos-main or tinyos-release
TINYOS_VERSION=tinyos-main

export TINYOSDPKG="/etc/apt/sources.list.d/tinyos.list"

#echo "deb http://tinyprod.net/repos/debian squeeze main" | sudo tee $TOSPROD
#echo "deb http://tinyprod.net/repos/debian msp430-46 main" | sudo tee -a $TOSPROD
echo "deb http://tinyos.stanford.edu/tinyos/dists/ubuntu natty main" | sudo tee -a $TINYOSDPKG

# Install Pre-requisites

echo 'Installing Software Pre-requisities'

sudo apt-get update
sudo apt-get install -y --force-yes automake
sudo apt-get install -y --force-yes bison
sudo apt-get install -y --force-yes build-essential
sudo apt-get install -y --force-yes emacs
sudo apt-get install -y --force-yes flex
sudo apt-get install -y --force-yes gcc
sudo apt-get install -y --force-yes git
sudo apt-get install -y --force-yes gperf
sudo apt-get install -y --force-yes graphviz
sudo apt-get install -y --force-yes g++
sudo apt-get install -y --force-yes python-dev
sudo apt-get install -y --force-yes openjdk-7-jdk

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
#cd $INSTALL_DIR/github
#cd nesc
#./Bootstrap
#./configure --prefix=$INSTALL_DIR/tools/nesc
#make
#make install

#export PATH=$PATH:$INSTALL_DIR/tools/nesc/bin

sudo apt-get install -y --force-yes tinyos-base
sudo apt-get install -y --force-yes tinyos-tools
sudo apt-get install -y --force-yes msp430-46

#sudo apt-get install -y --force-yes nescc
#sudo apt-get install -y --force-yes tinyos-tools
#sudo apt-get install -y --force-yes msp430-46
#sudo apt-get install -y --force-yes avr-tinyos

# Set environmental variables
echo 'Setting environmental variables'
echo " " | sudo tee -a $PROFILE_FILE
echo "# Set the envoronment variables for TinyOS" | sudo tee -a $PROFILE_FILE
echo export TOSROOT=$INSTALL_DIR/github/tinyos | sudo tee -a $PROFILE_FILE
echo export TOSDIR=$INSTALL_DIR/github/tinyos/tos | sudo tee -a $PROFILE_FILE
echo export CLASSPATH=$INSTALL_DIR/github/tinyos/support/sdk/java/tinyos.jar:. | sudo tee -a $PROFILE_FILE
echo export MAKERULES=$INSTALL_DIR/github/tinyos/support/make/Makerules | sudo tee -a $PROFILE_FILE
echo export PATH=$PATH:$INSTALL_DIR/tools/tinyos-tools/bin:$INSTALL_DIR/tools/usr/bin:/opt/msp430-46/bin | sudo tee -a $PROFILE_FILE
echo export PYTHONPATH=.:$INSTALL_DIR/github/tinyos/support/sdk/python:$PYTHONPATH | sudo tee -a $PROFILE_FILE
echo export MOTECOM=serial@/dev/ttyUSB0:115200 >> $PROFILE_FILE
#echo export INTELMOTE2_CONTRIB_DIR=/opt/tinyos-2.x-contrib/intelmote
echo " " | sudo tee -a $PROFILE_FILE

echo "Run "
echo "$ source ~/.profile "
echo "or"
echo "logout and login"


