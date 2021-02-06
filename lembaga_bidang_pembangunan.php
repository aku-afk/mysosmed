<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "admn_db";
$db_name = "sosmed";

$NOTE_S = "\n<br><br>\n========== <a href='https://api.whatsapp.com/send?phone=6281329859219&text=! UpdatE has TROUBLE http://127.0.0.1:8080/'>Laporkan Masalah Ini</a> ==========\n";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("<h2><i>Database Trouble : </i></h2>\n<pre>" . $e->getMessage()."</pre>\n".$NOTE_S);
}
