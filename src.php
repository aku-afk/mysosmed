	<?php 
		$data = $db->query("SELECT * FROM users");	
	if(isset($_GET['user_src'])){
		$cari = $_GET['user_src'];
		$data = $db->query("SELECT * FROM users where username like '%".$cari."%'");				
	}else{
		echo nl2br(" Seseorang dengan username<b>".$cari."</b> \n tidak ditemukan");
	}
	while($d = $data->fetch(PDO::FETCH_ASSOC)){
	?>
	<tr>
		<td>
		<a href="?u=<? echo $d['username']; ?>#src" class="dark-href">
		<img class="pp rounded-circle" src="<?php echo $d['photo'];?>">
		</a>
		</td>
		<td>
		    <a href="?u=<? echo $d['username']; ?>#src" class="dark-href">
		        <b>
		            <label class="un-all"><?php echo $d['username']; ?></label>
		        </b>
		     </a>
		</td>
	</tr>
	<tr></tr>
	<?php } ?>