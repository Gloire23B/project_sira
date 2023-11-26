<?php

// Connexion à la base de données 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "23_24_b2_projet_sira";

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}


function searchByPrice($prix)  {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM chambre WHERE prix_journalier BETWEEN ? AND ? ORDER BY prix_journalier ASC");
    $stmt->execute([$prix-100, $prix+100]);

    return $stmt->fetchAll();
}



function existe($login){
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM membre WHERE login = ?");
    $req->execute([$login]);

    return $req->rowCount() != 0;
}

//VERIFIE LA VALIDITE D'UN CHAMPS
function isValideNumber($number, $max){

    if( ctype_digit($number) && $number >= $max ){
        return true;
    }
    
    return false;
}

function isValideString($texte, $max){

    // if( strlen( trim($texte) ) >= 10 )
    //     return true;
    // return false;
    return strlen( trim($texte) ) >= $max;
}

//Transfert de fichier
