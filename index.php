<?
require_once("auth.php");
require_once('lembaga_bidang_pembangunan.php');
date_default_timezone_set('Asia/Jakarta');

$username = $_SESSION['user']['username'];
$wa = $_SESSION['user']['wa'];

if( !isset($_SESSION['user']['username']) ){
	// kalau tidak ada id di query string
	header('Location: login.php');
}

// buat query untuk ambil data dari database
$sql = "SELECT * FROM users WHERE username='$username' AND wa='$wa'";
    $stmt = $db->query($sql);
    $usr = $stmt->fetch(PDO::FETCH_ASSOC);

// buat query untuk ambil data dari database
$sql2 = "SELECT * FROM bio WHERE username='$username'";
    $stmt2 = $db->query($sql2);
    $usr2 = $stmt2->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#343a40">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home @<? echo $usr["username"]; ?></title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/ks.css" />
    <link rel="shortcut icon" href="favicon.ico" />

</div>
  <script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['```[',']```'], ['\\(','\\)']]}
});
</script>
</head>
<body class="bg-dark">

<div id="BGHD" class="BGHD"></div>

<div id="batang_tubuh" >
<div id="a"></div>

<br><br><br>

<div class="container mt-5">

    <div class="row">

        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">

                    <img class="img img-responsive rounded-circle mb-3" width="160" height="160" src="<?php echo $usr['photo'] ?>" />
                    
                    <h3><?php echo  $usr["username"] ?></h3>
<br>
<div class="line"></div>
<br>
<div class="opt">


<form action="" name="acc_opt" method="POST">
<select class="form-control ac-account" name="url" size="5" onchange="top.location=acc_opt.url.options[selectedIndex].value" >

<option selected hidden >- Tindakan Akun -</option>
<optgroup label="-- Tindakan Akun --"></optgroup>
<option value="edit.php" >Edit Profile</option>
<option value="edit-pp.php" >Edit Photo Profile</option>
<option value="logout.php" >Logout</option>

</select>
<noscript>
<style>
    .ac-account {
        display:none;
    }
</style>
<ul>
    <li>
        <a href="edit.php">Edit Profile</a>
    </li>
    <li>
        <a href="edit-pp.php">Edit Photo Profile</a>
    </li>
    <li>
        <a href="logout.php">Logout</a>
    </li>
</ul>
</noscript>
</form>


</div>

                </div>
            </div>

            
        </div>



        <div class="col-md-8">

            <div class="card mb-3">
                <div class="card-body">
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
            </div>

            <div id="src" class="card mb-3">
                <div class="card-body">
<br>
<h5>Cari Seseorang</h5>

<form action="#src" method="get">
            <div class="form-group">
<tr>
    <td>
                <input class="form-control" type="search" name="user_src" placeholder="Telusuri Username" value="<?
        $usr = $_GET['user_src'];
        $u = $_GET['u'];
        echo $usr;
        echo $u;
        ?>" />
    </td>
    <td>
    <a class="dark-href x_src" href="./#src">✕</a>
    </td>
</tr>
            </div>
</form>
<hr>
<?php 
if(isset($_GET['user_src'])){
	$cari = $_GET['user_src'];
	echo "<i>Hasil pencarian untuk   <b>".$cari."</b></i><br><br>";
}
?>
 
<table>
<?
	if(isset($_GET['user_src'])){
		$page = $_GET['user_src'];
 
		switch ($page) {
			case $cari:
				include "src.php";
				break;
			default:
				include "src.php";
				break;
		}
	}else{
		echo "";
	}
?>
</table>

                </div>
            </div>

<?
	if(isset($_GET['u'])){
		$page = $_GET['u'];
 
		switch ($page) {
			case $page:
				include "visit.php";
				break;
			default:
				echo "";
				break;
		}
	}else{
		echo "";
	}
?>


            <div id="statues" class="card mb-3">
                <div class="card-body">

<?
	if(isset($_GET['statues'])){
		$page = $_GET['statues'];
 
		switch ($page) {
			case 'saving':
				include "save-content.php";
				break;
				
			case 'post':
				include "post-content.php";
				break;
				
			case 'edit':
				include "edit-content.php";
				break;
			case 'save_edit':
				include "esit-content.php";
				break;
				
			case 'del':
				include "delete-content.php";
				break;
			case 'delete':
				include "deleting-content.php";
				break;
				
			default:
				include "post-content.opt.php";
				break;
		}
	}else{
		include "post-content.opt.php";
	}

	if(isset($_GET['komen'])){
		$page = $_GET['komen'];
 
		switch ($page) {
			case 'saving':
				include "sve_komen.php";
				break;
			case 'del':
				include "del_komen.php";
				break;
			default:
				echo "";
				break;
		}
	}else{
		echo "";
	}
?>

                </div>
            </div>

<div id="posted_global">
<?

$sql = "SELECT * FROM statues ORDER BY id DESC";
    $stmt = $db->query($sql);
    while($global = $stmt->fetch(PDO::FETCH_ASSOC)){
		?>
            <div id="<? echo $global['id']; ?>" class="card mb-3">
                <div class="card-body">
                    <? include 'statues.php'; ?>
                </div>
            </div>
            
<? }; ?>
</div>

        </div>
    
    </div>
</div>


<div alt="Kembali Ke Atas" class="bN bns w" onclick="balikNaik()">
<center>
<b class="t_naik">V</b>
</center>
</div>
<script src="js/jsku.js"></script>
<noscript>
    <style>
        .bns {
            display:none;
        }
    </style>
<div alt="Kembali Ke Atas" class="bN w">
<a href="#a" class="ttp-href">
<center>
<b class="t_naik">V</b>
</center>
</a>
</div>
</noscript>

<br><br><br><br>


<?
  include 'tpl/header.php';
  include 'tpl/atribusi.php';
?>


  <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

</div>

</body>

<noscript>
    <style>
        .popup_off_js {
            width:100%;
            height:100%;
            background-color:rgba(0, 0, 0, 0.7);
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
        }
        .popup_content {
            max-width:90%;
            margin-top:20%;
            color:#fff;
            text-align:center;
        }
        .describe_error_off_js {
            font-family:arial;
        }
        #BGHD, #batang_tubuh {
             -webkit-filter: blur(10px);
                -moz-filter: blur(10px);
                  -o-filter: blur(10px);
                     filter: blur(10px);
        }

        #js_off {
            display:block;
        }

</style>
    <div id="js_off" class="popup_off_js">
        <? include 'tpl/header.php'; ?>
        <center>
        <div class="popup_content">
        <h1 class="w">
            JAVASCRIPT NONAKTIF
        </h1>
        <h2>
            AKTIFKAN JAVASCRIPT DULU
        </h2>
        <br>
        <center>
        <br>
        <div class="line-bottom">
        </div>
            <br>
        <div class="describe_error_off_js">
        <p >
            Harap aktifkan <i>javascript</i> terlebih dahulu.
            <i>javascript</i> nonaktif dapat menyebabkan beberapa komponen tampilan mengalami <i>malfungsi</i>.
        </p>
        </div>
        </center>
        </div>
        <br><br><br>
        <? include 'tpl/atribusi.php'; ?>
        </center>
    </div>
</noscript>

</html>