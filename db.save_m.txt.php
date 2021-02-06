<?

    // menyiapkan query
    $sql = "INSERT INTO statues (username, wa, content, caption, time_stamp, pp) 
            VALUES (:username, :wa, :content, :caption, :time_stamp, :pp)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":wa" => $wa,
        ":content" => '',
        ":caption" => $caption,
        ":time_stamp" => $waktu,
        ":pp" => $pp
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    
    if($saved) echo $REDIRECT;
