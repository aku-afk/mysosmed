<?
$media_hm = $global['content'];
if (!empty($media_hm)) {
    if($media_hm!="." && $media_hm!=".."){
    $info = pathinfo($global['content']);
    $exten = $info['extension'];
    $name_hsl_filter_file = $info['filename'];
    if($exten=="mp4"){
        echo "
            <video class='media' controls>
                <source src='".$global['content']."' type='video/mp4'>
                Your browser does not support the video tag.
                </video>
            ";
        } elseif($exten=="jpg"){
            echo "
            <img alt='".$name_hsl_filter_file."' class='media' src='".$global['content']."'></img>";
        } elseif($exten=="png"){
            echo "
            <img alt='".$name_hsl_filter_file."' class='media' src='".$global['content']."'></img>";
        } elseif($exten=="gif"){
            echo "
            <img alt='".$name_hsl_filter_file."' class='media' src='".$global['content']."'></img>";
        } elseif($exten=="svg"){
            echo "
            <img alt='".$name_hsl_filter_file."' class='media' src='".$global['content']."'></img>";
        } elseif($exten=="mp3"){
        echo "
            <audio class='media' controls>
                <source src='".$global['content']."' type='audio/mp3'>
                Your browser does not support the audio tag.
                </audio>
            ";
        } else {
            echo "
            <embed class='media' src='".$global['content']."'>";
        }
    }

} else {
   echo '';
}


?>
