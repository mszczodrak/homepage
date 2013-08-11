#!/bin/bash
# Author: Marcin Szczodrak 
# Email: marcin@ieee.org
# Date September 18, 2012

sudo echo 'deb http://tinyos.stanford.edu/tinyos/dists/ubuntu natty main' > /etc/apt/sources.list.d/tinyos.list

sudo apt-get update -qq

sudo apt-get update -qq
sudo apt-get install -qq --force-yes build-essential
sudo apt-get install -qq --force-yes gcc
sudo apt-get install -qq --force-yes g++
sudo apt-get install -qq --force-yes python-dev
sudo apt-get install -qq --force-yes subversion
sudo apt-get install -qq --force-yes cvs
sudo apt-get install -qq --force-yes git
sudo apt-get install -qq --force-yes python2.7
sudo apt-get install -qq --force-yes python2.7-dev
sudo apt-get install -qq --force-yes graphviz

echo 'Installing tinyos'
sudo apt-get install -qq --force-yes tinyos-2.1.2 --reinstall

# Swift Fox pre-requisites
sudo apt-get install -qq --force-yes bison flex
echo 'Setting TinyOS Source code to the one from repository (development version)'

cd /opt

sudo chown $USER.$USER tinyos* -R

echo 'Downloading recent version of tinyos-2x'
if [ -d tinyos-main-read-only ]; then
	cd tinyos-main-read-only
	svn up
	cd ..
else
	sudo svn checkout http://tinyos-main.googlecode.com/svn/trunk/ tinyos-main-read-only --quiet
	sudo ln -s tinyos-main-read-only tinyos-2.x
fi

if ! grep -q TOSROOT /etc/profile
then
	echo "# Set the envoronment variables for TinyOS \n" | sudo tee -a /etc/profile 
	echo export TOSROOT=/opt/tinyos-2.x | sudo tee -a /etc/profile
	echo export TOSDIR=/opt/tinyos-2.x/tos | sudo tee -a /etc/profile
	echo export CLASSPATH=/opt/tinyos-2.x/support/sdk/java/tinyos.jar:. | sudo tee -a /etc/profile
	echo export MAKERULES=/opt/tinyos-2.x/support/make/Makerules | sudo tee -a /etc/profile
	echo export PATH=/opt/msp430/bin:$PATH | sudo tee -a /etc/profile
	echo export PYTHONPATH=.:/opt/tinyos-2.x/support/sdk/python:$PYTHONPATH | sudo tee -a /etc/profile
	echo export MOTECOM=serial@/dev/ttyUSB0:115200 >> /etc/profile      # in my case USB0 is used to program and USB1 to communicate
	#echo export INTELMOTE2_CONTRIB_DIR=/opt/tinyos-2.x-contrib/intelmote2
fi

sudo chown $USER.$USER tinyos* -R

#echo 'If you plan to use TOSSIM, make sure to set Python to version 2.7 in /opt/tinyos-2.x/support/make/sim.extra'
echo 'DONE'

