
<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja, założenie że tak
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['nick'];
		
		//Sprawdzenie długości nicku
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		//Bot or not?
		$sekret = "6LcCtRsUAAAAACFi7bCb4g6qDBAedafHC_64nJ43";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "polaczenie.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Wszystkie testy zaliczone, dodajemy uzytkownika do bazy
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: online.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">

<!--head-->
<head>
    <meta charset="utf-8">
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aionet.pl">
    <meta name="author" content="Jarosław Janczewski">
    <title>Aionet - Wszystko w jednym miejscu</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
	
	<!--IE Support-->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif]-->
	<!--/IE Support-->
	
	<!--page icon-->
    <link rel="shortcut icon" href="images/aionet.ico">
	<!--/page icon-->
</head>
<!--/head-->

<!--body-->
<body>

<!--#header-->
<header id="header"> 
    <div class="container">
        <div class="container-inner">
			<!--logo-->
			<div class="logo pull-left">
                <a class="pull-left logo" href="index.php">
                    <h1><img class="img-responsive" src="images/aionet-black.png" alt="logo"></h1>
                </a>
			</div>
			<!--/logo-->
			
			<ul>			
			<!--account-->
            <li class="account pull-right">
                <a href="zaloguj.php" class="nav-button"><i class="glyphicon glyphicon-log-in"></i> Zaloguj się</a> 
            </li>
			<!--/account-->
			</ul>
        </div>
    </div>
</header>
<!--/#header-->

<!--section-->
<section id="welcome-page">

<!--#registration-->
    <div id="home-page" class="item">
        <div class="container">
			<div class="vertical-middle">
            <div class="vertical-middle-inner">
                <div class="text-center">
                    <h2 class="page-header">Zarejestruj się</h2>
                </div>	
                    <form class="form-horizontal" method="post">
						<div class="form-group form-status">
                            <div class="col-sm-offset-2 col-sm-6">
								<div class="form-status-content">
								</div>
                            </div>
						</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">                                        
										<input type="text" name="nick" maxlength="30" class="form-control input-lg" placeholder="Nickname (od 3 do 20 znaków)" required="required" value="<?php
											if (isset($_SESSION['fr_nick']))
												{
													echo $_SESSION['fr_nick'];
													unset($_SESSION['fr_nick']);
												}
											?>">
											<?php
												if (isset($_SESSION['e_nick']))
													{
														echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
														unset($_SESSION['e_nick']);
													}
											?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<input type="email" name="email" maxlength="30" class="form-control input-lg" placeholder="Email" required="required" value="<?php
											if (isset($_SESSION['fr_email']))
												{
													echo $_SESSION['fr_email'];
													unset($_SESSION['fr_email']);
												}
											?>">
											<?php
												if (isset($_SESSION['e_email']))
													{
														echo '<div class="error">'.$_SESSION['e_email'].'</div>';
														unset($_SESSION['e_email']);
													}
											?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<input type="password" name="haslo1" maxlength="20" class="form-control input-lg" placeholder="Twoje hasło (od 8 do 20 znaków)" required="required" value="<?php
											if (isset($_SESSION['fr_haslo1']))
												{
													echo $_SESSION['fr_haslo1'];
													unset($_SESSION['fr_haslo1']);
												}
											?>">
											<?php
											if (isset($_SESSION['e_haslo']))
												{
													echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
													unset($_SESSION['e_haslo']);
												}
											?>		
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<input type="password" name="haslo2" maxlength="20" class="form-control input-lg" placeholder="Powtórz hasło" required="required" value="<?php
											if (isset($_SESSION['fr_haslo2']))
												{
													echo $_SESSION['fr_haslo2'];
													unset($_SESSION['fr_haslo2']);
												}
											?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">		
										<div class="g-recaptcha" data-sitekey="6LcCtRsUAAAAAPJZ3JvQFCBBbhI57YfX3NeYgNrC">
										</div>
										<?php
										if (isset($_SESSION['e_bot']))
											{
												echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
												unset($_SESSION['e_bot']);
											}
										?>
									</div>
								</div>
								<div class="form-group">
									<div class="radio">
										<div class="col-sm-offset-3 col-sm-6">
											<label>
												<input type="radio" name="regulamin" value="<?php
													if (isset($_SESSION['fr_regulamin']))
														{
															echo "checked";
															unset($_SESSION['fr_regulamin']);
														}
													?>"><p>Akceptuję regulamin</p>
											</label>
													<?php
													if (isset($_SESSION['e_regulamin']))
														{
															echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
															unset($_SESSION['e_regulamin']);
														}
													?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
										<button type="submit" class="btn btn-lg btn-transparent">Zarejestruj się</button>
									</div>
								</div>
                    </form>

            </div>
            </div>

        </div>                
    </div>
<!--/registration-->

</section>
<!--/section-->

<!--#footer-->
<footer id="footer" class="text-center">
    Designed by <a title="Aionet.pl author">Jarosław Janczewski</a>
</footer>
<!-- target="_blank" -->
<!--/#footer-->

<!--javascript-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>  
<script type="text/javascript" src="js/main.js"></script>
<!--/javascript-->
	
</body>
<!--/body-->

</html>
<!--/html-->

(cc) 2006-2012 ForgottenLabs.com

strona główna / najnowsze / API / regulamin / kontakt
