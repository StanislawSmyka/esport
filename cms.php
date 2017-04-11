<?php
//zbiór funkcji dla użytkownika
class simpleCMS {

  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    $q = "SELECT * FROM info ORDER BY created DESC LIMIT 5";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
		$id = stripslashes($a['id']);
		$created = stripslashes($a['created']);
		$count = stripslashes($a['count']);
        $entry_display .= <<<ENTRY_DISPLAY
        <h2>$title</h2>
        <div class="latest-wrapping">$bodytext</div>
        <a href="readmore.php?idp=$id&count=$count">... więcej</a>
        
		<h6><span class="glyphicon glyphicon-calendar"></span>$created</h6>
        
        <span class="glyphicon glyphicon-pencil"></span>
		<span class="badge">$count</span>
        <hr>
ENTRY_DISPLAY;
      }
    } else {
      $entry_display = <<<ENTRY_DISPLAY

    <h2> This Page Is Under Construction </h2>
    <p>
      No entries have been made on this page. 
      Please check back soon
    </p>

ENTRY_DISPLAY;
    }
  return $entry_display;	
  }

  public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
    mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
CREATE TABLE IF NOT EXISTS news (
title		VARCHAR(150),
bodytext	TEXT,
created		VARCHAR(100)
)
MySQL_QUERY;

    return mysql_query($sql);
  }

}

class comments {

  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    $q = "SELECT * FROM info ORDER BY count DESC LIMIT 3";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
		$id = stripslashes($a['id']);
		$created = stripslashes($a['created']);
		$count = stripslashes($a['count']);
        $entry_display .= <<<ENTRY_DISPLAY

        <h3>$title</h2>
        <div class="popular-wrapping">$bodytext</div>
        
    	<a href="readmore.php?idp=$id&count=$count">... więcej</a>
        
		<h6><span class="glyphicon glyphicon-calendar"></span>$created</h6>
        
        <span class="glyphicon glyphicon-pencil"></span>
		<span class="badge">$count</span>
        <hr>

ENTRY_DISPLAY;
      }
    } else {
      $entry_display = <<<ENTRY_DISPLAY

    <h2> This Page Is Under Construction </h2>
    <p>
      No entries have been made on this page. 
      Please check back soon
    </p>

ENTRY_DISPLAY;
    }
  return $entry_display;	
  }

  public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
    mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
CREATE TABLE IF NOT EXISTS news (
title		VARCHAR(150),
bodytext	TEXT,
created		VARCHAR(100)
)
MySQL_QUERY;

    return mysql_query($sql);
  }

}

?>