
<div id="">

<?
$username = $_SESSION['user']['username'];
$id = $_GET['i'];

$sql3 = "SELECT * FROM statues WHERE username='$username' AND id='$id'";
$stmt3 = $db->query($sql3);
$gt = $stmt3->fetch(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <td>
		<img class="pp rounded-circle" src="<?php echo $gt['pp'];?>">
        </td>
        <td>    </td>
        <td>
            <b><label class="un-all"><? echo $gt['username'];?>   <b>&bull;</b>   <a href="https://api.whatsapp.com/send?phone=<? echo $gt['wa']; ?>">Kirim Pesan</a></label></b>
        </td>
    </tr>
    </table>
    <br>
    <center>

        <form action="?statues=save_edit" method="POST" enctype="multipart/form-data">
<?
$media_hm = $gt['content'];
if (!empty($media_hm)) {
    if($media_hm!="." && $dbporto!=".."){
    $info = pathinfo($gt['content']);
    $exten=$info['extension'];
    $name=$info['filename'];
    if($exten=="mp4"){
        echo "
            <video class='media' controls>
                <source src='".$gt['content']."' type='video/mp4'>
                Your browser does not support the video tag.
                </video>
            ";
        } elseif($exten=="mp3"){
        echo "
            <audio class='media' controls>
                <source src='".$gt['content']."' type='audio/mp3'>
                Your browser does not support the audio tag.
                </audio>
            ";
        } elseif($exten=="jpg" || $exten="png" || $exten=="gif"){
            echo "
            <embed class='media' src='".$gt['content']."'>";
        }
    }

} else {
   echo '';
}


?>

    </center>
		<br>

            <div class="form-group">
                <textarea class="form-control" type="text" name="caption" placeholder="Beri Caption"><? echo $gt['caption']; ?></textarea>
            </div>

<input type="hidden" name="username" value="<? echo $username; ?>" />
<input type="hidden" name="i" value="<? echo $id; ?>" />

            <input type="submit" class="btn btn-success btn-block" name="pst" value="Simpan Perubahan" />

</form>
<br>
<a class="ttp-href" href="./#<? echo $id; ?>"><button class="btn btn-danger btn-block" >Buang Perubahan</button></a>
</div>

