<?

$nggo = $_POST['nggo'];
$username = $_POST['username'];
$wa = $_POST['wa'];
$komen = $_POST['komenan'];
$pp_sk = $_POST['pp'];

//$RDC = header("Location: ./");
$REDIRECT_ = '<meta http-equiv="Refresh" content="0;URL=./#'.$nggo.'">';
//$REDIRECT_1 = header('Location: $nggo');

if (!empty($komen)) {
   echo '';
} else {
   die($REDIRECT_);
}

date_default_timezone_set('Asia/Jakarta');
$jam = date('H:i');
$tgl = date('j F Y');
$waktu_sk = $jam.'  '.$tgl;

    // menyiapkan query
    $sql_ik = "INSERT INTO komens (nggo, username, wa, komen, pp, time_stamp) VALUES ('$nggo', '$username', '$wa', '$komen', '$pp_sk', '$waktu_sk')";
    $stmt_ik = $db->prepare($sql_ik);
    
    // eksekusi query untuk menyimpan ke database
    $saved_ik = $stmt_ik->execute();
    
    if($saved_ik) echo $REDIRECT_;

?>