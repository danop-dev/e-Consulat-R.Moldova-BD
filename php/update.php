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

if(!empty($fname) && !empty($fnameBirth) && !empty($fnameDad) && !empty($cetatenie) && !empty($sex) && !empty($lname) && !empty($lnameBirth) && !empty($lnameDad) && !empty($idnp) && !empty($birthday) && !empty($countryBirth) && !empty($region) && !empty($locality) && !empty($docSerie) && !empty($numDoc) && !empty($typeDoc) && !empty($emitDate) && !empty($emisDe) && !empty($countryHome) && !empty($strHome) && !empty($numHome) && !empty($regionHome) && !empty($localityForeignHome) && !empty($countryForeign) && !empty($strForeign) && !empty($numForeign) && !empty($regionForeign) && !empty($localityForeign2) && !empty($telData) && !empty($emailData) ){

    $id_cod_cerere = str_replace(' ', '', $_POST['id_cod_cerere']);

    $isNotError = true;
    if(!(validName($fname) && validName($lname))){
        $isNotError = false;
    }
    if(!validEmail($emailData)){
        $isNotError = false;
    }

    if($isNotError){
        $conbd = connect();

        $id = " SELECT * FROM cereri WHERE cod_cerere = '$id_cod_cerere' ";
        $resultID = mysqli_query($conbd, $id);
                    
        while($row = mysqli_fetch_array($resultID)) {
        
            $id_identitate  = $row['id_identitate'];
            $id_nastere     = $row['id_nastere'];
            $id_domiciliu   = $row['id_domiciliu'];
            $id_resedinta   = $row['id_resedinta'];
            $id_parinti     = $row['id_parinti'];
            $id_copii       = $row['id_copii'];
            $id_taxa        = $row['id_taxa'];

            $_SESSION["servicii_consulat"]  = $row['servicii_consulat'];
            $_SESSION["oficiul_consulat"]   = $row['oficiul_consulat'];
        }

        //update cereri
        mysqli_query($conbd, " UPDATE cereri SET servicii_consulat = '$serviceConsul', oficiul_consulat = '$officeConsul' WHERE cod_cerere = '$id_cod_cerere' ");

        //upadte adresa domiciliu
        $updateQuery = " UPDATE adresa_domiciliu SET tara = '$countryHome', regiunea = '$regionHome', localitatea = '$localityForeignHome', strada = '$strHome', numar = '$numHome', bloc = '$blocHome', etaj = '$etajHome', scara = '$scarHome', apartament = '$apartmentHome', cod_postal = '$zipCodeHome' WHERE id_domiciliu = (SELECT id_domiciliu FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        //upadte adresa resedinta
        $updateQuery = " UPDATE adresa_resedinta SET tara = '$countryForeign', regiunea = '$regionForeign', localitatea = '$localityForeign2', strada = '$strForeign', numar = '$numForeign', bloc = '$blocForeign', etaj = '$etajForeign', scara = '$scarForeign', apartament = '$apartmentForeign', cod_postal = '$zipCodeForeign' WHERE id_resedinta = (SELECT id_domiciliu FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        //upadte adresa nastere (personal)
        $updateQuery = " UPDATE adresa_nastere SET tara = '$countryBirth', regiunea = '$region', localitatea = '$locality' WHERE id_nastere = (SELECT id_nastere FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        //update copii
        $updateQuery = " UPDATE copii_minori, adresa_nastere, date_identitate, doc_identitate 
        SET copii_minori.nume = '$fnameCopil', copii_minori.prenume = '$lnameCopil', 
        adresa_nastere.tara = '$countryBirthCopil', adresa_nastere.regiunea = '$regionCopil', adresa_nastere.localitatea = '$localityCopil',
        doc_identitate.IDNP = '$idnpCopil',
        date_identitate.nume = '$fnameCopil', date_identitate.prenume = '$fnameCopil', date_identitate.sex = '$sexCopil', date_identitate.data_nasterii = '$birthdayCopil', date_identitate.cetatenia = '$cetatenieCopil'
        WHERE adresa_nastere.id_nastere = copii_minori.id_nastere_minor AND copii_minori.id_copii = (SELECT id_copii FROM cereri WHERE cod_cerere = '$id_cod_cerere') AND date_identitate.id_identitate = copii_minori.id_identitate_copil AND doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate ";
        mysqli_query($conbd, $updateQuery);

        //update taxa
        $updateQuery = " UPDATE taxa SET modalitate = '$payMod', valuta = '$currency' WHERE id_taxa = (SELECT id_taxa FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        //update parinti
        $updateQuery = " UPDATE parinti, date_identitate, doc_identitate SET date_identitate.nume = '$fnameMom', date_identitate.prenume = '$lnameMom', doc_identitate.IDNP = '$idnpMom' WHERE doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND parinti.id_identitate_mama = date_identitate.id_identitate AND id_parinti = (SELECT id_parinti FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        $updateQuery = " UPDATE parinti, date_identitate, doc_identitate SET date_identitate.nume = '$fnameDad', date_identitate.prenume = '$lnameDad', doc_identitate.IDNP = '$idnpDad' WHERE doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND parinti.id_identitate_tata = date_identitate.id_identitate AND id_parinti = (SELECT id_parinti FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        //update personal data
        $updateQuery = " UPDATE date_identitate, doc_identitate 
        SET date_identitate.nume = '$fname', date_identitate.prenume = '$lname', date_identitate.sex = '$sex', date_identitate.data_nasterii = '$birthday', date_identitate.cetatenia = '$cetatenie', date_identitate.email = '$emailData', date_identitate.telefon = '$telData',
        doc_identitate.IDNP = '$idnp', doc_identitate.doc_md = '$checkEmisde', doc_identitate.seria = '$docSerie', doc_identitate.nr_serie = '$numDoc', doc_identitate.tip_doc = '$typeDoc', doc_identitate.data_emitere = '$emitDate', doc_identitate.data_expiratie = '$expDate', doc_identitate.valabilitatea_infinit = '$docValid', doc_identitate.emis = '$emisDe'
        WHERE doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND date_identitate.id_identitate = (SELECT id_identitate FROM cereri WHERE cod_cerere = '$id_cod_cerere') ";
        mysqli_query($conbd, $updateQuery);

        mysqli_close($conbd);
        echo json_encode(array('statusCode' => 200));  
               
    } else{ echo json_encode(array('statusCode' => 201)); }
} else { echo json_encode(array('statusCode' => 204)); }
?>