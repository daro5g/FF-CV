<?php

try {
    $pdo = new PDO('mysql:host=connect.bluequeen.tk;dbname=db_daro1', 'db_daro', 'daro1993', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT * FROM dane');

    foreach ($stmt as $row) {
        $imie = $row['imie'];
        $nazwisko = $row['nazwisko'];
        $miejscowosc = $row['miejscowosc'];
        $dataur = $row['dataur'];
        $wyksztalcenie = $row['wyksztalcenie'];
        $numer = $row['numer'];
        $opis = $row['opis'];
    }

    $stmt = $pdo->query('SELECT * FROM timeline WHERE id="1" LIMIT 1'); //pobranie pierwszego
    foreach ($stmt as $row) {

        $nazwa1 = $row['Nazwa'];
        $krotkiopis1 = $row['krotkiopis'];
        $lata1 = $row['lata'];       
    }

    $stmt = $pdo->query('SELECT * FROM timeline WHERE id="2" LIMIT 1'); //pobranie pierwszego
    foreach ($stmt as $row) {

        $nazwa2 = $row['Nazwa'];
        $krotkiopis2 = $row['krotkiopis'];
        $lata2 = $row['lata'];
    }
    $stmt->closeCursor();
    
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}

// losowy obrazek 
$files = glob('img/portfolio/*.{jpg,png,gif}', GLOB_BRACE);
shuffle($files); // pomieszanie indeksów

function checkMail($checkmail)
{
    if (filter_var($checkmail, FILTER_VALIDATE_EMAIL))
    {
        if (checkdnsrr(array_pop(explode("@", $checkmail)), "MX"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Strona zaprojektowana w celu zapiczenia przedmiotu">
        <meta name="author" content="Błażej Darowski">

        <title>Błażej Darowski</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><?php echo $imie . ' ' . $nazwisko ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="#about">O mnie</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio">Portfolio</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Kontakt</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1>Witaj</h1>
                    <hr>
                    <p></p>
                    <a href="#about" class="btn btn-primary btn-xl page-scroll">Start</a>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <p class="text-faded"><?php echo $opis ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">O mnie</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-diamond wow bounceIn text-primary" ></i>
                            <h3>Dane osobowe</h3>
                            <p class="text-muted" >Imię: <?php echo $imie ?></p>
                            <p class="text-muted" >Naziwisko: <?php echo $nazwisko ?></p>
                            <p class="text-muted" >Data urodzenia:  <?php echo $dataur ?></p>
							<p class="text-muted" >Miejscowosc: <?php echo $miejscowosc ?></p>
                            <p class="text-muted" >Wykształcenie: <?php echo $wyksztalcenie ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                            <h3>Umiejętności</h3>
                            <li class="text-muted">Wysoki poziom obsługi komputera</li>
                            <li class="text-muted">Posługiwanie się jezykiem bazodanowym SQL</li>
                            <li class="text-muted">Znajomość pakietu MS Office</li>
                            <li class="text-muted">Prawo jazdy kat. A2 i  B</li>
                            <li class="text-muted">Uprawnienia nurka OWD</li>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                            <h3>Wykształcenie</h3>
                            <li class="text-muted"><?php echo $lata2 . ': ' . $nazwa2 . '<br>' . $krotkiopis2 ?></li>
							<br>
                            <li class="text-muted"><?php echo $lata1 . ': ' . $nazwa1 . '<br>' . $krotkiopis1 ?></li>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>Zainteresowania<h3>
                                    <p class="text-muted" >Nurkowanie</p>
                                    <p class="text-muted" >Gry komputerowe</p>
                                    <p class="text-muted" >Sport</p>
                                    <p class="text-muted" >Filmy, Seriale, Anime</p>	
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </section>
                                    <section class="no-padding" id="portfolio">
                                        <div class="container-fluid">
                                            <div class="row no-gutter">
                                                <?php
                                                for ($i = 0; $i < 6; $i++)
                                                {
                                                    ?>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <a href="#" class="portfolio-box">
                                                            <img src="<?php echo $files[$i]; ?>" class="img-responsive" height="350px" width="650px" alt="">
                                                            <div class="portfolio-box-caption">
                                                                <div class="portfolio-box-caption-content">
                                                                    <div class="project-category text-faded">
                                                                        Category
                                                                    </div>
                                                                    <div class="project-name">
                                                                        Project Name
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </section>
                                    <?php
//wysylanie maila
//filtruje dane użytkownika
                                    if (!isset($_POST['submit']))
                                    { // nie ma wyslanego formularza, wyswietlanie formularza
                                        ?>
                                        <section id="contact">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-8 col-lg-offset-2 text-center">
                                                        <h2 class="section-heading" >Kontakt</h2>
                                                        <hr class="primary">
                                                        <form action="index.php" method="post">
                                                            <fieldset>
                                                                <p><input size="41" type="text" placeholder="Imię Nazwisko" id="fromName" name="fromName" pattern="[A-Z]{1}[a-z]+[ ][A-Z]{1}[a-z-]+" required /></p>
                                                                <p><input size="41" type="text" placeholder="Email" id="fromEmail" name="fromEmail"  required /></p>
                                                                <p> <textarea cols="40" rows="5" wrap="hard" id="fromText" name="fromText" placeholder="Treść wiadomości" ></textarea></p>
                                                                <button type="submit" class="btn btn-primary btn-xl page-scroll" id="submit" name="submit">Wyślij</button>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                    <div class="col-lg-4 col-lg-offset-2 text-center">
                                                        <i class="fa fa-phone fa-3x wow bounceIn"></i>
                                                        <p><?php echo $numer ?></p>
                                                    </div>
                                                    <div class="col-lg-4 text-center">
                                                        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                                                        <p><a href="mailto:darowskib@gmail.com">darowskib@gmail.com</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <?php
                                    }
                                    else
                                    { // sa dane, wyswietlanie wyniku
//twoje dane
                                        $email = 'darowskib@gmail.com';
//dane z formularza
                                        $fromName = $_POST['fromName'];
                                        $fromEmail = $_POST['fromEmail'];
                                        $fromText = $_POST['fromText'];

                                        if (!empty($fromName) && !empty($fromEmail) && !empty($fromText))
                                        {

//--- początek funkcji weryfikującej adres e-mail ---

                                            if (checkMail($fromEmail))
                                            {
                                                //dodatkowe informacje: ip i host użytkownika
                                                $ip = $_SERVER['REMOTE_ADDR'];
                                                $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                                //tworzymy szkielet wiadomości
                                                //treść wiadomości
                                                $mailText = "Treść wiadomości:{$fromText}: {$fromName}, {$fromEmail} ($ip, $host)";

                                                //adres zwrotny
                                                $mailHeader = "From: {$fromName} <{$fromEmail}>";

                                                //funkcja odpowiedzialna za wysłanie e-maila
                                                @mail($email, 'Formularz kontaktowy', $mailText, $mailHeader) or die('Błąd: wiadomość nie została wysłana');

                                                //komunikat o poprawnym wysłaniu wiadomości
                                            }
                                            else
                                            {
                                                echo 'Adres e-mail jest niepoprawny';
                                            }
                                        }
                                        else
                                        {
                                            //komunikat w przypadku nie powodzenia
                                            echo 'Wypełnij wszystkie pola formularza';
                                        }

//--- koniec formularza ---
                                    }
                                    ?>
                                    <!-- jQuery -->
                                    <script src="js/jquery.js"></script>

                                    <!-- Bootstrap Core JavaScript -->
                                    <script src="js/bootstrap.min.js"></script>

                                    <!-- Plugin JavaScript -->
                                    <script src="js/jquery.easing.min.js"></script>
                                    <script src="js/jquery.fittext.js"></script>
                                    <script src="js/wow.min.js"></script>

                                    <!-- Custom Theme JavaScript -->
                                    <script src="js/creative.js"></script>

                                    </body>

                                    </html>
