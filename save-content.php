<?

date_default_timezone_set('Asia/Jakarta');
$jam = date('H:i');
$tgl = date('j F Y');
$waktu = $jam.'  '.$tgl;

$username = $_SESSION['user']['username'];
$wa = $_SESSION['user']['wa'];
$pp = $_SESSION['user']['photo'];

$REDIRECT = '<meta http-equiv="Refresh" content="0; URL=./#statues">';

if( !isset($username) ){
	// kalau tidak ada id di query string
	header('Location: ./');
}


	if(isset($_GET['save_m'])){
		$page = $_GET['save_m'];
 
		switch ($page) {
			case 'text':
				include "save_m.txt.php";
				break;
			case 'media':
				include "save_m.up.php";
				break;
			case 'url':
				include "save_m.url.php";
				break;
			default:
				echo '';
				break;
		}
	}else{
		echo '';
	}

if(isset($_POST['pst'])){


	if(isset($_GET['save_m'])){
		$page = $_GET['save_m'];
 
		switch ($page) {
			case 'text':
				include "db.save_m.txt.php";
				break;
			case 'media':
				include "db.save_m.up.php";
				break;
			case 'url':
				include "db.save_m.url.php";
				break;
			default:
				header('Location: ./#statues');
				break;
		}
	}else{
		echo '';
	}


}
?>
