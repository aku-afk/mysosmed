

<div id="">
<table>
    <tr>
        <td>
		<img class="pp rounded-circle" src="<?php echo $_SESSION['user']['photo'];?>">
        </td>
        <td>    </td>
        <td>
            <b><label class="un-all"><? echo $_SESSION['user']['username'];?>   <b>&bull;</b>   <a href="https://api.whatsapp.com/send?phone=<? echo $_SESSION['user']['wa']; ?>">Kirim Pesan</a></label></b>
        </td>
    </tr>
    </table>
    <br>
    <center>

<?
	if(isset($_GET['post_m'])){
		$page = $_GET['post_m'];
 
		switch ($page) {
			case 'text':
				include "post_m.txt.php";
				break;
			case 'media':
				include "post_m.up.php";
				break;
			case 'url':
				include "post_m.url.php";
				break;
			default:
				header('Location: ./');
				break;
		}
	}else{
		echo '';
	}
?>

</div>

