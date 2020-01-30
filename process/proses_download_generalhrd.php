<?php
    $folder = "../attachment/file/";

    if (!file_exists($folder.$_GET['file'])) {
        echo "<h1>Access forbidden!</h1>
              <p> Anda tidak diperbolehkan mendownload file ini.</p>";
        exit;
    }

    else {
        header("Content-Type: octet/stream");
        header("Content-Disposition: attachment; filename=".$_GET['file']."");
        $fp = fopen($folder.$_GET['file'], "r");
        $data = fread($fp, filesize($folder.$_GET['file']));
        fclose($fp);
        print $data;
    }
?>