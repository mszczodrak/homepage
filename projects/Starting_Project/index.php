<?php
include("../header.php");
?>


<h2>Project Starting-Up Tutorial</h2>

<!--
<h4>Setup Virtual Environment</h4>

<p>
Download VMware Virtualization Software for Desktop. For Windows and Linux, you 
need at least to download and install VMware Player, or VMware Workstation.
Mac OS users need to download and install VMware Fusion. The official VMware
Download Center can be found <a href="http://downloads.vmware.com/">here</a>.
The Columbia University students who have Computer Science account, can download
VMware software for free through <a href="https://www.cs.columbia.edu/crf/software/vmware/">
CRF website</a>.
</p>

<p>
Download image with the Ubuntu operating system pre-configured to do the project work. 
The image can be download from 
<a href='http://smartcity.cs.columbia.edu/software/Ubuntu_12.04.1_LTS_32bit.tar.gz'>here</a>
</p>
-->

<p>
To ensure that you have all the necessary tools to work with, please install
the following Ubuntu packages on your system:
</p>

<pre>
sudo apt-get update
sudo apt-get upgrade

sudo apt-get install -y --assume-yes build-essential
sudo apt-get install -y --assume-yes gcc
sudo apt-get install -y --assume-yes g++
sudo apt-get install -y --assume-yes terminator
sudo apt-get install -y --assume-yes git
sudo apt-get install -y --assume-yes ispell
sudo apt-get install -y --assume-yes vim
sudo apt-get install -y --assume-yes nmap
sudo apt-get install -y --assume-yes cvs
sudo apt-get install -y --assume-yes subversion
sudo apt-get install -y --assume-yes git-core
sudo apt-get install -y --assume-yes patch
sudo apt-get install -y --assume-yes yum
sudo apt-get install -y --assume-yes flex
sudo apt-get install -y --assume-yes bison
sudo apt-get install -y --assume-yes byacc
sudo apt-get install -y --assume-yes mc
sudo apt-get install -y --assume-yes lyx
sudo apt-get install -y --assume-yes automake
sudo apt-get install -y --assume-yes autoconf
sudo apt-get install -y --assume-yes libtool
sudo apt-get install -y --assume-yes sed
sudo apt-get install -y --assume-yes wget
sudo apt-get install -y --assume-yes coreutils
sudo apt-get install -y --assume-yes unzip
sudo apt-get install -y --assume-yes gawk
sudo apt-get install -y --assume-yes diffstat
sudo apt-get install -y --assume-yes make
sudo apt-get install -y --assume-yes texlive-latex-base 
sudo apt-get install -y --assume-yes texlive-math-extra 
sudo apt-get install -y --assume-yes texlive-science 
sudo apt-get install -y --assume-yes texlive-latex3 
sudo apt-get install -y --assume-yes texlive-latex-extra 
sudo apt-get install -y --assume-yes texlive-latex-recommended 
sudo apt-get install -y --assume-yes ispell 
sudo apt-get install -y --assume-yes vim 
sudo apt-get install -y --assume-yes doxygen
</pre>
</p>


<!--
<p>
From VMware software such as VMware Player or VMware Workstation (VMware Fusion on Mac), 
start Ubuntu image. After the system starts please login with the following credentials:
<br>
<b>username:</b> user<br>
<b>password:</b> userDev
</p>
-->

<p>
If you haven't changed your password yet, please do it This can be done by entering in the shell:
</p>

<pre>
$ passwd
</pre>

<h4>Setup Public SSH Key</h4>

<p>
All projects require revision control system that is authenticated through public
SSH key. The key consists of two files: private key and public key - the copy of the last
one needs to be provided to the revision control system. To generate a new key, use
the <a href="http://en.wikipedia.org/wiki/Ssh-keygen">ssh-keygen</a> tool.
To start the process of generating a new key, enter in a shell:
</p>

<pre>
$ ssh-keygen -t dsa
</pre>

<p>
After completing this process, the new key will be stored in your home directory, in
<b>~/.ssh</b>, with private key in <b>id_dsa</b> file and public key in
<b>id_dsa.pub</b> file.
</p>

<p>
Your public key needs to be attached to the authentication system of the revision control.
Therefore, please send your key to my email. If you plan to use other computers to do the
work, make sure that your ssh-keys are stored on those computers, under <code>~/.ssh</code>.
</p>


<h4>Documenting Code</h4>

<p>
All code should be properly documented. 
A nice and one of the professional ways of
documenting a code is by using Doxygen.
</p>

<p>
Each source code file should start with
<pre>
/** \file

Here is a general description of what this file does.

*/
</pre>

and then, inside the file, every comment should have this syntax
<pre>
/**
this is a comment
*/
</pre>
On top of a function, a comment should have function description, 
parameters the function takes, and the function's return value.
<pre>
/**
function computes square of hypotenuse

\param a length of one side
\param b length of another side

\return c square of the length of hypotenuse
*/
</pre>

Once we have comments this way, we can use Doxygen to compile
documentation for us.
<pre>
$ doxygen Doxyfile
</pre>
where Doxyfile is the doxygen configuration. If there is none, do
<pre>
$ doxygen -g
</pre>
and edit the Doxyfile that is created.
</p>

<p>
During doxygen compilation pay close attention to warning. They
are telling you where the comments are missing. A properly
documented code should have no warnings during doxygen run.
</p>

<p>
After running doxygen, we should have at least html and latex folders.
Use html/index.html to see in your browser how the generated 
documentation looks like.
</p>


<a href="http://www.ibm.com/developerworks/aix/library/au-learningdoxygen/">IBM Tutorial on Doxygen</a>.


<h4>Start Working with Git</h4>

<p>
All project software is stored on a remote server and managed through 
<a href="http://git-scm.com/">git</a> version control system.
Each project has a dedicated repository which stores source pre of
programs and latex files. Please keep in mind that only source pre
should be stored in the repository. You should avoid pushing into
the repository large files, or executable files. A simple rule to
keep in mind is that, if it's not a file I can open with an editor
and read it, then probably this file should not be in the repository.
The exception are pictures and figures.
</p>

<p>
Before you start using the repository, please setup your name
and email address for the git version control system, as follows:
</p>

<pre>
$ git config --global user.name "Your Name"
$ git config --global user.email you@example.com
</pre>

<p>
So let's say you are working on a project which repository is called
<i>hello_world</i>. You can clone (download) a copy of all files stored
in this repository as follows. In your working space, you can do:
</p>

<pre>
$ cd ~/workspace
$ git clone git@git.sld.cs.columbia.edu:<i>hello_world</i>.git
</pre>

<p>
If you see request for a password:
</p>

<pre>git@git.sld.cs.columbia.edu's password:</pre>

<p>
then it means that your ssh-key is not properly configured. The same may happen
when repository name or server name have been mistyped.
If everything goes fine, you should see something that looks like this:
</p>

<pre>
Cloning into hello_world...
remote: Counting objects: 44, done.
remote: Compressing objects: 100% (42/42), done.
remote: Total 44 (delta 18), reused 0 (delta 0)
Receiving objects: 100% (44/44), 7.39 KiB, done.
Resolving deltas: 100% (18/18), done.
</pre>

<p>
There will be also a new folder in your <code>~/workspace</code> 
called the same way as your project repository name; 
in this example <code>hello_world</code>.
</p>

<p>
The following are the most basic git commands that a git user needs to know:
</p>
<ul>
<li><b>git pull</b> - download updated from repository</li>
<li><b>git add</b> - add a file to version control system</li>
<li><b>git commit</b> - save work done on files into the local repository</li>
<li><b>git push</b> - send all files changed into the server</li>
<li><b>git status</b> - list files that have been changed</li>
<li><b>git list</b> - list history of the repository commits</li>
</ul>

<p>
The complete list and explanation can be found at
<a href="http://git-scm.com/documentation">git documentation website</a>. 
</p>

<p>
Try to use the git by adding a new file and modifying it.
First, enter repository directory:
</p>

<pre>
$ cd ~/workspace
$ cd <i>hello_world</i>
</pre>

<p>
Second, create a file and write something in the file:
</p>

<pre>
$ touch test_file.txt<br>
$ vi test_file
</pre>

<p>
Note that to start typing in vi, press <b>i</b>, to save and close file, press <b>ESC</b> 
and enter <b>:wq</b>.
</p>

<p>
Third, add file to repository control:
</p>

<pre>
$ git add test_file.txt
</pre>

<p>
Next, save the file current version in the local repository:
</p>

<pre>
$ git commit -a -m "This is a test file"
</pre>

<p>
You can check the file status by entering:
</p>

<pre>
$ git status
</pre>

<p>
Finally, send the current version of the repository to the server:
</p>

<pre>
$ git push
</pre>

<p>
You can see the history log by entering:
</p>

<pre>
$ git log
</pre>

<h4>Start Working with Latex</h4>

<p>
All project official documentation is written in latex.
In the project repository there will be latex templates and Makefile setup
to compile the tex document into pdf files.
All it is necessary to compile to pdf is just typing <i>make</i>:
To learn more on Latex, how to format text and include figures, see this online book: 
<a href="http://en.wikibooks.org/wiki/LaTeX">Latex</a>.
</p>

<p>
Compiling process will generate various files, including .aux, .dvi, .log, .out, .pdf.
These files, however, should not be part of the revision control system, therefore, before
committing and pushing the code, please run:
<pre>
$ make clean
</pre>
</p>

<p>
One can use ispell program to run a spell check over a text file. For example,
to check text stored in a file called hello_world.txt, one would enter in shell:
<pre>
$ ispell hello_world.txt
</pre>
</p>

<p>
In the same way as in coding we fit the text of the source code in 80 columns,
make sure to keep the latex source within 80 columns.
</p>

<!--
<h4>Installing Fox Family Software</h4>

<p>
Start with downloading Fennec Fox and Swift Fox source code. 
<pre>
$ git clone git@git.sld.cs.columbia.edu:fennecfox-pub.git
</pre>
and
<pre>
$ git clone git@git.sld.cs.columbia.edu:swiftfox-pub.git
</pre>
<b>Please keep in mind
that this code is the development version of the code and should not be distributed.</b>
</p>

<p>
After downloading the code, the code needs to be compiled and installed in your system.
Please first follow <a href="http://smartcity.cs.columbia.edu/fennecfox/fennecfox_installation.php">
this Fennec Fox Installation Tutorial</a> and
<a href="http://smartcity.cs.columbia.edu/swiftfox/swiftfox_installation.php">Swift Fox Installation Tutorial</a>.
In most cases, the installation process simply requires running few <i>install</i> scripts.
</p>
-->


<?php
include("../../footer.php");
?>

