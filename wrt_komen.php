<?

$username = $_SESSION['user']['username'];
$wa = $_SESSION['user']['wa'];

// buat query untuk ambil data dari database
$sql_k = "SELECT * FROM users WHERE username='$username' AND wa='$wa'";
    $stmt_k = $db->query($sql_k);
    $usr_k = $stmt_k->fetch(PDO::FETCH_ASSOC);
    
?>
<form action="?komen=saving#<? echo $global['id']; ?>" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="komenan" placeholder="Berkomentar sebagai @<? echo $usr_k['username'];//$username; ?>" />
            </div>

<input type="hidden" name="nggo" value="<? echo $global['id']; ?>" />
<input type="hidden" name="username" value="<? echo $usr_k['username']; ?>" />
<input type="hidden" name="wa" value="<? echo $usr_k['wa']; ?>" />
<input type="hidden" name="pp" value="<? echo $usr_k['photo']; ?>" />

</form>