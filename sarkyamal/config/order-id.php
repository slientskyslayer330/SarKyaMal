<?php  
	function autoid($table, $col, $prefix, $year, $month)
	{
		include("connect.php");
		$sql="SELECT ".$col." FROM ".$table." ORDER BY "."$col"." DESC";

		$select = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($select);
		$data = mysqli_fetch_array($select);

		if ($count<1) {
			return $prefix.$year.$month."001";			
		}

		else{
			$lastrow=$data[$col];
			$lastyear=substr($lastrow, 1, 2); //substr(string, start, length)
			$lastmonth=substr($lastrow, 3, 2);
			
			if ($lastyear==$year && $lastmonth==$month) {

				$lastid=substr($lastrow, 5);
				$num=(int)$lastid; 
				$num++;
				return $prefix.$year.$month.str_pad($num, 3, "0", STR_PAD_LEFT); //str_pad(string,length,pad_string,pad_type)	
			}
			else {
				return $prefix.$year.$month."001";
			}			
		}
	}
?>
