<?php
function autoID($table, $col, $prefix, $digits)
{
	include("connect.php");
	$sql="SELECT ".$col." FROM ".$table." ORDER BY ".$col." DESC";	
	
	$select = mysqli_query($conn, $sql); if($select) echo "run";
	$count=mysqli_num_rows($select);
	$data = mysqli_fetch_array($select);		
	
	if ($count<1)
	{		
		return $prefix.str_pad(1, $digits, "0", STR_PAD_LEFT);
	}
	else
	{
      $lastrow=$data[$col];
      $lastid=substr($lastrow, 1);
		$num=(int)$lastid;
		$num++;
      $newid=$prefix.str_pad((int) $num, $digits, "0", STR_PAD_LEFT);	
		return $newid;		
	}
}
?>