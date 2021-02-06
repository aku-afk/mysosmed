<?php

require_once("lembaga_bidang_pembangunan.php");

$RECD1 = '<meta http-equiv="Refresh" content="0; URL=';

$jml_users = $db->query('select count(*) from users')->fetchColumn(); 

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $wa = $_POST['wa'];

if(!empty($username)){
   echo '';
} else {
   die($RECD1.'register.php?log=error&ey_un=true">');
}
if(!empty($wa)){
   echo '';
} else {
   die($RECD1.'register.php?log=error&ey_wa=true">');
}
if(!empty($_POST['password'])){
   echo '';
} else {
   die($RECD1.'register.php?log=error&ey_pass=true">');
}

// Cek username di database
$sqlq_cus = "select count(username) from users='$username'";
$res_cus = $db->prepare($sqlq_cus);
$res_cus->execute();
$cek_username = $res_cus->fetchColumn();
// Kalau username sudah ada yang pakai
if($cek_username > 0) die ($RECD1.'register.php?log=error&error=mirip&u-in='.$username.'">');
// Kalau username valid, Kita santuy



    // menyiapkan query
    $sql = "INSERT INTO users (name, username, wa, password) 
            VALUES (:name, :username, :wa, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":wa" => $wa
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // menyiapkan query
    $sql2 = "INSERT INTO def (username, ptg) 
            VALUES (:username, :ptg)";
    $stmt2 = $db->prepare($sql2);

    // bind parameter ke query
    $params2 = array(
        ":username" => $_POST['username'],
        ":ptg" => $_POST['password']
    );

    // eksekusi query untuk menyimpan ke database
    $saved2 = $stmt2->execute($params2);

    // menyiapkan query
    $sql3 = "INSERT INTO bio (username, bio) 
            VALUES (:username, :bio)";
    $stmt3 = $db->prepare($sql3);

    // bind parameter ke query
    $params3 = array(
        ":username" => $_POST['username'],
        ":bio" => ''
    );

    // eksekusi query untuk menyimpan ke database
    $saved3 = $stmt3->execute($params3);


    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved2) echo '';
    if($saved3) echo '';
    if($saved) header('Location: login.php');
}

?>