<?php
include("../header.php");
?>

<h2>Wireless Sensor Applications - Fall 2012</h2>

<p>
In the SmartCity project we are looking into the applications of 
the wireless sensor network technology. We are developing a library 
of applications deployed across the network that utilize various 
types of sensors. The applications retrieve measurements from 
10 different sensors: motion, sound, vibration, IR reflective, 
precision light, acceleration, temperature, thin force, touch, 
and magnetic. The library of applications spans multiple embedded 
programs, from simple ones providing raw sensor measurements up 
to complex programs providing information based on multiple sensor readings. 
</p>

<p>
A simple single-modal applications read sensor samples and report their values. 
A multimodal applications use more than one sensor to provide
estimation about occurrence of an event. For example, one can implement 
a program estimating occupancy in a building using only motion 
detection sensors. Such program will be very inaccurate since 
motion sensors measurements do not differentiate between a single 
person or many. However, one can also combine multiple sensor 
measurements to reach a better occupancy estimation. 
Sensors such as sound, temperature and light can provide additional 
insights about occupancy. 
</p>


<br>
<b>Student: </b>Dhananjay Palshikar<br>
<br>
<b>Documents: </b><a href="final_report.pdf">Final Report: WSNApps</a><br>
<br>
<b>Date: </b>December 2012<br>
<br>

<?php
include("../../footer.php");
?>
