
    <tr>
        <td>
            <a class="dark-href" href="?u=<? echo $komen['username']; ?>#src">
		<img class="pp_k rounded-circle" src="<?php echo $komen['pp'];?>">


            <b>
                <label class="un-all"><? echo $komen['username'];?>
            </a>
            </label>
            </b>

            <label class="pptk"> <? echo $komen['komen']; ?> </label> 
        </td>
    </tr>
    <tr>
        <td colspan="2" class="tp_k">
<i class="time-post"><? echo $komen['time_stamp']; ?></i>
<i class="invisible">------</i>
<?
$wa_k = $komen['wa'];
$wa = $_SESSION['user']['wa'];
$uname_k = $komen['username'];
$uname = $_SESSION['user']['username'];

if($wa_k == $wa and $uname == $uname_k) { echo '<a href="?komen=del&i_k='.$komen['id'].'&now='.$komen['nggo'].'#'.$komen['nggo'].'">Hapus</a>';}; ?>

        </td>
    </tr>
