<a name="projects"></a>
<h4>Projects</h4>

<div id="projects">
<p>
<table cellpadding=10 cellspacing=20 frame=box>
<tr><td width="200">
<center>
<b>Fennec Fox</b><br>
<img src="./pics/fennec_stack_states.png" width="200">
</center>
</td><td align="left">
<b>Fennec Fox</b> is a platform for low-power wireless embedded devices
requiring dynamic network reconfiguration and communication service adaption.
Fennec Fox is a platform providing network reconfiguration mechanism.
The platform consists of a four-layer network protocol stack, where
at runtime various library module may support each layer service.
Fennec Fox also provides mechanisms ensuring that all nodes within a
network are configured in the same way. 
More @ <a href="http://github.com/mszczodrak/fennec-fox/wiki">Project Website</a> 
</td></tr>


<tr>
<td>
<center>
<b>Swift Fox</b><br>
<img src="./pics/swift_fox_arch_small.png" width="200">
</center>
</td>
<td>
<b>Swift Fox</b> is a programming language for runtime dynamic
network reconfiguration of low-power wireless network running on
Fennec Fox platform.
Swift Fox compiler is written in C using Flex and Bison libraries. 
Flex is a tool for generating lexical analyzers and it is an open version 
of lex. Bison is a parser generator and it is a GNU version of yacc. 
The generated output of the Swift Fox program is nesC code.
More @ <a href="http://github.com/mszczodrak/swift-fox/wiki">Project Website</a> 
</td>
</tr>


<tr><td>
<center>
<b>Open Testbed Framework</b><br>
<img src="./pics/testbed_user.png" width="200">
</center>
</td><td align="left">
<b>Open Testbed Framework</b>
The Open Testbed Framework (OTF) consists of a set of tools for rapid deployment 
of a Low-Power Wireless Network (LPWN) testbeds. The LPWN is the underlying 
communication architecture for systems monitoring environment, such as 
Wireless Sensor Networks (WSN), and systems interacting with the surrounding 
environment through sensors and actuators, referred to as Cyber-Physical Systems (CPS).
More @ <a href="http://github.com/mszczodrak/otf/wiki">Project Website</a>
</td></tr>


<tr><td>
<center>
<b>Cape Fox</b><br>
<img src="./pics/cape_fox_logo_small.png" width="200">
</center>
</td><td align="left">
<b>Cape Fox</b> is a simulator supporting Fennec Fox platform and Swift Fox
programming language. The simulator allows to simulate the same nesC and
Swift Fox code that is actually running on hardware motes. The three top layers
of the Fennec Fox network stack: Application, Network, and MAC, are executed
exactly as they would run on a real hardware. The lowest radio layer is simulated,
together with wireless data communication for IEEE 802.15.4 radios. More radio
models are currently in implementation.
Cape Fox is based on TOSSIM simulator and its TOSSIM Live extension, through which
it support serial port communication, and by the same real-time data exchange with the
outside (non-simulated) world. Cape Fox differs from TOSSIM by removing simulation
of CSMA and MAC protocols and improving (adding new parameters) simulation of
radio hardware and radio channel. Cape Fox is also <em>message_t</em> free.
More @ <a href="http://smartcity.cs.columbia.edu/capefox/">Project Website</a> 
</td></tr>


<tr>
<td>
<center>
<b>GOALI Project</b><br>
<img src="./pics/goali_idea_small.png" width="200">
</center>
</td>
<td>
<b>GOALI Project</b> is NSF sponsored project researching
methods for network-enabled embedded monitoring and
control for high-performance buildings. Because building occupancy
has high-impact on building's energy consumption (HVAC, Light, etc)
we focus on development of centralized and distributed occupancy 
estimation algorithms and deployment of those algorithms in
buildings with supported cyber infrastructure, such as
wireless networks of sensors and actuators supported with cloud computing.
</td>
</tr>


<tr><td>
<center>
<b>LPWN Benchmarking</b><br>
<img src="./pics/lpwn_benchmarking_logo_small.png" width="200">
</center>
</td><td align="left">
As part of this project we design a set of wireless sensor and actuator
applications to benchmark the performance of lpwn hardware architectures.
</td></tr>
</table>
</p>


<h4>Past Projects</h4>

<p>
<table cellpadding=10 cellspacing=20 frame=box>
<tr><td width="200">
<center>
<b>LPWN-IP</b><br>
<img src="./pics/lpwn_idea_small.png" width="200">
</center>
</td>
<td>
<b>LPWN-IP</b> brings TCP/IP to Fennec Fox platform.
Currently researchers debate how to implement communication for LPWN. 
On one side there are various approaches proposing new communication 
protocols, such as CTP or Flush. On the other side, there are attempts 
of using standard TCP/IP approach with IPv6 addressing. In this project 
we design a network operating in two modes: standard IP and non-standard 
using ad-hoc protocols. 
</td>
</tr>


<tr><td>
<center>
<b>EnHANTs</b><br>
<img src="./pics/enhants.png" width="200">
</center>
</td><td align="left">
<b>Energy-Harvesting Active Networked Tags (EnHANTs)</b>
are small, flexible, and energetically self-reliant devices that can be 
attached to objects that are traditionally not networked (e.g., books, furniture, 
walls, doors, toys, keys, clothing, and produce), thereby providing the 
infrastructure for various novel tracking applications. Examples of these 
applications include locating misplaced items, continuous monitoring of 
objects (items in a store, boxes in transit), and determining locations of 
disaster survivors.
</td></tr>


</table>
</p>
</div>
