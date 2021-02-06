
		

<?
$username_db = $global['username'];
$username = $_SESSION['user']['username'];
$wa_db = $global['wa'];
$wa = $_SESSION['user']['wa'];
$id = $global['id'];
$contents = $global['content'];
?>

<table>
    <tr>
        <td>
            <a alt="@<? echo $global['username']; ?>" class="dark-href" href="?u=<? echo $global['username']; ?>">
		<img class="pp rounded-circle" src="<?php echo $global['pp'];?>">
            </a>
        </td>
        <td>    </td>
        <td>
            <a alt="@<? echo $global['username']; ?>" class="dark-href" href="?u=<? echo $global['username']; ?>#src">
            <b><label class="un-all"><? echo $global['username'];?>
            </a>
<?
if($username_db == $username and $wa_db == $wa) {
echo '';
} else {
echo '   &bull;   <a href="https://api.whatsapp.com/send?phone='.$global['wa'].'">Kirim Pesan</a>';
};
?>
</label></b>
        </td>
        <td>
<div class="s-aks">
<?
if($username_db == $username and $wa_db == $wa) { echo '
<form action="" name="aks_post'.$id.'" method="POST">
<select class="form-control aks_post" name="url" size="5" onchange="top.location=aks_post'.$id.'.url.options[selectedIndex].value" >
<option selected hidden >- Edit/Hapus -</option>
<optgroup label="-- Edit/Hapus --"></optgroup>
<option value="?statues=edit&i='.$global['id'].'#statues" >Edit</option>
<option value="?statues=del&i='.$global['id'].'#statues" >Hapus</option>
</select>
<noscript>
<style>
    .aks_post {
        display:none;
    }
</style>
<a href="?statues=del&i='.$id.'#statues">Hapus</a>

<i class="invisible">--</i>

<a href="?statues=edit&i='.$id.'#statues">Edit</a>
</noscript>
</form>';
 }; ?>
</div>
        </td>
    </tr>
    </table>
    <br>
    <tr>
    <center>
        <? include "r_ex.php"; ?>
    </center>
    </tr>
    <tr>
        <tr>
            <td>
                <i class="invisible">-----</i>
            </td>
        </tr>
    </tr>
    <tr>
<?

include 'lib/mathjax_backslash.php';

if(!empty($global['content'])) {
   echo '<p >'.nl2br(str_replace($SEARCH,$GANTI,$global['caption'])).'</p >';
} else {
   echo '<h3>'.nl2br(str_replace($SEARCH,$GANTI,$global['caption'])).'</h3>';
}
?>
    </tr>

<div class="card mb-3 c-komen">
    <div class="card-body">

<div class="komen">
<? 

$for = $global['id'];
$sql_k = "SELECT * FROM komens WHERE nggo='$for' ORDER BY id";
    $stmt_k = $db->query($sql_k);
    while($komen = $stmt_k->fetch(PDO::FETCH_ASSOC)){
		?>
<table>
<? include 'list_komen.php'; ?>
</table>
<? }; ?>
</div>

    </div>
</div>

<div class="i_komen">
<?
	if(isset($_GET['komen'])){
		$page = $_GET['komen'];
 
		switch ($page) {
			case 'tulis':
				include "wrt_komen.php";
				break;
			default:
				echo $REDIRECT;
				break;
		}
	}else{
		include "wrt_komen.php";
	}
?>
</div>
		<label class="time-post"><i><? echo $global['time_stamp'];?></i></label>