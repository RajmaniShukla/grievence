<?php
extract($_POST);
 if(isset($search))
 {
	 if(!empty($randum)&&!empty($dob)&&!empty($roll_no))
	 {
	 mysql_connect("localhost","root","");
     mysql_select_db("complain");
	 require_once"function.php";
     $sql_chk ="select*from complain1 where roll_no='".format_string($roll_no)."' and randum='".format_string($randum)."' and dob='".format_string($dob)."'";
	 $result= mysql_query($sql_chk);
	 $count=mysql_num_rows($result);
	  if($count==1)
	  {
	  session_start();
	  $row=mysql_fetch_assoc($result);
	  $_SESSION['randum']=$row['randum'];
	  $_SESSION['dob']=$row['dob'];
	  $_SESSION['roll_no']=$row['roll_no'];
	  header('location:display.php');
	  }
	  else
	  
		  echo "invalid login details";
	 }
	 }
	?> 