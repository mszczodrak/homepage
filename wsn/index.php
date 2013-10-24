<?php
include("../top.php");
?>

<meta name="keywords" content="tinyos, ubuntu, install, installing, 10.04, 12.04, 13.04, 13.10, lucid, precise, quantal, raring, TinyOS, github, tinyprod, msp430, nesc" />

<h2>Installing TinyOS by running a script</h2>
1. Download the <a href="./scripts/install_tinyos.sh">install_tinyos.sh</a> script.

2. Do: <code>$ chmod +x install_tinyos.sh</code>

3. Run script: <code>$ ./install_tinyos.sh</code>

<b>or</b> 

<h2>Follow step-by-step instalation process</h2>

Installing TinyOS from github repository on Ubuntu OS.

<h4>Install Pre-requisites</h4>

<pre>
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

Add to ~/.profile file

<pre>

# Set the envoronment variables for TinyOS \n
export TOSROOT=/home/${USER}/github/tinyos
export TOSDIR=/home/${USER}/github/tinyos/tos
export CLASSPATH=/home/${USER}/github/tinyos/support/sdk/java/tinyos.jar:.
export MAKERULES=/home/${USER}/github/tinyos/support/make/Makerules
export PATH=/opt/msp430/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/bin/X11:/usr/games
export PYTHONPATH=.:/home/${USER}/github/tinyos/support/sdk/python:
export MOTECOM=serial@/dev/ttyUSB0:115200

export PATH=${PATH}:/home/${USER}/tools/nesc/bin:/home/${USER}/tools/tinyos-tools/bin
</pre>

and run 

<pre>
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
<!--
sudo apt-get install -y --assume-yes nesc 
sudo apt-get install -y --assume-yes tinyos-tools
-->
sudo apt-get install -y --assume-yes msp430-46
sudo apt-get install -y --assume-yes avr-tinyos

</pre>


<?php
include("../footer.php");
?>



