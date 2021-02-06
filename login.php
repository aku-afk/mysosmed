<?php 

require_once('lembaga_bidang_pembangunan.php');

//Algo lupas
$e = $_GET['e'];
$a = $_GET['a'];


$js_stats = $_POST['S_JS'];

if(isset($_POST['login'])){

//    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $username = $_POST['username'];
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR wa=:wa";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":wa" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ./".$js_stats);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#343a40">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login UpdatE</title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/ks.css" />
    <link rel="shortcut icon" href="favicon.ico" />

</head>
<body class="bg-dark">

<div id="BGHD" class="BGHD"></div>

<div id="batang_tubuh" class="bg_rl">
<br><br><br><br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <h4 class="w">Masuk ke UpdatE</h4>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username" class="w">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau No. WhatsApp" />
            </div>


            <div class="form-group">
                <label for="password" class="w">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
<noscript>
<input type="hidden" name="S_JS" value="?js=off">
</noscript>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Login" />

        </form>
<br>
<center>
        <p class="w">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</center>

        </div>
<!-- Konten Samping Kanan -->
        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
<br><br><br><br>

<? include 'tpl/header.php'; ?>
<? include 'tpl/atribusi.php'; ?>

</div>
</body>
</html>