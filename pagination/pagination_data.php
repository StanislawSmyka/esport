<?php

include('config.php');

$per_page = 4; 

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
$sql = "SELECT * FROM info ORDER BY created limit $start,$per_page";
$rsd = mysql_query($sql);
?>


	<table width="800px">
		
		<?php
		//Print the contents
		
		while($row = mysql_fetch_array($rsd))
		{
                                                $id=$row['id'];
                                                $title=$row['title'];
                                                $bodytext=$row['bodytext'];

		?>
		<tr><td><?php echo $id; ?></td><td><?php echo $title; ?></td><td><?php echo $bodytext; ?></td></tr>
		<?php
		} //while
		?>
	</table>

