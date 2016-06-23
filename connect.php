<?php
				$host="localhost";
				$username= "root";
				$password="";
				$db= "zavrsni";

				mysql_connect($host,$username,$password) or die(mysql_error());
				mysql_select_db($db);
				mysql_query("set names utf8");
?>