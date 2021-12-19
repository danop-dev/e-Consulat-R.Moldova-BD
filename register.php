<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Servicii Consulare R.Moldova">
    <meta name="keywords"
        content="e-consulat, Servicii, Servicii Consulare, Consulat, Servicii Consulare R. Moldova, Servicii Online">
    <meta name="author" content="Oprea Danu">
    <link rel="icon" href="img/tab-icon.ico">
    <title>e-Consulatul R. Moldova</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header id="header">
        <nav class="nav-bar">
            <div class="container">
                <ul class="nav-bar__ul">
                    <li class="nav-bar__item">
                        <ul class="nav-bar__sub-ul">
                            <li class="nav-bar__sub-item">
                                <a href="index.html" class="nav-bar__sub-link"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="nav-bar__sub-item">
                                <a href="contact.html" class="nav-bar__sub-link"><i class="fas fa-envelope"></i></a>
                            </li>
                            <li class="nav-bar__sub-item">
                                <a href="#" class="nav-bar__sub-link"><i class="fas fa-wifi"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-bar__item">
                        <form class="nav-search">
                            <input type="search" name="search" class="search-input"
                                placeholder="Cautarea serviciul consular">
                            <button type="submit" class="btn-search">Search</button>
                        </form>
                    </li>
                    <li class="nav-bar__item">
                        <ul class="nav-bar__sub-ul">
                            <li class="nav-bar__sub-item">
                                <a href="howWork.html" class="nav-bar__sub-link"><i
                                        class="fas fa-question-circle">Gidare</i></a>
                            </li>
                            <li class="nav-bar__sub-item">
                                <a href="#" class="nav-bar__sub-link"><i class="fas fa-user">Inregistrare</i></a>
                            </li>
                            <li class="nav-bar__sub-item">
                                <a href="#" class="nav-bar__sub-link"><i class="fas fa-sign-in-alt">Logare</i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div> <!-- container close -->
        </nav> <!-- nav-bar close -->
    </header> <!-- #header close -->

    <section class="section" id="banner">
        <div class="container">
            <div id="head-logo">
                <a class="head-logo__link" href="index.html">
                    <img class="main-logo" src="img/MAE Moldova.png"
                        alt="Ministerul Afacerilor Externe şi Integrării Europene al Republicii Moldova">
                    <div>Ministerul Afacerilor Externe şi Integrării Europene al Republicii Moldova <br><br> Înregistrare în sistem</div>
                </a>
            </div>
        </div> <!-- container close -->
    </section> <!-- banner close -->

    <section class="section" id="register">
        <div class="container">
            <div class="box_wrapper">
                <div class="box_wrapper-title"> Cont nou <br>
                    <hr>
                </div>
                <div class="input_wrapper">
                    <div class="input__col">
                        <form id="input-form" action="#" method="POST">
                            <div class="input-line">
                                <label class="label-info" for="register-email">Adresa de e-mail</label>
                                <input class="data-inp" type="email" name="register-email" required>
                            </div>
                            <div class="input-line">
                                <label class="label-info" for="register-fname">Nume</label>
                                <input class="data-inp" type="text" name="register-fname" required>
                            </div>
                            <div class="input-line">
                                <label class="label-info" for="register-lname">Prenume</label>
                                <input class="data-inp" type="password" name="register-lname" required>
                            </div>
                            <div class="input-line">
                                <label class="label-info" for="register-password">Parolă</label>
                                <input class="data-inp" type="password" name="register-password" required>
                            </div>
                            <div class="input-line">
                                <label class="label-info" for="register-passwordCheck">Repetă Parola</label>
                                <input class="data-inp" type="password" name="register-passwordCheck" required>
                            </div>
                            <div class="input-line">
                                <label class="label-info">Cetățenie</label>
                                <div class="checkbox--line">
                                    <input type="radio" id="nation-ro" name="nation">
                                    <label for="nation-ro">R.Moldova</label>
                                </div>
                                <div class="checkbox--line">
                                    <input type="radio" id="nation-all" name="nation">
                                    <label for="nation-all">Altă cetățenie</label>
                                </div>
                                
                                
                            </div>
                            <input class="submit-data" type="submit" name="register-submit" value="Creeaza cont nou">
                        </form>
                    </div>
                    <div class="input__col">
                        <div class="panel-box">
                            <div class="panel__title">CONT EXISTENT</div>
                            <div class="panel__text">
                                <p>Vă puteţi autentifica într-un cont existent folosind butonul de mai jos.</p>
                            </div>
                            <a href="login.php" class="panel__btn">Autentificare</a>
                        </div>

                    </div>
                </div> <!-- input_wrapper close  --> 
            </div> <!-- contact__wrapper close -->
        </div> <!-- container close -->
    </section> <!-- register close -->

    <section class="section" id="bottom_nav">
        <div class="container">
            <ul class="service__nav-ul">
                <li class="service__nav-item">
                    <a class="service__nav-link" href="index.html">Servicii Consulare</a>
                </li>
                <li class="service__nav-item">
                    <a class="service__nav-link" href="howWork.html">Cum functioneaza sistemul</a>
                </li>
                <li class="service__nav-item">
                    <a class="service__nav-link" href="contact.html">Centrul de contact şi suport</a>
                </li>
                <li class="service__nav-item">
                    <a class="service__nav-link" href="#header">Condiţii de utilizare / Condiţii legale</a>
                </li>
            </ul>
        </div> <!-- container close-->
    </section> <!-- bottom_nav close-->

    <section class="section" id="about">
        <div class="container">
            <div class="about__wrapper">
                <div class="about__col about--left">
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="about_col-text">Despre Proiect</div>
                </div>
                <div class="about__col about--right">
                    <p>
                        Acest sistem informatic modern va permite cetăţenilor R.Moldova să acceseze informaţii consulare
                        de calitate într-un mod eficient şi transparent, beneficiind de un confort crescut datorită
                        posibilităţii de a interacţiona online cu personalul Ministerului Afacerilor Externe, de a
                        trimite solicitări prin mijloace electronice fără a mai fi nevoiţi să se deplaseze in mod
                        repetat la ghişeu, eliminându-se astfel barierele birocratice şi cele geografice.
                    </p>
                </div>
            </div>
        </div>
    </section> <!-- about close -->

    <footer class="footer">
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__item--max">
                    <div class="footer__item">
                        <h3 class="footer__title --title">Despre noi</h3>
                        <div class="footer__about-text">
                            <img class="main-logo footer--logo" src="img/MAE Moldova.png"
                                alt="Ministerul Afacerilor Externe şi Integrării Europene RM">
                            <div>
                                <p>Ministerul Afacerilor Externe şi Integrării Europene al Republicii Moldova</p>
                                <p>Copyright © 2021.</p>
                                <p>All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__item--min">
                    <div class="footer__item">
                        <h3 class="footer__title --title">Contacte</h3>
                        <ul class="footer__list-link">
                            <li class="footer-link">
                                <p>Adresa: MD-2012, mun. Chișinău,</p>
                            </li>
                            <li class="footer-link">
                                <p>str. 31 August 1989, 80 </p>
                            </li>
                            <li class="footer-link">
                                <p>Tel: (+373 22) 57-83-04 (Secretariat)</p>
                            </li>
                            <li class="footer-link">
                                <p>Fax: (+373 22) 23-23-02</p>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <h3 class="footer__title --title">Info</h3>
                        <ul class="footer__list-link">
                            <li class="footer-link">
                                <a href="https://www.presedinte.md/" target="_blank">Președinția Republicii Moldova</a>
                            </li>
                            <li class="footer-link">
                                <a href="https://multimedia.parlament.md/" target="_blank">Parlamentul Republicii
                                    Moldova</a>
                            </li>
                            <li class="footer-link">
                                <a href="https://gov.md/ro" target="_blank">Guvernul Republicii Moldova</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <h3 class="footer__title --title">Social Media</h3>
                        <ul class="footer__list-link">
                            <li class="footer-link">
                                <a href="https://www.facebook.com/mfa.gov.md" target="_blank"><i
                                        class="fab fa-facebook-f">Facebook</i></a>
                            </li>
                            <li class="footer-link">
                                <a href="https://www.linkedin.com/company/moldovamfa/?trk=ppro_cprof&originalSubdomain=ro"
                                    target="_blank"><i class="fab fa-linkedin-in">Linkedin</i></a>
                            </li>
                            <li class="footer-link">
                                <a href="https://twitter.com/moldovamfa" target="_blank"><i
                                        class="fab fa-twitter">Twitter</i></a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- footer__item--min close -->

            </div> <!-- footer__wrapper close -->
        </div> <!-- container close -->
        <div id="footer-flag">
            <div class="flag-color flag--blue"></div>
            <div class="flag-color flag--yellow"></div>
            <div class="flag-color flag--red"></div>
        </div> <!-- flag close -->
    </footer> <!-- footer-flag close -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>