<?

$username = $_SESSION['user']['username'];
$id_k = $_GET['i_k'];
$nggo_mbusek = $_GET['now'];

$REDIRECT = '<meta http-equiv="Refresh" content="0; URL=./#'.$nggo_mbusek.'">';

    // menyiapkan query
    $sql_dk = "DELETE FROM komens WHERE username='$username' AND id='$id_k'";
    $stmt_dk = $db->query($sql_dk);

    // eksekusi query untuk menyimpan ke database
    $saved_dk = $stmt_dk->execute();
    
    if($saved_dk) echo $REDIRECT;
