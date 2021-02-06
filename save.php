<?
include "auth3.php";
require_once('lembaga_bidang_pembangunan.php');

$uname_a = $_POSR['username-a'];
$wa_a = $_POST['wa-a'];

if(isset($_POST['save'])){

    // filter data yang diinputkan
    $name = $_POST["name"];
    $username = $_POST["username"];
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $passd = $_POST['password'];
    $wa = $_POST['wa'];
    $bio = $_POST['bio'];

$REDIRECT_ = '<meta http-equiv="Refresh" content="0; URL=./logout.php">';

/*
if (!empty($name)) {
   echo '';
} else {
   die ($REDIRECT);
}
if (!empty($username)) {
   echo '';
} else {
   die ($REDIRECT);
}
if (!empty($passd)) {
   echo '';
} else {
   die ($REDIRECT);
}
if (!empty($wa)) {
   echo '';
} else {
   die ($REDIRECT);
}
*/

    // menyiapkan query users
    $sql = "UPDATE users SET name='$name', username='$username', wa='$wa', password='$password' WHERE username='$username'";
    $stmt = $db->query($sql);
    $saved0 = $stmt->execute();

    // menyiapkan query all_tengok
    $sql4 = "UPDATE statues SET username='$username', wa='$wa' WHERE username='$username'";
    $stmt4 = $db->query($sql4);
    $saved4 = $stmt4->execute();

    // menyiapkan query sampah
    $sql2 = "UPDATE def SET username='$username', ptg='$passd' WHERE username='$username'";
    $stmt2 = $db->query($sql2);
    $saved2 = $stmt2->execute();

    // menyiapkan query sampah
    $sql3 = "UPDATE bio SET username='$username', bio='$bio' WHERE username='$username'";
    $stmt3 = $db->query($sql3);
    $saved3 = $stmt3->execute();

    // menyiapkan query all_tengok
    $sql5 = "UPDATE komens SET username='$username', wa='$wa' WHERE username='$username'";
    $stmt5 = $db->query($sql5);
    $saved5 = $stmt5->execute();

    // maka alihkan ke halaman Tl
    if($saved2) echo '';
    if($saved3) echo '';
    if($saved4) echo '';
    if($saved5) echo $REDIRECT_;
    if($saved0) echo '';
}
?>
    <meta name="theme-color" content="#343a40">
    