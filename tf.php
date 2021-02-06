<?
    if($media_hm!="." && $dbporto!="..") {
    $info = pathinfo($path.$dbporto);
    $exten=$info['extension'];
    $name=$info['filename'];
    if($exten=="mp4"){
        echo "
            <video class='media' controls>
                <source src='".$path.$dbporto."' type='video/mp4'>
                <source src='".$path.$dbporto."' type='video/ogg'>
                Your browser does not support the video tag.
                </video>
            ";
        } elseif($exten=="mp3"){
        echo "
            <audio class='media' controls>
                <source src='".$path.$dbporto."' type='audio/mp3'>
                Your browser does not support the audio tag.
                </audio>
            ";
        } elseif($exten=="jpg" || $exten="png" || $exten=="gif"){
            echo "
            <img class='media' src='".$path.$dbpoto."'>";
        }
    }

?>