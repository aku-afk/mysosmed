<?
include "auth3.php";
require_once('lembaga_bidang_pembangunan.php');

$username = $_SESSION['user']['username'];
$wa = $_SESSION['user']['wa'];
$pp_bef = $_SESSION['user']['photo'];
$ppbf = $_POST['ppbf'];

if( !isset($username) ){
	// kalau tidak ada id di query string
	header('Location: ./');
}

if(isset($_POST['save'])){

$namaFile = $_FILES['pp']['name'];
$namaSementara = $_FILES['pp']['tmp_name'];
// tentukan lokasi file akan dipindahkan
$dirUpload = "img/users/";
// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    if($terupload) {
        if($pp_bef == 'img/default_pp.svg') {
            echo '';
        } else {
        unlink($ppbf);
        }
    } else {
        die (header("Location: edit-pp.php?error=ats"));
    };

$pp = $dirUpload.$namaFile;

    // menyiapkan query users
    $sql = "UPDATE users SET photo='$pp' WHERE username='$username' AND wa='$wa'";
    $stmt = $db->query($sql);
    $saved = $stmt->execute();

    // menyiapkan query all_tengok
    $sql3 = "UPDATE statues SET pp='$pp' WHERE username='$username' AND wa='$wa'";
    $stmt3 = $db->query($sql3);
    $saved3 = $stmt3->execute();

    // menyiapkan query users
    $sql_sk = "UPDATE komens SET pp='$pp' WHERE username='$username' AND wa='$wa'";
    $stmt_sk = $db->query($sql_sk);
    $saved_sk = $stmt_sk->execute();

    // maka alihkan ke halaman Tl

    if($saved and $saved3 and $saved_sk) header('Location: ./');
/*
    if($saved_sk) echo '';
    if($saved3) echo '';
*/

}
?>
    <meta name="theme-color" content="#343a40">
    