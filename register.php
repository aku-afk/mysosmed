<?php

require_once('lembaga_bidang_pembangunan.php');

$jml_users = $db->query('select count(*) from users')->fetchColumn(); 

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#343a40">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="description" content="Bergabung di UpdatE bersama <? echo $jml_users; ?> orang lainnya">

    <title>Pendaftaran Akun UpdatE Baru</title>

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

        <h4 class="w">Bergabunglah bersama <? echo $jml_users; ?> orang lainnya...</h4>
<br><br>
<?
if($_GET['log'] == 'error'){
echo '<table class="reg_err">
    <tr>
        <td>
            <p ><b>ISI DATA DENGAN BENAR !</b></p>
        </td>
    </tr>
    <tr>
        <td>
            <p >Kemungkinan error karena :<br>
            <ul>';

if($_GET['ey_un'] == 'true'){
echo '                <li>Apakah anda lupa memasukkan username ? 
                </li>';
}

if($_GET['ey_wa'] == 'true'){
echo '                <li>Anda lupa memasukkan Nomor WhatsApp ? 
                </li>';
}

if($_GET['ey_pass'] == 'true'){
echo '                <li>Anda lupa memasukkan password ? 
                </li>';
}

if($_GET['error'] == 'mirip'){
echo '                <li>Username ('.$_GET['u-in'].')                sama seperti salah satu username 
                dari '.$jml_users.' username yang sudah terdaftar
                </li>';
};

echo '            </ul></p>
        </td>
    </tr>
</table>
<br><br>';
} else {
    echo '';
}

?>
        <form action="svreg.php" method="POST">

            <div class="form-group">
                <label for="name" class="w">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="username" class="w">Username</label>
<p >
<b >
    <i class="t-notice-reg">
        <b class="btg">*</b>PERINGATAN !!!<br>
        Username yang telah terdaftar tidak dapat diubah<br>
        Pastikan anda membuat username unik<br>
        yang berbeda dari username lainnya.
        <br>
        <a href="https://api.whatsapp.com/send?phone=6281329859219">admin</a>
    </i>
</b>
</p>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="wa" class="w">No. WhatsApp</label>
                <input class="form-control" type="number" name="wa" placeholder="(62 8XX XXXX XXXX)" />
            </div>

            <div class="form-group">
                <label for="password" class="w">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar Sekarang" />

        </form>
<br>
<center>
        <p class="w">Sudah punya akun ? <a href="login.php">Login di sini</a></p>
</center>
<br><br><br>
        </div>

    </div>
</div>
<br><br><br><br>

<? include 'tpl/header.php'; ?>
<? include 'tpl/atribusi.php'; ?>

</div>
</body>
</html>