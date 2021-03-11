<?php
 function format_string($pstr)
 {
	 $rstr=stripcslashes(stripslashes(strip_tags(trim($pstr))));
	 return $rstr;
 }
 ?>