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
VMware software for free through <a href="https://www.cs.columbia.edu/crf/software/VMware/">
CRF website</a>.
</p>

<p>
Download image with the Ubuntu operating system pre-configured to do the project work. 
The image can be download from 
<a href='http://smartcity.cs.columbia.edu/software/Ubuntu_12.04.1_LTS_32bit.tar.gz'>here</a>
</p>
-->

<h4>Ubuntu Working Environment</h4>

<p>
For quick start, please make sure that the necessary software is installed on your PC.
</p>

<p>
For Ubuntu development configuration, please follow the <a href="../../Ubuntu">Ubuntu configuration page</a>.
</p>

<h4>SSH Key</h4>

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


<h4>Git</h4>

<p>
All projects software is stored on a remote server and managed through 
<a href="http://git-scm.com/">git</a> version control system.
Each project has a dedicated repository which stores source code of
programs and latex files. Please keep in mind that only source code
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
You will also need an account on the <a href="https://github.com/">GitHub</a>.
Please make sure that your account is working. As a simple test, please create
one public repository, clone it to the local PC and push some changes.
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

<h4>Latex</h4>

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


<h4>Wireless Sensor Network / Internet-of-Things / Cyber-Physical Systems</h4>

<p>
Install TinyOS by following either the online 
<a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/Installing_TinyOS">TinyOS documentation</a>,
or the recommended 
<a href="../../wsn/">TinyOS script that installs the tools and the system from the source</a>.
This script will setup the development version of TinyOS, which is available at
<a href="https://github.com/tinyos/tinyos-main">GitHub</a>.
</p>

<p>
With TinyOS in your <pre>~/github/tinyos</pre> directory, please follow the 
<a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/TinyOS_Tutorials">TinyOS Tutorials</a>.
</p>

<p>
To start, please follow the first four tutorials:
<ul>
<li><a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/Getting_Started_with_TinyOS">Getting Started with TinyOS</a></li>
<li><a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/Modules_and_the_TinyOS_Execution_Model">Modules and the TinyOS Execution Model</a></li>
<li><a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/Mote-mote_radio_communication">Mote-mote radio communication</a></li>
<li><a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/Mote-PC_serial_communication_and_SerialForwarder">Mote-PC serial communication and SerialForwarder (TOS 2.1.1 and later)</a></li>
<li><a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/The_TinyOS_printf_Library">The TinyOS printf Library</a></li>
<li><a href="http://tinyos.stanford.edu/tinyos-wiki/index.php/Dissemination">Dissemination</a></li>
</ul>


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

