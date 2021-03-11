<link href="register.css"  rel="stylesheet"/>
<table id="table"width="700"height="500"align="center"border="">
<?php
session_start();
 mysql_connect("localhost","root","");
 mysql_select_db("complain");
 $rno=$_SESSION['roll_no'];
 $dob=$_SESSION['dob'];
 $tkn=$_SESSION['randum'];
 $sql_qry="select * from complain1 where roll_no='$rno' and randum='$tkn' and dob='$dob' ";
 $resultset=mysql_query($sql_qry);
 $count=mysql_num_rows($resultset);
 if($count>0)
 {
	  while($row=mysql_fetch_assoc($resultset))
	  {
		  ?>
	    <tr><th colspan="3"width="700" height="90" style="background-color:#a70000;color:white;font-size:200%">Complain Status</th></tr> 
	    <tr><th>NAME <strong>:</strong></th><td width="500"height="70"><?php echo ucfirst($row['name']);?></td><td width="250"height="70"rowspan="2"><?php $s=$row['file_name'];echo'<img src="uploads/'.$s.'"/>'?></td></tr>
		 <tr><th>ROLL-NO <strong>:</strong> </th><td width="500"height="70"colspan="2"><?php echo ($row['roll_no']);?></td></tr>
		 <tr><th>COMPLAIN <strong>:</strong> </th><td width="500"height="70"colspan="2"><?php echo ($row['complain']);?></td></tr>
	 <?php 
	  }  
  }
  else
  {
	  ?>
	 <tr><td colspan="6">no records found</td>
</tr>
  <?php
  }
  ?>  
  </table>