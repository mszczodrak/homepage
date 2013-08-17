<?php
include("../top.php");
?>

<h2>Wireless Sensor Network</h2>

<h4>Install Pre-requisites</h4>

<pre>
sudo apt-get update
sudo apt-get install -y --assume-yes build-essential
sudo apt-get install -y --assume-yes gcc
sudo apt-get install -y --assume-yes g++
sudo apt-get install -y --assume-yes python-dev
sudo apt-get install -y --assume-yes git
sudo apt-get install -y --assume-yes graphviz
sudo apt-get install -y --assume-yes flex
sudo apt-get install -y --assume-yes automake
sudo apt-get install -y --assume-yes emacs
sudo apt-get install -y --assume-yes bison
sudo apt-get install -y --assume-yes flex
sudo apt-get install -y --assume-yes gperf
</pre>

<h4>Pull TinyOS source code from repository</h4>

<pre>
cd
if [ ! -d github ]; then
	mkdir github 
fi
cd github

if [ -d nesc ]; then
	cd nesc
	git pull
	cd ..
else
	git clone git@github.com:tinyos/nesc.git
fi

if [ -d tinyos-main ]; then
	cd tinyos-main
	git pull
	cd ..
else
	git clone git@github.com:tinyos/tinyos-main.git
fi

if [ -d tinyos-release ]; then
	cd tinyos-release
	git pull
	cd ..
else
	git clone git@github.com:tinyos/tinyos-release.git
fi

if [ -L tinyos ]; then
	rm tinyos
fi
ln -s tinyos-main tinyos

</pre>


<h4>Installing nesc from source</h4>
<pre>
cd
cd github/nesc
./Bootstrap
./configure --prefix=/home/$USER/tools/nesc
make
make install
</pre>

<h4>Installing tinyos tools</h4>
<pre>
cd
cd github/tinyos/tools
./Bootstrap
./configure --prefix=/home/$USER/tools/tinyos-tools
make
make install
</pre>


<h4>Set environmental variables</h4>

<pre>
cd
export MY_PROFILE="./.profile"
export TOSROOT="/home/$USER/github/tinyos"

sed -i '/tinyos/d' $MY_PROFILE
sed -i '/msp430/d' $MY_PROFILE
sed -i '/MOTECOM/d' $MY_PROFILE

echo "# Set the envoronment variables for TinyOS \n" >> $MY_PROFILE
echo export TOSROOT=$TOSROOT >> $MY_PROFILE
echo export TOSDIR=$TOSROOT/tos >> $MY_PROFILE
echo export CLASSPATH=$TOSROOT/support/sdk/java/tinyos.jar:. >> $MY_PROFILE
echo export MAKERULES=$TOSROOT/support/make/Makerules >> $MY_PROFILE
echo export PATH=/opt/msp430/bin:$PATH >> $MY_PROFILE
echo export PYTHONPATH=.:$TOSROOT/support/sdk/python:$PYTHONPATH >> $MY_PROFILE
echo export MOTECOM=serial@/dev/ttyUSB0:115200 >> $MY_PROFILE

echo export PATH=${PATH}:/home/${USER}/tools/nesc/bin:/home/${USER}/tools/tinyos-tools/bin

source ~/.profile
</pre>

<h4>Install compilers</h4>

<p>
We will use tinyos toolchain provided by TinyProd. The Debian/Ubuntu version
can be found here: <a href="http://tinyprod.net/repos/debian/README-46.html">
http://tinyprod.net/repos/debian/README-46.html</a>.
</p>

<p>
In short, to install tinyos tool-chains, run the following:
</p>

<pre>
gpg --keyserver keyserver.ubuntu.com --recv-keys 34EC655A
gpg -a --export 34EC655A | sudo apt-key add -

export TOSPROD="/etc/apt/sources.list.d/tinyprod-debian.list" 

echo "deb http://tinyprod.net/repos/debian squeeze main" | sudo tee $TOSPROD
echo "deb http://tinyprod.net/repos/debian msp430-46 main" | sudo tee -a $TOSPROD

sudo apt-get update
sudo apt-get install -y --assume-yes nesc 
sudo apt-get install -y --assume-yes tinyos-tools
sudo apt-get install -y --assume-yes msp430-46
sudo apt-get install -y --assume-yes avr-tinyos

</pre>


<?php
include("../footer.php");
?>



