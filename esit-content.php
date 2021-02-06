<?

$username = $_POST['username'];
$id = $_POST['i'];
$caption = $_POST['caption'];

if( !isset($username) ){
	// kalau tidak ada id di query string
	header('Location: ./');
}

if(isset($_POST['pst'])){

$med = $dirUpload.$namaFile;
date_default_timezone_set('Asia/Jakarta');
$jam = date('H:i');
$tgl = date('j F Y');
$waktu = $jam.'  '.$tgl;

$w_edit = "Terakhir Diedit  ".$waktu;

    // menyiapkan query
    $sql = "UPDATE statues SET caption='$caption', time_stamp='$w_edit' WHERE username='$username' AND id='$id'";
    $stmt = $db->query($sql);

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute();

    if($saved){
        echo '<meta http-equiv="Refresh" content="0; URL=./#'.$id.'">';
    }else{
        echo 'Maaf, gagal disimpan';
    }


}
?>
