<?php
include 'conectbd.php';

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


    $id_tata = mysqli_query($conbd, " SELECT id_identitate_tata FROM parinti WHERE id_parinti = '$id_parinti' ");
    while($i = mysqli_fetch_array($resultID)){
        $idTata = $row['id_identitate_tata'];
        
        echo json_encode(array('statusCode' => $idTata));


        $insert_sql = " DELETE doc_identitate from doc_identitate JOIN date_identitate ON doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate JOIN parinti ON parinti.id_identitate_mama = date_identitate.id_identitate AND parinti.id_parinti = '$id_parinti' ";
        mysqli_query($conbd, $insert_sql);
    
        $insert_sql = " DELETE doc_identitate FROM doc_identitate JOIN date_identitate ON doc_identitate.id_doc_identitate = date_identitate.id_doc_identitate AND date_identitate.id_identitate = '$idTata' ";
        mysqli_query($conbd, $insert_sql);
    
        mysqli_query($conbd, " DELETE adresa_domiciliu FROM adresa_domiciliu WHERE id_domiciliu = '$id_domiciliu' ");
        mysqli_query($conbd, " DELETE adresa_resedinta FROM adresa_resedinta WHERE id_resedinta = '$id_resedinta' ");
        mysqli_query($conbd, " DELETE adresa_nastere FROM adresa_nastere WHERE id_nastere = '$id_nastere' ");
    
        mysqli_query($conbd, " DELETE taxa FROM taxa WHERE id_taxa = '$id_taxa' ");
    }



    

   

    
}


mysqli_close($conbd);







?>