<?
require_once("auth2.php");
require_once('lembaga_bidang_pembangunan.php');

if( !isset($_SESSION['user']['username']) ){
	// kalau tidak ada id di query string
	header('Location: timeline.php');
}

//ambil id dari query string
$username = $_SESSION['user']['username'];

$sql2 = "SELECT * FROM users WHERE username='$username'";
    $stmt2 = $db->query($sql2);
    $dbd2 = $stmt2->fetch(PDO::FETCH_ASSOC);
/*
$query = mysqli_query($db, $sql);
$dbd = mysqli_fetch_assoc($query);


// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}
*/
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#343a40">
    <title>Edit Profile @<? echo $username; ?></title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/ks.css" />
    <link rel="shortcut icon" href="favicon.ico" />

</head>
<body class="bg-dark">
<div id="BGHD" class="BGHD"></div>
<div id="batang_tubuh" class="bg_rl">
<br><br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
<br>

<?
if($_GET['error'] == 'ats'){
echo '<table class="reg_err">
    <tr>
        <td>
            <p ><b>KEGAGALAN PROSES UPLOAD !</b></p>
        </td>
    </tr>
    <tr>
        <td>
            <p >Kemungkinan gagal upload karena :<br>
            <ul>
                <li>Ukuran gambar yang terlalu besar
                </li>
                <li>Anda tidak memilih satupun file
                </li>
                </ul></p>
        </td>
    </tr>
</table>
<br><br>';
} else {
    echo '';
}

?>

</br>
        <form action="save-pp.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label class="w" for="username">Username</label>
                <div class="form-control" name="username"><? echo $dbd2['username']; ?></div>
                </div>

            <div class="form-group">
                <label class="w" for="name">Foto Profil</label>
                <input class="form-control" type="file" name="pp" accept="image/*" value="<? echo $dbd2['photo']; ?>" />
                <input name="ppbf" type="hidden" value="<? echo $dbd2['photo']; ?>" />
                <? //echo $dbd2['photo']; ?>
            </div>


<?/*
<input type="hidden" name="id" value="<? echo $dbd['id']; ?>" />
*/?>
<br>
            <input type="submit" class="btn btn-success btn-block" name="save" value="Simpan Perubahan" />

        </form>
<br>
<a class="ttp-href" href="./"><button class="btn btn-danger btn-block" >Buang Perubahan</button></a>

        </div>

    </div>
</div>
<br><br><br><br>

<? include 'tpl/header.php'; ?>
<? include 'tpl/atribusi.php'; ?>

</div>
</body>
</html>