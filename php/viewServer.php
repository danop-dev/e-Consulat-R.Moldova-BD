<?php
include 'conectbd.php';

session_start();

if(isset($_POST['requestDetails'])){
    $requestDetails = $_POST['requestDetails'];
    $_SESSION["codCERERE"] = $requestDetails;

    $conbd = connect();
    $id = " SELECT * FROM cereri WHERE cod_cerere = '$requestDetails' ";
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

    //birth address
    $id = " SELECT * FROM adresa_nastere WHERE id_nastere = '$id_nastere' OR id_nastere = (SELECT adresa_nastere.id_nastere FROM adresa_nastere JOIN copii_minori ON adresa_nastere.id_nastere = copii_minori.id_nastere_minor AND copii_minori.id_copii = '$id_copii') ";
    $resultID = mysqli_query($conbd, $id);

    while($row = mysqli_fetch_array($resultID)) {
        // personal birth address
        if($row['id_nastere'] === $id_nastere){
            $_SESSION["id_nastereTara"]          = $row['tara'];
            $_SESSION["id_nastereRegiunea"]      = $row['regiunea'];
            $_SESSION["id_nastereLocalitatea"]   = $row['localitatea'];

        } else{
            // copil minor birth address
            $_SESSION["id_nastereMinorTara"]          = $row['tara'];
            $_SESSION["id_nastereMinorRegiunea"]      = $row['regiunea'];
            $_SESSION["id_nastereMinorLocalitatea"]   = $row['localitatea'];
        }
    }

    //personal home address
    $id = " SELECT * FROM adresa_domiciliu WHERE id_domiciliu = '$id_domiciliu' ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        $_SESSION["id_adresa_domiciliuTara"]         = $row['tara'];
        $_SESSION["id_adresa_domiciliuRegiunea"]     = $row['regiunea'];
        $_SESSION["id_adresa_domiciliuLocalitatea"]  = $row['localitatea'];
        $_SESSION["id_adresa_domiciliuStrada"]       = $row['strada'];
        $_SESSION["id_adresa_domiciliuNumar"]        = $row['numar'];
        $_SESSION["id_adresa_domiciliuBloc"]         = $row['bloc'];
        $_SESSION["id_adresa_domiciliuEtaj"]         = $row['etaj'];
        $_SESSION["id_adresa_domiciliuScara"]        = $row['scara'];
        $_SESSION["id_adresa_domiciliuApartament"]   = $row['apartament'];
        $_SESSION["id_adresa_domiciliuCod_postal"]   = $row['cod_postal'];
    }

    //personal foreign address
    $id = " SELECT * FROM adresa_resedinta WHERE id_resedinta = '$id_resedinta' ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        $_SESSION["id_adresa_ForeignTara"]         = $row['tara'];
        $_SESSION["id_adresa_ForeignRegiunea"]     = $row['regiunea'];
        $_SESSION["id_adresa_ForeignLocalitatea"]  = $row['localitatea'];
        $_SESSION["id_adresa_ForeignStrada"]       = $row['strada'];
        $_SESSION["id_adresa_ForeignNumar"]        = $row['numar'];
        $_SESSION["id_adresa_ForeignBloc"]         = $row['bloc'];
        $_SESSION["id_adresa_ForeignEtaj"]         = $row['etaj'];
        $_SESSION["id_adresa_ForeignScara"]        = $row['scara'];
        $_SESSION["id_adresa_ForeignApartament"]   = $row['apartament'];
        $_SESSION["id_adresa_ForeignCod_postal"]   = $row['cod_postal'];
    }


    //personal identitate
    $id = " SELECT * FROM date_identitate, doc_identitate WHERE date_identitate.id_identitate = '$id_identitate' AND doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        
        $_SESSION["fName"]         = $row['nume'];
        $_SESSION["lNmae"]         = $row['prenume'];
        $_SESSION["gender"]        = $row['sex'];
        $_SESSION["birthday"]      = $row['data_nasterii'];
        $_SESSION["nationality"]   = $row['cetatenia'];
        $_SESSION["sendEmail"]     = $row['email'];
        $_SESSION["sendTel"]       = $row['telefon'];

        $_SESSION["IDNP"]                     = $row['IDNP'];
        $_SESSION["doc_md"]                   = $row['doc_md'];
        $_SESSION["personalSeries"]           = $row['seria'];
        $_SESSION["personalNr_serie"]         = $row['nr_serie'];
        $_SESSION["tip_doc"]                  = $row['tip_doc'];
        $_SESSION["data_emitere"]             = $row['data_emitere'];
        $_SESSION["data_expiratie"]           = $row['data_expiratie'];
        $_SESSION["valabilitatea_infinit"]    = $row['valabilitatea_infinit'];
        $_SESSION["emis"]                     = $row['emis'];

    }

    //parents data
    //mom
    $id = " SELECT * FROM date_identitate, doc_identitate WHERE date_identitate.id_identitate = (SELECT id_identitate_mama FROM parinti WHERE id_parinti = '$id_parinti') AND doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        $_SESSION["fnameMom"]      = $row['nume'];
        $_SESSION["lnameMom"]      = $row['prenume'];
        $_SESSION["idnpMom"]       = $row['IDNP'];
    }

    //dad
    $id = " SELECT * FROM date_identitate, doc_identitate WHERE date_identitate.id_identitate = (SELECT id_identitate_tata FROM parinti WHERE id_parinti = '$id_parinti') AND doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        $_SESSION["fnameDad"]      = $row['nume'];
        $_SESSION["lnameDad"]      = $row['prenume'];
        $_SESSION["idnpDad"]       = $row['IDNP'];
    }

    //date copil
    $id = " SELECT * FROM date_identitate, doc_identitate WHERE date_identitate.id_identitate = (SELECT id_identitate_copil FROM copii_minori WHERE id_copii = '$id_copii') AND doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        $_SESSION["fnameCopil"]         = $row['nume'];
        $_SESSION["lnameCopil"]         = $row['prenume'];
        $_SESSION["genderCopil"]        = $row['sex'];
        $_SESSION["birthdayCopil"]      = $row['data_nasterii'];
        $_SESSION["nationalityCopil"]   = $row['cetatenia'];
        $_SESSION["idnpCopil"]          = $row['IDNP'];
    }

    //taxa
    $id = " SELECT * FROM taxa WHERE id_taxa = '$id_taxa' ";
    $resultID = mysqli_query($conbd, $id);
    while($row = mysqli_fetch_array($resultID)) {
        $_SESSION["modalitate"]  = $row['modalitate'];
        $_SESSION["currency"]      = $row['valuta'];
        $_SESSION["taxa"]        = $row['taxa'];
    }
    mysqli_close($conbd);
    echo json_encode(array('statusCode' => 200));
}
?>