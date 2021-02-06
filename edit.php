<?
require_once("auth2.php");
require_once('lembaga_bidang_pembangunan.php');

$username = $_SESSION['user']['username'];

if( !isset($username) ){
	// kalau tidak ada id di query string
	header('Location: ./');
}

// buat query untuk ambil data dari database
$sql = "SELECT * FROM def WHERE username='$username'";
    $stmt = $db->query($sql);
    $dbd = $stmt->fetch(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM users WHERE username='$username'";
    $stmt2 = $db->query($sql2);
    $dbd2 = $stmt2->fetch(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM bio WHERE username='$username'";
    $stmt3 = $db->query($sql3);
    $dbd3 = $stmt3->fetch(PDO::FETCH_ASSOC);

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
    <meta name="theme-color" content="#343a40">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile @<? echo $username; ?></title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/ks.css" />
    <link rel="shortcut icon" href="favicon.ico" />

</head>
<body class="bg-dark">
<div id="BGHD" class="BGHD"></div>
<div id="batang_tubuh">
<br><br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <form action="save.php" method="POST" >

            <div class="form-group">
                <label class="w" for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" value="<? echo $dbd2['name']; ?>" />
            </div>

            <div class="form-group">
                <label class="w" for="username">Username <i class="alert-uname">*tidak dapat diubah</i></label>
                <div class="form-control"><? echo $dbd2['username']; ?></div>
                <input type="hidden" name="username" value="<? echo $dbd2['username']; ?>">
            </div>

            <div class="form-group">
                <label class="w" for="wa">No. Whatsapp</label>
                <input class="form-control" type="number" name="wa" placeholder="(62 8XX XXXX XXXX)" value="<? echo $dbd2['wa']; ?>" />
                <input type="hidden" name="wa-a" value="<? echo $dbd2['wa']; ?>" />
            </div>

            <div class="form-group">
                <label class="w" for="bio">Bio</label>
                <textarea class="form-control" type="text" name="bio" placeholder="Text Panjang Biodata"><? echo $dbd3['bio']; ?></textarea>
            </div>

            <div class="form-group">
                <label class="w" for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" value="<? echo $dbd['ptg']; ?>" />
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