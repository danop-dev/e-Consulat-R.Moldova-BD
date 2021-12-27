<?php
include 'validation.php';
include 'conectbd.php';

session_start();

$officeConsul = $_POST['officeConsul'];
$serviceConsul = $_POST['serviceConsul'];

$fname = $_POST['fname'];
$fnameBirth = $_POST['fnameBirth'];
$fnameDad = $_POST['fnameDad'];
$fnameMom = $_POST['fnameMom'];
$idnpMom  = $_POST['idnpMom'];
$cetatenie = $_POST['cetatenie'];
$sex = $_POST['sex'];

$lname = $_POST['lname'];
$lnameBirth = $_POST['lnameBirth'];
$lnameDad = $_POST['lnameDad'];
$lnameMom = $_POST['lnameMom'];
$idnpDad = $_POST['idnpDad'];
$idnp = $_POST['idnp'];
$birthday = $_POST['birthday'];

$countryBirth = $_POST['countryBirth'];
$region = $_POST['region'];
$locality = $_POST['locality'];

$checkEmisde = $_POST['checkEmisde'];
$docSerie = $_POST['docSerie'];
$numDoc = $_POST['numDoc'];

$typeDoc = $_POST['typeDoc'];
$emitDate = $_POST['emitDate'];
$expDate = $_POST['expDate'];

$docValid = $_POST['docValid'];
$emisDe = $_POST['emisDe'];

$countryHome = $_POST['countryHome'];
$strHome = $_POST['strHome'];
$numHome = $_POST['numHome'];

$regionHome = $_POST['regionHome'];
$blocHome = $_POST['blocHome'];
$etajHome = $_POST['etajHome'];
$scarHome = $_POST['scarHome'];

$localityForeignHome = $_POST['localityForeignHome'];
$apartmentHome = $_POST['apartmentHome'];
$zipCodeHome = $_POST['zipCodeHome'];

$countryForeign = $_POST['countryForeign'];
$strForeign = $_POST['strForeign'];
$numForeign = $_POST['numForeign'];

$regionForeign = $_POST['regionForeign'];
$blocForeign = $_POST['blocForeign'];
$etajForeign = $_POST['etajForeign'];
$scarForeign = $_POST['scarForeign'];

$localityForeign2 = $_POST['localityForeign2'];
$apartmentForeign = $_POST['apartmentForeign'];
$zipCodeForeign = $_POST['zipCodeForeign'];

$telData = $_POST['telData'];
$emailData = $_POST['emailData'];

$fnameCopil = $_POST['fnameCopil'];
$cetatenieCopil = $_POST['cetatenieCopil'];
$sexCopil = $_POST['sexCopil'];

$lnameCopil = $_POST['lnameCopil'];
$idnpCopil = $_POST['idnpCopil'];
$birthdayCopil = $_POST['birthdayCopil'];

$countryBirthCopil = $_POST['countryBirthCopil'];
$regionCopil = $_POST['regionCopil'];
$localityCopil = $_POST['localityCopil'];

$payMod = $_POST['payMod'];
$currency = $_POST['currency'];
$tax = $_POST['tax'];

if(!empty($fname) && !empty($lname) && !empty($idnp) && !empty($docSerie) && !empty($numDoc) && !empty($telData) && !empty($emailData)){

    $isNotError = true;
    if(!(validName($fname) && validName($lname))){
        $isNotError = false;
    }
    if(!validEmail($emailData)){
        $isNotError = false;
    }

    if($isNotError){
        $conbd = connect();

        //add data in adresa_resedinta
        $insert_sql = " INSERT INTO adresa_resedinta (tara, regiunea, localitatea, strada, numar, bloc, etaj, scara, apartament, cod_postal) VALUES ('$countryForeign', '$regionForeign', '$localityForeign2', '$strForeign', '$numForeign', '$blocForeign', '$etajForeign', '$scarForeign', '$apartmentForeign', '$zipCodeForeign') ";
        mysqli_query($conbd, $insert_sql);

        //add data in adresa_domiciliu
        $insert_sql = " INSERT INTO adresa_domiciliu (tara, regiunea, localitatea, strada, numar, bloc, etaj, scara, apartament, cod_postal) VALUES ('$countryHome', '$regionHome', '$localityForeignHome', '$strHome', '$numHome', '$blocHome', '$etajHome', '$scarHome', '$apartmentHome', '$zipCodeHome') ";
        mysqli_query($conbd, $insert_sql);

        //add data in adresa_nastere
        $insert_sql = " INSERT INTO adresa_nastere (tara, regiunea, localitatea) VALUES ('$countryBirth', '$region', '$locality') ";
        mysqli_query($conbd, $insert_sql);

        //add data in taxa
        $insert_sql = " INSERT INTO taxa(modalitate, valuta, taxa) VALUES ('$payMod', '$currency', '$tax') ";
        mysqli_query($conbd, $insert_sql);

        //add data in doc_identitate

        $checkIDNP = " SELECT IDNP FROM doc_identitate WHERE IDNP = '$idnp' ";
        $resultIDNP = $conbd -> query($checkIDNP);

        if($resultIDNP -> num_rows == 0){
            $insert_sql = " INSERT INTO doc_identitate (IDNP, doc_md, seria, nr_serie, tip_doc, data_emitere, data_expiratie, valabilitatea_infinit, emis) VALUES ('$idnp', '$checkEmisde', '$docSerie', '$numDoc', '$typeDoc', '$emitDate', '$expDate', '$docValid', '$emisDe') ";
            mysqli_query($conbd, $insert_sql);
        }

        //add data in date_identitate
        $insert_sql = " INSERT INTO date_identitate (nume, prenume, sex, data_nasterii, cetatenia, id_doc_identitate, email, telefon) VALUES ('$fname', '$lname', '$sex', '$birthday', '$cetatenie', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnp' limit 1), '$emailData', '$telData') ";
        mysqli_query($conbd, $insert_sql);

        //add data in parinti
        //add parinte

        $checkIDNP = " SELECT IDNP FROM doc_identitate WHERE IDNP = '$idnpMom' ";
        $resultIDNP = $conbd -> query($checkIDNP);

        if($resultIDNP -> num_rows == 0){
            $insert_sql = " INSERT INTO doc_identitate (IDNP) VALUES ('$idnpMom')";
            mysqli_query($conbd, $insert_sql);
        }

        $checkIDNP = " SELECT IDNP FROM doc_identitate WHERE IDNP = '$idnpDad' ";
        $resultIDNP = $conbd -> query($checkIDNP);

        if($resultIDNP -> num_rows == 0){
            $insert_sql = " INSERT INTO doc_identitate (IDNP) VALUES ('$idnpDad')";
            mysqli_query($conbd, $insert_sql);
        }
        
        $insert_sql = " INSERT INTO date_identitate (nume, prenume, sex, id_doc_identitate) VALUES ('$fnameMom', '$lnameMom', 'Feminin', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnpMom' limit 1)) ";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO date_identitate (nume, prenume, sex, id_doc_identitate) VALUES ('$fnameDad', '$lnameDad', 'Masculin', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnpDad' limit 1)) ";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO parinti (id_identitate_mama, id_identitate_tata) 
        VALUES ( (SELECT date_identitate.id_identitate FROM date_identitate JOIN doc_identitate on doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpMom'), (SELECT date_identitate.id_identitate FROM date_identitate JOIN doc_identitate on doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpDad') ) ";
        mysqli_query($conbd, $insert_sql);

        //add date copil
        $checkIDNP = " SELECT IDNP FROM doc_identitate WHERE IDNP = '$idnpCopil' ";
        $resultIDNP = $conbd -> query($checkIDNP);
        if($resultIDNP -> num_rows == 0){
            $insert_sql = " INSERT INTO doc_identitate (IDNP) VALUES ('$idnpCopil') ";
            mysqli_query($conbd, $insert_sql);
        }

        $insert_sql = " INSERT INTO date_identitate (nume, prenume, data_nasterii, cetatenia, sex, id_doc_identitate) VALUES ('$fnameCopil', '$lnameCopil', '$birthdayCopil', '$cetatenieCopil', '$sexCopil', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnpCopil' limit 1)) ";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO adresa_nastere (tara, regiunea, localitatea) VALUES ('$countryBirthCopil', '$regionCopil', '$localityCopil') ";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO copii_minori (nume, prenume, id_identitate_copil, id_nastere_minor) VALUES ('$fnameCopil', '$lnameCopil', (SELECT date_identitate.id_identitate FROM date_identitate JOIN doc_identitate on doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpCopil' limit 1), (SELECT MAX(id_nastere) FROM adresa_nastere WHERE adresa_nastere.tara = '$countryBirthCopil' AND adresa_nastere.regiunea = '$regionCopil' AND adresa_nastere.localitatea = '$localityCopil')) ";
        mysqli_query($conbd, $insert_sql);
                          
        // add date cereri
        $flag = false;
        while (!$flag) {

            $digitalNum = mt_rand(1000000, 9999999);
            $sql = mysqli_query($conbd, " SELECT `id_cereri` FROM `cereri` WHERE  `id_cereri` = '$digitalNum' ");
            $num = mysqli_num_rows($sql);
            
            if ($num == 0) {  $flag = true; }
        }
        $codCerere = "MD". $digitalNum;
        $emailUser =  $_SESSION["email"];

        $insert_sql = " INSERT INTO `cereri`(`cod_cerere`, `servicii_consulat`, `oficiul_consulat`, `data_programarii`, `data_cerere`, `id_identitate`, `id_nastere`, `id_domiciliu`, `id_resedinta`, `id_parinti`, `id_copii`, `id_user`, `id_taxa`) VALUES ('$codCerere', '$serviceConsul', '$officeConsul', DATE_ADD(CURRENT_DATE(), INTERVAL 20 DAY), CURRENT_DATE(), 
        (SELECT date_identitate.id_identitate FROM date_identitate JOIN doc_identitate ON doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnp' limit 1), 
        
        (SELECT id_nastere FROM adresa_nastere WHERE tara = '$countryBirth' AND regiunea = '$region' AND localitatea = '$locality' limit 1), 
        
        (SELECT id_domiciliu FROM adresa_domiciliu WHERE tara = '$countryHome' AND regiunea = '$regionHome' AND localitatea = '$localityForeignHome' AND strada = '$strHome' AND numar = '$numHome' AND bloc = '$blocHome' AND etaj = '$etajHome' AND scara = '$scarHome' AND apartament = '$apartmentHome' AND cod_postal = '$zipCodeHome' limit 1), 
        
        (SELECT id_resedinta FROM adresa_resedinta WHERE tara = '$countryForeign' AND regiunea = '$regionForeign' AND localitatea = '$localityForeign2' AND strada = '$strForeign' AND numar = '$numForeign' AND bloc = '$blocForeign' AND etaj = '$etajForeign' AND scara = '$scarForeign' AND apartament = '$apartmentForeign' AND cod_postal = '$zipCodeForeign' limit 1), 
        (SELECT parinti.id_parinti FROM parinti 
        JOIN date_identitate ON date_identitate.id_identitate = parinti.id_identitate_mama
        JOIN doc_identitate ON doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpMom'), 
        
        (SELECT copii_minori.id_copii FROM copii_minori 
        JOIN date_identitate ON date_identitate.id_identitate = copii_minori.id_identitate_copil
        JOIN doc_identitate ON doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpCopil' LIMIT 1), (SELECT id_user FROM users WHERE email = '$emailUser'), 
        
        (SELECT id_taxa FROM taxa WHERE modalitate = '$payMod' AND valuta = '$currency' AND taxa = '$tax') ) ";    
        mysqli_query($conbd, $insert_sql);

        mysqli_close($conbd);
        echo json_encode(array('statusCode' => 200));         
    } else{
        echo json_encode(array('statusCode' => 201));
    }
} else {
    echo json_encode(array('statusCode' => 204));
}
?>