<?php
error_reporting(E_ERROR);
include("config.php");

if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');}
}else{
	$page_number = 1;
}

$position = (($page_number-1) * $item_per_page);

$results = mysqli_query($db, "SELECT * FROM info ORDER BY id DESC LIMIT $position, $item_per_page");


echo '<ul class="page_result">';

while($row = mysqli_fetch_array($results))
    
{
        $title = stripslashes($row['title']);
        $bodytext = stripslashes($row['bodytext']);
		$id = stripslashes($row['id']);
		$created = stripslashes($row['created']);
		$count = stripslashes($row['count']);
        $entry_display .= <<<ENTRY_DISPLAY
        <h2>$title</h2>
        <div class="popular-wrapping">$bodytext</div>
        
    	<a href="readmore-user.php?idp=$id&count=$count">... więcej</a>
        
		<h6><span class="glyphicon glyphicon-calendar"></span>$created</h6>
        
        <span class="glyphicon glyphicon-comment"></span>
		<span class="badge">$count</span>
        <hr>
ENTRY_DISPLAY;
    }                            
echo $entry_display;
echo '</ul>';
?>

