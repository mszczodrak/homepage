<?php
include("../header.php");
?>

<h2>Implementing Multi-cast Data Replication for Hadoop - Spring 2013</h2>

<p>
The motivation for this project is the need to implement an efficient 
data replication mechanism between nodes of the Hadoop Distributed File
System (HDFS). At present, the Hadoop framework employs a pipeline-based
replication method that performs efficiently on most network configurations
designed for clusters. However, this method adds performance overhead, 
particularly in bandwidth constrained networks that do not inherently
support point-to-point communication. The proposed multi-cast solution 
for data replication is likely to serve as an improvement of data replication
process in Hadoop-based systems.
</p>

<br>
<b>Student: </b>Akhila Athresh<br>
<br>
<b>Documents: </b><a href="final_report.pdf">Final Report: Implementing Multi-cast Data Replication for Hadoop</a><br>
<br>
<b>Date: </b>May 2013<br>
<br>

<?php
include("../../footer.php");
?>
