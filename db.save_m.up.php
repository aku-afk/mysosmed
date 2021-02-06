<?

$REDIRECT = '<meta http-equiv="Refresh" content="0; URL=./">';

$med = $dirUpload.$namaFile;

    // menyiapkan query
    $sql_upl = "INSERT INTO statues (username, wa, content, caption, time_stamp, pp) VALUES ('$username', '$wa', '$med', '$caption', '$waktu', '$pp')";
    $stmt_upl = $db->prepare($sql_upl);

    // eksekusi query untuk menyimpan ke database
    $saved_upl = $stmt_upl->execute();
    
    if($saved_upl) echo $REDIRECT;
