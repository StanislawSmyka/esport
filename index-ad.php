<?php
error_reporting(E_ERROR);
include('lock-ad.php');

$results = mysqli_query($db,"SELECT COUNT(*) FROM info");
$get_total_rows = mysqli_fetch_array($results); 


$pages = ceil($get_total_rows[0]/$item_per_page);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Strona esportowa">
    <meta name="author" content="Stanisław Smyka Tomasz Matuszczak">

    <title>Esports - wszystkie rozgrywki w jednym miejscu.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Wymagane pola -->
    <script src="js/required.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#results").load("pagination-ad.php");
            $(".pagination").bootpag({
                total: <?php echo $pages; ?>,
                page: 1,
                maxVisible: 5 
            }).on("page", function(e, num){
                e.preventDefault();
                $("#results").load("pagination-ad.php", {'page':num});
            });
        });
    </script>

</head>

<body>

    <!-- nawigacja -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- mobilny wyglad -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index-ad.php">
                    <img src="images/esports.jpeg" alt="">
                </a>
            </div>
             <!-- nav linki w menu -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">League of Legends<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="leagueoflegends_live-ad.php">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="http://euw.leagueoflegends.com/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Hearthstone<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="hearthstone_live-ad.php">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="http://eu.battle.net/hearthstone/pl/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">CS:GO<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="csgo_live-ad.php">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="blog.counter-strike.net/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Heroes of the Storm<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="hots_live-ad.php">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="http://eu.battle.net/heroes/pl/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
                    <li class="dropdown">
                        <a href="cal-ad.php">Kalendarz rozgrywek</a>
					</li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <li>
						<form class="navbar-form" action="./search-ad.php" method="get">
							<div class="input-group">
								<input type="text" size="10" class="form-control" name="search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit" value="Szukaj">Szukaj</button>
								</div>
							</div>
						</form>
					</li>
					<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><?php echo $login_session; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" a href="panel-ad.php">Opcje</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" a href="logout.php">Wyloguj</a></li>
							</ul>
					</li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- tresc strony -->
    <div class="container">
		<h1 class="page-header">Wiadomości</h1>
        <div class="no-gutter row">
            <!-- poczatek nadchodzacych wydarzen -->
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="background-color:#334d63">Nadchodzące wydarzenia</div>
                    <div class="col-md-12">
                        <div class="row" style="background-color:#fff">
						<?php
		$results = mysqli_query($db, "SELECT * FROM links");
					while($row = mysqli_fetch_array($results))
					{
					$linklol = stripslashes($row['link_lol']);
					$linkhs = stripslashes($row['link_hs']);
					$linkcsgo = stripslashes($row['link_csgo']);
					$linkhots = stripslashes($row['link_hots']);
						      $slide = <<<ENTRY_DISPLAY
                            <ul class="nav nav-pills" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#lol" role="tab" data-toggle="tab">League of Legends</a>
                                </li>
                                <li role="presentation">
                                    <a href="#hs" role="tab" data-toggle="tab">Hearthstone</a>
                                </li>
                                <li role="presentation">
                                    <a href="#csgo" role="tab" data-toggle="tab">CS:GO</a>
                                </li>
                                <li role="presentation">
                                    <a href="#hots" role="tab" data-toggle="tab">Heroes of the Storm</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane in active" id="lol">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" allowfullscreen="allowfullscreen" src="$linklol"></iframe>
                                    </div>
                                </div>
                                <div class="tab-pane" id="hs">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" allowfullscreen="allowfullscreen" src="$linkhs"></iframe>
                                    </div>
                                </div>
                                <div class="tab-pane" id="csgo">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" allowfullscreen="allowfullscreen" src="$linkcsgo"></iframe>
                                    </div>
                                </div>
                                <div class="tab-pane" id="hots">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" allowfullscreen="allowfullscreen" src="$linkhots"></iframe>
                                    </div>
                                </div>
                            </div>
ENTRY_DISPLAY;
					}
echo $slide;
			?>
                        </div>
                    </div>
                </div>
            </div><!-- koniec nadchodzacych wydarzen -->
			<!-- poczatek najnowszych -->
      		<div class="col-md-9">
				<div class="panel">
					<div class="panel-heading" style="background-color:#555">Najnowsze wiadomości</div> 
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div id="results"></div>
                                    <div class="pagination"></div>
								</div>
							</div>
						</div>
               </div><!--/panel-->
      		</div><!--koniec najnowszych-->
      		
      		<!-- poczatek najpopularniejszych-->
      		<div class="col-md-3">
            	<div class="panel">
					<div class="panel-heading" style="background-color:#111">Najpopularniejsze wiadomości</div>   
						<div class="panel-body" style="background-color:#E0E0E0">
							<div class="media">
								<div class="media-body">
									<?php
									include_once ('functions.php');
									 $obj = new commentsadmin();

									  $obj->host = 'localhost';
									  $obj->username = 'test';
									  $obj->password = 'pass';
									  $obj->table = 'db';
									  $obj->connect();
									
									  if ( $_POST )
										$obj->write($_POST);
									
									  echo $obj->display_public();
									
									?>
								</div>
							</div>
						</div><!--/panel-body-->
                </div><!--/panel-->
            </div><!--koniec najpopularniejszych-->
      	</div> 
  	</div>
    <!-- /.container -->

</body>

</html>