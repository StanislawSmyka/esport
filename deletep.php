<?php
//panel do usuwania postów
include('lock-ad.php');
error_reporting(E_ERROR);

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
$myid=mysqli_real_escape_string($db,$_POST['id']); 
$sql="DELETE from info WHERE id='$myid'";
$result = mysqli_query($db, $sql);
$sql1="DELETE from comments WHERE id='$myid'";
$result1 = mysqli_query($db, $sql1);
header("location: deletep.php");
}
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

    <title>Esports - usuwanie postu.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

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
        <div class="row">
			<h1 class="page-header">Usuwanie postów</h1>
            <div class="col-lg-4">
                <form action="" method="post">
				<div class="form-group">
				    <div class="controls">
				        <label>Podaj id:</label>
						<input type="text" name="id" class="form-control"/>
					</div>
				</div>
				<button type="submit" class="btn btn-default" value="submit">Usuń</button>
                </form>
                <br/>
            </div>
        <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading" style="background-color:#555">Lista postów</div> 
            <div class="panel-body">
                <div class="row">
				<div class="col-md-12">
				        <?php
									
                        include_once ('functions.php');
				        $obj = new CMSdelete();
				        $obj->host = 'localhost';
				        $obj->username = 'admin';
				        $obj->password = 'pass';
				        $obj->table = 'db';
				        $obj->connect();
									
				        if ( $_POST )
				            $obj->write($_POST);
									
				            echo $obj->display_public();
									
				        ?>
				        <hr>
                </div>
				</div>
            </div>
        </div>
        </div>
        </div>
    </div>
    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Wymagane pola -->
    <script src="js/required.js"></script>

</body>

</html>