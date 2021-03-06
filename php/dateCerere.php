<?php
include 'conectbd.php';

session_start();
if(isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}

$requestView = $_POST['requestView'];

$conbd = connect();
$id = " SELECT id_identitate, id_nastere, id_domiciliu, id_resedinta, id_parinti, id_copii, id_taxa FROM cereri WHERE cod_cerere = '$requestDelete' ";
$resultID = mysqli_query($conbd, $id);
          
while($row = mysqli_fetch_array($resultID)) {

    $idIdentitate = $row['id_identitate'];
    $id_nastere = $row['id_nastere'];
    $id_domiciliu = $row['id_domiciliu'];
    $id_resedinta = $row['id_resedinta'];
    $id_parinti = $row['id_parinti'];
    $id_copii = $row['id_copii'];
    $id_taxa = $row['id_taxa'];
}

mysqli_close($conbd);

?>
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
    <link rel="icon" href="../img/tab-icon.ico">
    <title>e-Consulatul R. Moldova</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header id="header">
        <nav class="nav-bar">
            <div class="container">
                <ul class="nav-bar__ul">
                    <li class="nav-bar__item">
                        <ul class="nav-bar__sub-ul">
                            <li class="nav-bar__sub-item">
                                <a href="dosar.php" class="nav-bar__sub-link"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="nav-bar__sub-item">
                                <a href="../contact.html" class="nav-bar__sub-link"><i class="fas fa-envelope"></i></a>
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
                                <a href="../howWork.html" class="nav-bar__sub-link"><i
                                        class="fas fa-question-circle">Ghidare</i></a>
                            </li>
                            <li class="nav-bar__sub-item">
                                <div class="hello">
                                    <?php
                                        echo "Bine ai venit! <br>". "<b>". $email. "</b>";
                                    ?>
                                </div>

                            </li>
                            <li class="nav-bar__sub-item">
                                <a href="../index.html" class="nav-bar__sub-link"><i
                                        class="fas fa-sign-in-alt">Iesire</i></a>
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
                <a class="head-logo__link" href="dosar.php">
                    <img class="main-logo" src="../img/MAE Moldova.png"
                        alt="Ministerul Afacerilor Externe ??i Integr??rii Europene al Republicii Moldova">
                    <div>Ministerul Afacerilor Externe ??i Integr??rii Europene al Republicii Moldova <br><br> Cererile
                        mele</div>
                </a>
            </div>
        </div> <!-- container close -->
    </section> <!-- banner close -->

    <section class="section" id="doc">
        <div class="container">
            <div class="box_wrapper" style="background-color: #F5F5F5;">
                <div class="box_wrapper-title"> Cererile mele <br>
                    <hr>
                </div>
                <div class="alert-info"></div>
                <form action="#" method="POST">
                    
                <div class="input_row">
                        <div class="input_col">
                            <div class="input_col__title">Arondare misiune diplomatic??</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col">
                                    <div class="row">
                                        <input class="input_wraper__data hasDatepicker" name="officeConsul" id="officeConsul" type="text"
                                            placeholder="Oficiul consulat" list="city-li">
                                            <datalist id="city-li">
                                                <option>Abu Dhabi</option>
                                                <option>Abuja</option>
                                                <option>Addis Abeba</option>
                                                <option>Alger</option>
                                                <option>Almeria</option>
                                                <option>Amman</option>
                                                <option>Ankara</option>
                                                <option>Ashgabat</option>
                                                <option>Nur-Sultan</option>
                                                <option>Atena</option>
                                                <option>Bagdad</option>
                                                <option>Baku</option>
                                                <option>B??l??i</option>
                                                <option>Bangkok</option>
                                                <option>Barcelona</option>
                                                <option>Beijing</option>
                                                <option>Beirut</option>
                                                <option>Belgrad</option>
                                                <option>Berlin</option>
                                                <option>Berna</option>
                                                <option>Bilbao</option>
                                                <option>Bogota</option>
                                                <option>Bologna</option>
                                                <option>Bonn</option>
                                                <option>Brasilia</option>
                                                <option>Bratislava</option>
                                                <option>Bruxelles</option>
                                                <option>Budapesta</option>
                                                <option>Buenos Aires</option>
                                                <option>Cahul</option>
                                                <option>Cairo</option>
                                                <option>Canberra</option>
                                                <option>Cape Town</option>
                                                <option>Caracas</option>
                                                <option>Castell??n de la Plana</option>
                                                <option>Catania</option>
                                                <option>Cern??u??i</option>
                                                <option>Chicago</option>
                                                <option>Chi??in??u</option>
                                                <option>Ciudad de Mexico</option>
                                                <option>Ciudad Real</option>
                                                <option>Colombo</option>
                                                <option>Copenhaga</option>
                                                <option>Dakar</option>
                                                <option>Damasc</option>
                                                <option>Doha</option>
                                                <option>Dubai</option>
                                                <option>Dublin</option>
                                                <option>Edinburgh</option>
                                                <option>Erbil</option>
                                                <option>Erevan</option>
                                                <option>Gyula</option>
                                                <option>Haga</option>
                                                <option>Hanoi</option>
                                                <option>Harare</option>
                                                <option>Havana</option>
                                                <option>Helsinki</option>
                                                <option>Hong Kong</option>
                                                <option>Islamabad</option>
                                                <option>Istanbul</option>
                                                <option>Izmir</option>
                                                <option>Jakarta</option>

                                                <option>Kabul</option>
                                                <option>Khartoum</option>
                                                <option>Kiev</option>
                                                <option>Kuala Lumpur</option>
                                                <option>Kuweit</option>
                                                <option>Lima</option>
                                                <option>Lisabona</option>
                                                <option>Ljubljana</option>
                                                <option>Londra</option>
                                                <option>Los Angeles</option>
                                                <option>Luanda</option>
                                                <option>Luxemburg</option>


                                                <option>Lyon</option>
                                                <option>Madrid</option>
                                                <option>Manila</option>
                                                <option>Marsilia</option>
                                                <option>Milano</option>
                                                <option>Minsk</option>
                                                <option>Montevideo</option>
                                                <option>Montreal</option>
                                                <option>Moscova</option>
                                                <option>M??nchen</option>
                                                <option>Nairobi</option>
                                                <option>New Delhi</option>

                                                <option>New York</option>
                                                <option>Nicosia</option>
                                                <option>Odesa</option>
                                                <option>Oslo</option>
                                                <option>Ottawa</option>
                                                <option>Paris</option>
                                                <option>Podgori??a</option>
                                                <option>Praga</option>
                                                <option>Pretoria</option>
                                                <option>Rabat</option>
                                                <option>Rio de Janeiro</option>
                                                <option>Riad</option>

                                                <option>Roma</option>
                                                <option>Rostov pe Don</option>
                                                <option>Salonic</option>
                                                <option>Sankt Petersburg</option>
                                                <option>Santiago de Chile</option>
                                                <option>Sarajevo</option>
                                                <option>Seul</option>
                                                <option>Sevilla</option>
                                                <option>Shanghai</option>
                                                <option>Singapore</option>
                                                <option>Skopje</option>
                                                <option>Sofia</option>

                                                <option>Stockholm</option>
                                                <option>Strasbourg</option>
                                                <option>Sydney</option>
                                                <option>Szeged</option>
                                                <option>Taskent</option>
                                                <option>Tbilisi</option>
                                                <option>Teheran</option>
                                                <option>Tel Aviv</option>
                                                <option>Tirana</option>
                                                <option>Tokyo</option>
                                                <option>Torino</option>
                                                <option>Toronto</option>
                                                <option>Trieste</option>
                                                <option>Tripoli</option>
                                                <option>Tunis</option>
                                                <option>Vancouver</option>
                                                <option>Var??ovia</option>
                                                <option>V??r??e??</option>
                                                <option>Viena</option>
                                                <option>Vilnius</option>
                                                <option>Washington</option>
                                                <option>Zagreb</option>
                                                <option>Zaje??ar</option>
                                                <option>Zaragoza</option>
                                                <option>Solotvino</option>
                                                <option>Bari</option>
                                                <option>Tallinn</option>
                                                <option>Miami</option>
                                                <option>Melbourne</option>
                                                <option>Manchester</option>
                                                <option>Muscat</option>
                                                <option>Haifa</option>
                                                <option>Stuttgart</option>
                                            </datalist>
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->

                                <div class="input_wrapper_col">
                                    <div class="row">
                                        <input class="input_wraper__data hasDatepicker" name="serviceConsul" id="serviceConsul" type="text"
                                            placeholder="Serviciul consular" list="serviceC-li">
                                            <datalist id="serviceC-li">
                                                <option>Redob??ndirea cet????eniei R. Moldova</option>
                                                <option>Modificarea op??iunii de domiciliu</option>
                                                <option>Acordarea cet????eniei R.Moldova</option>
                                                <option>Depunerea jur??m??ntului de credin???? la Consulat</option>
                                                <option>Eliberarea duplicatului certificatului de cet????enie R.Molova</option>
                                                <option>Dob??ndirea cet????eniei R.Molova pentru minori</option>
                                                <option>Renun??are la cet????enia R. Molova</option>
                                                <option>Altele</option>
                                            </datalist>
   
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->
                                
                            </div> <!-- input_wrapper close -->
                        </div> <!-- input_col close -->
                    </div> <!-- input_row close -->

                    <div class="input_row">
                        <div class="input_col input_col--big">
                            <div class="input_col__title">Date de identitate ale solicitantului</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col">
                                    <input class="input_wraper__data" type="name" name="fname" id="fname"
                                        placeholder="Nume Familie">
                                    <input class="input_wraper__data" type="name" name="fnameBirth" id="fnameBirth"
                                        placeholder="Nume la na??tere">
                                    <input class="input_wraper__data" type="name" name="fnameDad" id="fnameDad"
                                        placeholder="Nume familie tat??">
                                    <input class="input_wraper__data" type="name" name="fnameMom" id="fnameMom"
                                        placeholder="Nume familie mam??">
                                    <input class="input_wraper__data" type="text" name="idnpMom" id="idnpMom"
                                        placeholder="IDNP mam??">
                                    <input class="input_wraper__data" type="text" name="cetatenie" id="cetatenie"
                                        placeholder="Cet????ean al statului" list="country">
                                    <datalist id="country">
                                        <option value="Afghanistan">
                                        <option value="Albania">
                                        <option value="Algeria">
                                        <option value="American Samoa">
                                        <option value="Andorra">
                                        <option value="Angola">
                                        <option value="Anguilla">
                                        <option value="Antarctica">
                                        <option value="Antigua and Barbuda">
                                        <option value="Argentina">
                                        <option value="Armenia">
                                        <option value="Aruba">
                                        <option value="Australia">
                                        <option value="Austria">
                                        <option value="Azerbaijan">
                                        <option value="Bahamas">
                                        <option value="Bahrain">
                                        <option value="Bangladesh">
                                        <option value="Barbados">
                                        <option value="Belarus">
                                        <option value="Belgium">
                                        <option value="Belize">
                                        <option value="Benin">
                                        <option value="Bermuda">
                                        <option value="Bhutan">
                                        <option value="Bolivia">
                                        <option value="Bosnia and Herzegovina">
                                        <option value="Botswana">
                                        <option value="Bouvet Island">
                                        <option value="Brazil">
                                        <option value="British Indian Ocean Territory">
                                        <option value="Brunei Darussalam">
                                        <option value="Bulgaria">
                                        <option value="Burkina Faso">
                                        <option value="Burundi">
                                        <option value="Cambodia">
                                        <option value="Cameroon">
                                        <option value="Canada">
                                        <option value="Cape Verde">
                                        <option value="Cayman Islands">
                                        <option value="Central African Republic">
                                        <option value="Chad">
                                        <option value="Chile">
                                        <option value="China">
                                        <option value="Christmas Island">
                                        <option value="Cocos (Keeling) Islands">
                                        <option value="Colombia">
                                        <option value="Comoros">
                                        <option value="Congo">
                                        <option value="Congo, The Democratic Republic of The">
                                        <option value="Cook Islands">
                                        <option value="Costa Rica">
                                        <option value="Cote D'ivoire">
                                        <option value="Croatia">
                                        <option value="Cuba">
                                        <option value="Cyprus">
                                        <option value="Czech Republic">
                                        <option value="Denmark">
                                        <option value="Djibouti">
                                        <option value="Dominica">
                                        <option value="Dominican Republic">
                                        <option value="Ecuador">
                                        <option value="Egypt">
                                        <option value="El Salvador">
                                        <option value="Equatorial Guinea">
                                        <option value="Eritrea">
                                        <option value="Estonia">
                                        <option value="Ethiopia">
                                        <option value="Falkland Islands (Malvinas)">
                                        <option value="Faroe Islands">
                                        <option value="Fiji">
                                        <option value="Finland">
                                        <option value="France">
                                        <option value="French Guiana">
                                        <option value="French Polynesia">
                                        <option value="French Southern Territories">
                                        <option value="Gabon">
                                        <option value="Gambia">
                                        <option value="Georgia">
                                        <option value="Germany">
                                        <option value="Ghana">
                                        <option value="Gibraltar">
                                        <option value="Greece">
                                        <option value="Greenland">
                                        <option value="Grenada">
                                        <option value="Guadeloupe">
                                        <option value="Guam">
                                        <option value="Guatemala">
                                        <option value="Guinea">
                                        <option value="Guinea-bissau">
                                        <option value="Guyana">
                                        <option value="Haiti">
                                        <option value="Heard Island and Mcdonald Islands">
                                        <option value="Holy See (Vatican City State)">
                                        <option value="Honduras">
                                        <option value="Hong Kong">
                                        <option value="Hungary">
                                        <option value="Iceland">
                                        <option value="India">
                                        <option value="Indonesia">
                                        <option value="Iran, Islamic Republic of">
                                        <option value="Iraq">
                                        <option value="Ireland">
                                        <option value="Israel">
                                        <option value="Italy">
                                        <option value="Jamaica">
                                        <option value="Japan">
                                        <option value="Jordan">
                                        <option value="Kazakhstan">
                                        <option value="Kenya">
                                        <option value="Kiribati">
                                        <option value="Korea, Democratic People's Republic of">
                                        <option value="Korea, Republic of">
                                        <option value="Kuwait">
                                        <option value="Kyrgyzstan">
                                        <option value="Lao People's Democratic Republic">
                                        <option value="Latvia">
                                        <option value="Lebanon">
                                        <option value="Lesotho">
                                        <option value="Liberia">
                                        <option value="Libyan Arab Jamahiriya">
                                        <option value="Liechtenstein">
                                        <option value="Lithuania">
                                        <option value="Luxembourg">
                                        <option value="Macao">
                                        <option value="Macedonia, The Former Yugoslav Republic of">
                                        <option value="Madagascar">
                                        <option value="Malawi">
                                        <option value="Malaysia">
                                        <option value="Maldives">
                                        <option value="Mali">
                                        <option value="Malta">
                                        <option value="Marshall Islands">
                                        <option value="Martinique">
                                        <option value="Mauritania">
                                        <option value="Mauritius">
                                        <option value="Mayotte">
                                        <option value="Mexico">
                                        <option value="Micronesia, Federated States of">
                                        <option value="Moldova, Republic of">
                                        <option value="Monaco">
                                        <option value="Mongolia">
                                        <option value="Montserrat">
                                        <option value="Morocco">
                                        <option value="Mozambique">
                                        <option value="Myanmar">
                                        <option value="Namibia">
                                        <option value="Nauru">
                                        <option value="Nepal">
                                        <option value="Netherlands">
                                        <option value="Netherlands Antilles">
                                        <option value="New Caledonia">
                                        <option value="New Zealand">
                                        <option value="Nicaragua">
                                        <option value="Niger">
                                        <option value="Nigeria">
                                        <option value="Niue">
                                        <option value="Norfolk Island">
                                        <option value="Northern Mariana Islands">
                                        <option value="Norway">
                                        <option value="Oman">
                                        <option value="Pakistan">
                                        <option value="Palau">
                                        <option value="Palestinian Territory, Occupied">
                                        <option value="Panama">
                                        <option value="Papua New Guinea">
                                        <option value="Paraguay">
                                        <option value="Peru">
                                        <option value="Philippines">
                                        <option value="Pitcairn">
                                        <option value="Poland">
                                        <option value="Portugal">
                                        <option value="Puerto Rico">
                                        <option value="Qatar">
                                        <option value="Reunion">
                                        <option value="Romania">
                                        <option value="Russian Federation">
                                        <option value="Rwanda">
                                        <option value="Saint Helena">
                                        <option value="Saint Kitts and Nevis">
                                        <option value="Saint Lucia">
                                        <option value="Saint Pierre and Miquelon">
                                        <option value="Saint Vincent and The Grenadines">
                                        <option value="Samoa">
                                        <option value="San Marino">
                                        <option value="Sao Tome and Principe">
                                        <option value="Saudi Arabia">
                                        <option value="Senegal">
                                        <option value="Serbia and Montenegro">
                                        <option value="Seychelles">
                                        <option value="Sierra Leone">
                                        <option value="Singapore">
                                        <option value="Slovakia">
                                        <option value="Slovenia">
                                        <option value="Solomon Islands">
                                        <option value="Somalia">
                                        <option value="South Africa">
                                        <option value="South Georgia and The South Sandwich Islands">
                                        <option value="Spain">
                                        <option value="Sri Lanka">
                                        <option value="Sudan">
                                        <option value="Suriname">
                                        <option value="Svalbard and Jan Mayen">
                                        <option value="Swaziland">
                                        <option value="Sweden">
                                        <option value="Switzerland">
                                        <option value="Syrian Arab Republic">
                                        <option value="Taiwan, Province of China">
                                        <option value="Tajikistan">
                                        <option value="Tanzania, United Republic of">
                                        <option value="Thailand">
                                        <option value="Timor-leste">
                                        <option value="Togo">
                                        <option value="Tokelau">
                                        <option value="Tonga">
                                        <option value="Trinidad and Tobago">
                                        <option value="Tunisia">
                                        <option value="Turkey">
                                        <option value="Turkmenistan">
                                        <option value="Turks and Caicos Islands">
                                        <option value="Tuvalu">
                                        <option value="Uganda">
                                        <option value="Ukraine">
                                        <option value="United Arab Emirates">
                                        <option value="United Kingdom">
                                        <option value="United States">
                                        <option value="United States Minor Outlying Islands">
                                        <option value="Uruguay">
                                        <option value="Uzbekistan">
                                        <option value="Vanuatu">
                                        <option value="Venezuela">
                                        <option value="Viet Nam">
                                        <option value="Virgin Islands, British">
                                        <option value="Virgin Islands, U.S">
                                        <option value="Wallis and Futuna">
                                        <option value="Western Sahara">
                                        <option value="Yemen">
                                        <option value="Zambia">
                                        <option value="Zimbabwe">
                                    </datalist>
                                    <input class="input_wraper__data" type="text" name="sex" id="sex" placeholder="Sex"
                                        list="sex-li">
                                    <datalist id="sex-li">
                                        <option>Feminin</option>
                                        <option>Masculin</option>
                                    </datalist>
                                </div>
                                <div class="input_wrapper_col">
                                    <input class="input_wraper__data" type="name" name="lname" id="lname" placeholder="Prenume">
                                    <input class="input_wraper__data" type="name" name="lnameBirth" id="lnameBirth"
                                        placeholder="Prenume la na??tere">
                                    <input class="input_wraper__data" type="name" name="lnameDad" id="lnameDad"
                                        placeholder="Prenume tat??">
                                    <input class="input_wraper__data" type="name" name="lnameMom" id="lnameMom"
                                        placeholder="Prenume mam??">
                                    <input class="input_wraper__data" type="text" name="idnpDad" id="idnpDad"
                                        placeholder="IDNP tat??">
                                    <input class="input_wraper__data" type="text" name="idnp" id="idnp"
                                        placeholder="IDNP R.Moldova">
                                    <input class="input_wraper__data" type="text" name="birthday" id="birthday"
                                        placeholder="Data na??terii">

                                </div>
                            </div> <!-- input_wrapper close -->
                        </div>
                        <div class="input_col input_col--small">
                            <div class="input_col__title">N??scut in</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col--full">
                                    <input class="input_wraper__data" type="text" name="countryBirth" id="countryBirth"
                                        placeholder="??ar?? na??tere" list="country">
                                    <input class="input_wraper__data" type="text" name="region" id="region" placeholder="Regiune">
                                    <input class="input_wraper__data" type="text" name="locality" id="locality"
                                        placeholder="Localitate">
                                </div>
                            </div> <!-- input_wrapper-doc close -->
                        </div> <!-- input_col input_col--small close -->
                    </div> <!-- input_row close -->

                    <div class="input_row">
                        <div class="input_col">
                            <div class="input_col__title">Document de identitate solicitant</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col col33">
                                    <label class="label-info-input">Document de identitate emis de</label>
                                    <div class="row">
                                        <div class="emisde">
                                            <input type="checkbox" name="checkEmisde" id="checkEmisde">
                                            <label for="checkEmisde">R. Moldova</label>
                                        </div>
                                    </div> <!-- row close -->

                                    <div class="row min50">
                                        <input class="input_wraper__data hasDatepicker" name="docSerie" id="docSerie" type="text"
                                            placeholder="Serie document" list="doc_serie">
                                        <datalist id="doc_serie">
                                            <option>A</option>
                                            <option>B</option>
                                        </datalist>
                                        <input class="input_wraper__data hasDatepicker" name="numDoc" id="numDoc" type="text"
                                            placeholder="Num??r document">
                                    </div> <!-- row close -->

                                </div> <!-- input_wrapper_col col33 close -->
                                <div class="input_wrapper_col col33">

                                    <div class="row">
                                        <div class="emisde">
                                            <input class="input_wraper__data hasDatepicker" name="typeDoc" id="typeDoc" type="text"
                                                placeholder="Tip document de identitate" list="doc_type">
                                            <datalist id="doc_type">
                                                <option>Buletin de identitate</option>
                                                <option>Carte de identitate</option>
                                                <option>Document de c??l??torie pentru refugia??i/ apatrizi</option>
                                                <option>Pa??aport</option>
                                                <option>Altul</option>
                                            </datalist>
                                        </div>
                                    </div> <!-- row close -->

                                    <div class="row min50">
                                        <input class="input_wraper__data" type="text" name="emitDate" id="emitDate"
                                            placeholder="Dat?? emitere">
                                        <input class="input_wraper__data" type="text" name="expDate" id="expDate"
                                            placeholder="Dat?? expirare">
                                    </div> <!-- row close -->

                                </div> <!-- input_wrapper_col col33 close -->
                                <div class="input_wrapper_col col33">

                                    <div class="row">
                                        <div class="emisde">
                                            <input type="checkbox" name="docValid" id="docValid">
                                            <label for="docValid">Valabilitate nelimitat??</label>
                                        </div>
                                    </div> <!-- row close -->
                                    <div class="row ">
                                        <input class="input_wraper__data hasDatepicker" name="emisDe" id="emisDe" type="text"
                                            placeholder="Emis de">
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->
                            </div> <!-- input_wrapper close -->
                        </div> <!-- input_col close -->
                    </div> <!-- input_row close -->
                    
                    <div class="input_row">
                        <div class="input_col">
                            <div class="input_col__title">Adresa de domiciliu (a??a cum figureaz?? ??n documentul de identitate, dac?? sunte??i ??n posesia lui)</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col col33">
                                    <div class="row">
                                        <input class="input_wraper__data" type="text" name="countryHome" id="countryHome" placeholder="??ar??" list="country">
                                    </div> <!-- row close -->
                                    <div class="row min50">
                                        <input class="input_wraper__data hasDatepicker" name="strHome" id="strHome" type="text"
                                            placeholder="Strad??">
                                        <input class="input_wraper__data hasDatepicker" name="numHome" id="numHome" type="text"
                                            placeholder="Num??r">
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->
                                <div class="input_wrapper_col col33">
                                    <div class="row">
                                        <input class="input_wraper__data hasDatepicker" name="regionHome" id="regionHome" type="text" placeholder="Regiune adm. - teritorial??">         
                                    </div> <!-- row close -->

                                    <div class="row min33">
                                        <input class="input_wraper__data" type="text" name="blocHome" id="blocHome"
                                            placeholder="Bloc">
                                        <input class="input_wraper__data" type="text" name="etajHome" id="etajHome"
                                            placeholder="Etaj">
                                            <input class="input_wraper__data" type="text" name="scarHome" id="scarHome"
                                            placeholder="Scar??">
                                    </div> <!-- row close -->

                                </div> <!-- input_wrapper_col col33 close -->
                                <div class="input_wrapper_col col33">
                                    <div class="row">
                                        <input class="input_wraper__data" type="text" name="localityForeignHome" id="localityForeignHome" placeholder="Localitate Str??inatate">
                                    </div> <!-- row close -->
                                    <div class="row min50">
                                        <input class="input_wraper__data hasDatepicker" name="apartmentHome" id="apartmentHome" type="text"
                                            placeholder="Apartament">
                                        <input class="input_wraper__data hasDatepicker" name="zipCodeHome" id="zipCodeHome" type="text" placeholder="Cod po??tal">
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->
                            </div> <!-- input_wrapper close -->
                        </div> <!-- input_col close -->
                    </div> <!-- input_row close -->

                    <div class="input_row">
                        <div class="input_col">
                            <div class="input_col__title">Re??edin??a/Adresa la care locui??i ??n str??in??tate. Se va completa ??n mod obligatoriu adresa de re??edin????/ adresa la care locui??i sau v?? afla??i temporar ??n str??in??tate</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col col33">
                                    <div class="row">
                                        <input class="input_wraper__data" type="text" name="countryForeign" id="countryForeign" placeholder="??ar??" list="country">
                                    </div> <!-- row close -->
                                    <div class="row min50">
                                        <input class="input_wraper__data hasDatepicker" name="strForeign" id="strForeign" type="text"
                                            placeholder="Strad??">
                                        <input class="input_wraper__data hasDatepicker" name="numForeign" id="numForeign" type="text"
                                            placeholder="Num??r">
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->
                                <div class="input_wrapper_col col33">
                                    <div class="row">
                                        <input class="input_wraper__data hasDatepicker" name="regionForeign" id="regionForeign" type="text" placeholder="Regiune adm. - teritorial??">         
                                    </div> <!-- row close -->

                                    <div class="row min33">
                                        <input class="input_wraper__data" type="text" name="blocForeign" id="blocForeign"
                                            placeholder="Bloc">
                                        <input class="input_wraper__data" type="text" name="etajForeign" id="etajForeign"
                                            placeholder="Etaj">
                                            <input class="input_wraper__data" type="text" name="scarForeign" id="scarForeign"
                                            placeholder="Scar??">
                                    </div> <!-- row close -->

                                </div> <!-- input_wrapper_col col33 close -->
                                <div class="input_wrapper_col col33">
                                    <div class="row">
                                        <input class="input_wraper__data" type="text" name="localityForeign2" id="localityForeign2"
                                        placeholder="Localitate Str??inatate">
                                    </div> <!-- row close -->
                                    <div class="row min50">
                                        <input class="input_wraper__data hasDatepicker" name="apartmentForeign" id="apartmentForeign" type="text"
                                            placeholder="Apartament">
                                        <input class="input_wraper__data hasDatepicker" name="zipCodeForeign" id="zipCodeForeign" type="text" placeholder="Cod po??tal">
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->
                            </div> <!-- input_wrapper close -->
                        </div> <!-- input_col close -->
                    </div> <!-- input_row close -->

                    <div class="input_row">
                        <div class="input_col">
                            <div class="input_col__title">Date de contact</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col--full">
                                    <div class="row min50">
                                        <input class="input_wraper__data" type="tel" name="telData" id="telData" placeholder="Telefon">
                                        <input class="input_wraper__data" type="email" name="emailData" id="emailData" placeholder="Email">
                                    </div> <!-- row close -->
                                </div> <!-- input_wrapper_col col33 close -->  
                            </div> <!-- input_wrapper close -->
                        </div> <!-- input_col close -->
                    </div> <!-- input_row close -->

                    <div class="input_row">
                        <div class="input_col input_col--big">
                            <div class="input_col__title">Date de identitate copil</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col">
                                    <input class="input_wraper__data" type="name" name="fnameCopil" id="fnameCopil"
                                        placeholder="Nume Copil">
                                    <input class="input_wraper__data" type="text" name="cetatenieCopil" id="cetatenieCopil"
                                        placeholder="Cet????ean al statului" list="country">
                                    <input class="input_wraper__data" type="text" name="sexCopil" id="sexCopil" placeholder="Sex" list="sex-li">
                                </div>
                                <div class="input_wrapper_col">
                                    <input class="input_wraper__data" type="name" name="lnameCopil" id="lnameCopil" placeholder="Prenume Copil">
                                    <input class="input_wraper__data" type="text" name="idnpCopil" id="idnpCopil"
                                        placeholder="IDNP R.Moldova">
                                    <input class="input_wraper__data" type="text" name="birthdayCopil" id="birthdayCopil" placeholder="Data na??terii">
                                </div>
                            </div> <!-- input_wrapper close -->
                        </div>
                        <div class="input_col input_col--small">
                            <div class="input_col__title">N??scut (Copil)</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col--full">
                                    <input class="input_wraper__data" type="text" name="countryBirthCopil" id="countryBirthCopil"
                                        placeholder="??ar?? na??tere" list="country">
                                    <input class="input_wraper__data" type="text" name="regionCopil" id="regionCopil" placeholder="Regiune">
                                    <input class="input_wraper__data" type="text" name="localityCopil" id="localityCopil" placeholder="Localitate">
                                </div>
                            </div> <!-- input_wrapper-doc close -->
                        </div> <!-- input_col input_col--small close -->
                    </div> <!-- input_row close -->

                    <div class="input_row">
                        <div class="input_col" style="width: 60%;">
                            <div class="input_col__title">Taxa</div>
                            <div class="input_wrapper-doc">
                                <div class="input_wrapper_col--full">
                                    <input class="input_wraper__data" type="text" name="payMod" id="payMod"
                                        placeholder="Modalitatea de achitare" list="payMod-li">
                                        <datalist id="payMod-li">
                                            <option>Banca</option>
                                            <option>Transfer bancar</option>
                                            <option>Online</option>
                                            <option>Card</option>
                                        </datalist>
                                    <input class="input_wraper__data" type="text" name="currency" id="currency" placeholder="Valuta" list="currency-li">
                                    <datalist id="currency-li">
                                        <option>MDA</option>
                                        <option>EUR</option>
                                        <option>USD</option>
                                        <option>RON</option>
                                        <option>Alte</option>
                                    </datalist>

                                    <input class="input_wraper__data" type="text" name="tax" id="tax" placeholder="0" disabled>
                                </div>
                            </div> <!-- input_wrapper-doc close -->
                        </div> <!-- input_col input_col--small close -->
                    </div> <!-- input_row close -->
                    <input type="submit" id="submitData" class="panel__btn" value="Save" style="font-weight: 900;">
                </form>
            </div> <!-- contact__wrapper close -->
        </div> <!-- container close -->
    </section> <!-- register close -->

    <section class="section" id="bottom_nav">
        <div class="container">
            <ul class="service__nav-ul">
                <li class="service__nav-item">
                    <a class="service__nav-link" href="../index.html">Servicii Consulare</a>
                </li>
                <li class="service__nav-item">
                    <a class="service__nav-link" href="../howWork.html">Cum functioneaza sistemul</a>
                </li>
                <li class="service__nav-item">
                    <a class="service__nav-link" href="../contact.html">Centrul de contact ??i suport</a>
                </li>
                <li class="service__nav-item">
                    <a class="service__nav-link" href="../terms.html">Condi??ii de utilizare / Condi??ii legale</a>
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
                        Acest sistem informatic modern va permite cet????enilor R.Moldova s?? acceseze informa??ii consulare
                        de calitate ??ntr-un mod eficient ??i transparent, beneficiind de un confort crescut datorit??
                        posibilit????ii de a interac??iona online cu personalul Ministerului Afacerilor Externe, de a
                        trimite solicit??ri prin mijloace electronice f??r?? a mai fi nevoi??i s?? se deplaseze in mod
                        repetat la ghi??eu, elimin??ndu-se astfel barierele birocratice ??i cele geografice.
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
                            <img class="main-logo footer--logo" src="../img/MAE Moldova.png"
                                alt="Ministerul Afacerilor Externe ??i Integr??rii Europene RM">
                            <div>
                                <p>Ministerul Afacerilor Externe ??i Integr??rii Europene al Republicii Moldova</p>
                                <p>Copyright ?? 2021.</p>
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
                                <p>Adresa: MD-2012, mun. Chi??in??u,</p>
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
                                <a href="https://www.presedinte.md/" target="_blank">Pre??edin??ia Republicii Moldova</a>
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
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/data.js"></script>
</body>

</html>