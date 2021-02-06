<?

$username = $_POST['username'];
$id = $_POST['i'];

$REDIRECT = '<meta http-equiv="Refresh" content="0; URL=./">';

if( !isset($username) ){
	// kalau tidak ada id di query string
	header('Location: ./');
}

if(isset($_POST['del'])){

    // menyiapkan query
    $sql = "DELETE FROM statues WHERE username='$username' AND id='$id'";
    $stmt = $db->query($sql);

    // eksekusi query untuk menyimpan ke database
    $deleted = $stmt->execute();

    // menyiapkan query
    $sql_dlt = "DELETE FROM komens WHERE nggo='$id'";
    $stmt_dlt = $db->query($sql_dlt);

    // eksekusi query untuk menyimpan ke database
    $deleted_2 = $stmt_dlt->execute();


    if($deleted and $deleted_2) 
echo $REDIRECT;


}
?>
