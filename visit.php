<?
require_once('lembaga_bidang_pembangunan.php');
date_default_timezone_set('Asia/Jakarta');

$username = $_GET['u'];


if( !isset($_GET['u']) ){
	// kalau tidak ada id di query string
	header('Location: ./');
}

// buat query untuk ambil data dari database
$sql = "SELECT * FROM users WHERE username='$username'";
    $stmt = $db->query($sql);
    $usr = $stmt->fetch(PDO::FETCH_ASSOC);

// buat query untuk ambil data dari database
$sql2 = "SELECT * FROM bio WHERE username='$username'";
    $stmt2 = $db->query($sql2);
    $usr2 = $stmt2->fetch(PDO::FETCH_ASSOC);

?>

            <div id="visit" class="card mb-3">
                <div class="card-body">
<label class="x-it">
    <b>
    <a class="dark-href" href="./#src">&#10005;</a>
    </b>
</label>
<div class="line"></div>
<br>
<table>
<tr>
    <td>
                    <img class="img img-responsive rounded-circle mb-3" width="160" height="160" src="<?php echo $usr['photo'] ?>" />
    </td>
    <td class="invisible">----------</td>
    <td>
<div>
<table>
    <tr>
        <td><b><? echo $usr['username']; ?></b></td>
    </tr>
    <tr>
        <td><? echo $usr['name']; ?></td>
    </tr>
    <tr>
        <td><a href="https://api.whatsapp.com/send?phone=<?php echo $usr["wa"] ?>"><?php echo $usr["wa"]; ?></a></td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td><? echo nl2br($usr2['bio']); ?></td>
    </tr>
</table>
</div>
</td>
</tr>
</table>
                </div>
            </div>
