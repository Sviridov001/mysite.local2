<?php
//if(is_file('log/'.PATH_LOG)) {
    $dir = __DIR__ .'log/'.PATH_LOG;
    echo $dir;
  //  file_put_contents('log/'.PATH_LOG, "123 ".$dir);
    $content = file('log/'.PATH_LOG);

    echo "<ol>";

    foreach ($content as $line){
        list($dt, $page, $ref) = explode("|", $line);
        $dt = date("d-m-Y H:i:s", $dt);
        echo "<li>";
        echo "$dt - $page -> $ref";
        echo "</li>";
    }
    echo "</ol>";
//}