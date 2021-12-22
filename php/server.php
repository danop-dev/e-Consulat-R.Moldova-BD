<?php
include 'validation.php';
include 'conectbd.php';

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



// if(!empty($fname) && !empty($fnameBirth) && !empty($fnameDad) && !empty($cetatenie) && !empty($sex) && !empty($lname) && !empty($lnameBirth) && !empty($lnameDad) && !empty($idnp) && !empty($birthday) && !empty($countryBirth) && !empty($region) && !empty($locality) && !empty($docSerie) && !empty($numDoc) && !empty($typeDoc) && !empty($emitDate) && !empty($emisDe) && !empty($countryHome) && !empty($strHome) && !empty($numHome) && !empty($regionHome) && !empty($localityForeignHome) && !empty($countryForeign) && !empty($strForeign) && !empty($numForeign) && !empty($regionForeign) && !empty($localityForeign2) && !empty($telData) && !empty($emailData)){


if(!empty($fname)){

    $isNotError = true;
    // if(!(validName($fname) && validName($lname))){
    //     $isNotError = false;
    // }
    // if(!validEmail($emailData)){
    //     $isNotError = false;
    // }

    if($isNotError){
        $conbd = connect();

        //add data in adresa_resedinta
        $insert_sql = " INSERT INTO adresa_resedinta (tara, regiunea, localitatea, strada, numar, bloc, etaj, scara, apartament, cod_postal) VALUES ('$countryForeign', '$regionForeign', '$localityForeign2', '$strForeign', '$numForeign', '$blocForeign', '$etajForeign', '$scarForeign', '$apartmentForeign', '$zipCodeForeign') ";
        mysqli_query($conbd, $insert_sql);

        //add data in adresa_domiciliu
        $insert_sql = " INSERT INTO adresa_domiciliu (tara, regiunea, localitatea, strada, numar, bloc, etaj, scara, apartament, cod_postal) VALUES ('$countryHome', '$regionHome', '$regionHome', '$strHome', '$numHome', '$blocHome', '$etajHome', '$scarHome', '$apartmentHome', '$zipCodeHome') ";
        mysqli_query($conbd, $insert_sql);


        //add data in adresa_nastere
        $insert_sql = " INSERT INTO adresa_nastere (tara, regiunea, localitatea) VALUES ('$countryBirth', '$region', '$locality') ";
        mysqli_query($conbd, $insert_sql);

        //add data in taxa
        $insert_sql = " INSERT INTO taxa(modalitate, valuta, taxa) VALUES ('$payMod', '$currency', '$tax') ";
        mysqli_query($conbd, $insert_sql);

        //add data in doc_identitate
        $insert_sql = " INSERT INTO doc_identitate (IDNP, doc_md, seria, nr_serie, tip_doc, data_emitere, data_expiratie, valabilitatea_infinit, emis) VALUES ('$idnp', '$checkEmisde', '$docSerie', '$numDoc', '$typeDoc', '$emitDate', '$expDate', '$docValid', '$emisDe') ";
        mysqli_query($conbd, $insert_sql);

        //add data in date_identitate
        $insert_sql = " INSERT INTO date_identitate (nume, prenume, sex, data_nasterii, cetatenia, id_doc_identitate, email, telefon) VALUES ('$fname', '$lname', '$sex', '$birthday', '$cetatenie', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnp' limit 1), '$emailData', '$telData') ";
        mysqli_query($conbd, $insert_sql);

        //add data in parinti
        //add Mom
        $insert_sql = " INSERT INTO doc_identitate (IDNP) VALUES ('$idnpMom')";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO date_identitate (nume, prenume, sex, id_doc_identitate) VALUES ('$fnameMom', '$lnameMom', 'Feminin', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnpMom' limit 1)) ";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO parinti (nume, prenume, gen_parinte, id_identitate_parinte) 
        VALUES ('$fnameMom', '$lnameMom', 'Feminin', (SELECT date_identitate.id_identitate FROM date_identitate 
                                             JOIN doc_identitate on doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpMom')) ";
        mysqli_query($conbd, $insert_sql);

        //add Dad
        $insert_sql = " INSERT INTO doc_identitate (IDNP) VALUES ('$idnpDad')";
        mysqli_query($conbd, $insert_sql);

        $insert_sql = " INSERT INTO date_identitate (nume, prenume, sex, id_doc_identitate) VALUES ('$fnameDad', '$lnameDad', 'Masculin', (SELECT id_doc_identitate FROM doc_identitate WHERE doc_identitate.IDNP = '$idnpDad' limit 1)) ";
        mysqli_query($conbd, $insert_sql);
        
        $insert_sql = " INSERT INTO parinti (nume, prenume, gen_parinte, id_identitate_parinte) 
        VALUES ('$fnameDad', '$lnameDad', 'Masculin', (SELECT date_identitate.id_identitate FROM date_identitate 
                                             JOIN doc_identitate on doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND doc_identitate.IDNP = '$idnpDad')) ";
        mysqli_query($conbd, $insert_sql);


        



        


        echo json_encode(array('statusCode' => 200));         
    } else{
        echo json_encode(array('statusCode' => 202));
    }
}
?>