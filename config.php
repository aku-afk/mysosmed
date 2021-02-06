<?


// require_once('lembaga_bidang_pembangunan.php');

	if(isset($_GET['C'])){
		$page = $_GET['C'];
 
		switch ($page) {
			case 'REAL':
				include "lembaga_bidang_pembangunan.php";
				break;
			default:
				header('Location: login.php');
				break;
		}
	}else{
		echo "<pre>\n   [!] => 'CONTENT NOT FOUND' \n</pre>";
	}

