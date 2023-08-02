<?php

function saveFiles($outputFile, $downloadFile){

    header("Content-Type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Content-Length: ".filesize($outputFile));
    header("Content-Disposition: attachment; filename=".$downloadFile);
    readfile($outputFile);

}

?>