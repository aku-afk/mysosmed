<?

$namaFile = $_FILES['media']['name'];
$namaSementara = $_FILES['media']['tmp_name'];
// tentukan lokasi file akan dipindahkan
$dirUpload = "content/";
// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if($terupload){
    echo '';
} else {
    die($REDIRECT);
}

$med = $dirUpload.$namaFile;

