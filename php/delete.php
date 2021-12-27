<?php
include 'conectbd.php';


if(isset($_POST['requestDelete'])){
    
    $requestDelete = $_POST['requestDelete'];
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

    $idChildbirth = mysqli_query($conbd, " SELECT id_nastere FROM adresa_nastere JOIN copii_minori ON copii_minori.id_nastere_minor = adresa_nastere.id_nastere AND copii_minori.id_copii = '$id_copii' ");


    $deleteQuery = " DELETE FROM doc_identitate WHERE id_doc_identitate = (SELECT id_doc_identitate FROM date_identitate WHERE id_identitate = (SELECT id_identitate FROM cereri WHERE cod_cerere = '$requestDelete')) 
    OR id_doc_identitate = (SELECT id_doc_identitate FROM date_identitate WHERE id_identitate = (SELECT id_identitate_mama FROM parinti WHERE id_parinti = (SELECT id_parinti FROM cereri WHERE cod_cerere = '$requestDelete')))
    OR id_doc_identitate = (SELECT id_doc_identitate FROM date_identitate WHERE id_identitate = (SELECT id_identitate_tata FROM parinti WHERE id_parinti = (SELECT id_parinti FROM cereri WHERE cod_cerere = '$requestDelete')))
    OR id_doc_identitate = (SELECT id_doc_identitate FROM date_identitate WHERE id_identitate = (SELECT id_identitate_copil FROM copii_minori WHERE id_copii = (SELECT id_parinti FROM cereri WHERE cod_cerere = '$requestDelete'))) ";
    mysqli_query($conbd, $deleteQuery);

    $deleteQuery = " DELETE FROM adresa_domiciliu WHERE id_domiciliu = '$id_domiciliu' ";
    mysqli_query($conbd, $deleteQuery);
    $deleteQuery = " DELETE FROM adresa_nastere WHERE id_nastere = '$id_nastere' ";
    mysqli_query($conbd, $deleteQuery);
    $deleteQuery = " DELETE FROM adresa_resedinta WHERE id_resedinta = '$id_resedinta' ";
    mysqli_query($conbd, $deleteQuery);
    $deleteQuery = " DELETE FROM taxa WHERE id_taxa = '$id_taxa' ";
    mysqli_query($conbd, $deleteQuery);

    while($row = mysqli_fetch_array($idChildbirth)) {
        $id_nastereCopil = $row['id_nastere']; 
    }

    $deleteQuery = " DELETE FROM adresa_nastere WHERE id_nastere = '$id_nastereCopil' ";
    mysqli_query($conbd, $deleteQuery);
    
    mysqli_close($conbd);
    
    echo json_encode(array('statusCode' => $id_nastereCopil));
} else { echo json_encode(array('statusCode' => 201)); }
?>