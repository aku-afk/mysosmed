<?
// Cek username di database
$sqlq_cus = "select count(username) from users='$username'";

$res_cus = $db->prepare($sqlq_cus);
$res_cus->execute();
$cek_username = $res_cus->fetchColumn();


/*
$cek_username = mysql_num_rows(mysql_query
             ("SELECT username FROM users
               WHERE username='$username'"));
*/


// Kalau username sudah ada yang pakai
if ($cek_username > 0){
    echo '0000';
}
// Kalau username valid, Kita santuy
else{
    die ($RECD1.'register.php?log=error&error=mirip&u-in='.$username);
}