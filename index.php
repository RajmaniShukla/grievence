<?php
 extract($_POST);
if(isset($_POST["submit"])) {
      $errors=array();
	   $file_name=$_FILES['file']['name'];
	  $file_size=$_FILES['file']['size'];
	  $file_tmp=$_FILES['file']['tmp_name'];
	  $file_error=$_FILES['file']['error'];
	  $file_type=$_FILES['file']['type'];
	  mysql_connect("localhost","root","");
	  mysql_select_db("complain");
	  $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      $extensions=array("JPEG","JPG","PNG","GIF","pdf","doc");
	  if((in_array($file_ext,$extensions))===false)
	  {
		$errors[]="extension are not allowed,please choose JPEG or PNG file";
	  }
		 if($file_size>2097152)
		 {
			 $errors[]='file should be exactly 2 Mb';
		}
          if($errors==true)
		  {
			  if(move_uploaded_file($file_tmp,"uploads/".$file_name))
				  echo"success";
		  }	
         else
		 {
	      print_r('errors');
         }	
	 $randum= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@$&"), -10);
	  $sql_qry="insert into complain1(name,roll_no,dob,complain,randum,file_name) values('$name','$roll_no','$dob','$complain','$randum','$file_name')";
	  $result=mysql_query($sql_qry);
      if($result)
	  { ?>
  <html>
  <head>
	   <script>
	    alert("your complain is submitted \n your token no is <?php echo "$randum";?>");
		</script>
		</head>
		</html>
<?php		
	  }
	  else
	  {
		echo "failed";  
	  }
  
  }
  ?>
	  




